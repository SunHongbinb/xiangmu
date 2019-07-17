<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Shopcar extends Base
{
  public function index(){
    $uid=$_SESSION['think']['user']['id'];
    // dump($uid);
    $res=Db::table('shopcar')->where('uid',$uid)->select();
    // dump($res);
    $snum=Db::table('shopcar')->where('uid',$uid)->select();
    $shopnum=count($snum);
    $arr=db('type')->where('pid',0)->select();
    foreach($arr as $k => $v){
      $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }
    return view('',['arr'=>$res,'shopnum'=>$shopnum,'ar'=>$arr]);


    // // $this->fetch需要继承
    // return $this->fetch();
  }


    public function del(){
      $gid=input('get.id');
      $res=Db::table('shopcar')->where('id',$gid)->delete();
      $this->redirect('index');
    }



  public function add(){
    $arr=input('post.');
    $id=input('post.id');
    $picname=input('post.picname');
    $a=db('goods')->find($id);
    $name=$a['name'];
    $uid=$arr['uid'];
    $size=$arr['size'];
    $color=$arr['color'];
    $price=$a['price'];
    $num=$arr['num'];
    $store=$arr['store'];
    $total=$price*$num;
    $data=['name'=>$name,'uid'=>$uid,'size'=>$size,'color'=>$color,'price'=>$price,'num'=>$num,'price'=>$price,'total'=>$total,'picname'=>$picname,'store'=>$store,'gid'=>$id];
    $res=Db::name('shopcar')->insert($data);
    // $res=1;
    return $res;
  }



}




 ?>