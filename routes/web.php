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

Auth::routes();// ユーザー認証実装

Route::get('/main', 'HomeController@index')->name('main');//ホーム・メインページ
Route::get('/', 'HomeController@index')->name('main');//ホーム・メインページ


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('latte/create', 'Admin\LatteController@add');
    Route::post('latte/create', 'Admin\LatteController@create');//ラテアート新規投稿
    Route::get('latte', 'Admin\LatteController@index');//投稿の一覧
    Route::get('latte/edit', 'Admin\LatteController@edit');//投稿の編集
    Route::post('latte/edit', 'Admin\LatteController@update');//投稿の更新
    Route::get('latte/delete', 'Admin\LatteController@delete');//投稿の削除
    
    Route::get('member/create', 'Admin\MemberController@add');
    Route::post('member/create', 'Admin\MemberController@create');//メンバー登録
    Route::get('member', 'Admin\MemberController@index');//登録情報の一覧
    Route::get('member/edit', 'Admin\MemberController@edit');//登録情報の編集
    Route::post('member/edit', 'Admin\MemberController@update');//登録情報の更新
    Route::get('member/delete', 'Admin\MemberController@delete');//登録情報の削除
    
    Route::get('mypage', 'Admin\MemberController@mypage');//ユーザーマイページ表示
    
});

