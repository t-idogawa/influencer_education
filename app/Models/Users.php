<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    public function curriculumProgress() {
        return $this->hasMany('App\Models\CurriculumProgress');
    }

    public function classes() {
        return $this->belongsTo(Classes::class, 'classes_id');
    }
}
