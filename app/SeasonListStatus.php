<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonListStatus extends Model
{
    // Table Name
    protected $table = 'season_list_statuses';
    // Fillables
    protected $fillable = [
        'status'
    ];
     // Primary Key
    public $primaryKey = 'id';



}
