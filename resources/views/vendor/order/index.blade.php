@extends('vendor.layout')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Order</h5>
                            <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
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
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page body start -->
                    <div class="page-body">


                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Basic Form Inputs card start -->
                                <div class="card">

                                    <div class="card-block">
                                        <!-- <h4 class="sub-title">Basic Inputs</h4> -->
                                        <div class=" other_form table-responsive">
                                        <table id="table_id" class="display table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>Sl.no</th>
                                                    <th>Order Id</th>
                                                    <th>User Name</th>
                                                    <th>Payment Status</th>
                                                    <th>Payment Method</th>
                                                    <th>Order Status</th>
                                                    <th>Order Amount</th>
                                                    <th>Order Date</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order as $k => $o)
                                                    <tr>
                                                        <td>{{ $k + 1 }}</td>
                                                        <td>#{{ 1000 .''. $o->id }}</td>
                                                        <td>{{ $o->user->name .''. $o->user->l_name}}</td>
                                                        <td>
                                                            @if ($o->payment_status == 'unpaid')
                                                                <span>{{'Unpaid'}}</span>
                                                            @else
                                                                <span>{{'Paid'}}</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($o->payment_method == 'COD')
                                                                <span>{{'COD'}}</span>
                                                            @else
                                                                <span>{{'ONLINE'}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($o->order_status == 'pending')
                                                                <span>{{'Pending'}}</span>
                                                            @else
                                                                <span>{{'Conform'}}</span>
                                                            @endif
                                                        </td>

                                                        <td>{{ number_format($o->order_amount, 2)}}</td>
                                                        <td>{{ $o->created_at->format('d/m/Y')}}</td>

                                                        {{-- <td>
                                                            <div class="switch"
                                                                onclick="location.href='{{ route('admin.coupon.status', [$d['id'], $d->status ? 0 : 1]) }}'">
                                                                <label>
                                                                    <input type="checkbox" data-toggle="toggle"
                                                                        {{ $d->status ? 'checked' : '' }}
                                                                        id="stocksCheckbox{{ $d->id }}"
                                                                        data-size="sm">
                                                                    <span class="lever"
                                                                        for="stocksCheckbox{{ $d->id }}"></span>
                                                                </label>
                                                            </div>
                                                        </td> --}}
                                                        <td>
                                                            <a href="{{ route('vendor.order.details', [$o->id]) }}"
                                                                class="text-info">View</a> |
                                                            {{-- <a href="{{ route('admin.coupon.delete', [$o->id]) }}"
                                                                class="text-danger">Delete</a> --}}
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Basic Form Inputs card end -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
