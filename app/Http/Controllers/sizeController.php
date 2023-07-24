<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class sizeController extends Controller
{
    public function show_size()
    {
       $sizes = Size::get();
       return view('dashbord/sizes/size', compact('sizes'));

    }

    public function create_size(Request $request)
    {
        // $validatedData = $request->validate([
        //     'size' => 'required',
        // ]);

        Size::create([
            'size' => $request->size,
        ]);

        return redirect()->back();

    }

    public function edit_size(Request $request, $id)
    {
        Size::where('id', $id)->update([
            'size' => $request->size,
        ]);

        return redirect()->back();
    }

    public function soft_delete_size($id)
    {
        Size::where('id', $id)->delete();

        return redirect()->back();
    }
}
