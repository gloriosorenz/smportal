<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('street')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('company')->nullable();
            $table->integer('no_farmers')->nullable();
            $table->double('hectares')->nullable();


            // FOREIGN KEYS
            $table->integer('roles_id')->unsigned()->nullable();
            $table->integer('barangays_id')->unsigned()->nullable();
            $table->integer('cities_id')->unsigned()->nullable();
            $table->integer('provinces_id')->unsigned()->nullable();


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
