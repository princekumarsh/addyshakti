@extends('layouts.front-end.app')
<style>
    .item{
        border:1px solid;
    }
    .info{
        padding: 7px;
    }
    .clist-sidebar {
        background-color: #f9f3f0;
        height: 100%;
        padding: 10%;
        /* margin-right: -100px; */
    }

    .clistdata {
        border-bottom: 1px solid rgba(101, 105, 115, .2);
        color: #292930;
        padding: 18px 15px 18px 0;
        min-width: 180px;
    }
    .order-td-design {
        padding-top: 1.24rem;
        padding-bottom: 1.24rem;
    }
    .bora{
        border-radius:60px;
    }
    .b2bcard {
    border: 1px solid rgba(60, 60, 60, .54);
    border-radius: 10px;
    padding: 22px;
    margin: 10px 0;
    bbackground: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
    }
    .p-10{
        padding: 10px;
    }
    .plr-10{
        padding: 0px 10px;
    }
    .mw-80{
        max-width:80px !important;
    }
    .minw{
        min-width:95px !important;
    }
    .bg-blue{
        background:#2160B4;
    }
    .fs-25{
        font-size: 18px;
        color: #fff;
    }
    .fs-20{
        font-size: 20px;
    }
    .fs-26{
        font-size: 26px;
    }
    .txt-w{
        color: white;
    }
</style>
@section('content')

    <div class="container">
        <div class="item" id="coupon-6">
            <div class="top">
                <div class="h-info"></div>
                <img src="{{ asset('storage/app/public/coupon') }}/{{ $coupon->image }}" alt="">
            </div>
            <div class="info">
                <span class="badge badge-success h3" style="font-size: 18px;"><a href="">{{$coupon->position}}</a></span>
                <br>
                <p class="badge badge-success">{{$coupon->title}}</p>
                <h5 class="card-title h4"><b> {{$coupon->sub_category->title}}</b></h5>
                <p class="card-text">{!! $coupon->description !!}</p>
            </div>
        </div>
        <div class="row p-10">
            <div class="b2bcard col-12 txt-w" style="width: 18rem;">
                <div class="col-12 fs-26">
                    <strong>Redeem Code</strong>
                </div>
                <div class="col-12">
                    <strong>Code : {{$coupon->code}}</strong>
                </div>
                <div class="col-12">
                    <strong>Key : {{$order->key_id}}</strong>
                </div>
                <div class="p-10">
                    <div class="btn btn-warning">
                        Send Code
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
