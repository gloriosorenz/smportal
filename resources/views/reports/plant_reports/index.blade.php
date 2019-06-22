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
@if (count($check_date) == 1)
    {{-- @if (auth()->user()->roles_id == 1) --}}
        <a class="btn btn-secondary btn-md" href="/reports/plant_reports/addPlantReport">+ Add</a>
    {{-- @endif --}}
@endif


<!-- Plant Report Datatable -->
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Plant Reports</div>
                <!-- Add Plant Report -->
                <div>
                    <a class="btn btn-success btn-sm" href="{{ route('plant_reports.create') }}">Create Report</a>
                </div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->
                <table id="plant_reports_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="">ID</th>
                            <th width="">Season</th>
                            <th width="">Month</th>
                            <th width="20%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($preports as $pr)
                        <tr class="tr">
                            <td>{{$pr->id}}</td>
                            <td>Season {{$pr->seasons->id}}</td>
                            <td>{{$pr->created_at->format('M-Y')}}</td>
                            <td>
                                <a href="/plant_reports/{{$pr->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                <a href="/plant_reports/{{$pr->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="/pdf/plant_report/{{$pr->id}}" class="btn btn-primary"><i class="fas fa-download fa-sm text-white"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>

    
@endsection