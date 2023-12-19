<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class,  'id', 'category_id');
    }
    public function sub_category()
    {
        return $this->hasOne(Category::class,'id', 'sub_category_id');
    }
    public function vendor()
    {
        return $this->hasOne(Vendor::class,'id', 'created_by');
    }
    public function CouponBundle()
    {
        return $this->hasMany(CouponBundle::class, 'id', 'coupon_bundle_id');
    }
     public function coupon_bundle()
    {
        return $this->hasOne(CouponBundle::class, 'id', 'coupon_bundle_id');
    }

}