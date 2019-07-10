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
        <li class="breadcrumb-item">Show</li>
    </ol>
</div>

<div class="page-content fade-in-up">

    <div class="row">
        <!-- View Order Details -->
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">{{ $order_product->orders->users->first_name }}'s Order</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">

                    <p class="h3">Customer Details</p>
                    <br>
                    <dl class="row">
                        <dt class="col-sm-2">Name</dt>
                        <dd class="col-sm-9">{{ $order_product->orders->users->first_name }} {{ $order_product->orders->users->last_name }}</dd>
                        
                        <dt class="col-sm-2">Address</dt>
                        <dd class="col-sm-9">
                            <p>{{ $order_product->orders->users->street }} , {{ $order_product->orders->users->barangays->name }} , {{ $order_product->orders->users->cities->name }} , {{ $order_product->orders->users->provinces->name }} </p>
                        </dd>
                        
                        <dt class="col-sm-2">Phone</dt>
                        <dd class="col-sm-9">{{ $order_product->orders->users->phone }}</dd>

                        <dt class="col-sm-2">Email</dt>
                        <dd class="col-sm-9">{{ $order_product->orders->users->email }}</dd>
                        
                        
                    </dl>

                    <p class="h3">Order Details</p>
                    <br>
                    <table class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Product Type</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class=" text-center">
                                <td>
                                    <p>{{ $order_product->original_product_lists->products->type }}</p>
                                    {{-- <input class="form-control" type="number" value="{{ $order_product->quantity }}" disabled> --}}
                                </td>
                                <td>
                                    <p>{{ $order_product->quantity }}</p>
                                </td>
                                <td>
                                    {{ presentPrice($order_product->original_product_lists->price) }}
                                </td>
                                <td>
                                    {{ presentPrice($order_product->quantity * $order_product->original_product_lists->price) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Back Button -->
                    <div class="form-group">
                        <a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Page Content-->

@endsection

