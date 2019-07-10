<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
// use App\ProductList;

use App\OriginalProductList;
use App\CurrentProductList;
use App\Product;
use App\Season;
use App\OrderProduct;
use App\User;
use App\Order;

use DarkSkyApi;
use Charts;
use Carbon\Carbon;

use Notification;
use App\Notifications\RequestSeason;

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

        $authid = auth()->user()->id;

        $forecast = DarkSkyApi::location(14.2843, 121.0889)
            ->units('ca')
            ->forecast(['currently', 'daily', 'alerts', 'hourly']);

        $daily = $forecast->daily()->data();
        $currently = $forecast->currently();
        $hourly = $forecast->hourly();
        $alerts = $forecast->alerts();

        // dd($daily);
        // ------------------------------------------------------------------------------------------------------------------------

        // ------------------------------------------------------------------------------------------------------------------------
        // Get Transactions
        // ------------------------------------------------------------------------------------------------------------------------

        // Get Transactions
        $transactions = OrderProduct::where('farmers_id', auth()->user()->id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

        $all_transactions = OrderProduct::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();


        // ------------------------------------------------------------------------------------------------------------------------
        // ADMIN CHARTS
        // ------------------------------------------------------------------------------------------------------------------------

        // Total Production Percentage Chart

        $last_com_season = Season::getLastCompleteSeason();

        // Get product type
        $total_prod_label = Product::join('original_product_lists', 'products.id', '=', 'original_product_lists.products_id')
            ->where('products_id','!=',4)
            ->groupBy('products_id', 'type')
            ->pluck('products.type')
            ;


        // Get total quantity of products for last complete season
        $total_prod_sum = OriginalProductList::where('products_id','!=',4)
            ->groupBy('products_id')
            ->selectRaw('sum(quantity) as sum') //originally current_quantity
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

        // Most Valuable Customer Bar Chart (for all farmers)
        $mvc = DB::table('orders')
            ->where('order_statuses_id','=',2)
            ->selectRaw('COUNT(orders.id) as orders')
            ->groupBy('users_id')
            ->orderBy('users_id')
            ->pluck('orders')
            ;
        // dd($mvc);

        $mvcbarlabel =  DB::table('orders')
                ->join('users', 'orders.users_id', '=', 'users.id')
                ->where('order_statuses_id','=',2)
                ->groupBy('users.id','name')
                ->orderBy('users.id')
                ->selectRaw('CONCAT(users.first_name, users.last_name) AS name')
                ->pluck('name')
                // ->get();
                ;

        // dd($mvcbarlabel);

        $mvcbarchart = Charts::create('bar', 'highcharts')
                ->title('Customer with Most Orders')
                ->labels($mvcbarlabel)
                ->values($mvc)
                ->elementLabel('Number of Orders')
                ->dimensions(1000, 500)
                ->responsive(true)
                ;

        // ------------------------------------------------------------------------------------------------------------------------

        // Best Selling Farmer Bar Chart

        $bestfarmer = OrderProduct::where('order_product_statuses_id','=',3)
                ->selectRaw('sum(quantity) as sum')
                ->groupBy('farmers_id')
                ->pluck('sum')
                ;
        

        $bestfarmerlbl =  OrderProduct::join('users', 'order_products.farmers_id', '=', 'users.id')
                ->groupBy('farmers_id', 'users.company')
                ->selectRaw('users.company')
                ->where('order_product_statuses_id','=',3)
                ->pluck('users.company')
                ;

        // dd($bestfarmerlbl);


        $bestfarmerbarchart = Charts::create('bar', 'highcharts')
                ->title('Best Selling Farmer')
                ->labels($bestfarmerlbl)
                ->values($bestfarmer)
                ->elementLabel('Number of Product Orders')
                ->dimensions(1000, 500)
                ->responsive(true)
                ;


        // ------------------------------------------------------------------------------------------------------------------------
        // FARMER CHARTS
        // ------------------------------------------------------------------------------------------------------------------------

        // Seasonal Production Overview

        // Get rice production per season
        $rice_products = OriginalProductList::where('users_id','=', auth()->user()->id)
                ->where('products_id','=',1)
                ->groupBy('seasons_id', 'quantity')
                ->limit(10)
                ->pluck('quantity')
        ;
        
        // Get withered rice production per season
        $withered_products = OriginalProductList::where('users_id','=', auth()->user()->id)
                ->where('products_id','=',2)
                ->groupBy('seasons_id', 'quantity')
                ->limit(10)
                ->pluck('quantity')
        ;
        
        // Get damaged rice production per season
        $damaged_products = OriginalProductList::where('users_id','=', auth()->user()->id)
                ->where('products_id','=',3)
                ->groupBy('seasons_id', 'quantity')
                ->limit(10)
                ->pluck('quantity')
        ;
        
        // Rice production labels
        $rice_production_label = OriginalProductList::
                where('users_id','=', auth()->user()->id)
                ->where('products_id','=',1)
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
        $ricesoldperse = DB::table('current_product_lists')
            ->join('order_products', 'current_product_lists.id', '=', 'order_products.current_product_lists_id')
            ->where('farmers_id','=', $authid)
            ->where('order_product_statuses_id','=',3)
            ->where('products_id','=',1)
            ->groupBy('seasons_id')
            ->selectRaw('seasons_id, sum(order_products.quantity) as sum')
            // ->get()
            ->pluck('sum')
        ;

        // dd($ricesoldperse);
        
        // Products sold per season (withered products)
        $withersoldperse = DB::table('current_product_lists')
        ->join('order_products', 'current_product_lists.id', '=', 'order_products.current_product_lists_id')
        ->where('farmers_id','=', $authid)
        ->where('order_product_statuses_id','=',3)
        ->where('products_id','=',2)
        ->groupBy('seasons_id')
        ->selectRaw('seasons_id, sum(order_products.quantity) as sum')
            // ->get()
            ->pluck('sum')
        ;


        // Products sold per season labels
        $prodsoldperselbl = DB::table('current_product_lists')
            ->join('order_products', 'current_product_lists.id', '=', 'order_products.current_product_lists_id')
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

        // ------------------------------------------------------------------------------------------------------------------------

         // Farmer's Most Valuable Customer Bar Chart (for farmer)
         $fmvc = DB::table('order_products')
            ->join('orders', 'order_products.orders_id', '=', 'orders.id')
            ->where('order_product_statuses_id','=',3)
            ->where('farmers_id', auth()->user()->id)
            ->groupBy('users_id')
            ->orderBy('orders', 'desc')
            ->selectRaw('COUNT(order_products.id) as orders')
            ->pluck('orders')
            // ->get()
            ;
        // dd($fmvc);

        $fmvcbarlabel =  DB::table('order_products')
            ->join('orders', 'order_products.orders_id', '=', 'orders.id')
            ->join('users', 'orders.users_id', '=', 'users.id')
            ->where('order_product_statuses_id','=',3)
            ->where('farmers_id', auth()->user()->id)
            ->groupBy('users_id', 'name')
            ->orderBy('orders', 'desc')
            ->selectRaw('CONCAT(first_name, last_name) AS name, COUNT(order_products.id) as orders')
            ->pluck('name')
            // ->get()
            ;

        // dd($fmvcbarlabel);

        $fmvcbarchart = Charts::create('bar', 'highcharts')
            ->title('Customer with Most Orders')
            ->labels($fmvcbarlabel)
            ->values($fmvc)
            ->elementLabel('Number of Orders')
            ->dimensions(1000, 500)
            ->responsive(true)
            ;

        // ------------------------------------------------------------------------------------------------------------------------



        return view('dashboard')
            ->with('last_com_season', $last_com_season)
            ->with('forecast', $forecast)
            ->with('alerts', $alerts)
            ->with('daily', $daily)
            ->with('hourly', $hourly)
            ->with('currently', $currently)
            ->with('total_prod_per', $total_prod_per)
            ->with('rice_production_line', $rice_production_line)
            ->with('orderlinechart', $orderlinechart)
            ->with('mvcbarchart', $mvcbarchart)
            ->with('fmvcbarchart', $fmvcbarchart)
            ->with('bestfarmerbarchart', $bestfarmerbarchart)
            ->with('transactions', $transactions)
            ->with('all_transactions', $all_transactions)
            ;
    }



    public function request_season(){

        // Notification
        $users = User::where('id', '!=', auth()->user()->id)
            ->where('roles_id', '!=', 3)
            ->where('roles_id', '!=', 4)
            ->get();
        Notification::send($users, new RequestSeason());

        return redirect()->back()->with('success', 'Season Requested');
    }


}
