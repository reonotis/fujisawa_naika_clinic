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

        return [
            '2026-08' => $data_8,
            '2026-09' => $data_9,
        ];
    }
}
