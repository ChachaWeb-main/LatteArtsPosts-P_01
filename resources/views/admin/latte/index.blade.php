{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '全ラテアート投稿一覧')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    
<div class="container">
    <div class="row">
        <h2>全ユーザーのラテアート投稿一覧</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ action('Admin\LatteController@index') }}" method="get">
                <div class="form-group row">
                    <div class="col-md-3 mt-3">
                        <select name="draw">
                            <option value="">--選択してください--</option>
                            <option value="フリーポア">フリーポア</option>
                            <option value="エッチング">エッチング</option>
                            <option value="3D">3D</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    <div class="col-md-2 mt-2">
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
                <table class="table table-warning">
                    <thead>
                        <tr>
                            <th width="50px">ID</th>
                            <th witdh="200px">ユーザー名</th>
                        　　<th width="130px">投稿日</th>
                        　　<th width="120px">ラテアート</th> 
                            <th width="150px">デザイン</th>
                        　　<th width="150px">描き方</th>
                        　　<th width="250px">フリーテキスト</th>
                        　　<th with="100px">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $latte)
                            <tr>
                                <td>{{ $latte->id }}</td>
                                <td>{{ \Str::limit($latte->user->name, 50) }}</td>
                                <td>{{ \Str::limit($latte->created_at, 50) }}</td>
                                <td><img src="{{ asset('storage/image/' . $latte->image_path) }}" width="50px"></td>
                                <td>{{ \Str::limit($latte->design, 50) }}</td>
                                <td>{{ \Str::limit($latte->draw, 100) }}</td>
                                <td>{{ \Str::limit($latte->text, 100) }}</td>
                                <td
                                    <div>
                                        <a href = "{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" >編集/Edit</a>
                                    </div>
                                    <div>
                                        <a href = "{{action('Admin\LatteController@delete', ['id' => $latte -> id]) }}">削除/Delete</a>
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

@endsection