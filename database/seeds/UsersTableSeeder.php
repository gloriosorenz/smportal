<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            [
                'id' => 1,
                'first_name' => 'Wendy',
                'last_name' => 'Morning',
                'email' => 'admin@admin.com',
                'phone' => '09171234567',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'roles_id' => 1,
                'barangays_id'=> 11220,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 2,
                'first_name' => 'Antonio',
                'last_name' => 'Desalbabida',
                'email' => 'ande@gmail.com',
                'phone' => '09175446351',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Salbabida Farmer Corp.',
                'street'=> '52 Cataduaan St.',
                'no_farmers' => 30,
                'hectares' => 40.50,
                'roles_id' => 2,
                'barangays_id'=> 4,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 3,
                'first_name' => 'Ades',
                'last_name' => 'Velcro',
                'email' => 'a@d.c',
                'phone' => '09178416388',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Sta. Rosa Rice Millers',
                'roles_id' => 3, //Customer
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'barangays_id'=> 4,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 4,
                'first_name' => 'Kanor',
                'last_name' => 'Robledo',
                'phone' => '09178484154',
                'email' => 'kanor@robledo.com',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Magsasaka Co.',
                'street'=> '68 Aduana St.',
                'roles_id' => 4,
                'barangays_id'=> 8,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 5,
                'first_name' => 'A',
                'last_name' => 'COV',
                'email' => 'a@y.c',
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'roles_id' => 1,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 6,
                'first_name' => 'Carl',
                'last_name' => 'Orange',
                'email' => 'c@o.c',
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Ortega Foundation',
                'street'=> '1 Magallanes St.',
                'roles_id' => 4,
                'barangays_id'=> 2,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 7,
                'first_name' => 'Loren',
                'last_name' => 'Glorious',
                'email' => 'renzgloriosooo@gmail.com',
                'phone' => '09178416388',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Sta. Rosa Animal Farmers',
                'street'=> 'Block 9 Lot 2 Legaspi corner Arzobispo Street',
                'roles_id' => 3,
                'barangays_id'=> 9,
                'cities_id'=> 408,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 8,
                'first_name' => 'Guy',
                'last_name' => 'Sabino',
                'email' => 'g@sab.c',
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Guy Sabino Farmery',
                'street'=> '18 Legazpi St.',
                'roles_id' => 4,
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 9,
                'first_name' => 'Jehericho',
                'last_name' => 'Benechingco',
                'email' => 'j@b.c',
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Benechingco Rice Plantation',
                'roles_id' => 3,
                'street'=> '42 Barcelona St.',
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],

            //FARMER SEEDERS
            [
                'id' => 10,
                'first_name' => 'Lardo',
                'last_name' => 'Aristocrat',
                'email' => 'lardoaristocrat@yahoo.com',  //temp
                'phone' => '09178484154', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Samahan ng Magsasaka sa Sta. Rosa Laguna', //temp
                'no_farmers' => 20, //temp
                'hectares' => 4.1, //temp 1.6, 1.0, 2.5
                'roles_id' => 2,
                'street'=> '713 Rizal Blvd.', //temp
                'barangays_id'=> 11220,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],

            [
                'id' => 11,
                'first_name' => 'Gregory',
                'last_name' => 'Trinity',
                'email' => 'gregorytrinity@yahoo.com',  //temp
                'phone' => '09178484154', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Trinity River Irrigators',
                'no_farmers' => 18, //temp
                'hectares' => 5.0, //temp
                'roles_id' => 2,
                'street'=> '42 Barcelona St.', //temp
                'barangays_id'=> 11230,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 12,
                'first_name' => 'Eddy',
                'last_name' => 'Umail',
                'email' => 'eddyumail@example.com',  //temp
                'phone' => '09178484154', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Diezzy River Irrigators Association',
                'no_farmers' => 18, //temp
                'hectares' => 14.5, //temp 2.5 ,1.5 3.5 (5.0)
                'roles_id' => 2,
                'street'=> '32 Mali St.', //temp
                'barangays_id'=> 11217,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],

                // CUSTOMER SEEDERS

            [
                'id' => 13,
                'first_name' => 'Judas',
                'last_name' => 'Vargase',
                'email' => 'judasvargase@gmail.com',  //temp
                'phone' => '09189277549', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'JV Ricemillers',
                'roles_id' => 3,
                'street'=> 'Blk 843 Francis 7 Subd.', //temp
                'barangays_id'=> 2,//11217, //Dita
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            [
                'id' => 14,
                'first_name' => 'Lui-g',
                'last_name' => 'Pana-g',
                'email' => 'luigpanag@gmail.com',  //temp
                'phone' => '09170928492', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'roles_id' => 3,
                'street'=> '96 Fort St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => false,
            ],
            [
                'id' => 15,
                'first_name' => 'Han',
                'last_name' => 'Homingo',
                'email' => 'hanhomingo@gmail.com',  //temp
                'phone' => '09170194829', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'roles_id' => 4,
                'street'=> '42 Taft St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => false,
            ],
            [
                'id' => 16,
                'first_name' => 'Donny',
                'last_name' => 'Mcdonalds',
                'email' => 'donmac@yahoo.com',  //temp
                'phone' => '09179528529', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Mac Greens Association',
                'roles_id' => 4,
                'street'=> '42 Barcelona St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],
            //FARMER SEEDERS
            [
                'id' => 17,
                'first_name' => 'Yulio',
                'last_name' => 'Roarkills',
                'email' => 'yulioroarkills@yahoo.com',  //temp
                'phone' => '09178484154', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Roar Kills', //temp
                'no_farmers' => 14, //temp
                'hectares' => 3.5,
                'roles_id' => 2,
                'street'=> 'Malitlit', //temp
                'barangays_id'=> 11222,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => false,
            ],

            [
                'id' => 18,
                'first_name' => 'Margarita',
                'last_name' => 'Vaseco',
                'email' => 'margaritacaseco@yahoo.com',  //temp
                'phone' => '09178484154', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Malampayan Church',
                'no_farmers' => 12, //temp
                'hectares' => 2.0, //temp
                'roles_id' => 2,
                'street'=> '', //temp
                'barangays_id'=> 11230,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => false,
            ],
            [
                'id' => 19,
                'first_name' => 'Na-ines',
                'last_name' => 'Ilong-ko',
                'email' => 'nainesilongko@yahoo.com',  //temp
                'phone' => '0915892840', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS',
                'company' => 'Winchester Albro',
                'no_farmers' => 17, //temp
                'hectares' => 4.5, //temp 2.5 ,1.5 3.5 (5.0)
                'roles_id' => 2,
                'street'=> '', //temp
                'barangays_id'=> 11217,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
                'active' => true,
            ],


        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }


    }
}
