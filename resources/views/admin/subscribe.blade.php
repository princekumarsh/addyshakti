@extends('admin.layout')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Subscribe List</h5>
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
                        <li class="breadcrumb-item"><a href="#!">subscribe</a>
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
                                    <h5>Subscribe List</h5>

                                </div>
                                <div class="card-block table-responsive">
                                    <!-- <h4 class="sub-title">Basic Inputs</h4> -->
                                    <table id="table_id" class="display table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Sl.no</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($subscribe as $key => $v)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $v->email }}</td>



                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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
