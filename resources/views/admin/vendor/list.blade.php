@extends('admin.layout')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">vendor Register</h5>
                            <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">vendor Register</a>
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
                                        <h5>vendor Register Form</h5>
                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                        <div class="card-header-right">
                                            <a href="{{ route('admin.vendor.create') }}" class="btn btn-info">Add</a>
                                        </div>

                                    </div>
                                    <div class="card-block">
                                        <!-- <h4 class="sub-title">Basic Inputs</h4> -->
                                        <div class=" other_form table-responsive" >
                                            <table id="table_id" class="display table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>Sl.no</th>
                                                        <th>Company logo</th>
                                                        <th>Company Name</th>
                                                        <th>Business</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $id = 1;
                                                    @endphp
                                                    @foreach ($vendor as $v)
                                                        <tr>
                                                            <td>{{ $id++ }}</td>
                                                            <td><img onerror="this.src='{{ asset('storage/app/public/vender/company_logo/2023-05-28-6473856330208.png') }}'"
                                                                    class="data_avatar" style="max-width:150px;height:150px;"
                                                                    src="{{ asset('storage/app/public/vender/company_logo') }}/{{ $v->logo }}"
                                                                    alt="Image"></td>
                                                            <td>{{ $v->company_name }}</td>
                                                            <td>{{ $v->Category->title }}</td>
                                                            <td>{{ $v->fname }} </td>
                                                            <td>{{ $v->email }}</td>
                                                            <td>{{ $v->phone }}</td>
                                                            <td>
                                                                <div class="switch"
                                                                    onclick="location.href='{{ route('admin.vendor.status', [$v['id'], $v->status ? 0 : 1]) }}'">
                                                                    <label>
                                                                        <input type="checkbox" data-toggle="toggle"
                                                                            {{ $v->status ? 'checked' : '' }}
                                                                            id="stocksCheckbox{{ $v->id }}"
                                                                            data-size="sm">
                                                                        <span class="lever"
                                                                            for="stocksCheckbox{{ $v->id }}"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('admin.vendor.edit',$v->id)}}" class="btn btn-success btn-xs"><i
                                                                        class="fa fa-pencil-square-o"></i></a> |
                                                                <form method="post"
                                                                    action="{{ route('admin.vendor.delete', [$v->id]) }}">
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
 @stop
