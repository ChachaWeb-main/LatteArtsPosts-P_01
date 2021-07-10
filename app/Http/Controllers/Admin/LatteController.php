<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LatteController extends Controller
{
    //
    public function add() {
        return view('admin.latte.create');
    }
    
    public function create(Request $request)
  {
      // admin/news/createにリダイレクトする
      return redirect('admin/latte/create');
  }  
}
