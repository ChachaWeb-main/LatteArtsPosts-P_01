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

Route::group(['prefix' => 'admin'], function() {
    Route::get('main/index', 'Admin\LatteController@index');
    Route::get('latte/create', 'Admin\LatteController@add');
    Route::post('latte/create', 'Admin\LatteController@create');
    Route::get('member/register', 'Admin\MemberController@add');
    Route::get('member/mypage', 'Admin\MemberController@edit');
    Route::get('member/login', 'Admin\MemberController@login');
});
