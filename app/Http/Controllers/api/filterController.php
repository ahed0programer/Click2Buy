<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\showproductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Inventory;
use App\Models\Material;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class filterController extends Controller
{
    public function filter_elements()
    {
        $categorys = Category::get()->toTree();
        $colours = Colour::get(['name']);
        $materials = Material::get(['name']);
        $sizes = Size::get(['size']);
        $brands = Brand::get(['name']);

        return response()->json([
            'category' => $categorys,
            'colour' => $colours,
            'material' => $materials,
            'size' => $sizes,
            'brand' => $brands,
        ]);
    }

    public function search_filter(Request $request)
    {

        $product_query = Product::with(['category', 'brand', 'sizes', 'colours', 'Materials']);

        if($request->text && $request->text != 'null' && $request->text != 'men'){
            $product_query->where('titel', 'like', '%'.$request->text.'%')
            ->orWhere('descraption', 'like', '%'.$request->text.'%');
            
        }

        if($request->text && $request->text != 'null' && $request->text == 'men'){
            $product_query->where('descraption', 'REGEXP', '[[:<:]]' . 'men' . '[[:>:]]')
            ->orWhere('titel', 'REGEXP', '[[:<:]]' . 'men' . '[[:>:]]');
        }


        if ($request->category && $request->category != 'null') {
            $product_query->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            });
        }

        if ($request->brand && $request->brand != 'null') {
            $product_query->whereHas('brand', function ($query) use ($request) {
                $query->where('name', $request->brand);
            });
        }

        if ($request->colour && $request->colour != 'null') {
            $product_query->whereHas('colours', function ($query) use ($request) {
                $query->where('name', $request->colour);
            });
        }

        if ($request->size && $request->size != 'null') {
            $product_query->whereHas('sizes', function ($query) use ($request) {
                $query->where('size', $request->size);
            });
        }

        if ($request->material && $request->material != 'null') {
            $product_query->whereHas('Materials', function ($query) use ($request) {
                $query->where('name', $request->material);
            });
        }

        if ($product_query->where('status' , 1)->count() > 0) {
            $products = $product_query->latest()->get();
            return response()->json(
                showproductResource::collection($products)
            );
        } else
        return response()->json([
            
        ]);
            
    }
}
