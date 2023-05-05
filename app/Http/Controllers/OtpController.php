<?php

namespace App\Http\Controllers;

use App\Jobs\SendOtpCodeJob;
use App\Models\User;
use App\Notifications\OtoNoti_via_SmS;
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
    //

    public function send(){
        $otp = new Otp();
        $user =User::find("id",auth()->user()->id);
        $code=$otp->generate($user->id,5,3);
        dispatch(new SendOtpCodeJob($user->email,$code));
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

    public function sendResetPasswordOtpCode($email){
        $otp = new Otp();
        $user =User::find("email",$email);

        $code=$otp->generate($user->id,5,3);

        dispatch(new SendOtpCodeJob($user->email,$code));

        //Notification::sendNow(User::where("id",1)->get(),new OtoNoti_via_SmS("+963996840955"));
        return response()->json([
            "status"=>1,
            "message"=>__("please enter the OTP code we emailed to you to reset your password"),
        ]);
    }

    public function check_otp_code_to_password_reset(Request $request){

        $request->validate([
            "email"=>"required|email",
            "token"=>"required"
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
                "message"=>"incorrect code",
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

        $result_of_check =$otp->validate($user->id, $request->otp_code);

        if($result_of_check->status)
        {
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
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>$result_of_check
            ],404);
        }

        return response()->json([
            "status"=>true,
            "message"=>"your password has been reset"
        ]);
    }

    public function send_notification(){

        Notification::sendNow(User::where("id",1)->get(),new OtoNoti_via_SmS("+000000"));
        return "notification sent successfuly";
    }
}
