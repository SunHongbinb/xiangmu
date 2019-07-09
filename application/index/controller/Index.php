<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $banner=db('banner')->where('state',1)->order('id desc')->select();
        $arr=db('type')->where('pid',0)->select();
        foreach($arr as $k => $v){
          $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
        }
        $goods=db('goods')->where('state',1)->order('id desc')->select();
        $type=db('type')->where('pid',0)->where('state',1)->select();
        foreach ($type as $k => $v) {
            $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
            $arr1=array_slice($arr[$k]['zi'],8);
            $list[]=$arr1;
        }
        return view('index',['arr'=>$arr,'list'=>$list,'banner'=>$banner,'type'=>$type,'goods'=>$goods]);
    }



}
