{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ラテアートの新規作成'を埋め込む --}}
@section('title', '新規投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1>あなたのラテアートを皆んなにシェアしよう</h1>
                <form action="{{ action('Admin\LatteController@create')}}" method="post" enctype="multipart/form-data">
                    {{-- 以下で投稿データ保存設定・カラム・マイグレーション --}}
                    @if (count($errors) > 0)
                      <ul>
                          @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                          @endforeach    
                      </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">デザイン</label>
                        <div class="col-md-10">
                            <input type="text" class="col-md-5" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">描き方</label>
                        <div class="col-md-10">
                            <!--<textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>-->
                            <select>-->
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
                            <textarea class="col-md-10" name="body" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像 or 動画</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <div class="form-button">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="投稿">
                    </div>
                </form> 
            </div>
        </div>
    </div>
    
@endsection