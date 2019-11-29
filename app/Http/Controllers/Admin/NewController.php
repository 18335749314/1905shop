<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\neww;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
class NewController extends Controller{

    public function index(){
        $page = \request()->page??1;
        $word = redirect()->word??'';
//        dd($word);
//        Redis::flushall();
//        $data=Cache::get('data_'.$page.'_'.$word);
        $data=Redis::get('data_'.$page.'_'.$word);
        dump($data);
        if(!$data){
            echo 'dddd=====';
            $pageSize = config('app.pageSize');
            $word=\request()->word;
            $where=[];
            if($word){
                $where[]=['n_name','like',"%$word%"];
            }
            $data=neww::where($where)->paginate($pageSize);
            $data=serialize($data);
            Redis::set('data_'.$page.'_'.$word,$data,1);
//            Cache::put('data_'.$page.'_'.$word,$data,10);
        }
        $data=unserialize($data);
        $query=request()->all();

        return view('admin.new.list',['data'=>$data,'query'=>$query]);
    }

   }
