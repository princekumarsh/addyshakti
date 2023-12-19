@extends('layouts.front-end.app')

@section('content')
<div class="container pt100 pb50">

    <div class="pt-100 clearfix mb-1">
        <div class="container bg-white pt-100">
            <div class="row">
                <div class="col-4"><a href="{{route('customer.auth.login')}}" class="active"><b>Sign In</b>
                        <h4 style="border-bottom: 3px solid green; margin-top: 12px"></h4>
                    </a>

                </div>

                <div class="col-4"><a href="{{route('customer.auth.sign-up')}}">Sign Up</a></div>

            </div>
            <hr style="border-top: 1px solid rgb(160, 74, 17); margin-top:-8px;">
            <div class="row mt-4">

                <div class="col-md-8 offset-md-2 mt-3">

                    <div class="">
                        <form method="POST" action="{{ route('customer.auth.login.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label>User Id</label>
                                <div class="input-group">
                                    {{-- <input class="form-control " name="password" type="password"> --}}
                                    <input type="text" class="form-control" name="username" id="username" value="" required="" placeholder="Enter your email or phone no"
                                       >

                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <input class="form-control"  name="password" type="password">
                                    <div class="input-group-append">
                                        <span class="input-group-text ">
                                            <a href="#" class="toggle_hide_password">
                                                <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 text-center mt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary w-100">Login</button>
                                    </div>
                                    <div class="col-6">
                                        <button  class="btn btn-info w-100"><a href="{{route('password.forget')}}">Forget password</a></button>
                                    </div>
                                </div>

                            </div>
                            {{-- <button type="submit" class="btn btn-success">Login</button> --}}
                        </form>

                    </div>
                </div>


                <div class="col-md-12 text-center mt-2">
                    <h4>Or</h4>
                    <a href="{{route('index')}}" class="btn btn-success mt-4">Continue as Guest</a>
                </div>
            </div>


        </div>
    </div>


</div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function() {

// target the link
$(".toggle_hide_password").on('click', function(e) {
   // alert('hjj');
e.preventDefault()

// get input group of clicked link
var input_group = $(this).closest('.input-group')

// find the input, within the input group
var input = input_group.find('input.form-control')

// find the icon, within the input group
var icon = input_group.find('i')

// toggle field type
input.attr('type', input.attr("type") === "text" ? 'password' : 'text')

// toggle icon class
icon.toggleClass('fa-eye-slash fa-eye')
})
})
</script>
