@extends('layouts.front-end.app')

@section('content')
<style>
    .video {
        height: 50%;
        width: 100%;
    }

    .old-price {
        display: block;
        text-decoration: line-through;
        margin-right: 5px;

    }


</style>
<style>
    .blink {
        animation: blinker 1s linear infinite;
        /* outline-color: linear-gradient(to right, #37ea13 75%,#421dba 25%, ); */
        font-family: sans-serif;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>
<style>
    .multicolortext {
        background-image: linear-gradient(to left,  green, blue);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
        color: transparent;
    }
</style>
<div class="pt50 pb50">
    <div class="col-md-3 offset-md-1 m-mt-60">
        {{-- <h3>Offer By</h3> --}}
        <div class="stats mt-2 badge badge-primary" style="font-size: 14px;">Validity
            {{$CouponBundle->expiry_date}} months from date of subscribe</div> <br>
        <!--<div class="stats" style="font-size: 19px;">Phone No:-<a href="tel:{{$CouponBundle->vendor->phone}}">-->
        <!-- {{$CouponBundle->vendor->phone}}</a></div <br>-->
        <!-- <div class="stats" style="font-size: 19px;">Email Id:-<a href="mailto:{{$CouponBundle->vendor->phone}}">-->
        <!-- {{$CouponBundle->vendor->email}}</a></div <br>-->
        <a href="#" class="h2"><i class="fa fa-university"></i>
            <span class="badge badge-success h3" style="font-size: 18px;">{{ $CouponBundle->vendor->company_name
                }}</span>
        </a>

        <div class="h2">
            <a href="{{$CouponBundle->vendor->address_link}}" target="_blank">

                <i class="fa fa-map-marker"></i>
                {{ $CouponBundle->vendor->company_address }}
            </a>
            {{-- <p>Gst: <span>{{ $Coupon->vendor->company_gst }}</span></p> --}}
        </div>

    </div>
    <div class="bgWhite pt-100 pb-100 clearfix">
        <div class="container">

            <div class="items clearfix">
                @if ($CouponBundle->video_link)
                {{-- <iframe width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1">
                </iframe> --}}

                <iframe class="mb-5 video" src="{{$CouponBundle->video_link}}" {{--
                    title="Ram Siya Ram (Lyrical) Adipurush | Prabhas | Sachet-Parampara,Manoj Muntashir S |Om Raut | Bhushan K"
                    frameborder="0" --}}
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                @endif
                @foreach ($CouponBundle->coupon as $Coupon)



                <div class="item" id="coupon-6">

                    <div class="top">
                        <div class="h-info"></div>
                        <img src="{{ asset('storage/app/public/coupon') }}/{{ $Coupon->image }}" alt="">
                    </div>
                    <div class="info">
                        <span class="badge badge-success h3" style="font-size: 18px;"><a href="">{{
                                $Coupon->position}}</a></span>
                        <br>
                        <p class="badge badge-success">{{ $Coupon->sub_category->title }}</p>
                        <h5 class="card-title h4"><b>{{ $Coupon->category->title }}</b></h5>

                        <p class="card-text">{!! $Coupon->description !!} </p>

                    </div>

                </div>
                @endforeach




            </div>
            <hr>

            <div class="row">
                <div class="col-md-3 offset-md-1 m-mt-60">
                    {{-- <h3>Offer By</h3> --}}
                    <!--<a href="#"> <b class="h2"></b>-->
                    <!--    <span class="badge badge-success h3" style="font-size: 18px;">{{ $CouponBundle->category->title }}</span>-->
                    <!--</a> <br>-->

                    <i class="fa fa-university h3"></i>
                    <span class="badge badge-success h3" style="font-size: 18px;">{{ $CouponBundle->vendor->company_name
                        }}</span>


                    <div class="h3">
                        <i class="fa fa-map-marker"></i> <a href="{{$CouponBundle->vendor->address_link}}"
                            target="_blank">
                            {{ $CouponBundle->vendor->company_address }}
                        </a>
                        {{-- <p>Gst: <span>{{ $Coupon->vendor->company_gst }}</span></p> --}}
                    </div>
                    <div class="stats " style="font-size: 19px;"><i class="fa fa-mobile"></i><a class="blink multicolortext"
                            href="tel:{{$CouponBundle->vendor->phone}}">
                            {{$CouponBundle->vendor->phone}}</a> <a href=""></a></div <br>
                    <div class="stats" style="font-size: 19px;"><i class="fa fa-envelope"></i><a class="blink multicolortext"
                            href="mailto:{{$CouponBundle->vendor->email}}">
                            {{$CouponBundle->vendor->email}}</a></div <br>
                </div>
                <div class="col-md-7">

                        {{-- <span class="old-price  text-danger">₹ {{ number_format($CouponBundle->discount, 2) }}</span> --}}
                       <p class="h3"> <span class="" style="text-decoration: line-through; color: red">₹ {{ number_format($CouponBundle->discount, 2) }}</span>
                        ₹
                            {{ number_format($CouponBundle->price, 2) }} <br>
                        {{ $CouponBundle->title }}
                        </p>

                    <p class="h3">No of coupon: <span>{{ $CouponBundle->coupon->count() }}</span></p>

                    <div class="description">
                        <p>{{ $CouponBundle->description }}</p>
                        <ul class="description-links">

                            </li>
                            <form action="{{ route('customer.add.to.cart') }}" method="post">

                                @csrf
                                {{-- <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Add Quanty<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" name="qty" min="1" value="1">
                                        </div>
                                    </div>
                                </div> --}}
                                <input type="hidden" class="form-control" name="qty" min="1" value="1">
                                <input type="hidden" name="id" value="{{ $CouponBundle->id }}">
                                <div class="typeAdd"></div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn bg-info text-white" style="width: 100%;">Buy
                                            Now</button>

                                    </div>
                                    <div class="col-6">

                                        <button type="submit" class="btn bg-primary text-white" style="width: 100%;">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </form>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="pt-100 clearfix">
        <div class="container">
            <div class="title-options">
                <h2>Related Coupons</h2>
            </div>
        </div>
    </div>
    {{-- <style>
        .old-price {
            display: block;
            text-decoration: line-through;
            margin-right: 5px;

        }
    </style> --}}
    <div class="pt-100 pb-100 clearfix">
        <div class="container">
            <div class="items clearfix">
                @foreach ($relatedCoupon as $data)

                <div class="item" id="coupon-20">
                    {{-- {{$data->coupon->sum('price')}} --}}
                    <div class="top">
                        <div class="h-info"></div>
                        <img src="{{ asset('storage/app/public/coupon') }}/{{ $data->image }}" alt="">
                    </div>
                    <div class="info">
                        <a href="{{ route('coupon-details', [$data->slug]) }}">
                            <span class="old-price h3 text-danger">₹ {{ number_format($data->discount, 2) }}</span>
                            <h5 title=""><span class="">₹ {{ number_format($data->price, 2) }}</span> <br>
                                {{ $data->title }}</h5>
                        </a>
                        {{-- <div class="stats"><b>Category</b> <span class="badge badge-info h2"
                                style="font-size: 15px;">{{
                                $data->category->title }}</span></div> --}}
                        <div class="stats"><b>No of coupon</b> <span class="badge badge-success h3"
                                style="font-size: 10px;">{{
                                $data->coupon->count() }}</span></div>
                        {{-- By <strong>
                            <a href="{{ route('coupon-details', [$data->slug]) }}">
                                <span class="badge badge-success h3" style="font-size: 18px;">{{
                                    $data->vendor->company_name }}</span>
                            </a></strong> --}}
                        <a href="{{ route('coupon-details', [$data->slug]) }}" class="link">Coupon View</a>

                        {{-- <div class="expiration"><span class="expired exp-date">Expired</span></div> --}}
                    </div>

                </div>
                @endforeach



            </div>
        </div>
    </div>

</div>
@endsection


<script src="">
    // function buyNow() {
    //    alert('jjj');
    //     $(.typeAdd).append('<input type="hidden" name="field_name" value="buy_now" /> ');
    //     return true;

    // }

    //  function AddToCart() {

    //     $(.typeAdd).append('<input type="hidden" name="field_name" value="AddToCart" /> ');
    //     return true;

    // }



</script>
