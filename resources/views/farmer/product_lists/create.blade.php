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

        <!-- Form -->
        <form method="POST" action="{{action('ProductListsController@store')}}" enctype="multipart/form-data">
        @csrf
    
            <!-- If user is a Farmer -->
            @if (auth()->user()->roles_id == 2)
           
            <div class="row">
                <!-- Add Products -->
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add Products</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body" style="height: 420px">
                            <!-- Start Form -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        {{-- <th width="10%">Image</th> --}}
                                        <th width="20%">Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Harvest Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        {{-- <td><input type="text" name="s" id="quantity"/></td>
                                        <td><input type="text" name="a" id="price"/></td> --}}
                                        {{-- <td><input type="text" name="revenue" id="revenue" readonly/></td> --}}

                                    @foreach ($products as $product)
                                    <tr>
                                        {{-- <td>
                                            <div class="custom-file form-control-sm p-b-10">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </td> --}}
                                        <td>
                                            <input type="text" class="form-control" name="product_type" value="{{$product->type}}" disabled/>
                                            <input name="products_id[]" type="hidden" value="{{$product->id}}">
                                            <input name="users_id[]" type="hidden" value="{{auth()->user()->id}}">
                                        </td>
                                        <td><input type="text" class="form-control" name="quantity[]" id="quantity"/></td>
                                        @if ($product->id == 3)
                                            <td>
                                                <input type="text" class="form-control" value="" readonly/>
                                                <input type="hidden" class="form-control" name="price[]" value="0" readonly/>
                                            </td>
                                            @else
                                            <td>
                                                <input type="text" class="form-control" name="price[]" id="price"/>
                                                <small class="text-muted">Revenue: <input id="revenue"></p> </small> 
                                            </td>
                                        @endif
                                        <td>
                                            {{-- {{ Form::date('harvest_date[]', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'harvest_date[]'])}} --}}
                                            <div class="form-group" id="date_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                <input class="form-control" type="text" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="harvest_date[]">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success">Create</button>
                            <!-- End Form -->
                        </div>
                    </div>

                    <!-- Price History Chart-->
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Price History</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body text-center">
                            <!-- Start Form -->
                            <table id="example-table" class="table table-bordered table-hover"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Season</th>
                                        <th class="text-center">Product Type</th>
                                        {{-- <th>Initial Quantity</th>
                                        <th>Current Quantity</th>
                                        <th>Harvest Date</th> --}}
                                        <th class="text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product_history as $list)
                                    <tr>
                                        <td>Season {{$list->seasons->id}}</td>
                                        <td>{{$list->products->type}}</td>
                                        {{-- <td>{{$list->orig_quantity}}</td>
                                        <td>{{$list->curr_quantity}}</td>
                                        <td>{{$list->harvest_date}}</td> --}}
                                        <td>{{$list->price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Form -->
                        </div>
                    </div>

                    <!-- Seasonal Rice Production -->
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Production Overview for Season</div>
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


                <!-- Yearly Product Price Averages -->
                <div class="col-md-4">

                    <!-- Your Yearly Price Average -->
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title"> Your Yearly Price Average</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Start Form -->
                            <div class="flexbox mb-4">
                                {!! Charts::styles() !!}
                                <div class="container">
                                    <div class="app">
                                        <center>
                                            {!! $yearly_rice_prod_ave->html() !!}
                                        </center>
                                    </div>
                                </div>
                                <!-- End Of Main Application -->
                                {!! Charts::scripts() !!}
                                {!! $yearly_rice_prod_ave->script() !!}
                            </div>
                            <!-- End Form -->
                        </div>
                    </div>

                    <!-- All Rice Product Average -->
                    <div class="ibox">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ presentPrice($all_rice_prod_ave) }}</h2>
                            <div class="m-b-5 text-primary">All Rice Product Average Price</div>
                        </div>
                    </div>
                    <!-- All Withered Product Average -->
                    <div class="ibox">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ presentPrice($all_withered_prod_ave) }}</h2>
                            <div class="m-b-5 text-warning">All Withered Product Average Price</div>
                        </div>
                    </div>
                </div>

                <!-- Price Statistics -->
                {{-- <div class="offset-md-8 col-md-4">
                    <!-- Rice Product Average -->
                    <div class="ibox">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$rice_prod_ave }}</h2>
                            <div class="m-b-5 text-primary">Your Rice Product Average Price</div>
                        </div>
                    </div>
                    <!-- Withered Product Average -->
                    <div class="ibox">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ presentPrice($withered_prod_ave) }}</h2>
                            <div class="m-b-5 text-warning">Your Withered Product Average Price</div>
                        </div>
                    </div>
                </div> --}}
            </div>

            







            <!-- If user is admin -->
            @elseif(auth()->user()->roles_id == 1)
            <!-- Add Products -->
            <div class="row">
                <div class="offset-md-1 col-md-10 offset-md-1">
                    <div class="card shadow mb-4">
                        <div class="card-header card-header-primary">
                            <h2 class="card-title">Add Products</h2>
                        </div>
                        <div class="card-body resultbody">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <!-- Select Users -->
                                    <select class="form-control" name="users_id[]">
                                        <option value="0" selected="true" disabled="True">Select Farmer</option>
                                            @foreach ($users as $key=>$p)
                                                <option value="{{$key}}">{{$p}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="button" class="btn btn-danger remove" value="x">
                                </div>
                            </div>
                            <!-- Products -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Harvest Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="product_type" value="{{$product->type}}" disabled/>
                                            <input name="products_id[]" type="hidden" value="{{$product->id}}">
                                        </td>
                                        <td><input type="text" class="form-control" name="quantity[]" value=""/></td>
                                        <td><input type="text" class="form-control" name="price[]" value=""/></td>
                                        <td>
                                            {{-- {{ Form::date('harvest_date[]', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'harvest_date[]'])}} --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <center><input type="button" class="btn btn-lg btn-warning addRow" value="+"></center>
                    </div>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="row">
                <div class="offset-md-1 col-md-10 offset-md-1">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </div>
            @endif
                   
        </form> <!-- End Form -->

</div>
<!-- END PAGE CONTENT-->
@endsection

