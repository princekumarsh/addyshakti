@extends('layouts.front-end.app')

@section('content')
<div class="container pt100 pb50">

    <div class="pt-25 clearfix mb-1">
        <div class="container bg-white pt-100">


            <div class="row mt-4">

                <div class="col-md-8 offset-md-2 ">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title h1 text-center">Set Password</div>
                            <form method="POST" action="{{ route('save_password') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input class="form-control shadow  bg-body rounded" name="password" type="password">
                                        <input  value="{{$username}}" name="username" type="hidden">
                                        <div class="input-group-append hadow  bg-body rounded">
                                            <span class="input-group-text shadow  bg-body rounded">
                                                <a href="#" class="toggle_hide_password shadow  bg-body rounded">
                                                    <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <p>{{$message}}</p>
                                    @enderror
                                </div>

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

                                    <button type="submit" class="btn btn-primary w-100">Save password</button>


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
