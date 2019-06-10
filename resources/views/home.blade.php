@extends('layouts.app')

@section('content')


<!-- Admin Functionalities -->
@if(Auth::user()->roles_id == 2)
<!-- START PAGE CONTENT-->
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

    {{-- <div class="row">
        <!-- Farmer Groups -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">7</h2>
                        <div class="m-b-5">FARMER GROUPS</div><i class="ti-shopping-cart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Number of Orders -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">1250</h2>
                        <div class="m-b-5">NUMBER OF ORDERS</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Total Income -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">$1570</h2>
                        <div class="m-b-5">TOTAL INCOME</div><i class="fas fa-money-bill widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                    </div>
                </div>
            </a>
        </div>
        <!-- New Users -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">108</h2>
                        <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                        <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                    </div>
                </div>
            </a>
        </div>
    </div> --}}

    <div class="row">
        <!-- PRODUCT OUTPUT FOR CURRENT SEASON -->
        <div class="col-lg-8">
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
      
        <!-- NOTIFICATIONS -->
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Notifications</div>
                </div>
                <div class="ibox-body">
                    <ul class="media-list media-list-divider m-0">
                            @forelse (auth()->user()->Notifications as $notification)
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
                    </ul>
                </div>
                <div class="ibox-footer text-center">
                    <a href="javascript:;">View All Notifications</a>
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


    {{-- <div class="row">
        <!-- Farmer Groups -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">7</h2>
                        <div class="m-b-5">FARMER GROUPS</div><i class="ti-shopping-cart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Number of Orders -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">1250</h2>
                        <div class="m-b-5">NUMBER OF ORDERS</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Total Income -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">$1570</h2>
                        <div class="m-b-5">TOTAL INCOME</div><i class="fas fa-money-bill widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                    </div>
                </div>
            </a>
        </div>
        <!-- New Users -->
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">108</h2>
                        <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                        <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                    </div>
                </div>
            </a>
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
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th width="91px">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT2584</a>
                                </td>
                                <td>@Jack</td>
                                <td>$564.00</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT2575</a>
                                </td>
                                <td>@Amalia</td>
                                <td>$220.60</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT1204</a>
                                </td>
                                <td>@Emma</td>
                                <td>$760.00</td>
                                <td>
                                    <span class="badge badge-default">Pending</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT7578</a>
                                </td>
                                <td>@James</td>
                                <td>$87.60</td>
                                <td>
                                    <span class="badge badge-warning">Expired</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT0158</a>
                                </td>
                                <td>@Ava</td>
                                <td>$430.50</td>
                                <td>
                                    <span class="badge badge-default">Pending</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT0127</a>
                                </td>
                                <td>@Noah</td>
                                <td>$64.00</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                        </tbody>
                    </table>
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
                            @foreach (auth()->user()->Notifications as $notification)
                            @include('partials.notifications.'. snake_case(class_basename($notification->type)))
                            @endforeach
                    </ul>
                </div>
                <div class="ibox-footer text-center">
                    <a href="javascript:;">View All Notifications</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- TASKS AND MESSAGES-->
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Tasks</div>
                    <div>
                        <a class="btn btn-info btn-sm" href="javascript:;">New Task</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <ul class="list-group list-group-divider list-group-full tasks-list">
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Meeting with Eliza</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">10 July 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox" checked="">
                                    <span class="input-span"></span>
                                    <span class="task-title">Check your inbox</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">22 May 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Create Financial Report</span>
                                </label>
                                <span class="badge badge-danger m-l-5"><i class="ti-alarm-clock"></i> 1 hrs</span>
                            </div>
                            <div class="task-data"><small class="text-muted">No due date</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox" checked="">
                                    <span class="input-span"></span>
                                    <span class="task-title">Send message to Mick</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">04 Apr 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Create new page</span>
                                </label>
                                <span class="badge badge-success m-l-5">2 Days</span>
                            </div>
                            <div class="task-data"><small class="text-muted">07 Dec 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Messages</div>
                </div>
                <div class="ibox-body">
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
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
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
                    </ul>
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

@endsection
