<?php

namespace App\Http\Controllers;

use App\Models\Curriculums;
use App\Models\Classes;
use App\Models\CurriculumProgress;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function show($id)
    {
        $deliveryInstance = new DeliveryTime();
        $delivery = $deliveryInstance->getDeliveryTime($id); //変数を返す必要があるか？
        $curriculums = Curriculums::find($id);
        $time = $deliveryInstance->getTime($id);
        $alwayFlg = $curriculums->alway_delivery_flg;
        //dd($alwayFlg);
        //dd($time);
        //dd($curriculums);
        //$user = auth()->id(); 現在認証しているユーザーのIDを取得 各機能連携後にwhere文の引数を$userに変更する
        //CurriculumProgressテーブルのcurriculums_idとuser_idに合致したレコードのclear_flgを$progressに代入
        $progress = CurriculumProgress::where('curriculums_id', $id)->where('users_id', 1)->value('clear_flg');

        return view('delivery', compact('curriculums', 'progress', 'alwayFlg'));
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
