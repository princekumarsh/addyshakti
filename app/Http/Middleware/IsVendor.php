<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVendor
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
        if (auth('vendors')->user()) {
            if (auth('vendors')->user()->status == '1') {
                return $next($request);
            } else {
                return back()->with('error', 'Your are not verify user');
            }
        }

        auth()->guard('vendors')->logout();
        $request->session()->invalidate();
        return redirect()->route('vendor.login');
    }
}
