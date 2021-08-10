<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    
    // 「１対１」→ メソッド名は単数形
    public function member()
    {
        // Memberモデルのデータを引っ張てくる
        return $this->hasOne('App\Member');
    }
    
    
    // 「１対多」の「多」側 → メソッド名は複数形
    public function lattes()
    {
        
        return $this->hasMany('App\Latte');
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
