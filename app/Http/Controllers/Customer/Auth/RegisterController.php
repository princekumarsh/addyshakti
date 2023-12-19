<?php
namespace App\Http\Controllers\Customer\Auth;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register()
    {
       // session()->put('keep_return_url', url()->previous());
        return view('customer-view.auth.register');
    }
    public function submit(Request $request)
    {   //dd($request->all());
        // $request->validate([
        //     'f_name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'phone' => 'unique:users',
        //     'password' => 'required|min:8|same:con_password'
        // ], [
        //     'f_name.required' => 'First name is required',
        //     'email.required' => 'Email already exits',
        //     'phone.required' => 'phone no already exits',
        //     'con_password.required' => 'confirm password dose not match',
        // ]);

        //recaptcha validation
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'unique:users',
            'password' => 'required|min:8|same:con_password'
        ]);
        // dd($request->all(),'kk');
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request['f_name'],
            'l_name' => $request['l_name'],
            'email'  => $request['email'],
            'phone'  => $request['phone'],
           // 'login_activision'  => 'active',
            'password' => Hash::make($request['password'])
        ]);

      return redirect()->route('customer.auth.login')->with('success', 'Register Successfully');
    }
}