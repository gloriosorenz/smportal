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
            <h3><strong>DAMAGE ASSESSMENT REPORT FOR OTHER CROPS</strong></h3>
            <small>Cause of Damage: {{$dreport->calamities->type}}</small><br>
            <small>Date of Occurrence: {{\Carbon\Carbon::parse($dreport->calamity_start)->format('F j, Y')}}</small><br>
            <small>End of Calamity: {{\Carbon\Carbon::parse($dreport->calamity_end)->format('F j, Y')}}</small><br>
            <small>Report as of: {{\Carbon\Carbon::now()->format('F j, Y')}}</small><br>
            <small>Type: {{$dreport->report_statuses->status}}</small><br>
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
                <p><strong>A. Geographoc Information</strong></p>
                <p>1. Region: {{$dreport->regions->name}}</p>
                <p>2. Province: {{$dreport->provinces->name}}</p>
            </div>

            {{-- <div class="col-md-6 text-right">
                <p><strong>A. Geographoc Information</strong></p>
                <p>1. Region: {{$dreport->regions->name}}</p>
                <p>2. Province: {{$dreport->provinces->name}}</p>
            </div> --}}
        </div>
        <hr>
        <p><strong>C. Particulars:</strong></p>


        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center" width="10">ID</th>
                        <th class="text-center"  width="11.25">Name of Crop</th>
                        <th class="text-center"  width="11.25">Number of Farmers Affected</th>
                        <th class="text-center"  width="11.25">Area of Standing Crop (HA)</th>
                        <th class="text-center"  width="11.25">Stage of Crop Development</th>
                        <th class="text-center"  width="11.25">Month to be Harvested</th>
                        <th class="text-center"  width="11.25">Total Area Affected (HA)</th>
                        <th class="text-center"  width="11.25">Totally Damaged (HA)</th>
                        <th class="text-center"  width="11.25">Partially Damaged (HA)</th>
                        <th class="text-center"  width="11.25">Yield Before Calamity (Kbn)</th>
                        <th class="text-center"  width="11.25">Yield After Calamity (Kbn)</th>
                        <th class="text-center"  width="11.25">Yield Loss</th>
                        <th class="text-center"  width="11.25">Volume (Kbn)</th>
                        <th class="text-center"  width="11.25">Grand Total</th>
                        <th class="text-center"  width="11.25">Remarks</th>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>{{ $dreport->id }}</td>
                            <td>{{ $dreport->crop }}</td>
                            <td>{{ $dreport->num_farmers }}</td>
                            <td>{{ $dreport->standing_crop_area }}</td>
                            <td>{{ $dreport->rice_crop_stages->stage }}</td>
                            <td>{{ $dreport->harvest_month }}</td>
                            <td>{{ $dreport->total_area }}</td>
                            <td>{{ $dreport->totally_damaged_area }}</td>
                            <td>{{ $dreport->partially_damaged_area }}</td>
                            <td>{{ $dreport->yield_before }}</td>
                            <td>{{ $dreport->yield_after }}</td>
                            <td>{{ $dreport->yield_loss }}</td>
                            <td>{{ $dreport->volume }}</td>
                            <td>{{ $dreport->grand_total }}</td>
                            <td>{{ $dreport->remarks }}</td>
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
                <p>Prepared By: {{$dreport->users->first_name}} {{$dreport->users->last_name}}</p>
                <p>Date: {{$dreport->initial_report_date}}</p>
            </div>
            <div class="col-lg-6 ">
                <p>Reviewed By: {{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
                <p>Date: {{$dreport->final_report_date}}</p>
            </div>
        </div>
    </div>
    <!-- End wrapper -->
</body>
</html>