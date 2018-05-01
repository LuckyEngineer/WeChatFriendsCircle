<?php
namespace app\admin\controller;
use think\Controller;

class Login extends Controller{
	public function index(){
		return $this->fetch();
	}
	public function logout(){
		session('admin',null);
		$this->redirect('admin/login/index');
	}
	// 查询数据库
	public function login_deal(){
		$cond = [
			"username" => $_POST['username'],
			"password" => $_POST['password']
		];
		$data = model('user')->search($cond);
		if($data){
			session('admin',$data['id']);
			$this->success("登录成功","admin/index/index");
		}else{
			$this->error("登录失败");
		}
	}
}