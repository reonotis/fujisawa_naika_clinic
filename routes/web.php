<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DoctorCalendarController as AdminDoctorCalendarController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SelfPayController;

Route::get('/', HomeController::class)->name('top');


Route::get('/endoscopy', function () {
    return view('endoscopy.index');
})->name('endoscopy');

Route::get('/ct', function () {
    return view('ct.index');
})->name('ct');

Route::prefix('self-pay')->group(function () {
    Route::get('/', function () {
        return view('self_pay.index');
    })->name('self_pay');

    Route::get('laser', [SelfPayController::class, 'index'])->defaults('type', 'laser')->name('laser_notice');
    Route::get('shiratama', [SelfPayController::class, 'index'])->defaults('type', 'shiratama')->name('shiratama_notice');
});


Route::prefix('notice')->group(function () {
    Route::get('maina', [NoticeController::class, 'index'])->defaults('type', 'maina')->name('maina_notice');
    Route::get('ai-xray', [NoticeController::class, 'index'])->defaults('type', 'ai_xray')->name('ai_xray_notice');
    Route::get('kensin', [NoticeController::class, 'index'])->defaults('type', 'kensin')->name('kensin_notice');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminLoginController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('news.index');
        Route::get('news/create', [AdminNewsController::class, 'create'])->name('news.create');
        Route::post('news', [AdminNewsController::class, 'store'])->name('news.store');
        Route::get('news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
        Route::put('news/{news}', [AdminNewsController::class, 'update'])->name('news.update');
        Route::get('doctor-calendar', [AdminDoctorCalendarController::class, 'index'])->name('doctor_calendar.index');
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    });
});
