<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Curriculums extends Model
{
    public function getCurriculums(){
        $curriculums = Curriculums::all();
        return $curriculums;
    }
    public function deliveryTime()
    {
        return $this->hasMany(Delivery_times::class, 'curriculums_id');
    }
    public function class()
    {
        return $this->belongsTo(classes::class, 'id');
    }
}
