@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Requests</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Requests</li>
    </ol>
</div>


<div class="page-content fade-in-up">
    <div class="row">
        <!-- Farmers -->
        <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Requests Table</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="farmers_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Active</th>
                                <th width="13%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{$request->id}}</td>
                                <td>{{$request->first_name}} {{$request->last_name}}</td>
                                <td>{{$request->company}}</td>
                                <td>{{$request->email}}</td>
                                <td>{{$request->phone}}</td>
                                <td>
                                    @if($request->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/farmers/{{ $request->id }}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="/farmers/{{ $request->id }}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
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

