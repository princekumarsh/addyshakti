<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\BasicInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\CPU\ImageManager;
use App\Models\AddToCart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AccountController extends Controller
{
    //
    public function profile()
    {

        return view('customer-view.account.profile');
    }
    public function update(Request $request)
    {   //dd($request->all());
        $admin = User::find(auth('customer')->user()->id);
        // dd($admin);
        $admin->name = $request->username;
        $admin->l_name = $request->l_name;
        $admin->phone = $request->phone;
        // $admin->email = $request->email;
        if ($request->image) {
            $admin->profile_photo = $this->updateImage('user/', $admin->profile_photo, 'png', $request->file('image'));
        }
        $admin->save();
        //Toastr::info('Profile updated successfully!');
        return back()->with('success', 'Profile updated successfully!');
    }
    public function password()
    {
        return view('customer-view.account.password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth('customer')->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth('customer')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
    }

    public function addToCart(Request $request)
    {
      // dd($request->all());
        $exit = AddToCart::where([['user_id', auth('customer')->user()->id], ['coupon_id', $request->id]])->first();
        if ($exit) {
            return redirect()->back()->with('error', 'Already Add this coupon');
        } else {
            $addToCart = new AddToCart();
            $addToCart->user_id = auth('customer')->user()->id;
            $addToCart->qty = $request->qty;
            $addToCart->coupon_id = $request->id;
            $addToCart->save();

            return redirect()->route('customer.add.to.cart.item')->with('success', 'Add to cart Successfully');
        }
    }
    public function addInfo()
    {

        $info = BasicInfo::where('user_id', auth('customer')->user()->id)->get();


        return view('customer-view.account.info', compact('info'));
    }
    public function addInfoSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'vehicle_no' => 'required',
            'make_model' => 'required',
            'IRD' => 'required',
            // 'date_of_issue' => 'required',
            // 'payment_method' => 'required',
        ],[
            'name.required' => 'Kindly Enter name',
            'vehicle_no.required' => 'Kindly Enter vehicle_no',
            'make_model.required' => 'Kindly Enter make_model',
            'IRD.required' => 'Enter IRD',
            // 'lname.required' => 'Kindly Enter Last Name</br>',
            'email.required' => 'Kindly enter your email address<br>',

            'contact.required' => 'Kindly Enter Your Phone Number</br>',


          ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $info = DB::table('basic_info')->insert([
        //     'user_id' => auth('customer')->user()->id,
        //     'info' => json_encode($request->all()),
        // ]);
        $info = new BasicInfo();
        $info->user_id = auth('customer')->user()->id;
        $info->info = json_encode($request->all());
        $info->save();

// dd($info);
        return redirect()->route('customer.checkout.details',[$info->id]);
    }
    public function addToCartItem()
    {
        // dd($request->all());
        $AddToCartItems = AddToCart::where([['user_id', auth('customer')->user()->id]])->with(['CouponBundle'=> function($q) {
            $q->with(['coupon']);
        }])->get();
       // dd($AddToCartItems);

        return view('customer-view.account.addToCart', compact('AddToCartItems'));
    }
    public function addToCartDelete(Request $request, $id)
    {
        //dd($request->all(),$id);
        $AddToCartItems =
            AddToCart::where([['user_id', auth('customer')->user()->id], ['id', $id]])->delete();

        if ($AddToCartItems) {
            return redirect()->back()->with('success', 'Cart Item delete Successfully');
        }
        return redirect()->back()->with('error', 'Server issue');
    }

    public function check_out_complete(Request $request )
    {
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            // 'contact' => 'required',
            // 'email' => 'required',
            // 'vehicle_no' => 'required',
            // 'make_model' => 'required',
            // 'IRD' => 'required',
            'info_id' => 'required',
            'payment_method' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $info = DB::table('basic_info')->where('id', $request->info_id)->first();
        $type = $request->payment_method;
        $carts = AddToCart::where([['user_id', auth('customer')->user()->id]])->with(['CouponBundle' => function ($q) {
            $q->with(['coupon']);
        }])->get();
       //dd($carts,$type);
        $order_amount = 0;
        if ($carts) {
            // foreach ($carts as $o) {
            //     $order_amount +=
            //         ($o->qty * $o->CouponBundle->price);

            //     $coupon_bundle_id =
            //         $o->coupon_id; //   CouponBundle id  as coupon_id
            //     // $discount_amount +=0;
            // }

            if ($type == 'COD') {

                foreach ($carts as $cart) {
                    //  dd($cart);
                    $order = new Order();
                    $order->user_id = auth('customer')->user()->id;
                    $order->customer_type = 'customer';
                    $order->payment_method = $type ?? 'COD';
                    $order->order_amount = $cart->CouponBundle->price;
                    $order->coupon_bundle_id = $cart->coupon_id;
                    $order->information = $info->info;
                    $order->expiry_date = Carbon::now()->addMonths($cart->CouponBundle->expiry_date) ;
                    $order->save();
                    foreach($cart->CouponBundle->coupon as $coupon){
                    $coupon_details = Coupon::where('id', $coupon->id)->first();
                    $order_details = new OrderDetail();
                    $order_details->order_id = $order->id;
                    $order_details->coupon_id = $coupon->id;
                    $order_details->vendor_id = $coupon->created_by;
                    $order_details->qty = $cart->qty;
                    $order_details->price = $coupon->price;
                    $order_details->tax = '0';
                    $order_details->key_id = mt_rand(10000, 99999);
                    $order_details->coupon_details = json_encode($coupon_details);
                    // $order_details->tax = ($cart->product->purchase_price / 100) * $cart->product->tax;
                    $order_details->save();
                    }

                }
                AddToCart::where([['user_id', auth('customer')->user()->id]])->delete();
                // return redirect()->back()->with('success','Order create successfully!');
                return view('customer-view.account.checkout-complete');
            } else {
                return redirect()->back()->with('error', 'something wrong');
            }
        } else {
            return redirect()->back()->with('error', 'something wrong');
        }
        //  dd($order_amount, $type);

    }


    public function checkOut($id)
    {

        $carts = AddToCart::where([['user_id', auth('customer')->user()->id]])->with(['CouponBundle' => function ($q) {
            $q->with(['coupon']);
        }])->get();
       // dd($carts);
        $CouponBundle = [];
        $order_amount = 0;

        foreach ($carts as $cart) {
            $order_amount +=
                ($cart->qty * $cart->CouponBundle->price);
            // $discount_amount +=0;

        }
        return view('customer-view.account.checkout', compact('order_amount', 'carts','id'));
    }

    public function myOrder()
    {
        $orders = Order::with('user','CouponBundle','CouponBundle.vendor')->where('user_id', auth('customer')->user()->id)->orderBy('id', 'DESC')->get();
        return view('customer-view.account.myOrder', compact('orders'));
    }
    public function OrderDetails($id)
    {
        $order = Order::with(['user', 'CouponBundle.category'])->where('id', $id)->first();
        // dd($order);
        $OrderDetail = OrderDetail::with(['order', 'coupon' => function ($q) {
            $q->with(['category', 'sub_category']);
        }, 'redeem'])->where('order_id', $id)->get(); //dd($OrderDetail);
        return view('customer-view.account.orderDetails', compact('order', 'OrderDetail'));
    }
    public function checkoutDetails($id)
    {
        $basic_info = BasicInfo::where('id',$id)->first();
        $carts = AddToCart::where([['user_id', auth('customer')->user()->id]])->with(['CouponBundle' => function ($q) {
            $q->with(['coupon']);
        }])->get();
       // dd($carts);
        $CouponBundle = [];
        $order_amount = 0;

        foreach ($carts as $cart) {
            $order_amount +=
                ($cart->qty * $cart->CouponBundle->price);
            // $discount_amount +=0;

        }
        return view('customer-view.account.checkoutDetails',compact('basic_info','order_amount','carts'));
    }
    public function singleCouponDetail($id,$order_id)
    {
        $coupon = Coupon::where('id',$id)->with('vendor','sub_category')->first();
        $order = OrderDetail::where('id',$order_id)->first();
        // dd($coupon,$order);
        return view('customer-view.account.singleCouponDetail',compact('coupon', 'order'));
    }
}