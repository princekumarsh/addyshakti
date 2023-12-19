<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CouponBundle;
use App\Models\Subscribe;
use App\Models\Vendor;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\CPU\ImageManager;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{   
    public function notAccess(){
        $userLogin = auth('customer')->user();
       if($userLogin == null){
            return redirect()->route('customer.auth.login');
       }else{
           return redirect()->route('index');
       }
    }
    public function index()
    {   
       
        
        $bestCoupon = CouponBundle::where('status', '1')->with(['coupon', 'category'])->get();
        $topCategory = Category::where('parent_id',null)->get();
        $vendor = Vendor::where([['status', '1']])->get();
        // dd($bestCoupon);
        
        return view('web-views.home',compact('bestCoupon', 'topCategory', 'vendor'));
    }

    public function coupon()
    {
        $coupons = CouponBundle::where('status', '1')->with(['vendor', 'category', 'coupon'])->get();
        return view('web-views.coupon',compact('coupons'));
    }
    
     public function admin()
    {
        
        return redirect()->route('login');
    }
    public function coupon_details($slug)
    {
        $CouponBundle =  CouponBundle::where([['status', '1'], ['slug', $slug]])->with(['vendor', 'category',  'coupon'=> function($q){
            $q->with('sub_category');
        }])->first();
     //  dd($CouponBundle);
        if($CouponBundle){
            $Coupon = Coupon::where([['status', '1'],['coupon_bundle_id', $CouponBundle->id]])->with(['vendor', 'category'])->first();
        }else{
             return redirect()->back()->with('error','not found!');
        }
        
        //dd($CouponBundle->id);
        $relatedCoupon =   CouponBundle::where([['status', '1'], ['category_id', $CouponBundle->category_id]])->with(['vendor', 'category', 'coupon'])->whereNotIn('slug',[$slug])->get();
        return view('web-views.coupon-details',compact('Coupon', 'relatedCoupon', 'CouponBundle'));
    }
    public function store()
    {
        $stores = Vendor::where('status','1')->with('Category')->get();
        return view('web-views.store',compact('stores'));
    }
    public function category()
    {
        $category = Category::where([['status','1'],['parent_id',null]])->with(['sub_category'])->get();
        return view('web-views.category',compact('category'));
    }
    public function categoryWiseProduct($slug)
    {
        $category = Category::where('id',$slug)->with(['sub_category'])->first();
        $title = $category->title;
        $name = 'Coupons';
        $coupons = CouponBundle::where([['status','1'],['category_id',$slug]])->with(['coupon'])->get();
        return view('web-views.coupon1',compact('coupons', 'title', 'name'));
    }

    public function storeWiseProduct($slug)
    {
        $category = Vendor::where('id', $slug)->with(['Category'])->first();
        $title = $category->company_name;
        $name = 'Stores';
        $coupons = CouponBundle::where([['status', '1'], ['created_by', $slug]])->with(['coupon'])->get();
        // dd($coupons);
        return view('web-views.coupon1', compact('coupons', 'title', 'name'));
    }
    public function store_details()
    {
        return view('web-views.store-details');
    }
    public function privacy_policy(){
         return view('web-views.privacy-policy');
    }


    public function subscribe(Request $request){
        $validator = Validator::make($request->all(), [
           
            'email' => 'required|email|unique:subscribes',
            
        ],
            [

                'email.required' => 'email is required ',
               
                'email.unique' => 'email is already exits',
               

            ]);
       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->save();
        return redirect()->back()->with('success', 'Subscribe successfully');
    }
    public function search(Request $request)
    {
        $bestCoupon = CouponBundle::where('status', '1')->where('title','Like','%'.$request->key.'%')->with(['coupon'])->get();
        // dd($bestCoupon);
        $topCategory = Category::where('parent_id', null)->get();
        $vendor = Vendor::where([['status', '1']])->get();
        //dd($bestCoupon);
        return view('web-views.home', compact('bestCoupon', 'topCategory', 'vendor'));
    }
}