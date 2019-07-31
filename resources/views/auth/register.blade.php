@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form> --}}
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
    
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                        </div>
    
                        <!-- Privacy policy button -->
                        <div class="form-group row">
                                {{-- <a href="{{ url('privacy') }}" class="btn btn-md">
                                    Privacy Policy
                                </a> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Privacy Policy
                                </button>
                        </div>
                        
    
                        <br>
                        
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
@endsection
