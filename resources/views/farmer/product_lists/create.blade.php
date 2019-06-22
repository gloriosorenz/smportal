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

    <div class="row">
        <!-- Form -->
        <form method="post" action="{{action('ProductListsController@store')}}" enctype="multipart/form-data">
        @csrf
    
            {{-- If user is a Farmer --}}
            @if (auth()->user()->roles_id == 2)
            <!-- Add Products -->
            <div class="row">
                <div class="offset-lg-1 col-lg-10 offset-lg-1">
                    <div class="card shadow mb-4">
                        <div class="card-header card-header-primary">
                            <h2 class="card-title">Add Products</h2>
                        </div>
                        <div class="card-body">
                            <!-- Products -->
                            <table class="table table-bordered">
                                <thead class="thead-default">
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
                                            <input name="users_id[]" type="hidden" value="{{auth()->user()->id}}">
                                        </td>
                                        <td><input type="text" class="form-control" name="orig_quantity[]" value=""/></td>
                                        @if ($product->id == 3)
                                            <td>
                                                <input type="text" class="form-control" value="" readonly/>
                                                <input type="hidden" class="form-control" name="price[]" value="0" readonly/>
                                            </td>
                                            @else
                                            <td><input type="text" class="form-control" name="price[]" value=""/></td>
                                        @endif
                                        <td>
                                            {{-- {{ Form::date('harvest_date[]', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'harvest_date[]'])}} --}}
                                            <div class="form-group" id="date_1">
                                                <label class="font-normal"></label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                <input class="form-control" type="text" value="{{ \Carbon\Carbon::now() }}" name="harvest_date[]">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
            
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- If user is admin --}}
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
                                        <td><input type="text" class="form-control" name="orig_quantity[]" value=""/></td>
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
            @endif
        
        
            <!-- Submit Button -->
            <div class="row">
                <div class="offset-md-1 col-md-10 offset-md-1">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- END PAGE CONTENT-->
@endsection

