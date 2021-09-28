{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ラテアートの新規作成'を埋め込む --}}
@section('title', '投稿編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>投稿編集</h2>
                <form action="{{ action('Admin\LatteController@update')}}" method="post" enctype="multipart/form-data">
                    {{-- 以下で投稿データ保存設定・カラム・マイグレーション --}}
                        @if (count($errors) > 0)
                        <ul class="errors">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">デザイン</label>
                        <div class="col-md-10">
                            <input type="text" class="col-md-5" name="design" value="{{ $latte_form->design }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">描き方</label>
                        <div class="col-md-10">
                            <select name="draw">
                                <option value="">--選択してください--</option>
                                <option value="フリーポア">フリーポア</option>
                                <option value="エッチング">エッチング</option>
                                <option value="3D">3D</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">フリーテキスト</label>
                        <div class="col-md-10">
                            <textarea class="col-md-10" name="text" rows="10">{{ $latte_form->text }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像 or 動画</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-text text-info">設定中: {{ $latte_form->image_path }}</div>
                        <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $latte_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    
@endsection