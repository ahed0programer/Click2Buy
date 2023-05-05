<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OtpController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'login_api']);



Route::middleware('auth:sanctum')->group(function () {

    Route::get("/logout",[AuthenticatedSessionController::class,"logout_api"])->middleware("verified");

    Route::get('/email/send-otp-code',[OtpController::class,"send"])
                ->middleware(['throttle:1,3']);

    Route::post('/email/verify/{id}', [OtpController::class,"verify"])
                ->middleware(['signed','throttle:5,3'])->name('verification.otp');
});
