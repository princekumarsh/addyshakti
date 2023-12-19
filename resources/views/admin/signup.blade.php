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

      <link rel="icon" href="{{asset('public/assets/frontend')}}/img/logo.png" type="image/x-icon">
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
      <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/icon/font-awesome/css/font-awesome.min.css')}}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/css/style.css')}}">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body themebg-pattern="theme1">
 

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    @if(Session::has('flash_message'))      
              <div class="alert {{ Session::get('alert-class', 'alert-danger') }}"> {{ Session::get('flash_message') }} <i class='bx bx-close'></i>
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> 
              </div>
            @endif
                        <form action="{{route('customer.auth.sign-up')}}" class="md-float-material form-material" method="post">
                            @csrf
                            <div class="text-center">
                                <img src="{{asset('/public/assets/logo-addy-shakti.png')}}" width="110" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign up</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="f_name" class="form-control"  value="{{old('f_name')}}" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">First Name</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="l_name" class="form-control" value="{{old('l_name')}}" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Last Name</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Your Email Address</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="number" name="phone" class="form-control" value="{{old('phone')}}" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Phone Number</label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="con_password" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" name="check3" value="" required>
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I read and accept <a href="#">Terms &amp; Conditions.</a></span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="{{route('index')}}"><b>Back to website</b></a></p>
                                    </div>
                                </div>
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
<script type="text/javascript" src="{{asset('/public/assets/js/jquery-slimscroll/jquery.slimscroll.js')}} "></script>
<!-- modernizr js -->
    <script type="text/javascript" src="{{asset('/public/assets/js/SmoothScroll.js')}}"></script>     
    <script src="{{asset('/public/assets/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="{{asset('/bower_components/i18next/js/i18next.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/public/assets/js/common-pages.js')}}"></script>
</body>

</html>
