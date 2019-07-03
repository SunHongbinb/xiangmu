<?php
namespace app\admin\controller;

use think\Controller;

class Type extends Base
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
        $type=db('type')->where($where)->field(['id','pid','state','path','name','concat(path,id)'=>'paix',])->order('paix')->select();
        $arr=db('type')->column('pid');

        return view('',['type'=>$type,"pidarr"=>$arr,'length'=>count($arr)]);
    }
    public function delete($id)
    {
        $arr=db('type')->where('pid',$id)->select();
        if(empty($arr)){
    	    $result=db('type')->delete($id);
    	    return $result;  
        }
    }
    public function update()
    {
        $state=input('get.state');
        $id=input('get.id');
        $res=db('type')->where('id',$id)->whereOr('pid',$id)->update(['state'=>$state]);
        return $res;
    }
}