<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Season;
use App\SeasonList;
use App\ProductList;

use App\Notifications\NewSeasonCreated;
use Notification;

use Carbon\Carbon;
use PDF;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();
        $complete = Season::where('season_statuses_id', '=', 2)->get();
        $latest_season = Season::getLatestSeason();


        $season_lists = SeasonList::getActiveFarmers();
        $ongoing_season = Season::getOngoingSeason();

        // Count Products
        $count = ProductList::where('seasons_id', $latest_season->id)
                ->count();

        // dd($season_lists);
        // $farmers = User::where('roles_id', 2)->paginate(5);

        return view('admin.seasons.index')
            ->with('seasons', $seasons)
            ->with('complete', $complete)
            ->with('season_lists', $season_lists)
            ->with('latest_season', $latest_season)
            ->with('ongoing_season', $ongoing_season)
            ->with('count', $count)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validation
        $request->validate([
            // "name"    => "required|array|min:3",
            // "name.*"  => "required|string|distinct|min:3",
            'season_start' => 'required',
            // 'season_types_id' => 'required',
        ]);


        $date = Carbon::createFromFormat('m-d', '02-01');


        // AUTOMATED SEASON TYPE
        $season = new Season;
        $season->season_start = $request->input('season_start');
            $input_date = $request->input('season_start');
            $from = date('Y-03-16');
            $to = date('Y-09-15');
        if($input_date >= $from && $input_date <= $to){
            $season->season_types_id = 1;
        } else {
            $season->season_types_id = 2;
        }
        $season->season_statuses_id =1;

        // dd($season);

        /*
            1 = March 16 -> Sept. 15 (March, April, May, June, July, August, September)
            2 = Sept. 16 -> March 15 (September, October, November, December, January, February, March)
        */


        $season->save();


        // Get email
        $email = User::where('roles_id', 2)->pluck('email');

        $user = auth()->user();
        // Notification
        $farmers = User::where('roles_id', 2)->get();
        Notification::send($farmers, new NewSeasonCreated($user));

        return redirect()->route('seasons.index')->with('success','Season Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $season = Season::find($id);
        $season_lists = SeasonList::getFarmers($id);

        $lists = DB::table('season_lists')
                ->join('seasons', 'season_lists.seasons_id', '=', 'seasons.id')
                ->join('users', 'season_lists.users_id', '=', 'users.id')
                ->where('season_lists.seasons_id', $season->id)
                ->select('users.barangays_id', 
                        DB::raw("SUM(planned_hectares) as planned_hectares"), 
                        DB::raw("SUM(planned_num_farmers) as planned_num_farmers"),
                        DB::raw("SUM(planned_qty) as planned_qty"),
                        DB::raw("SUM(actual_hectares) as actual_hectares"), 
                        DB::raw("SUM(actual_num_farmers) as actual_num_farmers"),
                        DB::raw("SUM(actual_qty) as actual_qty")
                        )
                ->groupBy('barangays_id')
                ->get();

        return view('admin.seasons.show')
            ->with('season', $season)
            ->with('season_lists', $season_lists)
            ->with('lists', $lists);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season = Season::find($id);

        return view('admin.seasons.edit')
            ->with('season', $season);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            "season_end" => "required",
        ]);

        $season = Season::findOrFail($id);
        $season->season_end = $request->input('season_start');
        $season->season_end = $request->input('season_end');
        $season->season_statuses_id = 2;
        $season->save();

        
        // Notification
        // $recipients = User::where('roles_id', 3)->get();
        // Notification::send($recipients, new SeasonComplete());


     
        return redirect()->route('seasons.index')->with('success','Season Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // Generate PDF
    public function pdfview(Request $request, $id)
    {
        $season = Season::find($id);
        // $lists = SeasonList::where('seasons_id', $season->id)->get();

        $lists = DB::table('season_lists')
        ->join('seasons', 'season_lists.seasons_id', '=', 'seasons.id')
        ->join('users', 'season_lists.users_id', '=', 'users.id')
        ->where('season_lists.seasons_id', $season->id)
        ->select('users.barangays_id', 
                DB::raw("SUM(planned_hectares) as planned_hectares"), 
                DB::raw("SUM(planned_num_farmers) as planned_num_farmers"),
                DB::raw("SUM(planned_qty) as planned_qty"),
                DB::raw("SUM(actual_hectares) as actual_hectares"), 
                DB::raw("SUM(actual_num_farmers) as actual_num_farmers"),
                DB::raw("SUM(actual_qty) as actual_qty")
                )
        ->groupBy('barangays_id')
        ->get();

        // pass view file
        $pdf = PDF::loadView('partials.pdf.season_report', compact('season', 'lists'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('season_report.pdf');
    }
}
