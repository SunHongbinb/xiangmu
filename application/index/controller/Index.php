<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
session_start();
class Index extends Controller
{
    public function index()
    {
        if($_SESSION==null){
            $banner=db('banner')->where('state',1)->order('id desc')->select();
            $arr=db('type')->where('pid',0)->select();
            foreach($arr as $k => $v){
              $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
            }
            $goods=db('goods')->where('state',1)->order('id desc')->select();
            $type=db('type')->where('pid',0)->where('state',1)->select();
            foreach ($type as $k => $v) {
                $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
                $list[$k]=array_slice($arr[$k]['zi'],8);

            }
            $tid=db('type')->where('pid',0)->where('state',1)->column('id');
            foreach($tid as $k=>$v){
                $tid[$k]=db('type')->where('pid',$v)->column('id');
                $gid[$k]=db('goods')->where('typeid','in',$tid[$k])->select();
                // 取前十个值
                $goodsid[$k]=array_slice($gid[$k],0,10);
            }
                return view('index',['arr'=>$arr,'goodsid'=>$goodsid,'list'=>$list,'banner'=>$banner,'type'=>$type,'goods'=>$goods]);
        }else{
            // dump($_SESSION);
            $uid=$_SESSION['think']['user']['id'];
            $banner=db('banner')->where('state',1)->order('id desc')->select();
            $arr=db('type')->where('pid',0)->select();
            foreach($arr as $k => $v){
              $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
            }
            $goods=db('goods')->where('state',1)->order('id desc')->select();
            $type=db('type')->where('pid',0)->where('state',1)->select();
            foreach ($type as $k => $v) {
                $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
                $list[$k]=array_slice($arr[$k]['zi'],8);

            }
            $tid=db('type')->where('pid',0)->where('state',1)->column('id');
            foreach($tid as $k=>$v){
                $tid[$k]=db('type')->where('pid',$v)->column('id');
                $gid[$k]=db('goods')->where('typeid','in',$tid[$k])->select();
                // 取前十个值
                $goodsid[$k]=array_slice($gid[$k],0,10);
            }

            $snum=Db::table('shopcar')->where('uid',$uid)->select();
            $shopnum=count($snum);
            // dump($goodsid);
            return view('index',['arr'=>$arr,'goodsid'=>$goodsid,'list'=>$list,'banner'=>$banner,'type'=>$type,'goods'=>$goods,'shopnum'=>$shopnum]);
        }

    }
    public function read(){
        $arr=db('type')->where('pid',0)->select();
        foreach($arr as $k => $v){
          $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
        }
        return view('',['arr'=>$arr]);
    }



}
