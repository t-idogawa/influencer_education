<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use DB;


class AdminController extends Controller
{
    public function getBanner(){
        return view('admin.admin_banners_show_list');
    }
    public function getArticle(){
        return view('admin.admin_articles_show_list');
    }
    public function getClass(){
        return view('admin.admin_classes_show_list');
    }
}
