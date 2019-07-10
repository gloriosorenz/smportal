<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginalProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('original_product_lists', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('seasons_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('products_id')->unsigned()->nullable();
            $table->date('harvest_date')->nullable();
            $table->integer('quantity');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('original_product_lists');
    }
}
