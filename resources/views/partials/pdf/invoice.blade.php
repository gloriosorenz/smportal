<!DOCTYPE html>
<html>
    
    <head>
        <title>Invoice {{\Carbon\Carbon::now()->format('Y-m')}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>

            .invoice-title h2, .invoice-title h3 {
                display: inline-block;
            }
            
            .table > tbody > tr > .no-line {
                border-top: none;
            }
            
            .table > thead > tr > .no-line {
                border-bottom: none;
            }
            
            .table > tbody > tr > .thick-line {
                border-top: 2px solid;
            }        
        </style>

        <style type="text/css">
            .page {
                overflow: hidden;
                page-break-after: always;
            }

            .container{
                display:flex;
                justify-content:center;
                align-items: center;
            }

        </style>

    </head>
    <body>
            {{-- <div class="container" id="invoice_container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($data as $key => $value)
                        <div class="page">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Order summary </strong></h3>
                                </div>
                                <div class="panel-body">
                                    @php
                                        $seller = App\User::findOrFail($key);
                                    @endphp

                                    <!-- Details -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>{{$value['0']->users->company}}</strong><br>
                                            Contact Number: {{$value['0']->users->phone}}<br>
                                            Location: {{$seller->street}}, {{$seller->barangays->name}}, {{$seller->cities->name}}, {{$seller->provinces->name}} <br>
                                        </div>
                                    </div>
                                    
                                    
                                    <br>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <td class="text-left"><strong>Item</strong></td>
                                                    <td class="text-center"><strong>Seller</strong></td>
                                                    <td class="text-center"><strong>Price</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong></td>
                                                    <td class="text-right"><strong>Totals</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sub_total = 0;
                                                @endphp
                                                @foreach ($value as $v)
                                                @php
                                                    $product = App\ProductList::findOrFail($v->product_lists_id);
                                                    $seller = App\User::findOrFail($v->farmers_id);
                                                    
                                                    $sub_total = ($product->price *  $v->quantity) + $sub_total;
                                                @endphp
                                                <tr>
                                                    <td class="text-left">{{$product->orig_products->type}}</td>
                                                    <td class="text-center">{{$seller->company}}</td>
                                                    <td class="text-center">{{$product->price}}</td>
                                                    <td class="text-center">{{$v->quantity}} kaban/s</td>
                                                    <td class="text-right">{{ presentPrice($v->product_lists->price *  $v->quantity)}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-center"><strong>Total</strong></td>
                                                    <td class="thick-line text-right">{{presentPrice($sub_total)}}</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                    <!-- End Table -->
                                </div> 
                                <!-- End Panel Body -->
                            </div>
                        </div>
                        <!-- End Panel -->
                        @endforeach

                    </div>
                    <!-- End Col-md-12 -->
                </div>
                <!-- End Row -->

            </div> --}}
            <!-- End Container -->







            

            <div class="container">
                @foreach ($data as $key => $value)
                
                @php
                    $seller = App\User::findOrFail($key);
                    // dd($data);
                @endphp

                <div class="page">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2><h3 class="pull-right">Order # 12345</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6">
                                    <address>
                                            <strong>{{$value['0']->users->company}}</strong><br>
                                            Contact Number: {{$value['0']->users->phone}}<br>
                                            Location: {{$seller->street}}, {{$seller->barangays->name}}, {{$seller->cities->name}}, {{$seller->provinces->name}} <br>
                                    </address>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <address>
                                    <strong>Shipped To:</strong><br>
                                        {{$value['0']->orders->users->first_name}} {{$value['0']->orders->users->last_name}}<br>
                                        {{$value['0']->orders->users->street}}<br>
                                        {{$value['0']->orders->users->barangays->name}}<br>
                                        {{$value['0']->orders->users->cities->name}} {{$value['0']->orders->users->provinces->name}}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <address>
                                        <strong>Payment Method:</strong><br>
                                        Cash<br>
                                    </address>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        March 7, 2014<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td><strong>Item</strong></td>
                                                    <td class="text-center"><strong>Company</strong></td>
                                                    <td class="text-center"><strong>Price</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong></td>
                                                    <td class="text-right"><strong>Subtotal</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sub_total = 0;
                                                @endphp
                                                @foreach ($value as $v)
                                                @php
                                                    $product = App\ProductList::findOrFail($v->product_lists_id);
                                                    $seller = App\User::findOrFail($v->farmers_id);
                                                    
                                                    $sub_total = ($product->price *  $v->quantity) + $sub_total;
                                                @endphp
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                <tr>
                                                    <td class="text-left">{{$product->orig_products->type}}</td>
                                                    <td class="text-center">{{$seller->company}}</td>
                                                    <td class="text-center">{{$product->price}}</td>
                                                    <td class="text-center">{{$v->quantity}} kaban/s</td>
                                                    <td class="text-right">{{ presentPrice($v->product_lists->price *  $v->quantity)}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-center"><strong>Total</strong></td>
                                                    <td class="thick-line text-right">{{presentPrice($sub_total)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
                
    </body>
</html>