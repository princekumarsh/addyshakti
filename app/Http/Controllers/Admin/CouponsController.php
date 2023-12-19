<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CouponBundle;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CouponsController extends Controller
{
    public function sub_category_index(Request $request)
    {

        $data['subCategory'] = Category::where('parent_id', $request->category_id)->where('status', '1')->get();
        // dd($request->all(),$data);/
        return response()->json($data);
    }
    public function vendor_sub_category(Request $request)
    {
        $vendor = Vendor::where('id', $request->vendor_id)->first()->business_category;
        $data['main_category'] = Category::where('id', $vendor)->where('status', '1')->first();
        $data['subCategory'] = Category::where('parent_id', $vendor)->where('status', '1')->get();
        // dd($data, $vendor);
        return response()->json($data);
    }
    public function categoryList()
    {

        $data = Category::where('parent_id',null)->get();
        // dd($data);
        return view('admin.coupon.category.list', compact('data'));
    }
    public function sliderList()
    {

        $data = Banner::all();
        // dd($data);
        return view('admin.slider.list', compact('data'));
    }

    public function categoryAdd()
    {
        return view('admin.coupon.category.add');
    }
    public function sliderAdd()
    {
        return view('admin.slider.add');
    }
    public function sliderEdit($id)
    {
        $data = Banner::find($id);
        return view('admin.slider.add',compact('data'));
    }
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.coupon.category.add', compact('data'));
    }



    public function categoryStore(Request $request)
    {   //dd($request->all());
        $request->validate([
            'title' => 'required',
            //'image' => 'required'
        ], [
            'name.required' => 'Category name is required!',
            // 'image.required' => 'Category image is required!',
        ]);
        if ($request->id) {
            $category =  Category::find($request->id);
            $mess = 'Update successfully';
        } else {
            $category = new Category;
            $mess = 'Add successfully';
        }

        $category->title = $request->title;
        $category->position = 0;
        $category->parent_id = $request->category ?? null;
        $category->save();
        if (isset($request->subcategory)) {
            return redirect()->route('admin.coupon.sub.category.index')->with('success', $mess);
        }
        return redirect()->route('admin.coupon.category.index')->with('success', $mess);
    }
    public function sliderStore(Request $request)
    {   //dd($request->all());
        $request->validate([
            'title' => 'required',
            'image' => 'required_if:type,add|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Category name is required!',
            'image.required' => 'Category image is required!',
        ]);
        if ($request->id) {
            $category =  Banner::find($request->id);
            $mess = 'Update successfully';
        } else {
            $category = new Banner;
            $mess = 'Add successfully';
        }
        $profile_photo = null;
        if ($request->image && $request->type == 'add') {
            $profile_photo = $this->upload('slider/', 'png', $request->file('image'));
        }
        if ($request->image && $request->type == 'edit') {
            $profile_photo = $this->updateImage('slider/', $category->image, 'png', $request->file('image'));
        }
        $category->title = $request->title;
        $category->position = 0;
        $category->image = $profile_photo ?? $category->image;
        $category->save();
        if (isset($request->id)) {
            return redirect()->route('admin.slider.index')->with('success', $mess);
        }
        return redirect()->route('admin.slider.index')->with('success', $mess);
    }

    public function sub_category()
    {
        $data = Category::whereNotIn('parent_id', ['null'])->with('category')->get();
        // dd($data);
        return view('admin.coupon.subcategory.list', compact('data'));
    }

    public function sub_category_create()
    {
        $category = Category::where('parent_id', null)->get();
        return view('admin.coupon.subcategory.add', compact('category'));
    }
    public function sub_category_edit($id)
    {
        $category = Category::where('parent_id', null)->get();
        $data = Category::find($id);
        return view('admin.coupon.subcategory.add', compact('data', 'category'));
    }
    public function couponList($type)
    {
        // if ($type == 'active') {
        //     $status = '1';
        // } else {
        //     $status = '0';
        // }
        $data = Coupon::with([ 'category', 'vendor'])->where('coupon_bundle_id', $type)->get();
        // dd($data);
        return view('admin.coupon.list', compact('data'));
    }

    public function couponAdd($id)
    {
        $couponBundle = CouponBundle::find($id);
        $couponDta = Coupon::where('coupon_bundle_id',$id)->get();
        $coupon =  $couponDta->count() + 1;
        $category = Category::where('parent_id', $couponBundle->category_id)->get();
        $vendors = Vendor::where('status', '1')->get();
        return view('admin.coupon.add', compact('category', 'vendors','id', 'coupon'));
    }
    public function couponEdit($id)
    {

        $data = Coupon::find($id);
        // <!-- dd($data); -->
        $coupon = $data->no_of_coupons;
        $category = Category::where('parent_id', $data->category_id)->get();
        // dd($category);
        $vendor = Vendor::where([['status', '1'],['id',$data->created_by]])->with(['Category'])->first();
        $vendors = Vendor::where([['status', '1']])->get();
        return view('admin.coupon.add', compact('category', 'data', 'vendors', 'coupon'));
    }
    public function couponStore(Request $request)
    {
       //   dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'term_conditions' => 'nullable',
            // 'main_category' => 'required',
            'sub_category' => 'required',
            // 'vendor_id' => 'required',
            // 'price' => 'required',
            'coupon_bundle_id' => 'required',
            // 'discount' => 'nullable',
           'image' => 'required_if:type,add|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        // dd($request->all(),'kk');
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       //   dd($request->all());
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
        // $Coupon_code = 100000 + Coupon::all()->count() + 1;
        $couponBundle = CouponBundle::find($request->coupon_bundle_id);
        // dd($couponBundle->price);
        $Coupon->title = 'null';
        $Coupon->description = $request->description;
        $Coupon->term_conditions = $request->term_conditions;
        $Coupon->category_id = $couponBundle->category_id;
        $Coupon->sub_category_id = $request->sub_category;
        $Coupon->price = $couponBundle->price;
        $Coupon->image = $profile_photo ?? $Coupon->image;
        $Coupon->slug = Str::slug($request->name).'-'.mt_rand(1000000000, 9999999999);
        $Coupon->no_of_coupons = $request->coupon_no;
        $Coupon->discount = 0;
        $Coupon->code = mt_rand(10000, 99999);
        $Coupon->coupon_bundle_id = $request->coupon_bundle_id;
        $Coupon->created_by = $couponBundle->created_by;
        $Coupon->status = '1';
        $Coupon->position = $request->offer;
        // $Coupon->code = $this->CouponCode();
        // dd($Coupon);
        $Coupon->save();
        return redirect()->route('admin.coupon.index', $request->coupon_bundle_id)->with('success', $mess);
    }
    public function categoryDelete($id)
    {
        Category::find($id)->with('sub_category')->delete();

        return redirect()->back()->with('success', 'Category delete successfully!');
    }
    public function sliderDelete($id)
    {
        Banner::find($id)->delete();

        return redirect()->back()->with('success', 'Slider delete successfully!');
    }
    public function MainCategoryDelete($id)
    {
        Category::where([['parent_id', $id]])->delete();
        Category::where([['id',$id]])->delete();


        return redirect()->back()->with('success', 'Category delete successfully!');
    }
    public function couponBundleDelete($id)
    {
        CouponBundle::find($id)->delete();

        return redirect()->back()->with('success', 'Coupon Bundle delete successfully!');
    }
     public function couponDelete($id)
    {
        Coupon::find($id)->delete();

        return redirect()->back()->with('success', 'Coupon  delete successfully!');
    }
    public function status($id, $status)
    {    //dd($id,$status);
        $coupon =  Coupon::find($id);

        $coupon->status = $status;
        $coupon->save();
        if ($status == '1') {
            $mess = 'active';
        } else {
            $mess = 'inactive';
        }
        return redirect()->back()->with('success', 'Coupon Bundle ' . $mess . ' successfully!');
    }
    public function bundleStatus($id, $status)
    {
    //    dd($id,$status);
        if($status == '2'){
            $status = '1';
        }elseif($status == '0'){
            $status = '1';
        }
        else{
            $status = '2';
        }

        $coupon =  CouponBundle::find($id);

        $coupon->status = $status;
        $coupon->save();
        if ($status == '1') {
            $mess = 'active';
        } else {
            $mess = 'inactive';
        }
        return redirect()->back()->with('success', 'Coupon Bundle ' . $mess . ' successfully!');
    }

    public function CouponCode($length = 10)
    {
        // Set the chars
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&?';

        // Count the total chars
        $totalChars = strlen($chars);

        // Get the total repeat
        $totalRepeat = ceil($length / $totalChars);

        // Repeat the string
        $repeatString = str_repeat($chars, $totalRepeat);

        // Shuffle the string result
        $shuffleString = str_shuffle($repeatString);

        // get the result random string
        return substr($shuffleString, 1, $length);
    }



    //bundles

    public function bundleAdd()
    {
        $vendors = Vendor::where('status','1')->get();
        return view('admin.coupon.bundle.add',compact('vendors'));
    }
    public function bundleEdit($id)
    {
        $data = CouponBundle::find($id);
        $vendors = Vendor::where('status', '1')->get();
        // dd($data, $vendors);
        return view('admin.coupon.bundle.add', compact('data', 'vendors'));
    }

    public function bundleList($type,$id)
    {

        $requestCouponBundle = CouponBundle::where('status', '2')->count();
        $activeCouponBundle = CouponBundle::where('status', '1')->count();
        $blockCouponBundle = CouponBundle::where('status', '0')->count();
        $data = CouponBundle::with(['coupon', 'vendor', 'category'])->where('status', $id)->OrderBy('id', 'DESC')->get();
       // dd($requestCouponBundle);
        return view('admin.coupon.bundle.list', compact('data', 'requestCouponBundle', 'activeCouponBundle', 'blockCouponBundle'));
    }


    public function bundleStore(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'term_conditions' => 'required',
            'vendor_id' => 'required',
            'video_link' => 'nullable',
            'expiry_date' => 'nullable',
            'price' => 'required',
            // 'no_of_coupon' => 'required',
            'unit_price' => 'nullable',
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
            $status = $Coupon->status;
        } else {
            $status = '2';
            $Coupon = new CouponBundle();
            $mess = 'Add successfully';
        }
        if ($request->image && $request->type == 'edit') {
            $profile_photo = $this->updateImage('coupon/', $Coupon->image, 'png', $request->file('image'));
        }
        $Coupon->title = $request->name;
        $Coupon->description = $request->description;
        $Coupon->term_conditions = $request->term_conditions;
        // $Coupon->category_id = auth('vendors')->user()->business_category;
        $Coupon->category_id = Vendor::where('id', $request->vendor_id)->first()->business_category;
        $Coupon->sub_category_id = $request->sub_category;
        $Coupon->price = $request->price;
        $Coupon->no_of_coupons = 'admin';
        $Coupon->status = $status;
        $Coupon->discount = $request->unit_price;
        $Coupon->video_link = $request->video_link;
        $Coupon->expiry_date = $request->expiry_date;
        $Coupon->image = $profile_photo ?? $Coupon->image;
        $Coupon->created_by = $request->vendor_id;
        $Coupon->slug = Str::slug($request->name).'-' .str::random(5);
        $Coupon->code = mt_rand(10000, 99999);
        // dd($status, $Coupon);
        $Coupon->save();
        return redirect()->route('admin.coupon.bundle.index',['request','2'])->with('success', $mess);
    }
}