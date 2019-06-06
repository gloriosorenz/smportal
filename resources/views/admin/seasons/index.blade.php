@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Seasons</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Seasons</li>
    </ol>
</div>


<div class="page-content fade-in-up">

    <!-- Create Season -->
    <div class="row">
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create New Season</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <!-- Start Form -->
                    <form method="post" action="{{action('SeasonsController@store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group" id="date_1">
                            <label class="font-normal">Start Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                <input class="form-control" type="text" name="season_start" value="{{\Carbon\Carbon::today()->toDateString() }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Submit</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <!-- Seasons -->
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Seasons Data Table</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Season</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seasons as $season)
                            <tr>
                                <td>Season {{ $season->id }}</td>
                                <td>{{ $season->season_start }}</td>
                                <td>{{ $season->season_end }}</td>
                                <td>
                                    @if ($season->season_statuses_id == 1)
                                        <span class="badge badge-warning badge-pill">{{ $season->season_statuses->status }}</span>
                                    @else
                                        <span class="badge badge-success badge-pill">{{ $season->season_statuses->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="#" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                    <a href="#" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
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
                    <div class="ibox-title">Farmers for (Season {{ $season->id }})</div>
                </div>
                <div class="ibox-body">
                      <ul class="media-list media-list-divider m-0">
                        @foreach($season_lists as $list)
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="img/admin-avatar.png" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    {{ $list->users->first_name }}  {{ $list->users->last_name }}
                                    @if ($list->season_list_statuses->id == 2)
                                        <span class="float-right badge badge-success badge-pill">{{$list->season_list_statuses->status }}</span>
                                    @else
                                        <span class="float-right badge badge-warning badge-pill">{{$list->season_list_statuses->status }}</span>
                                    @endif
                                </div>
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
<!-- END PAGE CONTENT-->
@endsection

