<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use DB;
use App\ProductList;
use App\Product;
use App\Season;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $last_com_season = Season::where('season_statuses_id','=', 2)->latest('id')->first();


        $prodjoin = Product::join('product_lists', 'products.id', '=', 'product_lists.orig_products_id')
            ->where('orig_products_id','!=',4)
            ->groupBy('orig_products_id', 'type')
            ->pluck('products.type')
            ;

        // dd($prodjoin);

        $prodlist = ProductList::where('orig_products_id','!=',4)
            ->groupBy('orig_products_id')
            ->selectRaw('sum(curr_quantity) as sum')
            ->where('users_id', auth()->user()->id)
            ->where('seasons_id',$last_com_season->id) //error
            ->pluck('sum')
            ;

        // dd($prodlist);

        // //ADMIN CHARTS
        // Total Production Percentage Chart
        $total_prod_per = Charts::create('pie', 'highcharts')
                ->title('Total Production Percentage')
                ->labels($prodjoin)
                ->values($prodlist)
                ->dimensions(500,300)
                ->responsive(true);

        // dd($total_prod_pser);



        return view('home', compact('total_prod_per'))
            ->with('last_com_season', $last_com_season)
            // ->with('total_prod_per', $total_prod_per)
            ;
    }
}
