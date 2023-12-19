<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'parent_id', 'status','image', 'position'
    ];

    public function category()
    {
        return $this->hasOne(Category::class,  'id', 'parent_id');
    }

    public function sub_category()
    {
        return $this->hasOne(Category::class,'id','parent_id');
    }
    public function coupon_bundle()
    {
        return $this->hasOne(CouponBundle::class, 'id', 'category_id');
    }

    public function coupon()
    {
        return $this->hasMany(Coupon::class, 'id', 'category_id');
    }
}