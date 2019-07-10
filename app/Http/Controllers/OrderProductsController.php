<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OrderProduct;
use Carbon\Carbon;
use App\User;
use App\Season;
// use App\Http\Controllers\Mail;

use Notification;
use App\Notifications\OrderConfirmed;
use App\Notifications\OrderCancelled;
use App\Notifications\OrderPaid;

class OrderProductsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get peding order products
        $pending = OrderProduct::pendingOrderProducts();

        // Get confirmed order products
        $confirmed = OrderProduct::confirmedOrderProducts();

        // Get paid order products
        $paid = OrderProduct::paidOrderProducts();

        // Get cancelled order products
        $cancelled = OrderProduct::cancelledOrderProducts();

        // Get all order products
        // $order_products = OrderProduct::all();

        // Get all order products for current season
        $order_products = OrderProduct::all();

        $latest_season = Season::getLatestSeason();

        $current_season_order_products = OrderProduct::join('original_product_lists', 'order_products.original_product_lists_id', '=', 'original_product_lists_id')
            ->where('seasons_id', '=', $latest_season->id)
            ->get();


        return view('farmer.order_products.index')
            ->with('pending', $pending)
            ->with('confirmed', $confirmed)
            ->with('paid', $paid)
            ->with('cancelled', $cancelled)
            ->with('order_products', $order_products)
            ->with('current_season_order_products', $current_season_order_products)
            ->with('latest_season', $latest_season)
            ;
    }

    public function loadModal($id)
    {
        $order_product = OrderProduct::findOrFail($id);
        // write your process if any
        return view('farmer.order_products.view_product', ['data'=>$order_product])
        // ->with('order_product', $order_product)
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_product = OrderProduct::findOrFail($id);

        return view('farmer.order_products.show')
            ->with('order_product', $order_product)
        ;
    }

    /**
     * Store a newly created resource in storage.
     * Order is now paid
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'receipt' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('logo')){
        // Get filename with extension
        $filenameWithExt = $request->file('logo')->getClientOriginalName();
        // Get just filename 
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('logo')->getClientOriginalExtension();
        // Filename to store 
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload image
        $path = $request->file('logo')->storeAs('public/logos/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpeg';
        };


        $order = OrderProduct::findOrFail($request->order_product_id);
        $order->order_product_statuses_id = 3;
        $order->receipt = $fileNameToStore;
        $order->save();

       // Notification
       $customer = $order->orders->users;
       Notification::send($customer, new OrderPaid());

    

    return redirect()->route('order_products.index')->with('success','Order Paid ');
    }



    public function confirm_order(Request $request, $id){
        $order = OrderProduct::findOrFail($id);
        $order->order_product_statuses_id = 2;
        $order->save();

        // Get email
        $email = $order->orders->users->email;

        // Get Harvest Date
        $harvest_date = $order->product_lists->harvest_date;
        // Get Date Now
        $now = Carbon::now();
        // Get date after 7 days
        $end_date = Carbon::parse($harvest_date)->addDays(7);

        $days = $now->diffIndays($end_date);

        // Notification
        $customer = $order->orders->users;
        Notification::send($customer, new OrderConfirmed());

        

        return redirect()->back()->with('success', 'Order Confirmed');
    }

    public function cancel_order(Request $request, $id){
        $orderproduct = OrderProduct::findOrFail($id);
        
        $orderproduct->update(['order_product_statuses_id'=>4]);    
        $orderproduct->product_lists->update(['curr_quantity' => $orderproduct->product_lists->curr_quantity + $orderproduct->quantity]);                
    

        // Notification
        $customer = $orderproduct->orders->users;
        Notification::send($customer, new OrderCancelled());

        return redirect()->back()->with('success', 'Order Cancelled');
    }

    // public function paid_order(Request $request, $id){
    //     // Validation
    //     $request->validate([
    //         'receipt' => 'image|nullable|max:1999'
    //     ]);

    //     // Handle file upload
    //     if($request->hasFile('logo')){
    //     // Get filename with extension
    //     $filenameWithExt = $request->file('logo')->getClientOriginalName();
    //     // Get just filename 
    //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //     // Get just extension
    //     $extension = $request->file('logo')->getClientOriginalExtension();
    //     // Filename to store 
    //     $fileNameToStore = $filename.'_'.time().'.'.$extension;
    //     // Upload image
    //     $path = $request->file('logo')->storeAs('public/logos/', $fileNameToStore);
    //     } else {
    //         $fileNameToStore = 'noimage.jpeg';
    //     };


    //     $order = OrderProduct::findOrFail($id);
    //     $order->order_product_statuses_id = 3;
    //     $order->receipt = $fileNameToStore;
    //     $order->save();

    //    // Notification
    //    $customer = $order->orders->users;
    //    Notification::send($customer, new OrderPaid());

    //     return redirect()->back()->with('success', 'Order Paid');
    // }

    public function pending_order(Request $request, $id){
        $order = OrderProduct::findOrFail($id);
        $order->order_product_statuses_id = 1;
        $order->save();

        $order->update(['order_product_statuses_id'=>1]);    
        $order->product_lists->update(['curr_quantity' => $order->product_lists->curr_quantity - $order->quantity]);

        // Get email
        $email = $order->orders->users->email;

        // Mail to User
        // Mail::to($email)->send(
        //     new OrderPaid($order)
        // );

        return redirect()->back()->with('success', 'Order Pending');
    }
}
