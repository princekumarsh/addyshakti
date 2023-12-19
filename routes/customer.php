<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Customer\Auth\RegisterController;
use App\Http\Controllers\Customer\Auth\LoginController;
use App\Http\Controllers\Customer\AccountController;
use App\Http\Controllers\Customer\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/--not-access', [LoginController::class, 'login'])->name('customer.auth.login');
Route::group(['namespace' => 'Customer', 'prefix' => 'customer', 'as' => 'customer.'], function () {

    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {

        Route::post('login', [LoginController::class, 'submit'])->name('login.submit');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('sign-up', [RegisterController::class, 'register'])->name('sign-up');
        Route::post('sign-in', [RegisterController::class, 'submit'])->name('sign.submit');

    });
    /*authenticated*/
    Route::group(['middleware' => ['customer']], function () {
        Route::get('account', [AccountController::class, 'profile'])->name('profile');
        Route::post('edit-profile', [AccountController::class, 'update'])->name('profile.update');
        Route::get('password', [AccountController::class, 'password'])->name('password');
        Route::post('password', [AccountController::class, 'updatePassword'])->name('password.update');
        Route::get('add-info', [AccountController::class, 'addInfo'])->name('add.info');
        Route::post('add-info', [AccountController::class, 'addInfoSave']);
        Route::group([ 'prefix' => 'add-to', 'as' => 'add.to.'], function () {
            Route::get('cart', [AccountController::class, 'addToCartItem'])->name('cart.item');
            Route::post('cart', [AccountController::class, 'addToCart'])->name('cart');

            Route::Delete('cart/{id}', [AccountController::class, 'addToCartDelete'])->name('cart.item.delete');

        });
        Route::get('checkout/{id}', [AccountController::class, 'checkOut'])->name('checkout');
        Route::get('checkout-details/{id}', [AccountController::class, 'checkoutDetails'])->name('checkout.details');
        Route::post('check-out-complete', [AccountController::class, 'check_out_complete'])->name('checkout.complete');
        Route::get('my-order', [AccountController::class, 'myOrder'])->name('myOrder');
        Route::get('order-details/{id}', [AccountController::class, 'OrderDetails'])->name('Order.details');
        Route::get('single-coupon-detail/{id}/{o_id}', [AccountController::class, 'singleCouponDetail'])->name('Order.scd');
    });
});
