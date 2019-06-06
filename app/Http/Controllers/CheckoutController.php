<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
            return redirect()->route('product_lists.show_products');
        }


        $order_date = Carbon::now();

        return view('website.checkout')
            ->with([
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTotal' => getNumbers()->get('newTotal'),
            ])
            ->with('order_date', $order_date);
    }
}
