<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- viewportを設定しないと、スマートフォンやタブレットでの閲覧時にメディアクエリが正しく機能しない。 --}}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>
        {{-- Scripts --}}
        {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        {{-- Fonts --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  
        {{--bootstrap読み込み--}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        {{-- JavaScript Bundle with Popper --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        {{-- Styles --}}
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/responsive.css') }}" rel="stylesheet">
        
        {{-- Font --}}
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div id="app">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                    <div class="container">
                        <a class="navbar-brand" href="/"><span class="title">Post & Sharing Latte Arts<br>☕️ラテアート投稿・共有サイト☕️</a></spaa>
                        <img class="header-image" src="{{ asset('images/latteart_wb.png') }}" alt="">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-3">
                                <li class="nav-item active"><a class="nav-link" href="/">Home<br>ホーム</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<br>メニュー</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      {{--<a class="dropdown-item" href="/register">利用登録</a>--}}
                                      <a class="dropdown-item" href="/admin/mypage">マイページ/My Page</a>
                                      <a class="dropdown-item" href="/admin/latte/create">新規投稿/New Post</a>
                                    </div>
                                </li> 
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">How to draw<br>描き方について</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="/term#latte_kind_01">フリーポア/Free Pour</a>
                                      <a class="dropdown-item" href="/term#latte_kind_02">エッチング/Etching</a>
                                      <a class="dropdown-item" href="/term#latte_kind_03">3D</a>
                                    </div>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
    
        {{-- main body メイン表示部分--}}
        <main class="py-4">
            {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
            @yield('content')
        </main>
        
        {{-- footer --}}
        <footer class="py-5 bg-secondary">
            <!--<div class="container-footer">-->
            <!--    <p class="float-end mb-1"><a href="#">ページ上部へ<br>Back to top</a>-->
            <!--</div>-->
            <div class="container">
                <p class="m-0 text-center text-white">&copy; 2021-<?php echo date('Y') ?> Post & Sharing Latte Arts.</p>
            </div>
        </footer>
        
        {{-- 「topに戻る」アニメーション実装 --}}
        <a class="pagetop" id="top">TOPに戻る</a>
        <script>
            const topLink = document.getElementById("top");
            let scrollValue;
            {{--画面をスクロールするたびにイベントを発生させる--}}
            window.addEventListener("scroll", () => {
              scrollValue = document.scrollingElement.scrollTop;
            
              {{--設定したスクロール量を超えるかどうかでボタンの表示・非表示を切り替える--}}
              if (scrollValue >= 2500) {
                topLink.style.display = "inline"; {{--ボタンを表示--}}
              } else if (scrollValue < 2500) {
                topLink.style.display = "none"; {{--ボタンを非表示--}}
              }
            });
            
            {{--画面トップに戻る際にアニメーションさせる--}}
            topLink.addEventListener("click", () => {
              window.scroll({top: 0, behavior: 'smooth'});
            });
        </script>
            
    </body>
    
</html>
