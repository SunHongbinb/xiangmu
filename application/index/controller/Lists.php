<?php
namespace app\index\controller;
use think\Controller;

class Lists extends Controller
{
  public function index()
  {
  	if (!empty($_GET['id'])) {
  		$id=$_GET['id'];
  		$arr=db('goods')->where('typeid',$id)->where('state','1')->select();
  	}elseif(!empty($_GET['company'])){
  		$company=$_GET['company'];
  		$arr=db('goods')->where('company',$company)->where('state','1')->select(); 		
  	}else{
      $name=$_GET['name'];
      $arr=db('goods')->where('name','like',"%$name%")->where('state','1')->select();
    }
  	$s=db('goods')->where('state','1')->order('typeid desc')->limit(10)->select();
    $type=db('type')->where('pid',0)->select();
    foreach($type as $k => $v){
      $type[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }
    return view('',['arr'=>$arr,'s'=>$s,'type'=>$type]);
  }
  public function sou(){
      $name=$_GET['name'];
      $arr=db('goods')->where('name','like',"%$name%")->where('state','1')->select();
  }
}




 ?>