@extends('layouts.shop')

@section('title', '全国最大珠宝商---详情页')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
         <img src="{{env('UPLOAD_URL')}}{{$goodsInfo->goods_img}}" />
         {{--<img src="/status/index/images/xiezhen2.png" />--}}
         {{--<img src="/status/index/images/xixi.gif" />--}}
         {{--<img src="/status/index/images/xiezhen3.jpg" />--}}
         {{--<img src="/status/index/images/xiezhen4.jpg" />--}}
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr goods_id="{{$goodsInfo->goods_id}}">
       <th><strong class="orange">{{$goodsInfo->goods_price}}</strong></th>
       <td>
        <input type="text" class="spinnerExample" />
       </td>
      </tr>
      <tr>
       <td>
        <strong>{{$goodsInfo->goods_name}}</strong>
        <p class="hui">{{$goodsInfo->goods_desc}}</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
     <div class="height2"></div>
     <h3 class="proTitle">商品规格</h3>
     <ul class="guige">
      <li class="guigeCur"><a href="javascript:;">50ML</a></li>
      <li><a href="javascript:;">100ML</a></li>
      <li><a href="javascript:;">150ML</a></li>
      <li><a href="javascript:;">200ML</a></li>
      <li><a href="javascript:;">300ML</a></li>
      <div class="clearfix"></div>
     </ul><!--guige/-->
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <img src="{{env('UPLOAD_URL')}}{{$goodsInfo->goods_img}}" width="636" height="822" />
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a href="javascript:;"  id='car'>加入购物车</a></td>
      </tr>
     </table>
     <script src="/status/jquery.js"></script>
     <script>
         $(document).on("click","#car",function(){
             var buy_number = $(".spinnerExample").val();
             var goods_id=$(".spinnerExample").parents('tr').attr('goods_id');
             var add_price=$(".orange").text();
             $.post(
                 "{{url('cart/addCart')}}",
                 {buy_number:buy_number,goods_id:goods_id,add_price:add_price,_token:"{{csrf_token()}}"},
                 function(res){
                     if(res.code==2){
                         alert(res.font);
                     }else{
                         location.href="{{url('/cart/index')}}"
                     }
                 },
                 'json'
             )
         })
     </script>
     @include('index.public.footer');
@endsection














