@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Season {{$season_list->seasons->id}}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Season List</li>
        <li class="breadcrumb-item">Show</li>
    </ol>
</div>

<div class="page-content fade-in-up">

    <div class="row">
        <!-- Input farmer's hectares and no. of farmers -->
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmer Season {{$season_list->seasons->id}}</div>
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
                    <form method="post" action="{{action('SeasonListsController@update', $season_list->id)}}">
                    @method('PATCH')
                    @csrf


                    {{-- <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                    </div> --}}
                    
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
                                    {{ $season_list->users->company }}
                                </td>
                                <td><input type="number" class="form-control" value="{{$season_list->planned_hectares}}" disabled/></td>
                                <td><input type="number" class="form-control" name="actual_hectares" value="{{ $season_list->actual_hectares }}" step="0.1" min="1" max="{{ auth()->user()->hectares }}"/></td>
                                <td><input type="number" class="form-control" value="{{$season_list->planned_num_farmers}}" disabled/></td>
                                <td><input type="number" class="form-control" name="actual_num_farmers" value="{{ $season_list->actual_num_farmers }}" step="0.1" min="1" max="{{ auth()->user()->no_farmers }}"/></td>
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

</div>
<!-- End Page Content-->

@endsection

