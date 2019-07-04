@extends('layouts.web')

@section('content')

<div class="bg0 m-t-84 p-b-140">

    <div class="container-fluid w-00 h-100 p-t-70 p-r-250 p-l-250 p-b-300 bg0">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</a>
            </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <br>
                    <!-- Pending Orders Datatable -->
                    <div class="card shadow mt-5 mb-4 ">
                        <div class="card-header py-3 bg-warning text-white">
                            <h2 class="title font-weight-bold">Pending Orders</h2>
                        </div>
                        <div class="card-body">
                            @if (count($pending) > 0)
                            <table id="pending_table" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Price</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending as $p)
                                        @if ($p->users_id == auth()->user()->id)
                                        <tr class="active">
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->created_at->toFormattedDateString()}}</td>
                                            <td>₱ {{ number_format($p->total_price, 2) }}</td>
                                            <td>
                                                <a href="/website/view_order/{{$p->id}}" class="btn btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                                <a href="/pdf/invoice/{{$p->id}}" class="btn btn-secondary"><i class="fas fa-download fa-sm text-white"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>No pending orders</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    <br>
                    <!-- Completed Orders Datatable -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary text-white">
                            <h2 class="title font-weight-bold">Completed Orders</h2>
                        </div>
                        <div class="card-body">
                            @if (count($done) > 0)
                            <table id="completed_table" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($done as $order)
                                        @if ($order->users_id == auth()->user()->id)
                                        <tr class="active">
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->created_at->toFormattedDateString()}}</td>
                                            <td>₱ {{ number_format($order->total_price, 2) }}</td>
                                            <td>
                                                <a href="/website/view_order/{{$order->id}}" class="btn btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                                <a href="/pdf/invoice/{{$order->id}}" class="btn btn-secondary"><i class="fas fa-download fa-sm text-white"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>No confirmed orders</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                    <br>
                    <!-- Cancelled Orders Datatable -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-danger text-white">
                            <h2 class="title font-weight-bold">Cancelled Orders</h2>
                        </div>
                        <div class="card-body">
                            @if(count($cancelled) > 0)
                            <table id="cancelled_table" class="table table-hover track_tbl">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Price</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cancelled as $order)
                                        @if ($order->users_id == auth()->user()->id)
                                        <tr class="active">
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->created_at->toFormattedDateString()}}</td>
                                            <td>₱ {{ number_format($order->total_price, 2) }}</td>
                                            <td>
                                                <a href="/pdf/invoice/{{$order->id}}" class="btn btn-secondary"><i class="fas fa-download fa-sm text-white"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>No cancelled orders</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
        
            
        

        
    </div>
   

</div>



@endsection