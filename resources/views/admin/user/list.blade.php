@extends('admin.layout')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">user Register</h5>
                            <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="#"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">User Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page body start -->
                    <div class="page-body">


                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Basic Form Inputs card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>User Register Form</h5>
                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                        <div class="card-header-right">
                                            <a href="https://addyshakti.bridge2business.in/user-management-add"
                                                class="btn btn-info">Add</a>
                                        </div>

                                    </div>
                                    <div class="card-block">
                                        <div class=" other_form table-responsive">
                                        <table id="table_id" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Sl.no</th>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Roll</th>
                                                    <th>Login Activision</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $id = 1;
                                                @endphp
                                                @foreach ($user as $u)
                                                    <tr>
                                                        <td>{{ $id++ }}</td>
                                                        <td>
                                                            <div class=""><img src="{{ $u->profile_photo }}"
                                                                    width="40" alt=""></div>
                                                        </td>
                                                        <td>{{ $u->name }}</td>
                                                        <td>{{ $u->email }}</td>
                                                        <td>{{ $u->roll }}</td>
                                                        <td>
                                                            {{-- <div class="switch"
                                                                onclick="location.href='{{ route('admin.coupon.status', [$d['id'], $d->status ? 0 : 1]) }}'">
                                                                <label>
                                                                    <input type="checkbox" data-toggle="toggle"
                                                                        {{ $d->status ? 'checked' : '' }}
                                                                        id="stocksCheckbox{{ $d->id }}"
                                                                        data-size="sm">
                                                                    <span class="lever"
                                                                        for="stocksCheckbox{{ $d->id }}"></span>
                                                                </label>
                                                            </div> --}}
                                                            @if ($u->login_activision == 'active')
                                                                <button  onclick="location.href='{{ route('admin.user.status', [$u['id'], 'inactive']) }}'"
                                                                    class="btn   btn-success "><i
                                                                        class="fa fa-check"></i>{{ $u->login_activision }}</button>
                                                            @else
                                                                <button   onclick="location.href='{{ route('admin.user.status', [$u['id'], 'active' ]) }}'"
                                                                    class="btn btn-danger"><i
                                                                        class="fa fa-arrow-circle-o-right"></i>{{ $u->login_activision }}</button>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <!-- <a href="/user-management-edit/{{ $u->id }}" class="text-info">Edit</a> |  -->
                                                            <form method="post"
                                                                action="{{route('admin.user.delete',[$u->id])}}">
                                                                @csrf
                                                                <button onclick="return confirm('Are you sure to delete?')"
                                                                    class="btn btn-danger btn-xs">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Basic Form Inputs card end -->

                            </div>
                        @stop
