<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\showproductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class serchController extends Controller
{
    public function serch(Request $request)
    {
        if (Brand::where('name', 'like', '%' . $request->serch . '%')->first()) {
            $brand_id = Brand::where('name', 'like', '%' . $request->serch . '%')->pluck('id');
        }
        $brand_id = [0];

        $products = Product::whereIn('brand_id' , $brand_id)
            ->where('status', 1)
            ->orwhere('titel', 'like', '%' . $request->serch . '%')
            ->where('status', 1)

            ->latest()
            ->get();

        if (count($products) == 0) {
            return response()->json([
                'message' => 'No Product'
            ]);
        }

        return response()->json([
            // 'asd' => $request->serch,
            // 'asd' => $category_id
            'products' => showproductResource::collection($products)
        ]);
    }
}
