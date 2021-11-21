<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Latte;
use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth; //Eloquentリレーションの際に追加した

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
        // Auth::user()->name;
        if (empty(Auth::user())) {
            Auth::logout();
            // return redirect('main');
        } 
        
        // ページネーションの実装
        $sort = $request->sort;
        // 投稿を表示する
        $cond_title = $request->cond_title; //cond_title = 検索するための機能
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する。->指定した引数をページネーション
            $posts = Latte::where('title', $cond_title)->paginate(9);
        } else {
            // それ以外は全てを取得する。orderBy以降で新着順に表示設定＝ソート。->指定した引数をページネーション
            $posts = Latte::orderBy('created_at', 'DESC')->paginate(9);
        }
        
        /*カリキュラムlaravel19 $headline = $posts->shift();では、
        　新着投稿を変数$headlineに代入し、$postsは代入された新着投稿以外が格納されている*/
        if (count($posts) > 0) {
            $latest_post = $posts->shift();
        } else {
            $latest_post = null;
        }
        
        //profileの全データ取得(サイドウィジェットにニックネームのみ表示のため) withCount()->()内の数をカウント
        $users = User::orderBy('lattes_count', 'DESC')->take(5)->withCount("lattes")->get();
        //別コードで
        // User::with('lattes')->get()->sortBy(function($user){
        //     return $user->lattes->count();
        // });
        
        return view('main', ['posts' => $posts, 'cond_title' => $cond_title, 'latest_post' => $latest_post, 'sort' => $sort, 'users' => $users]);
    }

    // 用語解説ページ
    public function term() 
    {
        return view('/term');
    }
    
    // 閲覧用メンバーinfo画面。メインからニックネームリンクで飛ぶように
    public function info(Request $request) 
    {
        $validatedData = $request->validate ([
            'user_id' => 'required',
        ]);
        $user_id = $request->user_id;
        $targetUser = User::where('id',$user_id)->first();

        return view('info', ['targetUser' => $targetUser]);
    }

    // 配列で変換
    public $gender = array('0'=>'男性(male)', '1'=>'女性(female)');
    
    
    // イイねボタンを表示
    public function show(Latte $latte)
    {
        $like = Like::where('latte_id', $latte->id)->where('user_id', auth()->user()->id)->first();
        // dump($like);
        // return;
        return view('latte.show', compact('latte', 'like'));
    }

}
