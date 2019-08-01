@extends('layouts.login')

@section('content')

    <div class="container w-100 p-t-100">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 offset-lg-2">
                <!-- If user is a customer -->
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <!-- Customer Information -->
                    <h4 class="text-center"><strong>Signup</strong></h4>
                    <br>
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="First Name" name="first_name" required/>
                        </div>
                        <!-- Last Name -->
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Last Name" name="last_name" required/>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Phone -->
                        <div class="col-sm-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" placeholder="Phone" name="phone" required/>
                        </div>
                        <!-- Email -->
                        <div class="col-sm-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="Email" name="email" required/>
                        </div>
                    </div>

                    


                    <!-- Address -->
                    <h5><strong>Address</strong></h5>

                    <!-- Street -->
                    <div class="form-group">
                        <label>Street</label>
                        <input class="form-control" type="text" placeholder="Street" name="street" required/>
                    </div>

                    <div class="row">
                        <!-- Provice-->
                        <div class="col-sm-4 form-group">
                            <div class="form-group">
                                <label class="form-control-label">Province</label>
                                <select class="form-control" name="province" id="province" required>
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
                                <select class="form-control" name="city" id="city" required>
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
                            <input class="form-control" type="text" placeholder="Company" name="company" required/>
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
                    
                    <br>
                    <hr>
                    <br>
                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <a href="{{URL::previous()}}" class="btn btn-secondary">Back</a>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
                <!-- End Form-->
            </div>
        </div>
    </div>

@endsection