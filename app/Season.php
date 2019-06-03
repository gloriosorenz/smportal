<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

    // Table Name
    protected $table = 'seasons';
    // Fillables
    protected $fillable = [
        'season_start', 'season_end', 'season_types_id', 'season_statuses_id'
    ];
     // Primary Key
    public $primaryKey = 'id';


    public function season_types()
    {
        return $this->belongsTo(SeasonType::class, 'season_types_id');
    }

    public function season_statuses()
    {
        return $this->belongsTo(SeasonStatus::class, 'season_statuses_id');
    }



    // Get latest season
    public static function getLatestSeason(){
        return $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();

    }


    // Get latest ongoing season
    public static function getOngoingSeason(){
        return DB::table('seasons')
            ->where('season_statuses_id', 1)
            ->first();
    }
}
