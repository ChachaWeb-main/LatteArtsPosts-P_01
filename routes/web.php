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
    return view('top');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('latte/create', 'Admin\LatteController@add')->middleware('auth');
    Route::post('latte/create', 'Admin\LatteController@create')->middleware('auth');
    Route::post('latte/edit', 'Admin\LatteController@edit')->middleware('auth');
    Route::post('latte/delete', 'Admin\LatteController@delete')->middleware('auth');
    Route::get('latte', 'Admin\LatteController@index')->middleware('auth');

    
    Route::get('member/register', 'Admin\MemberController@add')->middleware('auth');
    Route::get('member/mypage', 'Admin\MemberController@main')->middleware('auth');
});
// ユーザー認証実装
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
