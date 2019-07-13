<?php

use Illuminate\Database\Seeder;

class ReportStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reportstatus = [
            [
                'id' => 1,
                'status' => 'Initial',
            ],
            [
                'id' => 2,
                'status' => 'Final',
            ],

        ];

        foreach ($reportstatus as $rs) {
            \App\ReportStatus::create($rs);
        }
    }
}
