@extends('layouts.front-end.app')
<style>
    .clist-sidebar{
            background-color: #f9f3f0;
            height:100%;
            padding:10%;
         }
         .clistdata{
            border-bottom: 1px solid rgba(101,105,115,.2);
            color: #292930;
            padding: 18px 15px 18px 0;
            min-width: 180px;
         }
</style>
@section('content')
    <div class="container">


        <!--<div class="row">-->

        <!--    <div class="col-md-12">-->
        <!--        {{-- <div class="alert">-->
        <!--            Your account is not verified yet ! Please check your inbox (developerermanoj@gmail.com) and verify-->
        <!--            it as fast as possible. </div> --}}-->
        <!--    </div>-->

        <!--</div>-->

        {{-- @include('customer-view.account.header') --}}



        <div class="row push-container mt-5">



            <div class="col-md-9" style="margin-top: -219px;">
                <div class=" other_form table-responsive" style="margin-top:200px;">
                    <table class="table table table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                {{-- <th scope="col">quantity</th> --}}
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Total Coupons</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subTotal = 0;
                            @endphp

                            @foreach ($AddToCartItems as $key => $item)
                                <tr>

                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td><a href="{{route('coupon-details',[$item->CouponBundle->slug])}}">{{ $item->CouponBundle->title }}</a></td>
                                    <td>{{ number_format($item->qty * $item->CouponBundle->price, 2) }}</td>
                                    {{-- <td>{{ $item->qty }}</td> --}}
                                    <td> {{Carbon\Carbon::now()->addMonths($item->CouponBundle->expiry_date)}} </td>
                                    <!--<td>{{ number_format($item->qty * $item->CouponBundle->coupon->sum('price'), 2) }}</td>-->
                                    <td>{{  $item->CouponBundle->coupon->count()}}</td>
                                    <td>
                                        {{-- <form action="{{route('customer.add.to.cart.item.delete')}}" method="post">
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" class="btn-danger btn-sm">X</button>
                                        </form> --}}
                                        <form id="delete-form" method="POST" action="{{route('customer.add.to.cart.item.delete',[$item->id])}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                {{-- <input type="submit" class="btn btn-danger" value="X"> --}}
                                                <button type="submit" class="btn-danger"><i class="fa-solid fa-trash ss"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $subTotal += $item->qty * $item->CouponBundle->price;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!--start summery menu---->
            @if(count($AddToCartItems) >= 1)
                <div class="col-lg-5 col-12">
                <div class="clist-sidebar">
                    <h4 class="mb--20">Order Summary</h4>
                    <div>
                        <table class="table">
                            <tbody>
                                <tr class="clistdata">
                                    <td style="font-weight: 500">Subtotal</td>
                                    <td>₹<span>{{ number_format($subTotal, 2) }}</span></td>
                                </tr>

                                {{-- <tr class="clistdata">
                                    <td style="font-weight: 500">Tax</td>
                                    <td>₹<span>235.00</span></td>
                                </tr> --}}
                                <tr class="clistdata">
                                    <td style="font-weight: 500">Total</td>
                                    <td class="text-info" style="font-weight:500">₹<span>{{ number_format($subTotal, 2) }}</span></td>
                                </tr>
                        </table>
                    </div>
                    <button
                    onclick="window.location.href='{{route('customer.add.info')}}'"
                    class="btn btn-danger w-90 mt-4">Proceed to Add Info</button>
                </div>
            @endif

        </div>

            <!--end summery menu------>

        </div>

    </div>
@endsection
