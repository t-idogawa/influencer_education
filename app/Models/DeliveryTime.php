<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DeliveryTime extends Model
{
    use HasFactory;

    public function curriculums() {
        return $this->belongsTo(curriculums::class, 'curriculums_id');
    }

    public function getDeliveryTime($id) {
        //現在時刻の取得
        $nowTime = Carbon::now();
        //該当のcurriculums_idに紐付いたdelivery_timesテーブルのレコードを取得
        $recode = DB::table('delivery_times')->where('curriculums_id', $id)->first();
        //現在時刻が時間内か時間外かでalways_delivery_flgの値を変更して保存 always_delivery_flgの初期値を変数に保存
        if($recode) {
            $startTime = Carbon::parse($recode->delivery_from);
            $endTime = Carbon::parse($recode->delivery_to);

            if($nowTime->between($startTime, $endTime)) {
                DB::table('curriculums')->where('id', $id)->update(['alway_delivery_flg' => 1]);
            } else {
                DB::table('curriculums')->where('id', $id)->update(['alway_delivery_flg' => 0]);
            }
        } else {
            //$recodeがnullの時の処理を記入 returnでtopに返す？
            return view('userTop');
        }
    }

    public function getTime($id) {
        $lesson = DB::table('delivery_times')->where('curriculums_id', $id)->get();

        return $lesson;
    }

}