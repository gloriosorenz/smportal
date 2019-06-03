<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeasonTypeTableSeeder::class);
        $this->call(SeasonStatusTableSeeder::class);
        $this->call(SeasonListStatusTableSeeder::class);
        $this->call(ProductsTableSeeder::class);


        $this->call(SeasonTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SeasonListsTableSeeder::class);
        $this->call(ProductListsTableSeeder::class);

    }
}
