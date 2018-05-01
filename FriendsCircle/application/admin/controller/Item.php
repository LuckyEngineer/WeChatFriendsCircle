<?php
namespace app\admin\controller;
use think\Contoller;

class Item extends Base{
	public function _initialize(){
        $this->judgeLogin();
    }
	public function index(){
		// 查询所有朋友圈
		$items = model('item')->getAll();
		$this->assign("items",$items);
		return $this->fetch();
	}
	public function remove($id){
		$item = model('item')->removeItem($id);
		$imgs = model('imgs')->remove($id);
		$comments = model('comments')->remove($id);
		$likes = model('likes')->remove($id);
		$this->success("删除成功");
	}
}