{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メンバーページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

    <div class="container">
    
        <h1>Myページ</h1>
        <br>
        <br>
        <br>
        
        <p>(◯◯◯＝ログイン名)</p>
        <!--<div class="form-button">-->
        <!--    {{ csrf_field() }}-->
        <!--    <input type="submit" value="ログアウト/Log Out">-->
        <!--</div>-->
        <!-- 登録したメンバー名で表示させたい -->
        <br>
        <br>
        <br>
        
        <h3>プロフィール</h3>
        <p>ここに登録情報を表示させる</p>
        <!-- views/admin/member/index.blade.php -->
        <br>
        <br>
        <br>
        
        <h3>ラテアート投稿一覧</h3>
        <p>ここに投稿したのものを一覧表示させる</p>
        <!-- vies/admin/latte/index.blade.php-->
        <br>
        <br>
        <br>
    
@endsection