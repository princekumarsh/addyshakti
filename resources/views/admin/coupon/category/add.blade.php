@extends('admin.layout')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Coupon Category</h5>
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
                            <li class="breadcrumb-item"><a href="#!"> @isset($data)
                                        Edit
                                    @else
                                        Add
                                    @endisset Coupon Category</a>
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
                                        <h5>Coupon Category Form</h5>
                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                    </div>
                                    <div class="card-block">
                                        <!-- <h4 class="sub-title">Basic Inputs</h4> -->

                                        <form method="post" action="{{ route('admin.coupon.category.store') }}">
                                            @csrf

                                            @isset($data)
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                            @endisset
                                            <div class="row mt-5">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Category<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                placeholder="Type your title in Placeholder"
                                                                @isset($data)
                                            value="{{ $data->title }}"
                                        @else
                                            value="{{ old('title') }}"
                                        @endisset
                                                                name="title">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>


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
