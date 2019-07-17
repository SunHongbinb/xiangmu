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
        $user=db('user')->column('name','id');
        $goods=db('goods')->column('name','id');
        $admin=db('admin')->column('name','id');
        $arr=db('comment')->select();
        return view('',['comment'=>$comment,'user'=>$user,'admin'=>$admin,'goods'=>$goods,'length'=>count($arr)]);
    }
    public function delete($id)
    {
        $res=db('comment')->delete($id);
        return $res;
    }
    public function add()
    {
        return view(); 
    }
    public function update()
    {
        $arr=input('post.');
        dump($arr);
        $rtime=date('Y-m-d H-i-s',time());
        $res=db('comment')->where("id",$arr['id'])->update(['state'=>'1','aid'=>$arr['aid'],'reply'=>$arr['reply'],'rtime'=>$rtime]);
        return $res;
    }

}