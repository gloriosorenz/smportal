<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DamageReport;
use App\DamageData;
use App\Region;
use App\Province;
use App\Calamity;
use App\User;
use App\RiceCropStage;

use PDF;
use DB;

use App\Notifications\DamageReportCreated;
use Notification;

class DamageReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dreports = DamageReport::all();
        $user_dreports = DamageReport::where('farmers_id', auth()->user()->id)->get();

        // dd($user_dreports);
        return view('reports.damage_reports.index')
            ->with('dreports', $dreports)
            ->with('user_dreports', $user_dreports)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calamities = Calamity::orderBy('id')->get();
        $calabarzon = Region::where('id','=', 4)->get();
        $laguna = Province::where('id','=',19)->get();
        $rice_crop_stage = RiceCropStage::all();

        // dd($calamities);

        return view('reports.damage_reports.create')
            ->with('calabarzon', $calabarzon)
            ->with('calamities',$calamities)
            ->with('laguna',$laguna)
            ->with('rice_crop_stage',$rice_crop_stage)
            ;    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { // Validation
        // $request->validate([
        //     'calamity' => 'required',
        //     'narrative' => 'required|string|max:255',
        // ]);
        

        $dreport = new DamageReport;
        $dreport->calamities_id = $request->get('calamity');
        $dreport->farmers_id = auth()->user()->id;
        $dreport->report_statuses_id = 1;
        $dreport->provinces_id = $request->get('provinces_id');
        $dreport->regions_id = $request->get('regions_id');
        $dreport->rice_crop_stages_id = $request->get('rice_crop_stages_id');

        $dreport->initial_report_date = \Carbon\Carbon::now();
        // $dreport->final_report_date = \Carbon\Carbon::now();

        $dreport->calamity_start = $request->get('calamity_start');
        $dreport->calamity_end = $request->get('calamity_end');
        $dreport->crop = $request->get('crop');
        $dreport->num_farmers = $request->get('num_farmers');
        $dreport->standing_crop_area = $request->get('standing_crop_area');
        $dreport->harvest_month = $request->get('harvest_month');

        $dreport->total_area = $request->get('total_area');
        $dreport->totally_damaged_area = $request->get('totally_damaged_area');
        $dreport->partially_damaged_area = $request->get('partially_damaged_area');
        
        $dreport->yield_before = $request->get('yield_before');
        $dreport->yield_after = $request->get('yield_after');
        $dreport->yield_loss = $request->get('yield_loss');
        
        $dreport->volume = $request->get('volume');
        $dreport->grand_total = $request->get('grand_total');

        $dreport->remarks = $request->get('remarks');


        $dreport->save();



        // foreach($request['crop'] as $key => $value) {

        //     $data=array(
        //                 'damage_reports_id' => $dreport->id,
        //                 'crop'=>$request->crop [$key],
        //                 'crop_stage'=>$request->crop_stage [$key],
        //                 'production'=>$request->production [$key],
        //                 'animal'=>$request->animal [$key],
        //                 'animal_head'=>$request->animal_head [$key],
        //                 'fish'=>$request->fish [$key],
        //                 'area'=>$request->area [$key],
        //                 'fish_pieces'=>$request->fish_pieces [$key],
        //                 'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
        //                 'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
        //             );

        //     DamageData::insert($data);
        // }  


        // Notifications
        $users = User::where('roles_id', 1)
            ->orWhere('roles_id', 2)
            ->get();
        Notification::send($users, new DamageReportCreated());

        return redirect()->route('damage_reports.index')->with('success','Damage Report Created ');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dreport = DamageReport::findOrFail($id);

        return view('reports.damage_reports.show')
            ->with('dreport', $dreport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dreport = DamageReport::findOrFail($id);
        $calamities = Calamity::orderBy('id')->get();
        $calabarzon = Region::where('id','=', 4)->get();
        $laguna = Province::where('id','=',19)->get();
        $rice_crop_stage = RiceCropStage::all();

        // dd($calamities);

        return view('reports.damage_reports.edit')
            ->with('dreport', $dreport)
            ->with('calabarzon', $calabarzon)
            ->with('calamities',$calamities)
            ->with('laguna',$laguna)
            ->with('rice_crop_stage',$rice_crop_stage)
            ;    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dreport = DamageReport::findOrFail($id);
        $dreport->calamities_id = $request->get('calamity');
        $dreport->farmers_id = auth()->user()->id;
        // $dreport->report_statuses_id = 1;
        $dreport->provinces_id = $request->get('provinces_id');
        $dreport->regions_id = $request->get('regions_id');
        $dreport->rice_crop_stages_id = $request->get('rice_crop_stages_id');

        // $dreport->initial_report_date = \Carbon\Carbon::now();
        $dreport->final_report_date = \Carbon\Carbon::now();

        $dreport->calamity_start = $request->get('calamity_start');
        $dreport->calamity_end = $request->get('calamity_end');
        $dreport->crop = $request->get('crop');
        $dreport->num_farmers = $request->get('num_farmers');
        $dreport->standing_crop_area = $request->get('standing_crop_area');
        $dreport->harvest_month = $request->get('harvest_month');

        $dreport->total_area = $request->get('total_area');
        $dreport->totally_damaged_area = $request->get('totally_damaged_area');
        $dreport->partially_damaged_area = $request->get('partially_damaged_area');
        
        $dreport->yield_before = $request->get('yield_before');
        $dreport->yield_after = $request->get('yield_after');
        $dreport->yield_loss = $request->get('yield_loss');
        
        $dreport->volume = $request->get('volume');
        $dreport->grand_total = $request->get('grand_total');
        $dreport->report_statuses_id = 2;
        $dreport->remarks = $request->get('remarks');


        $dreport->save();

        return redirect()->route('damage_reports.index')->with('success','Damage Report Updated ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function report_final(Request $request, $id){
        $dreport = DamageReport::findOrFail($id);
        $dreport->report_statuses_id = 2;
        $dreport->save();

        return redirect()->back()->with('success', 'Damage Report Final');
    }


    public function pdfview(Request $request, $id)
    {

        $dreport = DamageReport::findOrFail($id);
        $ddatas = DamageData::where('damage_reports_id', $dreport->id)->get();

        $users = DB::table('users')->get();
        view()->share('users',$users);


        // pass view file
        $pdf = PDF::loadView('partials.pdf.damage_report', compact('dreport'), compact('ddatas'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('damage_report.pdf');
    }
}
