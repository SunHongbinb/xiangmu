<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Base
{
    public function index()
    {
    	return view();
    }

    public function welcome()
    {
    	$user=session('user');
    	return view('',['user'=>$user]);
    }
}