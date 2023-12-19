@extends('layouts.front-end.app')

@section('content')
<div class="pt50 pb50">

    <div class="pt-50 clearfix">
        <div class="container">
            <div class="title-options">
                <h2>{{$name}} / <a href="" class="active">{{$title}}</a></h2>

            </div>
        </div>
    </div>

    <div class="pt-50 pb-100 clearfix">
        <div class="container">
            <div class="items clearfix">
                @if ($coupons->count() > 0)
                    @foreach ($coupons as $data)
                    <div class="item" id="coupon-20">
                        {{-- {{$data->coupon->sum('price')}} --}}
                        <div class="top">
                            <div class="h-info"></div>
                            <img src="{{ asset('storage/app/public/coupon') }}/{{ $data->image }}" alt="">
                        </div>
                        <div class="info">
                            <p class="h3"> <span class="" style="text-decoration: line-through; color: red">₹ {{
                                    number_format($data->discount, 2) }}</span>
                                ₹
                                {{ number_format($data->price, 2) }}

                            </p>
                            <a href="{{ route('coupon-details', [$data->slug]) }}">
                                <h5 title="">
                                    {{-- <span>₹ {{ number_format($data->coupon->sum('price'), 2) }}</span> <br> --}}
                                    {{ $data->title }}</h5>
                            </a>
                            <div class="stats"><b>No of coupon</b> <span class="badge badge-success h3" style="font-size: 10px;">{{
                                    $data->coupon->count() }}</span></div>
                            By <strong>
                                <a href="{{ route('coupon-details', [$data->slug]) }}">{{ $data->vendor->company_name }}</a></strong>
                            <a href="{{ route('coupon-details', [$data->slug]) }}" class="link">Buy Now</a>

                            {{-- <div class="expiration"><span class="expired exp-date">Expired</span></div> --}}
                        </div>

                    </div>
                    @endforeach
                @else
                    <div class="item" id="coupon-20">
                        {{-- {{$data->coupon->sum('price')}} --}}
                        {{-- <div class="top">
                            <div class="h-info"></div>
                            <img src="{{ asset('storage/app/public/coupon') }}/{{ $data->image }}" alt="">
                        </div> --}}
                        <div class="info">

                            <h3 class="text-danger">Coupon not found this {{$name}} / <a href="" class="active">{{$title}}</a></h3>
                        </div>

                    </div>
                @endif

            </div>
        </div>
    </div>

</div>

{{-- <div class="bgBlack pt-50 pb-50">
    <div class="container text-center">
        <ul class="pagination">
            <li class="selected"><a href="coupons-15.html?type=expiring&page=1"><i
                        class="fas fa-arrow-left"></i><span>Prev</span></a></li>
            <li class="selected"><a href="coupons-15.html?type=expiring&page=1">1</a></li>
            <li><a href="coupons-16.html?type=expiring&page=2">2</a></li>
            <li><a href="coupons-17.html?type=expiring&page=3">3</a></li>
            <li><a href="coupons-16.html?type=expiring&page=2"><span>Next</span><i class="fas fa-arrow-right"></i></a>
            </li>
        </ul>
    </div>
</div> --}}
@endsection
