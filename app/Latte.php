<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Latte extends Model
{
    
    //timestamps利用しない
    public $timestamps = false;
    
    protected $fillable = ['user_id','design', 'draw', 'text'];
    
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'design' => 'required',
        'draw' => 'required',
        'text' => 'required'
    );
    
    
    
}