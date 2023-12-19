@extends('layouts.front-end.app')
<style>
    .clist-sidebar {
        background-color: #f9f3f0;
        height: 300px;
        padding: 10%;
    }

    .clistdata {
        border-bottom: 1px solid rgba(101, 105, 115, .2);
        color: #292930;
        padding: 18px 15px 18px 0;
        min-width: 180px;
    }

    .checkout-image-design {
        margin: 2rem;
        padding: 1.5rem;
        height: 80px;
        width: 170px;
    }
</style>
@section('content')
    <div class="container pt50 pb50">


        <div class="row mt-5">

            <div class="col-md-12">
                {{-- <div class="alert">
                    Your account is not verified yet ! Please check your inbox (developerermanoj@gmail.com) and verify
                    it as fast as possible. </div> --}}
            </div>

        </div>

        {{-- <div class="row">

            <div class="col-md-12">
                <div class="user-header">
                    <div class="user-header-right">
                        <h3>{{ auth('customer')->user()->name . ' ' . auth('customer')->user()->l_name }}</h3>
                        <h5>Total Coupon Bundle:- {{$carts->count() }}</h5>
                        <h5><i class="fa fa-money"></i> Total: ₹<span>{{ number_format($order_amount, 2) }}</span></h5>
                        <a href="#">Add Credits</a>
                    </div>
                </div>
            </div>

        </div> --}}


        <div class="row push-container">



            <div class="col-md-5">

                <form class="" action="{{ route('customer.checkout.complete') }}" method="post">@csrf
                <div class="row text-center">


                        <div class="col-lg-12">

                            <h3>Select Payment method</h3>
                        </div>

                        {{-- @error('payment_method')
                            <div class="text-danger">
                                <p class="text-danger">{{$message}}</p>
                            </div>
                        @enderror --}}
                        <div class="col-6">
                            <input type="radio" name="payment_method" value="ONLINE">
                            <input type="hidden" name="info_id" value="{{$id}}">
                            <div class="card mb-3 text-center">

                                <img src="{{ asset('public\assets\img\razor.png') }}" class="checkout-image-design">
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="radio" name="payment_method" value="COD">
                            <div class="card mb-3">
                                <img src="{{ asset('public\assets\img\cod.png') }}" class="checkout-image-design">
                            </div>
                        </div>

                        <div class="col-6">
                            <button class="btn btn-success mt-4 mb-4" type="submit">Check out</button>
                        </div>
                    </form>
                    <div class="col-6">
                        <a class="btn btn-secondary mt-4 mb-4"
                            onclick="window.location.href='{{ route('coupon') }}'">Go to
                            shopping</a>
                    </div>


                </div>


            </div>

            <!--start summery menu---->

            {{-- <div class="col-lg-4 col-12">
                <div class="clist-sidebar">
                    <h4 class="mb--20">Order Summary</h4>
                    <div>
                        <div class=" other_form table-responsive">
                        <table class="table  table-striped ">
                            <tbody>
                                <tr class="clistdata">
                                    <td style="font-weight: 500">Subtotal</td>
                                    <td>₹<span>{{ number_format($order_amount, 2) }}</span></td>
                                </tr>

                                <tr class="clistdata">
                                    <td style="font-weight: 500">Tax</td>
                                    <td>₹<span>235.00</span></td>
                                </tr>
                                <tr class="clistdata">
                                    <td style="font-weight: 500">Total</td>
                                    <td class="text-info" style="font-weight:500">
                                        ₹<span>{{ number_format($order_amount, 2) }}</span></td>
                                </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!--end summery menu------>

        </div>

    </div>
@endsection
