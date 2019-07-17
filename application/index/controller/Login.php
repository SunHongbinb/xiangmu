<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Login extends Controller
{
  public function index(){
    //view不需要继承
    // return view();
    $arr=db('type')->where('pid',0)->select();
    foreach($arr as $k => $v){
      $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }

    // $this->fetch需要继承
    return view('',['arr'=>$arr]);
  }

  public function dologin(){
    $arr=input('get.');
    // dump($arr);
    $user=db('user')->where('username',$arr['username'])->find();
    if ($user==null) {
        return json(['code'=>'0','info'=>"账号不存在"]);
    }
    if ($user['pass']!=$arr['pass']) {
        return json(['code'=>'0','info'=>"密码错误"]);
    }
    if($user['state']>0){
        session('user',$user);
        return json(['code'=>'1','info'=>"登录成功"]);
    }else{
        return json(['code'=>'2','info'=>"已被禁用"]);
    }
  }

  public function loginout()
    {
        $id=$_GET['id'];
        $date=date("Y-m-d H:i:s");
        echo $date;
        DB::table('user')->where('id',$id)->update(['ltime'=>$date]);
        session(null,'think');
        $this->redirect('index/index/index');
    }



}




 ?>