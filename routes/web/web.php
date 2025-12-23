<?php

use App\Http\Controllers\Web\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('', HomePageController::class)->name('home');

require __DIR__ . '/onboarding.php';
require __DIR__ . '/dashboard.php';
require __DIR__ . '/settings.php';
