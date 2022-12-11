<?php

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

Route::get('/home', 'HomeController@index')->name('home');

//商品一覧
Route::get('/list', 'ListController@showList')->name('list') ->middleware('auth');
Route::post('/destroy{id}', 'ListController@destroy')->name('productDestroy');

//ここがdetailのためのID取得
Route::post('/detail{id}', 'DetailController@index') -> name('productDetail');

//新規登録
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/registerButton', 'RegisterController@productRegister')->name('registerButton') ->middleware('auth');

//商品詳細画面
Route::get('/detail', 'DetailController@index')->name('detail');