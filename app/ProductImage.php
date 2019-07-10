<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_lists_id', 'image'];

    public function item(){

    return $this->belongsTo('App\ProductList');

    }
}
