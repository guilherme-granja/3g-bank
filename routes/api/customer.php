<?php

use App\Http\Controllers\Api\Customer\{
    CheckNifController,
    CreateCustomerController
};

Route::prefix('customer')->group(function () {
    Route::get('onboarding/check-nif', CheckNifController::class)
        ->middleware('throttle:public-route')
        ->name('onboarding.check-nif');

    Route::post('', CreateCustomerController::class)
        ->middleware('throttle:public-route')
        ->name('create');
})->name('customer.');
