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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
    //全てのラテ投稿データをメインページに表示
    public function index(Request $request)
    {
        // ページネーションの実装
        $sort = $request->sort;
        // 投稿を表示する
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する。->指定した引数をページネーション
            $posts = Latte::where('title', $cond_title)->paginate(5);
        } else {
            // それ以外は全てを取得する。orderBy以降で新着順に表示設定＝ソート。->指定した引数をページネーション
            $posts = Latte::orderBy('created_at', 'DESC')->paginate(5);
        }
        /*カリキュラムlaravel19 $headline = $posts->shift();では、
        　新着投稿を変数$headlineに代入し、$postsは代入された新着投稿以外が格納されている*/
        if (count($posts) > 0) {
            $latest_post = $posts->shift();
        } else {
            $latest_post = null;
        }
        
        return view('main', ['posts' => $posts, 'cond_title' => $cond_title, 'latest_post' => $latest_post, 'sort' => $sort]);
    }
    
}
