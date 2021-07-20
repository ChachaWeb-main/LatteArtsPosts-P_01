{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

@section('title', 'メンバー登録')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                    <form action="{{ action('Admin\MemberController@create')}}" method="post" entype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                      <ul>
                          @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                          @endforeach    
                      </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">ニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">性別 (Gender)</label>
                        <div class="col-md-10">
                            <div>
                              <input type="radio" id="男性 (Male)" name="gender" value="男性 (Male)" checked>
                              <label for="男性 (Male)">男性 (Male)</label>
                            </div>
                            <div>
                              <input type="radio" id="女性 (Female)" name="gender" value="女性 (Female)">
                              <label for="女性 (Female)">女性 (Female)</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">会得ラテアート</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="latteart" rows="2">{{ old('latteart') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介 (Introduction)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="15">{{ old('introduction') }}</textarea>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form> 
            </div>
        </div>
    </div>
    
@endsection