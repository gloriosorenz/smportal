<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CheckoutRequest;
use Carbon\Carbon;
use App\Order;
use App\OrderProduct;
// use App\ProductList;
use App\CurrentProductList;

use App\User;

use Notification;
use App\Notifications\OrderCreated;

class CheckoutController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop');
        }

        $order_date = Carbon::now();

        return view('website.checkout')
            ->with([
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTotal' => getNumbers()->get('newTotal'),
            ])
            ->with('order_date', $order_date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer available.');
        }

        $contents = Cart::content()->map(function ($item) {
            return $item->model->products->type.', '.$item->qty;
        })->values()->toJson();

            $order = $this->addToOrdersTables($request, null);

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();




            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        
    }

    protected function addToOrdersTables($request, $error)
    {

        $random = str_shuffle('1234567890');
        $tracking_id = substr($random, 0, 6);

        $orders = Order::all();

        // foreach($oredrs as $order){
        //     do{

        //     }while($order);
        // }


        // Insert into orders table
        $order = Order::create([
            // 'users_id' => auth()->user() ? auth()->user()->id : null,
            'users_id' => auth()->user()->id,
            'total_price' =>  getNumbers()->get('newTotal'),
            'order_statuses_id' => 1,
            'order_date' => \Carbon\Carbon::now(),
            'tracking_id' => $tracking_id,
        ]);


        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'orders_id' => $order->id,
                'original_product_lists_id' => $item->model->id,
                'current_product_lists_id' => $item->model->id,
                'product_types_id'=> $item->model->products->id,
                'purchase_price'=> $item->model->price,
                'quantity' => $item->qty,
                'order_product_statuses_id' => 1,
                'farmers_id' => $item->model->users->id,
            ]);

            // Notification
            $customer = $order->users;
            // dd($farmer);
            Notification::send($customer, new OrderCreated());
        }


        return $order;

    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = CurrentProductList::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);


            /*
            $product = ProductList::find($item->model->id);
            $product = $product->curr_quantity - $item->qty;
            $product->update($product->id, ['curr_quantity']);
            */
        }
    }

    protected function increaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = CurrentProductList::find($item->model->id);

            $product->update(['quantity' => $product->quantity + $item->qty]);


            /*
            $product = ProductList::find($item->model->id);
            $product = $product->curr_quantity - $item->qty;
            $product->update($product->id, ['curr_quantity']);
            */
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = CurrentProductList::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }

}
