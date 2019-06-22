@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Plant Reports</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Plant Reports</li>
    </ol>
</div>
<br>


<!-- Plant Report Datatable -->
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Plant Reports</div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->
                <form method="post" action="{{action('PlantReportsController@store')}}" enctype="multipart/form-data">
                @csrf

                    <!-- Admin Functionality -->
                    @if (auth()->user()->roles_id == 1)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rice Farmer</th>
                                <th>Plant Area</th>
                                <th>Number of Farmers</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="resultbody1">
                            <tr>
                                <td>
                                    <select class="form-control" name="users_id[]" id="users_id">
                                        <option value="0" selected="true" disabled="True">Select Farmer</option>
                                            @foreach ($users as $key=>$p)
                                                <option value="{{$key}}">{{$p}}</option>
                                            @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="plant_area[]" value="" /></td>
                                <td><input type="text" class="form-control" name="farmers[]" value="" /></td>
                                <td><input type="button" class="btn btn-danger remove" value="x"></td>
                            </tr>
                        </tbody>
                    </table>
                    <center><input type="button" class="btn btn-lg btn-warning addRow" value="+"></center>


                    <!-- Farmer Functionality -->
                    @elseif(auth()->user()->roles_id == 2)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Barangay</th>
                                <th>Plant Area</th>
                                <th>Number of Farmers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input name="users_id[]" type="hidden" value="{{auth()->user()->id}}">
                                    {{auth()->user()->barangays->name}}
                                </td>
                                <td><input type="text" class="form-control" name="plant_area[]" value=""/></td>
                                <td><input type="text" class="form-control" name="farmers[]" value="" /></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success mb-4">Create</button>
                </form>
            
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>

@endsection