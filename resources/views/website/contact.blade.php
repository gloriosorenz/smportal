@extends('layouts.web')

@section('content')

<div class="bg0 m-t-84 p-b-140">
    <div class="container-fluid w-100 h-100 p-t-150 p-r-250 p-l-250 bg0">
        <div class="flex-w flex-tr">

            <!-- Form -->
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <!-- If user is a customer -->

                {{-- <form method="POST" action="{{action('RequestFormsController@store')}}" enctype="multipart/form-data"> --}}
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <!-- Customer Information -->
                    <h4><strong>Customer Information</strong></h4>
                    <br>
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
                                <select class="form-control" name="province" id="province">
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
                                <select class="form-control" name="city" id="city">
                                    <option value="0" selected="true" disabled="True">Select Province</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city['id']}}">{{ $city['name']}}</option>
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
                        <!-- Customer Type -->
                        <div class="col-sm-6 form-group">
                                <div class="form-group">
                                <label>Customer Type</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="0" selected="true" disabled="True">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role['id']}}">{{ $role['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
                <!-- End Form-->
                
            </div>

            <!-- Contact us -->
            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="row">
                    <h4 class="p-b-30"><strong>
                        Send Us A Message
                    </strong></h4>
                </div>
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Address
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            City Agricultural Office <br>
                            2F Cityhall B, City Govenment Center<br>
                            Santa Rosa City, Laguna
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Lets Talk
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            049 530 0015
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Email Us
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            cityagricultureoffice_csrl@yahoo.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
