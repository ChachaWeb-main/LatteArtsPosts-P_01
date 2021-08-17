<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Latte;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // 投稿を表示する
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Latte::where('title', $cond_title)->get();
        } else {
            // それ以外は全てを取得する
            $posts = Latte::all();
        }
        // dump($posts);
        // return;
        return view('main', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
