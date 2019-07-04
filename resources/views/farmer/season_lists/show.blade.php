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
        <div class="offset-lg-3 col-md-6 offset-lg-3">
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
                    <table class="table table-bordered text-center" cellspacing="0" width="100%">
                        <thead class="thead-default">
                            <tr>
                                <th width="15%">Rice Farmer</th>
                                <th>Planned Hectares</th>
                                <th>Planned Number of Farmers</th>
                                <th>Planned Quantity</th>
                                <th>Actual Hectares</th>
                                <th>Actual Number of Farmers</th>
                                <th>Actual Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>{{ $season_list->users->company }}</p>
                                </td>
                                <td>
                                    <p>{{$season_list->planned_hectares}}</p>
                                </td>
                                <td>
                                    <p>{{$season_list->planned_num_farmers}}</p>
                                </td>
                                <td>
                                    <p>{{$season_list->planned_qty}}</p>
                                </td>
                                <td>
                                    <p>{{$season_list->actual_hectares}}</p>
                                </td>
                                <td>
                                    <p>{{$season_list->actual_num_farmers}}</p>
                                </td>
                                <td>
                                    <p>{{$season_list->actual_qty}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Back Button -->
                    <div class="form-group">
                        <a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Page Content-->

@endsection

