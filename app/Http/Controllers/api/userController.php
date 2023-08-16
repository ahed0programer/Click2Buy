<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function edit_name_phone(Request $request)
    {
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number
        ]);

        return response()->json([
            'status' => true
        ]);
    }

    public function edit_password(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        $user = User::where('id', Auth::user()->id)->first();

        if (Hash::check($validate['old_password'], $user->password)) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($validate['new_password'])
            ]);

            $response = [
                'message' => 'updated password',
            ];

            return response($response, 200);
        } else {
            return response([
                'message' => 'The password is wrong'
            ],403);
        }
    }

    public function check_password(Request $request)
    {
        $validate = $request->validate([
            'password' => 'required',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if (Hash::check($validate['password'], $user->password)) {
            return response()->json([
                'status' => true
            ]);
        }

        return response()->json([
            'message' => 'The password is wrong'
        ],403);
    }
}
