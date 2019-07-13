<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamageReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calamities_id')->unsigned()->nullable();
            $table->integer('report_statuses_id')->unsigned()->nullable();
            $table->date('calamity_start');
            $table->date('calamity_end');
            $table->date('initial_report_date');
            $table->date('final_report_date');

            $table->integer('provinces_id')->unsigned()->nullable();
            $table->string('crop');
            $table->integer('num_farmers');
            $table->double('standing_crop_area');
            $table->integer('rice_crop_stages_id')->unsigned()->nullable();
            $table->string('harvest_month');

            $table->double('total_area');
            $table->double('totally_damaged_area');
            $table->double('partially_damaged_area');

            $table->double('yield_before');
            $table->double('yield_after');
            $table->double('yield_loss');
            $table->double('volume');
            $table->double('grand_total');

            $table->text('remarks');

            $table->integer('farmers_id')->unsigned()->nullable(); //prepared by
            $table->integer('regions_id')->unsigned()->nullable();
            

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
        Schema::dropIfExists('damage_reports');
    }
}
