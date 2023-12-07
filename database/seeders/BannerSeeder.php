<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'id' => 1,
                'image' => 'emile-perron-xrVDYZRGdw4-unsplash.jpg', //ファイル名を記述
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 2,
                'image' => 'emile-perron-xrVDYZRGdw4-unsplash.jpg',
                'created_at' => new DateTime(),
                'updated/at' => new DateTime(),
            ]
            ]);
    }
}
