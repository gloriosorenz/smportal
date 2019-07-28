<?php

namespace App\Http\Controllers;

use App\User;
use App\Season;
use App\SeasonList;

use Notification;
use App\Notifications\SeasonListCreated;
use App\Notifications\SeasonEnded;

use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class SeasonListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $season_lists = SeasonList::all();

        $latest_season = Season::getLatestSeason();

        $season_lists = SeasonList::where('users_id', auth()->user()->id)
                    ->get();
        $farmers = User::where('roles_id', 2)->paginate(5);

        $active = SeasonList::join('seasons', 'season_lists.seasons_id', '=', 'seasons.id')
                    // ->where('season_statuses_id', 2)
                    ->where('seasons_id', $latest_season->id)
                    ->where('users_id', auth()->user()->id)
                    ->get()
                    ->count();

        $ongoing_season = Season::getOngoingSeason();
        

        $farmer_latest_season = SeasonList::where('users_id', auth()->user()->id)
                ->where('seasons_id', $latest_season->id)
                ->first()
                ;
                
        // dd($farmer_latest_season);
        
        $all_season_lists = SeasonList::all();

        return view('farmer.season_lists.index')
            ->with('season_lists', $season_lists)
            ->with('all_season_lists', $all_season_lists)
            ->with('active', $active)
            ->with('farmers', $farmers)
            ->with('latest_season', $latest_season)
            ->with('ongoing_season', $ongoing_season)
            // ->with('farmer_ongoing_season', $farmer_ongoing_season)
            ->with('farmer_latest_season', $farmer_latest_season)
            ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $season_lists = SeasonList::where('users_id', auth()->user()->id)
                    ->get();
        $users = User::getAllFarmers();

        return view('farmer.season_lists.create')
            ->with('season_lists', $season_lists)
            ->with('users', $users)
            ;
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
            "planned_hectares.*"  => "required",
            "planned_num_farmers.*"  => "required|integer",
            "planned_qty.*"  => "required|integer",
            "users_id.*"  => "required|distinct",
        ]);

        // Get ongoing season
        $season = Season::getOngoingSeason();

        //  Store Season List
        foreach($request->planned_hectares as $key => $value) {
            $data=array(
                        'seasons_id' => $season->id,
                        'users_id'=> $request->users_id [$key],
                        'planned_hectares'=>$request->planned_hectares [$key],
                        'planned_num_farmers'=>$request->planned_num_farmers [$key],
                        'planned_qty'=>$request->planned_qty [$key],
                        'season_list_statuses_id' => 1,
                        'target_sales' => 0,
                        'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
                    );
            SeasonList::insert($data);
        }


        // Notification
        $admin = User::where('roles_id', 1)->get();
        Notification::send($admin, new SeasonListCreated());

    return redirect()->route('season_lists.index')->with('success','Season List Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $season_list = SeasonList::findOrFail($id);

        return view('farmer.season_lists.show')
            ->with('season_list', $season_list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season_list = SeasonList::findOrFail($id);

        return view('farmer.season_lists.edit')
            ->with('season_list', $season_list);
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
        $season_list = SeasonList::findOrFail($id);

        // Get latest season
        $season = DB::table('seasons')
        ->where('season_statuses_id', 1)
        ->first();

        
        $season_list->actual_hectares = $request->input('actual_hectares');
        $season_list->actual_num_farmers = $request->input('actual_num_farmers');
        $season_list->season_list_statuses_id = 2;
        $season_list->save();

        // Get Season 
        $season = $season_list->seasons->id;

        $ongoing_season = Season::getOngoingSeason();

        $check_season_list = SeasonList::where('seasons_id', $ongoing_season->id)
            ->where('season_list_statuses_id', 2)
            ->count();
        $count_season_list = SeasonList::getActiveFarmers()->count();


        // dd($count_season_list);

        if($check_season_list == $count_season_list){
            $season = Season::findOrFail($ongoing_season->id);
            $season->season_end = Carbon::now();
            $season->season_statuses_id = 2;
            $season->save();

             // Notification
            $farmers = User::where('roles_id', 2)->get();
            Notification::send($farmers, new SeasonEnded());
        }



        return redirect()->route('season_lists.index')->with('success','Season List Updated ');
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
}
