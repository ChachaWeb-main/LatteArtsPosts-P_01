@extends('layouts.admin')

@section('title', 'メンバーページ')

@section('content')

<div class="container">
    <div class="row">
        <h2>登録メンバー</h2>
        <div class="list-profile col-md-12 mx-auto">
            <div class="row">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th width="100px">ID</th>
                            <th width="500px">ニックネーム</th>
                            <th width="330px">登録日</th>
                        　　<th width="300px">性別</th>
                        　　<th width="500px">得意ラテアート</th>
                            <th width="500px">自己紹介</th>
                            <th width="300px">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $profile)
                            <tr>
                                <td>{{ $profile->id }}</td>
                                <td>{{ \Str::limit($profile->name, 20) }}</td>
                                @php
                                    $row_date = \Carbon\Carbon::parse($profile->created_at);
                                    $row_date->setToStringFormat('Y/m/d H:i');
                                @endphp
                                <td>{{ \Str::limit($profile->created_at, 50) }}</td>
                                <td>{{$gender[$profile->gender]}}</td>
                                <td>{{ \Str::limit($profile->latteart, 40) }}</td>
                                <td>{{ $profile->introduction }}</td>
                                <td>
                                    <div>
                                        <a href = "{{action('Admin\ProfileController@edit', ['id' => $profile->id]) }}" >編集/Edit</a>
                                    </div>
                                    <div>
                                        <a href = "{{action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">削除/Delete</a>
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