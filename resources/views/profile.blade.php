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
                            <img class="img-circle" src="img/admin-avatar.png" />
                        </div>
                        <h5 class="font-strong m-b-10 m-t-10">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                        <div class="m-b-20 text-muted">{{ auth()->user()->roles->title }}</div>
                        <div class="profile-social m-b-20">
                            <a href="javascript:;"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:;"><i class="fab fa-facebook"></i></a>
                            <a href="javascript:;"><i class="fab fa-pinterest"></i></a>
                            <a href="javascript:;"><i class="fab fa-dribbble"></i></a>
                        </div>
                        <div>
                            <button class="btn btn-info btn-rounded m-b-5"><i class="fa fa-plus"></i> Follow</button>
                            <button class="btn btn-default btn-rounded m-b-5">Message</button>
                        </div>
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
                                <div class="font-24 profile-stat-count">15</div>
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
                                        <div class="m-t-20 m-b-20">
                                            <div class="h4 m-0">120</div>
                                            <div class="d-flex justify-content-between"><small>Month income</small>
                                                <span class="text-success font-12"><i class="fa fa-level-up"></i> +24%</span>
                                            </div>
                                            <div class="progress m-t-5">
                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="m-b-20">
                                            <div class="h4 m-0">86</div>
                                            <div class="d-flex justify-content-between"><small>Month income</small>
                                                <span class="text-warning font-12"><i class="fa fa-level-down"></i> -12%</span>
                                            </div>
                                            <div class="progress m-t-5">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-full list-group-divider">
                                            <li class="list-group-item">Seasons
                                                <span class="pull-right color-orange">{{$season_count}}</span>
                                            </li>
                                            <li class="list-group-item">Orders (For this month)
                                                <span class="pull-right color-orange">{{$orders}}</span>
                                            </li>
                                            <li class="list-group-item">Hectares
                                                <span class="pull-right color-orange">{{$user->hectares}}</span>
                                            </li>
                                            <li class="list-group-item">Farmers
                                                <span class="pull-right color-orange">{{$user->no_farmers}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user"></i> Farmers</h5>
                                        <ul class="media-list media-list-divider m-0">
                                            <li class="media">
                                                <a class="media-img" href="javascript:;">
                                                    <img class="img-circle" src="img/users/u1.jpg" width="40" />
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-img" href="javascript:;">
                                                    <img class="img-circle" src="img/users/u2.jpg" width="40" />
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-img" href="javascript:;">
                                                    <img class="img-circle" src="img/users/u3.jpg" width="40" />
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-img" href="javascript:;">
                                                    <img class="img-circle" src="img/users/u6.jpg" width="40" />
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-img" href="javascript:;">
                                                    <img class="img-circle" src="img/users/u5.jpg" width="40" />
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-heading">Bob Gonzalez <small class="float-right text-muted">Today</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy.</div>
                                                </div>
                                            </li>
                                        </ul>
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
                                                <td>{{$t->product_lists->orig_products->type}}</td>
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
                                {{-- <form action="javascript:void(0)">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" placeholder="Email address">
                                        </div>
                                    </div>
                                    
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
                                   
                                    <div class="form-group">
                                        <button class="btn btn-success" type="button">Save</button>
                                    </div>
                                </form> --}}
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
                                                    <option value="0" selected="true" disabled="True" value="{{$user->barangays->name}}">{{$user->barangays->name}}</option>
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
                                            <input class="form-control" type="text" placeholder="Company" name="company" {{$user->company}}>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <!-- Number of Farmers -->
                                        <div class="col-sm-6 form-group">
                                            <label>Number of Farmers</label>
                                            <input class="form-control" type="text" placeholder="Number of Farmers" name="no_farmers" {{$user->no_farmers}}> 
                                        </div>
                                        <!-- Hectares -->
                                        <div class="col-sm-6 form-group">
                                            <label>Hectares</label>
                                            <input class="form-control" type="text" placeholder="Hectares" name="hectares" {{$user->hectares}}>
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
