<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table Name
    protected $table = 'products';
    // Fillables
    protected $fillable = [
        'total_quantity', 'seasons_id', 'rice_farmers_id',
    ];
     // Primary Key
    public $primaryKey = 'id';


}
