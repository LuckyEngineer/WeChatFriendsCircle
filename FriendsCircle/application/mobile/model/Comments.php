<?php
namespace app\mobile\model;
use think\Model;

class Comments extends Model{
	// 获取与用户相关的评论信息
	public function getUserComment($user_id){
		$data = $this->alias('c')->field('u.head,u.username,c.content,c.time,imgs.href')->join('user u','u.id=c.user_id','left')->join('item i','i.id=c.item_id','left')->join('imgs','imgs.item_id=i.id','left')->where('i.user_id',$user_id)->group('c.id')->select();
		return $data;
	}
	public function getComments($item_id){
		$comments = $this->alias('c')->field('c.content,u.username')->join('user u','u.id=c.user_id','left')->where('item_id',$item_id)->select();
		return $comments;
	}
	public function remove($item_id){
		return $this->where('item_id',$item_id)->delete();
	}
}