@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Damage Reports</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Damage Reports</li>
    </ol>
</div>
<br>

<!-- Form -->
<form method="post" action="{{action('DamageReportsController@store')}}" enctype="multipart/form-data">
@csrf
<!-- Damage Report Datatable -->
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <div class="ibox">
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
                </div>

                <div class="row">
                    <!-- Region -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="region">Region:</label>
                            {{-- @foreach($calabarzon as $c)
                                <input readonly type="text" class="form-control" value="{{$c->name}}"/>
                            @endforeach --}}

                            <select class="form-control" name="region" id="region" readonly>
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

                            <select class="form-control" name="province" id="province" readonly>
                                @foreach ($laguna as $l)
                                    <option value="{{ $l['id']}}">{{ $l['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <!-- Narrative -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="narrative">Narrative:</label>
                            <textarea type="text" class="form-control" name="narrative" value=""></textarea>
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
                {{-- <div class="form-group">
                <label for="exampleFormControlInput1">Crop</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                </div>
                <div class="form-group">
                <label for="exampleFormControlSelect2">Example multiple select</label>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div> --}}

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Crop</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>                              
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Crop Stage</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>              
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Production</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>              
                        </div>
                    </div>

                    <hr>

                    {{-- <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Animal</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>              
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Animal Head</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>              
                        </div>
                    </div>
            
                    <hr>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Fish</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>              
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Area</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>              
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Fish Pieces</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>              
                        </div>
                    </div> --}}
                      
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>


    <!-- Submit Button -->
    <button type="submit" class="btn btn-success mb-4">Create</button>
    </form>


    

@endsection