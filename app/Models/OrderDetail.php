<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasOne(Order::class,'id', 'order_id');
    }
    public function vendor()
    {
        return $this->hasOne(Vendor::class,'id', 'vendor_id');
    }

    public function coupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }
    public function redeem()
    {
        return $this->hasOne(RedeemCoupon::class, 'order_details_id', 'id');
    }
}