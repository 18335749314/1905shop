<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Lian;
class ClassController extends Controller
{
    public function index(){
        $page=\request()->page??1;
//        $word=\request()->word??'';

        $data=Cache::get('data_'.$page.'_');
        if(!$data){
            echo 'ddd++==--';
            $pageSize=config('app.pageSize');

            $data=Lian::paginate($pageSize);

            Cache::put('data_'.$page.'_',$data,10);
        }

        return view('admin.class.index',['data'=>$data]);




    }
}
