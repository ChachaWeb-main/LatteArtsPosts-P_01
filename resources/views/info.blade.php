@extends('layouts.admin')

@section('title', 'プロフィール')

@section('content')

<div class="container">
    <h1>{{ \Str::limit($targetUser->profile->name, 20) }} さん</h1>
    <br>
    <br>
    <h3>＜プロフィール＞</h3>
    <br>
    {{-- views/admin/profile/index.blade.php --}}
    <table class="table table-secondary">
        <thead>
            <tr>
                <th class="table-text fs-6 fw-bold" width="50%">登録日</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @php
                    $row_date = \Carbon\Carbon::parse($targetUser->profile->created_at);
                    $row_date->setToStringFormat('Y/m/d H:i');
                @endphp
                <td>{{ \Str::limit($row_date, 50) }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-success">
        <thead>
            <tr>
            　　<th class="table-text fs-6 fw-bold" width="50%">性別</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ \Str::limit(config('const.gender')[$targetUser->profile->gender], 20) }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-danger">
        <thead>
            <tr>
            　　<th class="table-text fs-6 fw-bold" width="50%">得意なラテアート</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $targetUser->profile->latteart, 50 }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="table table-primary">
        <thead>
            <tr>
                <th class="table-text fs-6 fw-bold" width="50%">自己紹介</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $targetUser->profile->introduction, 100 }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
</div>
{{-- vies/admin/latte/index.blade.php--}}
<div class="container">
    <div class="row">
        <h3>＜ラテアート投稿一覧＞</h3>
        <br>
        <br>
        {{--BootsStrapのcardを利用してラテ投稿一覧を表示--}}
        <div class="list-latte col-md-12 mx-auto">
            <div class="row">
                @foreach($targetUser->lattes as $latte)
                    <div class="card col-12 col-md-4">
                        {{-- ローカル環境でのコード → src="{{ asset('storage/image/' . $latte->image_path) }} --}}
                        <a href="#!"><img class="card-img-top" src="{{ $latte->image_path }}" width="350%" height="350" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">
                                @php
                                    $row_date = \Carbon\Carbon::parse($latte->created_at);
                                    $row_date->setToStringFormat('Y/m/d H:i');
                                @endphp
                                <td>{{ \Str::limit($row_date) }}</td>
                            </div>
                            <h3 class="card-title h5">️デザイン☕️：{{ \Str::limit($latte->design) }}</h3>
                            <p class="card-text">描き方
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                                  <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                                </svg>：{{ \Str::limit($latte->draw) }}
                            </p>
                            
                            @if($latte->likes->count() <= 0)
                            {{-- goodマーク --}}
                            <i class="good far fa-thumbs-up"></i>
                                {{-- 「イイね」の数を表示 --}}
                                <span class="badge">
                                   {{ $latte->likes->count() }} 
                                </span>
                            @else
                            <i class="good far fa-thumbs-up"></i>
                                {{-- 「イイね」の数を表示 --}}
                                <span class="badge">
                                   {{ $latte->likes->count() }} 
                            </span>
                            @endif
                                
                            <p class="card-text">
                                <div class="comment">
                                    {{ \Str::limit($latte->text) }}
                                </div>
                            </p>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <br>
    &laquo;  <a class="back-link fs-6" href="/main">戻る/Back</a>
</div>

{{-- 「topに戻る」アニメーション実装 --}}
<a class="pagetop" id="top">TOPに戻る</a>
<script>
    const topLink = document.getElementById("top");
    let scrollValue;
    {{--画面をスクロールするたびにイベントを発生させる--}}
    window.addEventListener("scroll", () => {
      scrollValue = document.scrollingElement.scrollTop;
    
        {{--設定したスクロール量を超えるかどうかでボタンの表示・非表示を切り替える--}}
      if (scrollValue >= 300) {
        topLink.style.display = "inline"; <!--ボタンを表示-->
      } else if (scrollValue < 300) {
        topLink.style.display = "none"; <!--ボタンを非表示-->
      }
    });
    
    {{--画面トップに戻る際にアニメーションさせる--}}
    topLink.addEventListener("click", () => {
    
        {{--一定の間隔で繰り返し処理する--}}
      const timer = setInterval(() => {
          {{--トップに戻ったらタイマーをリセット--}}
        if (scrollValue < 0) clearInterval(timer); 
        
        document.scrollingElement.scrollTop = scrollValue;
          {{--スクロール量を設定数値ずつ減らしていく--}}
        scrollValue = scrollValue - 100; 
      });
    });
</script>

@endsection