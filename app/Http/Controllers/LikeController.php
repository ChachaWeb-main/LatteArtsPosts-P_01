<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Latte;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // イイねのメソッド
    public function like(Latte $latte, Request $request)
    {
        $like = New Like();
        $like->latte_id = $latte->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }
    
    // イイね取り消しのメソッド
    // public function unlike(Latte $latte, Request $request)
    // {
    //     $user = Auth::user()->id;
    //     $like = Like::where('latte_id', $latte->id)->where('user_id', $user)->delete();
    //     return back();
    // }
    
}
