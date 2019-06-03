<?php

namespace App\Http\Controllers;

use App\User;
use App\Season;
use App\SeasonList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $season_lists = SeasonList::getActiveFarmers();

        // dd($season_lists);
        // $farmers = User::where('roles_id', 2)->paginate(5);

        return view('admin.seasons.index')
            ->with('seasons', $seasons)
            ->with('season_lists', $season_lists);
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


        $season = new Season;
        $season->season_start = date("Y:m:d", strtotime(request('season_start')));
        // $season->season_types_id = $request->input('season_types_id');
        $season->season_statuses_id =1;
        $season->save();



        return redirect()->route('seasons.index')->with('success','Season Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        //
    }
}
