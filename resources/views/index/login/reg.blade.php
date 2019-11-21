@extends('layouts.shop')

@section('title', '全国最大珠宝商--注册页面')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/status/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('register')}}" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{url('login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="输入手机号码或者邮箱号" id="email" name="email"/></div>
         <b style="color:red">@php echo $errors->first('email'); @endphp</b>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" name="remember_token"/> <button><a href="javascript:;" id="sendEmail">获取验证码</a></button></div>
          <b style="color:red">@php echo $errors->first('remember_token'); @endphp</b>
       <div class="lrList"><input type="password" placeholder="设置新密码（6-18位数字或字母）" name="password" /></div>
          <b style="color:red">@php echo $errors->first('password'); @endphp</b>
       <div class="lrList"><input type="password" placeholder="再次输入密码" name="password" /></div>
          <b style="color:red">@php echo $errors->first('password'); @endphp</b>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <script src="{{asset('/status/jquery.js')}}"></script>
     <script>
         $("#sendEmail").click(function(){
             var email=$("#email").val()
             $.post(
                 "{{url('/send')}}",
                 {email:email,_token:"{{csrf_token()}}"},
                 function(res){
                     console.log(res);
                 }
             )
         });

     </script>

     @include('index.public.footer');
@endsection