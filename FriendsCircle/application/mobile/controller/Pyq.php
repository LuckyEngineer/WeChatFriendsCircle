<?php
namespace app\mobile\controller;
use think\Controller;

class Pyq extends Base{

	public function _initialize(){
        $this->judgeLogin();
        header('content-type:text/html;charset=utf-8');
    }
    
	public function index(){
		// 读取朋友圈中的所有数据
		$data = model('item')->getAll();
		// 循环遍历获取评论和点赞数据,并计算时间差
		for($i=0;$i<count($data);$i++){
			$data[$i]['imgs'] = explode('|', $data[$i]['imgs']);
			$data[$i]['comments'] = model('comments')->getComments($data[$i]['id']);
			$likes = model('likes')->getLikes($data[$i]['id']);
			$data[$i]['likes'] = model('likes')->getLikes($data[$i]['id']);
			$data[$i]['time_difference'] = calculate($data[$i]['time']);
		}
		$this->assign('username',session('username'));
		$this->assign('head',session('head'));
		$this->assign('data',$data);
		return $this->fetch();
	}
	// 点赞
	public function like($flag,$item_id){
		if($flag){
			$likes = model('likes');
			$likes->data([
				"item_id" => $item_id,
				"user_id" => session('id'),
				"time" => time()
			]);
			$likes->save();
		}else{
			$cond['user_id'] = session('id');
			$res = model('likes')->remove($cond);
		}
	}
	// 评论
	public function comment($item_id,$comment){
		$comments = model('comments');
		$comments->data([
			"item_id" => $item_id,
			"content" => $comment,
			"user_id" => session('id'),
			"time" => time()
		]);
		$comments->save();
	}
	// 删除朋友圈
	public function remove($item_id){
		$item = model('item')->removeItem($item_id);

		$imgs = model('imgs')->remove($item_id);
		$comments = model('comments')->remove($item_id);
		$likes = model('likes')->remove($item_id);
		if($item && $imgs && $comments && $likes){
			return true;
		}
	}
}