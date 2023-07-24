<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function edit_profile(Request $request)
    {
        User::where('id', auth::User()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            "status" => 1,
            'messagge' => "updated success",
        ], 200);
    }
}
