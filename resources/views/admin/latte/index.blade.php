{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メンバーのラテアート投稿一覧')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    
    <div class="container">
        <div class="row">
            <h2>ラテアート投稿一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\LatteController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\LatteController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">デザイン</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
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
                                <th width="20%">デザイン</th>
                            　　<th width="10%">描き方</th>
                            　　<th width="50%">フリーテキスト</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $latte)
                                <tr>
                                    <th>{{ $latte->id }}</th>
                                    <td>{{ \Str::limit($latte->design, 100) }}</td>
                                    <td>{{ \Str::limit($latte->draw, 250) }}</td>
                                    <td>{{ \Str::limit($latte->text, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href = "{{action('Admin\LatteController@edit', ['id' => $latte -> id]) }}" >編集</a>
                                        </div>
                                        <div>
                                            <a href = "{{action('Admin\LatteController@delete', ['id' => $latte -> id]) }}">削除</a>
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