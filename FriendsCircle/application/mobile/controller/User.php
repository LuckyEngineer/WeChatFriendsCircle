<?php
namespace app\mobile\controller;
use think\Controller;

class User extends Controller{
	// 登录页
	public function login(){
		return $this->fetch();
	}
	// 登录时获取头像
	public function get_head($username){
		$head = model('user')->getHead($username);
		if($head){
			return $head['head'];
		}
	}
	// 登录验证
	public function login_deal($username,$password){
		$cond = [
			"username" => $username,
			"password" => $password
		];
		$user = model('user')->getUser($cond);
		if($user){
			session('username',$user['username']);
			session('head',$user['head']);
			session('id',$user['id']);
			$this->redirect('mobile/pyq/index');
		}else{
			$this->error('账号或密码错误');
		}
	}
	// 注册页
	public function register(){
		return $this->fetch();
	}
	// 保存注册信息到数据库
	public function register_deal($username,$password,$area,$tel){
		if(!($username && $password && $area && $tel)){
			$this->error('注册信息不完整，请返回重新填写！');
		}
		//判断账号是否已被注册
		$cond['username'] = $username;
		$res = model('user')->getUser($cond);
		if($res){
			$this->error('账号已被注册');
		}
		$file = request()->file('file');
		if($file){
			$info = $file->move(ROOT_PATH.'public/static/head');
			$head = $info->getSaveName();
			$data = ([
							"username" => $username,
							"password" => $password,
							"area" => $area,
							"telephone" => $tel,
							"head" => $head
						]);
			$res = model('user')->add($data);
			if(!$res){
				$this->error('数据存储失败');
			}
			$this->redirect('mobile/user/login');
		}else{
			// 上传失败
			$this->error('图片上传失败');
		}
	}
	// 主界面
	public function main(){
		return $this->fetch();
	}
	// 退出登录
	public function logout(){
		session('username',null);
		session('password',null);
		session('id',null);
		$this->redirect('mobile/user/main');
	}
}