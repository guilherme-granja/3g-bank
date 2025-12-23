<?php

use App\Http\Controllers\Web\DashboardPageController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardPageController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
