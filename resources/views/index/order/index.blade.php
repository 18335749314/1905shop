@extends('layouts.shop')

@section('title', '全国最大珠宝商---订单表')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/status/index/images/head.jpg" />
     </div><!--head-top/-->
     <div class="dingdanlist" onClick="window.location.href='order.html'">
      <table>
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">新增收货地址</td>--}}
        {{--<td align="right"><img src="/status/index/images/jian-new.png" /></td>--}}
       {{--</tr>--}}
       {{--<tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>--}}
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">选择收货时间</td>--}}
        {{--<td align="right"><img src="/status/index/images/jian-new.png" /></td>--}}
       {{--</tr>--}}
       {{--<tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>--}}
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">支付方式</td>--}}
        {{--<td align="right"><span class="hui">网上支付</span></td>--}}
       {{--</tr>--}}
       {{--<tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>--}}
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">优惠券</td>--}}
        {{--<td align="right"><span class="hui">无</span></td>--}}
       {{--</tr>--}}
       {{--<tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>--}}
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">是否需要开发票</td>--}}
        {{--<td align="right"><a href="javascript:;" class="orange">是</a> &nbsp; <a href="javascript:;">否</a></td>--}}
       {{--</tr>--}}
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">发票抬头</td>--}}
        {{--<td align="right"><span class="hui">个人</span></td>--}}
       {{--</tr>--}}
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">发票内容</td>--}}
        {{--<td align="right"><a href="javascript:;" class="hui">请选择发票内容</a></td>--}}
       {{--</tr>--}}
       {{--<tr><td colspan="3" style="height:10px; background:#fff;padding:0;"></td></tr>--}}

       <tr>
        <td class="dingimg" width="75%" colspan="3">商品清单</td>
       </tr>
        @foreach($data as $k=>$v)
       <tr goods_id="{{$v->goods_id}}">
        <td class="dingimg" width="15%"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}"/></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>下单时间：2015-08-11  13:51</time>
        </td>
        <td align="right"><span class="qingdan">X {{$v->buy_number}}</span></td>
       </tr>
       <tr>
        <th colspan="3"><strong class="orange">¥{{$v->goods_price*$v->buy_number}}</strong></th>
       </tr>
       
       <tr>
        <td class="dingimg" width="75%" colspan="2">商品金额</td>
        <td align="right"><strong class="orange">¥{{$v->goods_price}}</strong></td>
       </tr>
          @endforeach
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">折扣优惠</td>--}}
        {{--<td align="right"><strong class="green">¥0.00</strong></td>--}}
       {{--</tr>--}}
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">抵扣金额</td>--}}
        {{--<td align="right"><strong class="green">¥0.00</strong></td>--}}
       {{--</tr>--}}
       {{--<tr>--}}
        {{--<td class="dingimg" width="75%" colspan="2">运费</td>--}}
        {{--<td align="right"><strong class="orange">¥20.80</strong></td>--}}
       {{--</tr>--}}
          <tr>
              <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
              <td width="50%">总计：<strong class="orange">¥{{$count}}</strong></td>
              <td width="40%"><a href="javascript:;" id="submitOrder">提交订单</a></td>
          </tr>
      </table>
     </div><!--dingdanlist/-->




     <script src="/status/jquery.js"></script>
     <script>
        $(document).on("click","#submitOrder",function(){
            var _tr=$("tr[goods_id]");
            var goods_id='';
            _tr.each(function(index){
                goods_id+=$(this).attr('goods_id')+',';
            });
            goods_id=goods_id.substr(0,goods_id.length-1);
            location.href="{{url('order/submitOrder')}}?goods_id="+goods_id;
        })
     </script>

     @include('index.public.footer');
     @endsection