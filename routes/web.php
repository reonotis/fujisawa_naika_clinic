<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SelfPayController;

Route::get('/', HomeController::class)->name('top');


Route::get('/endoscopy', function () {
    return view('endoscopy.index');
})->name('endoscopy');

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
