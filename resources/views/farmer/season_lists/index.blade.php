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
    <div class="row">
        <!-- Seasons -->
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Seasons Data Table</div>
                    <!-- Add Season Button -->
                    @if ($active == 0)
                    <div>
                        <a class="btn btn-success btn-sm" href="{{ route('season_lists.create') }}">Plan Season</a>
                    </div>
                    @endif
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Season</th>
                                <th>Status</th>
                                <th width="20%">Options</th>
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
                                <td>
                                    <a href="/season_lists/{{$list->id}}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="/season_lists/{{$list->id}}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                    <a href="#" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END COLUMN-->

        <!-- Projected Sales -->
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">P5,000.00</h2>
                    <div class="m-b-5">Projected Sales</div><i class="fas fa-money-bill widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
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
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Seasons Data Table</div>
                        <div>
                            <a class="btn btn-success btn-sm" href="{{ route('season_lists.create') }}">Plan Season</a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="all_season_lists_table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Farmer</th>
                                    <th class="text-center">Season</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" width="20%">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_season_lists as $list)
                                <tr>
                                    <td class="text-center">{{ $list->users->first_name }} {{ $list->users->last_name }}</td>
                                    <td class="text-center">Season {{ $list->seasons->id }}</td>
                                    <td class="text-center">
                                        @if ($list->season_list_statuses_id == 1)
                                            <h5><span class="badge badge-warning badge-pill">{{ $list->season_list_statuses->status }}</span></h5>
                                        @else
                                            <h5><span class="badge badge-success badge-pill">{{ $list->season_list_statuses->status }}</span></h5>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="/season_lists/{{$list->id}}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                        <a href="/season_lists/{{$list->id}}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                        <a href="#" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END COLUMN-->

            <!-- Projected Sales -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">P5,000.00</h2>
                        <div class="m-b-5">Projected Sales</div><i class="fas fa-money-bill widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                    </div>
                </div>
            </div>
            <!-- END COLUMN-->
        </div>
        <!-- END ROW-->
    @endif

</div>
<!-- END PAGE CONTENT-->
@endsection

