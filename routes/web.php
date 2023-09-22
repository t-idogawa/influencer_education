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

//ユーザー側
Route::get('/timetable',[App\Http\Controllers\TimetableController::class,'getTimetable'])->name('timetable');


//管理側//

// ヘッダーのルーティング
Route::get('/admin/banner',[App\Http\Controllers\admin\AdminController::class,'getBanner'])->name('banners.show.list')->middleware('auth:admin');
Route::get('/admin/article',[App\Http\Controllers\admin\AdminController::class,'getArticle'])->name('articles.show.list')->middleware('auth:admin');
Route::get('/admin/classes',[App\Http\Controllers\admin\AdminController::class,'getClass'])->name('classes.show.list')->middleware('auth:admin');

Route::view('/admin/login', 'admin/login')->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
Route::get('admin/logout', [App\Http\Controllers\admin\LoginController::class,'logout'])->name('admin.logout');
Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class,'logout'])->name('admin.logout'); 
Route::view('/admin/register', 'admin/register')->name('admin.register');
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->name('admin.home')->middleware('auth:admin');

