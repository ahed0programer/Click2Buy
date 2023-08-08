<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\orderDetailsResource;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\orderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function add_order(Request $request)
    {
        $orderid = Order::create([
            'user_id' => Auth::user()->id,
            'total_price' => $request->total_price,
            'delivery_company_address_id' => $request->delivery_company_address_id,
            'status' => 'waiting',
        ]);

        foreach ($request->input('orders') as $order) {
            orderDetails::create([
                'order_id' => $orderid->id,
                'product_id' => Inventory::where('id', $order['inventory_id'])->first()->product_id,
                'inventory_id' => $order['inventory_id'],
                'quantity' => $order['quantity'],
            ]);

            $quantity = Inventory::where('id', $order['inventory_id'])->first()->quantity;
            Inventory::where('id', $order['inventory_id'])->update([
                'quantity' => $quantity - $order['quantity'],
            ]);
        }

        return response()->json([
            'message' => 'order added'
        ]);
    }


    public function update_order(Request $request, $id)
    {
        if (Order::where('user_id', Auth::user()->id)->where('id', $id)->where('status', ['waiting', 'processing'])) {

            Order::where('id', $id)
                ->update([
                    'total_price' => $request->total_price,
                    'delivery_company_address_id' => $request->delivery_company_address_id,
                    'status' => 'waiting',
                ]);

            foreach ($request->input('deletions') as $deletions) {

                $old_quantity = orderDetails::where('order_id', $request->order_id)
                    ->where('inventory_id', $deletions)->first();
                $edit_quantity = Inventory::where('id', $old_quantity->inventory_id)->first();
                $new_quantity =  $edit_quantity->quantity + $old_quantity->quantity;

                Inventory::where('id', $old_quantity->inventory_id)->update([
                    'quantity' =>  $new_quantity,
                ]);


                orderDetails::where('order_id', $request->order_id)->where('inventory_id', $deletions)->delete();

            }


            foreach ($request->input('edits') as $edits) {

                $old_quantity = orderDetails::where('order_id', $request->order_id)
                    ->where('inventory_id', $edits['inventory_id'])->first();

                $edit_quantity = Inventory::where('id', $old_quantity->inventory_id)->first();
                $new_quantity =  $edit_quantity->quantity + $old_quantity->quantity;

                Inventory::where('id', $old_quantity->inventory_id)->update([
                    'quantity' =>  $new_quantity - $edits['quantity'],
                ]);

                orderDetails::where('order_id', $request->order_id)
                    ->where('inventory_id', $edits['inventory_id'])
                    ->update([
                        'quantity' => $edits['quantity'],
                    ]);
            }
            return response()->json([
                'message' => 'order updated'
            ]);
        }


        return response()->json([
            'message' => 'We apologize that this order has entered the delivery stage'
        ]);
    }


    public function delete_order($id)
    {
        Order::where('id', $id)->delete();
        orderDetails::where('order_id', $id)->delete();
        //يجب تسجيل ضريبة 

    }

    public function order_user()
    {
        $order = Order::where('user_id' , Auth::user()->id)->get();
        return response()->json(
            orderDetailsResource::collection($order)
        );
    }
}
