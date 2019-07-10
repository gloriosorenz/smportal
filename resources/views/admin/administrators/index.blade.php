@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Administrators</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Administrators</li>
    </ol>
</div>


<div class="page-content fade-in-up">

    <div class="row">
        <!-- Administrators -->
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Administrators Data Table</div>
                    <!-- Add Farmer Button -->
                    <div>
                        <a class="btn btn-success btn-sm" href="{{ route('administrators.create') }}">Add Addministrator</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="administrators_table" cellspacing="0" width="100%">
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
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->first_name}} {{$admin->last_name}}</td>
                                <td>{{$admin->company}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>
                                    @if($admin->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Not Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/administrators/{{ $admin->id }}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="/administrators/{{ $admin->id }}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
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

