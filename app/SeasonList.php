<?php

namespace App;

use App\SeasonList;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class SeasonList extends Model
{

    // Table Name
    protected $table = 'season_lists';
    // Fillables
    protected $fillable = [
        'planned_hectares', 
        'actual_hectares', 
        'planned_num_farmers', 
        'actual_num_farmers', 
        'planned_qty', 
        'actual_qty', 
        'season_list_statuses_id',
         'users_id', 'target_sales'
    ];
     // Primary Key
    public $primaryKey = 'id';


    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }

    public function season_list_statuses()
    {
        return $this->belongsTo(SeasonListStatus::class, 'season_list_statuses_id');
    }


    // FUNCTIONS

    // Get all active farmers for the current season
    public static function getActiveFarmers(){
        $latest_season = Season::getLatestSeason();
        // $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();

        return SeasonList::where('seasons_id', $latest_season->id)->get();
    }

    // Get all farmers who participated for the season
    public static function getFarmers($id){
        $season = Season::find($id);

        return SeasonList::where('seasons_id', $season->id)->get();
    }
}
