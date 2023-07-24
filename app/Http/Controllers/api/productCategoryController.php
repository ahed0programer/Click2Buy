<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\showproductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class productCategoryController extends Controller
{

    public function getcategory()
    {
        $category = Category::get()->toTree();
        return response()->json([
            'category' => $category
        ]);
    }


    public function productcategory($id)
    {
        $category = Category::find($id);

        $descendants = $category->descendants()->get();
        $descendantsIds = $category->descendants()->pluck('id')->toArray();

        if (!empty($descendantsIds)) {
            $products = Product::whereIn('category_id', $descendantsIds)
                ->where('status', 1)
                ->inRandomOrder()
                ->take(10)
                ->get();

            return response()->json([
                'sub category' => $descendants,
                'products' => showproductResource::collection($products)
            ]);
        }

        $products = Product::where('category_id', $id)->where('status', 1)->get();
        return response()->json([
            'products' => showproductResource::collection($products)
        ]);
    }
}
