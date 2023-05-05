<?php

namespace App\Http\Controllers;

use App\Jobs\SendOtpCodeJob;
use App\Mail\OtpCodeMailable;
use App\Models\User;
use App\Notifications\OtoNoti_via_SmS;
use Ichtrojan\Otp\Otp;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class OtpController extends Controller
{
    //

    public function send(){
        $otp = new Otp();
        //$user =User::find("id",auth()->user()->id);
        $code=$otp->generate(auth()->user()->id,5,3);
        dispatch(new SendOtpCodeJob($code));
        //Notification::sendNow(User::where("id",1)->get(),new OtoNoti_via_SmS("+963996840955"));
        return response()->json([
            "status"=>1,
            "message"=>__("please enter the verification code we sent to your email"),
            "url"=>URL::signedRoute('verification.otp', ['id' => auth()->user()->id])
        ]);
    }

    public function verify(Request $request , $otp_code) {

        $otp = new Otp();
        $user =User::where("id",auth()->user()->id)->first();

        $result_of_check =$otp->validate(auth()->user()->id, $request->otp_code);
        if( $result_of_check->status)
        {
            //$request->fulfill();
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
    
                event(new Verified($user));
            }

        }else{
            return response()->json([
                "status"=>0,
                "message"=>$result_of_check
            ],404);
        }

        return response()->json([
            "status"=>1,
            "message"=>"your email has been verified"
        ]);
        
    }

    public function send_notification(){

        Notification::sendNow(User::where("id",1)->get(),new OtoNoti_via_SmS("+000000"));
        return "notification sent successfuly";
    }
}
