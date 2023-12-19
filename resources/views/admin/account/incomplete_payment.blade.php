@extends('admin.layout')
@section('content')
<div class="pcoded-content">
<!-- Page-header start -->
<div class="page-header">
   <div class="page-block">
      <div class="row align-items-center">
         <div class="col-md-8">
            <div class="page-header-title">
               <h5 class="m-b-10">Incomplte Payment Details</h5>
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
               <li class="breadcrumb-item"><a href="#!">Incomplte Payment Details</a>
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
         <h5>Incomplte Payment Details</h5>
         <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
            <div class="card-header-right">
                <a href="{{route('admin.coupon.account.index')}}" class="btn btn-info">Complte Payment Details</a>
            </div>

      </div>
      <div class="card-block">
         <!-- <h4 class="sub-title">Basic Inputs</h4> -->
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Sl.no</th>
                        <th>Name</th>
                        <th>Payment Mode</th>
                        <th>Ref-Id</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Name</td>
                        <td>UPI</td>
                        <td>hg654387787sjdhf0-sdjlfh0212</td>
                        <td>02/12/2050</td>
                        <td>
                            <a href="#" class="text-info">Download</a>
                        </td>
                    </tr>

                </tbody>
            </table>

      </div>
   </div>
   <!-- Basic Form Inputs card end -->

</div>
@stop
