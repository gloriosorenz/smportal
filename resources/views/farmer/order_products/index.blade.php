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
    <!-- Farmer functionalities -->
    @if (auth()->user()->roles_id == 2)
    <nav class="offset-lg-1 col-lg-10 offset-lg-1">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">Pending</a>
            <a class="nav-item nav-link" id="nav-confirmed-tab" data-toggle="tab" href="#nav-confirmed" role="tab" aria-controls="nav-confirmed" aria-selected="false">Confirmed</a>
            <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">Cancelled</a>
            <a class="nav-item nav-link" id="nav-paid-tab" data-toggle="tab" href="#nav-paid" role="tab" aria-controls="nav-paid" aria-selected="false">Paid</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- Pending Order Products -->
        <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 offset-lg-1">
                    <!-- Pending Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-warning text-white">
                            <div class="ibox-title">Pending Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="pending_order_products" class="table table-bordered table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Order Date</th>
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
                                        <td>{{\Carbon\Carbon::parse($p->orders->order_date)->format('F j, Y')}}</td>
                                        <td>{{$p->orders->users->first_name}} {{$p->orders->users->last_name}}</td>
                                        <td>{{$p->orders->users->phone}}</td>
                                        <td>{{$p->original_product_lists->products->type}}</td>
                                        <td>{{ presentPrice($p->quantity * $p->original_product_lists->price * 50) }}</td>
                                        <td>
                                            <a href="/order_products/{{$p->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            @if (auth()->user()->active)
                                                <a href="/order_products/confirm_order/{{$p->id}}" class="btn btn-success"><i class="fas fa-check"></i></a>
                                                <a href="/order_products/cancel_order/{{$p->id}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                            @endif
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
        <!-- Confirmed Order Products -->
        <div class="tab-pane fade" id="nav-confirmed" role="tabpanel" aria-labelledby="nav-confirmed-tab">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 offset-lg-1">
                    <!-- Confirmed Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-success text-white">
                            <div class="ibox-title">Confirmed Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="confirmed_order_products" class="table table-bordered table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Order Date</th>
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
                                        <td>{{\Carbon\Carbon::parse($c->orders->order_date)->format('F j, Y')}}</td>
                                        <td>{{$c->orders->users->first_name}} {{$c->orders->users->last_name}}</td>
                                        <td>{{$c->orders->users->phone}}</td>
                                        <td>{{$c->original_product_lists->products->type}}</td>
                                        <td>{{ presentPrice($c->quantity * $c->original_product_lists->price *50) }}</td>
                                        <td>
                                            <!-- Form -->
                                            <form method="POST" action="{{action('OrderProductsController@store')}}" enctype="multipart/form-data">
                                            @csrf
                                                <input type="hidden" class="form-control" name="order_product_id" value="{{$c->id}}" readonly/>
                                                @if (auth()->user()->active)
                                                    <div class="custom-file form-control-sm p-b-10">
                                                        <input type="file" class="custom-file-input" id="receipt" name="receipt" required>
                                                        <label class="custom-file-label" for="receipt">Choose file</label>
                                                    </div>
                                                @endif

                                                <a href="/order_products/{{$c->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                                @if (auth()->user()->active)
                                                    <button type="submit" class="btn btn-success">Paid</button>
                                                @endif
                                            </form>
                                            <!-- End Form -->
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
        <!-- Cancelled Order Products -->
        <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 offset-lg-1">
                    <!-- Cancelled Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-danger text-white">
                            <div class="ibox-title">Cancelled Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="cancelled_order_products" class="table table-bordered table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Order Date</th>
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
                                        <td>{{\Carbon\Carbon::parse($c->orders->order_date)->format('F j, Y')}}</td>
                                        <td>{{$c->orders->users->first_name}} {{$c->orders->users->last_name}}</td>
                                        <td>{{$c->orders->users->phone}}</td>
                                        <td>{{$c->original_product_lists->products->type}}</td>
                                        <td>{{ presentPrice($c->quantity * $c->original_product_lists->price) }}</td>
                                        <td>
                                            <a href="/order_products/{{$c->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            @if (auth()->user()->active)
                                                <a href="/order_products/pending_order/{{$c->id}}" class="btn btn-warning">Return to Pending</a>
                                            @endif
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
        <!-- Paid Order Products -->
        <div class="tab-pane fade" id="nav-paid" role="tabpanel" aria-labelledby="nav-paid-tab">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 offset-lg-1">
                    <!-- Paid Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-primary text-white">
                            <div class="ibox-title">Paid Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="paid_order_products" class="table table-bordered table-hover track_tbl text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Tracking ID</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Number</th>
                                        <th class="text-center">Product Type</th>
                                        <th class="text-center">Sub Total</th>
                                        <th class="text-center">Receipt</th>
                                        <th class="text-center" width="20%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paid as $p)
                                    <tr class="active">
                                        <th class="text-center">{{$p->orders->id}}</th>
                                        <td>{{$p->orders->tracking_id}}</td>
                                        <td>{{\Carbon\Carbon::parse($p->orders->order_date)->format('F j, Y')}}</td>
                                        <td>{{$p->orders->users->first_name}} {{$p->orders->users->last_name}}</td>
                                        <td>{{$p->orders->users->phone}}</td>
                                        <td>{{$p->original_product_lists->products->type}}</td>
                                        <td>{{ presentPrice($p->quantity * $p->original_product_lists->price) }}</td>
                                        <td>
                                            @if($p->receipt == 'noimage.jpeg' || $p->receipt == null)
                                                <div class="img-wrap">
                                                    <img src="/img/image.png" width="auto" height="80"/>
                                                </div>
                                            @elseif($p->receipt)
                                                <div class="img-wrap">
                                                    <img src="/storage/receipts/{{$p->receipt}}" width="auto" height="50"/>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/order_products/{{$p->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
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
    </div>

    <!-- Admin functionalities -->
    @elseif (auth()->user()->roles_id == 1)

    {{-- <nav class="offset-lg-1 col-lg-10 offsett-lg-1">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Season {{$latest_season->id}} Orders</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Orders History</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
             <!-- Current Season Order Products -->
            <div class="row">
                <div class="offset-lg-1 col-lg-10 offset-lg-1">
                    <!-- Current Season Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-warning text-white">
                            <div class="ibox-title">Season {{$latest_season->id}} Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="current_season_order_products" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Season</th>
                                        <th>Tracking ID</th>
                                        <th>Customer</th>
                                        <th>Number</th>
                                        <th>Product Type</th>
                                        <th>Sub Total</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th class="text-center" width="20%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($current_season_order_products as $item)
                                    <tr class="active">
                                        <th>{{$item->original_product_lists->seasons->id}}</th>
                                        <td>{{$item->orders->tracking_id}}</td>
                                        <td>{{$item->orders->users->first_name}} {{$item->orders->users->last_name}}</td>
                                        <td>{{$item->orders->users->phone}}</td>
                                        <td>{{$item->original_product_lists->products->type}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{ presentPrice($item->orders->total_price) }}</td>
                                        <td>
                                            @if ($item->order_product_statuses->id == 1)
                                                <span class="float-right badge badge-warning badge-pill">{{$item->order_product_statuses->status }}</span>
                                            @elseif ($item->order_product_statuses->id == 2)
                                                <span class="float-right badge badge-success badge-pill">{{$item->order_product_statuses->status }}</span>
                                            @elseif ($item->order_product_statuses->id == 3)
                                                <span class="float-right badge badge-info badge-pill">{{$item->order_product_statuses->status }}</span>
                                            @elseif ($item->order_product_statuses->id == 4)
                                                <span class="float-right badge badge-danger badge-pill">{{$item->order_product_statuses->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="/order_products/{{$item->id}}" class="btn btn-warning">View</a>
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

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <!-- All Order Products -->
            <div class="row">
                <div class="offset-lg-1 col-lg-10 offset-lg-1">
                    <!-- All Order Products Datatable -->
                    <div class="ibox">
                        <div class="ibox-head bg-primary text-white">
                            <div class="ibox-title">All Order Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <table id="all_order_products" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Season</th>
                                        <th>Tracking ID</th>
                                        <th>Customer</th>
                                        <th>Number</th>
                                        <th>Product Type</th>
                                        <th>Quantity</th>
                                        <th>Sub Total</th>
                                        <th>Status</th>
                                        <th class="text-center" width="20%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_products as $p)
                                    <tr class="active">
                                        <th>{{$p->original_product_lists->seasons->id}}</th>
                                        <td>{{$p->orders->tracking_id}}</td>
                                        <td>{{$p->orders->users->first_name}} {{$p->orders->users->last_name}}</td>
                                        <td>{{$p->orders->users->phone}}</td>
                                        <td>{{$p->original_product_lists->products->type}}</td>
                                        <td>{{$p->quantity}}</td>
                                        <td>{{ presentPrice($p->orders->total_price) }}</td>
                                        <td>
                                            @if ($p->order_product_statuses->id == 1)
                                                <span class="float-right badge badge-warning badge-pill">{{$p->order_product_statuses->status }}</span>
                                            @elseif ($p->order_product_statuses->id == 2)
                                                <span class="float-right badge badge-success badge-pill">{{$p->order_product_statuses->status }}</span>
                                            @elseif ($p->order_product_statuses->id == 3)
                                                <span class="float-right badge badge-info badge-pill">{{$p->order_product_statuses->status }}</span>
                                            @elseif ($p->order_product_statuses->id == 4)
                                                <span class="float-right badge badge-danger badge-pill">{{$p->order_product_statuses->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="/order_products/{{$p->id}}" class="btn btn-warning">View</a>
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
    </div> --}}


    <!-- All Order Products -->
    <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-lg-1">
            <!-- All Order Products Datatable -->
            <div class="ibox">
                <div class="ibox-head bg-primary text-white">
                    <div class="ibox-title">Order Products History</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <!-- Start Form -->
                    <table id="all_order_products" class="table table-bordered table-hover track_tbl">
                        <thead>
                            <tr>
                                <th class="text-center">Season</th>
                                <th class="text-center">Tracking ID</th>
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Number</th>
                                <th class="text-center">Product Type</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Sub Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" width="20%">Options</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($order_products as $p)
                            <tr class="active">
                                <th class="text-center">{{$p->original_product_lists->seasons->id}}</th>
                                <td>{{$p->orders->tracking_id}}</td>
                                <td>{{\Carbon\Carbon::parse($p->orders->order_date)->format('F j, Y')}}</td>
                                <td>{{$p->orders->users->first_name}} {{$p->orders->users->last_name}}</td>
                                <td>{{$p->orders->users->phone}}</td>
                                <td>{{$p->original_product_lists->products->type}}</td>
                                <td>{{$p->quantity}}</td>
                                <td>{{ presentPrice($p->orders->total_price) }}</td>
                                <td>
                                    @if ($p->order_product_statuses->id == 1)
                                        <span class="float-right badge badge-warning badge-pill">{{$p->order_product_statuses->status }}</span>
                                    @elseif ($p->order_product_statuses->id == 2)
                                        <span class="float-right badge badge-success badge-pill">{{$p->order_product_statuses->status }}</span>
                                    @elseif ($p->order_product_statuses->id == 3)
                                        <span class="float-right badge badge-info badge-pill">{{$p->order_product_statuses->status }}</span>
                                    @elseif ($p->order_product_statuses->id == 4)
                                        <span class="float-right badge badge-danger badge-pill">{{$p->order_product_statuses->status }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="/order_products/{{$p->id}}" class="btn btn-warning">View</a>
                                    {{-- <input type="button" name="view" value="view" id="{{$p->id}}" class="btn btn-info btn-xs view_data" /> --}}
                                    {{-- <button data-toggle="modal" data-target="#view-modal" id="viewOrder" class="btn btn-md btn-warning" data-url="{{ route('dynamicModal',['id'=>$p->id])}}">View</button> --}}
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
   

   
    @endif




    <!-- Modal -->
    <div id="view-modal" class="modal fade" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <h4 class="modal-title">
                        <i class="glyphicon glyphicon-user"></i> User Profile
                    </h4> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                </div> 
                <div class="modal-body"> 
                    <div id="modal-loader" style="display: none; text-align: center;">
                        <img src="ajax-loader.gif">
                    </div>
                    <!-- content will be load here -->                          
                    <div id="dynamic-content"></div>
                    
                    </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>  
                    </div> 
            </div> 
        </div>
    </div>



</div>


<script>
    // $(document).ready(function(){
        $('#viewOrder').on('click', function(e){
            e.preventDefault();
    
            var url = $(this).data('url');
    
            $('#dynamic-content').html(''); // leave it blank before ajax call
            $('#modal-loader').show();      // load ajax loader

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data){
                alert( "second success" );
                console.log(data);  
                $('#dynamic-content').html('');    
                $('#dynamic-content').html(data); // load response 
                $('#modal-loader').hide();        // hide ajax loader   
            })
            .fail(function(){
                $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
            });
        });
    // });
</script>

@endsection