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


Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Admin\Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth:admin'], function() {
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::get('/', 'Admin\HomeController@index')->name('home');
    
    // 一覧画面 - /admin/news 
    Route::get('/news', 'Admin\NewsController@index')->name('news.index');
    // 登録画面 - /admin/create 
    Route::get('/news/create', 'Admin\NewsController@create')->name('news.create');
    // 登録処理 - /admin/create 
    Route::post('/news/create', 'Admin\NewsController@store')->name('news.store');
    // 編集画面 - /admin/news/1/edit
    Route::get('/news/{news}/edit', 'Admin\NewsController@edit')->name('news.edit');
    // 更新処理 - /admin/news/1/update
    Route::put('/news/{news}/update', 'Admin\NewsController@update')->name('news.update');
    // 削除処理 - /admin/news/1/delete
    Route::delete('/news/{news}/delete', 'Admin\NewsController@delete')->name('news.delete');
});