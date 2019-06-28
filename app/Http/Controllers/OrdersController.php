<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use Carbon\Carbon;
use DB;
use PDF;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = auth()->user()->orders()->with('product_lists')->get(); // fix n + 1 issues
        $orders = Order::all();

        // Auto add Cancel Order with Quantity (Pending Status)
        $orderproducts = OrderProduct::where('created_at', '<', Carbon::now()->subDays(3))
            ->where('order_product_statuses_id','=', 1)
            ->get();

            foreach($orderproducts as $op){
                    $op->product_lists->update(['curr_quantity' => $op->product_lists->curr_quantity + $op->quantity]);
                    $op->update(['order_product_statuses_id' => 4]);    
            }

        // Auto add Cancel Order with Quantity (Confirmed Status)
        $orderproducts1 = OrderProduct::where('updated_at', '<', Carbon::now()->subDays(3))
            ->where('order_product_statuses_id','=', 2)
            ->get();

            foreach($orderproducts1 as $op){
                    $op->product_lists->update(['curr_quantity' => $op->product_lists->curr_quantity + $op->quantity]);
                    $op->update(['order_product_statuses_id' => 4]);    
            }

        // Auto check status of Product Order to change status or Order
        $poee = OrderProduct::groupBy('orders_id')->select( 'orders_id', DB::raw( 'AVG(order_product_statuses_id) as avg' ) )->get();
        // dd($poee);

        foreach($poee as $pee){
            // dd($pee);
            if($pee->avg == 3){
                $pee->orders->update(['order_statuses_id'=>2]); // Done
            } elseif ($pee->avg == 4){
                $pee->orders->update(['order_statuses_id'=>4]); // Cancelled
            } else
                $pee->orders->update(['order_statuses_id'=>1]); // Pending
        }

        

        $pending = Order::where('order_statuses_id', 1)->get();
        $done = Order::where('order_statuses_id', 2)->get();
        $cancelled = Order::where('order_statuses_id', 4)->get();
        $order_products = OrderProduct::all();

        // dd($orders);
        return view('admin.orders.index')
            ->with('orders', $orders)
            ->with('pending', $pending)
            ->with('done', $done)
            ->with('cancelled', $cancelled)
            ->with('order_products', $order_products)
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


    public function my_orders(){

        // $orders = auth()->user()->orders()->with('product_lists')->get(); // fix n + 1 issues
        // $orders = Order::where('users_id', '=', auth()->user()->id);
        $orders = Order::all();
        $pending = Order::where('order_statuses_id', 1)->get();
        $done = Order::where('order_statuses_id', 2)->get();
        $cancelled = Order::where('order_statuses_id', 4)->get();
        
        // dd($orders);
        return view('website.my_orders')
            ->with('orders', $orders)
            ->with('pending', $pending)
            ->with('done', $done)
            ->with('cancelled', $cancelled);
    }

    public function pdfview(Request $request, $id)
    {

        $order = Order::findOrFail($id);

        // $farmers = OrderProduct::where('orders_id', $order->id)
        //         ->groupBy('farmers_id')
        //         ->get();

        $farmers = OrderProduct::where('orders_id', $order->id)
                // ->selectRaw('farmers.*')
                ->get()
                ->groupBy('farmers_id');


        $data = $farmers->all();

        // dd($data);
        // dd($farmers);



        // pass view file
        $pdf = PDF::loadView('partials.pdf.invoice', compact('order', 'data', 'farmers'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('invoice.pdf');
    }
}
