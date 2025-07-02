<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\MemberCompetitionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('members', MemberController::class);

Route::resource('positions', PositionController::class);

Route::resource('competitions', CompetitionController::class);

Route::resource('member-competitions', MemberCompetitionController::class);
