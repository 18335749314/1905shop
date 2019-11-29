<?php

namespace App\Http\Controllers\Yuekao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Xinwen;
use App\Fenlei;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    public function index(){
       $data=Fenlei::get();
       return view('yuekao/index',['data'=>$data]);
    }
    public function add(Request $request){
        $post=$request->except('_token');
        if ($request->hasFile('x_tu')) {
            $post['x_tu'] = $this->upload('x_tu');
        }
        //  dd($post);
        $data = Xinwen::create($post);
        if ($data->x_id) {
            return redirect('/index/list');
        }
    }
    public function upload($filename){
        if (request()->file($filename)->isValid()){
            $photo = request()->file($filename);
            $store_result = $photo->store('photo');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }
    public function list(){
        $page=\request()->page??1;
        Redis::flushall();
        $data=Redis::get('data_'.$page);
        if(!$data){
            echo '======';
            $pageSize = config('app.pageSize');
            $data=Xinwen::paginate($pageSize);
            $data=serialize($data);
            Redis::set('data_'.$page,$data,1);
        }
        $data=unserialize($data);
        $query=request()->all();

        return view('yuekao.list',['data'=>$data,'query'=>$query]);
    }
    public function edit(){

        return view('yuekao.edit');
    }
















}
