@extends('layouts.front-end.app')

@section('content')
    <div class="container pt50 pb50">


        <div class="row mt-5">

            <div class="col-md-12">
                {{-- <div class="alert">
                    Your account is not verified yet ! Please check your inbox (developerermanoj@gmail.com) and verify
                    it as fast as possible. </div> --}}
            </div>

        </div>

 {{-- @include('customer-view.account.header') --}}



        <div class="row push-container">

            {{-- @include('customer-view.account.sidebar') --}}

            <div class="col-md-12">
                <div class="edit_profile_form other_form">
                    <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf <div class="form_field"><label for="data[username]">First Name:</label>
                            <div><input type="text" name="username" id="data[username]"
                                    value="{{ auth('customer')->user()->name }}" required=""></div>
                        </div>
                        <div class="form_field"><label for="username">Last Name:</label>
                            <div><input type="text" name="l_name" id="data[username]"
                                    value="{{ auth('customer')->user()->l_name }}" required=""></div>
                        </div>
                        <div class="form_field"><label for="phone">Phone:</label>
                            <div><input type="text" name="phone" id="phone"
                                    value="{{ auth('customer')->user()->phone }}" required=""></div>
                        </div>
                        <div class="form_field"><label for="data[email]">Email Address:</label>
                            <div><input type="text" name="email" id="data[email]"
                                    value="{{ auth('customer')->user()->email }}" disabled=""></div>
                        </div>
                        <div class="form_field"><label for="data_avatar">Avatar:</label>
                            <div>
                                <img
                                 {{-- onerror="this.src='{{ asset('public\assets\frontend\img\avatar_ac.png') }}'" --}}
                                    class="data_avatar" style="max-width:150px;height:150px;"
                                    @if (auth('customer')->user()->profile_photo)
                                    src="{{ asset('storage/app/public/user') }}/{{ auth('customer')->user()->profile_photo }}"
                                    @else
                                    src='{{ asset('public\assets\frontend\img\avatar_ac.png') }}'
                                    @endif

                                    alt="Image">
                                <input type="file" name="image" id="data_avatar" class="inputFile">
                                <label for="data_avatar" class="fileUpload"></label>
                                <span>Note:* max width: 600px, max height: 600px.</span>
                            </div>
                        </div>
                        {{-- <div class="form_field"><span>Subscribe:</span>
                            <div><input type="checkbox" name="data[subscriber]" id="data[subscriber]" class="inputCheckbox"
                                    checked=""> <label for="data[subscriber]">Subscribe to
                                    our newsletter.</label></div>
                        </div><input type="hidden" name="data[csrf]" value="FwOmyMupsq42"> --}}
                        <button>Edit Profile</button>
                    </form>

                </div>
            </div>

        </div>

    </div>
@endsection
