@extends('layouts.front-end.app')
<style>
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
    {{-- <div class="container">
        <div class="row ">
            <div class="">
                <div class=" other_form">
                    <div class="card">
                        <div class="card-header">
                            <div class="row bg-primary text-light ">
                                <div class="col-lg-6 col-sm-6" style="font-size: 25px">
                                    <b>Order No:</b>  {{ '#1000' . '' . $order->id }} <br>
                                    <b>Expiry Date:</b> {{ ($order->expiry_date) }}
                                </div>

                                <div class="col-lg-6 col-sm-6" style="font-size: 25px">
                                    <b>Order Date:</b>  {{ date_format($order->created_at, 'Y M d ') }} <br>
                                    <b>Total Amount:</b>  ₹<span>{{ number_format($order->order_amount, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="b2bcard bg-blue">
            <div class="fs-25">
                <h1>{{$order->CouponBundle->category->title}}</h1>
                <strong>Order No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{ '#1000' . '' . $order->id }} </strong><br>
                <strong>Expiry date&nbsp;&nbsp;&nbsp&nbsp; :&nbsp;&nbsp; {{ ($order->expiry_date) }}</strong><br>
                <strong>Order date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;{{ date_format($order->created_at, 'Y M d ') }} </strong><br>
                <strong>Total amount :&nbsp;&nbsp;{{ number_format($order->order_amount, 2) }} </strong><br>

            </div>
        </div>
    </div>
    <div class="container txt-w">
        <div class="row p-10">
            @foreach ($OrderDetail as $key => $detail)

                @php
                    $coupon_details = json_decode($detail['coupon_details']);
                @endphp
                <div class="b2bcard col-12" style="width: 18rem;">
                    <div class="row plr-10">
                        <div class="fs-26 col-6">
                            <strong><span class="badge rounded-pill bg-info text-dark">{{$key+1}}</span></strong>
                        </div>
                    </div>

                    <div class="row p-10">
                        <div class="col-6">
                            <strong>{{$detail->coupon->title}}</strong>
                        </div>
                        <div class="col-6">
                            <strong>{{$detail->coupon->sub_category->title}}</strong>
                        </div>
                    </div>
                    <div class="row p-10">
                        <div class="col-6">
                            <strong>Name</strong>
                        </div>
                        <div class="col-6">
                            <strong>Coupon use</strong>
                        </div>
                    </div>
                    <div class="row p-10">
                        <div class="col-6">
                            {{ $coupon_details->title }}
                        </div>
                        @if ($detail->redeem)
                            @if ($detail->redeem->no_of_use_coupon == '1')
                                <div class="col-6 badge badge-danger mw-80" style="font-size:100%; border-radius:30px;left:10px;">
                                    used
                                </div>
                            @endif
                        @else
                            <div class="col-6 badge badge-success mw-80" style="font-size:100%; border-radius:30px;left:10px;">
                                Unused
                            </div>
                        @endif
                    </div>
                    <div class="p-10 fs-20 text-center">
                        <a href="{{route('customer.Order.scd',[$detail->coupon->id, $detail->id])}}"><i class="fa fa-eye text-success"></i></a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

<script>
    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }
</script>



{{-- <div class=" other_form table-responsive" >
    <table class="table table-striped  ">
        <thead style="background-color:#f1f8ff;">
            <tr class="">
                <th>Name</th>
                <th>coupon Use</th>
                <th>code</th>
                <th>Coupon key</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($OrderDetail as $detail)
                @php
                    $coupon_details = json_decode($detail['coupon_details']);
                @endphp
                <tr>
                    <td><a
                            href="{{ route('coupon-details', [$coupon_details->slug]) }}">{{ $coupon_details->title }}</a>
                    </td>
                    <td>
                        @if ($detail->redeem)
                            @if ($detail->redeem->no_of_use_coupon == '1')
                                <span class="badge text-white h2" style="color: brown">{{ 'Used' }}</span>
                            @endif
                        @else
                            <span class="badge h2 text-white" style="background-color: green">{{ 'Unused' }}</span>
                        @endif
                    </td>
                    <td onclick="myFunction()" id="myInput">{{ $coupon_details->code }}</td>
                    <td>{{ $detail->key_id }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div> --}}
