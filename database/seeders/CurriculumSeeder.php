<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculums')->insert([
            [
                'id' => 1,
                'title' => 'インフルエンサーとは？',
                'thumbnail' => 'emile-perron-xrVDYZRGdw4-unsplash.jpg', //ファイル名のみ記入
                'description' => 'インフルエンサーになるにはSNSテキストテキスト',
                'video_url' => 'https://www.youtube.com/embed/-cX9tXJEq1U?si=-nLQL35kV_11K--V', //動画のURLを記載しyoutube動画を埋め込み
                'alway_delivery_flg' => 0,
                'classes_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 2,
                'title' => 'フォロワー集客について',
                'thumbnail' => 'emile-perron-xrVDYZRGdw4-unsplash.jpg',
                'description' => 'テキストテキストテキスト',
                'video_url' => 'https://www.youtube.com/embed/5vQU9DEMQIM?si=ZbgOJjwINJuczaSK',
                'alway_delivery_flg' => 0,
                'classes_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
