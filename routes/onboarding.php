<?php

use App\Http\Controllers\Auth\CheckNifController;
use Illuminate\Support\Facades\Route;

Route::prefix('onboarding')->group(function () {
    Route::get('', CheckNifController::class)
        ->name('auth.check-nif');
});
