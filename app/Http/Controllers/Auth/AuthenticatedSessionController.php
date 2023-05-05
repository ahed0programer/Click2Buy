<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return $request->wantsJson()? $this->login_api($request)
                                    : redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login_api(Request $request){
        $request->validate([
            "email"=>"required|email",
            "password"=>"required|string"
        ]);

        $user =  User::where("email",$request->email)->first();

        if(!$user){
            return response()->json([
                "status"=>false,
                "message"=>__("the email you have entered is incorrect. Don't you have account"),
            ]);
        }
        $AccessToken = $user->createToken("auth_token")->plainTextToken;
    
        return response()->json([
            "status"=>true,
            "message"=>"you are logged in",
            "AccessToken"=>$AccessToken,
        ]);
        
    }

    public function logout_api(){
        auth()->user()->currentAccessToken()->delete();
    
        return response()->json([
            "status"=>true,
            "message"=>"you are logged out"
        ]);
    }
}
