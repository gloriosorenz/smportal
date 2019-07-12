<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DamageReport;
use App\Order;
use App\OrderProduct;
use App\Season;
// use App\ProductList;
use App\OriginalProductList;
use App\CurrentProductList;
use App\SeasonList;
use PDF;
use DB;

class SalesReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Admin
        $seasons = Season::all();

        // Farmer
        $authid = auth()->user()->id;

        $seasonfarmer = DB::table('seasons')
            ->join('season_lists', 'seasons.id', '=', 'season_lists.seasons_id')
            // ->select('seasons.*')
            ->where('season_lists.users_id','=',$authid)
            // ->groupby('seasons.id')
            ->get()
            ;

        // dd($seasonfarmer);

        

        return view('reports.sales_reports.index')
            ->with('seasons',$seasons)
            ->with('seasonfarmer',$seasonfarmer)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $product_lists = OriginalProductList::find($id);
        
        // Admin

        $allprodperseason = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('order_product_statuses_id','=',3)
            ->where('seasons_id',$season->id)
            // ->groupBy('orders_id')
            ->get();
            // ->get();
        // dd($allprodperseason);

        $allprodsum = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('order_product_statuses_id','=',3)
            ->select(DB::raw("SUM(price*ordeR_products.quantity) as sum"))  
            ->pluck('sum');

        $allprodquan = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('order_product_statuses_id','=',3)
            ->select(DB::raw("SUM(order_products.quantity) as sum"))  
            ->pluck('sum');
        // dd($allprodquan);

        $lists = SeasonList::where('seasons_id', $season->id)->get();
        // $product_lists = ProductList::where('seasons_id', $season->id)->get();




        // Farmer

        $authid = auth()->user()->id;

        $farprodperseason = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->where('seasons_id',$season->id)
            // ->groupBy('orders_id')
            ->get();
            // ->get();
        // dd($allprodperseason);

        $farprodsum = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->select(DB::raw("SUM(price*order_products.quantity) as sum"))  
            ->pluck('sum');

        $farprodquan = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->select(DB::raw("SUM(order_products.quantity) as sum"))  
            ->pluck('sum');

        return view('reports.sales_reports.show')
            ->with('season', $season)
            ->with('lists', $lists)
            ->with('allprodperseason',$allprodperseason)
            ->with('allprodsum',$allprodsum)
            ->with('allprodquan',$allprodquan)
            ->with('farprodperseason',$farprodperseason)
            ->with('farprodsum',$farprodsum)
            ->with('farprodquan',$farprodquan)
            // ->with('what', $what)
            // ->with('product_lists', $product_lists)
            ;
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

    /**
     * Generates PDF view
     */
    public function pdfview(Request $request, $id)
    {

        // $season = Season::findOrFail($id);
        // $prod_list = ProductList::where('seasons_id', $season->id)->get();

        // $sales = DB::table('orders')
        //         ->where('order_statuses_id', 2)
        //         ->sum('total_price');

        $season = Season::find($id);
        $product_lists = OriginalProductList::find($id);
        
        // Admin

        $allprodperseason = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'poriginal_roduct_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('order_product_statuses_id','=',3)
            ->where('seasons_id',$season->id)
            // ->groupBy('orders_id')
            ->get();
            // ->get();
        // dd($allprodperseason);

        $allprodsum = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('order_product_statuses_id','=',3)
            ->select(DB::raw("SUM(price*quantity) as sum"))  
            ->pluck('sum');

        $allprodquan = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('order_product_statuses_id','=',3)
            ->select(DB::raw("SUM(quantity) as sum"))  
            ->pluck('sum');
        // dd($allprodquan);

        $lists = SeasonList::where('seasons_id', $season->id)->get();
        // $product_lists = ProductList::where('seasons_id', $season->id)->get();




        // Farmer

        $authid = auth()->user()->id;

        $farprodperseason = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->where('seasons_id',$season->id)
            // ->groupBy('orders_id')
            ->get();
            // ->get();
        // dd($allprodperseason);

        $farprodsum = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->select(DB::raw("SUM(price*quantity) as sum"))  
            ->pluck('sum');

        $farprodquan = DB::table('seasons')
            ->join('original_product_lists', 'seasons.id', '=', 'original_product_lists.seasons_id')
            ->join('order_products','original_product_lists.id','=','order_products.original_product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->select(DB::raw("SUM(quantity) as sum"))  
            ->pluck('sum');

    

        // pass view file
        $pdf = PDF::loadView('pdf.sales_report', compact('season', 'lists', 'allprodperseason', 'allprodsum', 'allprodquan', 'farprodperseason', 'farprodsum', 'farprodquan'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('sales_report.pdf');
    }
}
