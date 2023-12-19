<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Addy for Coupons CMS</title>
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
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        /*    mobile view sidebar end*/
        @media screen and (max-width: 767px) {
            #user-sidebar-content {
                display: none;
            }
        }

        .item:hover {
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

    {{-- @include('layouts.front-end.partials.header') --}}
    @php
    $AddToCart = '';
    if(auth('customer')->user()){
    $AddToCart = App\Models\AddToCart::where('user_id', auth('customer')->user()->id)->count();
    }

    @endphp
    <header class="menu-container">
        <div class="header-menu container">

            <div class="logo">
                <img style="width:103px;" src="{{ asset('public/assets/frontend') }}/img/logo.png" alt="">
            </div>



        </div>
    </header>


    @if (route('customer.auth.login') == URL::current() || route('customer.auth.sign-up')== URL::current())

    @else
    <style>
        .borderLi {
            border-bottom: 1px solid rgb(222, 223, 217);
        }
    </style>
    <div id="mySidenavs" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul class="menu">
            <li class="active borderLi"><a href="{{route('index')}}" target="_self"><i class="fa fa-home"></i> Home</a></li>
            <li class="contains-sub-menu borderLi"><a href="{{ route('coupon') }}" target="_self"> Coupons</a></li>
            <li class="contains-sub-menu borderLi"><a href="{{ route('store') }}" target="_self"><i class="fa fa-book"></i>
                    Stores</a></li>
            <li class="borderLi"><a href="{{route('category')}}" target="_self">Categories </a></li>
            @if (auth('customer')->user())
            {{-- <li class="user-sub-menu"><a href="#"><i class="fa fa-heart"></i> Favorites <i
                        class="fa fa-caret-down"></i></a>
                <ul>
                    <li><a href="#"><i class="fa fa-book"></i>
                            Stores</a></li>
                    <li><a href="#"><i class="fa fa-ticket"></i> Coupons</a></li>
                    <li><a href="#"><i class="fa fa-cart-arrow-down"></i> Products</a></li>
                </ul>
            </li> --}}
            <li class="{{Request::is('customer/add-to/cart')?'active':''}} rr borderLi"><a
                    href="{{route('customer.add.to.cart.item')}}"><i class="fa fa-shopping-bag"></i> Carts </a>

            </li>
            {{-- <li class="user-sub-menu"><a href="#"><i class="fa fa-star"></i> Saved <i class="fa fa-caret-down"></i></a>
                <ul>
                    <li><a href="#"><i class="fa fa-book"></i> Stores</a></li>
                    <li><a href="#"><i class="fa fa-ticket"></i> Coupons</a></li>
                    <li><a href="#"><i class="fa fa-cart-arrow-down"></i> Products</a></li>
                </ul>
            </li> --}}
            <li class="borderLi">
                <a href="{{route('customer.myOrder')}}"><i class="fa fa-barcode"></i>
                    Claimed Coupons</a>
            </li>
            {{-- <li class="user-sub-menu"><a href="#"><i class="fa fa-gift"></i> Rewards <i
                        class="fa fa-caret-down"></i></a>
                <ul>
                    <li><a href="#"><i class="fa fa-gift"></i>
                            Rewards</a></li>
                    <li><a href="#"><i class="fa fa-paper-plane-o"></i> Reward Reqests</a></li>
                </ul>
            </li> --}}
            {{-- <li><a href="#"><i class="fa fa-book"></i> Add
                    Your Store</a></li> --}}
            <li class="{{Request::is('customer/account')?'active':''}} borderLi"><a href="{{route('customer.profile')}}"><i
                        class="fa fa-edit"></i> Edit Profile</a></li>
            <li class="{{Request::is('customer/password')?'active':''}} borderLi"><a
                    href="{{route('customer.password')}}"><i class="fa fa-edit"></i>
                    Change Password</a></li>
            {{-- <li><a href="#"><i class="fa fa-users"></i>
                    Refer a Friend</a></li> --}}

            <li class="contains-sub-menu menu-view small-v borderLi">
                {{--<a href="#">
                    <i class="fa fa-user"></i>{{auth('customer')->user()->name}}
                    <i class="fa fa-angle-down"></i></a> --}}
                <ul class="sub-nav">
                    {{-- <li><a href="#">{{auth('customer')->user()->name.' '.auth('customer')->user()->l_name}}</a></li>
                    --}}
                    <li class="borderLi"><a href="{{route('customer.profile')}}" target="_self">Profile</a></li>

                    <li class="borderLi"><a href="{{route('customer.auth.logout')}}">Logout</a></li>
                </ul>
            </li>

            @else
            {{-- <li class="borderLi"><a href="{{ route('customer.auth.login') }}" target="_self"><i
                        class="fa fa-unlock"></i>Sign In</a></li>
            <li class="borderLi"><a href="{{ route('customer.auth.sign-up') }}" target="_self"><i
                        class="fa fa-user-plus"></i> Join In</a>
            </li> --}}

            @endif
            <!--<li><a href="{{ route('vendor.create') }}" target="_self"><i class="fa fa-user-plus"></i> Become a vendor</a></li>-->
        </ul>
    </div>
    @endif




    <!--
    <div class="overlay-menu">
        <div class="close-button">
            <div class="container">
                <a href="#"><i class="fas fa-times"></i></a>

            </div>
        </div>


        <div class="row mobile-menu-container">
            <div class="col-12 align-self-center">
                <div class="container">
                    <ul class="menu">
                        <li class="active"><a href="index.htm" target="_self"><i class="fa fa-home"></i></a></li>
                        <li class="contains-sub-menu"><a href="#" target="_self">Coupons</a></li>
                        <li class="contains-sub-menu"><a href="stores.html" target="_self">Stores</a></li>
                        <li><a href="#" target="_self">Categories </a></li>
                        @if (auth('customer')->user())
                        <li class="contains-sub-menu menu-view small-v">
                            <a href="#">
                            <i class="fa fa-user"></i>{{auth('customer')->user()->name}}
                            <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-nav">
                            <li><a href="#">{{auth('customer')->user()->name.' '.auth('customer')->user()->l_name}}</a></li>
                            <li><a href="{{route('customer.profile')}}" target="_self">Profile</a></li>

                            <li><a href="{{route('customer.auth.logout')}}">Logout</a></li>
                        </ul>
                    </li>

                @else
                <li><a href="{{ route('customer.auth.login') }}" target="_self"><i class="fa fa-unlock"></i>Sign In</a></li>
                <li><a href="{{ route('customer.auth.sign-up') }}" target="_self"><i class="fa fa-user-plus"></i> Join In</a></li>

                @endif
                <li><a href="{{ route('vendor.create') }}" target="_self"><i class="fa fa-user-plus"></i> Become a vendor</a></li>-->
    <!--                 </ul>
                </div>
            </div>
        </div>
    </div>  -->

    {{-- <div class="overlay-menu search-overlay">
        <div class="close-button">
            <div class="container">
                <a href="#"><i class="fas fa-times"></i></a>
            </div>
        </div>
        <div class="row search-container">
            <div class="offset-md-3 col-md-6 align-self-center">
                <div class="container">
                    <div class="title-options sc-form">
                        <form action="#" method="GET">
                            <div class="sc-title mb-50">
                                <div class="text-center">
                                    <h2>Search for coupons, products or stores</h2>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" name="s" placeholder="Type and press enter" required="">
                            </div>
                            <div class="row mt-25">
                                <div class="col-6 sc-select">
                                    <div class="options options-left">
                                        <a href="#"><span>Any Category</span> <i class="fa fa-angle-down"></i></a>
                                        <input type="hidden" name="category" value="">
                                        <ul>
                                            <li><a href="{{ route('coupon') }}" data-attr="1">Toys &amp; Games</a>
                                            </li>
                                            <li><a href="{{ route('coupon') }}" data-attr="2">Sports &amp;
                                                    Outdoors</a></li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Page Content-->


    <div class="container">

        {{-- <div class=" clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mt-5 offset-md-2">
                        <div class="title-options text-center">
                            <h2>Vendor Registration Account</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="card">
            <div class="card-body">
                <div class="card-header text-center h3">Vendor Registration Account</div>
                <div class="pt-25 pb-25 clearfix">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="register_form other_form">
                                    <form method="POST" action="{{ route('vendor.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field">
                                                    <label for="c_name">Company Name:</label>
                                                    <div>
                                                        <input type="text" name="c_name" id="c_name" value="{{ old('c_name') }}"
                                                            required="">
                                                    </div>
                                                    @error('c_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field">
                                                    <label for="c_address">Company Address:</label>
                                                    <div>
                                                        <input type="text" name="c_address" id="c_address" value="{{ old('c_name') }}"
                                                            required="">
                                                    </div>
                                                    @error('c_address')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field">
                                                    <label for="c_address">Company Address Google map Link:</label>
                                                    <div>
                                                        <input type="text" name="address_link" id="c_address" value="{{ old('address_link') }}" required="">
                                                    </div>
                                                    @error('address_link')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field">
                                                    <label for="c_gst">Company GST:</label>
                                                    <div>
                                                        <input type="text" name="c_gst" id="c_gst" value="{{ old('c_name') }}"
                                                            required="">
                                                    </div>
                                                    @error('c_gst')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field">
                                                    <label for="c_category">Company Category:</label>
                                                    <div>
                                                        <select name="category" id="" name="category">
                                                            <option>Select category</option>
                                                            @foreach ($category as $cat)
                                                            <option value="{{ $cat->id }}" {{ old('category')==$cat->id ? 'selected'
                                                                : '' }}>
                                                                {{ $cat->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('c_category')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-12">
                                                <div class="form_field">
                                                    <label for="f_name"> Company Owner First Name:</label>
                                                    <div>
                                                        <input type="text" name="f_name" id="f_name" value="{{ old('f_name') }}"
                                                            required="">
                                                    </div>
                                                    @error('f_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-lg-6 col-12">
                                                <div class="form_field"><label for="l_name"> Company Owner Last Name:</label>
                                                    <div><input type="text" name="l_name" id="l_name" value="{{ old('l_name') }}"
                                                            required=""></div>
                                                    @error('l_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field">
                                                    <label class="fileUpload " for="company_logo"> Company logo:</label>
                                                    <div> <input type="file" name="company_logo" value="{{ old('company_logo') }}"
                                                            class="form-control"></div>
                                                    @error('company_logo')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form_field"><label for="email">Company Email :</label>
                                                    <div>
                                                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                                            required="">
                                                    </div>
                                                    @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field"><label for="phone">Company Phone Number:</label>
                                                    <div><input type="number" name="phone" id="phone" value="{{ old('phone') }}"
                                                            required=""></div>
                                                </div>
                                                @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field"><label for="password">Password:</label>
                                                    <div><input type="password" name="password" id="password"
                                                            value="{{ old('password') }}" required=""></div>

                                                </div>
                                                @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form_field">
                                                    <label for="con_password">Confirm Password:</label>
                                                    <div>
                                                        <input type="password" name="con_password" id="con_password"
                                                            value="{{ old('con_password') }}" required="">
                                                    </div>

                                                </div>

                                            </div>
                                            @error('con_password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <!-- <input type="hidden" name="data[csrf]" value="pLNiGPZN2acV"> -->
                                        <button type="submit">Register</button>
                                        {{-- <div class="col-lg-6 col-12">
                                            <div class="form_field">
                                                <a href="" class="btn ">Login</a>
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content-->

    {{-- @if (route('customer.auth.login') == URL::current() || route('customer.auth.sign-up')== URL::current())

    @else
    @include('layouts.front-end.partials.footer')
    @endif --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    {{-- @if ($errors->any())
    <script>
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
    @endif --}}
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
