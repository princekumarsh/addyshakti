<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('customer')->user()) {
            if (auth('customer')->user()->foruser == '0') {
                return $next($request);
            }
        }

        auth()->guard('customer')->logout();
        //session()->forget('wish_list');
        $request->session()->invalidate();
        return redirect()->route('customer.auth.login');
    }
}