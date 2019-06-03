<?php

use Illuminate\Database\Seeder;

class ProductListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('product_lists')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/productlists.sql'));
        }
    }
}
