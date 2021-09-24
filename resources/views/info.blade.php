@extends('layouts.admin')

@section('title', 'プロフィール')

@section('content')

    <div class="container">
        <h1>{{ \Str::limit($targetUser->profile->name, 20) }} さん</h1>
        <br>
        <br>
        <h3>プロフィール</h3>
        <!-- views/admin/profile/index.blade.php -->
        <div class="container">
            <div class="row">
                <div class="list-profile col-md-11 mx-auto">
                    <div class="row">
                        <table class="table table-warning">
                            <thead>
                                <tr>
                                    <th width="20%">ニックネーム</th>
                                    <th width="13%">登録日</th>
                                　　<th width="15%">性別</th>
                                　　<th width="20%">会得ラテアート</th>
                                    <th width="45%">自己紹介</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!--profileから指定した値を都度取得 User → Profile １対１のリレーション-->
                                    <td>{{ \Str::limit($targetUser->profile->name, 20) }}</td>
                                    @php
                                        $row_date = \Carbon\Carbon::parse($targetUser->profile->created_at);
                                        $row_date->setToStringFormat('Y/m/d H:i');
                                    @endphp
                                    <td>{{ \Str::limit($row_date, 50) }}</td>
                                    <td>{{ \Str::limit(config('const.gender')[$targetUser->profile->gender], 20) }}</td>
                                    <td>{{ \Str::limit($targetUser->profile->latteart, 50) }}</td>
                                    <td>{{ \Str::limit($targetUser->profile->introduction, 100) }}</td>
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
                <br>
                <br>
                <div class="list-latte col-md-12 mx-auto">
                    <div class="row">
                        <!--BootsStrapのcardを利用してラテ投稿一覧を表示-->
                        @foreach($targetUser->lattes as $latte)
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
        </div>


@endsection