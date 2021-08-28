<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    
    protected $fillable = ['name','user_id','gender', 'latteart', 'introduction'];
    
    protected $guarded = array('id');
    //
    public static $rules = array(
        'name' => 'required', 
        'gender' => 'required', 
        'latteart' => 'required', 
        'introduction' => 'required'
        );
        
        
}
