<?php

use Illuminate\Support\Facades\Route;

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

// プロフィール表示
Route::get('/profile', [App\Http\Controllers\UsersController::class, 'profileShow'])->name('profile.show');

// プロフィール変更
Route::post('/profile_edit', [App\Http\Controllers\UsersController::class, 'profileEdit'])->name('profile.edit');

// パスワードフォーム
Route::get('/password', [App\Http\Controllers\UsersController::class, 'password'])->name('password');

// パスワード変更
Route::post('/password_edit', [App\Http\Controllers\UsersController::class, 'passwordEdit'])->name('password.edit');