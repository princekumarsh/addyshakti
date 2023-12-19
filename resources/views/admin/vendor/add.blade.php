@extends('admin.layout')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">vendor Register</h5>
                        <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">vendor Register</a>
                        </li>
                        @isset($data)
                        Edit
                        @else
                        Add
                        @endisset
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
                                    <h5>vendor Register Form @isset($data)
                                          Edit
                                        @else
                                           Add
                                        @endisset</h5>
                                    <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                </div>
                                <div class="card-block">
                                    @if (Session::has('flash_message'))
                                    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                        {!! Session::get('flash_message') !!} <a href="#" class="close"
                                            data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>
                                    </div>
                                    @endif
                                    <form method="post" action="{{ route('admin.vendor.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @isset($data)
                                       <input type="hidden" name="id" value="{{$data->id}}">
                                       <input type="hidden" name="type" value="edit">
                                        @else
                                        <input type="hidden" name="type" value="add">
                                        @endisset
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Company Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="@isset($data){{ $data->company_name }}
                                        @else {{ old('company_name') }}@endisset" name="company_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Company GST <span
                                                            class="text-muted">(optional)</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="@isset($data){{ $data->company_gst }}@else{{old('company_gst')}}@endisset" name="company_gst">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Company Address <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="@isset($data){{ $data->company_address }}@else{{old('company_address') }}@endisset" name="company_address">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Business category <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="business_category" class="form-control"
                                                            id="business_category">
                                                            @foreach ($category as $c)
                                                            <option value="{{ $c->id }}" @isset($data) {{ $data->business_category == $c->id ? 'selected':''}}@endisset>{{ $c->title }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <input type="text" class="form-control"
                                                            value="{{old('business_category')}}"
                                                            name="business_category"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="@isset($data){{ $data->fname }}@else {{ old('fname') }}@endisset" name="fname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="@isset($data){{ $data->lname }}@else{{ old('lname') }}@endisset" name="lname">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" value="@isset($data){{ $data->email }} @else{{ old('email') }} @endisset" name="email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Mobile No. <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="@isset($data){{ $data->phone }} @else{{old('phone')}} @endisset" name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Logo <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" onchange="readURL(this);" name="logo">
                                                    </div>
                                                    <img id="img_path" src="@isset($data){{ asset('storage/app/public/vender/company_logo') }}/{{ $data->logo }}@endisset" width="400"
                                                        height="100" alt="">
                                                </div>
                                            </div>
                                            @isset($data)
                                            <input type="hidden" class="form-control" value="{{$data->password}}"
                                                name="password">
                                            @else
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Password <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                                                </div>
                                            </div>
                                            @endisset

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
                        @stop
