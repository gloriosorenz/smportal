<?php

use Illuminate\Database\Seeder;

class SeasonListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('season_lists')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/seasonlists.sql'));
        }
    }
}
