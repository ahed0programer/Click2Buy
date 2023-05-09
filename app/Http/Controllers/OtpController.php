<?php

namespace App\Http\Controllers;

use App\Jobs\SendingOTPcodeJob;
use App\Jobs\SendOtpCodeJob;
use App\Jobs\test;
use App\Models\User;
use App\Notifications\OtoNoti_via_SmS;
use App\Notifications\ResetPasswordCodeNoti;
use Ichtrojan\Otp\Otp;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    // this part is related to email verification operation
    // the otp code is sent by email 
    // ........

    public function send(){
        $otp = new Otp();
        $user = User::where("id",auth()->user()->id)->first();
        $code=$otp->generate($user->id,5,3);

        $user->notify(new OtoNoti_via_SmS($code->token));

        //dispatch(new SendOtpCodeJob($user->email,$code));
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
        if($result_of_check->status)
        {
            //$request->fulfill();
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
    
                event(new Verified($user));
            }
            else{
                return response()->json([
                    "status"=>0,
                    "message"=>"your email has already been verified",
                    "result_of_check"=>$result_of_check
                ],404);
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

    // the part below is related to forgot password operation
    // this happen on 3 phases :
    // 1- requesting otp code   
    // 2- checking the otp code and returning a reset token
    // 3- reset password 

    public function sendResetPasswordOtpCode($email){
        $otp = new Otp();
        $user =User::where("email",$email)->first();

        if(!$user){
            return response()->json([
                "status"=>false,
                "message"=>__("incorrect email !!"),
            ]);
        }

        $code=$otp->generate($user->id,5,3);

        $user->notify(new ResetPasswordCodeNoti($code->token));

        return response()->json([
            "status"=>1,
            "message"=>__("please enter the OTP code we emailed to you to reset your password"),
        ]);
    }

    public function check_otp_code_to_password_reset(Request $request){

        $request->validate([
            "email"=>"required|email",
            "code"=>"required"
        ]);

        $otp = new Otp();
        $user =User::where("email",$request->email)->first();

        if(!$user){
            return response()->json([
                "status"=>false,
                "message"=>"the email is incorrect",
            ],401);
        }
        
        $check = $otp->validate($user->id , $request->code);

        if($check->status){

            $reset_token=Password::createToken($user);

            return response()->json([
                "status"=>true,
                "message"=>"please enter the new password",
                "reset_token"=>$reset_token
            ]);

        }else{
            return response()->json([
                "status"=>false,
                "message"=>"incorrect OTP code",
                "OTP"=>$check
            ]);
        }

    }

    public function resetPassword(Request $request,){

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $otp = new Otp();

        $user =User::where("email",$request->email)->first();

        if(!$user){
            return response()->json([
                "status"=>0,
                "message"=>"your email is inncorrect",
            ],404);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
        
                $user->save();
        
                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ?  response()->json([ "message"=>"your password has been reset" ])
            :  response()->json([ "message"=>"failed to reset your password" ],500);
        
    }

}
