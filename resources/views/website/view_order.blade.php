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
                                    Email: {{$value['0']->users->email}}<br>
                                    Contact Number: {{$value['0']->users->phone}}<br>
                                    Location: {{$seller->street}}, {{$seller->barangays->name}}, {{$seller->cities->name}}, {{$seller->provinces->name}} <br>
                            </address>
                        </div>
                        <div class="col-lg-6 text-right">
                            <address>
                            <strong>Shipped To:</strong><br>
                                {{$value['0']->orders->users->first_name}} {{$value['0']->orders->users->last_name}}<br>
                                {{$value['0']->orders->users->street}}<br>
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
                                {{\Carbon\Carbon::parse($value['0']->orders->order_date)->format('F j, Y')}}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    {{-- @foreach ($value as $v) --}}
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><strong>Order summary</strong></h3>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
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
                                            <td class="text-center"><strong>Subtotal</strong></td>
                                            <td class="text-right"><strong>Cancel</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($value as $v)
                                        @php
                                            $sub_total = 0;
                                        @endphp
                                        @php
                                            // dd($value);
                                            $product = App\OriginalProductList::findOrFail($v->original_product_lists_id);
                                            $seller = App\User::findOrFail($v->farmers_id);
                                            
                                            $sub_total = ($product->price *  $v->quantity) + $sub_total;
                                        @endphp
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left">{{$product->products->type}}</td>
                                            <td class="text-center">{{$seller->company}}</td>
                                            <td class="text-center">{{$product->price}}</td>
                                            <td class="text-center">{{$v->quantity}} kaban/s</td>
                                            <td class="text-center">{{ presentPrice($v->original_product_lists->price *  $v->quantity)}}</td>
                                            <td class="text-right">
                                                @if ($v->order_product_statuses_id != 4)
                                                    <a href="/order_products/cancel_order/{{$v->id}}" class="btn btn-md btn-danger float-right"></i><i class="fas fa-times"></i> Cancel</a>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center"><strong>Total</strong></td>
                                            <td class="thick-line text-center">{{presentPrice($sub_total)}}</td>
                                            <td class="thick-line"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach






    <!-- Cancel Order Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete form?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel your order?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a href="/order_products/cancel_order/{{$v->id}}" class="btn btn-md btn-success float-right"></i>Yes</a>
                </div>
            </div>
        </div>
    </div> --}}


</div>



@endsection