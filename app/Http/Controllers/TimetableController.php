<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Curriculums;
use App\Models\Delivery_times;
use Carbon\Carbon;


class TimetableController extends Controller
{
    public function showTimetable($class_id, $year, $month = null) {
        try {
            $classesModel = new Classes();
            $curriculumsModel = new Curriculums();
            $delivery_timesModel = new Delivery_times();
    
            // モデルからデータを取得
            $classes = $classesModel->getClasses();
            $curriculums = $curriculumsModel->getCurriculums();
    
            // クライアントから送信された年と月を取得
            $currentYear = $year;
            $currentMonth = $month ?? now()->month;
    
            $delivery_times = $delivery_timesModel->getDeliveryTimesByYearAndMonth($currentYear, $currentMonth);
    
            foreach ($delivery_times as $delivery_time) {
                $formattedDeliveryFrom = Carbon::parse($delivery_time->delivery_from)->format('n月j日 H:i');
                $formattedDeliveryTo = Carbon::parse($delivery_time->delivery_to)->format('H:i');
                $delivery_time->formatted_delivery = $formattedDeliveryFrom . "〜" . $formattedDeliveryTo;
            }
    
            $curriculums = $curriculums->where('classes_id', $class_id);   
            return view('user_timetable', [
                'classes' => $classes,
                'curriculums' => $curriculums,
                'delivery_times' => $delivery_times,
                'currentYear' => $currentYear,
                'currentMonth' => $currentMonth,
                'class_id' => $class_id,
            ]);
        } catch (\Exception $e) {
            return back();
        }
    }    
}