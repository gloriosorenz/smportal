@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Product List</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Product List</li>
    </ol>
</div>


<div class="page-content fade-in-up">
    <!-- Products for current Season -->
    <div class="row">
        <!-- Products -->
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Products For Season {{ $latest_season->id }}</div>
                    <!-- Add Product Button -->
                    <div>
                        @if ($count == 0)
                            <a class="btn btn-success btn-sm" href="{{ route('product_lists.create') }}">Add Products</a>
                        @endif
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-bordered table-hover"  cellspacing="0" width="100%">
                        <thead class="thead-default">
                            <tr>
                                <th>ID</th>
                                <th>Product Type</th>
                                <th>Rice Farmer</th>
                                <th>Initial Quantity</th>
                                <th>Current Quantity</th>
                                <th>Harvest Date</th>
                                <th width="20%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user_products as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->orig_products->type}}</td>
                                <td>{{$list->users->company}}</td>
                                <td>{{$list->orig_quantity}}</td>
                                <td>{{$list->curr_quantity}}</td>
                                <td>{{$list->harvest_date}}</td>
                                <td>
                                    <a href="#" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="#" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                    <a href="#" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         
        
    </div>

    <!-- Product History -->
    <div class="row">

        <!-- Product History -->
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Products History</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-bordered table-hover" id="all_user_products" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Type</th>
                                <th>Rice Farmer</th>
                                <th>Initial Quantity</th>
                                <th>Current Quantity</th>
                                <th>Harvest Date</th>
                                {{-- <th width="15%">Options</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_user_products as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->orig_products->type}}</td>
                                <td>{{$list->users->company}}</td>
                                <td>{{$list->orig_quantity}}</td>
                                <td>{{$list->curr_quantity}}</td>
                                <td>{{$list->harvest_date}}</td>
                                {{-- <td>
                                    <a href="#" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                    <a href="#" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
        <!-- Price History -->
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Price History</div>
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
                    <div class="flexbox mb-4">
                        {!! Charts::styles() !!}
                        <div class="container">
                            <div class="app">
                                <center>
                                    {!! $price_history->html() !!}
                                </center>
                            </div>
                        </div>
                        <!-- End Of Main Application -->
                        {!! Charts::scripts() !!}
                        {!! $price_history->script() !!}
                    </div>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT-->
@endsection

