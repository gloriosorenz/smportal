@extends('layouts.app')
@include('partials.javascripts.add_farmer_javascript')
@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Plan Season</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Season List</li>
        <li class="breadcrumb-item">Create</li>
    </ol>
</div>

<div class="page-content fade-in-up">

    <!-- Farmer Functionality  -->
    @if(auth()->user()->roles_id == 2)
    <div class="row">
         <!-- Weather -->
         <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Weather</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>


                </div>
                <div class="ibox-body">
                    <!-- Start Form -->

                    <!-- ALERTS -->
                    <div class="row">
                            <div class="col-lg-4">
                                {{-- WINDSPEED ALERT --}}
                                @if($current->windspeed() <= 30)
                                <div class="alert alert-success text-center" role="alert">
                                Good Wind Condition     
                                - Perfect for planting and harvesting!  
                                <p class="lead m-0"> Current Wind Speed {{ $current->windspeed() }} km/h</p>             
                                </div>
                                @endif
    
                                <!-- Acceptable wind condition alert -->
                                @if($current->windspeed() > 30 && $current->windspeed() <= 40)
                                <div class="alert alert-info text-center" role="alert">
                                Acceptable Wind Condition  
                                <p class="lead m-0">Wind Speed {{ $current->windspeed() }} km/h</p>         
                                </div>
                                @endif
    
                                <!-- Be on Alert wind condition alert -->
                                @if($current->windspeed() > 40 && $current->windspeed() <= 60)
                                <div class="alert alert-warning text-center" role="alert">
                                Be on Alert 
                                <p class="lead m-0">Wind Speed {{ $current->windspeed() }} km/h</p>         
                                </div>
                                @endif
    
                                <!-- Dangerous wind condition alert -->
                                @if($current->windspeed() > 60)
                                <div class="alert alert-danger text-center" role="alert">
                                Dangerous Wind Condition  
                                <p class="lead m-0">Wind Speed {{ $current->windspeed() }} km/h</p>         
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                {{-- TEMPERATURE ALERT --}}
                                @if($current->temperature() <= 29)
                                <div class="alert alert-danger text-center" role="alert">
                                Temperature is too low for Rice Growth
                                <p class="lead m-0"> Current Temperature {{ $current->temperature() }}°C</p>             
                                </div>
                                @endif
    
                                <!-- Acceptable temperature condition alert -->
                                @if($current->temperature() > 29 && $current->temperature() <= 32)
                                <div class="alert alert-primary text-center" role="alert">
                                Optimal Temperature for Rice Growth                        
                                <p class="lead m-0"> Current Temperature {{ $current->temperature() }}°C</p>         
                                </div>
                                @endif
    
                                <!-- Be on Alert temperature condition alert -->
                                @if($current->temperature() > 32 && $current->temperature() <= 37)
                                <div class="alert alert-warning text-center" role="alert">
                                Acceptable Temperature for Rice Growth
                                <p class="lead m-0"> Current Temperature {{ $current->temperature() }}°C</p>         
                                </div>
                                @endif
    
                                <!-- Dangerous temperature condition alert -->
                                @if($current->temperature() > 37)
                                <div class="alert alert-danger text-center" role="alert">
                                Dangerous Temperature for Rice Growth  
                                <p class="lead m-0"> Current Temperature {{ $current->temperature() }}°C</p>         
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                {{-- PRECIPITATIONS ALERT --}}
                                @if($current->precipProbability()*100 <= 15)
                                <div class="alert alert-success text-center" role="alert">
                                Rain Probability is Low
                                <p class="lead m-0"> Chance of Rain: {{ $current->precipProbability()*100 }}%</p>             
                                </div>
                                @endif
    
                                <!-- Acceptable temperature condition alert -->
                                @if($current->precipProbability()*100 > 15 && $current->precipProbability()*100 <= 50)
                                <div class="alert alert-warning text-center" role="alert">
                                Rain Probability is Medium
                                <p class="lead m-0"> Chance of Rain: {{ $current->precipProbability()*100 }}%</p>         
                                </div>
                                @endif
    
                                <!-- Be on Alert temperature condition alert -->
                                @if($current->precipProbability()*100 > 50 && $current->precipProbability()*100 <= 80)
                                <div class="alert alert-warning text-center" role="alert">
                                Rain Probability is High
                                <p class="lead m-0"> Chance of Rain: {{ $current->precipProbability()*100 }}%</p>         
                                </div>
                                @endif
    
                                <!-- Dangerous temperature condition alert -->
                                @if($current->precipProbability()*100 > 80)
                                <div class="alert alert-danger text-center" role="alert">
                                Currently Raining
                                <p class="lead m-0"> Chance of Rain: {{ $current->precipProbability()*100 }}%</p>         
                                </div>
                                @endif
                            </div>
                        </div>

                        <script type='text/javascript' src='https://darksky.net/widget/default/14.3144,121.1121/ca12/en.js?width=100%&height=350&title=Santa Rosa, Laguna&textColor=333333&bgColor=FFFFFF&transparency=false&skyColor=undefined&fontFamily=Default&customFont=&units=ca&htColor=333333&ltColor=e3e3e3&displaySum=yes&displayHeader=yes'></script>
                    
                    <!-- End Form -->
                </div>
            </div>
        </div>

        
        <!-- Input farmer's hectares and no. of farmers -->
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Plan</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <!-- Start Form -->
                    <form method="post" action="{{action('SeasonListsController@store')}}" enctype="multipart/form-data">
                    @csrf

                    <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Rice Farmer</th>
                                <th class="text-center">Planned Hectares</th>
                                <th class="text-center">Planned Number of Farmers</th>
                                <th class="text-center">Planned Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                    <input name="users_id[]" type="hidden" value="{{auth()->user()->id}}">                   
                                </td>
                                <td>
                                    <input class="form-control" type="number" placeholder="0" name="planned_hectares[]" step="0.1" min="1" max="{{ auth()->user()->hectares }}">
                                    <small class="text-muted text-sm">Hectares owned: <b>{{ auth()->user()->hectares }}</b></small>
                                </td>
                                <td>
                                    <input class="form-control" type="number" placeholder="0" name="planned_num_farmers[]" step="1" min="1" max="{{ auth()->user()->no_farmers }}">
                                    <small class="text-muted text-sm">Farmers employed: <b>{{ auth()->user()->no_farmers }}</b></small>
                                </td>
                                <td>
                                    <input class="form-control" type="number" placeholder="Enter Quantity" name="planned_qty[]" step="1" min="1">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                    <!-- End Form-->
                </div>
            </div>
        </div>

        <!-- Farmer's info (hectares and no. farmers) -->
        {{-- <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmer Info</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Hectares</th>
                                <th>Number of Farmers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ auth()->user()->hectares }}</td>
                                <td>{{ auth()->user()->no_farmers }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

    </div>

    <!-- Season Plan History -->
    <div class="row">
        <!-- Seasons -->
        <div class="offset-md-3 col-md-6 offset-md-3">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">History</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Season</th>
                                    <th class="text-center">Hectares</th>
                                    <th class="text-center">No. of Farmers</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($season_lists as $list)
                                <tr>
                                    <td>Season {{ $list->seasons->id }}</td>
                                    <td>
                                        {{ $list->planned_hectares }}
                                    </td>
                                    <td>
                                        {{ $list->planned_num_farmers }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <!-- End row -->

    <!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- ADMIN Functionality  -->
    @elseif (auth()->user()->roles_id == 1)
        <div class="row">
            <!-- Input farmer's hectares and no. of farmers -->
            <div class="offset-md-2 col-md-8 offset-md-2">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Plan</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <!-- Start Form -->
                        <form method="post" action="{{action('SeasonListsController@store')}}" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Rice Farmer</th>
                                        <th>Planned Hectares</th>
                                        <th>Planned Number of Farmers</th>
                                        <th>Planned Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="resultbody1">
                                    <tr>
                                        <td>
                                            <select class="form-control" name="users_id[]" id="users_id">
                                                <option value="0" selected="true" disabled="True">Select Farmer</option>
                                                    @foreach ($users as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" class="form-control" name="planned_hectares[]" step="0.1" min="1" max="{{ $value->hectares }}"/></td>
                                        <td><input type="number" class="form-control" name="planned_num_farmers[]" step="1" min="1" max="{{ $value->no_farmers }}"/></td>
                                        <td><input type="number" class="form-control" name="planned_qty[]" value="" step="1" min="1"/></td>
                                        <td><input type="button" class="btn btn-danger remove" value="x"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <center><input type="button" class="btn btn-lg btn-warning addRow" value="+"></center>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                        <!-- End Form-->
                    </div>
                </div>
            </div>
            <!-- End Column-->
        </div>
        <!-- End Row-->
    @endif
</div>
<!-- End Page Content-->

@endsection

