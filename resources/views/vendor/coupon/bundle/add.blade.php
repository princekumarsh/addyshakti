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


                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Basic Form Inputs card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Coupon Bundle Form</h5>
                                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                        </div>
                                        <div class="card-block">
                                            <!-- <h4 class="sub-title">Basic Inputs</h4> -->

                                            <form action="{{ route('vendor.coupon.bundle.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @isset($data)
                                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                                    <input type="hidden" name="type" value="edit">
                                                @else
                                                    <input type="hidden" name="type" value="add">
                                                @endisset

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
                                                            <label class="col-sm-3 col-form-label">Expiry Month <span class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" placeholder="24" name="expiry_date" @isset($data)
                                                                    value="{{ $data->expiry_date }}" @else value="{{ old('expiry_date') }}" @endisset>
                                                            </div>
                                                            @error('name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Video Link <span class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input type="url" class="form-control" name="video_link">
                                                            </div>
                                                        </div>
                                                        @error('video_link')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
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
