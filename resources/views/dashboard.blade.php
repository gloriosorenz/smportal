@extends('layouts.app')

@section('content')


<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title font-bold" style="font-size: 40px">Hi {{auth()->user()->first_name}}!</h1>
</div>


<!-- Admin Functionalities -->
@if(auth()->user()->roles_id == 2)
<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">

    
      
    <div class="row">
        @if($season->season_statuses->id == 2) 
        <!-- Request Season -->
        <div class="col-lg-3 col-md-6">
            <a href="/request_season">
                <div class="ibox bg-green color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">Request Season</h2>
                        <div class="m-b-5">Request for a new season</div><i class="fas fa-plus widget-stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
        @else
            @if($season_list)
                <!-- View Season -->
                <div class="col-lg-3 col-md-6">
                    <a href="/season_lists/{{$season_list->id}}">
                        <div class="ibox bg-green color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">View Season</h2>
                                <div class="m-b-5">View your season</div><i class="fas fa-plus widget-stat-icon"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @else
                <!-- Plan Season -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('season_lists') }}">
                        <div class="ibox bg-green color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">Plan Season</h2>
                                <div class="m-b-5">Start a new season</div><i class="fas fa-plus widget-stat-icon"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endif
        <!-- Create Plant Report -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">Plant Report</h2>
                        <div class="m-b-5">Make a Plant Report for the month</div><i class="fas fa-plus widget-stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- Add Products -->
        <div class="col-lg-3 col-md-6">
            <a href="{{route('product_lists')}}">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">Add Products</h2>
                        <div class="m-b-5">Add products for the season</div><i class="fas fa-plus widget-stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- Create Damage Report -->
        <div class="col-lg-3 col-md-6">
            <a href="{{route('damage_reports.index')}}">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">Damage Report</h2>
                        <div class="m-b-5">Send a damage report</div><i class="fas fa-plus widget-stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>


    {{-- <div class="row">
        <!-- WEATHER UPDATES -->
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Daily Weather Updates</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                        <div class="row">
                            @foreach ($daily as $item)
                            <div class="col-12 col-md-3 p-b-20">
                                <a class="card" data-toggle="modal" data-target="#exampleModal" >
                                    <div class="card-body text-center scroller" data-height="200px">
                                        <h5 class="card-title">{{ date('l', $item->time()) }}</h5>
                                        <h5 class="lead m-0 small">{{ date('F j', $item->time()) }}</h5>
                                        <p class="lead m-0 small">{{ $item->summary() }}</p>
                                        <p class="lead m-0">Hi {{ $item->temperatureHigh() }}</p>
                                        <p class="lead m-0">Lo {{ $item->temperatureLow() }}</p>
                                        <p class="lead m-0">Humidity {{ $item->humidity() }}</p>
                                    </div> 
                                </a>
                            </div>

                            <!-- Weather Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ date('l', $item->time()) }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <p class="lead m-0">{{ $item->summary() }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
      
        <!-- NOTIFICATIONS -->
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Notifications</div>
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
                    <ul class="media-list media-list-divider m-0">
                        <li class="list-group list-group-divider scroller" data-height="400px" data-color="#71808f">
                            <div>
                                @forelse (auth()->user()->Notifications()->take(20)->get() as $notification)
                                @include('partials.notifications.'. snake_case(class_basename($notification->type)))
                                @empty
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="font-13">No Notifications</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforelse
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="ibox-footer text-center">
                    <a href="{{ url('notifications') }}">View All Notifications</a>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <!-- LATEST ORDERS -->
        <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Latest Orders</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <!-- Start Form -->
                        <table class="table table-striped table-hover" id="transactions_table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Tracking ID</th>
                                    <th>Customer</th>
                                    <th>Number</th>
                                    <th>Product Type</th>
                                    <th>Sub Total</th>
                                    <th width="20%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $t)
                                    <tr class="active">
                                        <th>{{$t->orders->id}}</th>
                                        <td>{{$t->orders->tracking_id}}</td>
                                        <td>{{$t->orders->users->first_name}} {{$t->orders->users->last_name}}</td>
                                        <td>{{$t->orders->users->phone}}</td>
                                        <td>{{$t->original_product_lists->products->type}}</td>
                                        <td>{{ presentPrice($t->orders->total_price) }}</td>
                                        @if($t->order_product_statuses->id == 1)
                                            <td><span class="badge badge-warning">{{$t->order_product_statuses->status}}</span></td>
                                        @elseif($t->order_product_statuses->id == 2)
                                            <td><span class="badge badge-success">{{$t->order_product_statuses->status}}</span></td>
                                        @elseif($t->order_product_statuses->id == 3)
                                            <td><span class="badge badge-info">{{$t->order_product_statuses->status}}</span></td>
                                        @elseif($t->order_product_statuses->id == 4)
                                            <td><span class="badge badge-danger">{{$t->order_product_statuses->status}}</span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Form -->
                    </div>
                </div>
        </div>

        <!-- ALERTS AND WEATHER -->
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Alerts</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                     <ul>
                        @if ($alerts)
                            <li>Alerts: {{ $alerts->title() }}</li> 
                        @else
                            <li>Alerts: no alerts</li> 
                        @endif
                        <li>Description: {{ $forecast->currently()->summary() }}</li>
                    </ul>
                </div>
            </div>
            <!-- Card -->
            <div class="card weather-card m-b-20">
                <!-- Card content -->
                <div class="card-body pb-3">
                
                    <!-- Title -->
                    <h4 class="card-title font-weight-bold">Santa Rosa, Laguna</h4>
                    <!-- Text -->
                    <p class="card-text">{{ date('l', $currently->time()) }}, {{ date('h:i:sa', $currently->time()) }}, {{$currently->summary()}}</p>
                    <div class="d-flex justify-content-between">
                        <p class="display-1 degree">{{ $currently->temperature() }} °C</p>
                        <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <p><i class="fas fa-tint fa-lg text-info pr-2"></i>{{ $currently->precipProbability() * 100 }}% Precipitation</p>
                        <p><i class="fas fa-wind fa-lg grey-text pr-2"></i>{{ $currently->windspeed() }} kph</p>
                    </div>
                    @foreach ($hourly as $item)
                    <div class="progress md-progress">
                        <div class="progress-bar black" role="progressbar" style="width: 40%" aria-valuenow="{{$item['0']}}" aria-valuemin="0" aria-valuemax="{{count($hourly)}}"></div>
                    </div>
                    <ul class="list-unstyled d-flex justify-content-between font-small text-muted mb-4">
                        
                        <li class="pl-4">{{ date('l', $item->time()) }}</li>
                        {{-- <li>11AM</li>
                        <li>2PM</li>
                        <li>5PM</li>
                        <li class="pr-4">8PM</li> --}}
                    </ul>
                    @endforeach
                    
                    <div class="collapse-content">
                
                        <div class="collapse" id="collapseExample">
                            <table class="table table-borderless table-sm mb-0">
                                <tbody>
                                    @foreach ($daily as $item)
                                    <tr>
                                        <td class="font-weight-normal align-middle">{{ date('l', $item->time()) }}</td>
                                        <td class="float-right font-weight-normal">
                                            <p class="mb-1">{{ $item->temperatureHigh() }}&deg;<span class="text-muted">/{{ $item->temperatureLow() }}&deg;</span></p>
                                        </td>
                                        {{-- <td class="float-right mr-3">
                                            <i class="fas fa-sun fa-lg amber-text"></i>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    
                        </div>
                
                    <hr class="">
                
                        <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 deep-purple-text collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Read more</a>
                
                    </div>
                
                </div>
            </div>
            <!-- Card -->
        </div>
    </div>

    <div class="row">
        <!-- SEASONAL RICE PRODUCTION -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Production Overview per Season</div>
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
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $rice_production_line->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $rice_production_line->script() !!}
                    </div>
                    {{-- <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- PRODUCTS SOLD PER SEASON -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Products Sold for Season {{$last_com_season->id}}</div>
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
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $orderlinechart->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $orderlinechart->script() !!}
                    </div>
                    {{-- <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div> --}}
                </div>
            </div>
        </div>
        
    </div>  
    
    <div class="row">
        <!-- PRODUCT COMPARISON FOR THE LAST SEASON -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Product Comparison for Season {{$last_com_season->id}}</div>
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
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $origcurrprodbar->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $origcurrprodbar->script() !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- REVENUE EARNED -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Revenue</div>
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
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $revlinechart->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $revlinechart->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <div class="row">
        <!-- FARMER'S MOST VALUBALE CUSTOMER BARCHART (MVC) -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Your Most Valuable Customers MVC)</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $fmvcbarchart->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $fmvcbarchart->script() !!}
                    </div>
                    {{-- <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- BEST SELLING FARMER -->
        {{-- <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Best Selling Farmer (BSF)</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $bestfarmerbarchart->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $bestfarmerbarchart->script() !!}
                    </div>
                </div>
            </div>
        </div> --}}
    </div>


    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style>
</div>


<!-- Admin Functionalities -->
@elseif(Auth::user()->roles_id == 1)
<div class="page-content fade-in-up">
    <div class="row">
        <!-- Create Season -->
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('seasons') }}">
                <div class="ibox bg-green color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">Create Season</h2>
                        <div class="m-b-5">Start a new season</div><i class="fas fa-plus widget-stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- Create Plant Report -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">Plant Report</h2>
                        <div class="m-b-5">Make a Plant Report for the month</div><i class="fas fa-plus widget-stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- Create User -->
        <div class="col-lg-3 col-md-6">
            <a href="{{route('farmers.create')}}">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">Create Farmer</h2>
                        <div class="m-b-5">Add a new farmer to the system</div><i class="fas fa-plus widget-stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- Create Damage Report -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">Damage Report</h2>
                        <div class="m-b-5">Send a damage report</div><i class="fas fa-plus widget-stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <!-- LATEST ORDERS -->
        <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Latest Orders</div>
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
                        <table class="table table-striped table-hover" id="transactions_table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Tracking ID</th>
                                    <th>Customer</th>
                                    <th>Number</th>
                                    <th>Product Type</th>
                                    <th>Sub Total</th>
                                    <th width="20%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_transactions as $t)
                                    <tr class="active">
                                        <th>{{$t->orders->id}}</th>
                                        <td>{{$t->orders->tracking_id}}</td>
                                        <td>{{$t->orders->users->first_name}} {{$t->orders->users->last_name}}</td>
                                        <td>{{$t->orders->users->phone}}</td>
                                        <td>{{$t->current_product_lists->products->type}}</td>
                                        <td>{{ presentPrice($t->orders->total_price) }}</td>
                                        @if($t->order_product_statuses->id == 1)
                                            <td><span class="badge badge-warning">{{$t->order_product_statuses->status}}</span></td>
                                        @elseif($t->order_product_statuses->id == 2)
                                            <td><span class="badge badge-success">{{$t->order_product_statuses->status}}</span></td>
                                        @elseif($t->order_product_statuses->id == 3)
                                            <td><span class="badge badge-info">{{$t->order_product_statuses->status}}</span></td>
                                        @elseif($t->order_product_statuses->id == 4)
                                            <td><span class="badge badge-danger">{{$t->order_product_statuses->status}}</span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Form -->
                    </div>
                </div>
        </div>
        <!-- NOTIFICATIONS-->
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Notifications</div>
                </div>
                <div class="ibox-body">
                    <ul class="media-list media-list-divider m-0">
                        <li class="list-group list-group-divider scroller" data-height="250px" data-color="#71808f">
                            <div>
                            @foreach (auth()->user()->Notifications as $notification)
                            @include('partials.notifications.'. snake_case(class_basename($notification->type)))
                            @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="ibox-footer text-center">
                    <a href="javascript:;">View All Notifications</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- TOTAL ORDER OVERVIEW -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Total Order Overview</div>
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
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $totalorderline->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $totalorderline->script() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- PRODUCT OUTPUT FOR CURRENT SEASON -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Product Output for Season {{$last_com_season->id}}</div>
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
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $total_prod_per->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $total_prod_per->script() !!}
                    </div>
                    {{-- <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- MOST VALUBALE CUSTOMER BARCHART (MVC) -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Most Valuable Customer (MVC)</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $mvcbarchart->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $mvcbarchart->script() !!}
                    </div>
                    {{-- <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- BEST SELLING FARMER -->
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Best Selling Farmer (BSF)</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $bestfarmerbarchart->html() !!}
                                </center>
                            </div>
                        </div>
                            <!-- End Of Main Application -->
                            {!! Charts::scripts() !!}
                            {!! $bestfarmerbarchart->script() !!}
                    </div>
                    {{-- <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style>
</div>
@endif


{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> --}}



@endsection
