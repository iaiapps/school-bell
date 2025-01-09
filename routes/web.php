<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\ScheduleController;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('cluster', ClusterController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('file', FileController::class);
});
