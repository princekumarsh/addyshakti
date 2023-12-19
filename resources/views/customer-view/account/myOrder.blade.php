@extends('layouts.front-end.app')
<style>
    .order-td-design {
        padding-top: 1.24rem;
        padding-bottom: 1.24rem;
    }
    .bora{
        border-radius:60px;
    }
    .b2bcard {
    border: 1px solid rgba(60, 60, 60, .54);
    border-radius: 8px;
    padding:22px;
    margin: 8px 0;
    /* background: blue; */
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,115,121,1) 35%, rgba(0,212,255,1) 100%);
    /* background: rgb(131,58,180);
    background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%); */

    }
    .p-10{
        padding: 7px;
    }
    .mw-80{
        max-width:80px !important;
    }
    .minw{
        min-width:95px !important;
    }
    .txt-w{
        color:white;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('content')



    {{-- <div class="container pt50 pb50">
        <div class="row push-container">
            <div class="col-md-9">
                <center style="font-weight: 600;font-size: 20px;"><u>My Order</u></center>
                <div class=" other_form table-responsive">
                <div class="table table-striped ">
                    <table class="table">
                        <thead style="background-color:#f1f8ff;">
                            <tr class="text-center">
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>expiry Date</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="text-center">
                                    <td class="order-td-design"> {{'#1000'.''.$order->id}}</td>
                                    <td class="order-td-design">{{date_format($order->created_at,"Y M d")}}</td>
                                    <td class="order-td-design">{{$order->expiry_date}}</td>
                                    <td class="  " ><span class="badge badge-{{$order->order_status == 'confirm' ? 'success' :'info'}}">{{$order->order_status}}</span> </td>
                                    <td class="order-td-design">₹{{number_format($order->order_amount, 2)}}</td>
                                    <td class="order-td-design">
                                        @if ($order->order_status == 'confirm')
                                            <a href="{{route('customer.Order.details',[$order->id])}}"><i class="fa fa-eye"></i></a>
                                        @else
                                        <span class="badge badge-danger">Not accept</span>
                                        @endif

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

    </div> --}}
    <script>
        $(document).ready(function(){
            $("#hidden").click(function(){
                $("p").hide(1000);
            });

            $("#show").click(function(){
                $("p").show(1000);
            });

        });
    </script>
    <div>
        <p>click on the given button to perform the action</p>
        <button id="hidden">hide</button>
        <button id="show">show</button>
    </div>

    <div class="container pt50 pb50 ">

        <div class="row p-10">
            @foreach ($orders as $order)
                <div class="b2bcard col-12 txt-w" style="width: 18rem;">
                    <div class="row p-10">
                        <div class="col-6">
                            <strong>Coupon name</strong>
                        </div>
                        <div class="col-6">
                            <strong>Vendor name</strong>
                        </div>
                    </div>
                    <div class="row p-10">
                        <div class="col-6">
                        {{$order->CouponBundle->title}}
                        </div>
                        <div class="col-6">
                            {{$order->CouponBundle->vendor->fname.' '.$order->CouponBundle->vendor->lname}}
                        </div>
                    </div>
                    <div class="row p-10">
                        <div class="col-4">
                            <strong>Order Id</strong>
                        </div>
                        <div class="col-4">
                            <strong>Order Date</strong>
                        </div>
                        <div class="col-4">
                            <strong>Expiry date</strong>
                        </div>
                    </div>
                    <div class="row p-10">
                        <div class="col-4">
                            {{'#1000'.''.$order->id}}
                        </div>
                        <div class="col-4">
                            {{date_format($order->created_at,"Y M d")}}
                        </div>
                        <div class="col-4">
                            {{$order->expiry_date}}
                        </div>
                    </div>
                    <div class="row p-10">
                        <div class="col-4">
                            <strong>Amount</strong>
                        </div>
                        <div class="col-4">
                            <strong>Status</strong>
                        </div>
                        <div class="col-4">
                            <strong>Action</strong>
                        </div>
                    </div>
                    <div class="row p-10">
                        <div class="col-4">
                            ₹{{number_format($order->order_amount, 2)}}
                        </div>
                        {{-- <div class="col-4 badge badge-success mw-80" style="font-size:100%; border-radius:30px;">
                            confirm
                        </div> --}}
                        <div class="col-4 badge badge-{{$order->order_status == 'confirm' ? 'success' :'warning'}} mw-80" style="font-size:100%; border-radius:30px;">
                            {{$order->order_status}}
                        </div>
                        @if ($order->order_status == 'confirm')
                        <div class="col-4 justify-content-center text-center" style="font-size:100%; border-radius:30px;font-size:20px; ">
                            <a href="{{route('customer.Order.details',[$order->id])}}"><i class="fa fa-eye text-success"></i></a>
                        </div>

                            @else
                            <div class="col-4 badge badge-danger justify-content-center text-center minw" style="font-size:100%; border-radius:30px;left:11px; ">
                                Not accepted
                            </div>
                        @endif


                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection




