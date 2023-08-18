<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\topBar;
use Illuminate\Http\Request;

class topBarController extends Controller
{
    public function get_photo_top_bar()
    {
        $top_bar = topBar::get('photo');
        return response()->json(
            $top_bar
        );
    }
}
