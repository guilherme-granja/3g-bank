<?php

use App\Http\Controllers\Api\Customer\CheckNifController;

Route::prefix('customer')->group(function () {
    Route::get('onboarding/check-nif', CheckNifController::class)
        ->middleware('throttle:public-route')
        ->name('onboarding.check-nif');
});
