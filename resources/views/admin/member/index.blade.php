
 
 <div class="container">
    <div class="row">
        <div class="list-member col-md-9 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="15%">ニックネーム</th>
                        　　<th width="5%">性別</th>
                        　　<th width="20%">会得ラテアート</th>
                            <th width="50%">自己紹介</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $member)
                            <tr>
                                <td>{{ \Str::limit($member->name, 100) }}</td>
                                <td>{{ \Str::limit($member->gender, 100) }}</td>
                                <td>{{ \Str::limit($member->latteart, 200) }}</td>
                                <td>{{ \Str::limit($member->introduction, 200) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>