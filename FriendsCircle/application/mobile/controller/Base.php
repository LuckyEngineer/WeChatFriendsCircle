<?php
namespace app\mobile\controller;
use think\Controller;

class Base extends Controller{
	public function judgeLogin(){
		//判断session是否存在
		if(!session('?username')){
			return $this->redirect('mobile/user/login');
		}
	}
}