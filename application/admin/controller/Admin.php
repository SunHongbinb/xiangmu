<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Admin extends Base
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
        $admin=db('admin')->where($where)->order('id desc')->paginate(5,false,['query'=>$data]);
        $arr=db('admin')->select();
        return view('',['admin'=>$admin,'length'=>count($arr)]);
    }
    public function delete($id)
    {
        $res=db('admin')->delete($id);
        return $res;
    }
    public function edit($id)
    {
        $arr=db('admin')->find($id);
        return view('',['arr'=>$arr]);
    }
    public function state($id,$state)
    {
        $res=db('admin')->where('id',$id)->update(['state'=>"$state"]);
        return $res;
        
    }
    public function update()
    {
        $arr=input('post.'); 
        unset($arr['repass']); 
        dump($arr); 
        $res=db('admin')->where('id',$arr['id'])->update($arr);
        return $res;
        
    }
    public function add(){
        return view();
    }
    public function insert(Request $request){
        $arr=input('post.');
        unset($arr['repass']);
        $arr['ctime']=date("Y-m-d",time());
        $res=db('admin')->insert($arr);
        return $res;
    }

}