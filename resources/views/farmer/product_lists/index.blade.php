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
        
        <div class="col-md-6">
            <!-- Products -->
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Products For Season {{ $latest_season->id }}</div>
                    <!-- Add Product Button -->
                    <div>
                    @if (auth()->user()->roles_id == 2 && auth()->user()->active)
                        @if ($count == 0)
                            <a class="btn btn-success btn-sm" href="{{ route('product_lists.create') }}">Add Products</a>
                        @endif
                    @endif
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-bordered table-hover"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Product Type</th>
                                <th>Initial Quantity</th>
                                <th>Current Quantity</th>
                                <th width="15%">Harvest Date</th>
                                @if (auth()->user()->active)
                                    <th>Options</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user_products as $list)
                            @foreach($user_products2 as $list2)
                            <tr>
                                @if($list->id == $list2->id)
                                    {{-- <td>{{$list->id}}</td> --}}
                                    <td>{{$list->products->type}}</td>
                                    <td>{{$list->quantity}}</td> {{-- orig =--}}
                                    <td>{{$list2->quantity}}</td>{{--current--}}
                                  
                                    <td>{{ \Carbon\Carbon::parse($list->harvest_date)->format('F j, Y') }}</td>
                                    @if (auth()->user()->active)
                                    <td>
                                        <a href="/product_lists/{{$list->id}}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                        {{-- <a href="/product_lists/{{$list->id}}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a> --}}
                                        {{-- <a href="#" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a> --}}
                                    </td>
                                    @endif
                                @endif

                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($user_products) == 3 && count($season_list) == 1)
                        @if($season_list->season_list_statuses_id == 1)
                            <a href="/season_lists/{{$season_list->id}}/edit" class="btn btn-md btn-block btn-success">Finish Season<i class="fas fa-check fa-sm text-white"></i></a>
                        @endif
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        
        <div class="col-md-6">
            <!-- Product History -->
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Products History</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-bordered" id="all_user_products" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Season</th>
                                <th class="text-center">Product Type</th>
                                {{-- <th class="text-center">Rice Farmer</th> --}}
                                <th class="text-center">Initial Quantity</th>
                                {{-- <th class="text-center">Current Quantity</th> --}}
                                <th class="text-center">Harvest Date</th>
                                {{-- <th width="15%">Options</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_user_products as $list)
                            <tr class="text-center">
                                <td>{{$list->seasons->id}}</td>
                                <td>{{$list->products->type}}</td>
                                <td>{{$list->quantity}}</td>
                                {{-- <td>{{$list->quantity}}</td> --}}
                                <td>{{\Carbon\Carbon::parse($list->harvest_date)->format('F j, Y')}}</td>
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

        <div class="col-md-6">
            <!-- Price History Chart-->
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

