<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use Illuminate\Database\Eloquent\SoftDeletes;
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

Route::get('order', 'OrderController@index');
Route::post('order/selectdate', 'OrderController@selectdate');
Route::get('order/create', 'OrderController@create');
Route::post('order/create', 'OrderController@store');
Route::get('order/edit/{id}', 'OrderController@edit');
Route::post('order/edit/', 'OrderController@update');
Route::get('order/del/{id}', 'OrderController@del');
Route::post('order/del/', 'OrderController@rmove');
Route::get('/logout', 'OrderController@logout');
Route::get('/order/instock/{id}', 'OrderController@instock');
Route::get('/order/notinstock/{id}', 'OrderController@notinstock');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
