<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {

        $doctor_calendar_data = $this->makeDoctorCalendarData();

        return view('welcome', [
            'doctor_calendar_data' => $doctor_calendar_data,
        ]);
    }

    private function makeDoctorCalendarData()
    {
        $data_6 = [
            // 第1週
            ['date' => '2026-06-01', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-02', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-03', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-06-04', 'close' => '休診日'],
            ['date' => '2026-06-05', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-06-06', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-06-07', 'close' => '休診日'],
            // 第2週
            ['date' => '2026-06-08', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-09', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-10', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-06-11', 'close' => '休診日'],
            ['date' => '2026-06-12', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-06-13', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-06-14', 'close' => '休診日'],
            // 第3週
            ['date' => '2026-06-15', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-16', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-17', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-06-18', 'close' => '休診日'],
            ['date' => '2026-06-19', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-06-20', 'am' => 'alise', 'pm' => 'off'],
            ['date' => '2026-06-21', 'close' => '休診日'],
            // 第4週
            ['date' => '2026-06-22', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-23', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-24', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-06-25', 'close' => '休診日'],
            ['date' => '2026-06-26', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-06-27', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-06-28', 'close' => '休診日'],
            // 第5週
            ['date' => '2026-06-29', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-06-30', 'am' => 'alise', 'pm' => 'alise'],
            [],
            [],
            [],
            [],
            [],
        ];

        $data_9 = [
            // 第1週（月は対象月外）
            [],
            ['date' => '2026-09-01', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-09-02', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-09-03', 'close' => '休診日'],
            ['date' => '2026-09-04', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-09-05', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-09-06', 'close' => '休診日'],
            // 第2週
            ['date' => '2026-09-07', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-09-08', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-09-09', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-09-10', 'close' => '休診日'],
            ['date' => '2026-09-11', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-09-12', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-09-13', 'close' => '休診日'],
            // 第3週
            ['date' => '2026-09-14', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-09-15', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-09-16', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-09-17', 'close' => '休診日'],
            ['date' => '2026-09-18', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-09-19', 'am' => 'alise', 'pm' => 'off'],  // 藤澤先生
            ['date' => '2026-09-20', 'close' => '休診日'],
            // 第4週（シルバーウィーク：敬老の日〜秋分の日）
            ['date' => '2026-09-21', 'close' => '敬老の日'],
            ['date' => '2026-09-22', 'close' => '国民の休日'],
            ['date' => '2026-09-23', 'close' => '秋分の日'],
            ['date' => '2026-09-24', 'close' => '休診日'],
            ['date' => '2026-09-25', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-09-26', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-09-27', 'close' => '休診日'],
            // 第5週（木〜日は対象月外）
            ['date' => '2026-09-28', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-09-29', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-09-30', 'am' => 'alise', 'pm' => 'sekiguchi'],
            [],
            [],
            [],
            [],
        ];

        $data_10 = [
            // 第1週（月〜水は対象月外）
            [],
            [],
            [],
            ['date' => '2026-10-01', 'close' => '休診日'],
            ['date' => '2026-10-02', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-10-03', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-10-04', 'close' => '休診日'],
            // 第2週
            ['date' => '2026-10-05', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-10-06', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-10-07', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-10-08', 'close' => '休診日'],
            ['date' => '2026-10-09', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-10-10', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-10-11', 'close' => '休診日'],
            // 第3週（スポーツの日は休診）
            ['date' => '2026-10-12', 'close' => 'スポーツの日'],
            ['date' => '2026-10-13', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-10-14', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-10-15', 'close' => '休診日'],
            ['date' => '2026-10-16', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-10-17', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-10-18', 'close' => '休診日'],
            // 第4週
            ['date' => '2026-10-19', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-10-20', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-10-21', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-10-22', 'close' => '休診日'],
            ['date' => '2026-10-23', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-10-24', 'am' => 'alise', 'pm' => 'off'],
            ['date' => '2026-10-25', 'close' => '休診日'],
            // 第5週（日は対象月外）
            ['date' => '2026-10-26', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-10-27', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-10-28', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-10-29', 'close' => '休診日'],
            ['date' => '2026-10-30', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-10-31', 'am' => 'matsubara', 'pm' => 'off'],
            [],
        ];

        return [
            '2026-09' => $data_9,
            '2026-10' => $data_10,
        ];
    }
}
