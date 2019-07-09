<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Comment extends Base
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
        $comment=db('comment')->where($where)->order('id desc')->paginate(5,false,['query'=>$data]);
        $arr=db('comment')->select();
        return view('',['comment'=>$comment,'length'=>count($arr)]);
    }
    public function delete($id)
    {
        $res=db('comment')->delete($id);
        return $res;
    }
    public function state($id,$state)
    {
        $res=db('comment')->where('id',$id)->update(['state'=>"$state"]);
        return $res;
        
    }

}