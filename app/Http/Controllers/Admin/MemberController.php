<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Latte;
use App\User;
use Carbon\Carbon; //保存日時
use Illuminate\Support\Facades\Auth; //Eloquentリレーションの際に追加した

class MemberController extends Controller
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
        $member = Auth::user()->member;
        // dump($member);
        return view('admin.member.create');
    }
    
    
    public function create(Request $request) 
    {
        $this->validate($request, Member::$rules);
        
        $member = Auth::user()->member;
        if (empty($member)) {
            //メンバーの情報が存在しない場合：新規追加画面
            $member = new Member;
            $form = $request->all();
            
            unset($form['_token']);
            
            $member->fill($form);
            // Userとのリレーション
            $member->fill(['user_id' => Auth::user()->id]);
            $member->save();
            
        } else {
            //メンバーの情報が存在する場合：
            // $member = Member::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            dump($member);
            dump($form);
            $member->fill($form)->save();
            return redirect('admin/mypage');
        }
        
       
        return redirect('admin/mypage');
    }
    
    
    public function index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Member::where('title', $cond_title)->get();
        } else {
            $posts = Member::orderBy('created_at', 'DESC')->get();
        }
        return view('admin.member.index', ['posts' => $posts, 'cond_title' => $cond_title, 'gender' => $this->gender]);
    }
    
    
    public function edit(Request $request)
    {
      $member = Member::find($request->id);
      if (empty($member)) {
        abort(404);    
      }
      return view('admin.member.edit', ['member_form' => $member]);
    }
    
    
    public function update(Request $request)
    {
      $this->validate($request, Member::$rules);
      $member = Member::find($request->id);
      $member_form = $request->all();
      unset($member_form['_token']);

      $member->fill($member_form)->save();

      return redirect('admin/member');
     }
    
    
    public function delete(Request $request)
    {
      $member = Member::find($request->id);
      $member->delete();
      return redirect('admin/member');
    }
    
}
