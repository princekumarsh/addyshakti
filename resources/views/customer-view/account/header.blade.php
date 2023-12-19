<div class="row">

    <div class="col-md-12">
        <div class="user-header">
            <img  class="data_avatar"
                style="max-width:150px;height:150px;"
                @if (auth('customer')->user()->profile_photo)
                                    src="{{ asset('storage/app/public/user') }}/{{ auth('customer')->user()->profile_photo }}"
                                    @else
                                    src='{{ asset('public\assets\frontend\img\avatar_ac.png') }}'
                                    @endif
                 alt="Image">
            <div class="user-header-right">
                <h3>{{ auth('customer')->user()->name . ' ' . auth('customer')->user()->l_name }}</h3>
                {{-- <h5><i class="fa fa-gift"></i> Points: 0</h5>
                <h5><i class="fa fa-money"></i> Credits: 0</h5>
                <a href="#">Add Credits</a> --}}
            </div>
        </div>
    </div>

</div>
