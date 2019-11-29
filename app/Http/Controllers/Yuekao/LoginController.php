<?php

namespace App\Http\Controllers\Yuekao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
class LoginController extends Controller
{
    public function login(){
        return view('yuekao.login');
    }
    public function loginDo(Request $request){
        $post = $request->except('_token');
        $data=Admin::first();
//      dd($data);
        session(['user'=>$data]);
        return redirect('index/index');

    }
}
