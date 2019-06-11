@extends('layouts.web')

@section('content')
<div class="bg0 m-t-84 p-b-140">
    <div class="container" id="invoice_container">
        <br>
        <br>
        <hr>
        <div class="row">
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
        <!-- End Row -->

        {{-- <div class="page-content fade-in-up">
            <div class="ibox invoice">
                <div class="invoice-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="invoice-logo">
                                <img src="/img/admin-avatar.png" height="65px" />
                            </div>
                            <div>
                                <div class="m-b-5"><strong>Invoice from</strong></div>
                                <div>Github, Inc.</div>
                                <ul class="list-unstyled m-t-10">
                                    <li class="m-b-5">
                                        <strong>A:</strong> San Francisco, CA 94103 Market Street</li>
                                    <li class="m-b-5">
                                        <strong>E:</strong> adminca@exmail.com</li>
                                    <li>
                                        <strong>P:</strong> (123) 456-2112</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="clf" style="margin-bottom:150px;">
                                <dl class="row pull-right" style="width:250px;"><dt class="col-sm-6">Invoice Date</dt>
                                    <dd class="col-sm-6">10 April 2017</dd><dt class="col-sm-6">Issue Date</dt>
                                    <dd class="col-sm-6">30 April 2017</dd><dt class="col-sm-6">Account No.</dt>
                                    <dd class="col-sm-6">1450012</dd>
                                </dl>
                            </div>
                            <div>
                                <div class="m-b-5"><strong>Invoice To</strong></div>
                                <div>Emma Johnson</div>
                                <ul class="list-unstyled m-t-10">
                                    <li class="m-b-5">San Francisco, 548 Market St.</li>
                                    <li class="m-b-5">emma.johnson@exmail.com</li>
                                    <li>(123) 279-4058</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped no-margin table-invoice">
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div><strong>Flat Design</strong></div><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small></td>
                            <td>2</td>
                            <td>$220.00</td>
                            <td>$440.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div><strong>Bootstrap theme</strong></div><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small></td>
                            <td>1</td>
                            <td>$500.00</td>
                            <td>$500.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div><strong>Invoice Design</strong></div><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small></td>
                            <td>3</td>
                            <td>$300.00</td>
                            <td>$900.00</td>
                        </tr>
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
                            <td>Subtotal:</td>
                            <td>$1840</td>
                        </tr>
                        <tr class="text-right">
                            <td>TAX 5%:</td>
                            <td>$92</td>
                        </tr>
                        <tr class="text-right">
                            <td class="font-bold font-18">TOTAL:</td>
                            <td class="font-bold font-18">$1748</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button>
                </div>
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
        </div> --}}
    </div>
</div>









@endsection