<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Latte extends Model
{
    
    // protected $fillable = ['user_id','design', 'draw', 'text'];
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'design' => 'required',
        'draw' => 'required',
        'text' => 'required'
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    
}