<?php

namespace App\Http\Controllers;

use App\Http\Resources\showproductResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;
use App\Models\Product;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function add_evaluation(Request $request, $product_id)
    {
        if (empty(Evaluation::where('user_id', auth::User()->id)->first())) {
            Evaluation::create([
                'user_id' => auth::User()->id,
                'product_id' => $product_id,
                'evaluation' => $request->evaluation
            ]);

            $evaluation = Evaluation::where('product_id', $product_id)->avg('evaluation');
            Product::where('id' , $product_id)->update([
                'evaluation' => $evaluation,
            ]);

            // $product = Product::where('id', $product_id)->first();
            return response()->json([
                "status" => 1,
                'message' => 'evaluation added',
                // 'product' => showproductResource::collection($product),
            ], 200);
        }
        return response()->json([
            "status" => 0,
            'message' => 'you cant evaluation more than once',
        ], 301);

    }

    public function edit_evaluation(Request $request, $evaluation_id)
    {
        Evaluation::where('id', $evaluation_id)
            ->where('user_id', auth::User()->id)
            ->update([
                'evaluation' => $request->evaluation
            ]);

            $product_id = Evaluation::where('id' , $evaluation_id)->where('user_id', auth::user()->id)->first()->product_id;
            $evaluation = Evaluation::where('product_id', $product_id)->avg('evaluation');
            Product::where('id' , $product_id)->update([
                'evaluation' => $evaluation,
            ]);

        

        return response()->json([
            "status" => 1,
            'message' => 'evaluation edit',
            // 'product' => showproductResource::collection($product),
        ], 200);
    }

    public function soft_delete_evaluation($evaluation_id)
    {
        $product_id = Evaluation::where('id' , $evaluation_id)->where('user_id', auth::user()->id)->first()->product_id;

        Evaluation::where('id', $evaluation_id)->where('user_id', auth::User()->id)->delete();

            $evaluation = Evaluation::where('product_id', $product_id)->avg('evaluation');
            Product::where('id' , $product_id)->update([
                'evaluation' => $evaluation,
            ]);

        // $product_id = Evaluation::where('id', $evaluation_id)->first();
        // $product = Product::where('id', $product_id)->first();
        return response()->json([
            "status" => 1,
            'message' => 'evaluation deleted',
            // 'product' => showproductResource::collection($product),
        ], 200);
    }
}
