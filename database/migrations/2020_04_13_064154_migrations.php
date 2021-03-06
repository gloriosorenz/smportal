<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Foreign keys of Users
        Schema::table('users',function(Blueprint $table){
            $table->foreign('roles_id')
                ->references('id')->on('roles')->onDelete('cascade');
        });

        // Season List
        Schema::table('season_lists',function(Blueprint $table){
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seasons_id')
                ->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('season_list_statuses_id')
                ->references('id')->on('season_list_statuses')->onDelete('cascade');
        });

        // Seasons
        Schema::table('seasons',function(Blueprint $table){
            $table->foreign('season_types_id')
                ->references('id')->on('season_types')->onDelete('cascade');
            $table->foreign('season_statuses_id')
                ->references('id')->on('season_statuses')->onDelete('cascade');
        });

        // Product List
        Schema::table('product_lists',function(Blueprint $table){
            $table->foreign('seasons_id')
                ->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('orig_products_id')
                ->references('id')->on('products')->onDelete('cascade');
            $table->foreign('curr_products_id')
                ->references('id')->on('products')->onDelete('cascade');
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
        });

        // Order Products
        Schema::table('order_products',function(Blueprint $table){
            $table->foreign('product_lists_id')
                ->references('id')->on('product_lists')->onDelete('cascade');
            $table->foreign('orders_id')
                ->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('order_product_statuses_id')
                ->references('id')->on('order_product_statuses')->onDelete('cascade');
            $table->foreign('farmers_id')
                ->references('id')->on('users')->onDelete('cascade');
        });

        // Orders
        Schema::table('orders',function(Blueprint $table){
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_statuses_id')
                ->references('id')->on('order_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
