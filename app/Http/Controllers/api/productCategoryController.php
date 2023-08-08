<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ctegoryResource;
use App\Http\Resources\showproductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class productCategoryController extends Controller
{

    public function getcategory()
    {
        $category = Category::get()->toTree();

        return response()->json(
            ctegoryResource::collection($category)
        );
    }


    public function productcategory(Request $request, $id)
    {
        $category = Category::find($id);
        $descendants = $category->descendants()->get();
        $descendantsIds = $category->descendants()->pluck('id')->toArray();

        if (!empty($descendantsIds)) {
            $products = Product::whereIn('category_id', $descendantsIds)
                ->where('status', 1)
                ->inRandomOrder()
                ->take(9)
                ->get();

            return response()->json([
                'sub category' => ctegoryResource::collection($descendants),
                'products' => showproductResource::collection($products)
            ]);
        }

        $page = $request->page;
        $perPage = 10;
        $products = Product::where('category_id', $id)->where('status', 1)->skip(($page - 1) * $perPage)->take($perPage)->get();

        // $products = Product::where('category_id', $id)->where('status', 1);
        return response()->json([
            'products' => showproductResource::collection($products)
        ]);
    }
}
