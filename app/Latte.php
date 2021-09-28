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
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
}