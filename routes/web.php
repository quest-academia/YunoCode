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
    //トップページを表示する
    Route::get('/', 'FrontTopPageController@index')->name('/');

    //商品関連のページを表示する
    Route::resource('products', 'FrontProductsController', ['only' => ['index', 'show', 'create', 'store']]);
    Route::post('Search','FrontProductsController@search')->name('search');

    //ログイン画面の表示をする
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
