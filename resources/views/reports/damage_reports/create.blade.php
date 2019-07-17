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
        <form method="post" action="{{action('DamageReportsController@store')}}" enctype="multipart/form-data">
        @csrf
            <div class="ibox-head">
                <div class="ibox-title">Damage Reports</div>
            </div>
            <div class="ibox-body">
                <!-- Start Form -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="calamity">Calamity:</label>
                            <select class="form-control" name="calamity" id="calamity">
                                <option value="0" selected="true" disabled="True">Select Calamity</option>
                                @foreach ($calamities as $calamity)
                                    <option value="{{ $calamity['id']}}">{{ $calamity['type']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" id="date_1">
                            <label for="calamity">Calamity Start:</label>
                            <div class="input-group date">
                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="text" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="calamity_start">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" id="date_1">
                            <label for="calamity">Calamity End:</label>
                            <div class="input-group date">
                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="text" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="calamity_end">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Region -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="region">Region:</label>
                            <select class="form-control" name="regions_id"  readonly>
                                @foreach ($calabarzon as $c)
                                    <option value="{{ $c['id']}}">{{ $c['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Province -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="province">Province:</label>
                            {{-- @foreach($laguna as $l)
                                <input readonly type="text" class="form-control"  value="{{$l->name}}"/>
                            @endforeach --}}

                            <select class="form-control" name="provinces_id" readonly>
                                @foreach ($laguna as $l)
                                    <option value="{{ $l['id']}}">{{ $l['name']}}</option>
                                @endforeach
                            </select>
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
                            <select class="form-control" name="crop">
                                <option selected>Select Crop</option>
                                <option value="Good Rice">Good rice</option>
                                <option value="Withered Rice">Withered rice</option>
                            </select>
                        </div>
                    </div>

                    <!-- Number of farmers affected -->
                    <div class="col-sm-4 form-group">
                        <label>Number of farmers affected:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="num_farmers" step="1" min="1" max="{{ auth()->user()->no_farmers }}">
                    </div>
                </div>
                

                <div class="row">
                    <!-- Area of standing crop-->
                    <div class="col-sm-4 form-group">
                        <label>Area of standing crop:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="standing_crop_area" step="1" min="1">
                    </div>

                    <!-- Stage of crop development-->
                    <div class="col-sm-4 form-group">
                        <div class="form-group">
                            <label class="form-control-label">Stage crop development:</label>
                            <select class="form-control" name="rice_crop_stages_id">
                                <option value="0" selected="true" disabled="True">Select Calamity</option>
                                @foreach ($rice_crop_stage as $stage)
                                    <option value="{{ $stage['id']}}">{{ $stage['stage']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Month to be harvested -->
                    <div class="col-sm-4 form-group">
                        <div class="form-group">
                            <label class="form-control-label">Month to be harvested:</label>
                            <select class="form-control" name="harvest_month">
                                <option selected>Select Month</option>
                                <option value="January">January</option>
                                <option value="February">Ferbruary</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">Octover</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
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
                        <input class="form-control" type="number" placeholder="Enter number" name="total_area" step="1" min="1">
                    </div>

                    <!-- Totally damaged area -->
                    <div class="col-sm-4 form-group">
                        <label>Totally damaged:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="totally_damaged_area" step="1" min="1">
                    </div>

                    <!-- Partially damaged area -->
                    <div class="col-sm-4 form-group">
                        <label>Partially damaged:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="partially_damaged_area" step="1" min="1">
                    </div>
                </div>
                

                <br>
                <h5><strong>Yield per hectare</strong></h5>
                <br>

                <div class="row">
                    <!-- Before calamity -->
                    <div class="col-sm-4 form-group">
                        <label>Before calamity:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="yield_before" step="1" min="1">
                    </div>

                    <!-- After calamity-->
                    <div class="col-sm-4 form-group">
                        <label>Yield after:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="yield_after" step="1" min="1">
                    </div>

                    <!-- Yield loss -->
                    <div class="col-sm-4 form-group">
                        <label>Yield loss:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="yield_loss" step="1" min="1">
                    </div>
                </div>

                <br>
                <hr>
                <br>

                <div class="row">
                    <!-- Volume -->
                    <div class="col-sm-4 form-group">
                        <label>Volume:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="volume" step="1" min="1">
                    </div>

                    <!-- Grand total-->
                    <div class="col-sm-4 form-group">
                        <label>Grand total:</label>
                        <input class="form-control" type="number" placeholder="Enter number" name="grand_total" step="1" min="1">
                    </div>
                </div>


                <br>
                <hr>
                <br>

                <div class="row">
                    <!-- Remarks -->
                    <div class="col-sm-12 form-group">
                        <label>Remarks:</label>
                        <textarea class="form-control" type="text" name="remarks" rows="8" placeholder="Enter text"></textarea>
                    </div>
                </div>



                <!-- Submit Button -->
                <button type="submit" class="btn btn-success mb-4">Create</button>
                </form>
                      
                <!-- End Form -->
            </div>
            
        </div>
    </div>

    
</div>


    


    

@endsection