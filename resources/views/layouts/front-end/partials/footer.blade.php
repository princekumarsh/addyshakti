@php
$AddToCart = '';
if(auth('customer')->user()){
$AddToCart = App\Models\AddToCart::where('user_id', auth('customer')->user()->id)->count();
}

@endphp
<footer>
    <div class="container bg-dark  text-info">
        <div class="footer-delimiter"></div>
        <div class="row">
            <div class="col-6 col-md-2">
                <h6>Company</h6>
                <ul class="flinks">
                    <li class="active"><a href="{{route('index')}}" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">About Us</a></li>
                    <li><a href="#" class="text-white">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2">
                <h6>Stores</h6>
                <ul class="flinks">
                    <li><a href="{{route('store')}}" class="text-white">All Stores</a></li>
                    {{-- <li><a href="#" class="text-white">Top Stores</a></li> --}}
                    {{-- <li><a href="#" class="text-white">Most Voted</a></li>
                    <li><a href="#" class="text-white">Make A Suggestion</a></li> --}}
                </ul>
            </div>
            <div class="col-6 col-md-2">
                <h6>Coupons</h6>
                <ul class="flinks">
                    <li><a href="#" class="text-white">Recently Added</a></li>
                    {{-- <li><a href="coupons-8.html?type=expiring_soon">Expiring Soon</a></li>
                    <li><a href="coupons-2.html?type=printable">Printable</a></li>
                    <li><a href="coupons-3.html?type=codes">Coupon Codes</a></li> --}}
                </ul>
            </div>
            <div class="col-6 col-md-2">
                <h6>Connect</h6>
                <ul class="social-links2">
                    <li><a href="tel:91 70430 12892" class="text-white"> <b>+91 70430 12892</b></a></li>
                    <li><a href="tel:91 70430 12892" class="text-white"> <b>z</b></a></li>
                </ul>
            </div>
            <!--<div class="col-md-4">-->
            <!--    <div id="footer-subscribe-form">-->
            <!--        <div class="subscribe_form other_form">-->
            <!--            <form method="POST" action="{{route('subscribe')}}">-->
            <!--                @csrf-->
            <!--                <input type="email" class="shadow  bg-body rounded text-white" name="email" value=""-->
            <!--                    placeholder="Email Address" required="">-->
            <!--                <button type="submit" class="text-white">Subscribe</button>-->
            <!--            </form>-->

            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <div class="row mt-3">
            <div class="col-md-12 ">
                <span class="text-white"></span>(c) Powered by Bridge2Business CMS | <a
                    href="https://bridge2business.in/" class="text-white">bridge2business.in</a></span>
            </div>
        </div>
    </div>
</footer>


<script>
    var login_page = "https://bridge2business.in/";
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .main-footer {
        position: fixed;
        width: 100%;
        bottom: 0;
        background-color: white;
        box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;
        border-radius: 3px;
        padding-top: 15px;
    }

    .ss:hover {
        color: green;
    }
</style>
<div class="main-footer" style="">
    <div class="row">
        <div class="col-3 text-center">
            <a href="{{route('index')}}">
                <p><i class="fa-solid fa-house ss"></i><br><b>Home</b></p>
            </a>
        </div>
        <div class="col-2 text-center" style="font-size:12px;">
            <a href="{{route('customer.myOrder')}}">
                <p><i class="fa-solid fa-ticket ss"></i><br><b>Claim</b></p>
            </a>
        </div>
        <div class="col-2 text-center">
            <a href="{{route('customer.myOrder')}}">
                <p><i class="fa-solid fa-search ss"></i><br><b>Search</b></p>
            </a>
        </div>
        <div class="col-2 text-center {{Request::is('customer/add-to/cart')?'active':''}}">
            <a class="{{Request::is('customer/add-to/cart')?'active':''}}"
                href="{{route('customer.add.to.cart.item')}}">
                <p><i
                        class="fa-solid fa-shopping-bag {{Request::is('customer/add-to/cart')?'active':''}} ss"></i><sup>{{$AddToCart}}</sup><br><b>Carts</b>
                </p>
            </a>
        </div>
        <div class="col-3 text-center">
            <a href="{{route('customer.profile')}}">
                <p><i class="fa-solid fa-user ss"></i><br><b>Profile</b></p>
            </a>
        </div>
    </div>
</div>
