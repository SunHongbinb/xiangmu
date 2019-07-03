<?php
namespace app\admin\controller;

use think\Controller;

class User extends Base
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
	    $user=db('user')->where($where)->order('id desc')->paginate(5,false,['query'=>$data]);
	    $arr=db('user')->select();
	    return view('',['user'=>$user,'length'=>count($arr)]);
    }
    public function delete($id)
    {
        $res=db('user')->delete($id);
        return $res;
    }
    public function state($id,$state)
    {
        $res=db('user')->where('id',$id)->update(['state'=>"$state"]);
        return $res;
        
    }
}
