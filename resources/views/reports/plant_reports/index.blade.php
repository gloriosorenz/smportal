@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Plant Reports</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Plant Reports</li>
    </ol>
</div>
<br>


<!-- Add Plant Report -->
{{-- @if (count($check_date) == 1)
    @if (auth()->user()->roles_id == 1)
        <a class="btn btn-secondary btn-md" href="/reports/plant_reports/addPlantReport">+ Add</a>
    @endif
@endif --}}


<!-- Plant Report Datatable -->
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Plant Reports</div>
                <!-- Add Plant Report -->
                <div>
                    {{-- @if (count($check_date) == 0)
                    <a class="btn btn-success btn-sm" href="/reports/plant_reports/addPlantReport">+ Add Report</a>
                    @endif --}}
                </div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->
                <table id="plant_reports_table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="">ID</th>
                            <th class="text-center" width="">Season</th>
                            <th class="text-center" width="">Month</th>
                            <th class="text-center" width="20%">Options</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($preports as $pr)
                        <tr class="tr">
                            <td>{{$pr->id}}</td>
                            <td>Season {{$pr->seasons->id}}</td>
                            <td>{{$pr->created_at->format('M-Y')}}</td>
                            <td>
                                <a href="/plant_reports/{{$pr->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                @if (auth()->user()->active)
                                    @if(auth()->user()->roles->id == 2)
                                    <a href="/plant_reports/{{$pr->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    @endif
                                @endif
                                <a href="/pdf/plant_report/{{$pr->id}}" class="btn btn-primary"><i class="fas fa-download fa-sm text-white"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <!-- End Form -->
                <hr>
                <!-- Legends -->
                <p>Legend</p>
                <p><button type="button" class="btn btn-md btn-warning" disabled><i class="fas fa-eye fa-sm text-white"></i></button> View Button</p>
                <p><button type="button" class="btn btn-md btn-success" disabled><i class="fas fa-edit fa-sm text-white"></i></button> Edit Button</p>
                <p><button type="button" class="btn btn-md btn-primary" disabled><i class="fas fa-download fa-sm text-white"></i></button> Download Button</p>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-2">
        <!-- Legends -->
        <p>Legend</p>
        <p><button type="button" class="btn btn-md btn-warning" disabled><i class="fas fa-eye fa-sm text-white"></i></button> View Button</p>
        <p><button type="button" class="btn btn-md btn-success" disabled><i class="fas fa-edit fa-sm text-white"></i></button> Edit Button</p>
        <p><button type="button" class="btn btn-md btn-primary" disabled><i class="fas fa-download fa-sm text-white"></i></button> Download Button</p>
    </div> --}}
</div>

    
@endsection