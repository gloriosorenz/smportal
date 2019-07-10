@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Farmers</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Farmers</li>
    </ol>
</div>


<div class="page-content fade-in-up">
    <div class="row">
        <!-- Farmers -->
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmers Data Table</div>
                    <!-- Add Farmer Button -->
                    <div>
                        <a class="btn btn-success btn-sm" href="{{ route('farmers.create') }}">Add Farmer</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="farmers_table" cellspacing="0" width="100%">
                        <thead class="thead-default">
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
                            @foreach($farmers as $farmer)
                            <tr>
                                <td>{{$farmer->id}}</td>
                                <td>{{$farmer->first_name}} {{$farmer->last_name}}</td>
                                <td>{{$farmer->company}}</td>
                                <td>{{$farmer->email}}</td>
                                <td>{{$farmer->phone}}</td>
                                <td>
                                    @if($farmer->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Not Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/farmers/{{ $farmer->id }}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="/farmers/{{ $farmer->id }}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


       {{--  <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmers Active (Season 1)</div>
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
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>

</div>
<!-- END PAGE CONTENT-->
@endsection

