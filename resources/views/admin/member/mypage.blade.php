{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '新規投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

    <div class="container">
    
        <h1>Myページ</h1>
        
        <p>(◯◯◯＝ログイン名)　　Logout</p>
        
        <h3>プロフィール</h3>
        
        <p>ここに登録情報を表示させる</p>
        
        <h3>ラテアート投稿一覧</h3>
        
        <p>ここに投稿したのものを一覧表示させる</p>
        
    </div>
    