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

        $data_7 = [
            // 第1週（月火は対象月外）
            [],
            [],
            ['date' => '2026-07-01', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-07-02', 'close' => '休診日'],
            ['date' => '2026-07-03', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-07-04', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-07-05', 'close' => '休診日'],
            // 第2週
            ['date' => '2026-07-06', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-07-07', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-07-08', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-07-09', 'close' => '休診日'],
            ['date' => '2026-07-10', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-07-11', 'am' => 'alise', 'pm' => 'off'],  // 藤澤先生（松原先生代理）
            ['date' => '2026-07-12', 'close' => '休診日'],
            // 第3週
            ['date' => '2026-07-13', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-07-14', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-07-15', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-07-16', 'close' => '休診日'],
            ['date' => '2026-07-17', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-07-18', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-07-19', 'close' => '休診日'],
            // 第4週
            ['date' => '2026-07-20', 'close' => '海の日'],
            ['date' => '2026-07-21', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-07-22', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-07-23', 'close' => '休診日'],
            ['date' => '2026-07-24', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-07-25', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-07-26', 'close' => '休診日'],
            // 第5週（土日は対象月外）
            ['date' => '2026-07-27', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-07-28', 'am' => 'sekiguchi', 'pm' => 'sekiguchi'],  // 終日関口先生
            ['date' => '2026-07-29', 'am' => 'alise', 'pm' => 'alise'],  // 藤澤先生（関口先生なし）
            ['date' => '2026-07-30', 'close' => '休診日'],
            ['date' => '2026-07-31', 'am' => 'alise', 'pm' => 'fukushima'],
            [],
            [],
        ];

        $data_8 = [
            // 第1週（月〜金は対象月外）
            [],
            [],
            [],
            [],
            [],
            ['date' => '2026-08-01', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-08-02', 'close' => '休診日'],
            // 第2週
            ['date' => '2026-08-03', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-08-04', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-08-05', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-08-06', 'close' => '休診日'],
            ['date' => '2026-08-07', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-08-08', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-08-09', 'close' => '休診日'],
            // 第3週（お盆期間も通常診療）
            ['date' => '2026-08-10', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-08-11', 'close' => '山の日'],
            ['date' => '2026-08-12', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-08-13', 'close' => '休診日'],
            ['date' => '2026-08-14', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-08-15', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-08-16', 'close' => '休診日'],
            // 第4週（8/20〜夏期休暇）
            ['date' => '2026-08-17', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-08-18', 'am' => 'alise', 'pm' => 'alise'],
            ['date' => '2026-08-19', 'am' => 'alise', 'pm' => 'sekiguchi'],
            ['date' => '2026-08-20', 'close' => '夏期休暇'],
            ['date' => '2026-08-21', 'close' => '夏期休暇'],
            ['date' => '2026-08-22', 'close' => '夏期休暇'],
            ['date' => '2026-08-23', 'close' => '夏期休暇'],
            // 第5週（〜8/27夏期休暇）
            ['date' => '2026-08-24', 'close' => '夏期休暇'],
            ['date' => '2026-08-25', 'close' => '夏期休暇'],
            ['date' => '2026-08-26', 'close' => '夏期休暇'],
            ['date' => '2026-08-27', 'close' => '夏期休暇'],
            ['date' => '2026-08-28', 'am' => 'alise', 'pm' => 'fukushima'],
            ['date' => '2026-08-29', 'am' => 'matsubara', 'pm' => 'off'],
            ['date' => '2026-08-30', 'close' => '休診日'],
            // 第6週
            ['date' => '2026-08-31', 'am' => 'alise', 'pm' => 'alise'],
            [],
            [],
            [],
            [],
            [],
            [],
        ];

        return [
            '2026-07' => $data_7,
            '2026-08' => $data_8,
        ];
    }
}
