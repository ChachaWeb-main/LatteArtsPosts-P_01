<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // 各登録ユーザーとのリレーション
    public function user() 
    {
        return $this->belongsTo('App\User');    
    }
    
    // 登録ユーザーの一人のラテ投稿とのリレーション
    public function latte()
    {
        return $this->belongsTo('App\Latte');
    }
    
}
