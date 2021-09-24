<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Latte;
use App\User;
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
        // ページネーションの実装
        $sort = $request->sort;
        // 投稿を表示する
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する。->指定した引数をページネーション
            $posts = Latte::where('title', $cond_title)->paginate(3);
        } else {
            // それ以外は全てを取得する。orderBy以降で新着順に表示設定＝ソート。->指定した引数をページネーション
            $posts = Latte::orderBy('created_at', 'DESC')->paginate(3);
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

    // 用語解説ページ
    public function term() {
        
        return view('/term');
    }
    
    // 閲覧用メンバーinfo画面 。メインからニックネームリンクで飛ぶように
    public function info(Request $request) 
    {
        $validatedData = $request->validate ([
            'user_id' => 'required',
        ]);
        $user_id = $request->user_id;
        $targetUser = User::where('id',$user_id)->first();
        // $logged_in_user = Auth::user();
        // dump($targetUser);
        // dump(config('const.gender')[$targetUser->profile->gender]);
        // return;
        return view('info', ['targetUser' => $targetUser]);
    }

    // 配列で変換
    public $gender = array('0'=>'男性(male)', '1'=>'女性(female)');

}
