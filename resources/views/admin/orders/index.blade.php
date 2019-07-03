@extends('layouts.app')


@section('content')
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Orders</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Orders</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-lg-1">
            <!-- Pending Orders Datatable -->
            <div class="ibox">
                <div class="ibox-head bg-warning text-white">
                    <div class="ibox-title">Pending Orders</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <!-- Start Form -->
                    <table id="pending_orders" class="table table-hover track_tbl">
                        <thead>
                            <tr>
                                <th>Tracking ID</th>
                                <th>Customer Name</th>
                                <th>Customer Contact Number</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th class="text-center" width="15%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending as $order)
                                {{-- @if ($p->order_products->product_lists->users_id == auth()->user()->id) --}}
                                <tr class="active">
                                    <td>{{$order->tracking_id}}</td>
                                    <td>{{$order->users->first_name}} {{$order->users->last_name}}</td>
                                    <td>{{$order->users->phone}}</td>
                                    <td>{{$order->created_at->toFormattedDateString()}}</td>
                                    <td>{{ presentPrice($order->total_price) }}</td>
                                    <td class="text-center">
                                        <a href="/orders/{{$order->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                        {{-- <a href="/orders/confirm_order/{{$order->id}}" class="btn btn-success"><i class="fas fa-check"></i></a>
                                        <a href="/orders/cancel_order/{{$order->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                                    </td>
                                </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Form -->
                </div>
            </div>
        </div>
        
        <div class="offset-lg-1 col-lg-10 offset-lg-1">
            <!-- Completed Orders Datatable -->
            <div class="ibox">
                <div class="ibox-head bg-success text-white">
                    <div class="ibox-title">Completed Orders</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <!-- Start Form -->
                    <table id="completed_orders" class="table table-hover track_tbl">
                        <thead>
                            <tr>
                                <th>Tracking ID</th>
                                <th>Customer</th>
                                <th>Customer Contact Number</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th class="text-center" width="15%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($done as $order)
                            <tr class="active">
                                <td>{{$order->tracking_id}}</td>
                                <td>{{$order->users->first_name}} {{$order->users->last_name}}</td>
                                <td>{{$order->users->phone}}</td>
                                <td>{{$order->created_at->toFormattedDateString()}}</td>
                                <td>{{presentPrice($order->total_price)}}</td>
                                <td class="text-center">
                                    <a href="/orders/{{$order->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Form -->
                </div>
            </div>
        </div>
       

        <div class="offset-lg-1 col-lg-10 offset-lg-1">
            <!-- Cancelled Orders Datatable -->
            <div class="ibox">
                <div class="ibox-head bg-danger text-white">
                    <div class="ibox-title">Cancelled Orders</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <!-- Start Form -->
                    <table id="cancelled_orders" class="table table-hover track_tbl">
                        <thead>
                            <tr>
                                <th>Tracking ID</th>
                                <th>Customer</th>
                                <th>Customer Contact Number</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th class="text-center" width="15%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cancelled as $order)
                            <tr class="active">
                                <td>{{$order->tracking_id}}</td>
                                <td>{{$order->users->first_name}} {{$order->users->last_name}}</td>
                                <td>{{$order->users->phone}}</td>
                                <td>{{$order->created_at->toFormattedDateString()}}</td>
                                <td>{{presentPrice($order->total_price)}}</td>
                                <td class="text-center">
                                    <a href="/orders/{{$order->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Form -->
                </div>
            </div>
        </div>
       

    </div>
 
</div>



@endsection