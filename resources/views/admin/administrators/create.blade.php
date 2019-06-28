@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Create an Administrator</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Administrators</li>
        <li class="breadcrumb-item">Create</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-8">
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
                    <!-- Start Form -->
                    <form method="post" action="{{action('AdministratorsController@store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <!-- First Name -->
                            <div class="col-sm-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="First Name" name="first_name">
                            </div>
                            <!-- Last Name -->
                            <div class="col-sm-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Last Name" name="last_name">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Phone -->
                            <div class="col-sm-6 form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Phone" name="phone">
                            </div>
                            <!-- Email -->
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" placeholder="Email" name="email">
                            </div>
                        </div>


                        <!-- Address -->
                        <h5><strong>Address</strong></h5>

                        <!-- Street -->
                        <div class="form-group">
                            <label>Street</label>
                            <input class="form-control" type="text" placeholder="Street" name="street">
                        </div>

                        <div class="row">
                            <!-- Provice-->
                            <div class="col-sm-4 form-group">
                                <div class="form-group">
                                    <label class="form-control-label">Province</label>
                                    <select class="form-control select2_demo_1" name="province" id="province">
                                        <option value="0" selected="true" disabled="True">Select Province</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province['id']}}">{{ $province['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- City-->
                            <div class="col-sm-4 form-group">
                                <div class="form-group">
                                    <label class="form-control-label">City</label>
                                    <select class="form-control select2_demo_1" name="city" id="city">
                                        <option value="0" selected="true" disabled="True">Select City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city['id']}}">{{ $city['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <!-- Barangay-->
                            <div class="col-sm-4 form-group">
                                <div class="form-group">
                                    <label class="form-control-label">Barangay</label>
                                    <select class="form-control select2_demo_1" name="barangay" id="barangay">
                                        <option value="0" selected="true" disabled="True">Select Barangay</option>
                                        @foreach ($barangays as $barangay)
                                            <option value="{{ $barangay['id']}}">{{ $barangay['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <!-- Company -->
                            <div class="col-sm-6 form-group">
                                <label>Company</label>
                                <input class="form-control" type="text" placeholder="Company" name="company">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                    <!-- End Form-->
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END PAGE CONTENT-->

@endsection

