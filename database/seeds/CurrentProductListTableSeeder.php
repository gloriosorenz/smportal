<?php

use Illuminate\Database\Seeder;

class CurrentProductListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('current_product_lists')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/currproductlists.sql'));
        }
    }
}
