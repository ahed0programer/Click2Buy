<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OtpController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

// Route::group(["prefix"=>"guest"],function (){
//     Route::post("/buy/",[]);
// });

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'login_api']);



Route::middleware('auth:sanctum')->group(function () {

    Route::get("/logout",[AuthenticatedSessionController::class,"logout_api"])->middleware("verified");
    Route::get('/email/send-otp-code',[OtpController::class,"send"])->middleware(['throttle:6,1']);
    
    Route::post('/email/verify/{hash}', [OtpController::class,"verify"])
                ->middleware(['signed','throttle:1,3'])->name('verification.otp');
});

//Route::get('/check-otp-code/{otp_code}',[OtpController::class,"check"]);