<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        $arr=db('type')->where('pid',0)->select();
        foreach($arr as $k => $v){
          $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
        }
        // dump($arr);
        return view('',['arr'=>$arr]);
    }
}
