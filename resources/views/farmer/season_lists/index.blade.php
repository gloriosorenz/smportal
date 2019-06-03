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

    <div class="row">
        <!-- Seasons -->
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Seasons Data Table</div>
                    <!-- Add Season Button -->
                    <div>
                        <a class="btn btn-success btn-sm" href="{{ route('season_lists.create') }}">Plan Season</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Season</th>
                                <th>Status</th>
                                <th>Options</th>
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
        <!-- END COLUMN-->
    </div>
    <!-- END ROW-->

</div>
<!-- END PAGE CONTENT-->
@endsection

