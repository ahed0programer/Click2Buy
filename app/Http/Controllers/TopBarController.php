<?php

namespace App\Http\Controllers;

use App\Models\topBar;
use Illuminate\Http\Request;

class TopBarController extends Controller
{
    public function show()
    {
        $photo_top_bar = topBar::paginate(12);
        return view('dashbord/top_bar/top_bar', compact('photo_top_bar'));
    }


    public function add_photo_top_bar(Request $request)
    {
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('photos_top_bar', 'public');
            topBar::create([
                'photo' => $path,
            ]);
        }

        return redirect()->back();
    }

    public function soft_delete_photo_top_bar($id)
    {
        topBar::where('id', $id)->delete();
        return redirect()->back();
    }
}
