<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
session_start();

class Grzx extends Controller
{
  public function index(){

    $arr=db('type')->where('pid',0)->select();
    foreach($arr as $k => $v){
      $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }

    //购物车商品数量
    $uid=$_SESSION['think']['user']['id'];
    $snum=Db::table('shopcar')->where('uid',$uid)->select();
    $shopnum=count($snum);
    //获取订单信息
    //待付款
    $sta0=count(Db::table('orders')->where('uid',$uid)->where('state',0)->select());
    //待发货
    $sta1=count(Db::table('orders')->where('uid',$uid)->where('state',1)->select());
    //待收货
    $sta2=count(Db::table('orders')->where('uid',$uid)->where('state',2)->select());
    //未评价
    $sta3=count(Db::table('orders')->where('uid',$uid)->where('state',3)->select());



    //view不需要继承
    return view('',['arr'=>$arr,'shopnum'=>$shopnum,'sta0'=>$sta0,'sta1'=>$sta1,'sta2'=>$sta2,'sta3'=>$sta3]);
    // $this->fetch需要继承
    // return $this->fetch();
  }


  public function change(){

    //类别
    $ss=db('type')->where('pid',0)->select();
    foreach($ss as $k => $v){
      $ss[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }
    //购物车商品数量
    $snum=Db::table('shopcar')->where('uid',$_SESSION['think']['user']['id'])->select();
    $shopnum=count($snum);

    // view不需要继承
    return view('',['ss'=>$ss,'shopnum'=>$shopnum]);
    // $this->fetch需要继承
    // return $this->fetch();
  }


  public function comment(){
    $o_id=input('get.id');
    $res=Db::table('orders')->where('id',$o_id)->find();

    $gid=explode(",",$res['gid']);
    $picname=explode(",",$res['picname']);
    $sname=explode(",",$res['sname']);
    $price=explode(",",$res['price']);
    $arr=[];
    for ($i=0; $i <count($gid) ; $i++) {
          $arr[$i]['o_id']=$o_id;
          $arr[$i]['gid']=$gid[$i];
          $arr[$i]['picname']=$picname[$i];
          $arr[$i]['sname']=$sname[$i];
          $arr[$i]['price']=$price[$i];
        }
    // dump($arr);
    $snum=Db::table('shopcar')->where('uid',$_SESSION['think']['user']['id'])->select();
    $shopnum=count($snum);
    //类别
    $ss=db('type')->where('pid',0)->select();
    foreach($ss as $k => $v){
      $ss[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }
    return view('comment',['arr'=>$arr,'shopnum'=>$shopnum,'ss'=>$ss]);
  }



  public function level(){
    $uid=$_SESSION['think']['user']['id'];
    $gid=input('post.gid');
    $oid=input('post.oid');
    $level=input('post.level');
    $content=input('post.content');
    $time=date('Y-m-d H:i:s',time());
    $data=['uid'=>$uid,'gid'=>$gid,'oid'=>$oid,'level'=>$level,'content'=>$content,'addtime'=>$time];
    $res=Db::table('comment')->insert($data);
    return $res;
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


    public function addfavorite(){
    $gid=input('get.id');
    $uid=$_SESSION['think']['user']['id'];
    $data = ['uid' => $uid, 'gid' => $gid];
    $res=db('collect')->insert($data);
    return view('favorite');
  }


  public function favorite(){
    $uid=$_SESSION['think']['user']['id'];
    $res=db('collect')->where('uid',$uid)->column('gid');
    $a=db('goods')->where('id','in',$res)->paginate(15);

    //购物车商品数量
    $uid=$_SESSION['think']['user']['id'];
    $snum=Db::table('shopcar')->where('uid',$uid)->select();
    $shopnum=count($snum);

    //类别
    $ss=db('type')->where('pid',0)->select();
    foreach($ss as $k => $v){
      $ss[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }

    return view('',['arr'=>$a,'ss'=>$ss,'shopnum'=>$shopnum]);
  }






}




 ?>