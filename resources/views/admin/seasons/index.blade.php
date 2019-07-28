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

    <div class="row">
        <!-- Season History -->
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Season History</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Season</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                                {{-- <th>Status</th> --}}
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($complete as $season)
                            <tr>
                                <td>Season {{ $season->id }}</td>
                                <td>
                                    @if ($season->season_types->id == 1)
                                    <i class="fas fa-cloud-rain fa-md"></i>
                                    @elseif ($season->season_types->id == 2)
                                    <i class="fas fa-sun fa-md"></i>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($season->season_start)->format('F j, Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($season->season_end)->format('F j, Y')}}</td>
                                {{-- <td>
                                    @if ($season->season_statuses_id == 1)
                                        <span class="badge badge-warning badge-pill">{{ $season->season_statuses->status }}</span>
                                    @else
                                        <span class="badge badge-success badge-pill">{{ $season->season_statuses->status }}</span>
                                    @endif
                                </td> --}}
                                <td class="text-center">
                                    {{-- @if ($season->season_statuses_id == 1)
                                    <a href="/seasons/{{$season->id}}/edit" class="btn btn-md btn-success"><i class="fas fa-check fa-sm text-white"></i></a>
                                    @elseif ($season->season_statuses_id == 2)
                                    <a href="/seasons/{{$season->id}}/edit" class="btn btn-md btn-warning"><i class="fas fa-edit fa-sm text-white"></i></a>
                                    @endif --}}

                                    <a href="/seasons/{{$season->id}}" class="btn btn-md btn-info"><i class="fas fa-eye fa-sm text-white"></i></a>
                                    <a href="pdf/season_report/{{$season->id}}" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            {{-- <p class="font-bold">Season Type Guide</p> --}}
                            <p><strong><i class="fas fa-cloud-rain fa-md"></i> :</strong> Dry Season = March 16 -> Sept. 15 (March, April, May, June, July, August, September) </p>
                            <p><strong><i class="fas fa-sun fa-md"></i> :</strong>  Wet Season = Sept. 16 -> March 15 (September, October, November, December, January, February, March)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ongoing Season -->
        <div class="col-md-4">
            @if ($latest_season->season_statuses_id == 1)
                {{-- <div class="ibox">
                    <div class="ibox-head bg-warning text-white">
                        <div class="ibox-title">Ongoing Season: Season {{$ongoing_season->id}}</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <!-- Start Form -->
                        <form method="post" action="{{action('SeasonsController@update', $latest_season->id)}}">
                        @method('PATCH')
                        @csrf
                        

                            <div class="form-group" id="date_1">
                                <label class="font-normal">Start Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                    <input class="form-control" type="text" name="season_start" value="{{ $latest_season->season_start }}">
                                </div>
                            </div>
                            <div class="form-group" id="date_1">
                                <label class="font-normal">End Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                    <input class="form-control" type="text" name="season_end" value="{{ \Carbon\Carbon::now()->format('Y-m-d')  }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit">Complete Season</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div> --}}
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h4 class="card-title">Ongoing Season: {{$ongoing_season->id}}</h4>
                        {{-- <div class="card-subtitle">subtitle</div>
                        <p class="card-text">Season Start: {{ $season->season_start }}</p>
                        <p class="card-text">Season End: {{ $season->season_end }}</p> --}}
                        {{-- <p class="card-text">Status: {{ $season->season_statuses->status }}</p> --}}
                    </div>
                </div><br>
            @endif

            <!-- Create Season -->
            @if (count($seasons) == count($complete))
                <div class="ibox">
                    <div class="ibox-head bg-primary text-white">
                        <div class="ibox-title">Create New Season</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus text-white"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <!-- Start Form -->
                        <form method="post" action="{{action('SeasonsController@store')}}" enctype="multipart/form-data">
                        {{-- <p> Dry Season = March 16 -> Sept. 15 (March, April, May, June, July, August, September) </p>
                        <p> Wet Season = Sept. 16 -> March 15 (September, October, November, December, January, February, March) </p> --}}
                        @csrf
                            <div class="form-group" id="date_1">
                                <label class="font-normal">Start Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                    <input class="form-control" type="text" name="season_start" value="{{\Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit">Submit</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            @endif


            <!-- Active Farmers -->
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmers for this Season</div>
                </div>
                <div class="ibox-body">
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
                                        <div class="font-13">{{ $list->users->company }}</div>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>



            
        </div>
    </div>

</div>
<!-- END PAGE CONTENT-->
@endsection

