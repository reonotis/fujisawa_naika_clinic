<?php

namespace Database\Seeders;

use App\Models\ClinicHoliday;
use App\Models\Doctor;
use App\Models\DoctorCalendarPublication;
use App\Models\DoctorScheduleOverride;
use App\Models\DoctorWeeklySchedule;
use Illuminate\Database\Seeder;

class DoctorScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // css_class は resources/scss/doctor-calendar.scss のクラス名と対応
        $doctors = [];
        foreach ([
            ['name' => '藤澤先生', 'css_class' => 'alise'],
            ['name' => '松原先生', 'css_class' => 'matsubara'],
            ['name' => '副島先生', 'css_class' => 'fukushima'],
            ['name' => '関口先生', 'css_class' => 'sekiguchi'],
        ] as $i => $row) {
            $doctors[$row['css_class']] = Doctor::updateOrCreate(
                ['css_class' => $row['css_class']],
                $row + ['sort_order' => $i + 1],
            );
        }

        // 曜日ごとの基本設定（0=日〜6=土）
        $weekly = [
            0 => ['is_closed' => true],
            1 => ['am' => 'alise', 'pm' => 'alise'],
            2 => ['am' => 'alise', 'pm' => 'alise'],
            3 => ['am' => 'alise', 'pm' => 'sekiguchi'],
            4 => ['is_closed' => true],
            5 => ['am' => 'alise', 'pm' => 'fukushima'],
            6 => ['am' => 'matsubara', 'pm' => null],
        ];
        foreach ($weekly as $dow => $row) {
            DoctorWeeklySchedule::updateOrCreate(
                ['day_of_week' => $dow],
                [
                    'is_closed' => $row['is_closed'] ?? false,
                    'am_doctor_id' => isset($row['am']) ? $doctors[$row['am']]->id : null,
                    'pm_doctor_id' => isset($row['pm']) ? $doctors[$row['pm']]->id : null,
                ],
            );
        }

        foreach ([
            '2026-09-21' => '敬老の日',
            '2026-09-22' => '国民の休日',
            '2026-09-23' => '秋分の日',
            '2026-10-12' => 'スポーツの日',
        ] as $date => $name) {
            ClinicHoliday::updateOrCreate(['date' => $date], ['name' => $name]);
        }

        // 公開年月
        foreach (['2026-09', '2026-10'] as $ym) {
            DoctorCalendarPublication::updateOrCreate(
                ['target_month' => $ym],
                ['is_published' => true, 'published_at' => now()],
            );
        }

        // 臨時変更（土曜午前が藤澤先生の日）
        foreach (['2026-09-19', '2026-10-24'] as $date) {
            DoctorScheduleOverride::updateOrCreate(['date' => $date], [
                'is_closed' => false,
                'am_doctor_id' => $doctors['alise']->id,
                'pm_doctor_id' => null,
            ]);
        }
    }
}
