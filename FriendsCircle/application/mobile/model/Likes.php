<?php
namespace app\mobile\model;
use think\Model;

class Likes extends Model{
	public function getLikes($item_id){
		$likes = $this->field('user.username')->join('user','user.id=likes.user_id','left')->where('item_id',$item_id)->select();
		return $likes;
	}
	// 获取与用户相关的点赞信息
	public function getUserlike($user_id){
		$data = $this->alias('l')->field('u.head,u.username,l.time,imgs.href')->join('user u','u.id=l.user_id','left')->join('item i','i.id=l.item_id','left')->join('imgs','imgs.item_id=i.id','left')->where('i.user_id',$user_id)->group('l.id')->select();
		return $data;
	}
	public function remove($cond){
		return $this->where($cond)->delete();
	}
}