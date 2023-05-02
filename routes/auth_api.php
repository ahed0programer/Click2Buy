<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"guest"],function (){
    Route::post("/buy/",[]);
});

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'login_api']);



Route::middleware('auth:sanctum')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->middleware(['throttle:6,1'])
                ->name('verification.notice');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
 
    //return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::group(["middlware"=>["auth:sanctum","verified"]],function (){
    Route::post("/buy/",[]);
});




Route::get('/send-otp-code',[OtpController::class,"send"]);
Route::get('/check-otp-code/{otp_code}',[OtpController::class,"check"]);