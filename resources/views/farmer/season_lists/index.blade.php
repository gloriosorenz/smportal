@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Season List</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Season List</li>
    </ol>
</div>


<div class="page-content fade-in-up">

    @if (auth()->user()->roles_id == 2)

    {{-- @if ($farmer_latest_season != null)
    <div class="row">
        <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="ibox">
                <div class="ibox-head bg-warning text-white">
                    <div class="ibox-title">Ongoing Season: Season</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                <!-- Start Form -->
                <form method="post" action="{{action('SeasonListsController@update', $farmer_latest_season->id)}}">
                @method('PATCH')
                @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rice Farmer</th>
                                <th>Planned Hectares</th>
                                <th>Actual Hectares</th>
                                <th>Planned Number of Farmers</th>
                                <th>Actual Number of Farmers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $farmer_latest_season->users->company }}
                                </td>
                                <td><input type="number" class="form-control" value="{{$farmer_latest_season->planned_hectares}}" disabled/></td>
                                <td><input type="number" class="form-control" name="actual_hectares" value="{{ $farmer_latest_season->actual_hectares }}" step="0.1" min="1" max="{{ auth()->user()->hectares }}"/></td>
                                <td><input type="number" class="form-control" value="{{$farmer_latest_season->planned_num_farmers}}" disabled/></td>
                                <td><input type="number" class="form-control" name="actual_num_farmers" value="{{ $farmer_latest_season->actual_num_farmers }}" step="0.1" min="1" max="{{ auth()->user()->no_farmers }}"/></td>
                            </tr>
                        </tbody>
                    </table>

                        <!-- Buttons -->
                        <div class="form-group">
                            <a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
                            <button class="btn btn-md btn-success" type="submit">Update</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
    @endif --}}

    <div class="row">
        <!-- Seasons -->
        <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Season History</div>
                    <!-- Add Season Button -->
                    @if ($active == 0)
                        @if (auth()->user()->active)
                            @if ($latest_season->season_start > Carbon\Carbon::now()->subDays(14))
                                <div>
                                    <a class="btn btn-success btn-sm" href="{{ route('season_lists.create') }}">Plan Season</a>
                                </div>
                            @endif
                        @endif
                    @endif
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Season</th>
                                <th>Status</th>
                                <th class="text-center" width="20%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($season_lists as $list)
                            <tr>
                                <td>Season {{ $list->seasons->id }}</td>
                                <td>
                                    @if ($list->season_list_statuses_id == 1)
                                        <h5><span class="badge badge-warning badge-pill">{{ $list->season_list_statuses->status }}</span></h5>
                                    @else
                                        <h5><span class="badge badge-success badge-pill">{{ $list->season_list_statuses->status }}</span></h5>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (auth()->user()->active)
                                        {{-- @if ($list->season_list_statuses_id == 1)
                                            <a href="/season_lists/{{$list->id}}/edit" class="btn btn-md btn-success"><i class="fas fa-check fa-sm text-white"></i></a>
                                        @else --}}
                                            <a href="/season_lists/{{$list->id}}/edit" class="btn btn-md btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit fa-sm text-white"></i></a>
                                        {{-- @endif --}}
                                    @endif
                                    <a href="/season_lists/{{$list->id}}" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <!-- Legends -->
                    <p>Legend</p>
                    <p><button type="button" class="btn btn-md btn-warning" disabled><i class="fas fa-edit fa-sm text-white"></i></button> Edit Button</p>
                    <p><button type="button" class="btn btn-md btn-info" disabled><i class="fas fa-eye fa-sm text-white"></i></button> View Button</p>
                </div>
            </div>
        </div>
        <!-- END COLUMN-->
    </div>
    <!-- END ROW-->

    



    <!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->

    @elseif(auth()->user()->roles_id == 1)
        <div class="row">
            <!-- Seasons -->
            <div class="offset-md-2 col-md-8 offset-md-2">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Season List of Farmers</div>
                        {{-- <div>
                            <a class="btn btn-success btn-sm" href="{{ route('season_lists.create') }}">Plan Season</a>
                        </div> --}}
                    </div>
                    <div class="ibox-body">
                        <table class="table table-bordered table-hover" id="all_season_lists_table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center" width="35%">Farmer</th>
                                    <th class="text-center">Season</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" width="20%">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_season_lists as $list)
                                <tr>
                                    <td class="text-center">{{ $list->users->company }}</td>
                                    <td class="text-center">Season {{ $list->seasons->id }}</td>
                                    <td class="text-center">
                                        @if ($list->season_list_statuses_id == 1)
                                            <h5><span class="badge badge-warning badge-pill">{{ $list->season_list_statuses->status }}</span></h5>
                                        @else
                                            <h5><span class="badge badge-success badge-pill">{{ $list->season_list_statuses->status }}</span></h5>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{-- <a href="/season_lists/{{$list->id}}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a> --}}
                                        <a href="/season_lists/{{$list->id}}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <!-- Legends -->
                        <p>Legend</p>
                        <p><button type="button" class="btn btn-md btn-info" disabled><i class="fas fa-eye fa-sm text-white"></i></button> View Button</p>
                    </div>
                </div>
            </div>
            <!-- END COLUMN-->

            <!-- Projected Sales -->
            {{-- <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">P5,000.00</h2>
                        <div class="m-b-5">Projected Sales</div><i class="fas fa-money-bill widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                    </div>
                </div>
            </div> --}}
            <!-- END COLUMN-->
        </div>
        <!-- END ROW-->
    @endif

</div>
<!-- END PAGE CONTENT-->
@endsection

