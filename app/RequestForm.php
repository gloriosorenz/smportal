<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'phone', 
        // 'password', 
        'roles_id', 
        'company', 
        'no_farmers', 
        'hectares',
        // 'active', 
        'roles_id', 
        // 'barangays_id', 
        'provinces_id', 
        'cities_id'
    ];

}
