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
    return view("welcome");
});

Auth::routes();

Route::get("/home", "HomeController@index")->name("home");

//商品一覧
Route::get("/list", "ListController@index")->name("list") ->middleware("auth");
Route::post("/showList", "ListController@showList")->name("showList");
Route::post("/destroy{id}", "ListController@destroy")->name("productDestroy");
Route::get("/destroy{id}", "ListController@destroy");
Route::post("/detail{id}", "DetailController@targetProduct") -> name("productDetail");
Route::get("/detail{id}", "DetailController@targetProduct");

//新規登録
Route::get("/productRegister", "RegisterController@index")->name("productRegister");
Route::post("/registerButton", "RegisterController@productRegister")->name("registerButton") ->middleware("auth");

//商品詳細画面
Route::get("/detail", "DetailController@index")->name("detail");
Route::POST("/editButton{id}", "EditController@targetProduct")->name("editButton") ->middleware("auth");

//商品編集ページ
Route::get("/edit", "EditController@index")->name("edit");
Route::post("/productEdit{id}", "EditController@productEdit")->name("productEdit");
