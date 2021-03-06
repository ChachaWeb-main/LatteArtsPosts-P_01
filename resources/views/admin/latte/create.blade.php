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
                      <ul class="errors">
                          @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                          @endforeach    
                      </ul>
                    @endif
                    
                    <div class="form-group row mt-5 mb-4">
                        <label class="col-md-4 fw-bold" >デザイン/ Design<span class="require"> [必須] [require]</span></label>
                        <div class="col-md-10">
                            <input type="text" class="col-md-5" name="design" placeholder="例).ハート  ex).Heart" value="{{ old('design') }}" required min="2" maxlength="30">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-4 mb-2 mt-4 fw-bold">描き方/ How to draw<span class="require"> [必須] [require]</span></label>
                        <div class="col-md-10">
                            <select name="draw" required>
                                <option value="">-- 選択してください/Please choose --</option>
                                <option value="フリーポア">フリーポア</option>
                                <option value="エッチング">エッチング</option>
                                <option value="3D">3D</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-4 mb-2 mt-4 fw-bold">フリーテキスト/ Free text<span class="require"> [必須] [require]</span></label>
                        <div class="col-md-10">
                            <textarea class="col-md-11" name="text"  placeholder="ラテアート出来栄えの感想など自由にコメントを書いてください/ Feel free to write your thoughts on this latte art." rows="10" required>{{ old('text') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 mb-2 mt-4 fw-bold">画像/ Image<span class="require"> [必須] [require]</span><br><span class="text-danger">※2MBまで/ Up to 2MB※</span></label>
                        
                        <div class="col-md-10 mb-5">
                            <input type="file" class="form-control-file" name="image" required>
                        </div>
                    </div>
                    
                    <div class="form-button">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-warning" value="投稿">
                    </div>
                </form> 
            </div>
        </div>
    </div>
    
@endsection