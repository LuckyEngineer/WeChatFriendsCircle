<?php
namespace app\admin\model;
use think\Model;

class User extends Model{
	// 获取user表中的所有数据
	public function getAll(){
		$this->select();
	}
	// 按条件查询
	public function search($cond){
		$data = model('user')->where($cond)->find();
		return $data;
	}
	// 分页
	public function paging($key,$start,$count){
		$users = $this->field('id,username,password,head')->where('username','like','%'.$key.'%')->limit($start,$count)->select();
		return $users;
	}
	// 删除数据
	public function remove($id){
		$res = $this->where('id',$id)->delete();
		return $res;
	}
}