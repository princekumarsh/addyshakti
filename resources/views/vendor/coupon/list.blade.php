@extends('vendor.layout')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Coupon</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Coupon</a>
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
                                    <div class="card-header">
                                        <h5>Coupon Form</h5>
                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                        <div class="card-header-right">
                                        <a href="{{ route('vendor.coupon.bundle.index') }}" class="btn btn-info">Coupon Bundle</a>
                                        </div>

                                    </div>
                                    <div class="card-block">
                                        <!-- <h4 class="sub-title">Basic Inputs</h4> -->
                                        <div class=" other_form table-responsive">
                                        <table id="table_id" class="display table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>Sl.no</th>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Category</th>
                                                    <th>Sub-category</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $k => $d)
                                                    <tr>
                                                        <td>{{ $k + 1 }}</td>
                                                        <td>
                                                            <div class=""><img
                                                                    src="{{ asset('storage/app/public/coupon') }}/{{ $d->image }}"
                                                                    width="40" alt=""></div>
                                                        </td>
                                                        <td>{{ $d->title }}</td>
                                                        <td>{{ $d->code }}</td>
                                                        <td>{{ $d->Category->title }}</td>
                                                        <td>{{ $d->sub_category->title }}</td>
                                                        <td>₹ {{ number_format($d->price,2) }}</td>
                                                        <td>
                                                            {{-- <div class="switch" onclick="location.href='{{ route('admin.coupon.status', [$d['id'], $d->status ? 0 : 1]) }}'">
                                                                <label >
                                                                    <input type="checkbox" data-toggle="toggle"  {{ $d->status ? 'checked' : '' }} id="stocksCheckbox{{ $d->id }}"
                                                                        data-size="sm">
                                                                    <span class="lever" for="stocksCheckbox{{ $d->id }}"></span>
                                                                </label>
                                                            </div> --}}
                                                            <label >
                                                                    <input type="checkbox" data-toggle="toggle-off" readonly {{ $d->status ? 'checked' : '' }}
                                                                        data-size="sm">
                                                                    <span class="lever" ></span>
                                                                </label>
                                                        </td>
                                                        {{-- <td>
                                                            <a href="{{ route('admin.coupon.edit', [$d->id]) }}"
                                                                class="text-info">Edit</a> |
                                                            <a href="{{ route('admin.coupon.delete', [$d->id]) }}"
                                                                class="text-danger">Delete</a>
                                                        </td> --}}

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
    @stop
