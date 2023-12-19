<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponBundle extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class,  'id', 'category_id');
    }
    // public function sub_category()
    // {
    //     return $this->hasOne(Category::class, 'id', 'sub_category_id');
    // }
    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'id', 'created_by');
    }
    public function coupon()
    {
        return $this->hasMany(Coupon::class, 'coupon_bundle_id', 'id')->where('status','1');
    }
}