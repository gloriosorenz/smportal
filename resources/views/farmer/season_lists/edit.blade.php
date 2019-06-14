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
                    {{-- <table class="table table-bordered" cellspacing="0" width="100%">
                        <thead class="thead-default">
                            <tr>
                                <th>Rice Farmer</th>
                                <th>Planned Hectares</th>
                                <th>Planned Number of Farmers</th>
                                <th>Planned Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                                <td>
                                    <input class="form-control" type="number" placeholder="{{ auth()->user()->hectares }}" name="planned_hectares[]" step="0.1" min="1" max="{{ auth()->user()->hectares }}" value="{{ $season_list->planned_hectares }}">
                                </td>
                                <td>
                                    <input class="form-control" type="number" placeholder="{{ auth()->user()->no_farmers }}" name="planned_num_farmers[]" step="1" min="1" max="{{ auth()->user()->no_farmers }}" value="{{ $season_list->planned_num_farmers }}">
                                </td>
                                <td>
                                    <input class="form-control" type="number" placeholder="Enter Quantity" name="planned_qty[]" value="{{ $season_list->planned_qty }}">
                                </td>
                            </tr>
                        </tbody>
                    </table> --}}


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

                        <!-- Update Button -->
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
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

