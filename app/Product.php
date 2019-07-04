<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table Name
    protected $table = 'products';
    // Fillables
    protected $fillable = [
        'type'
    ];
     // Primary Key
    public $primaryKey = 'id';


}
