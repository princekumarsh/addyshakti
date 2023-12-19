@extends('layouts.front-end.app')

@section('content')
<div class="pt50 pb50">

    {{-- <div class="pt-50 clearfix">
        <div class="container">
            <div class="title-options">
                <div class="options">
                    <a href="#">All Category <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li class="active"><a href="stores-4.html?">All Category</a></li>
                        <li><a href="stores-1.html?type=top">Top Category</a></li>
                        <li><a href="stores-2.html?type=most-voted">Most Voted</a></li>
                        <li><a href="stores-3.html?type=popular">Popular</a></li>
                    </ul>
                </div>
                <h5>All Category</h5>
            </div>
        </div>
    </div> --}}





        <div class="bgGray pt-100 pb-100 clearfix">
            <div class="container">
                <h2><strong>Top</strong> Categories </h2>
                <div class="items mt-25 mb-25 clearfix">
                    <ul class="boxed-items boxed-categories clearfix mt-25 mb-25">
                        @foreach ($category as $topCat)
                        <li style="background:rgb(108, 79, 61)"><a href="{{route('category.product',[$topCat->id])}}">{{ $topCat->title }}</a>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>

</div>

{{-- <div class="bgBlack pt-50 pb-50">
    <div class="container text-center">
        <ul class="pagination">
            <li class="selected"><a href="stores-32.html?page=1"><i class="fas fa-arrow-left"></i><span>Prev</span></a>
            </li>
            <li class="selected"><a href="stores-32.html?page=1">1</a></li>
            <li><a href="stores-33.html?page=2">2</a></li>
            <li><a href="stores-33.html?page=2"><span>Next</span><i class="fas fa-arrow-right"></i></a></li>
        </ul>
    </div>
</div> --}}
@endsection
