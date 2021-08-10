{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'マイページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

<div class="container">
    <h1>Myページ</h1>
    <br>
    <br>
    <br>
    
    <p>◯◯◯</p>
    登録したニックネームを表示させたい
    <!--<div class="form-button">-->
    <!--    {{ csrf_field() }}-->
    <!--    <input type="submit" value="ログアウト/Log Out">-->
    <!--</div>-->
    
    <br>
    <br>
    <br>
    
    <h3>プロフィール</h3>
    <!-- views/admin/member/index.blade.php -->
    <div class="container">
        <div class="row">
            <div class="list-member col-md-10 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="15%">ニックネーム</th>
                            　　<th width="5%">性別</th>
                            　　<th width="30%">会得ラテアート</th>
                                <th width="40%">自己紹介</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <!--memberから指定した値を都度取得 User → Member １対１のリレーション-->
                                <td>{{ \Str::limit($user->member->name, 20) }}</td>
                                <td>{{ \Str::limit($gender[$user->member->gender], 20) }}</td>
                                <td>{{ \Str::limit($user->member->latteart, 50) }}</td>
                                <td>{{ \Str::limit($user->member->introduction, 100) }}</td>
                                <td>
                                    <div>
                                        <a href = "{{action('Admin\MemberController@edit', ['id' => $user -> id]) }}" >編集/<br>Edit</a>
                                    </div>
                                    <div>
                                        <a href = "{{action('Admin\MemberController@delete', ['id' => $user -> id]) }}">削除/<br>Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- vies/admin/latte/index.blade.php-->
    <div class="container">
        <div class="row">
            <h2>ラテアート投稿一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\LatteController@add') }}" role="button" class="btn btn-primary">新規投稿</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\LatteController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">描き方</label>
                            <div class="col-md-3">
                                <select name="draw">
                                    <option value="">--選択してください--</option>
                                    <option value="フリーポア">フリーポア</option>
                                    <option value="エッチング">エッチング</option>
                                    <option value="3D">3D</option>
                                    <option value="その他">その他</option>
                                </select>
                            </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
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
                            @foreach($logged_in_user->lattes as $latte)
                                <tr>
                                    <th>{{ $logged_in_user->id }}</th>
                                        @php
                                            $row_date = \Carbon\Carbon::parse($latte->created_at);
                                            $row_date->setToStringFormat('Y/m/d H:i');
                                        @endphp
                                        <td>{{ \Str::limit($row_date, 50) }}</td>
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
                                              <a class="nav-link" href="{{action('Admin\LatteController@edit', ['id' => $logged_in_user -> id]) }}" >編集/<br>Edit</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" href="{{action('Admin\LatteController@delete', ['id' => $logged_in_user -> id]) }}">削除/<br>Delete</a>
                                          </ul>
                                        </div>
                                        
                                        <!--<div>-->
                                        <!--    <a href = "{{action('Admin\LatteController@edit', ['id' => $logged_in_user -> id]) }}" >編集/<br>Edit</a>-->
                                        <!--</div>-->
                                        <!--<div>-->
                                        <!--    <a href = "{{action('Admin\LatteController@delete', ['id' => $logged_in_user -> id]) }}">削除/<br>Delete-->
                                        <!--</div>-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <p class="float-end mb-1">
    <a href="#">ページ上部へ</a>
</div>

@endsection