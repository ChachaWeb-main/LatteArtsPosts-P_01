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

Route::get('/term', 'HomeController@term');//ラテアート描き方解説ページ
Route::get('/info', 'HomeController@info');//各ユーザー毎のプロフィール閲覧用

Route::get('/like/{latte}', 'LikeController@like')->name('like');//良いね機能
Route::get('/unlike/{latte}', 'LikeController@unlike')->name('unlike');//良いね取り消し機能

Route::group(['middleware' => 'owner_auth'], function () {
    Route::get('admin/latte', 'Admin\LatteController@index');//投稿の一覧
    Route::get('admin/profile', 'Admin\ProfileController@index');//登録情報の一覧
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('latte/create', 'Admin\LatteController@add');
    Route::post('latte/create', 'Admin\LatteController@create');//ラテアート新規投稿
    Route::get('latte/edit', 'Admin\LatteController@edit');//投稿の編集
    Route::post('latte/edit', 'Admin\LatteController@update');//投稿の更新
    Route::get('latte/delete', 'Admin\LatteController@delete');//投稿の削除
    // Route::get('latte', 'Admin\LatteController@index');//投稿の一覧
    
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');//メンバー登録
    Route::get('profile/edit', 'Admin\ProfileController@edit');//登録情報の編集
    Route::post('profile/edit', 'Admin\ProfileController@update');//登録情報の更新
    Route::get('profile/delete', 'Admin\ProfileController@delete');//登録情報の削除
    // Route::get('profile', 'Admin\ProfileController@index');//登録情報の一覧
    Route::get('mypage', 'Admin\ProfileController@mypage');//ユーザーマイページ表示
    
});