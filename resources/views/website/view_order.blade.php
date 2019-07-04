@extends('layouts.web')

@section('content')

<div class="bg0 m-t-84 p-b-140">
    @foreach ($farmers as $key => $value)
    <div class="container-fluid w-00 h-100 p-t-70 p-r-250 p-l-250 p-b-300 bg0">

        @php
            $seller = App\User::findOrFail($key);
        @endphp

        <div class="page">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3><strong>Order #{{ $order->id }} </strong></h3>
                        </div>
                        <div class="col-lg-6">
                                <h4 class="float-right">
                                        Status:
                                        @if ($value['0']->order_product_statuses->id == 1)
                                            <span class="badge badge-pill badge-warning">Pending</span>                                   
                                        @elseif ($value['0']->order_product_statuses->id == 2)
                                            <span class="badge badge-pill badge-success">Confirmed</span>                                   
                                        @elseif ($value['0']->order_product_statuses->id == 3)
                                            <span class="badge badge-pill badge-info">Paid</span>                                   
                                        @elseif ($value['0']->order_product_statuses->id == 4)
                                            <span class="badge badge-pill badge-danger">Cancelled</span>                                   
                                        @endif
                                    </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>
                                    <strong>{{$value['0']->users->company}}</strong><br>
                                    Contact Number: {{$value['0']->users->phone}}<br>
                                    Location: {{$seller->street}}, {{$seller->barangays->name}}, {{$seller->cities->name}}, {{$seller->provinces->name}} <br>
                            </address>
                        </div>
                        <div class="col-lg-6 text-right">
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
                        <div class="col-lg-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Cash<br>
                            </address>
                        </div>
                        <div class="col-lg-6 text-right">
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
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Order summary</strong></h3>
                        </div>
                        <div class="card-body">
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
    </div>
    @endforeach

</div>



@endsection