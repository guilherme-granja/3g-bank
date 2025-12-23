<?php

use App\Http\Controllers\Web\Onboarding\CheckNifPageController;
use Illuminate\Support\Facades\Route;

Route::prefix('onboarding')->group(function () {
    Route::get('', CheckNifPageController::class)
        ->name('auth.check-nif');
});
