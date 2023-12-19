<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

// use Validator;
use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function UserList()
    {
        $user = User::where('foruser','0')->orderBy('id','DESC')->get();

        return view('admin.user.list',compact('user'));
    }

    public function UserAdd()
    {
        return view('admin.user.add');
    }

    public function UserCreate(Request $request)
    {
        $v = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
            'conform_password' => 'required|same:password',
            'login_activision' => 'required',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:1048'

          ], $msg = [
            'fname.required' => 'Kindly Enter First Name </br>',
            'lname.required' => 'Kindly Enter Last Name</br>',
            'email.required' => 'Kindly enter your email address<br>',
            'email.max' => 'Invalid email address<br>',
            'password.required' => 'New password is required<br>',
            'password.min' => 'Password must be atleast 6 characters<br>',
            'conform_password.required' => 'Conform password is required<br>',
            'conform_password.min' => 'Conform password must be atleast 6 characters<br>',
            'same:password' => 'Password not match',
            'login_activision.required' => 'Kindly Select Login Activision</br>',
            'profile_photo.required' => 'Kindly Upload Profile Photo</br>',
            'profile_photo.mimes' => 'Profile Photo must be in jpeg (.jpeg),png (.png),jpg (.jpg) format</br>',
            'profile_photo.max' => 'Profile Photo size must be in 1 MB file',

          ]);


          if ($v->fails()) {
            $errorString = implode("\n", $v->messages()->all());
            Session::flash('flash_message', $errorString);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
          } else {

            $photo1 = "";

            if ($request->hasFile('profile_photo')) {

              // Upload path
              $destinationPath = 'uploads/User/';
              // Create directory if not exists
              if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
              }
              // Get file extension
              $extension = $request->file('profile_photo')->getClientOriginalExtension();
              // Valid extensions
              $validextensions = array("jpeg", "jpg", "png");
              $mime = $request->file('profile_photo')->getMimeType();
              // Check extension
              if (in_array(strtolower($extension), $validextensions)) {
                // Rename file
                $fileName = explode(".", $request->file('profile_photo')->getClientOriginalName())[0] . time() . '.' . $extension;
                $fileName = preg_replace("/[^A-Za-z0-9 ]/", '', $fileName);
                $fileName = preg_replace("/\s+/", '-', $fileName);
                // Uploading file to given path
                $file =  $request->file('profile_photo');
                $file->move($destinationPath, $fileName);
                $url = "https://mostoreonline.com/addyshakti/";

                $photo1 = $url . '/' . $destinationPath . $fileName;
               // $photo1 = '/' . $destinationPath . $fileName;
              }
            } else {
              $photo1 = "";
            }


            $u =  new User ;

              $u->name = $request->fname." ".$request->lname;
              $u->email  = $request->email;
              $u->slug = Str::slug($request->fname." ".$request->lname);
              $u->password = Hash::make($request->password);
              $u->login_activision = $request->login_activision;
              $u->profile_photo = $photo1;

              $u->save();

             return back()
                  ->with('success','User Add Successfully');
          }

        }

        public function UserDelete($id)
        {
            User::find($id)->delete();
         return back()
        ->with('success','User has been Deleted.');

        }
        
        public function status($id, $status)
    {    //dd($id,$status);
        $coupon =  User::find($id);

        $coupon->login_activision = $status;
        $coupon->save();
        if ($status == 'active') {
            $mess = 'active';
            $type = 'active';
        } else {
            $mess = 'inactive';
            $type = 'pending';
        }
        return redirect()->back()->with('success', 'User ' . $mess . ' successfully!');

   }
}