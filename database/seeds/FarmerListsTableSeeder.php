<?php

use Illuminate\Database\Seeder;

class FarmerListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            // Larry Aristorenas' farmers
            [
                'id' => 1,
                'first_name' => "Pedro",
                'last_name' => "Penduko",
                'phone' => "09153445366",
                'users_id' => 10,
            ],
            [
                'id' => 2,
                'first_name' => "Joseph",
                'last_name' => "Manalastas",
                'phone' => "09166003671",
                'users_id' => 10,
            ],
            [
                'id' => 3,
                'first_name' => "Belen",
                'last_name' => "Umali",
                'phone' => "09254438763",
                'users_id' => 10,
            ],
            [
                'id' => 4,
                'first_name' => "Peter",
                'last_name' => "Trinidad",
                'phone' => "09168837688",
                'users_id' => 10,
            ],
            [
                'id' => 5,
                'first_name' => "Michael",
                'last_name' => "Salvador",
                'phone' => "-0156647899",
                'users_id' => 10,
            ],

        ];

        foreach ($items as $item) {
            \App\FarmerList::create($item);
        }
    }
}
