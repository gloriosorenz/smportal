<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class OriginalProductList extends Model
{
        // Table Name
        protected $table = 'original_product_lists';
        // Fillables
        protected $fillable = [
            'products_id', 'seasons_id', 'users_id', 'quantity','price', 'harvest_date',
        ];
         // Primary Key
        public $primaryKey = 'id';
    
    
        // Relations
        // public function orig_products()
        // {
        //     return $this->belongsTo(Product::class, 'orig_products_id');
        // }
    
        public function products()
        {
            return $this->belongsTo(Product::class, 'products_id');
        }
    
        public function seasons()
        {
            return $this->belongsTo(Season::class, 'seasons_id');
        }
    
        public function users()
        {
            return $this->belongsTo(User::class, 'users_id');
        }
    
        // Present Price
        public function presentPrice()
        {
            return '₱'.number_format($this->price / 100 * 100, 2);
        }
    
    
        // Get Rice Product Average Price of a farmer
        public static function getRiceProductAverage(){
            return DB::table('original_product_lists')->join('users', 'original_product_lists.users_id', '=', 'users.id')
                    ->join('products', 'original_product_lists.products_id', '=', 'products.id')
                    ->where('users_id', '=', auth()->user()->id)
                    ->where('products.id', '=', 1)
                    ->avg('price');
        }
    
        // Get Withered Product Average Price of a farmer
        public static function getWitheredProductAverage(){
            return DB::table('original_product_lists')->join('users', 'original_product_lists.users_id', '=', 'users.id')
                    ->join('products', 'original_product_lists.products_id', '=', 'products.id')
                    ->where('users_id', '=', auth()->user()->id)
                    ->where('products.id', '=', 2)
                    ->avg('price');
        }
    
        // Get all rice product average of all farmers
        public static function getAllRiceProductAverage(){
            return DB::table('original_product_lists')->join('users', 'original_product_lists.users_id', '=', 'users.id')
                    ->join('products', 'original_product_lists.products_id', '=', 'products.id')
                    ->where('products.id', '=', 1)
                    ->avg('price');
        }
        
        // Get all rice product average of all farmers
        public static function getAllWitheredProductAverage(){
            return DB::table('original_product_lists')->join('users', 'original_product_lists.users_id', '=', 'users.id')
                    ->join('products', 'original_product_lists.products_id', '=', 'products.id')
                    ->where('products.id', '=', 2)
                    ->avg('price');
        }
}
