@extends('layouts.admin')

@section('title', 'メンバーページ')

@section('content')

<div class="container">
    <div class="row">
        <h2>登録メンバー</h2>
        <div class="list-member col-md-11 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="15%">ニックネーム</th>
                            <th width="5%">登録日</th>
                        　　<th width="5%">性別</th>
                        　　<th width="25%">会得ラテアート</th>
                            <th width="35%">自己紹介</th>
                            <th width="15%">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $member)
                            <tr>
                                <td>{{ \Str::limit($member->name, 20) }}</td>
                                @php
                                    $row_date = \Carbon\Carbon::parse($member->created_at);
                                    $row_date->setToStringFormat('Y/m/d H:i');
                                @endphp
                                <td>{{ \Str::limit($member->created_at, 50) }}</td>
                                <td>{{$gender[$member->gender]}}</td>
                                <td>{{ \Str::limit($member->latteart, 50) }}</td>
                                <td>{{ \Str::limit($member->introduction, 100) }}</td>
                                <td>
                                    <div>
                                        <a href = "{{action('Admin\MemberController@edit', ['id' => $member -> id]) }}" >編集/Edit</a>
                                    </div>
                                    <div>
                                        <a href = "{{action('Admin\MemberController@delete', ['id' => $member -> id]) }}">削除/Delete</a>
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