<?php

use Illuminate\Database\Seeder;

class RiceCropStagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rice_crop_stage = [
            [
                'id' => 1,
                'stage' => 'Seedling',
            ],
            [
                'id' => 2,
                'stage' => 'Maturing',
            ],
            [
                'id' => 3,
                'stage' => 'Reproductive',
            ],
            [
                'id' => 4,
                'stage' => 'Vegetative',
            ],

        ];

        foreach ($rice_crop_stage as $rcs) {
            \App\RiceCropStage::create($rcs);
        }
    }
}
