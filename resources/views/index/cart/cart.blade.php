@extends('layouts.shop')

@section('title', '全国最大珠宝商---购物车')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/status/index/images/xiezhen.png" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">2</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/status/index/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     <div class="dingdanlist">
      <table>
          <tr>
              <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" id="allBox" /> 全选</a></td>
          </tr>
          @foreach($data as $v)

       <tr goods_id="{{$v->goods_id}}">
        <td width="4%"><input type="checkbox" name="1" class="box"/></td>
        <td class="dingimg" width="15%"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>下单时间：{{$v->add_time}}</time>
        </td>
        <td>
            <button style="width:25px;" class="jian">-</button>
            <input type="text" value="{{$v->buy_number}}" style="width:30px;text-align:center;" class="inp">
            <button style="width:25px;" class="jia">+</button>
     </td>
     </tr>
     <tr goods_id="{{$v->goods_id}}">

         <th colspan="4"><strong class="orange">¥{{$v->goods_price*$v->buy_number}}</strong></th>
         <td width="100%" colspan="4"><a href="javascript:;" class="del"> 删除</a></td>
     </tr>

     @endforeach
     <tr>
         <td width="100%" colspan="4"><a href="javascript:;"> 批量删除</a></td>
     </tr>
     <div class="height1"></div>
     <div class="gwcpiao">
         <tr >
             <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
             <td width="50%">总计：<b style="font-size:22px; color:#ff4e00;" id="count">￥0</b></td>
             <td width="40%"><a href="javascript:;" id="jiesuan">去结算</a></td>
         </tr>
     </div><!--gwcpiao/-->
     </table>
     </div><!--dingdanlist/-->

     <script src="/status/jquery.js"></script>
     <script>
         //点击加
         $(document).on('click','.jia',function(){
             var _this=$(this);//当前点击+
             var buy_number=parseInt(_this.prev('input').val());//获取当前文本框的值   parseInt把所有的数字转换为整数
             if(buy_number<=1) {
                _this.prev('input').val('1');
             }else{
                 buy_number+=1;
                 _this.prev('input').val(buy_number);
             }
             // 2.修改数据库的购买数量
             var goods_id=_this.parents("tr").attr("goods_id");
             // console.log(goods_id);
             changeNum(goods_id,buy_number);
             // 4.重新获取小计
             getTotal(goods_id,_this);
             // 5.重新获取总价
             getCount();
         });
         //点击减
         $(document).on('click','.jian',function(){
             var _this=$(this);//当前点击-
             var buy_number=_this.next("input").val();//购买数量
             if(buy_number<=1){
                 _this.next("input").val('1');
             }else{
                 buy_number=buy_number-1;
                 _this.next('input').val(buy_number);
             }
             // 2.修改数据库的购买数量
             var goods_id=_this.parents("tr").attr("goods_id");
             // console.log(goods_id);
             changeNum(goods_id,buy_number);
             // 4.重新获取小计
             getTotal(goods_id,_this);
             // 5.重新获取总价
             getCount();
         });
         //失去焦点
         $(document).on('blur','.inp',function(){
             var _this=$(this);
             var buy_number=_this.val();
             var reg=/^[\d]{1,5}$/;
             if(!reg.test(buy_number)||parseInt(buy_number)<=0){
                 _this.val('1');
             }else if(parseInt(buy_number)>=8000){
                 _this.val(buy_number);
             }else{
                 _this.val(parseInt(buy_number));
             }

             // 2.修改数据库的购买数量
             var goods_id=_this.parents("tr").attr("goods_id");
//              console.log(goods_id);
             changeNum(goods_id,buy_number);
             // 4.重新获取小计
             getTotal(goods_id,_this);
             // 5.重新获取总价
             getCount();
         })
         //点击复选框
         $(document).on('click','.box',function(){
            //1.从新获取总价
             getCount();
         });
         //点击删除
         $(document).on('click','.del',function(){
            var _this=$(this);
            var goods_id=_this.parents("tr").attr("goods_id");
//            console.log(goods_id);
            $.post(
                "{{url('cart/cartDel')}}",
                {goods_id:goods_id,_token:"{{csrf_token()}}"},
                function(res){
                    if(res.code==1){
                        _this.parents("tr").prev('tr').remove();
                        _this.parents("tr").remove();
                        getCount();
                    }else{
                        alert(res.font);
                    }
                },
                'json'
            )
         });
         //点击确认订单
         $(document).on('click','#jiesuan',function(){
            var _box=$('.box:checked');
            if(_box.length>0){
                var goods_id="";
                _box.each(function(index){
                    goods_id+=$(this).parents('tr').attr('goods_id')+',';
                })
                goods_id=goods_id.substr(0,goods_id.length-1);
                location.href="{{url('/order/confirmOrder')}}?goods_id="+goods_id;
            }else{
                alert('请至少选择一件商品进行结算');
            }
         });

         //从新获取小计
         function getTotal(goods_id,_this){
             $.ajax({
                 method:'post',
                 url:"{{url('cart/getTotal')}}",
                 data:{goods_id:goods_id,_token:"{{csrf_token()}}"},
                 async:false,
             }).done(function(res){
//                 alert(res);return false;
               _this.parents("tr").next("tr").find('strong').text('￥'+res);
             });
         }
         //修改数据库的购买数量
         function changeNum(goods_id,buy_number){
             $.ajax({
                 method:'post',
                 url:"{{url('cart/changeNum')}}",
                 data:{buy_number:buy_number,goods_id:goods_id,_token:"{{csrf_token()}}"},
                 async:false,
                 dataType:'json'
             }).done(function(res){
//                 console.log(res);
                 if(res.code==2){
                     alert(res.font);
                 }
             });
         }
        //从新获取总价
         function getCount(){
             var _box=$(".box:checked");
             var goods_id="";
             _box.each(function(index){
                 goods_id+=$(this).parents("tr").attr("goods_id")+',';
             })
             goods_id=goods_id.substr(0,goods_id.length-1);
             $.post(
                 "{{url('cart/getCount')}}",
                 {goods_id:goods_id,_token:"{{csrf_token()}}"},
                 function(res){
                     $("#count").text('¥'+res);
                 }
             )
         }
     </script>


     @include('index.public.footer');
@endsection