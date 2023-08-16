<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Evaluation;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentEvaluationController extends Controller
{
    public function add_comment_evaluation(Request $request, $product_id)
    {

        $message_evaluation = '';
        $message_comment = '';

        if ($request->evaluation) {
            if (empty(Evaluation::where('user_id', Auth::User()->id)->where('product_id', $product_id)->first())) {
                Evaluation::create([
                    'user_id' => Auth::User()->id,
                    'product_id' => $product_id,
                    'evaluation' => $request->evaluation
                ]);

                $evaluation = Evaluation::where('product_id', $product_id)->avg('evaluation');
                Product::where('id', $product_id)->update([
                    'evaluation' => $evaluation,
                ]);

                $message_evaluation = 'evaluation added';
            } else {

                $message_evaluation = 'you cant evaluation more than once';
            }
        }

        if ($request->text) {
            if (empty(Comment::where('user_id', auth::User()->id)->where('product_id', $product_id)->first())) {

                Comment::create([
                    'user_id' => auth::User()->id,
                    'product_id' => $product_id,
                    'text' => $request->text
                ]);

                $message_comment = 'comment added';
            } else {

                $message_comment = 'you cant comment more than once';
            }
        }


        if ($message_comment == 'you cant comment more than once' && $message_evaluation == 'you cant evaluation more than once') {
            return response()->json([
                'message_comment' => $message_comment,
                'message_evaluation' => $message_evaluation
            ], 403);
        }

        return response()->json([
            'message_comment' => $message_comment,
            'message_evaluation' => $message_evaluation
        ]);
    }


    public function edit_comment_evaluation(Request $request, $evaluation_id, $comment_id)
    {

        $message_evaluation = '';
        $message_comment = '';

        if ($request->evaluation) {
            Evaluation::where('id', $evaluation_id)
                ->where('user_id', auth::User()->id)
                ->update([
                    'evaluation' => $request->evaluation
                ]);

            $product_id = Evaluation::where('id', $evaluation_id)->where('user_id', auth::user()->id)->first()->product_id;
            $evaluation = Evaluation::where('product_id', $product_id)->avg('evaluation');

            Product::where('id', $product_id)->update([
                'evaluation' => $evaluation,
            ]);

            $message_evaluation = 'evaluation edit';
        }

        if ($request->text) {
            Comment::where('id', $comment_id)
                ->where('user_id', auth::User()->id)
                ->update([
                    'text' => $request->text
                ]);

            $message_comment = 'comment edit';
        }

        return response()->json([
            'message_comment' => $message_comment,
           'message_evaluation' => $message_evaluation
        ]);
    }

    public function get_user_comment_evaluation()
    {
        $comment = Comment::where('user_id', Auth::user()->id)->get(['id', 'text']);
        $evaluation = Evaluation::where('user_id', Auth::user()->id)->get(['id', 'evaluation']);

        return response()->json([
            'comment' => $comment,
            'evaluation' => $evaluation
        ]);
    }
}
