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
        <li class="breadcrumb-item">Show</li>
    </ol>
</div>
<br>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
<br>


<div class="container">
    <div class="wrapper">
        
        <div class="row text-center">
            <div class="col-lg-12">
                <h5><small>CITY COOPERATIVE DEVELOPMENT OFFICE</small> <br>
                    <strong>SAMAHAN NG MAGSASAKA STA. ROSA LAGUNA</strong>
                </h5>
            </div>
        </div>

        <br>
        <div class="row text-center">
            <div class="col-lg-12">
                <h3><strong>PLANT REPORT</strong></h3>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <strong>
                <p>City of Sta. Rosa</p>
                {{-- <p>Cropping Season: {{$season->season_types->type}}</p> --}}
                <p>For the month of {{$preport->created_at->format('M-Y')}}</p>
                {{-- <p>Season End: {{$season->season_end}}</p> --}}
                </strong>
            </div>
        </div>
    
    
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped mb-5">
                    <thead>
                        <th width="11.25">Barangay</th>
                        <th width="11.25">Plant Area</th>
                        <th width="11.25">Farmers</th>
                    </thead>
                    <tbody>
                        @foreach ($pdatas as $d)
                        <tr>
                            @php
                                $barangay = App\Barangay::findOrFail($d->barangays_id);
                            @endphp

                            <td>{{ $barangay->name }}</td>
                            <td>{{ $d->plant_area }}</td>
                            <td>{{ $d->farmers }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End col-lg-12 -->
        </div>
        <!-- End row -->
    </div>
    <!-- End wrapper -->
</div>
@endsection