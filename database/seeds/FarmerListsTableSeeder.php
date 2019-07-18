<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class FarmerListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $items = [

        //     // Larry Aristorenas' farmers
        //     [
        //         'id' => 1,
        //         'first_name' => "Pedro",
        //         'last_name' => "Penduko",
        //         'phone' => "09153445366",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 2,
        //         'first_name' => "Joseph",
        //         'last_name' => "Manalastas",
        //         'phone' => "09166003671",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 3,
        //         'first_name' => "Belen",
        //         'last_name' => "Umali",
        //         'phone' => "09254438763",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 4,
        //         'first_name' => "Peter",
        //         'last_name' => "Trinidad",
        //         'phone' => "09168837688",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 5,
        //         'first_name' => "Michael",
        //         'last_name' => "Salvador",
        //         'phone' => "09156647899",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 6,
        //         'first_name' => "Pedro",
        //         'last_name' => "Penduko",
        //         'phone' => "09153445366",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 7,
        //         'first_name' => "Joseph",
        //         'last_name' => "Manalastas",
        //         'phone' => "09166003671",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 8,
        //         'first_name' => "Belen",
        //         'last_name' => "Umali",
        //         'phone' => "09254438763",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 9,
        //         'first_name' => "Peter",
        //         'last_name' => "Trinidad",
        //         'phone' => "09168837688",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 10,
        //         'first_name' => "Michael",
        //         'last_name' => "Salvador",
        //         'phone' => "09156647899",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 11,
        //         'first_name' => "Pedro",
        //         'last_name' => "Penduko",
        //         'phone' => "09153445366",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 12,
        //         'first_name' => "Joseph",
        //         'last_name' => "Manalastas",
        //         'phone' => "09166003671",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 13,
        //         'first_name' => "Belen",
        //         'last_name' => "Umali",
        //         'phone' => "09254438763",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 14,
        //         'first_name' => "Peter",
        //         'last_name' => "Trinidad",
        //         'phone' => "09168837688",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 15,
        //         'first_name' => "Michael",
        //         'last_name' => "Salvador",
        //         'phone' => "09156647899",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 16,
        //         'first_name' => "Pedro",
        //         'last_name' => "Penduko",
        //         'phone' => "09153445366",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 17,
        //         'first_name' => "Joseph",
        //         'last_name' => "Manalastas",
        //         'phone' => "09166003671",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 18,
        //         'first_name' => "Belen",
        //         'last_name' => "Umali",
        //         'phone' => "09254438763",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 19,
        //         'first_name' => "Peter",
        //         'last_name' => "Trinidad",
        //         'phone' => "09168837688",
        //         'users_id' => 10,
        //     ],
        //     [
        //         'id' => 20,
        //         'first_name' => "Michael",
        //         'last_name' => "Salvador",
        //         'phone' => "09156647899",
        //         'users_id' => 10,
        //     ],

        //     // Gregorio Trinidad's farmers
        // ];


        $faker = Faker::create();

        // foreach ($items as $item) {
        //     \App\FarmerList::create($item);
        // }

        foreach (range(1,30) as $index){
            DB::table('farmer_lists')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'users_id' => $faker->numberBetween (10,12)
            ]);
        }
    }
}
