@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Season {{ $season->id }}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Seasons<i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Show</li>
    </ol>
</div>


<div class="page-content fade-in-up">

    <div class="row">
        <!-- If Season is ongoing -->
        @if ($season->season_statuses_id == 1)
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h4 class="card-title">Season {{ $season->id }}</h4>
                    {{-- <div class="card-subtitle">subtitle</div>
                    <p class="card-text">Season Start: {{ $season->season_start }}</p>
                    <p class="card-text">Season End: {{ $season->season_end }}</p> --}}
                    <p class="card-text">Status: {{ $season->season_statuses->status }}</p>
                </div>
            </div><br>
        </div>
        <!-- If Season is done -->
        @elseif ($season->season_statuses_id == 2)
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h4 class="card-title">Season {{ $season->id }} </h4>
                    {{-- <div class="card-subtitle">subtitle</div>
                    <p class="card-text">Season Start: {{ $season->season_start }}</p>
                    <p class="card-text">Season End: {{ $season->season_end }}</p> --}}
                    <p class="card-text">Staus: {{ $season->season_statuses->status }}</p>
                </div>
            </div><br>
        </div>
        @endif
    </div>

    <div class="row">
    
        <!-- Seasons -->
        <div class="col-md-8">
            {{-- Harvest Report --}}
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Rice Product/Harvest Report</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Barangay</th>
                                <th>Planned Hecatares</th>
                                <th>Planned Number of Farmers</th>
                                <th>Planned Quantity</th>
                                <th>Actual Hectares</th>
                                <th>Actual Number of Farmers</th>
                                <th>Actual Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $data)
                            <tr>
                                @php
                                    $barangay = App\Barangay::findOrFail($data->barangays_id);
                                @endphp
                                <td>{{$barangay->name}}</td>
                                <td>{{$data->planned_hectares}}</td>
                                <td>{{$data->planned_num_farmers}}</td>
                                <td>{{$data->planned_qty}}</td>
                                <td>{{$data->actual_hectares}}</td>
                                <td>{{$data->actual_num_farmers}}</td>
                                <td>{{$data->actual_qty}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- Active Farmers -->
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmers for Season {{ $season->id }}</div>
                </div>
                <div class="ibox-body">
                    <div class="scroller" data-height="300px">
                        <ul class="media-list media-list-divider m-0">
                            @foreach($season_lists as $list)
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="/img/admin-avatar.png" width="40" />
                                </a>
                                <div class="media-body">
                                    <a href="/season_lists/{{$list->id}}" style="color:dimgray">
                                        <div class="media-heading">
                                            {{ $list->users->first_name }}  {{ $list->users->last_name }}
                                            @if ($list->season_list_statuses->id == 2)
                                                <span class="float-right badge badge-success badge-pill">{{$list->season_list_statuses->status }}</span>
                                            @else
                                                <span class="float-right badge badge-warning badge-pill">{{$list->season_list_statuses->status }}</span>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="font-13">{{ $list->users->company }}</div>
                                </div>
                            </li>
                            @endforeach
                            {{-- {{ $farmers->links() }} --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection

