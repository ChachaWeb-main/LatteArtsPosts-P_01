{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メインページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

<main>
    
    <section class="py-1 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>@guest ようこそ " ゲスト/ Guest " さん @else ようこそ " {{ Auth::user()->name }} " さん☕️ @endguest</h1>
                <br>
                <br>
                <h2 class="fw-light">Everyone's Latte Art</h2>
                <p class="lead text-muted">このサイトでは皆さんが<br>
                    描いたラテアートを投稿シェアすることが出来ます。<br>
                    さあ、あなたのラテアートを見てもらいましょう！！<br>
                    This site is a place to post and share the latte art you drew.<br>
                    Let's have a look at your latte art! !!
                </p>
                @guest
                    <a href="/login" class="btn btn-secondary my-2" >{{ __('ログイン/Login') }}</a>
                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                @else
                    <a href="" class="btn btn-secondary my-2" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('ログアウト/Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @endguest
                <a href="/admin/latte/create" class="btn btn-primary my-2">ラテアート新規投稿/New Post for LatteArt</a>
            </div>
        </div>
    </section>
    

    

    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{ asset('storage/image/' . $latest_post->image_path) }}" width="550" height="500" alt="..." /></a>
                        <div class="card-body">
                          　<div class="small text-muted">{{ \Str::limit($latest_post->created_at) }}</div>
                            <h2 class="card-title h4">投稿者：<a href="/admin/mypage">{{ \Str::limit($latest_post->user->name) }}</h2></a>
                            <h3 class="card-title h5">デザイン：{{ \Str::limit($latest_post->design) }}</h3>
                            <p class="card-text">描き方：{{ \Str::limit($latest_post->draw) }}</p>
                            <p class="card-text">{{ \Str::limit($latest_post->text) }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                @foreach($posts as $latte)
                                        @php
                                            $row_date = \Carbon\Carbon::parse($latte->created_at);
                                            $row_date->setToStringFormat('Y/m/d H:i');
                                        @endphp
                                        <div class="card col-lg-6">
                                            <a href="#!"><img class="card-img-top" src="{{ asset('storage/image/' . $latte->image_path) }}" width="600" height="300" alt="..." /></a>
                                            <div class="card-body">
                                                <div class="small text-muted">{{ \Str::limit($latte->created_at) }}</div>
                                                <h2 class="card-title h4">投稿者：<a href="/admin/mypage">{{ \Str::limit($latte->user->name) }}</h2></a>
                                                <h3 class="card-title h5">デザイン：{{ \Str::limit($latte->design) }}</h3>
                                                <p class="card-text">描き方：{{ \Str::limit($latte->draw) }}</p>
                                                <p class="card-text">{{ \Str::limit($latte->text) }}</p>
                                                <!--<a class="btn btn-primary" href="#!">Read more →</a>-->
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination ページネーション-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">新規/Newer</a></li>
                            {{ $posts->links() }}
                            <li class="page-item"><a class="page-link" href="#!">過去/Older</a></li>
                        </ul>
                    </nav>

                    
                </div>
                
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">検索/Search</div>
                        <div class="card-body">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                              <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Categories widget-->
                    <!--<div class="card mb-4">-->
                    <!--    <div class="card-header">用語/Terminology</div>-->
                    <!--    <div class="card-body">-->
                    <!--        <div class="row">-->
                    <!--            <div class="col-sm-6">-->
                    <!--                <ul class="list-unstyled mb-0">-->
                    <!--                    <li><a href="/term">フリーポア</a></li>-->
                    <!--                    <li><a href="/term">エッチング</a></li>-->
                    <!--                    <li><a href="/term">3D</a></li>-->
                    <!--                </ul>-->
                    <!--            </div>-->
                                <!--<div class="col-sm-6">-->
                                <!--    <ul class="list-unstyled mb-0">-->
                                <!--        <li><a href="#!">******</a></li>-->
                                <!--        <li><a href="#!">******</a></li>-->
                                <!--        <li><a href="#!">******</a></li>-->
                                <!--    </ul>-->
                                <!--</div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">登録メンバー　※ここに人数カウンターも実装したい</div>
                            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!<br>これらのサイドウィジェットの中には、好きなものを入れることができます。 それらは使いやすく、Bootstrap 5カードコンポーネントを備えています！<br></div>
                                <p>ここにはニックネームのみ表示させ、名をクリックでメンバー一覧ページへ飛ぶリンクを</p>
                    </div>
                </div>
            </div>
        </div>

    </body>
      
        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</main>
    
@endsection