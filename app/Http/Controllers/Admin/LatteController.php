<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLatteRequest;
use App\Latte; //Latte Modelが使えるようになる
use App\User;
use App\Profile;
use App\Like;
use Carbon\Carbon; //保存日時
use Illuminate\Support\Facades\Auth;

class LatteController extends Controller
{
    public function add()
    {
        // Userとのリレーション
        $latte = Auth::user()->latte;
        return view('admin.latte.create');
    }
    
    
    public function create(StoreLatteRequest $request) 
    {
        // validationを行う
        $this->validate($request, Latte::$rules); 
        
        $latte = new latte;
        $form = $request->all();
             // フォームから画像が送信されてきたら保存して、$latte->image_path に画像のパスを保存する
        if (isset($form['image'])) 
        {
            $path = $request->file('image')->store('public/image');
            $latte->image_path = basename($path);
        } else {
            $latte->image_path = null;
        }
         // フォームから送信されてきた _token を削除する
        unset($form['_token']);
        // フォームから送信されてきた image を削除する
        unset($form['image']);
        //データベースに保存する
        $latte->fill($form);
        // Userとのリレーション
        $latte->fill(['user_id' => Auth::user()->id]);
        $latte->save();
        // admin/latte/createにリダイレクトする
        return redirect('/main');
    }  
    
    // 全ユーザーの投稿一覧表示
    public function index(Request $request) 
    {
        // 投稿を表示する
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Latte::where('title', $cond_title)->get();
        } else {
            // それ以外は全てを取得する
            $posts = Latte::orderBy('created_at', 'DESC')->get();
        }
            return view('admin.latte.index', ['posts' => $posts, 'cond_title' => $cond_title]
        );
    }
    
    
    public function edit(Request $request)
    {
        // Latte Modelからデータを取得する
      $latte = Latte::find($request->id);
      if (empty($latte)) {
        abort(404);    
      }
      return view('admin.latte.edit', ['latte_form' => $latte]);
    }
    
    
    public function update(StoreLatteRequest $request)
    {
        // Validationをかける
        $this->validate($request, Latte::$rules);
        // News Modelからデータを取得する
        $latte = Latte::find($request->id);
        // 送信されてきたフォームデータを格納する
        $latte_form = $request->all();
      
        if (isset($latte_form['image'])) 
        {
            $path = $request->file('image')->store('public/image');
            $latte_form["image_path"] = basename($path);
        } else {
            $latte_form["image_path"] = $latte->image_path;
        }
        // フォームから送信されてきた _token を削除する
        unset($latte_form['_token']);
        // フォームから送信されてきた image を削除する
        unset($latte_form['image']);   // 該当するデータを上書きして保存する
        $latte->fill($latte_form)->save();
        
        return redirect('admin/mypage');
    }
    
    
    public function delete(Request $request)
    {
        // 該当するLatte Modelを取得
        $latte = Latte::find($request->id);
        // 削除する
        $latte->delete();
        return redirect('admin/mypage');
    }
}