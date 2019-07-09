<?php
namespace app\index\controller;
use think\Controller;
use think\Request;


class Base extends controller
{
  public function _initialize(){
    $a=session('user');
    if(empty($a)){
      echo "<script>alert('请先登录!')</script>";
      echo "<script>window.location='/index/login/index'</script>";
      // $this->redirect('index/login/index');
    }
  }
}