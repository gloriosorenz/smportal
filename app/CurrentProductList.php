<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CurrentProductList extends Model
{
        // Table Name
        protected $table = 'current_product_lists';
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
    
    
         // Get Yearly Rice Product Average Price of a farmer
        public static function getYearlyRiceProductAverage(){
            return DB::table('product_lists AS pl')->join('users', 'pl.users_id', '=', 'users.id')
                    ->join('products', 'pl.orig_products_id', '=', 'products.id')
                    ->selectraw('AVG(price) as price, YEAR(harvest_date) year')
                    ->where('users_id', '=', auth()->user()->id)
                    ->where('products.id', '=', 1)
                    ->groupBy(DB::raw('year(harvest_date)'))
                    // ->orderBy('year','desc')
                    ->limit(3)
                    ->pluck('price')
                    ;
        }

        // Get Yearly Withered Product Average Price of a farmer
        public static function getYearlyWitheredProductAverage(){
            return DB::table('product_lists')->join('users', 'product_lists.users_id', '=', 'users.id')
                    ->join('products', 'product_lists.orig_products_id', '=', 'products.id')
                    ->selectraw('AVG(price) as price, YEAR(harvest_date) year')
                    ->where('users_id', '=', auth()->user()->id)
                    ->where('products.id', '=', 2)
                    ->groupBy(DB::raw('year(harvest_date)'))
                    // ->orderBy('year','desc')
                    ->limit(3)
                    ->pluck('price')    
                    ;
        }

        // Get all rice product average of all farmers
        public static function getAllRiceProductAverage(){
            return DB::table('product_lists')->join('users', 'product_lists.users_id', '=', 'users.id')
                    ->join('products', 'product_lists.orig_products_id', '=', 'products.id')
                    ->where('products.id', '=', 1)
                    ->avg('price');
        }
        
        // Get all rice product average of all farmers
        public static function getAllWitheredProductAverage(){
            return DB::table('product_lists')->join('users', 'product_lists.users_id', '=', 'users.id')
                    ->join('products', 'product_lists.orig_products_id', '=', 'products.id')
                    ->where('products.id', '=', 2)
                    ->avg('price');
        }
}
