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
        if (!empty($b)) {
            $data['name']=input('get.name');
            $where['name']=['like','%'.$data['name'].'%'] ;
        }
        $orders=db('orders')->where($where)->order('state desc')->paginate(5,false,['query'=>$data]);
        $arr=db('orders')->select();
        return view('',['orders'=>$orders,'length'=>count($arr)]);
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