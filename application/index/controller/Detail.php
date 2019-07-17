<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
session_start();

class Detail extends Controller
{
  public function index(){
    if($_SESSION==null){
        $id=$_GET['id'];
        // dump($id);
        $a=db('goods')->find($id);
        $color=explode(',',$a['color']);
        $size=explode(',',$a['size']);
        // 字符串拆分成数组
        $picname=explode(',',$a['picname']);
        $r=$picname;
        array_pop($r);
        // dump($r);
        // return $this->fetch();
        $res=Db::table('comment')->where('gid',$id)->select();
        for ($i=0; $i <count($res) ; $i++) {
            $res[$i]['uname']=Db::table('user')->where('id',$res[$i]['uid'])->value('name');
        }

        $coll=Db::table('collect')->where('gid',$id)->select();
        $collect=count($coll);
        $comm=count($res);
        // dump($a);
        // dump($uname);
        $arr=db('type')->where('pid',0)->select();
          foreach($arr as $k => $v){
            $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
          }
        return view('',['arr'=>$a,'color'=>$color,'size'=>$size,'picname'=>$r,'comment'=>$res,'collect'=>$collect,'comm'=>$comm,'ar'=>$arr]);
    }else{
        $id=$_GET['id'];
        // dump($id);
        $a=db('goods')->find($id);
        $color=explode(',',$a['color']);
        $size=explode(',',$a['size']);
        // 字符串拆分成数组
        $picname=explode(',',$a['picname']);
        $r=$picname;
        array_pop($r);
        // dump($r);
        // return $this->fetch();
        $res=Db::table('comment')->where('gid',$id)->select();
        for ($i=0; $i <count($res) ; $i++) {
            $res[$i]['uname']=Db::table('user')->where('id',$res[$i]['uid'])->value('name');
        }

        $coll=Db::table('collect')->where('gid',$id)->select();
        $collect=count($coll);
        $comm=count($res);
        // dump($a);
        // dump($uname);
        $arr=db('type')->where('pid',0)->select();
          foreach($arr as $k => $v){
            $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
          }
        $uid=$_SESSION['think']['user']['id'];
        $snum=Db::table('shopcar')->where('uid',$uid)->select();
        $shopnum=count($snum);
        return view('',['arr'=>$a,'color'=>$color,'size'=>$size,'picname'=>$r,'comment'=>$res,'collect'=>$collect,'comm'=>$comm,'ar'=>$arr,'shopnum'=>$shopnum]);
    }
  }
}




 ?>