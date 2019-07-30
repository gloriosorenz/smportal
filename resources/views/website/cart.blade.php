@extends('layouts.web')


@section('content')
<!-- Cart Style -->
<style>
    .param {
    margin-bottom: 7px;
    line-height: 1.4;
    }
    .param-inline dt {
        display: inline-block;
    }
    .param dt {
        margin: 0;
        margin-right: 7px;
        font-weight: 600;
    }
    .param-inline dd {
        vertical-align: baseline;
        display: inline-block;
    }

    .param dd {
        margin: 0;
        vertical-align: baseline;
    } 

    .shopping-cart-wrap .price {
        color: #007bff;
        font-size: 18px;
        font-weight: bold;
        margin-right: 5px;
        display: block;
    }
    var {
        font-style: normal;
    }

    .media img {
        margin-right: 1rem;
    }
    .img-sm {
        width: 90px;
        max-height: 75px;
        object-fit: cover;
    }
</style>



<div class="bg0 m-t-84 p-b-140">
    <div class="container-fluid w-00 h-100 p-t-100 p-r-250 p-l-250 p-b-300 bg0">
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

        
       
        <div>
            <h1 class="display-4"><strong>Cart</strong></h1>
        </div>


        <br>
        @if (sizeof(Cart::content()) > 0)
        <div class="card">
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr>
                <th>Product</th>
                <th class="text-center" width="30%">Farmer Organization</th>
                <th class="text-center" width="15%">Quantity (kbn)</th>
                <th class="text-center" width="18%">Individual Price per Kaban</th>
                <th class="text-center" width="15%">Subtotal</th>
                <th class="text-center" width="15%">Action</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach (Cart::content() as $item)
                    <tr>
                        <td>
                            <figure class="media">
                                @if($item->model->image == 'noimage.jpeg' || $item->model->image == null)
                                    <div class="img-wrap">
                                        <img src="/img/image.png" width="auto" height="80"/>
                                    </div>
                                @elseif($item->model->image)
                                    <div class="img-wrap">
                                        <img src="/storage/images/{{$item->model->image}}" width="auto" height="80"/>
                                    </div>
                                @endif
                                {{-- <div class="img-wrap"><img src="/img/image.png" class="img-thumbnail img-sm">{{$item->image}}</div> --}}
                                <figcaption class="media-body">
                                    <h6 class="title text-truncate">{{ $item->model->products->type }} </h6>
                                    <br>
                                    <dl class="param param-inline small">
                                        <dt>Harvest Date: </dt>
                                        <dd>{{ \Carbon\Carbon::parse($item->model->harvest_date)->format('F j, Y') }}</dd>
                                    </dl>
                                </figcaption>
                            </figure> 
                        </td>
                        <td>
                            <div class="p-t-20">
                                {{ $item->model->users->company }}
                            </div>
                        </td>
                        <td> 
                            <select class="quantity form-control" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity*50 }}" value="{{$item->model->quantity}}">
                                @for ($i = 1; $i < $item->model->quantity + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor                                
                            </select>
                            <dl class="p-t-20 param param-inline small">
                                <dt>Available: {{ $item->model->quantity }} kbn/s</dt>
                            </dl>
                        </td>
                        <td>
                            {{ $item->model->presentPrice() }}
                        </td>
                        <td> 
                            <div class="price-wrap"> 
                                <var class="price"> ₱ {{ $item->subtotal() }}</var> 
                                <small class="text-muted">({{ $item->model->presentPrice() }} per kbn x 50kg)</small> 
                            </div> <!-- price-wrap .// -->
                        </td>
                        <td> 
                            <form action=" {{route ('cart.destroy',$item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger btn-md m-t-20"> x Remove</button>
                            </form>
                            {{-- <a href="" class="btn btn-outline-danger"> × Remove</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><a href="{{ route('shop') }}" class="btn btn-lg btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td colspan="1" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total ₱{{ Cart::instance('default')->subtotal() }}</strong></td>
                        <td><a href="{{ url('checkout') }}" class="btn btn-success btn-lg btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                </tfoot>
            </table>
        </div> <!-- card.// -->

        @else

            <h3>You have no items in your shopping cart</h3>
            <br>
            {{-- <a href="{{ route('shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a> --}}
            <a href="{{ route('shop') }}" class="btn btn-lg btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>

        @endif

       




    </div>
</div>



@endsection

@section('extra-js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    (function(){
        const classname = document.querySelectorAll('.quantity.form-control')

        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function() {
                const id = element.getAttribute('data-id')
                const productQuantity = element.getAttribute('data-productQuantity')
                // console.log('error 1');

                axios.patch(`/cart/${id}`, {
                    quantity: this.value,
                    productQuantity: productQuantity
                })
                .then(function (response) {
                    // console.log('error 2');
                    window.location.href = '{{ route('cart.index') }}'
                })
                .catch(function (error) {
                    // console.log('error 3');
                    window.location.href = '{{ route('cart.index') }}'
                });
            })
        })
    })();
</script>
@endsection



 {{-- @if (sizeof(Cart::content()) > 0)
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Farmer Organization</th>
                            <th>Quantity per Kaban</th>
                            <th>Individual Price</th>
                            <th>Subtotal</th>
                            <th class="column-spacer"></th>
                            <th></th>
                        </tr>
                    </thead>
    
                    <tbody>

                        @foreach (Cart::content() as $item)
                        <tr>
                            <td>{{ $item->model->curr_products->type }}</td>
                            <td>{{ $item->model->users->company }}</td>
                            <td>
                                <div class="cart-table-row-right">
                                    <select class="quantity form-control" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->curr_quantity }}">
                                        @for ($i = 1; $i < $item->model->curr_quantity + 1 ; $i++)
                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor                                
                                    </select>
                                </div>
                            </td>
                            <td>{{ $item->model->presentPrice() }}</td>
                            <td>{{ presentPrice($item->subtotal) }}</td>
                            <td>
                                <form action=" {{route ('cart.destroy',$item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
    
                                    <button type="submit" class="btn btn-danger btn-md">Remove</button>
                                </form>
                            </td>
                        </tr>
    
                        @endforeach
                        <tr>
                            <td class="table-image"></td>
                            <td></td>
                            <td></td>
                            <td class="small-caps table-bg" style="text-align: right">Total</td>
                            <td>₱{{ Cart::instance('default')->subtotal() }}</td>
                            <td></td>
                        </tr>

    
                    </tbody>
                </table>
                <!-- Buttons -->
                <a href="{{ route('shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
                <a href="{{ url('checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
            </div>
        </div>
    
            
    
        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ route('shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif --}}