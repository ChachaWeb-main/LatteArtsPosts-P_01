<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class User extends Model
// {
//       // 「１対１」→ メソッド名は単数形
//     public function member() {
//         // 従テーブルのモデルのデータを引っ張てくる
//         return $this->hasOne('App¥member');
//     }
    
// }


class User extends Authenticatable
{
    //   // 「１対１」→ メソッド名は単数形
    // public function member() {
    //     // 従テーブルのモデルのデータを引っ張てくる
    //     return $this->hasOne('App¥member');
    // }
    
    //timestamps利用しない
    public $timestamps = false;
    
    protected $fillable = [''];
    
    //belongsTo設定
    public function member()
    {
    return $this->belongsTo('App\member');
    }
    
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
