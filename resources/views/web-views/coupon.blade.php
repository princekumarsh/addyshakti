@extends('layouts.front-end.app')
<style>
    .old-price {
    display: block;
    text-decoration: line-through;
    margin-right: 5px;

    }
</style>
@section('content')
<div class="pt50 pb50">

    <div class="pt-50 clearfix">
        <div class="container">
            <div class="title-options">
                <h2>Coupons</h2>
                {{-- <div class="options">
                    <a href="#">Expiring Soon <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="coupons-9.html?">Recently Added</a></li>
                        <li class="active"><a href="coupons-1.html?type=expiring">Expiring Soon</a></li>
                        <li><a href="coupons-2.html?type=printable">Printable</a></li>
                        <li><a href="coupons-3.html?type=codes">Coupon Codes</a></li>
                        <li><a href="coupons-4.html?type=exclusive">Exclusive</a></li>
                        <li><a href="coupons-5.html?type=popular">Popular</a></li>
                        <li><a href="coupons-6.html?type=verified">Verified</a></li>
                    </ul>
                </div>
                <div class="options">
                    <a href="#">Filter <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="coupons-14.html?type=expiring&active=1"><i class="far fa-circle"></i> Active
                                only</a></li>
                    </ul>
                </div>
                <h5>Expiring Soon</h5> --}}
            </div>
        </div>
    </div>

    <div class="pt-50 pb-100 clearfix">
        <div class="container">
            {{-- <div class="items clearfix">
                @foreach ($coupons as $coupon)
                    <div class="item" id="coupon-6">

                        <div class="top">
                            <div class="h-info"></div>
                            <img src="{{ asset('storage/app/public/coupon') }}/{{ $coupon->image }}" alt="">
                        </div>
                        <div class="info">
                            <a href="{{route('coupon-details',[$coupon->coupon_bundle->slug])}}">
                                <h5 title="Extra $15 Off $100+"><span>Coupon Bundle :: {{$coupon->coupon_bundle->title}}</span> <br>
                                    {{$coupon->title}}</h5>
                            </a>
                            By <strong><a href="store/clearbuys-3.html">{{$coupon->vendor->company_name}}</a></strong><a
                                href="reviews/clearbuys-3.html#reviews">
                                <div class="rating-star" title="4 stars rating from 3 votes"><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="far fa-star"></i> (3)</div>
                            </a><a href="{{route('coupon-details', [$coupon->coupon_bundle->slug])}}"  target="_blank"
                                class="link" >Buy Now</a>
                            <div class="stats"></div>
                            <div class="expiration"><span class="expired exp-date">Expired</span></div>
                        </div>

                    </div>
                @endforeach
            </div> --}}


            <div class="items mt-25 mb-25 clearfix">
                @foreach ($coupons as $data)
                <div class="item" id="coupon-20">
                    {{-- {{$data->coupon->sum('price')}} --}}
                    <div class="top">
                        <div class="h-info"></div>
                        <img src="{{ asset('storage/app/public/coupon') }}/{{ $data->image }}" alt="" style="width: 100%" height="100%">
                    </div>
                    <div class="info">
                        <p class="h3"> <span class="" style="text-decoration: line-through; color: red">₹ {{
                                number_format($data->discount, 2) }}</span>
                            ₹
                            {{ number_format($data->price, 2) }}

                        </p>
                        <a href="{{ route('coupon-details', [$data->slug]) }}">

                            <h5 class="text-dark">
                                
                                {{ $data->title }}</h5>
                        </a>
                        <div class="stats h4"><b>No of coupon</b> <span class="badge badge-success h3" style="font-size: 10px;">{{
                                $data->coupon->count() }}</span></div>
                        {{-- By <strong>
                            <a href="{{ route('coupon-details', [$data->slug]) }}">{{ $data->vendor->company_name }}</a></strong> --}}
                        <a href="{{ route('coupon-details', [$data->slug]) }}" class="link">Buy Now</a>

                        {{-- <div class="expiration"><span class="expired exp-date">Expired</span></div> --}}
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>

</div>


@endsection
