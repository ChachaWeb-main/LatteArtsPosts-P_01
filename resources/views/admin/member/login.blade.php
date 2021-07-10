{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '新規投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="{{ secure_asset('css/login.css') }}" rel="stylesheet">
    </head>
    
    
    <body class="text-center">
        <main class="form-signin">
            <form>
                <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">ログイン</h1>
                
                <div class="form-floating">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">メールアドレス</label>
                </div>
                
                <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">パスワード</label>
                </div>
                
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> ログイン状態を記録する
                  </label>
                </div>
                
                <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
            </form>
        </main>
    </body>
