@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Customer information</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Customers</li>
        <li class="breadcrumb-item">View</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Customer Information asdfasfd</div>
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
                            <input class="form-control" type="text" placeholder="First Name" name="first_name" value="{{ $customer->first_name }}" disabled>
                        </div>
                        <!-- Last Name -->
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="{{ $customer->last_name }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Phone -->
                        <div class="col-sm-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" placeholder="Phone" name="phone" value="{{ $customer->phone }}" disabled>
                        </div>
                        <!-- Email -->
                        <div class="col-sm-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="Email" name="email" value="{{ $customer->email }}" disabled>
                        </div>
                    </div>


                    <!-- Address -->
                    <h5><strong>Address</strong></h5>

                    <!-- Street -->
                    <div class="form-group">
                        <label>Street</label>
                        <input class="form-control" type="text" placeholder="Street" name="street" value="{{ $customer->street }}" disabled>
                    </div>

                    <div class="row">
                        <!-- Provice-->
                        <div class="col-sm-4 form-group">
                            <div class="form-group">
                                <label class="form-control-label">Province</label>
                                <input class="form-control" type="text" placeholder="Province" name="province" value="{{ $customer->provinces->name }}" disabled>
                            </div>
                        </div>

                        <!-- City-->
                        <div class="col-sm-4 form-group">
                            <div class="form-group">
                                <label class="form-control-label">City</label>
                                <input class="form-control" type="text" placeholder="City" name="city" value="{{ $customer->cities->name }}" disabled>
                            </div>
                        </div>


                        <!-- Barangay-->
                        {{-- <div class="col-sm-4 form-group">
                            <div class="form-group">
                                <label class="form-control-label">Barangay</label>
                                <input class="form-control" type="text" placeholder="Barangay" name="barangay" value="{{ $customer->barangays->name }}" disabled>
                            </div>
                        </div> --}}
                    </div>


                    <div class="row">
                        <!-- Company -->
                        <div class="col-sm-6 form-group">
                            <label>Company</label>
                            <input class="form-control" type="text" placeholder="Company" name="company" value="{{ $customer->company }}" disabled>
                        </div>
                    </div>


                    <div class="row">
                        <!-- Customer Type -->
                        <div class="col-sm-6 form-group">
                             <div class="form-group">
                                <label>Customer Type</label>
                                <select class="form-control" disabled>
                                    <option value="">Animal Farmer</option>
                                    <option value="">Rice Miller</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- END PAGE CONTENT-->

@endsection

