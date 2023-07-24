<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\showproductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class detailsProductController extends Controller
{
    public function details_product($id)
    {
        $product = Product::where('id' , $id)->get();
        return response()->json([
            'details' => showproductResource::collection($product)
        ]);
    }
}
