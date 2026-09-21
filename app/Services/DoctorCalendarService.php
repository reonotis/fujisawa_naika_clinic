<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\ClinicHoliday;
use App\Models\Doctor;
use App\Models\DoctorCalendarPublication;
use App\Models\DoctorScheduleOverride;
use App\Models\DoctorWeeklySchedule;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class DoctorCalendarService
{
    public const CLOSED_LABEL = '休診日';

    public const SOURCE_WEEKLY = 'weekly';
    public const SOURCE_HOLIDAY = 'holiday';
    public const SOURCE_OVERRIDE = 'override';

    /**
     * 公開ページ用: 公開中の月（当月以降）ごとの週グリッドデータ（calendar-table コンポーネントの形式）
     *
     * @return array<string, array<int, array<string, mixed>>> ['2026-09' => [...], ...]
     */
    public function forPublic(?CarbonInterface $today = null): array
    {
        $currentMonth = Carbon::instance($today ?? now())->format('Y-m');

        $months = DoctorCalendarPublication::query()
            ->where('is_published', true)
            ->where('target_month', '>=', $currentMonth)
            ->orderBy('target_month')
            ->pluck('target_month');

        $result = [];
        foreach ($months as $ym) {
            $result[$ym] = $this->gridForMonth($ym);
        }

        return $result;
    }

    /**
     * 公開の可否に関わらず、指定月の週グリッドデータを返す（管理画面のプレビュー用）
     *
     * @param string $ym 'YYYY-MM'
     * @return array<int, array<string, mixed>>
     */
    public function gridForMonth(string $ym): array
    {
        return $this->toPublicGrid($this->forMonth(Carbon::createFromFormat('Y-m-d', $ym . '-01')));
    }

    /**
     * 1か月分の解決済みデータ（日付キー）を返す
     *
     * @return array<string, array<string, mixed>>
     */
    public function forMonth(CarbonInterface $month): array
    {
        $start = Carbon::instance($month)->startOfMonth();
        $end = $start->copy()->endOfMonth();

        $doctors = Doctor::query()->get()->keyBy('id');
        $weekly = DoctorWeeklySchedule::query()->get()->keyBy('day_of_week');
        $overrides = DoctorScheduleOverride::query()
            ->whereBetween('date', [$start->toDateString(), $end->toDateString()])
            ->get()
            ->keyBy(fn ($o) => $o->date->toDateString());
        $holidays = ClinicHoliday::query()
            ->whereBetween('date', [$start->toDateString(), $end->toDateString()])
            ->get()
            ->keyBy(fn ($h) => $h->date->toDateString());

        $days = [];
        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            $key = $date->toDateString();
            $days[$key] = $this->resolveDay($date, $doctors, $weekly->get($date->dayOfWeek), $overrides->get($key), $holidays->get($key));
        }

        return $days;
    }

    /**
     * 優先順位: 臨時変更 > 祝日・特別休診 > 曜日の基本設定
     *
     * @param \Illuminate\Support\Collection<int, Doctor> $doctors
     * @return array<string, mixed>
     */
    private function resolveDay(
        Carbon $date,
        $doctors,
        ?DoctorWeeklySchedule $weekly,
        ?DoctorScheduleOverride $override,
        ?ClinicHoliday $holiday,
    ): array {
        if ($override) {
            $source = self::SOURCE_OVERRIDE;
            $isClosed = $override->is_closed;
            $amId = $override->am_doctor_id;
            $pmId = $override->pm_doctor_id;
            $label = $override->note ?: self::CLOSED_LABEL;
        } elseif ($holiday) {
            $source = self::SOURCE_HOLIDAY;
            $isClosed = true;
            $amId = $pmId = null;
            $label = $holiday->name;
        } else {
            $source = self::SOURCE_WEEKLY;
            $isClosed = $weekly?->is_closed ?? true;
            $amId = $weekly?->am_doctor_id;
            $pmId = $weekly?->pm_doctor_id;
            $label = self::CLOSED_LABEL;
        }

        return [
            'date' => $date->toDateString(),
            'source' => $source,
            'is_closed' => $isClosed,
            'label' => $label,
            'note' => $override?->note,
            'override_id' => $override?->id,
            'am_doctor_id' => $amId,
            'pm_doctor_id' => $pmId,
            'am' => $doctors->get($amId)?->css_class ?? 'off',
            'pm' => $doctors->get($pmId)?->css_class ?? 'off',
        ];
    }

    /**
     * @param array<string, array<string, mixed>> $days
     * @return array<int, array<string, mixed>>
     */
    private function toPublicGrid(array $days): array
    {
        $grid = [];
        $first = Carbon::parse(array_key_first($days));

        // 月曜始まりなので、月初の曜日ぶん空セルを入れる
        for ($i = 0; $i < ($first->dayOfWeekIso - 1); $i++) {
            $grid[] = [];
        }

        foreach ($days as $day) {
            $grid[] = $day['is_closed']
                ? ['date' => $day['date'], 'close' => $day['label']]
                : ['date' => $day['date'], 'am' => $day['am'], 'pm' => $day['pm']];
        }

        while (count($grid) % 7 !== 0) {
            $grid[] = [];
        }

        return $grid;
    }
}
