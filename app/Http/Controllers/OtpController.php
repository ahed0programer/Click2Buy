<?php

namespace App\Http\Controllers;

use App\Mail\OtpCodeMailable;
use App\Models\User;
use App\Notifications\OtoNoti_via_SmS;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OtpController extends Controller
{
    //

    public function send(){
        $otp = new Otp();
        $code=$otp->generate("ahed@gmail.com",4,1);
        //Mail::to("ahedsuleiman@gmail.com")->send(new OtpCodeMailable($code->token));
        Notification::sendNow(User::where("id",1)->get(),new OtoNoti_via_SmS("+963996840955"));
        return "please enter the code we just sent to your email";
    }

    public function check($otp_code){
        $otp = new Otp();
        return $otp->validate("ahed@gmail.com", $otp_code);
    }

    public function send_notification(){

        Notification::sendNow(User::where("id",1)->get(),new OtoNoti_via_SmS("+000000"));
        return "notification sent successfuly";
        
    }
}
