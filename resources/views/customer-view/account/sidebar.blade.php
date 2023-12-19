@php
    $AddToCart = '';
    if(auth('customer')->user()){
        $AddToCart = App\Models\AddToCart::where('user_id', auth('customer')->user()->id)->count();
    }

@endphp


 <div class="col-md-3 push-right mb20-m">
     <button class="user-sidebar-menu"><i class="fas fa-bars" style="font-size: 28px"></i></button>
     <ul class="user-menu" id="user-sidebar-content">
         <li class="user-sub-menu"><a href="#"><i class="fa fa-heart"></i> Favorites <i
                     class="fa fa-caret-down"></i></a>
             <ul>
                 <li><a href="#"><i class="fa fa-book"></i>
                         Stores</a></li>
                 <li><a href="#"><i
                             class="fa fa-ticket"></i> Coupons</a></li>
                 <li><a href="#"><i
                             class="fa fa-cart-arrow-down"></i> Products</a></li>
             </ul>
         </li>
         <li class="{{Request::is('customer/add-to/cart')?'active':''}} rr"><a href="{{route('customer.add.to.cart.item')}}"><i class="fa fa-shopping-bag"></i> Carts  </a>

         </li>
         <li class="user-sub-menu"><a href="#"><i class="fa fa-star"></i> Saved <i
                     class="fa fa-caret-down"></i></a>
             <ul>
                 <li><a href="#"><i
                             class="fa fa-book"></i> Stores</a></li>
                 <li><a href="#"><i
                             class="fa fa-ticket"></i> Coupons</a></li>
                 <li><a href="#"><i
                             class="fa fa-cart-arrow-down"></i> Products</a></li>
             </ul>
         </li>
         <li><a href="{{route('customer.myOrder')}}"><i class="fa fa-barcode"></i>
                 Claimed Coupons</a></li>
         <li class="user-sub-menu"><a href="#"><i class="fa fa-gift"></i> Rewards <i
                     class="fa fa-caret-down"></i></a>
             <ul>
                 <li><a href="#"><i class="fa fa-gift"></i>
                         Rewards</a></li>
                 <li><a href="#"><i
                             class="fa fa-paper-plane-o"></i> Reward Reqests</a></li>
             </ul>
         </li>
         <li><a href="#"><i class="fa fa-book"></i> Add
                 Your Store</a></li>
         <li class="{{Request::is('customer/account')?'active':''}}"><a href="{{route('customer.profile')}}"><i
                     class="fa fa-edit"></i> Edit Profile</a></li>
         <li class="{{Request::is('customer/password')?'active':''}} "><a class="text-dark"  href="{{route('customer.password')}}"><i class="fa fa-edit"></i>
                 Change Password</a></li>
         <li><a href="#"><i class="fa fa-users"></i>
                 Refer a Friend</a></li>
         <li><a href="{{route('customer.auth.logout')}}"><i class="fa fa-close"></i> Logout</a>
         </li>
     </ul>
 </div>