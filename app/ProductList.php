<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    // Table Name
    protected $table = 'product_lists';
    // Fillables
    protected $fillable = [
        'curr_products_id', 'orig_products_id', 'seasons_id', 'users_id', 'orig_quantity','price', 'curr_quantity', 'harvest_date',
    ];
     // Primary Key
    public $primaryKey = 'id';

    public function orig_products()
    {
        return $this->belongsTo(Product::class, 'orig_products_id');
    }

    public function curr_products()
    {
        return $this->belongsTo(Product::class, 'curr_products_id');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
