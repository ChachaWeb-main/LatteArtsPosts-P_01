{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '新規投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    
    <div class="container">
        <h2>メンバー登録</h2>
        
        <h3>□ ニックネーム</h3>
            <input type="text">
        
        <h3>□ 性別</h3>
            <select>
                <option value="">--選択してください--</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
            </select>

        <h3>□ メールアドレス</h3>
            <input type="text">
            
        <h3>□ パスワード</h3>
            <input type="text">
            
        <h3></h3>    
        <input type="submit" value="登録">
    </div>   
@endsection