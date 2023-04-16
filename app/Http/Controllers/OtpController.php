<?php

namespace App\Http\Controllers;

use App\Mail\OtpCodeMailable;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    //

    public function send(){
        $otp = new Otp();
        $code=$otp->generate("ahed@gmail.com",4,1);
        Mail::to("ahedsuleiman@gmail.com")->send(new OtpCodeMailable($code->token));
        return "please enter the code we just sent to your email";
        
    }

    public function check($otp_code){
        $otp = new Otp();
        return $otp->validate("ahed@gmail.com", $otp_code);
    }

}
