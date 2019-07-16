@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Damage Reports</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Damage Reports</li>
    </ol>
</div>
<br>


<!-- Damage Report Datatable -->
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Damage Reports</div>
                <!-- Add Damage Report -->
                <div>
                    @if (auth()->user()->active)
                    <a class="btn btn-success btn-sm" href="{{ route('damage_reports.create') }}">Create Report</a>
                    @endif
                </div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->
                <table id="table_id" class="table table-bordered table-hover">

                    <!-- If user is admin -->
                    @if(auth()->user()->roles->id == 1)
                        @if(count($dreports) > 0)
                        <thead>
                            <tr>
                                <th class="text-center" width="">ID</th>
                                <th class="text-center" width="">Calamity</th>
                                <th class="text-center" width="">Date Created</th>
                                <th class="text-center" width="15%">Options</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($dreports as $dr)
                            <tr class="tr">
                                <td>{{$dr->id}}</td>
                                <td>{{$dr->calamities->type}}</td>
                                <td>{{$dr->created_at->toFormattedDateString()}}</td>
                                <td>
                                    <a href="/damage_reports/{{$dr->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                    @if (auth()->user()->active)
                                    <a href="/damage_reports/{{$dr->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    @endif
                                    <a href="/pdf/damage_report/{{$dr->id}}" class="btn btn-primary"><i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <p>No reports found</p>
                        @endif

                    <!-- If user is farmer -->
                    @elseif(auth()->user()->roles->id == 2)
                        @if(count($user_dreports) > 0)
                        <thead>
                            <tr>
                                <th class="text-center" width="">ID</th>
                                <th class="text-center" width="">Calamity</th>
                                <th class="text-center" width="">Date Created</th>
                                <th class="text-center" width="15%">Options</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($user_dreports as $dr)
                            <tr class="tr">
                                <td>{{$dr->id}}</td>
                                <td>{{$dr->calamities->type}}</td>
                                <td>{{$dr->created_at->toFormattedDateString()}}</td>
                                <td>
                                    <a href="/damage_reports/{{$dr->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                    @if (auth()->user()->active)
                                    <a href="/damage_reports/{{$dr->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    @endif
                                    <a href="/pdf/damage_report/{{$dr->id}}" class="btn btn-primary"><i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <p>No reports found</p>
                        @endif
                    @endif
                </table>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>

    
@endsection