@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Profile</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Profile</li>
        </ol>
    </div>

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="ibox">
                    <div class="ibox-body text-center">
                        <div class="m-t-20">
                            <img class="img-circle" src="/img/admin-avatar.png" />
                        </div>
                        <h5 class="font-strong m-b-10 m-t-10">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                        <div class="m-b-20 text-muted">{{ auth()->user()->roles->title }}</div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="row text-center m-b-20">
                            <div class="col-4">
                                <div class="font-24 profile-stat-count">{{$orders}}</div>
                                <div class="text-muted">Orders</div>
                            </div>
                            <div class="col-4">
                                <div class="font-24 profile-stat-count">{{ presentPrice($monthly_income[0]) }}</div>
                                <div class="text-muted">Sales</div>
                            </div>
                            <div class="col-4">
                                <div class="font-24 profile-stat-count">{{count($customers)}}</div>
                                <div class="text-muted">Customers</div>
                            </div>
                        </div>
                        {{-- <p class="text-center">Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="ibox">
                    <div class="ibox-body">
                        <ul class="nav nav-tabs tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="ti-announcement"></i> Feeds</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Statistics Tab -->
                            <div class="tab-pane fade show active" id="tab-1">
                                <div class="row">
                                    <div class="col-md-6" style="border-right: 1px solid #eee;">
                                        <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Month Statistics</h5>
                                        <div class="h2 m-0">{{ presentPrice($monthly_income[0]) }}</div>
                                        <div><small>Month income</small></div>
                                        <br>
                                        <br>
                                        {{-- <div class="m-t-20 m-b-20">
                                            <div class="h4 m-0">120</div>
                                            <div class="d-flex justify-content-between"><small>Month income</small>
                                                <span class="text-success font-12"><i class="fa fa-level-up"></i> +24%</span>
                                            </div>
                                            <div class="progress m-t-5">
                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div> --}}
                                        <ul class="list-group list-group-full list-group-divider">
                                            <li class="list-group-item">Seasons
                                                <span class="pull-right color-orange">{{$season_count}}</span>
                                            </li>
                                            <li class="list-group-item">Orders (For this month)
                                                <span class="pull-right color-orange">{{$orders}}</span>
                                            </li>
                                            <li class="list-group-item">Hectares owned
                                                <span class="pull-right color-orange">{{$user->hectares}}</span>
                                            </li>
                                            <li class="list-group-item">Farmers
                                                <span class="pull-right color-orange">{{$user->no_farmers}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Farmer List -->
                                    <div class="col-md-6">
                                        <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user"></i> Farmers</h5>
                                        <ul class="media-list media-list-divider m-0 scroller" data-height="350px">
                                            @foreach ($farmers as $item)
                                            <li class="media">
                                                <a class="media-img" href="javascript:;">
                                                    <img class="img-circle" src="/img/admin-avatar.png" width="40" />
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        {{$item->first_name}} {{$item->last_name}}
                                                        <div class="text-center">
                                                            <a href="/profiles/{{$item->id}}/edit" class="btn btn-md btn-warning float-right"><i class="fas fa-edit fa-sm text-white"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="font-13"><i class="fa fa-phone"></i> : {{$item->phone}}</div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <br>
                                        <!-- Add Farmer Modal Button -->
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addFarmer">
                                            Add Farmer
                                        </button>
                                    </div>

                                    <!-- Create Farmer Modal -->
                                    <div class="modal fade" id="addFarmer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Farmer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- Start Form -->
                                            <form method="post" action="{{action('ProfilesController@store')}}" enctype="multipart/form-data">
                                            @csrf
                                                <div class="modal-body">
                                                    <!-- Farmer Information -->
                                                    <h4><strong>Farmer Information</strong></h4>
                                                    <br>
                                                    <div class="row">
                                                        <input type="hidden" name="users_id" value="{{ auth()->user()->id }}" readonly/>
                                                        <!-- First Name -->
                                                        <div class="col-sm-6 form-group">
                                                            <label>First Name</label>
                                                            <input class="form-control" type="text" placeholder="First Name" name="first_name" required>
                                                        </div>
                                                        <!-- Last Name -->
                                                        <div class="col-sm-6 form-group">
                                                            <label>Last Name</label>
                                                            <input class="form-control" type="text" placeholder="Last Name" name="last_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <input type="hidden" name="users_id" value="{{ auth()->user()->id }}" readonly/>
                                                        <!-- Phone -->
                                                        <div class="col-sm-6 form-group">
                                                            <label>Phone</label>
                                                            <input class="form-control" type="text" placeholder="Phone" name="phone">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <!-- Submit Button -->
                                                    <button type="sumbmit" class="btn btn-success">Add</button>
                                                </div>
                                            </form>
                                            <!-- End Form -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                 
                                <!-- Monthly Transactions -->
                                <h4 class="text-info m-b-20 m-t-20"><i class="fa fa-shopping-basket"></i>Transactions (Monthly)</h4>
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
                            </div>

                            <!-- Settings Tab -->
                            <div class="tab-pane fade" id="tab-2">
                                @if (auth()->user()->roles_id == 2)
                                <form method="post" action="{{action('FarmersController@update', $user->id)}}">
                                @method('PATCH')
                                @csrf
                                    <!-- Farmer Information -->
                                    <h4><strong>Farmer Information</strong></h4>
                                    <br>
                                    <div class="row">
                                        <!-- First Name -->
                                        <div class="col-sm-6 form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" placeholder="First Name" name="first_name" value="{{$user->first_name}}">
                                        </div>
                                        <!-- Last Name -->
                                        <div class="col-sm-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Phone -->
                                        <div class="col-sm-6 form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" placeholder="Phone" name="phone" value="{{$user->phone}}">
                                        </div>
                                        <!-- Email -->
                                        <div class="col-sm-6 form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" placeholder="Email" name="email" value="{{$user->email}}">
                                        </div>
                                    </div>
    
    
                                    <!-- Address -->
                                    <h5><strong>Address</strong></h5>
    
                                    <!-- Street -->
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input class="form-control" type="text" placeholder="Street" name="street" value="{{$user->street}}">
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
                                                <select class="form-control" name="barangay" id="barangay">
                                                    <option selected="true" value="{{$user->barangays->id}}">{{$user->barangays->name}}</option>
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
                                            <input class="form-control" type="text" placeholder="Company" name="company" value="{{$user->company}}">
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <!-- Number of Farmers -->
                                        <div class="col-sm-6 form-group">
                                            <label>Number of Farmers</label>
                                            <input class="form-control" type="text" placeholder="Number of Farmers" name="no_farmers" value="{{$user->no_farmers}}"> 
                                        </div>
                                        <!-- Hectares -->
                                        <div class="col-sm-6 form-group">
                                            <label>Hectares</label>
                                            <input class="form-control" type="text" placeholder="Hectares" name="hectares" value="{{$user->hectares}}">
                                        </div>
                                    </div>

                                    <!-- Change Password -->
                                    <h5><strong>Change Password</strong></h5>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Old Password:</label>
                                            <input class="form-control" type="password" placeholder="Password">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>New Password:</label>
                                            <input class="form-control" type="password" placeholder="Password" name="password">
                                        </div>
                                    </div>
    
                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </form>

                                @elseif (auth()->user()->roles_id == 1)
                                <form method="post" action="{{action('AdministratorsController@update', $user->id)}}">
                                @method('PATCH')
                                @csrf
                                    <div class="row">
                                        <!-- First Name -->
                                        <div class="col-sm-6 form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
                                        </div>
                                        <!-- Last Name -->
                                        <div class="col-sm-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Phone -->
                                        <div class="col-sm-6 form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" placeholder="Phone" name="phone" value="{{ $user->phone }}">
                                        </div>
                                        <!-- Email -->
                                        <div class="col-sm-6 form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" placeholder="Email" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>
            
            
                                    <!-- Address -->
                                    <h5><strong>Address</strong></h5>
            
                                    <!-- Street -->
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input class="form-control" type="text" placeholder="Street" name="street" value="{{ $user->street }}">
                                    </div>
            
                                    <div class="row">
                                        <!-- Provice-->
                                        <div class="col-sm-4 form-group">
                                            <div class="form-group">
                                                <label class="form-control-label">Province</label>
                                                <select class="form-control select2_demo_1" name="province" id="province">
                                                    <option selected="true" value="{{$user->provinces->id}}">{{ $user->provinces->name }}</option>
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
                                                    <option selected="true" value="{{$user->cities->id}}">{{ $user->cities->name }}</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city['id']}}">{{ $city['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
            
            
                                        <!-- Barangay-->
                                        {{-- <div class="col-sm-4 form-group">
                                            <div class="form-group">
                                                <label class="form-control-label">Barangay</label>
                                                <select class="form-control select2_demo_1" name="barangay" id="barangay">
                                                    <option selected="true" value="{{$user->barangays->id}}">{{ $user->barangays->name }}</option>
                                                    @foreach ($barangays as $barangay)
                                                        <option value="{{ $barangay['id']}}">{{ $barangay['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
            
            
                                    <div class="row">
                                        <!-- Company -->
                                        <div class="col-sm-6 form-group">
                                            <label>Company</label>
                                            <input class="form-control" type="text" placeholder="Company" name="company" value="{{ $user->company }}">
                                        </div>
                                    </div>

                                     <!-- Change Password -->
                                     <h5><strong>Change Password</strong></h5>
                                     <div class="row">
                                         <div class="col-sm-6 form-group">
                                             <label>Old Password:</label>
                                             <input class="form-control" type="password" placeholder="Password">
                                         </div>
                                     </div>
                                     
                                     <div class="row">
                                         <div class="col-sm-6 form-group">
                                             <label>New Password:</label>
                                             <input class="form-control" type="password" placeholder="Password">
                                         </div>
                                     </div>
            
                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </form>
                                @endif
                            </div>

                            <!-- Feeds Tab -->
                            <div class="tab-pane fade" id="tab-3">
                                <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-bullhorn"></i> Latest Feeds</h5>
                                <ul class="media-list media-list-divider m-0">
                                    <li class="list-group list-group-divider scroller" data-height="400px" data-color="#71808f">
                                        <div>
                                            @forelse (auth()->user()->Notifications()->take(5)->get() as $notification)
                                            @include('partials.notifications.'. snake_case(class_basename($notification->type)))
                                            @empty
                                                <a class="list-group-item">
                                                    <div class="media">
                                                        {{-- <div class="media-img">
                                                            <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                                        </div> --}}
                                                        <div class="media-body">
                                                            <div class="font-13">No Notifications</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforelse
                                        </div>
                                    </li>
                                </ul>
                                <div class="ibox-footer text-center">
                                    <a href="{{ url('notifications') }}">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Style -->
        <style>
            .profile-social a {
                font-size: 16px;
                margin: 0 10px;
                color: #999;
            }

            .profile-social a:hover {
                color: #485b6f;
            }

            .profile-stat-count {
                font-size: 22px
            }
        </style>
    </div>
<!-- END PAGE CONTENT-->

@endsection
