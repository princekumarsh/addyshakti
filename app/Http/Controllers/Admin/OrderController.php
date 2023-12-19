<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        //    $admin = Auth::user()->foruser == '1';
        //    if($admin){
        //         $order = Order::with('user')->get();
        //    }else{
        //        $vendor = auth('vendors')->user()->id;


        //    }
        $order = Order::with('user')->get();

        return view('admin.order.index', compact('order'));
    }
    public function orderDetails($id)
    {
        $order = Order::where('id', $id)->with(['CouponBundle'])->first();
        $orderDetails = OrderDetail::where('order_id', $id)->with(['order', 'vendor', 'coupon'=>function($q){
            $q->with(['category', 'sub_category']);
        },'redeem'])->get();

        return view('admin.order.details', compact('orderDetails', 'order'));
    }

    public function order_status(Request $request)
    {

        $order = Order::where('id', $request->id)->first();
        $order->order_status = $request->status;
        $order->save();

        return response()->json(['status' => true]);
    }
    public function payment_status(Request $request)
    {

        $order = Order::where('id', $request->id)->first();
        $order->payment_status = $request->status;
        $order->save();

        return response()->json(['status' => true]);
    }
}