@extends('layouts.front-end.app')

@section('content')
<div class="pt50 pb50">

    {{-- <div class="bgWhite pt-100 pb-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="avatar">
                        <img src="../content/uploads/images/logo_5c928f09d086b.png" alt="Big Shop">
                    </div>
                    <ul class="links-list">
                        <li><a href="#"
                                data-ajax-call="https://couponscms.com/demo/themes/black/ajax/favorite?token=VYj5Xr3bh9jGhQT"
                                data-data='{"store":10,"added_message":"<i class=\"fa fa-heart\"><\/i> Remove favorite","removed_message":"<i class=\"far fa-heart\"><\/i> Add favorite"}'><i
                                    class="far fa-heart"></i> Add favorite</a></li>
                        <li><a href="#"
                                data-ajax-call="https://couponscms.com/demo/themes/black/ajax/save?token=E4bDgDPcpvqnXJZ"
                                data-data='{"item":10,"type":"store","added_message":"<i class=\"fa fa-star\"><\/i> Unsave this store","removed_message":"<i class=\"far fa-star\"><\/i> Save this store"}'><i
                                    class="far fa-star"></i> Save this store</a></li>
                        <li><a href="../plugin/rss2-8.html?store=10"><i class="fa fa-rss"></i> RSS Feed</a></li>
                        <li class="line-after"><a href="../reviews/big_shop-10.html"><i
                                    class="fa fa-pencil-alt"></i> Write Review</a></li>
                        <li><a href="https://couponscms.com/demo/themes/black/plugin/click.html?store=10"><i
                                    class="fa fa-link"></i> Visit Website</a></li>
                    </ul>
                </div>
                <div class="col-md-8 offset-md-1 m-mt-60">
                    <h2>Big Shop </h2>
                    <div class="description">
                        No description. </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="bgBlack pt-50 pb-50 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Share With Friends</h3>
                    <ul class="share-links">
                        <li><a
                                href="../../../../login-17.php?u=https://couponscms.com/demo/themes/black/store/big_shop-10.html"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a
                                href="https://twitter.com/intent/tweet?url=https://couponscms.com/demo/themes/black/store/big_shop-10.html"><i
                                    class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-100 clearfix">
        <div class="container">
            <div class="title-options">
                <h2>Coupons</h2>
                <div class="options">
                    <a href="#">Coupons <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li class="active"><a href="big_shop-10-2.html?type=coupons">Coupons</a></li>
                        <li><a href="big_shop-10-3.html?type=products">Products</a></li>
                    </ul>
                </div>
                <div class="options">
                    <a href="#">Filter <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="big_shop-10-4.html?active=1"><i class="far fa-circle"></i> Active only</a></li>
                        <li class="contains-sub-menu">
                            <a href="#">Order by <i class="fa fa-angle-right"></i></a>
                            <ul>
                                <li class="active"><a href="big_shop-10-5.html?orderby=newest">Newest <i
                                            class="fas fa-long-arrow-alt-up"></i></a></li>
                                <li><a href="big_shop-10-6.html?orderby=oldest">Oldest <i
                                            class="fas fa-long-arrow-alt-down"></i></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-100 pb-100 clearfix">
        <div class="container">
            <div class="items clearfix">
                <div class="alert">Big Shop has no coupons yet.</div>
            </div>
        </div>
    </div>


</div>
@endsection
