<?php

use Illuminate\Database\Seeder;

class OriginalProductListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('original_product_lists')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/origproductlists.sql'));
        }
    }
}