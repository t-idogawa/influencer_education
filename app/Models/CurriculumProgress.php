<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curriculums;
use Illuminate\Support\Facades\DB;

class CurriculumProgress extends Model
{
    use HasFactory;

    public function curriculum() {
        return $this->belongsTo(Curriculums::class, 'curriculums_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getClearFlg($id) { //右側のclear_flgによる操作を移動させる
    }
}
