<?php

namespace App\Http\Controllers;

use App\Models\Top;
use Illuminate\Http\Request;
use App\Models\Articles; //別途作成モデル呼び出し
use App\Models\Banner;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //お知らせ一覧データ取得＆バナーデータ取得と表示
    {
        //お知らせ一覧データ取得
        $query = new Articles();
        $articles = $query->getList();
        //バナーデータ取得
        $data = new Banner();
        $banners = $data->getBanner();

        return view('UserTop', compact('articles','banners'));
    }


}
