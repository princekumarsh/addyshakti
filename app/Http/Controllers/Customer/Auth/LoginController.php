<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        if(auth('customer')->user()){
            return redirect(route('index'));
        }
        session()->put('keep_return_url', url()->previous());
        return view('customer-view.auth.login');
    }
    public function submit(Request $request)
    {  //dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
           // 'keep_logged' => 'required'
        ]);
        //recaptcha validation
       // dd($request->all());

        $remember = ($request['remember']) ? true : false;
       // dd('kk');
        $user = User::Where(['email' => $request->username, 'login_activision'=> 'active', 'foruser'=>'0'])->OrWhere('phone', $request->username)->first();
        //dd($user);
        if (isset($user) == false) {
            //Toastr::error('Credentials do not match or account has been suspended.');
            return back()->with('error','You are not Register User Before Register and after Login ');
        }


        if ($user->login_activision == 'active') {
            if (isset($user) && auth('customer')->attempt(['email' => $user->email, 'password' => $request->password], $remember)) {
                   // dd(session('keep_return_url'),route('customer.auth.login'));
                    if(route('customer.auth.login') == session('keep_return_url')){
                    return redirect()->route('index')->with('success', 'You are  Login Successfully');
                    }
                  return redirect()->route('index')->with('success', 'You are  Login Successfully');
            }
        }





        return back()->with('error','Credentials do not match or account has been suspended.');
    }

    public function logout(Request $request)
    {
        auth()->guard('customer')->logout();
        //session()->forget('wish_list');
        $request->session()->invalidate();

        return redirect()->route('customer.auth.login')->with('info', 'Come back soon, ' . '!');
    }
}