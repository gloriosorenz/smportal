@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Create a Farmer</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Farmers</li>
        <li class="breadcrumb-item">Create</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmer Information</div>
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
                    <form method="post" action="{{action('FarmersController@store')}}" enctype="multipart/form-data">
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
                                    <select class="form-control" name="province" id="province" readonly>
                                        @foreach ($laguna as $l)
                                            <option value="{{ $l['id']}}">{{ $l['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- City-->
                            <div class="col-sm-4 form-group">
                                <div class="form-group">
                                    <label class="form-control-label">City</label>
                                    <select class="form-control" name="city" id="city" readonly>
                                            @foreach ($starosa as $sa)
                                                <option value="{{ $sa['id']}}">{{ $sa['name']}}</option>
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
                                        @foreach ($lagunabarangays as $lagbarangay)
                                            <option value="{{ $lagbarangay['id']}}">{{ $lagbarangay['name']}}</option>
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

                        <div class="row">
                            <!-- Number of Farmers -->
                            <div class="col-sm-6 form-group">
                                <label>Number of Farmers</label>
                                <input class="form-control" type="text" placeholder="Number of Farmers" name="no_farmers">
                            </div>
                            <!-- Hectares -->
                            <div class="col-sm-6 form-group">
                                <label>Hectares</label>
                                <input class="form-control" type="text" placeholder="Hectares" name="hectares">
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

