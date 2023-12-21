<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class Banner extends Model
{
    protected $fillable = [
        'id',
        'image',
        'create_at',
        'update_at'
    ];

    //バナー全件取得
    public function getBanner()
    {
        //DBのカラム'create_at'で新しい順に並べ替え3件取得
        $banners = DB::table('Banners')->orderBy('created_at', 'desc')->take(3)->get();
        return $banners;
    }

    // バナー画像登録
    public function registBanner(Request $request)
    {
        $imagePath = $request->file('image')->store('public');
        $imageName = basename($imagePath);

        Banner::create([
            'image' => $imageName,
        ]);
    }

    // バナー画像削除
    public function deleteBanner($id)
    {
        $banner = Banner::find($id);

        if ($banner) {
            Storage::delete('public/' . $banner->image);
            $banner->delete();
        }
    }
}