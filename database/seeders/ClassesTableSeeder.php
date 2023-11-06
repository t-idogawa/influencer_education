<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'id' => 1,
                'name' => '小学校1年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 2,
                'name' => '小学校2年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 3,
                'name' => '小学校3年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 4,
                'name' => '小学校4年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 5,
                'name' => '小学校5年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 6,
                'name' => '小学校6年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 7,
                'name' => '中学校1年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 8,
                'name' => '中学校2年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 9,
                'name' => '中学校3年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 10,
                'name' => '高校1年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 11,
                'name' => '高校2年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 12,
                'name' => '高校3年生',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
