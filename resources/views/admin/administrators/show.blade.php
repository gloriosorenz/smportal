@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Administrator information</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Administrators</li>
        <li class="breadcrumb-item">View</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Administrator Information</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">

                    <div class="row">
                        <!-- First Name -->
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="First Name" name="first_name" value="{{ $admin->first_name }}" disabled>
                        </div>
                        <!-- Last Name -->
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="{{ $admin->last_name }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Phone -->
                        <div class="col-sm-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" placeholder="Phone" name="phone" value="{{ $admin->phone }}" disabled>
                        </div>
                        <!-- Email -->
                        <div class="col-sm-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="Email" name="email" value="{{ $admin->email }}" disabled>
                        </div>
                    </div>


                    <!-- Address -->
                    <h5><strong>Address</strong></h5>

                    <!-- Street -->
                    <div class="form-group">
                        <label>Street</label>
                        <input class="form-control" type="text" placeholder="Street" name="street" value="{{ $admin->street }}" disabled>
                    </div>

                    <div class="row">
                        <!-- Provice-->
                        <div class="col-sm-4 form-group">
                            <div class="form-group">
                                <label class="form-control-label">Province</label>
                                <input class="form-control" type="text" name="province" value="{{ $admin->provinces->name }}" disabled>
                            </div>
                        </div>

                        <!-- City-->
                        <div class="col-sm-4 form-group">
                            <div class="form-group">
                                <label class="form-control-label">City</label>
                                <input class="form-control" type="text" name="city" value="{{ $admin->provinces->name }}" disabled>
                            </div>
                        </div>


                        <!-- Barangay-->
                        <div class="col-sm-4 form-group">
                            <div class="form-group">
                                <label class="form-control-label">Barangay</label>
                                <input class="form-control" type="text" name="province" value="{{ $admin->provinces->name }}" disabled>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <!-- Company -->
                        <div class="col-sm-6 form-group">
                            <label>Company</label>
                            <input class="form-control" type="text" placeholder="Company" name="company" value="{{ $admin->company }}" disabled>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- END PAGE CONTENT-->

@endsection

