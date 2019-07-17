<?php
namespace app\admin\controller;

use think\Controller;

class Orders extends Base
{
    public function index()
    {
        $data = [];
        $where= [];
        $b = input('get.name');
        $c=input('get.state');
        if (!empty($b)) {
            $data['name']=input('get.name');
            $where['id']=['like','%'.$data['name'].'%'] ;
        }
        if(empty($c)){
            $orders=db('orders')->where($where)->order('state desc')->paginate(5,false,['query'=>$data]);
        }else{
            $orders=db('orders')->where($where)->where('state',$c)->order('state desc')->paginate(5,false,['query'=>$data]);
        }
        $arr=db('orders')->select();
        $state=array('0'=>'待确认','1'=>'已确认','2'=>'已发货','3'=>'已收货','4'=>'已评论','5'=>'已取消');
        return view('',['orders'=>$orders,'length'=>count($arr),'state'=>$state]);
    }
    public function delete($id)
    {
        $res=db('orders')->delete($id);
        return $res;
    }
    public function state($id,$state)
    {
        $res=db('orders')->where('id',$id)->update(['state'=>"$state"]);
        return $res;
        
    }
}