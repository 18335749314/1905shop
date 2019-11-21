<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Goods;
use App\Cart;
class OrderController extends Controller
{
    //显示样式  和  商品信息
    public function confirmOrder(){
        $goods_id=\request()->goods_id;
        $goods_id = explode(',',$goods_id);
        $where=[
            ['is_del','=',1]
        ];
        $data=Goods::leftjoin('cart','goods.goods_id','=','cart.goods_id')->where($where)->whereIn('goods.goods_id',$goods_id)->get();
//        dd($data);
        $count=0;
        foreach($data as $k=>$v){
            $count+=$v['goods_price']*$v['buy_number'];
        }
//        dd($count);

        return view('index.order.index',['data'=>$data,'count'=>$count]);
    }
    //提交订单
    public function submitOrder(){
        $goods_id=\request()->goods_id;
//        dd($goods_id);
        $goods_id = explode(',',$goods_id);
        $where=[
            ['is_del','=',1]
        ];
        $data=Goods::leftjoin('cart','goods.goods_id','=','cart.goods_id')->where($where)->whereIn('goods.goods_id',$goods_id)->get();
//        dd($data);

        $order_number=time().rand(1000,9999);//订单号
//        $orderInfo['order_number']=$order_number;
//        dd($order_number);

        $count=0;
        foreach($data as $k=>$v){
            $count+=$v['goods_price']*$v['buy_number'];
        }
//        dd($count);
        return view('index.order.success',['data'=>$data,'count'=>$count,'order_number'=>$order_number]);
    }
    //订单
    public function pay(){
        require_once app_path().'/libs/alipay/wappay/service/AlipayTradeService.php';
        require_once app_path().'/libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
        $config=config('alipay');
        // dd($config);

        $order=\DB::table('order')->first();
        // dd($order);
        //商户订单号，商户网站订单系统中唯一订单号，必填

        $out_trade_no = $order->order_number;

        //订单名称，必填
        $subject = "小粉猪";

        //付款金额，必填
        $total_amount = $order->order_amount;

        //商品描述，可空
        $body = '';

        //超时时间
        $timeout_express="1m";

        $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setTimeExpress($timeout_express);

        $payResponse = new \AlipayTradeService($config);
        $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);
    }
}























