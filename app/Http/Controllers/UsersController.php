<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class UsersController extends Controller
{
    // プロフィール画面
    public function profileShow()
    {
        $id = Auth::id();
        $profiles = Users::find($id);

        if(empty($profiles->profile_image)){
            $profiles->profile_image = 'noimage.png';
        }

        return view('profile', ['profiles' => $profiles]);
    }

    // プロフィール変更
    public function profileEdit(ProfileRequest $request){
        $request_id = $request->id;
        $request_img = $request->file('profile_image');

        if($request_img){
            // アップロードされたファイル名を取得
            $file_name = $request_img->getClientOriginalName();
            $img_path = $request->file('profile_image')->storeAs('public/', $file_name);
        }else{
            $file_name = Users::find($request_id)->profile_image;
        }

        // トランザクション開始
        DB::beginTransaction();

        try {
            $query = new Users();
            $query->editUsers($request, $file_name);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        return redirect()->route('profile.show');
    }

    //パスワードフォーム
    public function password(){
        $id = Auth::id();

        return view('password', ['id' => $id]);
    }

    // パスワード変更
    public function passwordEdit(PasswordRequest $request){

        $request->password_new = Hash::make($request->password);
        // トランザクション開始
        DB::beginTransaction();

        try {
            $query = new Users();
            $query->passwordRegist($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        return redirect()->route('profile.show');
    }
}
