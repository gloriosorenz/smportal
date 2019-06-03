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
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
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


        <!-- Extra-->
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Administrator Active (Season 1)</div>
                </div>
                <div class="ibox-body">
                      <ul class="media-list media-list-divider m-0">
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="img/users/u1.jpg" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="img/users/u2.jpg" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="img/users/u3.jpg" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="img/users/u6.jpg" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT-->
@endsection

