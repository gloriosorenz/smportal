<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\ProductList;
use App\Product;
use App\Season;
use App\OrderProduct;

use DarkSkyApi;
use Charts;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        // ------------------------------------------------------------------------------------------------------------------------
        // Weather forecasat
        // ------------------------------------------------------------------------------------------------------------------------

        $forecast = DarkSkyApi::location(14.2843, 121.0889)
            ->units('si')
            ->forecast(['currently', 'daily']);

        $daily = $forecast->daily()->data();

        $alerts = $forecast->alerts('severity');

        // ------------------------------------------------------------------------------------------------------------------------

        // ------------------------------------------------------------------------------------------------------------------------
        // Get Transactions
        // ------------------------------------------------------------------------------------------------------------------------

        // Get Transactions
        $transactions = OrderProduct::where('farmers_id', auth()->user()->id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();





        // ------------------------------------------------------------------------------------------------------------------------
        // ADMIN CHARTS
        // ------------------------------------------------------------------------------------------------------------------------

        // Total Production Percentage Chart

        $last_com_season = Season::getLastCompleteSeason();

        // Get product type
        $total_prod_label = Product::join('product_lists', 'products.id', '=', 'product_lists.orig_products_id')
            ->where('orig_products_id','!=',4)
            ->groupBy('orig_products_id', 'type')
            ->pluck('products.type')
            ;


        // Get total quantity of products for last complete season
        $total_prod_sum = ProductList::where('orig_products_id','!=',4)
            ->groupBy('orig_products_id')
            ->selectRaw('sum(curr_quantity) as sum')
            ->where('seasons_id',$last_com_season->id) //error
            ->pluck('sum')
            ;

        // Total Production Percentage Chart
        $total_prod_per = Charts::create('pie', 'highcharts')
            ->title('Total Production Percentage')
            ->labels($total_prod_label)
            ->values($total_prod_sum)
            ->dimensions(500,300)
            ->responsive(true);

        // ------------------------------------------------------------------------------------------------------------------------
        






        // ------------------------------------------------------------------------------------------------------------------------
        // FARMER CHARTS
        // ------------------------------------------------------------------------------------------------------------------------

        // Seasonal Production Overview

        // Get rice production per season
        $rice_products = ProductList::where('users_id','=', auth()->user()->id)
                ->where('orig_products_id','=',1)
                ->groupBy('seasons_id', 'orig_quantity')
                ->limit(10)
                ->pluck('orig_quantity')
        ;
        
        // Get withered rice production per season
        $withered_products = ProductList::where('users_id','=', auth()->user()->id)
                ->where('orig_products_id','=',2)
                ->groupBy('seasons_id', 'orig_quantity')
                ->limit(10)
                ->pluck('orig_quantity')
        ;
        
        // Get damaged rice production per season
        $damaged_products = ProductList::where('users_id','=', auth()->user()->id)
                ->where('orig_products_id','=',3)
                ->groupBy('seasons_id', 'orig_quantity')
                ->limit(10)
                ->pluck('orig_quantity')
        ;
        
        // Rice production labels
        $rice_production_label = ProductList::
                where('users_id','=', auth()->user()->id)
                ->where('orig_products_id','=',1)
                ->limit(10)
                ->get()
                ->pluck('seasons_id')
        ;

        // Rice Production Line Chart
        $rice_production_line = Charts::multi('line', 'highcharts')
            ->title('Seasonal Production')
            ->yAxisTitle('Quantity')
            ->xAxisTitle('Season')
            ->labels($rice_production_label)
            ->dataset('Rice Products',$rice_products)
            ->dataset('Withered Products',$withered_products)
            ->dataset('Damaged Products',$damaged_products)
            ->dimensions(1000,500)
            ->responsive(true)
        ;


        // ------------------------------------------------------------------------------------------------------------------------

        // Products Sold per Season Chart

        // Products sold per season (rice products)
        $ricesoldperse = DB::table('product_lists')
            ->selectRaw('seasons_id, sum(quantity) as sum')
            ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
            ->where('farmers_id','=', auth()->user()->id)
            ->where('order_product_statuses_id','=',3)
            ->where('curr_products_id','=',1)
            ->groupBy('seasons_id')
            ->pluck('sum')
        ;

        
        // Products sold per season (withered products)
        $withersoldperse = DB::table('product_lists')
            ->selectRaw('seasons_id, sum(quantity) as sum')
            ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
            ->where('farmers_id','=', auth()->user()->id)
            ->where('order_product_statuses_id','=',3)
            ->where('curr_products_id','=',2)
            ->groupBy('seasons_id', 'quantity')
            ->get()
            ->pluck('sum')
        ;

        // dd($withersoldperse);

        // Products sold per season labels
        $prodsoldperselbl = DB::table('product_lists')
            ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
            ->where('farmers_id','=', auth()->user()->id)
            ->groupBy('seasons_id')
            ->pluck('seasons_id')
        ;

        $orderlinechart = Charts::multi('line', 'highcharts')
            ->title('Products Sold per Season')
            // ->template('material')
            ->yAxisTitle("Quantity")
            ->xAxisTitle("Season")
            ->labels($prodsoldperselbl)
            ->dataset('Rice',$ricesoldperse)
            ->dataset('Withered',$withersoldperse)
            ->dimensions(1000,500)
            ->responsive(true)
        ;



        return view('home')
            ->with('last_com_season', $last_com_season)
            ->with('forecast', $forecast)
            ->with('alerts', $alerts)
            ->with('daily', $daily)
            ->with('total_prod_per', $total_prod_per)
            ->with('rice_production_line', $rice_production_line)
            ->with('orderlinechart', $orderlinechart)
            ->with('transactions', $transactions)
            ;
    }
}
