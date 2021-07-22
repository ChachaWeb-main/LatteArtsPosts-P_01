<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;

class MemberController extends Controller
{
    //
    public function add(){
        return view('admin.member.create');
    }
    
    public function create(Request $request) {
        $this->validate($request, Member::$rules);
        
        $member = new Member;
        $form = $request->all();
        
        unset($form['_token']);
        
        $member->fill($form);
        $member->save();
       
        return redirect('admin/member/create');
    }
    
    public function index(Request $request) {
        $cond_title = $request -> cond_title;
        if ($cond_title != '') {
            $posts = Member::where('title', $cond_title) -> get();
        } else {
            $posts = Member::all();
        }
        return view('admin.member.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    
    public function mypage() 
    {
        return view('admin.member.mypage');
    }
    
}
