@extends('admin.layout')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Coupon Sub-Category</h5>
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
                            <li class="breadcrumb-item"><a href="#!">
                                    @isset($data)
                                        Edit
                                    @else
                                        Add
                                    @endisset Coupon Sub-Category
                                </a>
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
                                        <h5>Coupon Sub-Category Form</h5>
                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                    </div>
                                    <div class="card-block">
                                        <!-- <h4 class="sub-title">Basic Inputs</h4> -->

                                        <form action="{{ route('admin.coupon.category.store') }}" method="post">
                                            @csrf
                                            @isset($data)
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                            @endisset
                                            <input type="hidden" name="subcategory" value="sub_category">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Category<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="category">
                                                                <option value="opt1">Select One Value Only</option>
                                                                @foreach ($category as $cat)
                                                                    <option value="{{ $cat->id }}"
                                                                        @isset($data)
                                           {{ $data->parent_id == $cat->id ? 'selected' : '' }}

                                        @endisset>
                                                                        {{ $cat->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('category')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Sub-Category<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                @isset($data)
                                            value="{{ $data->title }}"
                                        @else
                                            value="{{ old('title') }}"
                                        @endisset
                                                                placeholder="Type your title in Placeholder" name="title">
                                                        </div>
                                                        @error('title')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
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
                        @stop
