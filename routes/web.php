<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\UserAdmin\UseradminController;
use App\Http\Controllers\Vendor\VendorController as Vendor;

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



Route::post('subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'createlogin']);
Route::get('/not-acces/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');

Route::get('/signup', [AuthController::class, 'sign'])->name('sign-up');
Route::post('/signup', [AuthController::class, 'createsign']);


//for get password
Route::get('/forget-password', [AuthController::class, 'forget'])->name('password.forget');
Route::post('send/forget-password', [AuthController::class, 'password_otp'])->name('password.otp');
// Route::get('verify/forget-password', [AuthController::class, 'get_verify']);
Route::post('verify/forget-password', [AuthController::class, 'save_verify'])->name('save_verify');
// Route::get('set/forget-password', [AuthController::class, 'get_set']);
Route::post('set/forget-password', [AuthController::class, 'save_password'])->name('save_password');
Route::get('/', [HomeController::class, 'admin'])->name('admin');
Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/not-access', [HomeController::class, 'notAccess']);
Route::get('coupon', [HomeController::class, 'coupon'])->name('coupon');
Route::get('category', [HomeController::class, 'category'])->name('category');
Route::get('category/{slug}', [HomeController::class, 'categoryWiseProduct'])->name('category.product');
Route::get('store/{slug}', [HomeController::class, 'storeWiseProduct'])->name('store.product');
Route::get('store', [HomeController::class, 'store'])->name('store');
Route::get('store-details', [HomeController::class, 'store_details'])->name('store-details');
Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
    Route::get('/sign-up', [Vendor::class, 'create'])->name('create');
    Route::post('/store', [Vendor::class, 'store'])->name('store');
    Route::get('/sign-in', [Vendor::class, 'sing_in'])->name('sign.in');
    Route::post('/sign-in', [Vendor::class, 'login'])->name('login');
    Route::group(['middleware' => ['IsVendor']], function () {
        Route::get('/dashboard', [Vendor::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [Vendor::class, 'logout'])->name('logout');
        Route::get('/profile', [Vendor::class, 'profile'])->name('profile');
        Route::group(['prefix' => 'coupon',  'as' => 'coupon.'], function () {
            Route::get('/list/{type}', [Vendor::class, 'couponList'])->name('index');
            Route::get('/add/{id}', [Vendor::class, 'couponAdd'])->name('create');
            Route::post('/store', [Vendor::class, 'couponStore'])->name('store');
            Route::group(['prefix' => '/redeem'], function () {
                Route::get('/', [Vendor::class, 'redeem'])->name('redeem');
                Route::post('/post', [Vendor::class, 'RedeemPost'])->name('redeem.post');
                // Route::get('/add', [Vendor::class, 'couponAdd'])->name('create');
                // Route::post('/store', [Vendor::class, 'couponStore'])->name('store');
            });
            Route::group(['prefix' => 'bundle', 'as' => 'bundle.'], function () {
                Route::get('/list', [Vendor::class, 'bundleList'])->name('index');
                Route::get('/add', [Vendor::class, 'bundleAdd'])->name('create');
                Route::post('/store', [Vendor::class, 'bundleStore'])->name('store');
                Route::get('/delete/{id}', [Vendor::class, 'bundleDelete'])->name('delete');
                Route::get('/edit/{id}', [Vendor::class, 'bundleEdit'])->name('edit');
                Route::get('/request/send/{id}', [Vendor::class, 'bundleRequestSend'])->name('request.send');
            });
        });
        Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
            Route::get('/list', [Vendor::class, 'order'])->name('index');
            Route::get('/details/{id}', [Vendor::class, 'orderDetails'])->name('details');
        });
    });
});
Route::get('coupon-details/{slug}', [HomeController::class, 'coupon_details'])->name('coupon-details');
Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {

        Route::post('/sub-category', [CouponsController::class, 'sub_category_index'])->name('index');
        Route::post('/vender-wise-cat-sub', [CouponsController::class, 'vendor_sub_category'])->name('vendor.index');

    });
    Route::get('/subscribe', [AuthController::class, 'subscribe'])->name('subscribe');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
        Route::get('/management-list/{type}', [VendorController::class, 'vendorList'])->name('index');
        Route::get('/management-add', [VendorController::class, 'vendorAdd'])->name('create');
        Route::post('/management-add', [VendorController::class, 'vendorCreate'])->name('store');
        Route::get('/management-edit/{id}', [VendorController::class, 'vendorEdit'])->name('edit');
        Route::get('/status/{id}/{status}', [VendorController::class, 'status'])->name('status');
        Route::post('/management-delete/{id}', [VendorController::class, 'vendorDelete'])->name('delete');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/management-list', [UserController::class, 'UserList'])->name('index');
        Route::get('/management-add', [UserController::class, 'UserAdd'])->name('create');
        Route::post('/management-add', [UserController::class, 'UserCreate'])->name('store');
        Route::get('/management-edit/{id}', [UserController::class, 'UserEdit'])->name('edit');
        Route::get('/status/{id}/{status}', [UserController::class, 'status'])->name('status');
        Route::post('/management-delete/{id}', [UserController::class, 'UserDelete'])->name('delete');
    });
    Route::group(['prefix' => 'coupon', 'as' => 'coupon.'], function () {

        Route::get('/list/{type}', [CouponsController::class, 'couponList'])->name('index');
        Route::get('/add/{id}', [CouponsController::class, 'couponAdd'])->name('create');
        Route::post('/store', [CouponsController::class, 'couponStore'])->name('store');
        Route::get('/edit/{id}', [CouponsController::class, 'couponEdit'])->name('edit');
        Route::get('/status/{id}/{status}', [CouponsController::class, 'status'])->name('status');
        Route::get('/delete/{id}', [CouponsController::class, 'couponDelete'])->name('delete');
        Route::group(['prefix' => 'bundle', 'as' => 'bundle.'], function () {
            Route::get('/list/{type}/{id}', [CouponsController::class, 'bundleList'])->name('index');

            Route::get('/add', [CouponsController::class, 'bundleAdd'])->name('create');
            Route::post('/store', [CouponsController::class, 'bundleStore'])->name('store');
            Route::get('/delete/{id}', [CouponsController::class, 'couponBundleDelete'])->name('delete');
            Route::get('/edit/{id}', [CouponsController::class, 'bundleEdit'])->name('edit');
            Route::get('/status/{id}/{status}', [CouponsController::class, 'bundleStatus'])->name('status');
        });
        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/list', [CouponsController::class, 'categoryList'])->name('index');
            Route::get('/add', [CouponsController::class, 'categoryAdd'])->name('create');
            Route::post('/store', [CouponsController::class, 'categoryStore'])->name('store');
            Route::get('/delete/{id}', [CouponsController::class, 'categoryDelete'])->name('delete');
            Route::get('main/delete/{id}', [CouponsController::class, 'MainCategoryDelete'])->name('main.delete');
            Route::get('/edit/{id}', [CouponsController::class, 'edit'])->name('edit');
        });
        Route::group(['prefix' => 'sub-category', 'as' => 'sub.category.'], function () {
            Route::get('/list', [CouponsController::class, 'sub_category'])->name('index');
            Route::get('/add', [CouponsController::class, 'sub_category_create'])->name('create');
            Route::get('/edit/{id}', [CouponsController::class, 'sub_category_edit'])->name('edit');
        });
        Route::group(['prefix' => 'accounts', 'as' => 'account.'], function () {
            Route::get('/list', [AccountsController::class, 'index'])->name('index');
            Route::get('/payment-details', [AccountsController::class, 'incompletePaymentDetails'])->name('payment.details');
        });
    });

    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/list', [OrderController::class, 'index'])->name('index');
        Route::get('/details/{id}', [OrderController::class, 'orderDetails'])->name('details');

        Route::post('/order-status', [OrderController::class, 'order_status'])->name('order.status');
        Route::post('/payment-status', [OrderController::class, 'payment_status'])->name('payment.status');
    });

    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('/list', [CouponsController::class, 'sliderList'])->name('index');

        Route::get('/add', [CouponsController::class, 'sliderAdd'])->name('create');
        Route::post('/store', [CouponsController::class, 'sliderStore'])->name('store');
        Route::get('/delete/{id}', [CouponsController::class, 'sliderDelete'])->name('delete');
        Route::get('/edit/{id}', [CouponsController::class, 'sliderEdit'])->name('edit');
        Route::get('/status/{id}/{status}', [CouponsController::class, 'sliderStatus'])->name('status');
    });
});

Route::group(['prefix' => 'user', 'middleware' => ['user'],  'as' => 'user.'], function () {
    Route::get('/user-admin', [UseradminController::class, 'index'])->name('index');
    Route::get('/user-form-apply', [UseradminController::class, 'userformApply']);
    Route::post('/user-form-apply', [UseradminController::class, 'userformapplyValidate']);
});