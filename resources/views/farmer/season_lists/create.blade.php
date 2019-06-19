@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Plan Season</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Season List</li>
        <li class="breadcrumb-item">Create</li>
    </ol>
</div>

<div class="page-content fade-in-up">

    <div class="row">
        <!-- Input farmer's hectares and no. of farmers -->
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Plan</div>
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
                    <form method="post" action="{{action('SeasonListsController@store')}}" enctype="multipart/form-data">
                    @csrf

                    <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
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
                                    <input class="form-control" type="number" placeholder="{{ auth()->user()->hectares }}" name="planned_hectares[]" step="0.1" min="1" max="{{ auth()->user()->hectares }}">
                                </td>
                                <td>
                                    <input class="form-control" type="number" placeholder="{{ auth()->user()->no_farmers }}" name="planned_num_farmers[]" step="1" min="1" max="{{ auth()->user()->no_farmers }}">
                                </td>
                                <td>
                                    <input class="form-control" type="number" placeholder="Enter Quantity" name="planned_qty[]" step="1" min="1">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                    <!-- End Form-->
                </div>
            </div>
        </div>

        <!-- Farmer's info (hectares and no. farmers) -->
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Farmer Info</div>
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
                    <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Hectares</th>
                                <th>Number of Farmers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ auth()->user()->hectares }}</td>
                                <td>{{ auth()->user()->no_farmers }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Season History -->
    <div class="row">
        <!-- Seasons -->
        <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">History</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Season</th>
                                    <th>Hectares</th>
                                    <th>No. of Farmers</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($season_lists as $list)
                                <tr>
                                    <td>Season {{ $list->seasons->id }}</td>
                                    <td>
                                        {{ $list->planned_hectares }}
                                    </td>
                                    <td>
                                        {{ $list->planned_num_farmers }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>

</div>
<!-- End Page Content-->

@endsection

