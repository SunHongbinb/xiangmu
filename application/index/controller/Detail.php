<?php
namespace app\index\controller;
use think\Controller;

class Detail extends Controller
{
  public function index(){
    $id=$_GET['id'];
    // dump($id);
    $a=db('goods')->find($id);
    $color=explode(',',$a['color']);
    $size=explode(',',$a['size']);
    // 字符串拆分成数组
    $picname=explode(',',$a['picname']);
    $r=$picname[0];
    // dump($r);
    // return $this->fetch();
    return view('',['arr'=>$a,'color'=>$color,'size'=>$size,'picname'=>$r]);
  }
}




 ?>