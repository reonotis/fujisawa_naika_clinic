<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicHoliday;
use App\Models\Doctor;
use App\Models\DoctorCalendarPublication;
use App\Models\DoctorScheduleOverride;
use App\Models\DoctorWeeklySchedule;
use App\Services\DoctorCalendarService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorCalendarController extends Controller
{
    public function index(DoctorCalendarService $calendarService)
    {
        $publications = DoctorCalendarPublication::query()->orderBy('target_month')->get();

        return view('admin.doctor_calendar.index', [
            'previews' => $publications->mapWithKeys(fn ($p) => [$p->target_month => $calendarService->gridForMonth($p->target_month)]),
            'doctors' => Doctor::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'publications' => $publications,
            'allDoctors' => Doctor::query()->orderBy('sort_order')->orderBy('id')->get(),
            'weekly' => DoctorWeeklySchedule::query()->get()->keyBy('day_of_week'),
            'overrides' => DoctorScheduleOverride::query()->orderBy('date')->get(),
            'holidays' => ClinicHoliday::query()->orderBy('date')->get(),
        ]);
    }

    /** 公開年月を追加（追加時点では非公開） */
    public function storePublication(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'target_month' => ['required', 'date_format:Y-m', Rule::unique('doctor_calendar_publications', 'target_month')],
        ]);

        DoctorCalendarPublication::create(['target_month' => $data['target_month'], 'is_published' => false]);

        return back()->with('status', Carbon::createFromFormat('Y-m-d', $data['target_month'] . '-01')->format('Y年n月') . 'を追加しました（非公開）。');
    }

    /** 公開・非公開の切り替え */
    public function updatePublication(Request $request, DoctorCalendarPublication $publication): RedirectResponse
    {
        $data = $request->validate(['is_published' => ['required', 'boolean']]);
        $isPublished = (bool) $data['is_published'];

        $publication->update([
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        $label = Carbon::createFromFormat('Y-m-d', $publication->target_month . '-01')->format('Y年n月');

        return back()->with('status', $label . ($isPublished ? 'を公開しました。' : 'を非公開にしました。'));
    }

    public function destroyPublication(DoctorCalendarPublication $publication): RedirectResponse
    {
        $publication->delete();

        return back()->with('status', '公開年月の登録を削除しました（日別の設定は残ります）。');
    }

    public function storeDoctor(Request $request): RedirectResponse
    {
        $data = $request->validate($this->doctorRules());

        Doctor::create([
            'name' => $data['name'],
            'css_class' => $data['css_class'],
            'sort_order' => $data['sort_order'] ?? ((int) Doctor::max('sort_order') + 1),
            'is_active' => true,
        ]);

        return back()->with('status', '医師を登録しました。');
    }

    /** ドラッグ＆ドロップ後の並び順を保存（ids は先頭から順） */
    public function reorderDoctors(Request $request): JsonResponse
    {
        $data = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer', 'distinct', 'exists:doctors,id'],
        ]);

        DB::transaction(function () use ($data) {
            foreach (array_values($data['ids']) as $index => $id) {
                Doctor::whereKey($id)->update(['sort_order' => $index + 1]);
            }
        });

        return response()->json(['ok' => true]);
    }

    public function updateDoctor(Request $request, Doctor $doctor): RedirectResponse
    {
        $data = $request->validate($this->doctorRules($doctor));
        $isActive = (bool) ($data['is_active'] ?? false);

        if (! $isActive && $doctor->is_active && $this->isDoctorInUse($doctor)) {
            return back()->withErrors([
                'doctor' => "{$doctor->name}は曜日設定または今日以降の臨時変更で使われているため、無効にできません。先に担当を変更してください。",
            ]);
        }

        $doctor->update([
            'name' => $data['name'],
            'css_class' => $data['css_class'],
            'sort_order' => $data['sort_order'] ?? $doctor->sort_order,
            'is_active' => $isActive,
        ]);

        return back()->with('status', "{$doctor->name}を更新しました。");
    }

    /** 曜日ごとの基本設定を更新 */
    public function updateWeekly(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'schedules' => ['required', 'array'],
            'schedules.*.is_closed' => ['nullable', 'boolean'],
            'schedules.*.am_doctor_id' => ['nullable', 'exists:doctors,id'],
            'schedules.*.pm_doctor_id' => ['nullable', 'exists:doctors,id'],
        ]);

        foreach (range(0, 6) as $dow) {
            $row = $data['schedules'][$dow] ?? [];
            DoctorWeeklySchedule::updateOrCreate(['day_of_week' => $dow], $this->scheduleAttributes($row));
        }

        return back()->with('status', '曜日ごとの基本設定を更新しました。');
    }

    /** 臨時変更を登録・更新 */
    public function saveOverride(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'date' => ['required', 'date'],
            'is_closed' => ['nullable', 'boolean'],
            'am_doctor_id' => ['nullable', 'exists:doctors,id'],
            'pm_doctor_id' => ['nullable', 'exists:doctors,id'],
            'note' => ['nullable', 'string', 'max:255'],
        ]);

        DoctorScheduleOverride::updateOrCreate(
            ['date' => $data['date']],
            $this->scheduleAttributes($data) + ['note' => $data['note'] ?? null],
        );

        return back()->with('status', Carbon::parse($data['date'])->format('n月j日') . 'の臨時変更を保存しました。');
    }

    /** 臨時変更を削除（基本設定に戻す） */
    public function destroyOverride(DoctorScheduleOverride $override): RedirectResponse
    {
        $override->delete();

        return back()->with('status', $override->date->format('n月j日') . 'を基本設定に戻しました。');
    }

    public function storeHoliday(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'date' => ['required', 'date'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        ClinicHoliday::updateOrCreate(['date' => $data['date']], ['name' => $data['name']]);

        return back()->with('status', '休診日を登録しました。');
    }

    public function destroyHoliday(ClinicHoliday $holiday): RedirectResponse
    {
        $holiday->delete();

        return back()->with('status', '休診日を削除しました。');
    }

    /**
     * @return array<string, mixed>
     */
    private function doctorRules(?Doctor $doctor = null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'css_class' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z][A-Za-z0-9_-]*$/', Rule::unique('doctors', 'css_class')->ignore($doctor?->id)],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function isDoctorInUse(Doctor $doctor): bool
    {
        $inWeekly = DoctorWeeklySchedule::query()
            ->where(fn ($q) => $q->where('am_doctor_id', $doctor->id)->orWhere('pm_doctor_id', $doctor->id))
            ->exists();

        $inFutureOverride = DoctorScheduleOverride::query()
            ->whereDate('date', '>=', now()->toDateString())
            ->where(fn ($q) => $q->where('am_doctor_id', $doctor->id)->orWhere('pm_doctor_id', $doctor->id))
            ->exists();

        return $inWeekly || $inFutureOverride;
    }

    /**
     * 休診日なら担当医は保存しない
     *
     * @param array<string, mixed> $row
     * @return array<string, mixed>
     */
    private function scheduleAttributes(array $row): array
    {
        $isClosed = (bool) ($row['is_closed'] ?? false);

        return [
            'is_closed' => $isClosed,
            'am_doctor_id' => $isClosed ? null : ($row['am_doctor_id'] ?: null),
            'pm_doctor_id' => $isClosed ? null : ($row['pm_doctor_id'] ?: null),
        ];
    }
}
