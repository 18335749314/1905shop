<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\user;

class LoginController extends Controller
{
    //注册  邮箱发送验证码
    public function send(){
        $email = request()->email;
//        $email = 't18335749314@163.com';

        $code=rand(100000,999999);
        $message = "你正在注册全国最大的珠宝商会员,验证码:".$code;

        //发送邮箱
        $this->sendemail($email,$message);

    }
    //纯文字发送
    public function sendemail($email,$message){
        Mail::raw($message ,function($message)use($email){
            //设置主题
            $message->subject("你疼粑粑给你发的");
            //设置接收方
            $message->to($email);
        });
    }
    //执行注册
    public function register(){
        $post=request()->all();
        $validator = \Validator::make($post, [
            'email' => 'required|email|unique:users',
            'remember_token' => 'required|unique:users',
            'password' => 'required|between:4,10'
        ],[
            'email.required' => '邮箱不能为空',
            'email.email' => '请用正确的邮箱格式',
            'email.unique' => '邮箱已存在',
            'remember_token.required' => '验证码不能为空',
            'remember_token.between' => '验证码已存在',
            'password.required' => '密码不能为空',
            'password.between' => '密码必须在4-10之间',
        ]);
        if ($validator->fails()) {
            return redirect('brand/create')
                ->withErrors($validator)
                ->withInput();
        }
//        $post['password']=md5($post['password']);
        $user = User::create($post);
        if ($user->id) {
            return redirect('/login');
        }
    }
    //执行登录
    public function logindo(){
        $data = \request()->except('_token');
        $where = [
            ['email','=',$data['email']],
            ['password','=',$data['password']]
        ];
        $res = User::where($where)->first();
        if($res){
//            echo '登陆成功';
            session(['user'=>$res]);
            $user=session('user');
            return redirect()->intended('/');
        }else{
            //echo '登陆失败';
            return redirect('/login')->with("msg","登陆失败");
        }

    }



}
