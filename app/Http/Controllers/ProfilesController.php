<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\OrderProduct;
use App\User;
use App\SeasonList;
use App\Barangay;
use App\Province;
use App\City;
use App\Region;
use App\FarmerList;

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

        // Farmer List
        $farmers = FarmerList::where('users_id', auth()->user()->id)->get();

        // For farmers
        $lagunabarangays = Barangay::where('cities_id','=', 43428)->whereNotIn('id', array(11218, 11219, 11223,11224,11225,11228))->get();
        $calabarzon = Region::where('id','=', 4)->get();
        $starosa = City::where('id','=', 433)->get();
        $laguna = Province::where('id','=',19)->get();

        // For admin
        // $barangays = Barangay::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
    

        // Count total seasons of farmer
        $season_count = SeasonList::where('users_id', auth()->user()->id)
            ->count();

        // Count customers
        $customers = OrderProduct::join('orders', 'order_products.orders_id', '=', 'orders.id')
            ->where('farmers_id', auth()->user()->id)
            ->select('orders.users_id')
            ->groupby('orders.users_id')
            ->get();
        // dd($customers);

        // Get order count for the current month
        $orders = Order::join('order_products', 'orders.id', '=', 'order_products.orders_id')
            // ->select(sum)
            ->where('farmers_id', auth()->user()->id)
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->count();

        // Get monthy income
        $monthly_income = Order::join('order_products', 'orders.id', '=', 'order_products.orders_id')
            ->selectRaw('sum(orders.total_price) as sum')
            ->where('order_products.farmers_id', auth()->user()->id)
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->pluck('sum');
        // dd($monthly_income);

        // Get Transactions
        $transactions = OrderProduct::where('farmers_id', auth()->user()->id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

        // dd($monthly_income);
        return view('profiles.index')
            ->with('user', $user)
            ->with('farmers', $farmers)
            ->with('season_count', $season_count)
            ->with('transactions', $transactions)
            ->with('orders', $orders)
            ->with('monthly_income', $monthly_income)
            ->with('lagunabarangays', $lagunabarangays)
            ->with('calabarzon', $calabarzon)
            ->with('laguna',$laguna)
            ->with('starosa',$starosa)
            ->with('cities',$cities)
            ->with('provinces',$provinces)
            ->with('customers',$customers)
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
        // Validation
        $request->validate([
            'phone' => 'regex:/(09)[0-9]{9}/',
        ]);

        $farmer = new FarmerList;
        $farmer->first_name = $request->input('first_name');
        $farmer->last_name = $request->input('last_name');
        $farmer->phone = $request->input('phone');
        $farmer->users_id = $request->input('users_id');
        $farmer->save();

        return redirect()->route('profile')->with('success','Farmer Created ');
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
        $farmers = Farmerlist::findOrFail($id);

        return view('profiles.edit')
            ->with('farmers', $farmers);
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
        $farmer = Farmerlist::findOrFail($id);
        $farmer->first_name = $request->input('first_name');
        $farmer->last_name = $request->input('last_name');
        $farmer->phone = $request->input('phone');
        // $farmer->users_id = $request->input('users_id');
        $farmer->save();

        return redirect()->route('profile')->with('success','Farmer Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmer = FarmerList::findOrFail($id);
        $farmer->delete();
  
        return redirect()->route('profile')
                        ->with('success','Farmer Removed');
    }
}
