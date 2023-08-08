<?php

namespace App\Http\Controllers;

use App\Http\Resources\showproductResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add_comment(Request $request, $product_id)
    {
        if (empty(Comment::where('user_id', auth::User()->id)->where('product_id' , $product_id)->first())) {

            Comment::create([
                'user_id' => auth::User()->id,
                'product_id' => $product_id,
                'text' => $request->text
            ]);


            // $product = Product::where('id', $product_id)->first();



            return response()->json([
                "status" => "true",
                'message' => 'comment added',
                // 'product' => showproductResource::collection($product),
            ], 200);
        }
        return response()->json([
            "status" => "false",
            'message' => 'you cant comment more than once',
        ], 301);
    }

    public function edit_comment(Request $request, $comment_id)
    {
        Comment::where('id', $comment_id)
            ->where('user_id', auth::User()->id)
            ->update([
                'text' => $request->text
            ]);

        // $product_id = Comment::where('id', $comment_id)->first()->product_id;
        // $product = Product::where('id', $product_id)->first();
        return response()->json([
            "status" => "true",
            'message' => 'comment edit',
            // 'product' => showproductResource::collection($product),
        ], 200);
    }

    public function soft_delete_comment($comment_id)
    {
        Comment::where('id', $comment_id)
            ->where('user_id', auth::User()->id)
            ->delete();

        // $product_id = Comment::where('id', $comment_id)->first()->product_id;
        // $product = Product::where('id', $product_id)->first();
        return response()->json([
            "status" => "true",
            'message' => 'comment deleted',
            // 'product' => showproductResource::collection($product),
        ], 200);
    }
}
