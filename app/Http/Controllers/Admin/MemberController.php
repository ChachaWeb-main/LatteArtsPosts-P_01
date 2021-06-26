<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    //
    public function add() {
        return view('admin.member.create');
    }
    public function edit() {
        return view('admin.member.mypage');
    }
}
