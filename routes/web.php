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

Route::get('/top', [App\Http\Controllers\TopController::class, 'index'])->name('top');

Route::get('/delivery/{id}',[App\Http\Controllers\DeliveryController::class, 'show'])->name('delivery');

Route::post('/update', [App\Http\Controllers\DeliveryController::class, 'update'])->name('update');

Route::post('/test',function(){return 'abc';})->name('test');

