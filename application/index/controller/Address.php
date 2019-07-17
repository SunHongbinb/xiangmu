<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
session_start();
class Address extends Controller
{
  public function index(){
    $uid=$_SESSION['think']['user']['id'];
    $a=Db::table('address')->where('uid','2')->order('id desc')->select();
    // dump($a) ;
    //view不需要继承
    //类别
    $ss=db('type')->where('pid',0)->select();
    foreach($ss as $k => $v){
      $ss[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }

    $snum=Db::table('shopcar')->where('uid',$_SESSION['think']['user']['id'])->select();
    $shopnum=count($snum);
    return view('',['arr'=>$a,'ss'=>$ss,'shopnum'=>$shopnum]);
    // $this->fetch需要继承
  }

  public function shuju(){
     $res=db('district')->where('upid',$_POST['upid'])->select();
     return $res;
  }

  public function add(){
    $uid=$_SESSION['think']['user']['id'];
    $arr=input('post.add');
    $address=input('post.address');
    $phone=input('post.phone');
    $name=input('post.name');
    $ae=explode("@",$arr);
    $aa=[];
    for ($i=0; $i < count($ae)-1; $i++) {
       $wei=Db::table('district')->where('id',$ae[$i])->column('name');
       $aa[]=$wei;
     }
     foreach ($aa as $v){
       $v = join(",",$v); //可以用implode将一维数组转换为用逗号连接的字符串，join是别名
       $temp[] = $v;
     }
     $str=implode('',$temp);
     $dizhi=$str.$address;
     $data=['name'=>$name,'phone'=>$phone,'address'=>$dizhi,'uid'=>$uid];
     Db::name('address')->insert($data);
  }


  public function del(){
      $id=input("get.id");
      // return $id;
      // return $id;
      $m=Db::table('address')->where('id',$id)->delete();
      return $m;
  }

    public function edit(){
      $id=input("get.id");
      // dump($id);
      $a=Db::table('address')->where('id',$id)->select();
      // dump($a);
      //类别
      $ss=db('type')->where('pid',0)->select();
      foreach($ss as $k => $v){
        $ss[$k]['zi']=db('type')->where('pid',$v['id'])->select();
      }
      //购物车商品数量
      $snum=Db::table('shopcar')->where('uid',$_SESSION['think']['user']['id'])->select();
      $shopnum=count($snum);
      return view('',['arr'=>$a,'ss'=>$ss,'shopnum'=>$shopnum]);

  }


  public function update(){
      $id=input("post.id");
      $name=input("post.name");
      $phone=input("post.phone");
      $address=input("post.address");
      // return $id;
      $data=['name'=>$name,'phone'=>$phone,'address'=>$address];
      Db::table('address')->where('id',$id)->update($data);
  }

}




 ?>