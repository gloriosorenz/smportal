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
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Update Season</div>
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
                    <form method="post" action="{{action('SeasonsController@update', $season->id)}}">
                    @method('PATCH')
                    @csrf
                        <div class="form-group" id="date_1">
                            <label class="font-normal">Start Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                <input class="form-control" type="text" name="season_start" value="{{ $season->season_start }}">
                            </div>
                        </div>
                        <div class="form-group" id="date_1">
                            <label class="font-normal">End Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                <input class="form-control" type="text" name="season_end" value="{{ $season->season_end }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>

</div>
@endsection