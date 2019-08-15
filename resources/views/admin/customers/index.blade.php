@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Customers</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Customers</li>
    </ol>
</div>


<div class="page-content fade-in-up">

    <div class="row">
        <!-- Customers -->
        <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Customers Data Table</div>
                    <!-- Add Farmer Button -->
                    <div>
                        <a class="btn btn-success btn-sm" href="{{ route('customers.create') }}">Add Customer</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="customers_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Active</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                                <td>{{$customer->company}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>
                                    @if($customer->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Not Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/customers/{{ $customer->id }}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="/customers/{{ $customer->id }}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT-->
@endsection

