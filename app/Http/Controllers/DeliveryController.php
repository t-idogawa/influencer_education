<?php

namespace App\Http\Controllers;

use App\Models\Curriculums;
use App\Models\Classes;
use App\Models\CurriculumProgress;
use App\Models\DeliveryTime;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class DeliveryController extends Controller
{
    public function show($id)
    {
        $deliveryInstance = new DeliveryTime();
        $curriculums = Curriculums::find($id);
        //nullの原因を特定する
        //dd($id);
        // if($curriculums === null) {
        //     Log::error("Curriculums not found for ID: $id");
        // }
        //$deliveryFlg = 1;
        $deliveryFlg = $curriculums->alway_delivery_flg; //元々の値を取得
        //dd($deliveryFlg);
        if($deliveryFlg === 1) {
            $viewFlg = true;
        } else {
            $span = $deliveryInstance->getViewTime($id);
            
            if($span != 0) {
                $viewFlg = true;
            } else {
                $viewFlg = false;
            }
        };
        //dd($viewFlg);
        //$user = auth()->id(); 現在認証しているユーザーのIDを取得 各機能連携後にwhere文の引数を$userに変更する
        //CurriculumProgressテーブルのcurriculums_idとuser_idに合致したレコードのclear_flgを$progressに代入
        $progress = CurriculumProgress::where('curriculums_id', $id)->where('users_id', 1)->value('clear_flg');

        return view('delivery', compact('curriculums', 'progress', 'viewFlg'));
    }

    public function update(Request $request)
    {
        $item = $request->id; //ajaxで渡されたdataをrequestから取り出す
        //\Log::info($item);
        //CurriculumProgressテーブルのカラム'curriculums_id'を探して渡された該当idのレコードを$checkに代入
        $check = CurriculumProgress::where('curriculums_id', $item)->first();
        if($check) {
            $check->clear_flg = 1;
            $check->save();
        return response()->json(['message' => 'クリア']);
        }else{
            return response()->json(['message' => '更新失敗']);
        }
    }
}
