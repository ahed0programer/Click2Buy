<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class teamController extends Controller
{
    public function ourteam()
    {
        return view('dashbord/team/ourteam');
    }
}
