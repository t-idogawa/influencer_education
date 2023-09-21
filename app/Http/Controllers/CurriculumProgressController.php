<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Classes;
use App\Models\Curriculums;
use App\Models\CurriculumProgress;

class CurriculumProgressController extends Controller
{
    // ユーザー画面_進捗画面表示
    public function progressShowList()
    {
        $id = Auth::id();
        $users = Users::find($id);
        $classes_user = Classes::find($users->classes_id);
        $users->class = $classes_user->name;

        if(empty($users->profile_image)){
            $users->profile_image = 'noimage.png';
        }

        $classes_model = new Classes();
        $classes = $classes_model->getList();

        foreach($classes as $class){
            if($class->id <= 6){
                $class->level = 'primary';
            }elseif($class->id <= 9){
                $class->level = 'junior';
            }else{
                $class->level = 'high';
            }
        }

        $curriculums_model = new Curriculums();
        $curriculums = $curriculums_model->getList();

        foreach($curriculums as $curriculum){

            if($curriculum->classes_id > $users->classes_id){
                $curriculum->inactive = 'inactive';
            }else{
                $curriculum->inactive = '';
            }

            $curriculum_progress = CurriculumProgress::where('curriculums_id', $curriculum->id)->first();
            if(CurriculumProgress::where('curriculums_id', $curriculum->id)->exists() && $curriculum_progress->users_id == $id && $curriculum_progress->clear_flag == 1){
                $curriculum->progress = 'clear';
            }else{
                $curriculum->progress = '';
            }
        }
        

        return view('curriculum_progress', compact('users', 'classes', 'curriculums'));
    }
}
