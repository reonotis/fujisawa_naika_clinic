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

        $data_3 = [
            // 第1週
            ['date' => '2026-03-02', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-03', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-04', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-05', 'close' => '休診日'],
            ['date' => '2026-03-06', 'am' => 'lisuto', 'pm' => 'lisuto'],
            ['date' => '2026-03-07', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-03-08', 'close' => '休診日'],
            // 第2週
            ['date' => '2026-03-09', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-10', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-11', 'am' => 'lisuto', 'pm' => 'lisuto'],
            ['date' => '2026-03-12', 'close' => '休診日'],
            ['date' => '2026-03-13', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-14', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-03-15', 'close' => '休診日'],
            // 第3週
            ['date' => '2026-03-16', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-17', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-18', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-19', 'close' => '休診日'],
            ['date' => '2026-03-20', 'close' => '春分の日'],
            ['date' => '2026-03-21', 'close' => '休診日'],
            ['date' => '2026-03-22', 'close' => '休診日'],
            // 第4週
            ['date' => '2026-03-23', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-24', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-25', 'am' => 'lisuto', 'pm' => 'lisuto'],
            ['date' => '2026-03-26', 'close' => '休診日'],
            ['date' => '2026-03-27', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-28', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-03-29', 'close' => '休診日'],
            // 第5週
            ['date' => '2026-03-30', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-03-31', 'am' => 'alise', 'pm' => 'alise'],
            [],
            [],
            [],
            [],
            [],
        ];


        $data_4 = [
            [],
            [],
            ['date' => '2026-04-01', 'am' => 'sekiguchi', 'pm' => 'sekiguchi'],
            ['date' => '2026-04-02', 'close' => '休診日'],
            ['date' => '2026-04-03', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-04-04', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-04-05', 'close' => '休診日'],
            // 第2週 6〜12日
            ['date' => '2026-04-06', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-07', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-08', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-09', 'close' => '休診日'],
            ['date' => '2026-04-10', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-04-11', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-04-12', 'close' => '休診日'],
            // 第3週 13〜19日
            ['date' => '2026-04-13', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-14', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-15', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-16', 'close' => '休診日'],
            ['date' => '2026-04-17', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-04-18', 'am' => 'alise', 'pm' => 'off'],
            ['date' => '2026-04-19', 'close' => '休診日'],
            // 第4週 20〜26日
            ['date' => '2026-04-20', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-21', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-22', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-23', 'close' => '休診日'],
            ['date' => '2026-04-24', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-04-25', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-04-26', 'close' => '休診日'],
            // 第5週 27〜30日 + 対象月外
            ['date' => '2026-04-27', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-28', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-04-29', 'close' => '昭和の日'],
            ['date' => '2026-04-30', 'close' => '休診日'],
            [],
            [],
            [],  // 5/1, 5/2, 5/3 対象月外
        ];

        $data_5 = [
            // 第1週
            [],
            [],
            [],
            [],
            ['date' => '2026-05-01', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-05-02', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-05-03', 'close' => '休診日'],
            // 第2週
            ['date' => '2026-05-04', 'close' => 'みどりの日'],
            ['date' => '2026-05-05', 'close' => 'こどもの日'],
            ['date' => '2026-05-06', 'close' => '建国記念日'],
            ['date' => '2026-05-07', 'close' => '休診日'],
            ['date' => '2026-05-08', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-05-09', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-05-10', 'close' => '休診日'],
            // 第3週
            ['date' => '2026-05-11', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-05-12', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-05-13', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-05-14', 'close' => '休診日'],
            ['date' => '2026-05-15', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-05-16', 'am' => 'alise', 'pm' => 'off'],
            ['date' => '2026-05-17', 'close' => '休診日'],
            // 第4週
            ['date' => '2026-05-18', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-05-19', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-05-20', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-05-21', 'close' => '休診日'],
            ['date' => '2026-05-22', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-05-23', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-05-24', 'close' => '休診日'],
            // 第5週
            ['date' => '2026-05-25', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-05-26', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-05-27', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-05-28', 'close' => '休診日'],
            ['date' => '2026-05-29', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-05-30', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-05-31', 'close' => '休診日'],
        ];

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
            ['date' => '2026-06-03', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-06-04', 'close' => '休診日'],
            [],
            [],
            [],
        ];

        return [
            '2026-05' => $data_5,
            '2026-06' => $data_6,
        ];
    }
}
