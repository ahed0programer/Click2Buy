<?php

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OtpController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::get('send-notification',[OtpController::class,"send_notification"]);

require __DIR__."auth_api.php";