@extends('layouts.front-end.app')

@section('content')
<div class="pt50 pb50">

    <div class="pt-50 clearfix">
        <div class="container">
            <div class="title-options">
                <h2>Stores</h2>
                <div class="options">
                    <a href="#">All Stores <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li class="active"><a href="stores-4.html?">All Stores</a></li>
                        <li><a href="stores-1.html?type=top">Top Stores</a></li>
                        <li><a href="stores-2.html?type=most-voted">Most Voted</a></li>
                        <li><a href="stores-3.html?type=popular">Popular</a></li>
                    </ul>
                </div>
                <h5>All Stores</h5>
            </div>
        </div>
    </div>


    {{-- <div class="bgWhite pt-75 mt-75 pb-75 clearfix">
        <div class="container">
            <ul class="letters">
                <li><a href="{{route('store')}}">A</a></li>
                <li><a href="{{route('store')}}">B</a></li>
                <li><a href="{{route('store')}}">C</a></li>
                <li><a href="{{route('store')}}">D</a></li>
                <li><a href="{{route('store')}}">E</a></li>
                <li><a href="{{route('store')}}">F</a></li>
                <li><a href="{{route('store')}}">G</a></li>
                <li><a href="{{route('store')}}">H</a></li>
                <li><a href="{{route('store')}}">I</a></li>
                <li><a href="{{route('store')}}">J</a></li>
                <li><a href="{{route('store')}}">K</a></li>
                <li><a href="{{route('store')}}">L</a></li>
                <li><a href="{{route('store')}}">M</a></li>
                <li><a href="{{route('store')}}">N</a></li>
                <li><a href="{{route('store')}}">O</a></li>
                <li><a href="{{route('store')}}">P</a></li>
                <li><a href="{{route('store')}}">Q</a></li>
                <li><a href="{{route('store')}}">R</a></li>
                <li><a href="{{route('store')}}">S</a></li>
                <li><a href="{{route('store')}}">T</a></li>
                <li><a href="{{route('store')}}">U</a></li>
                <li><a href="{{route('store')}}">V</a></li>
                <li><a href="{{route('store')}}">W</a></li>
                <li><a href="{{route('store')}}">X</a></li>
                <li><a href="{{route('store')}}">Y</a></li>
                <li><a href="{{route('store')}}">Z</a></li>
                <li><a href="{{route('store')}}">0-9</a></li>
                <li><a href="{{route('store')}}">All</a></li>
            </ul>
        </div>
    </div> --}}


    <div class="pt-50 pb-50 clearfix">
        <div class="container">
            <div class="items clearfix">

                @foreach ($stores as $store)
                    <div class="item">

                    <div class="top">
                        <div class="h-info">
                            <a href="#"
                                {{-- data-ajax-call="https://couponscms.com/demo/themes/black/ajax/save?token=E4bDgDPcpvqnXJZ" --}}
                                {{-- data-data='{"item":10,"type":"store","added_message":"<i class=\"fa fa-star\"><\/i>","removed_message":"<i class=\"far fa-star\"><\/i>"}' --}}
                                    >
                                    <i
                                    class="far fa-star"></i>
                                </a>
                                <a href="#"
                                {{-- data-ajax-call="https://couponscms.com/demo/themes/black/ajax/favorite?token=VYj5Xr3bh9jGhQT" --}}
                                {{-- data-data='{"store":10,"added_message":"<i class=\"fa fa-heart\"><\/i>","removed_message":"<i class=\"far fa-heart\"><\/i>"}' --}}
                                    ><i
                                    class="far fa-heart"></i></a></div>
                        <img src="{{ asset('storage/app/public/vender/company_logo/') }}/{{ $store->logo }}" alt="">
                    </div>
                    <div class="info store-info">
                        <a href="#">
                            <h5>{{$store->company_name}}</h5>
                        </a>
                        <div>
                            <i class="fa fa-university">Business Name :- </i> <a href="#" class="">
                                {{ $store->Category->title }}
                            </a>
                            {{-- <p>Gst: <span>{{ $Coupon->vendor->company_gst }}</span></p> --}}
                        </div>
                        <div>
                            <i class="fa fa-map-marker"></i> <a href="#">
                                {{ $store->company_address }}
                            </a>
                            {{-- <p>Gst: <span>{{ $Coupon->vendor->company_gst }}</span></p> --}}
                        </div>
                        <a href="{{route('store.product',[$store->id])}}" class="link">Details</a>
                        {{-- 89 coupons, 145 products --}}
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

<div class="bgBlack pt-50 pb-50">
    <div class="container text-center">
        <ul class="pagination">
            <li class="selected"><a href="stores-32.html?page=1"><i class="fas fa-arrow-left"></i><span>Prev</span></a>
            </li>
            <li class="selected"><a href="stores-32.html?page=1">1</a></li>
            <li><a href="stores-33.html?page=2">2</a></li>
            <li><a href="stores-33.html?page=2"><span>Next</span><i class="fas fa-arrow-right"></i></a></li>
        </ul>
    </div>
</div>
@endsection
