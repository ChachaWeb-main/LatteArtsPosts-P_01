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
                <h1 class="fw-light">みんなのラテアート作品️</h1>
                <p class="lead text-muted">このサイトは皆さんが描いたラテアートを投稿シェアする場です。<br>
                 さあ、あなたのラテアートを見てもらいましょう！！
                </p>
                <p>
                 <a href="/admin/latte/create" class="btn btn-primary my-2">ラテアート投稿</a>
                </p>
            </div>
        </div>
    </section>
    <span class="glyphicon glyphicon-search" aria-hidden="true">検索</span>
    <!--<h2><i class="fas fa-search"></i> 検索</h2>-->
    <div class="search">
      <form class="col-12 col-lg-5 mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
      </form>
    </div>
    
    <div class="row">
        <div class="list-latte col-md-12 mx-auto">
            <div class="row">
                
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                        　　<th width="5%">投稿日</th>
                        　　<th width="10%">ラテアート</th> 
                            <th width="10%">デザイン</th>
                        　　<th width="10%">描き方</th>
                        　　<th width="50%">フリーテキスト</th>
                        　　<th with="5%">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $latte)
                            <tr>
                                <th>{{ $latte->id }}</th>
                                    <td>{{ \Str::limit($latte->created_at, 50) }}</td>
                                    <td><img src="{{ asset('storage/image/' . $latte->image_path) }}" width="50px"></td>
                                    <td>{{ \Str::limit($latte->design, 50) }}</td>
                                    <td>{{ \Str::limit($latte->draw, 100) }}</td>
                                    <td>{{ \Str::limit($latte->text, 100) }}</td>
                                    <td>
                                         <!--ハンバーガーメニュー実装下書き -->
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                          <span class="navbar-toggler-icon"></span>
                                        </button>
                                         <!--ナビゲーションメニュー -->
                                        <div class="collapse navbar-collapse" id="navbarNav">
                                          <ul class="navbar-nav">
                                            <li class="nav-item active">
                                              <a class="nav-link" href="{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" >編集/<br>Edit</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" href="{{action('Admin\LatteController@delete', ['id' => $latte -> id]) }}">削除/<br>Delete</a>
                                          </ul>
                                        </div>
                                        
                                        <!--<div>-->
                                        <!--    <a href = "{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" >削除/<br>Delete</a>-->
                                        <!--</div>-->
                                        <!--<div>-->
                                        <!--    <a href = "{{action('Admin\LatteController@delete', ['id' => $latte -> id]) }}">削除/<br>Delete</a>-->
                                        <!--</div>-->
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!--Bootstrp-->
    <div class="album py-5 bg-light">
      <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                  <div class="card-body">
                        <p class="card-text">デザイン、描き方、フリーテキストを表示</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">イイねボタン</button>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
        
            <div class="col">
              <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                  <div class="card-body">
                        <p class="card-text">デザイン、描き方、フリーテキストを表示</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">イイねボタン</button>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            
            <div class="col">
              <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                  <div class="card-body">
                        <p class="card-text">デザイン、描き方、フリーテキストを表示</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">イイねボタン</button>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
    
            <div class="col">
              <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                  <div class="card-body">
                        <p class="card-text">デザイン、描き方、フリーテキストを表示</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">イイねボタン</button>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            
            <div class="col">
              <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                  <div class="card-body">
                        <p class="card-text">デザイン、描き方、フリーテキストを表示</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">イイねボタン</button>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            
            <div class="col">
               <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                  <div class="card-body">
                        <p class="card-text">デザイン、描き方、フリーテキストを表示</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">イイねボタン</button>
                        </div>
                      </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
</main>
    
    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
            <a href="#">ページ上部へ</a>
        </div>
    </footer>
    
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection