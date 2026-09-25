<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DoctorCalendarController as AdminDoctorCalendarController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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
    Route::get('vaccine', [SelfPayController::class, 'index'])->defaults('type', 'vaccine')->name('vaccine_notice');
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
        Route::post('doctor-calendar/publications', [AdminDoctorCalendarController::class, 'storePublication'])->name('doctor_calendar.publications.store');
        Route::put('doctor-calendar/publications/{publication}', [AdminDoctorCalendarController::class, 'updatePublication'])->name('doctor_calendar.publications.update');
        Route::delete('doctor-calendar/publications/{publication}', [AdminDoctorCalendarController::class, 'destroyPublication'])->name('doctor_calendar.publications.destroy');
        Route::put('doctor-calendar/doctors/reorder', [AdminDoctorCalendarController::class, 'reorderDoctors'])->name('doctor_calendar.doctors.reorder');
        Route::post('doctor-calendar/doctors',[AdminDoctorCalendarController::class, 'storeDoctor'])->name('doctor_calendar.doctors.store');
        Route::put('doctor-calendar/doctors/{doctor}', [AdminDoctorCalendarController::class, 'updateDoctor'])->name('doctor_calendar.doctors.update');
        Route::put('doctor-calendar/weekly', [AdminDoctorCalendarController::class, 'updateWeekly'])->name('doctor_calendar.weekly.update');
        Route::post('doctor-calendar/overrides', [AdminDoctorCalendarController::class, 'saveOverride'])->name('doctor_calendar.overrides.save');
        Route::delete('doctor-calendar/overrides/{override}', [AdminDoctorCalendarController::class, 'destroyOverride'])->name('doctor_calendar.overrides.destroy');
        Route::post('doctor-calendar/holidays', [AdminDoctorCalendarController::class, 'storeHoliday'])->name('doctor_calendar.holidays.store');
        Route::delete('doctor-calendar/holidays/{holiday}', [AdminDoctorCalendarController::class, 'destroyHoliday'])->name('doctor_calendar.holidays.destroy');
        Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
        Route::post('logout',[AdminLoginController::class, 'logout'])->name('logout');
    });
});
