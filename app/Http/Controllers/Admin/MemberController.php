<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    //
    // public function add() {
    //     return view('admin.member.register');
    // }
    public function main() {
        return view('admin.member.mypage');
    }
    
}
