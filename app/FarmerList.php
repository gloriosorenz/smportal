<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmerList extends Model
{
    protected $fillable = [
        'users_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
