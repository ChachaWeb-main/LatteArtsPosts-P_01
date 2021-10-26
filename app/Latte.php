<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latte extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'design' => 'required|max:30',
        'draw' => 'required',
        'text' => 'required|max:200',
        'image' => 'required|max:2048',
        // 'max_mb' => 'The :attribute may not be greater than :max_mb megabytes.'
    );
    
    //  public function messages()
    // {
    //     return [
    //         'image.max' => '画像サイズは、2MB以下を選択してください'
    //     ];
    // }
    
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