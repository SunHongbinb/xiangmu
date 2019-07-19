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
    public function read($id)
    {
        $arr=db('orders')->find($id);
        $arr['gid']=explode(',',$arr['gid']);
        $arr['sname']=explode(',',$arr['sname']);
        $arr['picname']=explode(',',$arr['picname']);
        $arr['price']=explode(',',$arr['price']);
        $arr['num']=explode(',',$arr['num']);
        $arr['size']=explode(',',$arr['size']);
        $arr['color']=explode(',',$arr['color']);
        for($i=0;$i<count($arr['gid']);$i++){
            $goods[$i]=['gid'=>$arr['gid'][$i],'sname'=>$arr['sname'][$i],'picname'=>$arr['picname'][$i],'price'=>$arr['price'][$i],'num'=>$arr['num'][$i],'size'=>$arr['size'][$i],'color'=>$arr['color'][$i]];
        }
        $state=array('0'=>'待确认','1'=>'已确认','2'=>'已发货','3'=>'已收货','4'=>'已评论','5'=>'已取消');
        $total=explode(',',$arr['total']);
        $arr['total']=0;
        foreach ($total as $v) {
            $arr['total']+=$v;
        }
        return view('',['arr'=>$arr,'state'=>$state,'goods'=>$goods]);
        
    }
}