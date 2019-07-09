<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    public function _initialize(){
    	$b=session('admin_user');
    	if (empty($b)) {
        	$this->redirect('admin/login/index');
    	}
    }
}