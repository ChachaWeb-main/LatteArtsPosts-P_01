{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メイン')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

<section class="py-1 text-center container">
    <div class="top-wrapper">
        <div class="bg-image-1">
            <div class="bg-mask"> <!--bg-imageを透過させるためのdivタブ-->
                <div class="row py-lg-5">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <h1 class="user-name">
                        @guest 
                            ようこそ <span class="text-danger"> ゲスト/ Guest </span> さん 
                        @else 
                            ようこそ <a href="/admin/mypage"> {{ Auth::user()->name }} </a> さん 
                        @endguest
                        </h1>
                        <br>
                        <br>
                        <h2 class="display-5 text-dark fst-italic">☕Everyone's Latte Art☕️</h2>
                        <p class="lead fs-5 text-secondary fst-italic fw-bold lh-lg">このサイトでは皆さんが<br>
                            描いたラテアートを投稿シェアすることが出来ます。<br>
                            さあ、あなたのラテアートを見てもらいましょう！！<br>
                            This site is a place to post and share the latte art you drew.<br>
                            Let's have a look at your latte art! !!
                        </p>
                        @guest
                            <a href="/login" class="btn btn-primary my-2 fw-bold" >{{ __('ログイン/Login') }}</a>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <a href="" class="btn btn-primary my-2 fw-bold" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('ログアウト/Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        @endguest
                        <a href="/admin/latte/create" class="btn btn-warning fw-bold my-2">ラテアート投稿/Post for LatteArt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            @if (!is_null($latest_post))
                <div class="card mb-4 bg-light">
                    <a href="#!"><img class="card-img-top" src="{{ asset('storage/image/' . $latest_post->image_path) }}" width="550" height="500" alt="..." /></a>
                    <div class="card-body">
                      　<div class="date small text-muted">{{ \Str::limit($latest_post->created_at) }}</div>
                        <h2 class="card-title h4">投稿者
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                              <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                              <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                            </svg>
                            <a href="/info?user_id={{ $latest_post->user->id }}">『{{ \Str::limit($latest_post->user->profile->name) }}』</a>
                        </h2>
                        <p class="card-title h5">️デザイン <i class="fas fa-image"></i>『{{ \Str::limit($latest_post->design) }}』</p>
                        <p class="draw card-text h5">描き方
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                              <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                            </svg>『{{ \Str::limit($latest_post->draw) }}』
                        </p>
                        
                        {{-- イイねボタン latest post --}}
                        {{-- goodマーク --}}
                        <i class="good far fa-thumbs-up"></i>
                            {{-- 「イイね」の数を表示 --}}
                            <span class="badge">
                               {{ $latest_post->likes->count() }} 
                            </span>
                        {{-- ユーザ毎に押されたイイねは済表示になるように pluck(user_id)で押したユーザーIDを取得し,
                        collection型になっているため、toArray()で取得したIDを連想配列に、in_arrayで押したユーザーのIDがあるか--}}
                        @auth
                        @if(in_array(Auth::user()->id, $latest_post->likes->pluck('user_id')->toArray()))
                                <span class="fw-bold text-secondary">イイね済</span>
                            </a>
                        @else
                        {{-- もし押したユーザーのIDが存在しないなら、そのままイイねボタン表示 --}}
                            {{--<i class="good far fa-thumbs-up"></i>
                                <span class="badge">
                                   {{ $latest_post->likes->count() }} 
                                </span>--}}
                            <br>
                            <a href="{{ route('like', $latest_post) }}" class="like btn btn-success btn-sm">
                                イイね / like
                            </a>
                        @endif
                        @endauth
                        
                        <p class="card-text">
                            <div class="comment">
                            {{ $latest_post->text }}
                            </div>
                        </p>
                    </div>
                </div>
            @endif
            
            <div class="col-lg-12">
                <div class="row">
                    @foreach($posts as $latte)
                            @php
                                $row_date = \Carbon\Carbon::parse($latte->created_at);
                                $row_date->setToStringFormat('Y/m/d H:i');
                            @endphp
                            <div class="card col-lg-6 bg-light">
                                <a href="#!"><img class="card-img-top" src="{{ asset('storage/image/' . $latte->image_path) }}" width="600" height="300" alt="..." /></a>
                                <div class="card-body">
                                    <div class="date small text-muted">{{ \Str::limit($latte->created_at) }}</div>
                                    <h2 class="card-title h4">投稿者
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                          <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                          <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                                        </svg>
                                        <a href="/info?user_id={{ $latte->user->id }}">『{{ \Str::limit($latte->user->profile->name) }}』</a>
                                    </h2>
                                    <p class="card-title h5">️デザイン <i class="fas fa-image"></i>『{{ \Str::limit($latte->design) }}』</p>
                                    <p class="draw card-text h5">描き方
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                                          <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                                        </svg>『{{ \Str::limit($latte->draw) }}』
                                    </p>
                                    
                                    {{-- イイねボタン --}}
                                    {{-- goodマーク --}}
                                    <i class="good far fa-thumbs-up"></i>
                                        {{-- 「イイね」の数を表示 --}}
                                        <span class="badge">
                                           {{ $latte->likes->count() }} 
                                        </span>
                                    {{-- ユーザ毎に押されたイイねは済表示になるように pluck(user_id)で押したユーザーIDを取得し,
                                    collection型になっているため、toArray()で取得したIDを連想配列に、in_arrayで押したユーザーのIDがあるか--}}
                                    @auth
                                    @if(in_array(Auth::user()->id, $latte->likes->pluck('user_id')->toArray()))
                                        <br>
                                            <span class="fw-bold text-secondary">イイね済</span>
                                        </a>
                                    @else
                                    {{-- もし押したユーザーのIDが存在しないなら、そのままイイねボタン表示 --}}
                                        {{--<i class="good far fa-thumbs-up"></i>
                                            <span class="badge">
                                               {{ $latte->likes->count() }} 
                                            </span>--}}
                                        <br>
                                        <a href="{{ route('like', $latte) }}" class="like btn btn-success btn-sm">
                                            イイね / like
                                        </a>
                                    @endif
                                    @endauth
                                    
                                    <p class="card-text">
                                        <div class="comment">
                                        {{ $latte->text }}
                                        </div>
                                    </p>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
            {{-- Pagination ページネーション--}}
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    {{ $posts->links() }}
                </ul>
            </nav>
        </div>
        {{-- Side widgets--}}
        <div class="col-lg-4">
            {{-- Search widget--}}
            <div class="card mb-4">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg> 
                    検索/Search
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <form>
                        <input class="form-control" type="text" placeholder="検索ワード" aria-label="Enter search term..." aria-describedby="button-search" />
                        <input class="btn btn-primary" id="button-search" type="submit" value="検索" >
                        </form>
                    </div>
                </div>
            </div>
            
            {{-- Side widget--}}
            <div class="card mb-4">
                <div class="card-header">
                    <i class="ranking fas fa-crown"></i> <span class="text">投稿数上位メンバー !<br>Top members by number of posts !</span>
                </div>
                    @foreach($users as $user)
                        <a class="side-widget-name" href="/info?user_id={{ $user->id }}">{{ \Str::limit($user->profile->name) }}</a>
                        <p class="side-widget-count">投稿数 <span class="post-count">{{ $user->lattes_count }}</span></p>
                    @endforeach
            </div>
        </div>
    </div>
</div>

<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection