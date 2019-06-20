<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DamageReport;
use App\DamageData;
use App\Region;
use App\Province;
use App\Calamity;
use App\User;
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

        return view('reports.damage_reports.index')
            ->with('dreports', $dreports);
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

        // dd($calamities);

        return view('reports.damage_reports.create')
            ->with('calabarzon', $calabarzon)
            ->with('calamities',$calamities)
            ->with('laguna',$laguna)
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
        

        // $dreport = new DamageReport;
        // $dreport->calamities_id = $request->get('calamity');
        // $dreport->narrative = $request->get('narrative');
        // $dreport->regions_id = $request->get('region');
        // $dreport->provinces_id = $request->get('province');
        // $dreport->save();



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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
