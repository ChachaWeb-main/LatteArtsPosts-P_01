<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Latte;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; //Eloquentリレーションの際に追加した

class MemberController extends Controller
{
    // 配列で変換
    public $gender = array('0'=>'男性(male)', '1'=>'女性(female)');
    
    
    //一覧 DBのEloquent
    // public function select(){
    // $members = \App\Member::all();
    // return view('admin.mypage')->with('members',$members);
    // }
    
    
    // プロフィールとラテ投稿一覧を表示
    public function mypage(Request $request) 
    {
        $users = User::all();
        $lattes = Latte::all();
        // $sample_date = Carbon::parse($lattes[0]->created_at);
        // echo $sample_date;
        // $sample_date->setToStringFormat('Y/m/d H:i');
        // echo $sample_date;
        // $objDateTime = new DateTime(lattes[0]->created_at);
        // echo $objDateTime->format('Y-m-d H:i:s a')."<br/>\n";
        // dump($users[0]->member);
        // return;
        $logged_in_user = Auth::user();
        return view('admin.mypage', ['users' => $users, 'lattes' => $lattes, 'gender' => $this->gender, 'logged_in_user' => $logged_in_user]);
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
        
        $member = new Member;
        $form = $request->all();
        
        unset($form['_token']);
        
        $member->fill($form);
        // Userとのリレーション
        $member->fill(['user_id' => Auth::user()->id]);
        // dump(Auth::user());
        // return;
        $member->save();
       
        return redirect('admin/member/create');
    }
    
    
    public function index(Request $request) 
    {
        // dump($this->gender);
        $cond_title = $request -> cond_title;
        if ($cond_title != '') {
            $posts = Member::where('title', $cond_title) -> get();
        } else {
            $posts = Member::all();
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

      return redirect('admin/member/');
     }
    
    
    public function delete(Request $request)
    {
      $member = Member::find($request->id);
      $member->delete();
      return redirect('admin/member/');
    }
    
}
