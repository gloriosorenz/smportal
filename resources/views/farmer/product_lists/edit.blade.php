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
    <div class="col-lg-8">

        
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
                    <form method="POST" action="{{action('ProductListsController@update', $product_list->id)}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <!-- Products -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" width="20%">Product</th>
                                <th class="text-center">Original Quantity</th>
                                <th class="text-center">Current Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Harvest Date</th>
                                <th class="text-center">Product Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="product_type" value="{{$product_list->products->type}}" disabled/>
                                    {{-- <input name="products_id" type="hidden" value="{{$product_list->orig_products->id}}"/> --}}
                                </td>
                                <td><input type="text" class="form-control" name="orig_quantity" value="{{$product_list->quantity}}" /></td>
                                {{-- <td><input type="text" class="form-control" name="curr_quantity" value="{{$product_list->curr_quantity}}" /></td> --}}
                                <td><input type="text" class="form-control" name="price" value="{{$product_list->price}}"/></td>
                                <td>
                                    <div class="form-group" id="date_1">
                                        {{-- <label class="font-normal">Start Date</label> --}}
                                        <div class="input-group date">
                                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control" type="text" name="harvest_date[]" value="{{ $product_list->harvest_date }}">
                                        </div>
                                    </div>
                                    {{-- {{ Form::date('harvest_date[]', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'harvest_date[]'])}} --}}
                                </td>
                                <td>
                                    <div class="custom-file form-control-sm p-b-10">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
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