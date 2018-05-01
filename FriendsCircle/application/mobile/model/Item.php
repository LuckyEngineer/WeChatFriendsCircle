<?php
namespace app\mobile\model;
use think\Model;

class Item extends Model{
	public function getAll(){
		$data = $this->alias('i')->field('i.id,i.content,i.content,i.time,u.head,u.username,group_concat(imgs.href separator "|") imgs')->join('user u','u.id=i.user_id','left')->join('imgs','imgs.item_id=i.id','left')->group('i.id')->order('i.id desc')->select();
		return $data;
	}
	public function removeItem($item_id){
		return $this->where('id',$item_id)->delete();
	}
	// 获取用户发布的所有朋友圈图片
	public function getImgs($name){
		$data = $this->field('group_concat(imgs.href separator "|") img')->join('user','user.id=item.user_id','left')->join('imgs','imgs.item_id=item.id','left')->where('user.username',$name)->group('item.id')->order('item.id desc')->select();
		return $data;
	}
	public function getAlbum(){
		$data = $this->alias('i')->field('i.content,i.time,group_concat(imgs.href separator "|") img')->join('imgs','imgs.item_id=i.id','left')->where('i.user_id',session('id'))->group('i.id')->order('i.id desc')->select();
		return $data;
	}
}