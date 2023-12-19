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

            <div class="col-md-9">
                <div class="edit_profile_form other_form">
                    <form action="{{route('customer.password.update')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form_field"><label for="change_password_form[old]">Old Password:</label>
                            <div><input type="password" name="old_password" id="change_password_form[old]"
                                    value="" required=""></div>
                        </div>
                        <div class="form_field"><label for="change_password_form[new]">New Password:</label>
                            <div><input type="password" name="new_password" id="change_password_form[new]"
                                    value="" required=""></div>
                        </div>
                        <div class="form_field"><label for="change_password_form[new2]">Confirm New Password:</label>
                            <div><input type="password" name="new_password_confirmation" id="change_password_form[new2]"
                                    value="" required=""></div>
                        </div>

                        <button >Change Password</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
