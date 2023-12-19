@extends('layouts.front-end.app')

@section('content')
<div class="container pt100 pb50">

    <div class="pt-25 clearfix mb-1">
        <div class="container bg-white pt-100">


            <div class="row mt-4">

                <div class="col-md-8 offset-md-2 ">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title h1 text-center">Forget Passwword</div>
                            <form method="POST" action="{{ route('password.otp') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="h4">Enter User Email </label>
                                    <div class="input-group">
                                        {{-- <input class="form-control " name="password" type="password"> --}}
                                        <input type="email" class="form-control" name="username" id="username" value="" required=""
                                            placeholder="Enter your email">

                                    </div>
                                </div>


                                <div class="col-12 text-center mt-4">

                                    <button type="submit" class="btn btn-primary w-100">Send Otp</button>


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
