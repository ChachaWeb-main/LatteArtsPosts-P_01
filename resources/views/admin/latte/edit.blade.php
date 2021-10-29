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
                    
                    <div class="form-group row mt-5 mb-4">
                        <label class="col-md-4 fw-bold" >デザイン/ Design<span class="require"> [必須] [require]</span></label></label>
                        <div class="col-md-10">
                            <input type="text" class="col-md-5" name="design" value="{{ $latte_form->design }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-4 mb-2 mt-4 fw-bold">描き方/ How to draw<span class="require"> [必須] [require]</span></label></label>
                        <div class="col-md-10">
                            <select name="draw">
                                {{--<option value="">--選択してください--</option>
                                <option value="フリーポア">フリーポア</option>
                                <option value="エッチング">エッチング</option>
                                <option value="3D">3D</option>
                                <option value="その他">その他</option>--}}
                                <option value="">--選択してください--</option>
                                <option value="フリーポア" @if ($latte_form->draw == 'フリーポア') selected @endif>フリーポア</option>
                                <option value="エッチング" @if ($latte_form->draw == 'エッチング') selected @endif>エッチング</option>
                                <option value="3D" @if ($latte_form->draw == '3D') selected @endif>3D</option>
                                <option value="その他" @if ($latte_form->draw == 'その他') selected @endif>その他</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-4 mb-2 mt-4 fw-bold">フリーテキスト/ Free text<span class="require"> [必須] [require]</span></label></label>
                        <div class="col-md-10">
                            <textarea class="col-md-10" name="text" rows="10">{{ $latte_form->text }}</textarea>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-4 mb-2 mt-4 fw-bold">画像/ Image<span class="require"> [必須] [require]</span></label><br><span class="text-danger">※2MBまで/ Up to 2MB※</span></label>
                        <div class="col-md-10 mb-2">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-text text-info mb-3">設定中: {{ $latte_form->image_path }}</div>
                        {{--<div class="form-check">
                                <label class="form-check-label mb-4">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                        </div>--}}
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