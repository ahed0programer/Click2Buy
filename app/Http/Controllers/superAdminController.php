<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class superAdminController extends Controller
{
    public function add_new_account()
    {
        //
    }

    public function edit_account()
    {
        //
    }

    public function show_account_user()
    {
        //
    }

    public function delete_account()
    {
        //
    }

    public function add_size(Request $request)
    {
        if (empty(Size::where('size', $request->size)->first())) {
            Size::create([
                'size' => $request->size,
            ]);
            return response()->json([
                "status" => 1,
                'message' => 'size added',
            ], 200);
        }

        return response()->json([
            "status" => 0,
            'message' => 'This size is pre-added',
        ], 301);
    }
}
