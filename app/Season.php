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

    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function current_product_lists()
    {
        return $this->belongsTo(CurrentProductList::class, 'current_product_lists_id');
    }

    public function original_product_lists()
    {
        return $this->belongsTo(OriginalProductList::class, 'original_product_lists_id');
    }

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
        return DB::table('seasons')->orderBy('id', 'desc')->first();

    }


    // Get latest ongoing season
    public static function getOngoingSeason(){
        return DB::table('seasons')
            ->where('season_statuses_id', 1)
            ->first();
    }

    // Get latest complete season
    public static function getLastCompleteSeason(){
        return DB::table('seasons')
            ->where('season_statuses_id', 2)
            ->latest('id')
            ->first();
    }
}
