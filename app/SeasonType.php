<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonType extends Model
{
    // Table Name
    protected $table = 'season_types';
    // Fillables
    protected $fillable = [
        'type',
    ];
     // Primary Key
    public $primaryKey = 'id';

}
