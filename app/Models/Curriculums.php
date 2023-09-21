<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculums extends Model
{
    use HasFactory;

    public function curriculumProgress() {
        return $this->hasMany('App\Models\CurriculumProgress');
    }

    public function classes() {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    public function getList() {
        // curriculumslassesテーブルからデータを取得
        $curriculums = DB::table('curriculums')->get();

        return $curriculums;
    }
}
