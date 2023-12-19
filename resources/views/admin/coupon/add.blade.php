@extends('admin.layout')
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
                {{-- @if ($errors->has()) --}}

                {{-- @endif --}}
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
                                @endisset Coupon
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

                    {{-- @foreach ($errors->all() as $error)
                    <div class="text-danger">{{ $error }}</div>
                    @endforeach --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Coupon Form</h5>
                                    <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                </div>
                                <div class="card-block">
                                    <!-- <h4 class="sub-title">Basic Inputs</h4> -->

                                    <form action="{{ route('admin.coupon.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @isset($data)
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <input type="hidden" name="type" value="edit">
                                        <input type="hidden" name="coupon_bundle_id"
                                            value="{{$data->coupon_bundle_id}}">
                                        @else
                                        <input type="hidden" name="coupon_bundle_id" value="{{$id}}">
                                        <input type="hidden" name="type" value="add">
                                        @endisset

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Coupon Number<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="coupon_no" value="{{$coupon}}"
                                                            readonly>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Sub-Category<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="sub_category" class="form-control">


                                                            @foreach ($category as $sub_category)
                                                            <option value="{{ $sub_category->id }}" @isset($data) {{
                                                                $data->sub_category_id == $sub_category->id ?
                                                                'selected' : '' }} @endisset>
                                                                {{ $sub_category->title }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                @error('sub_category')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Coupon offer<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="offer"
                                                            @isset($data) value="{{ $data->position }}" @else
                                                            value="{{ old('offer') }}" @endisset
                                                            placeholder="Type your no of coupon">
                                                    </div>
                                                </div>
                                                @error('offer')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>



                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class=" col-form-label">Discription<span
                                                            class="text-danger">*</span></label>
                                                    <div class="">

                                                        <textarea rows="5"  cols="5" rows="10" class="form-control editor"
                                                            name="description" placeholder="Default textarea">
                                                            @isset($data)
                                                                {!! $data->description !!}
                                                                @else
                                                                {{ old('description') }}
                                                            @endisset
                                                        </textarea>
                                                    </div>
                                                </div>

                                                @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label class="col-form-label">Terms & Conditions<span class="text-danger">*</span></label>
                                                    <div class="">

                                                        <textarea rows="5" id="editor" cols="5" class="form-control term" name="term_conditions"
                                                            placeholder="Default textarea">
                                                            @isset($data)
                                                                {!! $data->term_conditions !!}
                                                                @else
                                                                {{ old('term_conditions') }}
                                                            @endisset
                                                        </textarea>
                                                    </div>
                                                </div>

                                                @error('term_conditions')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Image <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control"
                                                            onchange="readURL(this);" name="image">
                                                        <img id="img_path"
                                                            src="{{ asset('storage/app/public/coupon')}}/@isset($data){{ $data->image }}@else{{'2023-05-28-6472fee3c2394.png'}} @endisset"
                                                            width="400" height="100" alt="img">
                                                    </div>
                                                </div>

                                                @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
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
                        </div>
                        <!-- Basic Form Inputs card end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {


            $('#vendor_id').on('change', function() {
                // alert('heloo')
                var vendor_id = this.value;
                $("#main_category").html('');
                $("#sub_category").html('');
                $.ajax({
                    url: "{{ route('admin.ajax.vendor.index') }}",
                    type: "POST",
                    data: {
                        vendor_id: vendor_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json', //brand_id
                    success: function(result) {
                        $('#main_category').html(
                            '<option value="' + result.main_category
                                .id + '">' + result.main_category.title +
                                '</option>');
                        // $.each(result.main_category, function(key, value) {
                        //     $("#main_category").append('<option value="' + value
                        //         .id + '">' + value.title +
                        //         '</option>');
                        // });

                        $('#sub_category').html(
                            '<option value="">--Select sub category --</option>');
                        $.each(result.subCategory, function(key, value) {
                            $("#sub_category").append('<option value="' + value
                                .id + '">' + value.title +
                                '</option>');
                        });


                    }
                });
            });

        });
</script>
@stop
