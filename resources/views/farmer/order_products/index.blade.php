@extends('layouts.app')


@section('content')
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Order Products</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Order Products</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">Pending</a>
            <a class="nav-item nav-link" id="nav-confirmed-tab" data-toggle="tab" href="#nav-confirmed" role="tab" aria-controls="nav-confirmed" aria-selected="false">Confirmed</a>
            <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">Cancelled</a>
            <a class="nav-item nav-link" id="nav-paid-tab" data-toggle="tab" href="#nav-paid" role="tab" aria-controls="nav-paid" aria-selected="false">Paid</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        {{-- Pending Order Products --}}
        <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Pending Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-warning text-white">
                            <div class="ibox-title">Pending Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v text-white"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item">option 1</a>
                                    <a class="dropdown-item">option 2</a>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="pending_order_products" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer</th>
                                        <th>Number</th>
                                        <th>Product Type</th>
                                        <th>Sub Total</th>
                                        <th width="20%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending as $p)
                                    <tr class="active">
                                        <th>{{$p->orders->id}}</th>
                                        <td>{{$p->orders->tracking_id}}</td>
                                        <td>{{$p->orders->users->first_name}} {{$p->orders->users->last_name}}</td>
                                        <td>{{$p->orders->users->phone}}</td>
                                        <td>{{$p->product_lists->orig_products->type}}</td>
                                        <td>{{ presentPrice($p->orders->total_price) }}</td>
                                        <td>
                                            <a href="/order_products/confirm_order/{{$p->id}}" class="btn btn-success">Confirm <i class="fas fa-check"></i></a>
                                            <a href="/order_products/cancel_order/{{$p->id}}" class="btn btn-danger">Cancel <i class="fas fa-trash"></i></a>
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
        {{-- Confirmed Order Products --}}
        <div class="tab-pane fade" id="nav-confirmed" role="tabpanel" aria-labelledby="nav-confirmed-tab">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Confirmed Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-success text-white">
                            <div class="ibox-title">Confirmed Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v text-white"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item">option 1</a>
                                    <a class="dropdown-item">option 2</a>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="confirmed_order_products" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer</th>
                                        <th>Number</th>
                                        <th>Product Type</th>
                                        <th>Sub Total</th>
                                        <th width="20%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($confirmed as $c)
                                    <tr class="active">
                                        <th>{{$c->orders->id}}</th>
                                        <td>{{$c->orders->tracking_id}}</td>
                                        <td>{{$c->orders->users->first_name}} {{$c->orders->users->last_name}}</td>
                                        <td>{{$c->orders->users->phone}}</td>
                                        <td>{{$c->product_lists->orig_products->type}}</td>
                                        <td>{{ presentPrice($c->orders->total_price) }}</td>
                                        <td>
                                            <a href="/order_products/paid_order/{{$c->id}}" class="btn btn-primary">Paid <i class="fas fa-check"></i></a>
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
        {{-- Cancelled Order Products --}}
        <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Cancelled Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-danger text-white">
                            <div class="ibox-title">Cancelled Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v text-white"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item">option 1</a>
                                    <a class="dropdown-item">option 2</a>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="cancelled_order_products" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer</th>
                                        <th>Number</th>
                                        <th>Product Type</th>
                                        <th>Sub Total</th>
                                        <th width="20%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cancelled as $c)
                                    <tr class="active">
                                        <th>{{$c->orders->id}}</th>
                                        <td>{{$c->orders->tracking_id}}</td>
                                        <td>{{$c->orders->users->first_name}} {{$c->orders->users->last_name}}</td>
                                        <td>{{$c->orders->users->phone}}</td>
                                        <td>{{$c->product_lists->orig_products->type}}</td>
                                        <td>{{ presentPrice($c->orders->total_price) }}</td>
                                        <td>
                                            <a href="/order_products/pending_order/{{$c->id}}" class="btn btn-warning">Return to Pending</a>
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
        {{-- Paid Order Products --}}
        <div class="tab-pane fade" id="nav-paid" role="tabpanel" aria-labelledby="nav-paid-tab">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Paid Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-info text-white">
                            <div class="ibox-title">Paid Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v text-white"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item">option 1</a>
                                    <a class="dropdown-item">option 2</a>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="paid_order_products" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer</th>
                                        <th>Number</th>
                                        <th>Product Type</th>
                                        <th>Sub Total</th>
                                        <th width="20%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paid as $p)
                                    <tr class="active">
                                        <th>{{$p->orders->id}}</th>
                                        <td>{{$p->orders->tracking_id}}</td>
                                        <td>{{$p->orders->users->first_name}} {{$p->orders->users->last_name}}</td>
                                        <td>{{$p->orders->users->phone}}</td>
                                        <td>{{$p->product_lists->orig_products->type}}</td>
                                        <td>{{ presentPrice($p->orders->total_price) }}</td>
                                        <td></td>
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
    </div>

   

    

   

    
   

</div>


@endsection