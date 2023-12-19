@extends('layouts.front-end.app')

@section('content')
<div class="container pt100 pb50">

    <div class="pt-25 clearfix mb-1">
        <div class="container bg-white pt-100">


            <div class="row mt-4">

                <div class="col-md-8 offset-md-2 ">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title h1 text-center">Otp Verify</div>
                            <form method="POST" action="{{ route('save_verify') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="h4">Enter Otp </label>
                                    <div class="input-group">
                                        {{-- <input class="form-control " name="password" type="password"> --}}
                                        <input type="hidden" class="form-control" name="username" id="username" value="{{$username}}"
                                            placeholder="Enter your email">
                                            <input type="text" class="form-control" name="otp" id="otp"  required=""
                                                placeholder="Enter otp">

                                    </div>
                                </div>


                                <div class="col-12 text-center mt-4">

                                    <button type="submit" class="btn btn-primary w-100">Verify Otp</button>


                                </div>
                                {{-- <button type="submit" class="btn btn-success">Login</button> --}}
                            </form>
                        </div>
                    </div>
                </div>



            </div>


        </div>
    </div>


</div>

@endsection
