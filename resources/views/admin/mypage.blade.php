@extends('layouts.admin')

@section('title', 'マイページ')

@section('content')

    <div class="container">
        <h1>{{ \Str::limit($logged_in_user->name, 20) }} さんのマイページ</h1>
            <div>
                @guest
                    <a class="nav-link" href="/login">{{ __('Login') }}</a>
                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                @else
                    <a href="" class="btn btn-primary my-2" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('ログアウト/Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @endguest
            </div>
        <!--<div class="form-button">-->
        <!--    {{ csrf_field() }}-->
        <!--    <input type="submit" value="ログアウト/Log Out">-->
        <!--</div>-->
        
        <br>
        <br>
        
        <h3>プロフィール</h3>
        <!-- views/admin/profile/index.blade.php -->
        <div class="container">
            <div class="row">
                <div class="list-profile col-md-11 mx-auto">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th width="12%">ニックネーム</th>
                                <th width="13%">登録日</th>
                            　　<th width="10%">性別</th>
                            　　<th width="20%">会得ラテアート</th>
                                <th width="30%">自己紹介</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!--profileから指定した値を都度取得 User → Profile １対１のリレーション-->
                                <td>{{ \Str::limit($logged_in_user->profile->name, 20) }}</td>
                                @php
                                    $row_date = \Carbon\Carbon::parse($logged_in_user->profile->created_at);
                                    $row_date->setToStringFormat('Y/m/d H:i');
                                @endphp
                                <td>{{ \Str::limit($row_date, 50) }}</td>
                                <td>{{ \Str::limit($gender[$logged_in_user->profile->gender], 20) }}</td>
                                <td>{{ \Str::limit($logged_in_user->profile->latteart, 50) }}</td>
                                <td>{{ \Str::limit($logged_in_user->profile->introduction, 100) }}</td>
                                <td>
                                    <div>
                                        <a href = "{{action('Admin\ProfileController@edit', ['id' => $logged_in_user->profile->id]) }}" >編集/<br>Edit</a>
                                    </div>
                                    <div>
                                        <a href = "{{action('Admin\ProfileController@delete', ['id' => $logged_in_user->profile->id]) }}">削除/<br>Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <br>
        <br>
        <br>
        <!-- vies/admin/latte/index.blade.php-->
        <div class="container">
            <div class="row">
                <h3>投稿ラテアート一覧</h3>
                <div class="col-md-4">
                    <a href="{{ action('Admin\LatteController@add') }}" role="button" class="btn btn-warning">新規投稿</a>
                </div>
                <div class="col-md-8">
                    <form action="{{ action('Admin\LatteController@index') }}" method="get">
                        <div class="form-group row">
                            <!--<label class="col-md-2">描き方</label>-->
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
                                <input type="submit" class="btn btn-success" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class="list-latte col-md-12 mx-auto">
                    <div class="row">
                        <!--BootsStrapのcardを利用してラテ投稿一覧を表示-->
                        @foreach($logged_in_user->lattes as $latte)
                            <div class="card col-4">
                                <a href="#!"><img class="card-img-top" src="{{ asset('storage/image/' . $latte->image_path) }}" width="350%" height="350" alt="..." /></a>
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
                                            <!--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">-->
                                            <!--  <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>-->
                                            <!--  <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>-->
                                            <!--</svg>-->
                                            <!--<br>-->
                                            <div class="comment">
                                            {{ \Str::limit($latte->text) }}
                                            </div>
                                        </p>
                                        <a href = "{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" >編集/Edit</a>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                              <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                              <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                        <br>
                                        <a href = "{{action('Admin\LatteController@delete', ['id' => $latte -> id]) }}">削除/Delete</a>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        <!--<a class="btn btn-primary" href="#!">Read more →</a>-->
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

@endsection