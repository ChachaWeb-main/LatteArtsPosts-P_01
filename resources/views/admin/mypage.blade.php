@extends('layouts.admin')

@section('title', 'マイページ')

@section('content')

<div class="container">
    <h1>{{ $logged_in_user->name, 20 }} さんのマイページ</h1>
        <div>
        @guest
            <a class="nav-link" href="/login">{{ __('Login') }}</a>
        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
        @else
            <a href="" class="btn btn-primary my-2" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('ログアウト/Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        @endguest
        </div>
    <br>
    <br>
    
    <h3>＜プロフィール＞</h3>
    {{-- views/admin/profile/index.blade.php --}}

    <br>
    <table class="table table-warning">
        <thead>
            <tr>
                <th class="table-text fs-6 fw-bold" width="50%">ニックネーム</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{--profileから指定した値を都度取得 User → Profile １対１のリレーション--}}
                <td>{{ $logged_in_user->profile->name, 30 }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-secondary">
        <thead>
            <tr>
                <th class="table-text fs-6 fw-bold" width="50%">登録日</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @php
                    $row_date = \Carbon\Carbon::parse($logged_in_user->profile->created_at);
                    $row_date->setToStringFormat('Y/m/d H:i');
                @endphp
                <td>{{ \Str::limit($row_date, 30) }}</td>
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
                <td>{{ \Str::limit(config('const.gender')[$logged_in_user->profile->gender], 30) }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-danger">
        <thead>
            <tr>
                <th class="table-text fs-6 fw-bold" width="50%">得意なラテアートや好きなコーヒー等</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $logged_in_user->profile->latteart, 100 }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-primary">
        <thead>
            <tr>
                <th class="table-text fs-6 fw-bold" width="50%">自己紹介</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $logged_in_user->profile->introduction }}</td>
            </tr>
        </tbody>
    </table>
    <div class="edit">
        <a href = "{{action('Admin\ProfileController@edit', ['id'=>$logged_in_user->profile->id]) }}" class="btn btn-link fs-5" >編集/Edit</a>
    </div>
    {{--<div class="delete">
        <form method="post" action="{{action('Admin\ProfileController@delete', ['id'=>$logged_in_user->profile->id]) }}">
            @csrf
            <button type="button" class="btn btn-link">削除/Delete</button>
        </form>
    </div>--}}
    <br>
    <br>
    {{-- vies/admin/latte/index.blade.php--}}
    <div class="container">
        <div class="row">
            <h3>＜投稿ラテアート一覧＞</h3>
            <div class="col-md-4 mt-3 mb-4">
                <a href="{{ action('Admin\LatteController@add') }}" role="button" class="btn btn-warning">新規投稿</a>
            </div>
        </div>
        
        <div class="row">
            <div class="list-latte col-md-12 mx-auto">
                <div class="row">
                    {{--BootsStrapのcardを利用してラテ投稿一覧を表示--}}
                    @foreach($logged_in_user->lattes as $latte)
                        <div class="card col-12 col-md-4">
                            <a href="#!"><img class="card-img-top" src="{{ $latte->image_path }}" width="350%" height="350" alt="..." /></a>
                            <div class="card-body">
                                <div class="text-muted mb-2">
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
                                <!-- goodマーク -->
                                <i class="good far fa-thumbs-up"></i>
                                    <!-- 「イイね」の数を表示 -->
                                    <span class="badge">
                                       {{ $latte->likes->count() }} 
                                    </span>
                                @else
                                <i class="good far fa-thumbs-up"></i>
                                    <!-- 「イイね」の数を表示 -->
                                    <span class="badge">
                                       {{ $latte->likes->count() }} 
                                    </span>
                                @endif
                                
                                <p class="card-text">
                                    <div class="comment">
                                    {{ $latte->text }}
                                    </div>
                                </p>
                                <a href = "{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" class="btn btn-link">編集/Edit</a>
                                <form method="post" action="{{ action('Admin\LatteController@delete', ['id' => $latte -> id]) }}" onSubmit="return check()">
                                    @csrf
                                    <button type="submit" class="btn btn-link">削除/Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
       &laquo;  <a class="back-link fs-7" href="/main">戻る/Back</a>
    </div>
</div>

{{-- 削除確認のダイアログ --}}
<script type="text/javascript"> 
function check(){

	if(window.confirm('本当に削除しますか / Sure to delete?')){ // 確認ダイアログを表示

		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理

		window.alert('キャンセルされました / It was canceld'); // 警告ダイアログを表示
		return false; // 送信を中止

	}

}
</script>

{{-- 「topに戻る」アニメーション実装 --}}
<a class="pagetop" id="top">TOPに戻る</a>
<script>
    const topLink = document.getElementById("top");
    let scrollValue;
    {{--画面をスクロールするたびにイベントを発生させる--}}
    window.addEventListener("scroll", () => {
      scrollValue = document.scrollingElement.scrollTop;
    
      {{--設定したスクロール量を超えるかどうかでボタンの表示・非表示を切り替える--}}
      if (scrollValue >= 1000) {
        topLink.style.display = "inline"; {{--ボタンを表示--}}
      } else if (scrollValue < 1000) {
        topLink.style.display = "none"; {{--ボタンを非表示--}}
      }
    });
    
    {{--画面トップに戻る際にアニメーションさせる--}}
    topLink.addEventListener("click", () => {
      window.scroll({top: 0, behavior: 'smooth'});
    });
</script>

@endsection