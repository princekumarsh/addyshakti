@extends('admin.layout')
@section('content')
<div class="pcoded-content">
<!-- Page-header start -->
<div class="page-header">
   <div class="page-block">
      <div class="row align-items-center">
         <div class="col-md-8">
            <div class="page-header-title">
               <h5 class="m-b-10">User Register</h5>
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
      </div>
      <div class="card-block">
          @if(Session::has('flash_message'))      
                    <div class="alert {{ Session::get('alert-class', 'alert-info') }}"> {!! Session::get('flash_message') !!} <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a> 
                    </div>
                @endif
         <form method="post" enctype="multipart/form-data">
            @csrf 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">First Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fname">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="lname">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password. <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Conform Password<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="conform_password" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Roll<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">login Activision<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <select name="login_activision" class="form-control">
                            <option>Select One Value Only</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Profile Photo<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <input type="file" name="profile_photo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        
            
           <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
           </div>
            
         </form>
      </div>
   </div>
   <!-- Basic Form Inputs card end -->
  
</div>
@stop