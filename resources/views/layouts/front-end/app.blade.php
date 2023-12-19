<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Addy  for Coupons CMS</title>
    <meta name="description" content="Meta Description">
    <meta name="keywords" content="Meta Keywords">
    <meta property="og:title" content="Black Theme for Coupons CMS">
    <meta property="og:description" content="Meta Description">
    <meta property="og:image" content="">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{asset('public/assets/frontend')}}/img/logo.png" type="image/x-icon">
    <link href="{{asset('public/assets/frontend')}}/css/bootstrap.min.css" media="all" rel="stylesheet">
    <link href="{{asset('public/assets/frontend')}}/css/fontawesome-all.min.css" media="all" rel="stylesheet">
    <link href="{{asset('public/assets/frontend')}}/css/style.css" media="all" rel="stylesheet">
    <link href="{{asset('public/assets/frontend')}}/css/style1.css" media="all" rel="stylesheet">
    <link href="{{asset('public/assets/frontend')}}/css/couponscms.css" media="all" rel="stylesheet">
    <link href="{{asset('public/assets/frontend')}}/css/responsive.css" media="all" rel="stylesheet">
    <link href="{{asset('public/assets/frontend')}}/css/owl.carousel.min.css" media="all" rel="stylesheet">
    <link href="css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <script src="{{asset('public/assets/frontend')}}/js/jquery.min.js"></script>
    <script src="{{asset('public/assets/frontend/js/functions.js')}}"></script>
    <script src="{{asset('public/assets/frontend')}}/js/ajax.js"></script>
    <script src="{{asset('public/assets/frontend')}}/js/owl.carousel.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="https://couponscms.com/demo/content/themes/Default/assets/js/functions.js"></script> --}}
    {{-- <script src="https://couponscms.com/demo/content/themes/Default/assets/js/ajax.js"></script>
    <script src="https://couponscms.com/demo/content/themes/Default/assets/js/bootstrap.min.js"></script>
    <script src="https://couponscms.com/demo/content/themes/Default/assets/js/owl.carousel.min.js"></script> --}}
    <!-- CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

<style>
/*    mobile view sidebar start*/
    .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
/*    mobile view sidebar end*/
@media screen and (max-width: 767px){
    #user-sidebar-content{
        display: none;
    }
}
.item:hover{
box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}
</style>
<script>
function openNav() {
  document.getElementById("mySidenavs").style.width = "200px";
}

function closeNav() {
  document.getElementById("mySidenavs").style.width = "0";
}


</script>
<script>
    $(document).ready(function(){
      $(".user-sidebar-menu").click(function(){
        $("#user-sidebar-content").slideToggle();
      });
    });
</script>
</head>

<body style="background: #fff">

    @include('layouts.front-end.partials.header')
    <!-- Page Content-->
    @if (route('customer.auth.login') == URL::current() || route('customer.auth.sign-up')== URL::current() || route('index')== URL::current())

    @else
    <button class="btn btn-info w-25 mt-3 col-lg-1 ml-2 text-center"> <a
        href="javascript:history.back()"
        {{-- href="{{url()->previous()}}" --}}
        >Back</a></button>
    @endif

        @yield('content')
    <!-- End Page Content-->

    @if (route('customer.auth.login') == URL::current() || route('customer.auth.sign-up')== URL::current())

    @else
     @include('layouts.front-end.partials.footer')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

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
</body>
</html>
