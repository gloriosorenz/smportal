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
        <li class="breadcrumb-item">Edit</li>
    </ol>
</div>


<div class="page-content fade-in-up">
<div class="row">
    <div class="col-lg-6">

        <!-- Form -->
        <form method="post" action="{{action('ProductListsController@update', $product_list->id)}}">
        @method('PATCH')
        @csrf
        <!-- Product List Datatable -->
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Update products</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->
                    <!-- Products -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Original Quantity</th>
                                <th>Current Quantity</th>
                                <th>Price</th>
                                <th>Harvest Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="product_type" value="{{$product_list->orig_products->type}}" disabled/>
                                    {{-- <input name="products_id" type="hidden" value="{{$product_list->orig_products->id}}"/> --}}
                                </td>
                                <td><input type="text" class="form-control" name="orig_quantity" value="{{$product_list->orig_quantity}}" /></td>
                                <td><input type="text" class="form-control" name="curr_quantity" value="{{$product_list->curr_quantity}}" /></td>
                                <td><input type="text" class="form-control" name="price" value="{{$product_list->price}}"/></td>
                                <td>
                                    <div class="form-group" id="date_1">
                                        {{-- <label class="font-normal">Start Date</label> --}}
                                        <div class="input-group date">
                                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control" type="text" name="harvest_date[]" value="{{ $product_list->harves_date }}">
                                        </div>
                                    </div>
                                    {{-- {{ Form::date('harvest_date[]', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'harvest_date[]'])}} --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                    </form>
                <!-- End Form -->
            </div>
        </div>

        


    </div>
</div>
    
</div>
    
@endsection