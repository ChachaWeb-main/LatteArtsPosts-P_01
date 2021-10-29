{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

@section('title', '登録編集')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                    <form action="{{ action('Admin\ProfileController@update')}}" method="post" entype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul class="errors">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    
                    <input type="hidden" name="id" value="{{ $profile_form->id }}">
                    
                    <div class="form-group row">
                        <label class="col-md-3">ニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">性別 (Gender)</label>
                        <div class="col-md-10">
                            <div>
                              <input type="radio" id="男性 (Male)" name="gender" value= "0" @if ($profile_form->gender == "0") checked @endif>
                              <label for="男性 (Male)">男性 (Male)</label>
                            </div>
                            <div>
                              <input type="radio" id="女性 (Female)" name="gender" value="1"@if ($profile_form->gender == "1") checked @endif>
                              <label for="女性 (Female)">女性 (Female)</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">得意なラテアート</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="latteart" rows="2">{{ $profile_form->latteart }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">自己紹介 (Introduction)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                    </div>
                    
                    <div class="form-button">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </form> 
            </div>
        </div>
    </div>
    
@endsection