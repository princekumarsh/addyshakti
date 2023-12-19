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
                                <li class="breadcrumb-item"><a href="#!">
                                        Profile
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
                                            <h5>Coupon Form</h5>
                                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                        </div>
                                        <div class="card-block">
                                            <!-- <h4 class="sub-title">Basic Inputs</h4> -->

                                            <form action="{{ route('vendor.coupon.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                               

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Name <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Type your title in Placeholder" name="name"
                                                                    @isset($data)
                                                                        value="{{ $data->title }}"
                                                                    @else
                                                                        value="{{ old('name') }}"
                                                                    @endisset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Image <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input type="file" class="form-control" name="image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Category<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <select name="main_category" class="form-control"
                                                                    name="category" id="main_category">

                                                                    <option value="{{ $category->id }}" selected>
                                                                        {{ $category->title }}</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Sub-Category<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <select name="sub_category" class="form-control"
                                                                    id="sub_category" name="sub_category">


                                                                    @foreach (App\Models\Category::where('parent_id', auth('vendors')->user()->business_category)->get() as $sub_category)
                                                                        <option value="{{ $sub_category->id }}"
                                                                            @isset($data) {{ $data->sub_category_id == $sub_category->id ? 'selected' : '' }} @endisset>
                                                                            {{ $sub_category->title }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Price<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="price"
                                                                    @isset($data)
                                                                        value="{{ $data->price }}"
                                                                    @else
                                                                        value="{{ old('price') }}"
                                                                    @endisset
                                                                    placeholder="Type your title in Placeholder">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Discription<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <textarea rows="5" cols="5" class="form-control" name="description" placeholder="Default textarea">
                                                        @isset($data)
                                                        {{ $data->description }}
                                                        @else
                                                        {{ old('description') }}
                                                        @endisset
                                                        </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">No Of Coupon<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="no_of_coupon"
                                                                    @isset($data)
                                                                        value="{{ $data->no_of_coupons }}"
                                                                    @else
                                                                        value="{{ old('no_of_coupon') }}"
                                                                    @endisset
                                                                    placeholder="Type your no of coupon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Coupon Discount %<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="discount"
                                                                    @isset($data)
                                                                        value="{{ $data->discount }}"
                                                                    @else
                                                                        value="{{ old('discount') }}"
                                                                    @endisset
                                                                    placeholder="Type your coupon discount">
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
