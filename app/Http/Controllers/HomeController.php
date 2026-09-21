<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use App\Services\DoctorCalendarService;

class HomeController extends Controller
{
    public function __invoke(NewsRepository $newsRepository, DoctorCalendarService $doctorCalendarService)
    {
        return view('welcome', [
            'news' => $newsRepository->getPublished(),
            'doctor_calendar_data' => $doctorCalendarService->forPublic(),
        ]);
    }
}
