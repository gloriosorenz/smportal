@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Damage Reports</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Damage Report</li>
    </ol>
</div>
<br>


<!-- Damage Report Datatable -->
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <div class="ibox">
        <!-- Form -->
            <div class="ibox-head">
                <div class="ibox-title">Damage Reports</div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="calamity">Calamity:</label>
                            <input class="form-control" type="text" value="{{$dreport->calamities->type}}" readonly/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" id="date_1">
                            <label for="calamity">Calamity Start:</label>
                            <div class="input-group date">
                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="text" value="{{$dreport->calamity_start}}" name="calamity_start" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" id="date_1">
                            <label for="calamity">Calamity End:</label>
                            <div class="input-group date">
                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="text" value="{{$dreport->calamity_end}}" name="calamity_end" readonly/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Region -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="region">Region:</label>
                            <input class="form-control" type="text" value="{{$dreport->regions->name}}" readonly/>
                        </div>
                    </div>

                    <!-- Province -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="province">Province:</label>
                            {{-- @foreach($laguna as $l)
                                <input readonly type="text" class="form-control"  value="{{$l->name}}"/>
                            @endforeach --}}
                            <input class="form-control" type="text" value="{{$dreport->provinces->name}}" readonly/>
                        </div>
                    </div>
                </div>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>


<!-- Damage Report Datatable -->
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Damage Data</div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->

                <div class="row">
                    <!-- Crop -->
                    <div class="col-sm-4 form-group">
                        <div class="form-group">
                            <label class="form-control-label">Crop</label>
                            <input class="form-control" type="text" name="crop" value="Rice" readonly/>
                        </div>
                    </div>

                    <!-- Number of farmers affected -->
                    <div class="col-sm-4 form-group">
                        <label>Number of farmers affected:</label>
                        <input class="form-control" type="number" value="{{$dreport->num_farmers}}" name="num_farmers" step="1" min="1" max="{{ auth()->user()->no_farmers }}" readonly/>
                    </div>
                </div>
                

                <div class="row">
                    <!-- Area of standing crop-->
                    <div class="col-sm-4 form-group">
                        <label>Area of standing crop:</label>
                        <input class="form-control" type="number" value="{{$dreport->standing_crop_area}}" name="standing_crop_area" step="1" min="1" readonly/>
                    </div>

                    <!-- Stage of crop development-->
                    <div class="col-sm-4 form-group">
                        <div class="form-group">
                            <label class="form-control-label">Stage crop development:</label>
                            <input class="form-control" type="text" value="{{$dreport->rice_crop_stages->stage}}" readonly/>
                        </div>
                    </div>

                    <!-- Month to be harvested -->
                    <div class="col-sm-4 form-group">
                        <div class="form-group">
                            <label class="form-control-label">Month to be harvested:</label>
                            <input class="form-control" type="text" name="crop" value="{{$dreport->harvest_month}}" readonly/>
                        </div>
                    </div>
                </div>

                <hr>

                <br>
                <h5><strong>Area Affected (HA)</strong></h5>
                <br>

                <div class="row">
                    <!-- Total area -->
                    <div class="col-sm-4 form-group">
                        <label>Total area:</label>
                        <input class="form-control" type="number" value="{{$dreport->total_area}}" name="total_area" step="1" min="1" readonly/>
                    </div>

                    <!-- Totally damaged area -->
                    <div class="col-sm-4 form-group">
                        <label>Totally damaged:</label>
                        <input class="form-control" type="number" value="{{$dreport->totally_damaged_area}}" name="totally_damaged_area" step="1" min="1" readonly/>
                    </div>

                    <!-- Partially damaged area -->
                    <div class="col-sm-4 form-group">
                        <label>Partially damaged:</label>
                        <input class="form-control" type="number" value="{{$dreport->partially_damaged_area}}" name="partially_damaged_area" step="1" min="1" readonly/>
                    </div>
                </div>
                

                <br>
                <h5><strong>Yield per hectare</strong></h5>
                <br>

                <div class="row">
                    <!-- Before calamity -->
                    <div class="col-sm-4 form-group">
                        <label>Before calamity:</label>
                        <input class="form-control" type="number" value="{{$dreport->yield_before}}"  name="yield_before" step="1" min="1" readonly/>
                    </div>

                    <!-- After calamity-->
                    <div class="col-sm-4 form-group">
                        <label>Yield after:</label>
                        <input class="form-control" type="number" value="{{$dreport->yield_after}}"  name="yield_after" step="1" min="1" readonly/>
                    </div>

                    <!-- Yield loss -->
                    <div class="col-sm-4 form-group">
                        <label>Yield loss:</label>
                        <input class="form-control" type="number" value="{{$dreport->yield_loss}}"  name="yield_loss" step="1" min="1" readonly/>
                    </div>
                </div>

                <br>
                <hr>
                <br>

                <div class="row">
                    <!-- Volume -->
                    <div class="col-sm-4 form-group">
                        <label>Volume:</label>
                        <input class="form-control" type="number" value="{{$dreport->volume}}"  name="volume" step="1" min="1" readonly/>
                    </div>

                    <!-- Grand total-->
                    <div class="col-sm-4 form-group">
                        <label>Grand total:</label>
                        <input class="form-control" type="number" value="{{$dreport->grand_total}}"  name="grand_total" step="1" min="1" readonly/>
                    </div>
                </div>


                <br>
                <hr>
                <br>

                <div class="row">
                    <!-- Remarks -->
                    <div class="col-sm-12 form-group">
                        <label>Remarks:</label>
                        <textarea class="form-control" type="text" name="remarks" rows="8" value="{{$dreport->remarks}}" readonly>{{$dreport->remarks}}</textarea>
                    </div>
                </div>
                <!-- End Form -->
            </div>
            
        </div>
    </div>

    
</div>


    


    

@endsection