<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\showproductResource;
use App\Models\Product;
use App\Models\wishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishListController extends Controller
{
    public function show_wish_list()
    {
        $product_id = wishList::where('user_id' , Auth::user()->id)->get('product_id');
        $product = Product::wherein('id' , $product_id)->get();
        
        return response()->json(
            showproductResource::collection($product)
        );
    }

    public function add_wish_list($product_id)
    {
        if (empty(wishList::where('user_id', Auth::user()->id)->where('product_id', $product_id)->first())) {
            wishList::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product_id
            ]);

            return response()->json([
                'message' => 'product added to your wish list'
            ]);
        }

        return response()->json([
            'message' => 'This product is already added to your wish list'
        ]);
    }


    public function delete_wish_list($wish_list_id)
    {
        wishList::where('id' , $wish_list_id)->where('user_id' , Auth::user()->id)->delete();

        return response()->json([
            'message' => 'Removed'
        ]);
    }
}
