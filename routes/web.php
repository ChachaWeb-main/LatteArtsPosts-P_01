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

Route::get('/', function () { return view('main');});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('latte/create', 'Admin\LatteController@add');
    Route::post('latte/create', 'Admin\LatteController@create');
    Route::get('latte', 'Admin\LatteController@index');
    Route::get('latte/edit', 'Admin\LatteController@edit');
    Route::post('latte/delete', 'Admin\LatteController@delete');
    
    Route::post('member/create', 'Admin\MemberController@create');
    Route::get('member/mypage', 'Admin\MemberController@main');
});
// ユーザー認証実装
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
