<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    protected $fillable = ['orders_id', 'product_lists_id', 'quantity','order_product_statuses_id', 'farmers_id'];


    public function orders()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function product_lists()
    {
        return $this->belongsTo(ProductList::class, 'product_lists_id');
    }

    public function order_product_statuses()
    {
        return $this->belongsTo(OrderProductStatus::class, 'order_product_statuses_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'farmers_id');
    }





    // Get peding order products
    public static function pendingOrderProducts(){
        return $pending = OrderProduct::where('farmers_id', auth()->user()->id)
                ->where('order_product_statuses_id', 1)
                ->get();
    }

    // Get confirmed order products
    public static function confirmedOrderProducts(){
        return $pending = OrderProduct::where('farmers_id', auth()->user()->id)
                ->where('order_product_statuses_id', 2)
                ->get();
    }

    // Get paid order products
    public static function paidOrderProducts(){
        return $pending = OrderProduct::where('farmers_id', auth()->user()->id)
                ->where('order_product_statuses_id', 3)
                ->get();
    }

    // Get cancelled order products
    public static function cancelledOrderProducts(){
        return $pending = OrderProduct::where('farmers_id', auth()->user()->id)
                ->where('order_product_statuses_id', 4)
                ->get();
    }
}
