<?php
namespace app\index\controller;
use think\Controller;

class Lists extends Controller
{
  public function index(){
    //view不需要继承
    // return view();


    // $this->fetch需要继承
    return $this->fetch();
  }
}




 ?>