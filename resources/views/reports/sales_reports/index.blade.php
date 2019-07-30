@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Sales Reports</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Sales Reports</li>
    </ol>
</div>
<br>


<!-- Sales Report Datatable -->
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Sales Reports</div>
                <!-- Add Damage Report -->
                <div>
                    {{-- <a class="btn btn-success btn-sm" href="{{ route('damage_reports.create') }}">Create Report</a> --}}
                </div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->
                <table id="sales_reports_table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="20%">Season</th>
                            <th class="text-center" width="">Start Date</th>
                            <th class="text-center" width="">End Date</th>
                            <th class="text-center" width="">Status</th>
                            @if(auth()->user()->roles_id == 2)
                            <th class="text-center" width="">Options</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <!-- If user is admin -->
                        @if(Auth::user()->roles_id == 1)
        
                            @foreach($seasons as $season)
                            <tr class="tr">
                                <td>Season {{ $season->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($season->season_start)->format('F j, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($season->season_end)->format('F j, Y')}}</td>
                                <td>
                                    @if ($season->season_statuses_id == 1)
                                        <h5><span class="badge badge-warning">{{ $season->season_statuses->status }}</span></h5>
                                    @else
                                        <h5><span class="badge badge-success">{{ $season->season_statuses->status }}</span></h5>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
        

                        <!-- If user is farmer -->
                        @elseif(Auth::user()->roles_id == 2)
        
                            @foreach($seasonfarmer as $season)
                            <tr class="tr">
                                <td>Season {{ $season->seasons_id }}</td>
                                <td>{{ $season->season_start }}</td>
                                <td>{{ $season->season_end }}</td>
                                <td>
                                    @php
                                        $seasonstatus = App\SeasonStatus::findOrFail($season->season_statuses_id);
                                    @endphp
                                    @if ($seasonstatus->id == 1)
                                        <h5><span class="badge badge-warning">{{ $seasonstatus->status }}</span></h5>
                                    @else
                                        <h5><span class="badge badge-success">{{ $seasonstatus->status }}</span></h5>
                                    @endif
                                </td>
                                <td>
                                    <a href="sales_reports/{{$season->seasons_id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                    <a href="/pdf/sales_report/{{$season->seasons_id}}" class="btn btn-md btn-secondary"><i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        @endif
                    </tbody>
                </table>
                <!-- End Form -->
                <hr>
                <!-- Legends -->
                <p>Legend</p>
                @if (auth()->user()->roles->id == 2)
                    <p><button type="button" class="btn btn-md btn-warning" disabled><i class="fas fa-eye fa-sm text-white"></i></button> View Button</p>
                    <p><button type="button" class="btn btn-md btn-secondary" disabled><i class="fas fa-download fa-sm text-white"></i></button> Download Button</p>
                @endif
            </div>
        </div>
    </div>
</div>


    
@endsection