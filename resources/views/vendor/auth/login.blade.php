<!DOCTYPE html>
<html lang="en">

<head>
    <title>Addy-Sakti-Login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <!-- Favicon icon -->

    <link rel="icon" href="{{asset('/public/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('/public/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/icon/icofont/css/icofont.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('/public/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/css/style.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>

<body themebg-pattern="theme1">


    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    @if(Session::has('flash_message'))
                    <div class="alert {{ Session::get('alert-class', 'alert-danger') }}"> {{
                        Session::get('flash_message') }} <i class='bx bx-close'></i>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                    </div>
                    @endif
                    <form class="" accept="{{ route('vendor.login') }}" method="post">
                        @csrf
                        <div class="text-center">
                            <img src="{{asset('/public/assets/frontend/img/logo.png')}}" width="100" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Sign In Vendor</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <label class="float-label">Enter User Id</label>
                                    <input type="text" name="username" id="email" class="form-control" required="">
                                    <span class="form-bar"></span>

                                </div>
                                {{-- <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div> --}}
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input class="form-control" name="password" type="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text ">
                                                <a href="#" class="toggle_hide_password">
                                                    <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" value="lsRememberMe" name="remember" id="rememberMe">
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right f-right">
                                            <a href="#" class="text-right f-w-600"> Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign
                                            in</button>
                                    </div>
                                </div>
                                <hr />

                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{asset('/public/assets/js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/public/assets/js/jquery-ui/jquery-ui.min.js ')}}"></script>
    <script type="text/javascript" src="{{asset('/public/assets/js/popper.js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/public/assets/js/bootstrap/js/bootstrap.min.js')}} "></script>
    <!-- waves js -->
    <script src="{{asset('/public/assets/pages/waves/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('/public/assets/js/jquery-slimscroll/jquery.slimscroll.js')}} ">
    </script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('/public/assets/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('/public/assets/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{asset('/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('/public/assets/js/common-pages.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
@if ($errors->any())
<script>
    @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
</script>
@endif
<script>
    $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif



        });

</script>

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







const rmCheck = document.getElementById("rememberMe"),
emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
rmCheck.setAttribute("checked", "checked");
emailInput.value = localStorage.username;
} else {
rmCheck.removeAttribute("checked");
emailInput.value = "";
}

function lsRememberMe() {
   //alert(emailInput.value)
if (rmCheck.checked && emailInput.value !== "") {
localStorage.username = emailInput.value;
localStorage.checkbox = rmCheck.value;
} else {
localStorage.username = "";
localStorage.checkbox = "";
}
}
    </script>
</body>

</html>
