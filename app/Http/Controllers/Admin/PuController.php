<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\qian;
class PuController extends Controller
{
    public function login(){
        return view('admin.pu.login');
    }
    public function index(){
        $data=Qian::first();
        return view('admin.pu.list',['data'=>$data]);
    }
    public function ci(){
        $data=Qian::first();
        $tian=$data->tian;
        $fen=$data->fen;
        $ci=request()->ci;
        if(($tian+$ci)<=5){
            $tian=$tian+1;
            $fen=$fen+5;
            $res=Qian::where('user_id',1)->update(['tian'=>$tian,'tian'=>$fen]);
        }else{
            $tian=$tian+1;
            $fen=$fen+25;
            $res=Qian::where('user_id',1)->update(['tian'=>$tian,'tian'=>$fen]);
        }
    }

}
