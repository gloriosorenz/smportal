@extends('layouts.web')

@section('content')
<div class="bg0 m-t-84 p-b-140">
    <div class="container-fluid w-00 h-100 p-t-70 p-r-250 p-l-250 p-b-300 bg0">
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="invoice-title">
                    <h3>Order #</h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <strong>Sold To:</strong><br>
                            {{auth()->user()->first_name}} {{auth()->user()->last_name}}<br>
                        </address>
                    </div>
                    <div class="col-md-6 text-right">
                        <address>
                        <strong>Your Company:</strong><br>
                            {{auth()->user()->company}}<br>
                        </address>
                    </div>
                </div>
                <!-- End Row -->
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <strong>Payment Method:</strong><br>
                            Cash<br>
                        </address>
                    </div>
                    <div class="col-md-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            {{$order_date->toFormattedDateString()}}<br><br>
                        </address>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Col-md-12 -->
        </div>
        <!-- End Row -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td><strong>Item</strong></td>
                                            <td class="text-center"><strong>Seller</strong></td>
                                            <td class="text-center"><strong>Price</strong></td>
                                            <td class="text-center"><strong>Quantity</strong></td>
                                            <td class="text-right"><strong>Subtotal</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                        <tr>
                                            <td>{{ $item->model->curr_products->type }}</td>
                                            <td>{{ $item->model->users->company }}</td>
                                            <td class="text-center">{{ $item->model->presentPrice() }}</td>
                                            <td class="text-center">{{ $item->qty }} kaban/s</td>
                                            <td class="text-right">{{ presentPrice($item->subtotal) }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center"><strong>Total</strong></td>
                                            <td class="thick-line text-right">₱{{ Cart::instance('default')->subtotal() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                            <!-- End Table -->
                            <a href="{{ route('cart.index') }}" class="btn btn-lg btn-primary">Back to Cart</a> &nbsp;
                            <button type="submit" id="complete-order" class="btn btn-lg btn-success">Complete Order</button>
                        </form> 
                        <!-- End From -->
                    </div> 
                    <!-- End Panel Body -->
                </div>
                <!-- End Pane -->
            </div>
            <!-- End Col-md-12 -->
        </div>
        <!-- End Row --> --}}



        <div class="page-content fade-in-up">

            <!-- Buttons -->
            <div class="text-right">
                <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button>
            </div>

            <div class="ibox invoice">
                <div class="invoice-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="invoice-logo">
                                <h2>Invoice #</h2>
                            </div>
                            <div>
                                <div class="m-b-5"><strong>Invoice from</strong></div>
                                <div>Samahan ng Magsasaka sa Santa Rosa Laguna</div>
                                <ul class="list-unstyled m-t-10">
                                    <li class="m-b-5">
                                        <strong>Address:</strong> City Agricultural Office 
                                        2F Cityhall B, City Govenment Center
                                        Santa Rosa City, Laguna</li>
                                    <li class="m-b-5">
                                        <strong>Email:</strong> cityagricultureoffice_csrl@yahoo.com</li>
                                    <li>
                                        <strong>Phone:</strong> 049 530 0015</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="clf" style="margin-bottom:150px;">
                                <dl class="row pull-right" style="width:250px;">
                                    <dt class="col-sm-6">Invoice Date</dt>
                                        <dd class="col-sm-6">{{ $order_date->englishMonth }} {{ $order_date->day }}, {{$order_date->year}}</dd>
                                    <dt class="col-sm-6">Issue Date</dt>
                                        <dd class="col-sm-6">{{ $order_date->englishMonth }} {{ $order_date->day }}, {{$order_date->year}}</dd>
                                    {{-- <dt class="col-sm-6">Account No.</dt>
                                        <dd class="col-sm-6">1450012</dd> --}}
                                </dl>
                            </div>
                            <div>
                                <div class="m-b-5"><strong>Invoice To</strong></div>
                                <div>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                                <ul class="list-unstyled m-t-10">
                                    <li class="m-b-5">{{ auth()->user()->barangays->name }}, {{ auth()->user()->cities->name }}, {{ auth()->user()->provinces->name }}</li>
                                    <li class="m-b-5">{{ auth()->user()->email }}</li>
                                    <li>{{ auth()->user()->phone }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                    <table class="table table-striped no-margin table-invoice">
                        <thead>
                            <tr>
                                <th>Item Description</th>
                                <th>Seller</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td>{{ $item->model->curr_products->type }}</td>
                                <td>{{ $item->model->users->company }}</td>
                                <td class="text-center">{{ $item->model->presentPrice() }}</td>
                                <td class="text-center">{{ $item->qty }} kaban/s</td>
                                <td class="text-right">{{ presentPrice($item->subtotal) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table no-border">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-right">
                                <td class="font-bold font-18">TOTAL:</td>
                                <td class="font-bold font-18">₱{{ Cart::instance('default')->subtotal() }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('cart.index') }}" class="btn btn-lg btn-warning"><i class="fa fa-angle-left"></i> Back to Cart</a> &nbsp;
                                </td>
                                <td>
                                    <button type="submit" id="complete-order" class="btn btn-lg btn-success">Complete Order</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </form> 

            </div>


            <style>
                .invoice {
                    padding: 20px
                }
        
                .invoice-header {
                    margin-bottom: 50px
                }
        
                .invoice-logo {
                    margin-bottom: 50px;
                }
        
                .table-invoice tr td:last-child {
                    text-align: right;
                }
            </style>
        </div>
    </div>
</div>









@endsection