<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\rowProductResource;
use App\Http\Resources\showproductResource;
use App\Models\Product;
use App\Models\productRow;
use App\Models\Row;
use Illuminate\Http\Request;

class productHomeController extends Controller
{
    public function row_product ()
    {
        $row = Row::get();
        return response()->json([
           'row_product_home' => rowProductResource::collection($row)
        ]);
    }

    public function see_more_row_product ($row_id)
    {
        $product_id = productRow::where('row_id' , $row_id)->pluck('product_id');
        $product = Product::whereIn('id' , $product_id)->where('status' , 1)->latest()->get();
        $product = showproductResource::collection($product);
        return response()->json([
           'product' => $product
        ]);
    }
}
