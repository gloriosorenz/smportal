<?php

namespace App\Http\Controllers;

use App\User;
use App\Season;
use App\SeasonList;
use App\Product;
use App\ProductList;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Charts;
use DB;

use App\Notifications\ProductsAdded;
use Notification;

class ProductListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get latest season
        $latest_season = Season::getLatestSeason();

        // Get User Products for current Season
        $user_products = ProductList::where('seasons_id', $latest_season->id)
                ->where('users_id', auth()->user()->id)
                ->get();

        // Get All User Products
        $all_user_products = ProductList::where('users_id', auth()->user()->id)
                ->get();

        // Get all users products
        $all_products = ProductList::where('seasons_id', $latest_season->id)
                ->get();

        // Count products
        $count = ProductList::where('seasons_id', $latest_season->id)
                ->where('users_id', auth()->user()->id)->count();


        // // Date Automation
        // $decrease1 = ProductList::where('harvest_date', '<', Carbon::now()->subDays(7))
        //     ->where('curr_quantity', '>', 0)
        //     ->get();


        // // dd($prod1);
        // foreach($decrease1 as $pl){
        // $sub = $pl->curr_quantity;
        // $prod1 = $decrease1['products_id' == 1 ];
        //     if($pl->products_id == 1){
        //         $pl->update([
        //             'curr_quantity' => $pl->curr_quantity - $sub,
        //             ]);
        //     }
        //     if($pl->products_id == 2){
        //         $pl->update([
        //             'curr_quantity' => $pl->curr_quantity + $prod1->curr_quantity,
        //             ]);
        //     }
        // }





                
        // Labels
        $prod_labels = ProductList::join('products', 'product_lists.orig_products_id', '=', 'products.id')
                ->select('seasons_id', 'type')
                ->where('users_id', auth()->user()->id)
                ->where('products.id', '=', 1)
                ->groupby('product_lists.seasons_id', 'type')
                ->pluck('product_lists.seasons_id');

        // Get price values
        $rice_price = ProductList::join('products', 'product_lists.orig_products_id', '=', 'products.id')
                // ->select('seasons_id', 'price')
                ->where('users_id', auth()->user()->id)
                ->where('products.id', '=', 1)
                // ->groupby('seasons_id', 'price')
                ->pluck('price');

        $withered_price = ProductList::join('products', 'product_lists.orig_products_id', '=', 'products.id')
                // ->select('seasons_id', 'price')
                ->where('users_id', auth()->user()->id)
                ->where('products.id', '=', 2)
                // ->groupby('seasons_id', 'price')
                ->pluck('price');

         // Price History Chart
         $price_history = Charts::multi('line', 'highcharts')
            ->title('Price History')
            ->labels($prod_labels)
            // ->template('material')
            ->elementLabel('Rice Product Prices')
            ->yAxisTitle("Price")
            ->xAxisTitle("Season")
            ->dataset('Rice Products',$rice_price)
            ->dataset('Withered Products',$withered_price)
            ->dimensions(500,300)
            ->responsive(true);



        return view('farmer.product_lists.index')
                ->with('user_products', $user_products)
                ->with('all_products', $all_products)
                ->with('all_user_products', $all_user_products)
                ->with('latest_season', $latest_season)
                ->with('count', $count)
                ->with('price_history', $price_history)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $season = Season::getLatestSeason();
        $products = Product::where('id', '!=', 4)->get();
        $users = User::where('roles_id', 2)->get()->pluck('company');

        // Get rice product average of the user 
        $rice_prod_ave = ProductList::getRiceProductAverage();

        // Get withered product average of the user
        $withered_prod_ave = ProductList::getWitheredProductAverage();

        // Get all rice product average of all farmers
        $all_rice_prod_ave = ProductList::getAllRiceProductAverage();
        
            
        // Get all withered product average of all farmers
        $all_withered_prod_ave = ProductList::getAllWitheredProductAverage();




        // Labels
        $prod_labels = ProductList::join('products', 'product_lists.orig_products_id', '=', 'products.id')
                ->select('seasons_id', 'type')
                ->where('users_id', auth()->user()->id)
                ->where('products.id', '=', 1)
                ->groupby('product_lists.seasons_id', 'type')
                ->pluck('product_lists.seasons_id');

        // Get price values
        $rice_price = ProductList::join('products', 'product_lists.orig_products_id', '=', 'products.id')
                // ->select('seasons_id', 'price')
                ->where('users_id', auth()->user()->id)
                ->where('products.id', '=', 1)
                // ->groupby('seasons_id', 'price')
                ->pluck('price');
                
        $withered_price = ProductList::join('products', 'product_lists.orig_products_id', '=', 'products.id')
                // ->select('seasons_id', 'price')
                ->where('users_id', auth()->user()->id)
                ->where('products.id', '=', 2)
                // ->groupby('seasons_id', 'price')
                ->pluck('price');

         // Price History Chart
         $price_history = Charts::multi('line', 'highcharts')
                ->title('Price History')
                ->labels($prod_labels)
                // ->template('material')
                ->elementLabel('Rice Product Prices')
                ->yAxisTitle("Price")
                ->xAxisTitle("Season")
                ->dataset('Rice Products',$rice_price)
                ->dataset('Withered Products',$withered_price)
                ->dimensions(500,300)
                ->responsive(true);


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

        return view('farmer.product_lists.create')
            ->with('users', $users)
            ->with('season', $season)
            ->with('products', $products)
            ->with('rice_prod_ave', $rice_prod_ave)
            ->with('withered_prod_ave', $withered_prod_ave)
            ->with('all_rice_prod_ave', $all_rice_prod_ave)
            ->with('all_withered_prod_ave', $all_withered_prod_ave)
            ->with('price_history', $price_history)
            ->with('rice_production_line', $rice_production_line)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
       $request->validate([
            'orig_quantity.*' => 'required|int|',
            'price.*' => 'required|int',
        ]);

        // Get latest season
        $latest_season = Season::getLatestSeason();

        $counter = 0;
        foreach($request->products_id as $key => $value) {
            $product_list = new ProductList;
            $product_list->users_id = $request->input('users_id') [$key];
            $product_list->seasons_id = $latest_season->id;
            $product_list->orig_products_id = $request->input('products_id') [$key];
            $product_list->curr_products_id = $request->input('products_id') [$key];
            $product_list->orig_quantity = $request->input('orig_quantity') [$key];
            $product_list->curr_quantity = $request->input('orig_quantity') [$key];
            $product_list->harvest_date = $request->input('harvest_date') [$key];
            $product_list->price = $request->input('price') [$key];

            $product_list->save();

            
            $season_list = SeasonList::where('seasons_id', $product_list->seasons_id)
                        ->where('users_id', $product_list->users_id)
                        ->first();

            $counter = $product_list->orig_quantity + $counter;
            
        }

        $season_list = SeasonList::findOrFail($season_list->id);
        $season_list->actual_qty = $counter;
        $season_list->save();
        

        // Notification
        $users = User::where('id', '!=', auth()->user()->id)->get();
        Notification::send($users, new ProductsAdded());

        return redirect()->route('product_lists.index')->with('success','Products Added ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $season = Season::find($id);
        $product_lists = ProductList::where('users_id', '=', auth()->user()->id)
                ->where('seasons_id', $season->id)
                ->get();

        return view('farmer.product_lists.show')
            ->with('season', $season)
            ->with('product_lists', $product_lists);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_list = ProductList::findOrFail($id);

        return view('farmer.product_lists.edit')
            ->with('product_list', $product_list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_list = ProductList::findOrFail($id);

        $product_list->orig_quantity = $request->input('orig_quantity');
        $product_list->curr_quantity = $request->input('curr_quantity');
        $product_list->price = $request->input('price');
        $product_list->save();

       
    
        return redirect()->route('product_lists.index')->with('success','Products Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
