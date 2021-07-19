<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    //
    public function create(Request $request) 
    {
        // admin/member/createにリダイレクトする
        return redirect('admin/member/create');
    } 
    
    public function mypage() 
    {
        return view('admin.member.mypage');
    }
    
}
