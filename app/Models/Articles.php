<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class Articles extends Model
{
    use HasFactory;

    public function getList() {
        // articlesテーブルからデータを取得
        $articles = DB::table('articles')->get();
        return $articles;
    }

    public function registArticle($data) {
        // 新規登録処理
        DB::table('articles')->insert([
            'title' => $data->title,
            'posted_date' => $data->posted_date,
            'article_contents' => $data->article_contents,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }

    public function editArticle($data) {
        // 変更処理
        DB::table('articles')->where('id', $data->id)->update([
            'title' => $data->title,
            'posted_date' => $data->posted_date,
            'article_contents' => $data->article_contents,
            'updated_at' => new DateTime(),
        ]);
    }
}
