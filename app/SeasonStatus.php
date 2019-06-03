<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonStatus extends Model
{
    // Table Name
    protected $table = 'season_statuses';
    // Fillables
    protected $fillable = [
        'status',
    ];
     // Primary Key
    public $primaryKey = 'id';

}
