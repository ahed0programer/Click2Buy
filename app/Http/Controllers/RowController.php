<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\productRow;
use App\Models\Row;
use Illuminate\Http\Request;

class RowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showrows()
    {
        $rows = Row::get(['title', 'id']);
        // $product_row_ids = productRow::where('id' , $row_title->id)->pluck('product_id');
        // $product = Product::whereIn('id' , $product_row_ids)->get();
        return view('dashbord/rows/row', compact('rows'));
    }

    public function create_row(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        Row::create([
            'title' => $validatedData['title'],
        ]);

        return redirect()->back();
    }


    public function edit_row(Request $request, $id)
    {
        Row::where('id', $id)->update([
            'title' => $request->title,
        ]);

        return redirect()->back();
    }

    public function soft_delete_row($id)
    {
        Row::where('id', $id)->delete();
        productRow::where('row_id', $id)->delete();

        return redirect()->back();
    }
}
