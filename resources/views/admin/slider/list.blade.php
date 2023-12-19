@extends('admin.layout')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Coupon Slider</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Coupon Slider</a>
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
                                        <h5>Coupon Slider Form</h5>
                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                        <div class="card-header-right">
                                            <a href="{{ route('admin.slider.create') }}"
                                                class="btn btn-info">Add</a>

                                        </div>

                                    </div>
                                    <div class="card-block">
                                        <!-- <h4 class="sub-title">Basic Inputs</h4> -->
                                        <div class=" other_form table-responsive">
                                        <table id="table_id" class="display table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>Sl.no</th>
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $k => $d)

                                                    <tr>
                                                        <td>{{ $k + 1 }}</td>
                                                        <td>{{ $d->title }}</td>
                                                        <td><img src="{{ asset('storage/app/public/slider') }}/{{ $d->image }}" alt="img" sizes="" srcset=""></td>
                                                        <td>{{ $d->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.slider.edit', [$d->id]) }}"
                                                                class="text-info">Edit</a> |
                                                            <a href="{{ route('admin.slider.delete', [$d->id]) }}"
                                                                class="text-danger">Delete</a>
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
    @stop
