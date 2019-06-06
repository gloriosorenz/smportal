<?php

namespace App\Http\Controllers;

use App\User;
use App\Season;
use App\SeasonList;
use App\Product;
use App\ProductList;
use Carbon\Carbon;
use Illuminate\Http\Request;

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


        return view('farmer.product_lists.index')
                ->with('user_products', $user_products)
                ->with('all_products', $all_products)
                ->with('all_user_products', $all_user_products)
                ->with('latest_season', $latest_season)
                ->with('count', $count)
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


        return view('farmer.product_lists.create')
            ->with('users', $users)
            ->with('season', $season)
            ->with('products', $products);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
