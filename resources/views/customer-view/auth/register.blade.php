@extends('layouts.front-end.app')

@section('content')
<div class="container pt100 pb50">

    <div class="pt-100 clearfix mb-1">
        <div class="container bg-white pt-100">
            <div class="row">
                <div class="col-4"><a href="{{route('customer.auth.login')}}" class="active"><b>Sign In</b>

                    </a>

                </div>

                <div class="col-4"><a href="{{route('customer.auth.sign-up')}}"><b>Sign Up</b>
                <h4 style="border-bottom: 3px solid green; margin-top: 12px; margin-left: -18%;"></h4>
                </a></div>

            </div>
            <hr style="border-top: 1px solid rgb(160, 74, 17); margin-top:-8px;">
            <div class="row mt-4">

                <div class="col-md-8 offset-md-2 mt-3">

                    <div class="">
                       <form method="POST" action="{{route('customer.auth.sign.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form_field">
                                    <label for="f_name">First Name:</label>
                                    <div>
                                        <input  class="shadow  bg-body rounded"type="text" name="f_name" id="f_name" value="{{old('f_name')}}" required="">
                                    </div>
                                    @error('f_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form_field"><label for="l_name">Last Name:</label>
                                    <div><input  class="shadow  bg-body rounded"type="text" name="l_name" id="l_name" value="{{old('l_name')}}" required=""></div>
                                    @error('l_name')
                                    <p>{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form_field"><label for="email">Email Address:</label>
                                    <div>
                                        <input  class="shadow  bg-body rounded"type="email" name="email" id="email" value="{{old('email')}}" required="">
                                    </div>
                                    @error('email')
                                    <p>{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form_field"><label for="phone">Phone Number:</label>
                                    <div><input  class="shadow  bg-body rounded"type="number" name="phone" id="phone" value="{{old('phone')}}" required=""></div>
                                </div>
                                @error('phone')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        </div>
                        {{-- <div class="form_field"><label for="password">Password:</label>
                            <div><input  class="shadow  bg-body rounded"type="password" name="password" id="password" value="" required=""></div>
                            @error('password')
                            <p>{{$message}}</p>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input class="form-control shadow  bg-body rounded" name="password" type="password">
                                <div class="input-group-append hadow  bg-body rounded">
                                    <span class="input-group-text shadow  bg-body rounded">
                                        <a href="#" class="toggle_hide_password shadow  bg-body rounded">
                                            <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form_field">
                            <label for="con_password">Confirm Password:</label>
                            <div>
                                <input  class="shadow  bg-body rounded"type="password" name="con_password" id="con_password" value="" required="">
                            </div>
                            @error('con_password')
                            <p>{{$message}}</p>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <div class="input-group">
                                <input class="form-control shadow  bg-body rounded" id="con_password" name="con_password" type="password">
                                <div class="input-group-append hadow  bg-body rounded">
                                    <span class="input-group-text shadow  bg-body rounded">
                                        <a href="#" class="toggle_hide_password shadow  bg-body rounded">
                                            <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            @error('con_password')
                            <p>{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary w-100">Register</button>

                        </div>
                        <!-- <input  class="shadow  bg-body rounded"type="hidden" name="data[csrf]" value="pLNiGPZN2acV"> -->
                        {{-- <button type="submit">Register</button> --}}
                    </form>
                    </div>
                </div>

                {{-- <div class="col-md-12 text-center  mt-5 ">
                    <button type="button" class="btn btn-outline-danger"><a>Login
                            with
                            Facebook</a></button>
                    <button type="button" class="btn btn-outline-danger"><i class="fa fa-facebook"></i><a>Login with
                            Google+</a></button>

                </div> --}}
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
