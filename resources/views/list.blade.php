@extends('layouts.admin')

@section('title', 'メインページ')

@section('content')

    <div class="container">
        <h1>{{ \Str::limit($logged_in_user->member->name, 20) }} さん</h1>
        <h3>プロフィール</h3>
        <!-- views/admin/member/index.blade.php -->
        <div class="container">
            <div class="row">
                <div class="list-member col-md-11 mx-auto">
                    <div class="row">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th width="20%">ニックネーム</th>
                                    <th width="5%">登録日</th>
                                　　<th width="5%">性別</th>
                                　　<th width="30%">会得ラテアート</th>
                                    <th width="30%">自己紹介</th>
                                    <th width="10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!--memberから指定した値を都度取得 User → Member １対１のリレーション-->
                                    <td>{{ \Str::limit($logged_in_user->member->name, 20) }}</td>
                                    @php
                                        $row_date = \Carbon\Carbon::parse($logged_in_user->member->created_at);
                                        $row_date->setToStringFormat('Y/m/d H:i');
                                    @endphp
                                    <td>{{ \Str::limit($row_date, 50) }}</td>
                                    <td>{{ \Str::limit($gender[$logged_in_user->member->gender], 20) }}</td>
                                    <td>{{ \Str::limit($logged_in_user->member->latteart, 50) }}</td>
                                    <td>{{ \Str::limit($logged_in_user->member->introduction, 100) }}</td>
                                    <td>
                                        <div>
                                            <a href = "{{action('Admin\MemberController@edit', ['id' => $logged_in_user->member -> id]) }}" >編集/<br>Edit</a>
                                        </div>
                                        <div>
                                            <a href = "{{action('Admin\MemberController@delete', ['id' => $logged_in_user->member -> id]) }}">削除/<br>Delete</a>
                                        </div>
                                    </td>
                                </tr>
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
                <h3>ラテアート投稿一覧</h3>
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
                                        <h3 class="card-title h5">デザイン：{{ \Str::limit($latte->design) }}</h3>
                                        <p class="card-text">描き方：{{ \Str::limit($latte->draw) }}</p>
                                        <p class="card-text">{{ \Str::limit($latte->text) }}</p>
                                        <a href = "{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" >編集/Edit</a>
                                        <br>
                                        <a href = "{{action('Admin\LatteController@delete', ['id' => $latte -> id]) }}">削除/Delete</a>
                                        <!--<a class="btn btn-primary" href="#!">Read more →</a>-->
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>


@endsection