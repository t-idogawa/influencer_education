<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_times extends Model
{
    protected $table = 'delivery_times';

    // 月別の配信時間を取得
    public function getDeliveryTimesByYearAndMonth($year,$month)
    {
        return $this->whereMonth('delivery_from', $month)
                    ->whereYear('delivery_from', $year)
                    ->get();
                    
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculums::class, 'id');
    }
}