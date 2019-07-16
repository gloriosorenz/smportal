<!DOCTYPE html>
<html>
    
<head>
    <title>Damage Report {{\Carbon\Carbon::now()->format('Y-m')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<body>
    <div class="wrapper">
        <div class="row text-center">
            <div class="col-lg-12">
                <h4><small>REPUBLIC OF THE PHILIPPINES</small> <br>
                    <strong>PHILIPPINE STATISTICS AUTHORITY</strong>
                </h4>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-lg-12">
            <p><i><small>Damage Assessment and Reporting Form 4 (DARF 4)<br>
            Form 4 - Damage Assessment Report for OTHER CROPS (for PSO & RSSO use)</small></i></p>
            </div>
        </div>
        <br>

        <div class="row text-center">
            <h3><strong>PRE-CALAMITY ASSESSMENT REPORT ON WOULD-BE EFFECTS TO AGRICULTURE & FISHERIES </strong></h3>
            <h4>Type of Calamity: {{$dreport->calamity}}</h4>
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
                <p><strong>A. Geographoc Information</strong></p>
                <p>1. Region: {{$dreport->regions->name}}</p>
                <p>2. Province: {{$dreport->provinces->name}}</p>
            </div>

            <div class="col-md-6 text-right">
                <p><strong>A. Geographoc Information</strong></p>
                <p>1. Region: {{$dreport->regions->name}}</p>
                <p>2. Province: {{$dreport->provinces->name}}</p>
            </div>
        </div>
        <hr>
        <p><strong>C. Particulars:</strong></p>


        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <th width="10">ID</th>
                        <th width="11.25">Crop</th>
                        <th width="11.25">Stages of <br>Development (ha)</th>
                        <th width="11.25">Rejected Production <br>(in Metric Ton)</th>
                        <th width="11.25">Animal Type</th>
                        <th width="11.25">Head/Birds</th>
                        <th width="11.25">Fish</th>
                        <th width="11.25">Area</th>
                        <th width="11.25">Fish Pieces</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $dreport->id }}</td>
                            <td>{{ $dreport->crop }}</td>
                            <td>{{ $dreport->rice_crop_stages->stage }}</td>
                            <td>{{ $dreport->crop }}</td>
                            <td>{{ $dreport->crop }}</td>
                            <td>{{ $dreport->crop }}</td>
                            <td>{{ $dreport->crop }}</td>
                            <td>{{ $dreport->crop }}</td>
                            <td>{{ $dreport->crop }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End col-lg-12 -->
        </div>
        <!-- End row -->


        <div class="row">
            <div class="col-lg-12">
            <p><i><small>NOTE: Report other major priority commodities in the area.<br></small></i></p>
            <p class="text-danger"><i><small>Indicate number of pieces for fry/fingerling; and kilogram for juvenile and harvestable size</small></i></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <p><strong>D. Collector's Information</strong></p>
                <p>Prepared By: </p>
                <p>Date: {{\Carbon\Carbon::now()->format('m-d-Y')}}</p>
            </div>
            <div class="col-lg-6 ">
                <p>Reviewed By:</p>
                <p>Date: </p>
            </div>
        </div>
    </div>
    <!-- End wrapper -->
</body>
</html>