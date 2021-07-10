{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '新規投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
        
        <main>
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">投稿ラテアート一覧️</h1>
                        <p class="lead text-muted">このサイトは皆さんが描いたラテアートを投稿シェアする場です。<br>
                         さあ、あなたのラテアートを見てもらいましょう！！
                        </p>
                        <p>
                         <a href="#" class="btn btn-primary my-2">ラテアート新規投稿リンク</a>
                        </p>
                    </div>
                </div>
            </section>
        
            <div class="album py-5 bg-light">
                <div class="container">
        
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                             <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            
                              <div class="card-body">
                                    <p>描き方表示</p>
                                    <p class="card-text">フリーテキスト表示</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                         <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-outline-secondary">イイねボタン実装</button>
                                         </div>
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
                <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
                <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
            </div>
        </footer>
        
        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
@endsection