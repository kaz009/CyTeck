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
Route::get('/list', 'ProductController@showList')->name('list') ->middleware('auth');
Route::post('/destroy{id}', 'ProductController@destroy')->name('productDestroy');

//新規登録
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/registerButton', 'RegisterController@productRegister')->name('registerButton') ->middleware('auth');
