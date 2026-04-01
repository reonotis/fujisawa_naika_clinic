<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;

Route::get('/', HomeController::class)->name('top');


Route::prefix('notice')->group(function () {
    Route::get('maina', [NoticeController::class, 'index'])->defaults('type', 'maina')->name('maina_notice');
});
