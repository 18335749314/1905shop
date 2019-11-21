<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use App\Cart;
use DB;
class CartController extends Controller
{
    public function addCart(){
        //接受往user表里添加的值
        $add_price=\request()->add_price;
        $buy_number=\request()->buy_number;
        $goods_id=\request()->goods_id;
        $user_id=session('user.id');

        $res = $this->addCartDb($add_price,$buy_number,$goods_id,$user_id);
        if($res){
            echo json_encode(['font'=>'','code'=>1]);
        }else{
            echo json_encode(['font'=>'加入购物车失败','code'=>2]);
        }
//        dd($cart);
    }
    //添加数据 -- 购物车
    public function addCartDb($add_price,$buy_number,$goods_id,$user_id){
        $where = [
            ['goods_id','=',$goods_id],
            ['user_id','=',$user_id]
        ];
        $cartInfo = Cart::where($where)->first();
        if(empty($cartInfo)){
            //添加
            $arr = ['goods_id'=>$goods_id,'user_id'=>$user_id,'buy_number'=>$buy_number,'add_time'=>time(),'add_price'=>$add_price];
            $res = Cart::create($arr);
        }else{
            //累加
            $buy_number = $buy_number+$cartInfo['buy_number'];
            $res = Cart::where($where)->update(['buy_number'=>$buy_number,'add_time'=>time()]);
        }
        return $res;

     }
     //展示购物车数据
    public function index(){

        $data=Cache::get('data_');
        if(!$data){
            echo '=====';
            $user_id=session('user.id');
            $where=[
                ['user_id','=',$user_id]
            ];
            Cache::put('data_',$data,60*60*24*30*12);
        }

        $data = Cart::join('goods','goods.goods_id','=','cart.goods_id')->where($where)->get();
//        dd($data);
        return view('index.cart.cart',['data'=>$data]);
    }
    //修改购买数量
    public function changeNum(){
        $goods_id=\request()->goods_id;
        $buy_number=\request()->buy_number;
        $res=$this->changeNumDb($goods_id,$buy_number);

        if($res){
            echo json_encode(['font'=>'','code'=>1]);
        }else{
            echo json_encode(['font'=>'修改购买数量失败','code'=>2]);
        }
    }
    //修改购买数量---数据库
    public function changeNumDb($goods_id,$buy_number){
        $user_id=session('user.id');
        $where=[
            ['user_id','=',$user_id],
            ['goods_id','=',$goods_id],
            ['is_del','=',1]
        ];
        $res=Cart::where($where)->update(['buy_number'=>$buy_number]);
        return $res;
    }
    //从新获取总价
    public function getCount(){
        $goods_id=\request()->goods_id;
        $res = $this->getCountDb($goods_id);
        return $res;
    }
    //从新获取总价 -- 数据库
    public function getCountDb($goods_id){
        $goods_id = explode(',',$goods_id);
       // dd($goods_id);
        $user_id=session('user.id');
        $where=[
            ['user_id','=',$user_id],
            ['is_del','=',1]
        ];
      //  dd($where);
        $data = Cart::leftjoin('goods','goods.goods_id','=','cart.goods_id')->where($where)->whereIn('cart.goods_id',$goods_id)->get();
//        dd($data);
        $count=0;
        foreach($data as $k=>$v){
            $count+=$v['goods_price']*$v['buy_number'];
        }
        return $count;
    }
    //从新获取小计
    public function getTotal(){
        $goods_id=\request()->goods_id;
        $res = $this->getTotalDb($goods_id);
        return $res;
    }
    //从新获取小计 -- 购物车
    public function getTotalDb($goods_id){
//        $goods_id=explode(',',$goods_id);
        $user_id=session('user.id');
        $where=[
            ['user_id','=',$user_id],
            ['cart.goods_id','=',$goods_id],
            ['is_del','=',1]
        ];
        $data = Cart::join('goods','goods.goods_id','=','cart.goods_id')->where($where)->first();
        return $data['goods_price']*$data['buy_number'];
    }

    //删除购物车数据
    public function cartDel(){
        $goods_id=\request()->goods_id;
//        dd($goods_id);
        $res=$this->cartDelDb($goods_id);
        if($res){
            echo json_encode(['font'=>'','code'=>1]);
        }else{
            echo json_encode(['font'=>'删除失败','code'=>2]);
        }
    }
    //删除购物车数据--数据库
    public function cartDelDb($goods_id){
//        dd($goods_id);
        $goods_id = explode(',',$goods_id);
        $user_id=session('user.id');
        $where=[
            ['user_id','=',$user_id]
        ];
        $res=Cart::where($where)->whereIn('goods_id',$goods_id)->delete();
        return $res;
    }
}



































