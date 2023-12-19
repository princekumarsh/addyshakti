    @extends('vendor.layout')
    @section('content')
        <div class="pcoded-content">
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Coupon Redeem</h5>
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
                                        Coupon Redeem
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
                                            <h5>Coupon Redeem</h5>
                                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                        </div>
                                        <div class="card-block">
                                            <!-- <h4 class="sub-title">Basic Inputs</h4> -->

                                            <form action="{{ route('vendor.coupon.redeem.post') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf


                                                <div class="row">
                                                    {{-- <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="col-form-label">Select User <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="user_id" id="" class="form-control">
                                                                @foreach ($users as $key=>$user )
                                                                    <option value="{{$user->id}}">{{$user->name .''.$user->l_name}} <span>({{$user->phone}})</span></option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div> --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="col-form-label">Enter coupon code <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Type your Coupon code in Placeholder"
                                                                name="code" value="{{ old('code') }}">

                                                        </div>
                                                        @error('code')
                                                            <div>
                                                                <p class="text-danger">{{$message}}</p>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="col-form-label">Enter coupon key <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Type your Coupon code key in Placeholder"
                                                                name="key" value="{{ old('key') }}">

                                                        </div>
                                                         @error('key')
                                                            <div>
                                                                <p class="text-danger">{{$message}}</p>
                                                            </div>
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


                $('#main_category').on('change', function() {
                    // alert('heloo')
                    var category_id = this.value;
                    $("#sub_category").html('');
                    $.ajax({
                        url: "{{ route('admin.ajax.index') }}",
                        type: "POST",
                        data: {
                            category_id: category_id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json', //brand_id
                        success: function(result) {
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
