<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\CPU\ImageManager;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function dashboard()
    {

        return view('admin.index');
    }
    public function subscribe()
    {
        $subscribe = Subscribe::all();
        return view('admin.subscribe',compact('subscribe'));
    }
    public function login()
    {

        return view('admin.login');
    }

    public function createlogin(Request $request)
    {

         $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required',
        ]);

        if($validator->passes()){

            $email = $request->email;
            $password = $request->password;
            $user = User::Where(['email' => $request->email])->OrWhere('phone', $request->email)->first();
            // dd($user);
            if($user == null){
                 Session::flash('flash_message',"Invalid Username or password");
                return redirect()->back();
            }
            $credentials=array("email"=>$user->email,"password"=>$request->password);
            $authSuccess=Auth::attempt($credentials);

            if($authSuccess)
            {
               if(Auth::user()->foruser == "1"){
                    return redirect()->route('admin.dashboard');
               }else{
                    Session::flash('flash_message', "Invalid Username or password");
                    return redirect()->back();
               }

            }else
                {
                    Session::flash('flash_message',"Invalid Username or password");
                    return redirect()->back();
                }
            }else
                {
                Session::flash('flash_message',"Invalid Username or password");
                return redirect()->back();
                }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function sign()
    {
        return view('admin.signup');
    }
    public function createsign(Request $request)
    {

        $v = Validator::make($request->all(), [
            'user_name' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',

          ], $msg = [
            'user_name.required' => 'Kindly Enter your name<br>',
            'email.required' => 'Kindly enter your email address<br>',
            'email.max' => 'Invalid email address<br>',
            'password.required' => 'New password is required<br>',
            'password.min' => 'Password must be atleast 6 characters<br>',
            'confirm_password.required' => 'Confirm password is required<br>',
            'confirm_password.min' => 'Confirm password must be atleast 6 characters<br>',
            'same:password' => 'Password not match'

          ]);


          if ($v->fails()) {
            $errorString = implode("\n", $v->messages()->all());
            Session::flash('flash_message', $errorString);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
          } else {


            $oi = new User();
            $oi->name = $request->user_name;
            $oi->email = $request->email;
            $oi->password = Hash::make($request->password);

            $oi->save();

            return back()
            ->with('success','Your account has been created .');

          }


    }



    public function forget(){
        return view('customer-view.auth.forget');
    }
    public function password_otp(Request $request){
       // dd($request->all());
        $user = User::where('email',$request->username)->first();
        if($user == null){
            return redirect()->back()->with('error','Email id wrong please correct enter email id');
        }
        $token = mt_rand(10000, 99999);
        $data = DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token
        ]);
       // ImageManager::otpMail($token, $user->email);
        Mail::to($request->email)->send(new SendMail($user->email, $token));
        $username = $request->username;
        return view('customer-view.auth.otp',compact('username'));
    }
    public function otp_verify(Request $request){
       //dd($request->all());
        $user = User::where('email',$request->username)->first();
        if($user == null){
            return redirect()->back()->with('error','Email id wrong please correct enter email id');
        }
        $token = mt_rand(10000, 99999);
        $data = DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token
        ]);
        // ImageManager::otpMail($token, $user->email);

         Mail::to($request->email)->send(new SendMail($user->email, $token));

        return view('customer-view.auth.otp');
    }
    public function save_verify(Request $request){


        $data = DB::table('password_resets')->where([['email',$request->username],['token',$request->otp]])->orderBy('id', 'DESC')->first();
        if($data == null){
            return redirect()->back()->with('error','Otp wrong please try again');
        }
        $username = $request->username;
        return view('customer-view.auth.reset_password',compact('username'));
    }
    public function save_password(Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|same:con_password'

        ], [

            'password.required' => 'password is required ',
            'password.same' => 'password not same ',
            'con_password.same' => 'password not same',
            'con_password.required' => 'Confirm password is required',
        ]);

        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = User::where([['email',$request->username]])->first();
        if($data == null){
            return redirect()->back()->with('error','please try again');
        }
        $data->password = Hash::make($request['password']);
        $data->save();
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect()->route('customer.auth.login')->with('success','New password set successfully !');
    }
}