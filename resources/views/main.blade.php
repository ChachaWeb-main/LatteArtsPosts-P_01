{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メインページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>ようこそ " {{ Auth::user()->name }} " さん </h1>
                <br>
                <br>
                <h1 class="fw-light">Everyone's Latte Art</h1>
                <p class="lead text-muted">このサイトは皆さんが描いたラテアートを投稿シェアする場です。<br>
                 さあ、あなたのラテアートを見てもらいましょう！！<br>
                 This site is a place to post and share the latte art you drew.<br>
                 Let's have a look at your latte art! !!
                </p>
                @guest
                    <a class="nav-link" href="/login">{{ __('Login') }}</a>
                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                @else
                    <a href="" class="btn btn-secondary my-2" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('ログアウト/Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @endguest
                <a href="/admin/latte/create" class="btn btn-primary my-2">ラテアート新規投稿/New Post for LatteArt</a>
            </div>
        </div>
    </section>
    
    <div class="row">
        <div class="list-latte col-md-10 mx-auto">
            <div class="row">
                <!--全てのラテ投稿データ-->
                <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th witdh="15%">ユーザー名</th>
                            　　<th width="5%">投稿日</th>
                            　　<th width="10%">ラテアート</th> 
                                <th width="15%">デザイン</th>
                            　　<th width="10%">描き方</th>
                            　　<th width="30%">フリーテキスト</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $latte)
                                <tr>
                                    <td>{{ $latte->id }}</td>
                                    <td>{{ \Str::limit($latte->user->name, 50) }}</td>
                                    <td>{{ \Str::limit($latte->created_at, 50) }}</td>
                                    <td><img src="{{ asset('storage/image/' . $latte->image_path) }}" width="50px"></td>
                                    <td>{{ \Str::limit($latte->design, 50) }}</td>
                                    <td>{{ \Str::limit($latte->draw, 100) }}</td>
                                    <td>{{ \Str::limit($latte->text, 100) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                <!--BootsStrapのcardを利用してラテ投稿一覧を表示-->
                @foreach($posts as $latte)
                    <div class="card col-4">
                        <a href="#!"><img class="card-img-top" src="{{ asset('storage/image/' . $latte->image_path) }}" width="350%" height="350" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ \Str::limit($latte->created_at) }}</div>
                                <h2 class="card-title h4">投稿者：{{ \Str::limit($latte->user->name) }}</h2>
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
    <br>
    <br>
    
    <!--見つけたNewデザイン-->
    <!-- Page header with logo and tagline-->
    <body>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                        <div class="card-body">
                          　<div class="small text-muted">January 1, 2021</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">新規/Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">10</a></li>
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
                    <div class="card mb-4">
                        <div class="card-header">用語/Terminology</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">フリーポア</a></li>
                                        <li><a href="#!">エッチング</a></li>
                                        <li><a href="#!">3D</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">******</a></li>
                                        <li><a href="#!">******</a></li>
                                        <li><a href="#!">******</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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