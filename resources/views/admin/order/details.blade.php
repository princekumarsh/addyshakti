@extends('admin.layout')
<style>
    .clist-sidebar {
        background-color: white;
        height: 300px;
        padding: 10%;
    }

    .clistdata {
        border-bottom: 1px solid rgba(101, 105, 115, .2);
        color: #292930;
        padding: 18px 15px 18px 0;
        min-width: 180px;
    }
</style>
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Order</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="#"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Order</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div class="pcoded-inner-content">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <b>Order ID {{ '#1000' . '' . $order->id }}</b> <br>
                                    {{ date_format($order->created_at, 'Y M d H:i:s') }} <br>
                                    <b >Expiry Date:- {{$order->expiry_date}}</b>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <button class="btn btn-primary">Print Invoice</button><br />
                                    <div><b>Status:</b>
                                        @if ($order->order_status == 'pending')
                                            <span class="bg-danger badge"> Pending</span>
                                        @else
                                            <span class="bg-success badge"> Confirm</span>
                                        @endif
                                    </div>
                                    <div>
                                        <b> Payment Method:</b>
                                        <span class="bg-success badge">
                                            @if ($order->payment_method == 'COD')
                                                Cash On Delivery
                                            @else
                                                Online
                                            @endif
                                        </span>
                                    </div>

                                    <div>
                                        <b>Payment Status:</b>
                                        @if ($order->payment_status == 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-danger"> Unpaid</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="table-responsive">
                                        <table class="table display">
                                            <thead style="background-color:#f1f8ff;">
                                                <tr class="">
                                                    {{-- <th>Logo</th> --}}
                                                    <th>Name</th>
                                                    <th>coupon Use</th>
                                                    <th>coupon category</th>
                                                    <th>coupon sub category</th>
                                                    <th>Coupon code</th>
                                                    <th>Coupon key</th>
                                                    {{-- <th>Total</th> --}}
                                                    {{-- <th colspan="2">Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderDetails as $detail)
                                                {{-- {{dd($detail)}} --}}
                                                    @php
                                                        $coupon_details = json_decode($detail['coupon_details']);
                                                    @endphp
                                                    <tr>
                                                        {{-- <td><img src="{{ asset('storage/app/public/coupon') }}/{{ $coupon_details->image }}"
                                                                alt="" width="20%"></td> --}}
                                                        <td>{{ $coupon_details->title }}</a>
                                                        </td>
                                                        <td>
                                                            @if ($detail->redeem)
                                                                @if ($detail->redeem->no_of_use_coupon == '1')
                                                                    <span
                                                                        class="badge badge-success h3">{{ 'Yes' }}</span>
                                                                @endif
                                                            @else
                                                                <span
                                                                    class="badge badge-danger h3">{{ 'No' }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $detail->coupon->category->title }}</td>
                                                        <td>{{ $detail->coupon->sub_category->title }}</td>
                                                        <td >{{ $coupon_details->code }}</td>
                                                        {{-- <td>{{$detail->use_coupon}}</td> --}}
                                                        <td>{{ $detail->key_id }}</td>

                                                        {{-- <td>₹<span>{{ number_format($coupon_details->price * $detail->qty, 2) }}</span>
                                                            <br> <b>Qty:</b>
                                                            {{ $detail->qty }}
                                                        </td> --}}

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--start summery menu---->

                                <div class="col-lg-6 col-12">
                                    <div class="clist-sidebar">
                                        <div>
                                            <table class="table">
                                                <tbody>
                                                    <tr class="clistdata">
                                                        <td style="font-weight: 500">Total Item</td>
                                                        <td><span>{{ count($orderDetails) }}</span></td>
                                                    </tr>

                                                    <tr class="clistdata">
                                                        <td style="font-weight: 500">Subtotal
                                                        </td>
                                                        <td>₹<span>{{ number_format($order->order_amount, 2) }}</span></td>
                                                    </tr>
                                                    <tr class="clistdata">
                                                        <td style="font-weight: 600">Total</td>
                                                        <td class="text-info" style="font-weight:500">
                                                            ₹<span>{{ number_format($order->order_amount, 2) }}</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!--end summery menu------>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div>
                                    <h5 class="mt-3 text-center">Order & Payment Status</h5>

                                    <h6 class="ml-3">Order Status</h6>
                                    <select name="order" class="form-control ml-3" class="form-control ml-3 status"
                                        style="border:1px solid blue;width:90%" onchange="order_status(this.value)"
                                        data-id="{{ $order->id }}">
                                        <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="confirm" {{ $order->order_status == 'confirm' ? 'selected' : '' }}>
                                            Confirm</option>
                                        {{-- <option value="oof">Out of delivery</option> --}}
                                    </select>

                                    <h6 class="ml-3 mt-4">Payment Status</h6>
                                    <select name="payment_status" class="form-control ml-3"
                                        style="border:1px solid blue;width:90%" onchange="payment_status(this.value)"
                                        data-id="{{ $order->id }}">
                                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>
                                            Paid</option>
                                        <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>
                                            Unpaid</option>
                                    </select>

                                    {{-- <h6 class="ml-3 mt-4">Shipping Type (Order Wise) Shipping Method (Company Vehicle)</h6>
                                    <select name="shipping_type" class="form-control ml-3 mb-3"
                                        style="border:1px solid blue;width:90%">
                                        <option value="cdt">Choose Delivery Type</option>
                                        <option value="bsdm">By Self Delivery Man</option>
                                        <option value="btpds">By Third Party Delivery Service</option>
                                    </select> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div>
                                    <h5 class="mt-3 text-center"><i class="fa fa-user"></i><span class="ml-2">Customer
                                            information</span></h5>

                                    <div class="row">
                                        <div class="col-lg-5 col-3">

                                            {{-- <img src="{{asset('public/assets/img/image-place-holder.png')}}" style="width: 80px;height: 90px;margin-left: 10px;"> --}}
                                            <img onerror="this.src='{{ asset('public\assets\frontend\img\avatar_ac.png') }}'"
                                                class="data_avatar" style="width: 80px;height: 90px;margin-left: 10px;"
                                                @if ($order->user->profile_photo) src="{{ asset('storage/app/public/user') }}/{{ $order->user->profile_photo }}"
                                                @else
                                                src="{{ asset('public\assets\frontend\img\avatar_ac.png') }}" @endif
                                                alt="Image">
                                        </div>
                                        <div class="col-lg-7 col-9">
                                            <h6>{{ $order->user->name }} {{ $order->user->l_name }}</h6>
                                            <h6>{{ count($orderDetails) }} <span class="p">Orders</span></h6>
                                            <h6>{{ $order->user->phone }}</h6>
                                            <p>{{ $order->user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div>
                                    <h5 class="mt-3 text-center"><i class="fa fa-location"></i><span class="ml-2">Order
                                            Buy Information</span></h5>

                                    <div class="row">
                                        <div class="col-lg-2 col-3">
                                            @php
                                                $order_info = json_decode($order['information']);

                                            @endphp
                                            {{-- <img src="{{asset('public/assets/img/ear.png')}}" style="width: 100px;height: 100px;"> --}}
                                        </div>
                                        <div class="col-lg-7 col-9">
                                            <h6>{{ $order_info->name }}</h6>
                                            <h6> <span class="p">{{ $order_info->email }}</span></h6>
                                            <h6>{{ $order_info->contact }}</h6>
                                            <h6><b>vehicle no :- </b> {{ $order_info->vehicle_no }}</h6>
                                            <p><b>Make & Model :- </b> {{ $order_info->make_model }}</p>
                                            <p><b>Insurance Renewal Date :-</b> {{ $order_info->IRD }}</p>
                                            <p><b>Date of Issue :-</b> {{ $order_info->date_of_issue }}</p>
                                            {{-- <p>payment_method: {{$order_info->payment_method}}</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    function order_status(status) {
        // alert({{ $order['id'] }} + " , " + status);
        $.ajax({
            url: "{{ route('admin.order.order.status') }}",
            type: "POST",
            data: {
                id: {{ $order['id'] }},
                status: status,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json', //brand_id
            success: function(result) {
                //   console.log(result.status);
                if (result.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Status update successfully',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    location.reload()
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Order Status update Unsuccessfully',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }
        });

        // $.ajax({
        //     type: "POST",
        //     dataType: "json",
        //     url: "{{ route('admin.order.order.status') }}",
        //     data: {'status': status, 'user_id': {{ $order['id'] }} ,_token: '{{ csrf_token() }}'},
        //     success: function(data){
        //       console.log(data.success)
        //     }
        // });
    }

    function payment_status(status) {
        // alert({{ $order['id'] }} + " , " + status);
        $.ajax({
            url: "{{ route('admin.order.payment.status') }}",
            type: "POST",
            data: {
                id: {{ $order['id'] }},
                status: status,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json', //brand_id
            success: function(result) {
                //   console.log(result.status);
                if (result.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'payment Status update successfully',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    location.reload()
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'payment Status update Unsuccessfully',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }
        });

        // $.ajax({
        //     type: "POST",
        //     dataType: "json",
        //     url: "{{ route('admin.order.order.status') }}",
        //     data: {'status': status, 'user_id': {{ $order['id'] }} ,_token: '{{ csrf_token() }}'},
        //     success: function(data){
        //       console.log(data.success)
        //     }
        // });
    }
</script>
