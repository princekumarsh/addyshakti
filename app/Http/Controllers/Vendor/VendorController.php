<?php

namespace App\Http\Controllers\vendor;

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use App\Models\CouponBundle;
use App\Models\RedeemCoupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function login(Request $request)
    {  //dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            //'keep_logged' => 'required'
        ]);
        //recaptcha validation
        // dd($request->all());

        $remember = ($request['remember']) ? true : false;
        // dd('kk');
        $user = Vendor::Where(['email' => $request->username])->OrWhere('phone', $request->username)->first();
    //    dd($user);
        if (isset($user) == false) {
            //Toastr::error('Credentials do not match or account has been suspended.');
            return back()->with('error', 'You are not Register User Before Register and after Login ');
        }
        if ($user->status == '0') {
            return back()->with('error', 'Your are not verify user');
        }


        if ($user->status == '1') {
            if (isset($user) && auth('vendors')->attempt(['email' => $user->email, 'password' => $request->password])) {
                //dd(session('keep_return_url'),route('customer.auth.login'));

                return redirect()->route('vendor.dashboard')->with('success', 'You are  Login Successfully');
            }
        }





        return back()->with('error', 'Credentials do not match or account has been suspended.');
    }

    public function logout(Request $request)
    {
        auth()->guard('vendors')->logout();
        //session()->forget('wish_list');
        $request->session()->invalidate();

        return redirect()->route('vendor.login')->with('info', 'Come back soon, ' . '!');
    }
    public function profile()
    {
        $category = Category::where('parent_id', null)->get();
        return view('vendor.account.profile', compact('category'));
    }
    public function create()
    {
        $category = Category::where('parent_id', null)->get();
        return view('vendor.auth.register', compact('category'));
    }

    public function store(Request $request)
    {  // dd($request->all());
        // $request->validate([
        //     'f_name' => 'required',
        //     'l_name' => 'required',
        //     'email' => 'required|email|unique:vendors',
        //     'phone' => 'required|unique:vendors',
        //     'c_name' => 'required',
        //     'c_address' => 'required',
        //     'c_gst' => 'required',
        //     'category' => 'nullable',
        //     'company_logo' => 'required',
        //     'password' => 'required|min:8|same:con_password'
        // ], [
        //     'f_name.required' => 'First name is required',
        // ]);
             $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:vendors',
            'phone' => 'required|unique:vendors',
            'c_name' => 'required|',
            'c_address' => 'required',
            'address_link' => 'required',
            'c_gst' => 'required',
            'category' => 'nullable',
            'company_logo' => 'required',
            'password' => 'required|min:8|same:con_password'

        ],[
            'f_name.required' => 'First name is required',
            'l_name.required' => 'Last name is required',
            'c_address.required' => 'Last name is required',
            'address_link.required' => 'Company address Google map link is required',
            'c_gst.required' => 'Company gst is required',
            'email.required' => 'email is required ',
            'phone.required' => 'phone is required ',
            'phone.unique' => 'phone is already exits',
            'email.unique' => 'email is already exits',
            'company_logo.required' => 'company logo is required ',
            'password.required' => 'password is required ',
            'password.same' => 'password not same ',
            'con_password.same' => 'password not same',
            'con_password.required' => 'con_password is required',
        ]);

        if ($validator->fails()) {
           // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //recaptcha validation
        // dd($request->all());
        $profile_photo = null;
        if ($request->company_logo) {
            $profile_photo = $this->upload('vender/company_logo/', 'png', $request->file('company_logo'));
        }
        $vender = new Vendor();
        $vender->fname = $request['f_name'];
        $vender->lname = $request['l_name'];
        $vender->email = $request['email'];
        $vender->phone = $request['phone'];
        $vender->company_name = $request['c_name'];
        $vender->company_gst = $request['c_gst'];
        $vender->company_address = $request['c_address'];
        $vender->address_link = $request['address_link'];
        $vender->business_category = $request['category'] ?? null;
        $vender->logo = $profile_photo;
        $vender->slug = Str::slug($request->f_name .str::random(5). $request->l_name);

        $vender->password = Hash::make($request['password']);
        $vender->save();

        return redirect()->route('vendor.sign.in')->with('success', 'Register Successfully');
    }
    public function sing_in()
    {
        session()->put('keep_return_url', url()->previous());
        $auth = auth('vendors')->user();
        if ($auth) {
            return view('vendor.dashboard');
        }
        return view('vendor.auth.login');
    }
    public function dashboard()
    {
        return view('vendor.dashboard');
    }
    public function couponAdd($id)
    {
        $couponBundle = CouponBundle::find($id);
        $category = Category::where('parent_id', $couponBundle->category_id)->get();
        // $category = Category::where('id', auth('vendors')->user()->business_category)->with(['sub_category'])->first();
       // dd($category);
        // $CouponBundle = CouponBundle::where('created_by', auth('vendors')->user()->id)->get();
        return view('vendor.coupon.add', compact('category',  'id'));
    }

    public function couponStore(Request $request)
    {
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            // 'main_category' => 'required',
            'sub_category' => 'required',
            //'price' => 'required',
            // 'no_of_coupon' => 'required',
            'coupon_bundle_id' => 'required',
            // 'discount' => 'nullable',
            'offer' => 'nullable',
            'image' => 'required_if:type,add|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //  dd($request->all());
        $profile_photo = null;
        if ($request->image && $request->type == 'add') {
            $profile_photo = $this->upload('coupon/', 'png', $request->file('image'));
        }

        if ($request->id) {
            $Coupon =  Coupon::find($request->id);
            $mess = 'Update successfully';
        } else {
            $Coupon = new Coupon();
            $mess = 'Add successfully';
        }
        if ($request->image && $request->type == 'edit') {
            $profile_photo = $this->updateImage('coupon/', $Coupon->image, 'png', $request->file('image'));
        }
        $couponBundle = CouponBundle::find($request->coupon_bundle_id);
        $Coupon->title = 'demo';
        $Coupon->description = $request->description;
        $Coupon->category_id = $couponBundle->category_id;
        $Coupon->sub_category_id = $request->sub_category;
        $Coupon->price = $couponBundle->price;
        $Coupon->image = $profile_photo ?? $Coupon->image;
        $Coupon->slug = Str::slug($request->name) . '-' . mt_rand(1000000000, 9999999999);
        $Coupon->no_of_coupons = 'user';
        $Coupon->discount = 0;
        $Coupon->code = mt_rand(10000, 99999);
        $Coupon->coupon_bundle_id = $request->coupon_bundle_id;
        $Coupon->created_by = $couponBundle->created_by;
        $Coupon->status = '1';
        $Coupon->position = $request->offer;
        // $Coupon->code = $this->CouponCode();
        // dd($Coupon);
        // $Coupon->save();
        $Coupon->save();
        return redirect()->route('vendor.coupon.index', $request->coupon_bundle_id)->with('success', $mess);
    }

    public function couponList($type)
    {
        // if ($type == 'active') {
        //     $status = '1';
        // } else {
        //     $status = '0';
        // }
        // dd(auth('vendors')->user()->id);
        $data = Coupon::with(['sub_category', 'category'])->where([['coupon_bundle_id', $type], ['created_by', auth('vendors')->user()->id]])->get();
        return view('vendor.coupon.list', compact('data'));
    }


    public function redeem()
    {
        $users = User::where([['login_activision', 'active'], ['foruser', '0']])->get();
        return view('vendor.coupon.redeem.redeem', compact('users'));
    }
    public function RedeemPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'key' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $coupon = Coupon::where('code', $request->code)->first();
        //    dd($request->all(), $coupon);
        //  $user= User::where('id',$request->user_id)->first();
        //
        if ($coupon) {

            $orderDetails = OrderDetail::where([['coupon_id', $coupon->id], ['key_id', $request->key]])->with(['redeem'])->first();
            //dd($orderDetails);
            if($orderDetails->redeem){
                return redirect()->back()->with('error', 'coupon code already use');
            }
            $order = Order::where([['id', $orderDetails->order_id]])->where('order_status','confirm')->first();
            if($order == null){
                return redirect()->back()->with('error', 'coupon status is pending contact with Admin ');
            }

            $couponDetails = json_decode($orderDetails['coupon_details']);
            // dd($couponDetails);
            if ($order) {
                if ($orderDetails) {
                    // dd($orderDetails);
                    // if($orderDetails->qty * $couponDetails->no_of_coupons == $orderDetails->use_coupon){
                    //         return redirect()->back()->with('error', 'total coupon use');
                    // }else{
                    $redeem = new RedeemCoupon();
                    $redeem->order_details_id = $orderDetails->id;
                    $redeem->user_id = $order->user_id;
                    $redeem->no_of_use_coupon = 1;
                    $redeem->save();

                    $orderDetails->use_coupon = $orderDetails->use_coupon + 1;
                    $orderDetails->save();
                    //  dd('done');
                    return redirect()->back()->with('success', 'coupon use successfully');
                    // }

                } else {
                    return redirect()->back()->with('error', 'server error throw');
                }
            } else {
                return redirect()->back()->with('error', 'coupon code key not correct');
            }
        } else {
            return redirect()->back()->with('error', 'coupon code not correct');
        }
        return view('vendor.coupon.redeem.redeem');
    }


    //order section vendor wise

    public function order()
    {
        $vendor = auth('vendors')->user()->id;

        $orderDetails = OrderDetail::where('vendor_id', $vendor)->select('order_id')->groupBy('order_id')->get();
        // dd($orderDetails);
        $order = [];
        foreach ($orderDetails as $orderDetail) {
            $order = Order::with('user')->where('id', $orderDetail->order_id)->get();
        }

        return view('vendor.order.index', compact('order'));
    }
    public function orderDetails($id)
    {
        $order = Order::where('id', $id)->first();
        $orderDetails = OrderDetail::where('order_id', $id)->with(['order', 'vendor','coupon' => function ($q) {
            $q->with(['coupon_bundle']);
        }, 'redeem'])->get();

        return view('vendor.order.details', compact('orderDetails', 'order'));
    }

    public function bundleList()
    {
        $data = CouponBundle::where('created_by', auth('vendors')->user()->id)->with(['coupon', 'category'])->get();
        // dd($category);
        return view('vendor.coupon.bundle.list', compact('data'));
    }

    public function bundleAdd()
    {
        $category = Category::where('parent_id', auth('vendors')->user()->business_category)->get();
        // dd($category);
        return view('vendor.coupon.bundle.add', compact('category'));
    }

    public function bundleStore(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'video_link' => 'nullable',
            'expiry_date' => 'nullable',
            // 'main_category' => 'required',
            // 'sub_category' => 'required',
            'price' => 'required',
            // 'no_of_coupon' => 'required',
            // 'discount' => 'nullable',
            'image' => 'required_if:type,add|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //  dd($request->all());
        $profile_photo = null;
        if ($request->image && $request->type == 'add') {
            $profile_photo = $this->upload('coupon/', 'png', $request->file('image'));
        }

        if ($request->id) {
            $Coupon =  CouponBundle::find($request->id);
            $mess = 'Update successfully';
        } else {
            $Coupon = new CouponBundle();
            $mess = 'Add successfully';
        }
        if ($request->image && $request->type == 'edit') {
            $profile_photo = $this->updateImage('coupon/', $Coupon->image, 'png', $request->file('image'));
        }
        $Coupon->title = $request->name;
        $Coupon->description = $request->description;
        $Coupon->category_id = auth('vendors')->user()->business_category;
        // $Coupon->sub_category_id = $request->sub_category;
        $Coupon->price = $request->price;
        $Coupon->no_of_coupons = 0;
        $Coupon->discount = 0;
        $Coupon->video_link = $request->video_link;
        $Coupon->expiry_date = $request->expiry_date;
        $Coupon->image = $profile_photo ?? $Coupon->image;
        $Coupon->created_by = auth('vendors')->user()->id;
        $Coupon->slug = Str::slug($request->name).'-'.mt_rand(10000, 99999);
        $Coupon->code = mt_rand(10000, 99999);

        $Coupon->save();
        return redirect()->route('vendor.coupon.bundle.index')->with('success', $mess);
    }

    public function bundleRequestSend($id){
        $CouponBundle = CouponBundle::where('id',$id)->first();
        $CouponBundle->status= '2';
        $CouponBundle->save();
        return redirect()->back()->with('success', 'Request send successfully!');
    }
}