<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
class IndexController extends Controller
{
    public function index(){
        $data=Goods::all();

        return view('index.index.index',['data'=>$data]);
    }
    public function detail(){
        $goods_id=\request()->goods_id;
        $where=[
            ['goods_id','=',$goods_id]
        ];
        $goodsInfo=Goods::where($where)->first();
//        dd($goodsInfo);
        return view('index.index.detail',['goodsInfo'=>$goodsInfo]);
    }

}
