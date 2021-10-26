{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

@section('title', 'プロフィール登録')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>プロフィール登録<br>Register of Profile</h3>
                <br>
                    <form action="{{ action('Admin\ProfileController@create')}}" method="post" entype="multipart/form-data">
                    @if (count($errors) > 0)
                      <ul class="errors">
                          @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                          @endforeach    
                      </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-8 fw-bold">ニックネーム<span class="require">[必須]</span><br>Nick name<span class="require">[require]</span></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="2字以上30字以下 / Min2 Max30 Characters" name="name" value="{{ old('name') }}" required min="2" maxlength="30">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 fw-bold">性別<span class="require">[必須]</span><br>Gender<span class="require">[require]</span></label>
                        <div class="col-md-10">
                            <div>
                              <input type="radio" id="男性 (Male)" name="gender" value="0" checked >
                              <label for="男性 (Male)">男性 (Male)</label>
                            </div>
                            <div>
                              <input type="radio" id="女性 (Female)" name="gender" value="1">
                              <label for="女性 (Female)">女性 (Female)</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-8 fw-bold">得意なラテアート<br>Good at your LatteArt</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="latteart" rows="2" required>{{ old('latteart') }} </textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 fw-bold">自己紹介<br>Introduction</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10" required>{{ old('introduction') }}</textarea>
                    </div>
                    
                    <div class="form-button">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="登録">
                    </div>
                </form> 
            </div>
        </div>
    </div>
    
@endsection