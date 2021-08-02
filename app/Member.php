<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    
    //timestamps利用しない
    public $timestamps = false;
    
    protected $fillable = ['name','gender', 'latteart', 'introduction'];
    
    //primaryKeyの変更
    protected $primaryKey = "member_id";
    
    //hasMany設定
    public function user()
    {
    return $this->hasMany('App\User');
    }
    
    
    //
    protected $guarded = array('id');
    //
    public static $rules = array(
        'name' => 'required', 
        'gender' => 'required', 
        'latteart' => 'required', 
        'introduction' => 'required'
        );
        
        
}
