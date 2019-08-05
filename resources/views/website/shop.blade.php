@extends('layouts.web')

@section('content')



<!-- Product -->
<div class="bg0 m-t-84 p-b-140">
        <div class="container-fluid w-00 h-100 p-t-100 p-r-250 p-l-250 p-b-300 bg0">
            <!-- Messages -->
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
            
            @if (session()->has('error_message'))
                <div class="alert alert-danger">
                    {{ session()->get('error_message') }}
                </div>
            @endif
            <!-- Show Products Table -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        {{-- <div>
                            <h1 class="display-4"><strong>Products</strong></h1>
                        </div>
                        <br> --}}

                        <!-- Title and product details -->
                        <div class="row">
                            <div class="col-lg-12">
                            <h1 class="display-4 text-left"><strong>Products</strong></h1>
                            <br>
                            <p><b>Rice Product</b><br>
                                The Rice Product is the main product output by the farmers it is planted and harvested in a span of 90-120 days, ready to be milled and stored for potential buyers.
                            </p>
                            <p><b>Withered Product</b><br>
                                Withered Product is the result of Rice Product being exposed to either the rain, dampening it or after harvesting it is left for a week, the rice will be dry and already shriveled up usually used as food for farm animals.
                            </p>
                            <br>
                            <p> 1 Kbn/Kaban = 50 Kg/Kilos</p>
                            </div>
                        </div>
                        <br>

                        <!-- Show Products Datatable -->
                        <div class="card shadow mb-4">
                            {{-- <div class="card-header">
                                <h2 class="title">Products</h2>
                            </div> --}}
                            <div class="card-body">
                                <table id="shop_table" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="">Image</th>
                                            <th class="text-center" width="">Product</th>
                                            <th class="text-center" width="">Rice Farm Company</th>
                                            <th class="text-center" width="">Farm Location</th>
                                            <th class="text-center" width="">Harvest Date</th>
                                            <th class="text-center" width="">Available Kabans</th>
                                            <th class="text-center" width="">Price per kilo</th>
                                            <th class="text-center" width="">Price per kaban</th>
                                            @guest
                                                @elseif (auth()->user()->roles_id == 3 && auth()->user()->active || auth()->user()->roles_id == 4 && auth()->user()->active )
                                                <th class="text-center" width="10%">Quantity</th>
                                                <th class="text-center" width="15%">Options</th>
                                            @endguest
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach($product_lists as $curr_product_list)
                                        <tr class="tr">
                                            <form method="POST" action="{{action('CartController@store')}}">
                                            @csrf
                                            <td>
                                                @if($curr_product_list->image == 'noimage.jpeg' || $curr_product_list->image == null)
                                                    <div class="img-wrap">
                                                        <img src="/img/image.png" width="auto" height="80"/>
                                                    </div>
                                                @elseif($curr_product_list->image)
                                                    <div class="img-wrap">
                                                        {{-- <img src="/storage/logos/{{$item->logo}}" class="img-thumbnail img-sm" width="100%" height="100%"> --}}
                                                        <img src="/storage/images/{{$curr_product_list->image}}" width="auto" height="80"/>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{$curr_product_list->products->type}}</td>
                                            <td>{{$curr_product_list->users->company}}</td>
                                            <td>{{ $curr_product_list->users->barangays->name }}, {{ $curr_product_list->users->cities->name }}, {{ $curr_product_list->users->provinces->name }}</td>
                                            <td>{{Carbon\Carbon::parse($curr_product_list->harvest_date)->format('F j, Y')}}</td>
                                            <td>{{ $curr_product_list->quantity }} kbn/s</td>
                                            <td>
                                                <div class="font-weight-bold">{{ presentPrice($curr_product_list->price) }} </div>
                                            </td>
                                            <td>
                                                <div class="font-weight-bold">{{ presentPrice($curr_product_list->price*50) }} </div>
                                            </td>
                                            
                                                @guest
                                                    @elseif (auth()->user()->roles_id == 3 && auth()->user()->active || auth()->user()->roles_id == 4 && auth()->user()->active)
                                                    <td>
                                                        <input type="number" class="form-control" placeholder="0" step="1" min="1" max="{{$curr_product_list->quantity}}" name="quantity"  value="0"/>
                                                    </td>
                                                    <td>
                                                            <input type="hidden" name="id" value="{{ $curr_product_list->id }}">
                                                            <input type="hidden" name="price" value="{{ $curr_product_list->price }}">
                                                            {{-- <input type="hidden" name="quantity" value="22"> --}}
                                                            <button type="submit" class="btn btn-success btn-md btn-block">Add to Cart</button>
                                                    </td>
                                                </form>
                                                @endguest
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          
        </div>
</div>
    
@endsection