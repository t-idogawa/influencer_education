<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Classes extends Model
{
    use HasFactory;

    public function curriculums() {
        return $this->hasMany('App\Models\Curriculums');
    }

    public function users() {
        return $this->hasMany('App\Models\CurriculumProgress');
    }

    public function getList() {
        // classesテーブルからデータを取得
        $classes = DB::table('classes')->get();

        return $classes;
    }
}
