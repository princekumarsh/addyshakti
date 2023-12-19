@extends('layouts.front-end.app')
<style>
    .clist-sidebar {
        background-color: #f9f3f0;
        height: 300px;
        padding: 10%;
    }

    .clistdata {
        border-bottom: 1px solid rgba(101, 105, 115, .2);
        color: #292930;
        padding: 18px 15px 18px 0;
        min-width: 180px;
    }

    .checkout-image-design {
        margin: 2rem;
        padding: 1.5rem;
        height: 80px;
        width: 170px;
    }
    .txt-w{
        color:white;
    }
</style>
@section('content')
<div class="container pt50 pb50">





    <div class="row push-container">



        <div class="col-md-5">

            <form class="" action="{{ route('customer.add.info') }}" method="post">@csrf
                <div class="row text-center">


                    <div class="col-lg-12">
                        <h3>Fill Basic Information</h3>
                        <div class="card">
                            <div class="card-title"></div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-group">
                                            <label for="">Name </label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{auth('customer')->user()->name}}">
                                            {{-- @error('name')
                                            <div class="text-danger">
                                                <p class="text-danger">{{$message}}</p>
                                            </div>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-group">
                                            <label for="">Contact No </label>
                                            <input type="number" class="form-control" name="contact"
                                                value="{{auth('customer')->user()->phone}}">
                                            {{-- @error('contact')
                                            <div class="text-danger">
                                                <p class="text-danger">{{$message}}</p>
                                            </div>
                                            @enderror --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6 form-group">
                                        <label for="">Email Id </label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{auth('customer')->user()->email}}">
                                        {{-- @error('email')
                                        <div class="text-danger">
                                            <p class="text-danger">{{$message}}</p>
                                        </div>
                                        @enderror --}}
                                    </div>
                                    <div class="mb-3 col-6 form-group">
                                        <label for="">Vehicle No</label>
                                        <input type="text" class="form-control" name="vehicle_no">
                                        {{-- @error('vehicle_no')
                                        <div class="text-danger">
                                            <p class="text-danger">{{$message}}</p>
                                        </div>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6 form-group">
                                        <label for="">Make & Model </label>
                                        <input type="text" class="form-control" name="make_model">
                                        {{-- @error('make_model')
                                        <div class="text-danger">
                                            <p class="text-danger">{{$message}}</p>
                                        </div> --}}
                                        {{-- @enderror --}}
                                    </div>
                                    <div class="mb-3 col-6 form-group">
                                        <label for="">Insurance Renewal Date</label>
                                        <input type="date" class="form-control" name="IRD">
                                        {{-- @error('IRD')
                                        <div class="text-danger">
                                            <p class="text-danger">{{$message}}</p>
                                        </div>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="">Date of Issue</label>
                                    <input type="date" class="form-control" name="date_of_issue">
                                    {{-- @error('date_of_issue')
                                    <div class="text-danger">
                                        <p class="text-danger">{{$message}}</p>
                                    </div>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-12">
                        <button class="btn btn-success mt-4 mb-4" type="submit">Add INfo</button>
                    </div>
            </form>
            {{-- <div class="col-6">
                <a class="btn btn-secondary mt-4 mb-4" onclick="window.location.href='{{ route('coupon') }}'">Go to
                    shopping</a>
            </div> --}}
            {{-- <div class="col-12">
                <a class="btn btn-success mt-4 mb-4" style="color:white;" >NEXT-></a>
            </div> --}}


        </div>
        {{-- @if($info->count() > 0)
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">Select Option</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($info as $key=>$in)
                        @php
                           $data = json_decode($in->info)
                        @endphp
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header text-center">
                                    <input type="radio" onclick="window.location.href='{{route('customer.checkout',$in->id)}}'" name="payment_method" value="{{$in->id}}">
                                    <a href=""><i class="fa-solid fa-pen ss"></i></a>
                                </div>
                                <div class="card-body">
                                <p>
                                    {{$data->name}} ,
                                    {{$data->make_model}}, <br>
                                    {{$data->vehicle_no}}
                                </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <button onclick="window.location.href='{{route('customer.checkout')}}'" class="btn btn-success w-90 mt-4">Proceed to Payment</button>
        @endif --}}


    </div>



</div>

</div>
@endsection
