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
    </div>
</div>
@endsection