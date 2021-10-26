<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name','user_id','gender', 'latteart', 'introduction'];
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required|min:2|max:15', 
        'gender' => 'required', 
        'latteart' => 'required|max:50', 
        'introduction' => 'required|max:350'
    );
    
    //userとのリレーション
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
    
}
