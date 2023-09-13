<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ユーザー画面_お知らせ一覧
Route::get('/articles', [App\Http\Controllers\ArticlesController::class, 'articlesDetail'])->name('articles.detail');

//管理画面_お知らせ一覧
Route::get('/admin/articles_admin', [App\Http\Controllers\ArticlesController::class, 'articlesShowList'])->name('articles.show.list');

//管理画面_お知らせ新規登録
Route::get('/admin/articles_detail_admin', [App\Http\Controllers\ArticlesController::class, 'articlesDetailAdminNew'])->name('articles.detail.admin.new');

//管理画面_お知らせ変更
Route::post('/admin/articles_detail_admin', [App\Http\Controllers\ArticlesController::class, 'articlesDetailAdmin'])->name('articles.detail.admin');

//管理画面_お知らせ変更→登録
Route::post('/admin/articles_detail_regist', [App\Http\Controllers\ArticlesController::class, 'articlesRegist'])->name('articles.regist');

//管理画面_お知らせ削除
Route::post('/admin/articles_delete', [App\Http\Controllers\ArticlesController::class, 'articlesDelete'])->name('articles.delete');
