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
    </ol>
</div>


<div class="page-content fade-in-up">

    <div class="row">
        <!-- Products -->
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Products For Season {{ $latest_season->id }}</div>
                    <!-- Add Product Button -->
                    <div>
                        {{-- <a class="btn btn-success btn-sm" href="#">Plan Product</a> --}}
                        @if ($count == 0)
                            <a class="btn btn-success btn-sm" href="#">Add Products</a>
                        @endif
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Type</th>
                                <th>Rice Farmer</th>
                                <th>Initial Quantity</th>
                                <th>Current Quantity</th>
                                <th>Harvest Date</th>
                                <th width="20%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_lists as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->orig_products->type}}</td>
                                <td>{{$list->users->company}}</td>
                                <td>{{$list->orig_quantity}}</td>
                                <td>{{$list->curr_quantity}}</td>
                                <td>{{$list->harvest_date}}</td>
                                <td>
                                    <a href="#" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="#" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                    <a href="#" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Active Farmers -->
      {{--   <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmers Active (Product 1)</div>
                </div>
                <div class="ibox-body">
                      <ul class="media-list media-list-divider m-0">
                        @foreach($farmers as $farmer)
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="img/admin-avatar.png" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">{{$farmer->first_name}} {{$farmer->last_name}} <small class="float-right text-muted">12:05</small></div>
                                <div class="font-13">{{$farmer->company}}</div>
                            </div>
                        </li>
                        @endforeach
                        <hr>
                        {{ $farmers->links() }}
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>

</div>
<!-- END PAGE CONTENT-->
@endsection

