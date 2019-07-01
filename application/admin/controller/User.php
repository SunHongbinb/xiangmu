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
	    return view('',['user'=>$user]);
    }
    public function delete($id)
    {
        $res=db('user')->delete($id);
        return $res;
    }
}
