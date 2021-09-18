<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Latte;
use App\User;
use Carbon\Carbon; //保存日時
use Illuminate\Support\Facades\Auth; //Eloquentリレーションの際に追加した

class ProfileController extends Controller
{
    // 配列で変換
    public $gender = array('0'=>'男性(male)', '1'=>'女性(female)');
    
    // プロフィールとラテ投稿一覧を表示
    public function mypage(Request $request) 
    {
        $logged_in_user = Auth::user();
        return view('admin.mypage', ['gender' => $this->gender, 'logged_in_user' => $logged_in_user]);
    }
    
    
    public function add()
    {
        // Userとのリレーション
        $profile = Auth::user()->profile;
        // dump($profile);
        return view('admin.profile.create');
    }
    
    
    public function create(Request $request) 
    {
        $this->validate($request, Profile::$rules);
        
        $profile = Auth::user()->profile;
        if (empty($profile)) {
            //メンバーの情報が存在しない場合：新規追加画面
            $profile = new Profile;
            $form = $request->all();
            
            unset($form['_token']);
            
            $profile->fill($form);
            // Userとのリレーション
            $profile->fill(['user_id' => Auth::user()->id]);
            $profile->save();
            
        } else {
            //メンバーの情報が存在する場合：
            // $profile = Profile::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            dump($profile);
            dump($form);
            $profile->fill($form)->save();
            return redirect('admin/mypage');
        }
        
       
        return redirect('admin/mypage');
    }
    
    
    public function index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Profile::where('title', $cond_title)->get();
        } else {
            $posts = Profile::orderBy('created_at', 'DESC')->get();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title, 'gender' => $this->gender]);
    }
    
    
    public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    
    public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();
      unset($profile_form['_token']);

      $profile->fill($profile_form)->save();

      return redirect('admin/profile');
     }
    
    
    public function delete(Request $request)
    {
      $profile = Profile::find($request->id);
      $profile->delete();
      return redirect('admin/profile');
    }
    
}
