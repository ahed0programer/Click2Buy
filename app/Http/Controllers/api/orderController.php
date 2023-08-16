<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\orderDetailsResource;
use App\Http\Resources\productsWithaQuantityThatIsNotCommensurateWithTheDemandResource;
use App\Http\Resources\quantityInventoryResource;
use App\Models\Inventory;
use App\Models\Offer;
use App\Models\Order;
use App\Models\orderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function add_order(Request $request)
    {
        $total_price = 0;

        foreach ($request->input('orders') as $order) {
            $quantity_inventory = Inventory::where('id', $order['inventory_id'])->first()->quantity;
            if ($order['quantity'] <= $quantity_inventory) {
                $product = Inventory::where('id', $order['inventory_id'])->first();
                $offer_id = Product::where('id', $product->product_id)->first()->offer_id;
                $offer = Offer::where('id', $offer_id)->first()->value;
                if ($offer == null) {
                    $price_inventory =  ($order['quantity'] * $product->price);
                } else {
                    $price_inventory =  ($order['quantity'] * $product->price);
                    $offer = $offer / 100;
                    $ammount_of_offer = $offer * $price_inventory;
                    $price_inventory = $price_inventory - $ammount_of_offer;
                }
            } else {
                $price_inventory = 0;
            }
            $total_price = $price_inventory + $total_price;
        }

        if ($total_price != 0) {
            $orderid = Order::create([
                'user_id' => Auth::user()->id,
                'total_price' => $total_price,
                'delivery_company_address_id' => $request->delivery_company_address_id,
                'status' => 'waiting',
            ]);



            foreach ($request->input('orders') as $order) {

                $quantity_inventory = Inventory::where('id', $order['inventory_id'])->first()->quantity;

                if ($order['quantity'] <= $quantity_inventory) {
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
            }

            return response()->json([
                'message' => 'order added'
            ]);
        } else {
            return response()->json([
                'message' => 'These quantities are not available',

            ], 403);
        }
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
        ], 403);
    }


    public function delete_order($id)
    {
        Order::where('id', $id)->delete();
        orderDetails::where('order_id', $id)->delete();
        //يجب تسجيل ضريبة 

    }

    public function quantity_inventory(Request $request)
    {
        $inventory_ids = Inventory::wherein('id', $request->input('inventory_ids'))->get();

        return response()->json(
            quantityInventoryResource::collection($inventory_ids)
        );
    }

    public function order_user(Request $request)
    {
        $page = $request->page;
        $perPage = 7;
        $order = Order::where('user_id', Auth::user()->id)->skip(($page - 1) * $perPage)->take($perPage)->get();
        return response()->json(
            orderDetailsResource::collection($order)
        );
    }
}
