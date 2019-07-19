<?php

use Illuminate\Database\Seeder;

class DamageReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('damage_reports')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/damagereports.sql'));
        }

        // id, calamities_id, report_statuses_id, calamity_start, calamity_end, initial_report_date, final_report_date, provinces_id
        // crop, num_farmers, standing_crop_area, rice_crop_stages_id, harvest_month, total_area, totally_damaged_area, partially_damaged_area
        // yield_before, yield_after, yield_loss, volume, grand_total, remarks, farmers_id, regions_id, created_at, updated_at

        // $damage_reports = [
        //     [
        //         'id' => 1, 'calamities_id' => , 'report_statuses_id' =>
        //     ],
        //     [
        //         'id' => 2,
        //         'status' => 'Final',
        //     ],

        // ];

        // foreach ($damage_reports as $dr) {
        //     \App\DamageReport::create($dr);
        // }
    }
}
