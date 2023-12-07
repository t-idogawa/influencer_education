<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use DateTime;

class DeliveryTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_times')->insert([
            [
                'id' => 1,
                'curriculums_id' => 1,
                'delivery_from' => Carbon::createFromTime(9, 0),
                'delivery_to' => Carbon::createFromTime(19, 0),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 2,
                'curriculums_id' => 2,
                'delivery_from' => Carbon::createFromTime(19, 30),
                'delivery_to' => Carbon::createFromTime(23, 0),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
