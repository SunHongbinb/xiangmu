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
        $type=db('type')->where($where)->field(['id','pid','name','concat(path,id)'=>'ppp',])->order('ppp')->select();
        return view('',['type'=>$type]);
    }
    public function delete($id)
    {
        $arr=db('type')->where('pid',$id)->select();
        if(empty($arr)){
    	    $result=db('type')->delete($id);
    	    return $result;  
        }
    }
}