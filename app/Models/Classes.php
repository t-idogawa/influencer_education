<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Classes extends Model
{
    public function getClasses(){
        $classes = Classes::all();
        return $classes;
    }
    public function Curriculum(){
        return $this->hasMany(Curriculums::class,'classes_id');
    }
}
