<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\OrderProduct;
use App\User;
use App\SeasonList;

use DB;
use Carbon\Carbon;
 
class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Farmers Info
        $user = User::where('id', auth()->user()->id)->first();
    

        // Count total seasons of farmer
        $season_count = SeasonList::where('users_id', auth()->user()->id)
            ->count();

        // Get order count for the current month
        $orders = Order::join('order_products', 'orders.id', '=', 'order_products.orders_id')
            // ->select(sum)
            ->where('farmers_id', auth()->user()->id)
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->count();

        $monthly_income = Order::join('order_products', 'orders.id', '=', 'order_products.orders_id')
            ->selectRaw('sum(orders.total_price) as sum')
            ->where('order_products.farmers_id', auth()->user()->id)
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->pluck('sum');

        // Get Transactions
        $transactions = OrderProduct::where('farmers_id', auth()->user()->id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

        // dd($transactions);
        return view('profile')
            ->with('user', $user)
            ->with('season_count', $season_count)
            ->with('transactions', $transactions)
            ->with('orders', $orders)
            ->with('monthly_income', $monthly_income)
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
