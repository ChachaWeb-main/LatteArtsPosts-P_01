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
                <h1 class="fw-light">みんなのラテアート作品️<br>Everyone's Latte Art</h1>
                <p class="lead text-muted">このサイトは皆さんが描いたラテアートを投稿シェアする場です。<br>
                 さあ、あなたのラテアートを見てもらいましょう！！<br>
                 This site is a place to post and share the latte art you drew.<br>
                 Let's have a look at your latte art! !!
                </p>
                <p>
                 <a href="/admin/latte/create" class="btn btn-primary my-2">ラテアート新規投稿/New Post for LatteArt</a>
                </p>
            </div>
        </div>
    </section>
      
    <div class="row">
        <div class="list-latte col-md-10 mx-auto">
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
                                        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
                                        <!--  <span class="navbar-toggler-icon"></span>-->
                                        <!--</button>-->
                                        <!--ナビゲーションメニュー -->
                                        <!--<div class="collapse navbar-collapse" id="navbarNav">-->
                                        <!--  <ul class="navbar-nav">-->
                                        <!--    <li class="nav-item active">-->
                                        <!--      <a class="nav-link" href="{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" >編集/<br>Edit</a>-->
                                        <!--    </li>-->
                                        <!--    <li class="nav-item">-->
                                        <!--      <a class="nav-link" href="{{action('Admin\LatteController@delete', ['id' => $latte -> id]) }}">削除/<br>Delete</a>-->
                                        <!--  </ul>-->
                                        <!--</div>-->
                                        
                                        <div>
                                            <a href = "{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" >編集/<br>Edit</a>
                                        </div>
                                        <div>
                                            <a href = "{{action('Admin\LatteController@delete', ['id' => $latte -> id]) }}">削除/<br>Delete</a>
                                        </div>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                      <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                      <div class="card-body">
                          <div class="small text-muted">January 1, 2021</div>
                          <h2 class="card-title">Featured Post Title</h2>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
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
                      <div class="card-header">Side Widget</div>
                      <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!<br>これらのサイドウィジェットの中には、好きなものを入れることができます。 それらは使いやすく、Bootstrap 5カードコンポーネントを備えています！</</div>
                  </div>
              </div>
          </div>
      </div>
    </body>
      
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </main>
    
@endsection