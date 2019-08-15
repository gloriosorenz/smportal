@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Profile</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Farmer</li>
        </ol>
    </div>
    
    <div class="page-content fade-in-up">

        <div class="row">
            <div class="offset-lg-2 col-lg-8 offset-lg-2">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Farmer Info</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <form method="POST" action="{{action('ProfilesController@update', $farmers->id)}}">
                            @method('PATCH')
                            @csrf
                            
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-sm-4 form-group">
                                    <label>First Name:</label>
                                    <input class="form-control" type="text" name="first_name" value="{{ $farmers->first_name}}">
                                </div>
            
                                <!-- Last Name -->
                                <div class="col-sm-4 form-group">
                                    <label>Last Name:</label>
                                    <input class="form-control" type="text" name="last_name" value="{{ $farmers->last_name}}">
                                </div>
            
                                <!-- Phone Number -->
                                <div class="col-sm-4 form-group">
                                    <label>Phone:</label>
                                    <input class="form-control" type="text" name="phone" value="{{ $farmers->phone}}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <form action="{{ route('profiles.destroy',$farmers->id ?? 'Not set') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-md btn-danger float-center">Remove Farmer <i class="fas fa-times fa-sm text-white"></i></button>
                                    </form>                                    
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="form-group">
                                <a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
                                <button class="btn btn-md btn-success" type="submit">Update</button>
                            </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
            </div>

        </div>
        
    </div>
<!-- END PAGE CONTENT-->

@endsection
