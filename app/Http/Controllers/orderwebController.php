<?php

namespace App\Http\Controllers;

use App\Events\orderDeleiveredE;
use App\Events\OrderDelivered;
use App\Http\Resources\orderDetailsResource;
use App\Models\deliveryCompanyAddress;
use App\Models\Evaluation;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\orderDetails;
use App\Models\photoProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class orderwebController extends Controller
{
    public function show_order()
    {
        $orders = Order::where('status', 'waiting')->get();

        // foreach ($orders as $order) {
        //     $order_details = orderDetails::where('order_id', $order->id)->get();
        // }
        return view('dashbord/order/order', compact('orders'));
    }

    public function show_status_order($status)
    {
        $orders = Order::where('status', $status)->get();

        return view('dashbord/order/order', compact('orders'));
    }


    public function details_order($id)
    {
        $orders = Order::where('id' , $id)->get();
        foreach ($orders as $order) {
            $order_details = orderDetails::where('order_id', $order->id)->get();
        }

        return view('dashbord/order/detailsOrder' , compact('order_details'));
    }
    

    public function processing_order($order_id)
    {
        Order::where('id' , $order_id)->update([
            'status' => 'processing'
        ]);

        $orders = Order::where('status', 'waiting')->get();

        return view('dashbord/order/order', compact('orders'));
    }

    public function delivered_order()
    {
        // $order =Order::where('id' , $order_id)->update([
        //     'status' => 'delivered'
        // ]);

        

        orderDeleiveredE::dispatch("ahed",1);

        return "ahed dd jkkj";

        // $orders = Order::where('status', 'waiting')->get();
        // return view('dashbord/order/order', compact('orders'));
    }
}
