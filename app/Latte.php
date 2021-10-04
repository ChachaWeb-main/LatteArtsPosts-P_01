<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Latte extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'design' => 'required',
        'draw' => 'required',
        'text' => 'required|max:300'
    );
    
    // 登録ユーザ毎とのリレーション
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
    
    // 良いね機能とのリレーション
    public function likes() 
    {
        return $this->hasMany('App\Like');
    }
    
}