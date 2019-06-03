<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ProductList;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/welcome');
    }

    /**
     * Display all the products of the farmers.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
         // Get latest season
         $latest_season = DB::table('seasons')
         ->where('season_statuses_id', 2)
         ->orderBy('id', 'desc')->first();

        //Show all Products
        $product_lists = ProductList::where('seasons_id', $latest_season->id)
                        ->where('curr_products_id', '!=', 3) 
                        ->where('curr_quantity', '>', 0)
                        ->get();

        // dd($product_lists);
                        

        $farmers = DB::table('product_lists')
                        ->groupBy('rice_farmers_id', 'seasons_id', 'products_id');

        
        // dd($farmers);
        return view('website.shop')
                ->with('product_lists', $product_lists)
                ->with('farmers', $farmers);
        // return view('website.shop');
    }


    public function display_products()
    {
       
    }


}
