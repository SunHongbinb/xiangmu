<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;

class Register extends Controller
{
  public function index(){
    // return view();
    return $this->fetch();
  }

  public function add(){
    $arr=input('post.');
    $user=db('user')->where('username',$arr['username'])->find();
    $data=['name'=>$arr['name'],'username'=>$arr['username'],'pass'=>$arr['pass'],'state'=>1];
    //判断账号是否存在
    if ($user==null) {
      //判断两个密码是否一致
    if ($arr['pass']!=$arr['pass1']) {
              return json(['code'=>'1','info'=>"两次密码不一致"]);
          }else{


            Db::name('user')->insert($data);
            return json(['code'=>'2','info'=>"注册成功"]);

          }
        }else{
          return json(['code'=>'0','info'=>"账号已注册"]);
        }
    return json($arr);
  }


}




 ?>