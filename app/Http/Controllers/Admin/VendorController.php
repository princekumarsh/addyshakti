<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function vendorAdd()
    {   $category = Category::where('parent_id',null)->get();
        return view('admin.vendor.add',compact('category'));
    }
     public function vendorEdit($id)
    {   $category = Category::where('parent_id',null)->get();
        $data = Vendor::find($id);
        return view('admin.vendor.add',compact('category', 'data'));
    }
    public function vendorList($type)
    {    if ($type == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }
        $vendor = Vendor::orderBy('id',"desc")->with(['Category'])->where('status',$status)->get();

        return view('admin.vendor.list',compact('vendor'));
    }

    public function vendorCreate(Request $request)
    {   //dd('hjj');
        $v = Validator::make($request->all(), [
            'company_name' => 'required',
            'company_address' => 'required',
            'business_category' => 'required',
            'fname' => 'required',
            'type' => 'required',
            'lname' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:10|max:10',
            // 'logo' => 'required|image|mimes:jpeg,png,jpg|max:1048',
            'logo' => 'required_if:type,add|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ], $msg = [
            'company_name.required' => 'Kindly Enter Company Name </br>',
            'company_address.required' => 'Kindly Enter Company Address </br>',
            'business_category.required' => 'Kindly Enter Business Category </br>',
            'fname.required' => 'Kindly Enter First Name </br>',
            'lname.required' => 'Kindly Enter Last Name</br>',
            'email.required' => 'Kindly enter your email address<br>',
            'email.max' => 'Invalid email address<br>',
            'phone.required' => 'Kindly Enter Your Phone Number</br>',
	        'phone.min' => 'Invalid phone number</br>',
	        'phone.max' => 'Invalid phone number</br>',
            'logo.required' => 'Kindly Upload Logo</br>',
            'logo.mimes' => 'Logo must be in jpeg (.jpeg),png (.png),jpg (.jpg) format</br>',
            'logo.max' => 'Logo size must be in 1 MB file',

          ]);


          if ($v->fails()) {
            $errorString = implode("\n", $v->messages()->all());
            Session::flash('flash_message', $errorString);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
          } else {

            $photo1 = "";

            // if ($request->hasFile('logo')) {

            //   // Upload path
            //   $destinationPath = 'uploads/Vendor/';
            //   // Create directory if not exists
            //   if (!file_exists($destinationPath)) {
            //     mkdir($destinationPath, 0755, true);
            //   }
            //   // Get file extension
            //   $extension = $request->file('logo')->getClientOriginalExtension();
            //   // Valid extensions
            //   $validextensions = array("jpeg", "jpg", "png");
            //   $mime = $request->file('logo')->getMimeType();
            //   // Check extension
            //   if (in_array(strtolower($extension), $validextensions)) {
            //     // Rename file
            //     $fileName = explode(".", $request->file('logo')->getClientOriginalName())[0] . time() . '.' . $extension;
            //     $fileName = preg_replace("/[^A-Za-z0-9 ]/", '', $fileName);
            //     $fileName = preg_replace("/\s+/", '-', $fileName);
            //     // Uploading file to given path
            //     $file =  $request->file('logo');
            //     $file->move($destinationPath, $fileName);
            //     $url = "https://mostoreonline.com/addyshakti/";

            //     $photo1 = $destinationPath . $fileName;
            //    // $photo1 = '/' . $destinationPath . $fileName;
            //   }
            // } else {
            //   $photo1 = "";
            // }

            $logo = null;
            if ($request->logo) {
                $logo = $this->upload('vender/company_logo/', 'png', $request->file('logo'));
            }

            if($request->type == 'edit'){
                 $v =   Vendor::find($request->id);
                $mse ='update';
            }else{
                $v =  new Vendor;
                $mse = 'add';
            }


              $v->company_name = $request->company_name;
              $v->company_gst = $request->company_gst;
              $v->company_address = $request->company_address;
              $v->business_category = $request->business_category;
              $v->fname = $request->fname;
              $v->lname = $request->lname;
              $v->email  = $request->email;
              $v->phone  = $request->phone;
              $v->slug = Str::slug($request->fname." ".$request->lname." ".$request->company_name);
              $v->logo = $logo ?? $v->logo;
              $v->status = 1;
              $v->password = Hash::make($request['password']);;

              $v->save();

             return redirect()->route('admin.vendor.index', 'active')
                  ->with('success','Vendor '.$mse.' Successfully');
          }

    }
    public function vendorDelete($id)
    {

        Vendor::find($id)->delete();
        return back()
                ->with('success','Vendor has been Deleted.');

    }
    public function status($id, $status)
    {    //dd($id,$status);
        $coupon =  Vendor::find($id);

        $coupon->status = $status;
        $coupon->save();
        if ($status == '1') {
            $mess = 'active';
            $type = 'active';
        }
        else{
            $mess = 'inactive';
            $type = 'pending';
        }
        return redirect()->route('admin.vendor.index',[$type])->with('success', 'Vendor ' . $mess . ' successfully!');
    }
}