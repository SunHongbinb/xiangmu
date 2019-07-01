<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
class Login extends Controller
{
	public function index()
    {
        return view();
    }
    public function dologin()
    {
        $arr=input('get.');
        $user=db('admin')->where('username',$arr['username'])->find();
        if ($user==null) {
            return json(['code'=>'0','info'=>"账号不存在"]);
        }
        
        if ($user['pass']!=$arr['pass']) {
            return json(['code'=>'0','info'=>"密码错误"]);
        }else{
            session('user',$user);
            return json(['code'=>'1','info'=>"登录成功"]);
        }
    }
    public function loginout()
    {
        session(null,'think');
        $this->redirect('/admin/login/index');
    }
}