<?php

use App\Http\Controllers\Auth\CheckNifController;
use Illuminate\Support\Facades\Route;

Route::get('check-nif', CheckNifController::class)->name('auth.check-nif');
