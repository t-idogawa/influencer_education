<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class Users extends Model
{
    use HasFactory;

    public function editUsers($request, $file_name){
        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'name_kana' => $request->name_kana,
            'email' => $request->email,
            'profile_image' => $file_name,
            'updated_at' => new DateTime(),
        ]);
    }

    public function passwordRegist($request){
        DB::table('users')->where('id', $request->id)->update([
            'password' => $request->password_new,
            'updated_at' => new DateTime(),
        ]);
    }
}
