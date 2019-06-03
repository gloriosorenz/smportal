<?php

namespace App\Http\Controllers;

use App\User;
use App\Season;
use App\SeasonList;
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

        $season_lists = SeasonList::where('users_id', auth()->user()->id)
                    ->get();
        $farmers = User::where('roles_id', 2)->paginate(5);

        // dd($season_lists);
        return view('farmer.season_lists.index')
            ->with('season_lists', $season_lists)
            ->with('farmers', $farmers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmer.season_lists.create');
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
                        'users_id'=> auth()->user()->id,
                        'planned_hectares'=>$request->planned_hectares [$key],
                        'planned_num_farmers'=>$request->planned_num_farmers [$key],
                        'planned_qty'=>$request->planned_qty [$key],
                        'season_list_statuses_id' => 1,
                        'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
                    );
            SeasonList::insert($data);
        }

    return redirect()->route('season_lists.index')->with('success','Plan Report Created ');
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
}
