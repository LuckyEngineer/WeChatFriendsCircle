<?php
namespace app\admin\controller;
use think\Controller;

class User extends Base{
	public function _initialize(){
        $this->judgeLogin();
    }
	public function index($page=1,$key=''){
		// 定义每页显示多少条数据
		$count = 5;
		if($page<=0){
			$this->error('页数不能小于1');
		}
		$start = ($page-1)*$count;
		$users = model('user')->paging($key,$start,$count);
		$this->assign("users",$users);
		$this->assign("page",$page);
		return $this->fetch();
	}

	// 删除指定用户
	public function delete($id){
		$res = model('user')->remove($id);
		if($res){
			$this->success('操作成功','admin/user/index');
		}
	}
}