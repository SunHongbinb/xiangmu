<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Grzx extends Controller
{
  public function index(){
    //view不需要继承
    // return view();


    // $this->fetch需要继承
    return $this->fetch();
  }


  public function change(){
    //view不需要继承
    // return view();


    // $this->fetch需要继承
    return $this->fetch();
  }

  public function update(){
     // dump(input('post.'));
     $id=input('post.id');
     $pass=input('post.pass');
     $newpass=input('post.newpass');
     $newpass1=input('post.newpass1');
     $a=db('user')->where('id',$id)->find();
     if($pass==$a['pass']){
      if($newpass==$newpass1){
        $res=Db::table('user')->where('id',$id)->setfield('pass',$newpass);
        if($res>0){
          return json(['code'=>'2','info'=>"密码修改成功"]);
        }else{
          return json(['code'=>'3','info'=>"密码修改失败"]);
        }
      }else{
        return json(['code'=>'1','info'=>"两次密码不一致"]);
      }
     }else{
      return json(['code'=>'0','info'=>"密码错误"]);
     }
     // return $a;
  }



}




 ?>