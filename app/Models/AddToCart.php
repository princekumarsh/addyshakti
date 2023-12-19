<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    use HasFactory;

    public function CouponBundle()
    {
        return $this->hasOne(CouponBundle::class, 'id', 'coupon_id');
    }
}