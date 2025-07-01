<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('/lectures', LectureController::class);

Route::resource('/students', StudentController::class);

Route::resource('/proposals', ProposalController::class);
