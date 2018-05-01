<?php
namespace app\mobile\model;
use think\Model;

class User extends Model{
	// 获取所有字段
	public function getAll(){
		return $this->select();
	}
	// 获取头像
	public function getHead($username){
		$cond['username'] = $username;
		$head = $this->field('head')->where($cond)->find();
		return $head;
	}
	// 获取用户信息
	public function getUser($cond){
		$user = $this->where($cond)->find();
		return $user;
	}
	// 插入数据
	public function add($data){
		return $this->insert($data);
	}
}