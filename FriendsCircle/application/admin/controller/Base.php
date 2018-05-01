<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller{
	public function judgeLogin(){
		//判断session是否存在
		if(!session('?admin')){
			return $this->redirect('admin/login/index');
		}
	}
}