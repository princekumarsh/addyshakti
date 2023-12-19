@extends('layouts.front-end.app')
<style>
    .row {
        margin-right: 0px !important;
    }


</style>
@section('content')

<div class="owl-carousel owl-theme mb-1">
    <div class="item">
        <a href="#">
            <img src="{{ asset('public/assets/frontend') }}/images/slider1.png" alt="">
        </a>
    </div>
    <div class="item">
        <a href="#">
            <img src="{{ asset('public/assets/frontend') }}/images/slider2.png" alt="">
        </a>
    </div>
</div>

{{-- <div class="bgGray  clearfix mt-5">
    <div class="container">
        <h2 class="mt-1">Best Deals & Coupons </h2>

        @if ($bestCoupon->count() > 0)
        <div class="items mt-25  clearfix">
            @foreach ($bestCoupon as $data)
            <div class="item" id="coupon-20">
                <div class="top">
                    
                    <img src="{{ asset('storage/app/public/coupon') }}/{{ $data->image }}" alt="">
                </div>
                <div class="info">

                    <p class="h3"> <span class="" style="text-decoration: line-through; color: red">₹ {{
                            number_format($data->discount, 2) }}</span>
                        ₹
                        {{ number_format($data->price, 2) }}

                    </p>
                    <a href="{{ route('coupon-details', [$data->slug]) }}">
                        <h3 title="" class="text-dark">
                            {{ $data->title }}
                        </h3>
                    </a>

                    <div class="stats h4"><b>Total Coupons</b> <span class="">{{
                            $data->coupon->count() }}</span></div>

                    <a href="{{ route('coupon-details', [$data->slug]) }}" class="link">Coupon View</a>

                </div>

            </div>
            @endforeach           
        </div>
        @else
        <div class="items mt-25 mb-25 clearfix">
            <h1 class="text-danger">Coupon not found</h1>
        </div>

        @endif

    </div>
</div> --}}
<div class="bgWhite pt-100 pb-100 clearfix">
    <div class="container">
        <h2>Best Deals & Coupons</h2>
        <ul class="boxed-items  boxed-stores clearfix mt-25 mb-25">
            @foreach ($bestCoupon as $data)
            <li style="font-family: sans-serif">
                <div class="top">
                    <a href="{{ route('coupon-details', [$data->slug]) }}">
                        {{-- <img src="{{ asset('storage/app/public/coupon') }}/{{ $data->image }}" alt=""> --}}
                        <img {{-- src="{{ asset('public/assets/frontend') }}/images/logo_5c587c783fedb.png" --}}
                            src="{{ asset('storage/app/public/coupon') }}/{{ $data->image }}" height="110px"
                            width="100%" alt="">

                    </a>
                </div>
                <div class=""> <span class="" style="text-decoration: line-through; color: red;">₹{{
                        number_format($data->discount, 2) }}</span>   ₹<b>{{ number_format($data->price, 2) }}</b>
                
                </div>

                <div class="info mt-2 ">
                    {{-- <h3 title="" class="text-dark"> --}}
                        <b>{{$data->title}}</b> <br>
                        
                    {{-- </h3> --}}

                    <b class="" >Total Coupons {{
                    $data->coupon->count() }}</b>
                    <a href="{{ route('coupon-details', [$data->slug]) }}" class="link btn mb-2 w-75 btn-dark">Coupon View</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="bgWhite pt-100 pb-100 clearfix">
    <div class="container">
        <h2><strong>Top</strong> Stores </h2>
        <ul class="boxed-items boxed-stores clearfix mt-25 mb-25">
            @foreach ($vendor as $v)
            <li>
                <div class="top">
                   <a href="{{route('store.product',[$v->id])}}">
                        <img {{-- src="{{ asset('public/assets/frontend') }}/images/logo_5c587c783fedb.png" --}}
                            src="{{ asset('storage/app/public/vender/company_logo/') }}/{{ $v->logo }}" height="110px" width="100%" alt="">
                    
                    </a>
                </div>
               
            <div class="info mt-2 ">
                <p>{{$v->company_name}}</p>
            </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="bgGray pt-100 pb-100 clearfix">
    <div class="container">
        <h2><strong>Top</strong> Categories </h2>
        <div class="items mt-25 mb-25 clearfix">
            <ul class="boxed-items boxed-categories clearfix mt-25 mb-25">
                @foreach ($topCategory as $topCat)
                <li style="background:rgb(108, 79, 61)"><a href="{{route('category.product',[$topCat->id])}}">{{
                        $topCat->title }}</a></li>
                @endforeach


            </ul>
        </div>
    </div>
</div>
<div class="bgBlack pt-100 pb-100 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-50">Subscribe to be notified when<br> <strong>great coupons & big discounts</strong>
                    are added </h2>
                <div class="subscribe_form other_form">
                    <form method="POST" action="{{route('subscribe')}}">
                        @csrf
                        <input type="email" class="shadow  bg-body rounded text-white" name="email" value=""
                            placeholder="Email Address" required="">
                        <button type="submit" class="text-white">Subscribe</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="bgBlack pt-75 pb-75 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            {{-- <div class="col-md-6 align-self-center">
                <h2 class="mb-0 m-mb-15 text-center text-md-left">Get the <strong>latest</strong> coupons &
                    discounts </h2>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="button-set lh-50">
                    <li><a href="coupons-7.html">Coupons</a></li>
                    <li><a href="coupons-7.html">Popular</a></li>
                    <li><a href="coupons-7.html">Coupon Codes</a></li>
                    <li><a href="products-3.html">Products</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
@endsection
