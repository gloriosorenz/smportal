<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OrderProduct;
use Carbon\Carbon;
use App\User;
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
        $order_products = OrderProduct::all();

        return view('farmer.order_products.index')
            ->with('pending', $pending)
            ->with('confirmed', $confirmed)
            ->with('paid', $paid)
            ->with('cancelled', $cancelled);
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
        $order = OrderProduct::findOrFail($id);
        $order->order_product_statuses_id = 4;
        $order->save();

        // Notification
        $customer = $order->orders->users;
        Notification::send($customer, new OrderCancelled());

        return redirect()->back()->with('success', 'Order Cancelled');
    }

    public function paid_order(Request $request, $id){
        $order = OrderProduct::findOrFail($id);
        $order->order_product_statuses_id = 3;
        $order->save();

       // Notification
       $customer = $order->orders->users;
       Notification::send($customer, new OrderPaid());

        return redirect()->back()->with('success', 'Order Paid');
    }

    public function pending_order(Request $request, $id){
        $order = OrderProduct::findOrFail($id);
        $order->order_product_statuses_id = 1;
        $order->save();

        // Get email
        $email = $order->orders->users->email;

        // Mail to User
        // Mail::to($email)->send(
        //     new OrderPaid($order)
        // );

        return redirect()->back()->with('success', 'Order Pending');
    }
}
