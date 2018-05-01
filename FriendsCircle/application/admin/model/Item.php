<?php
namespace app\admin\model;
use think\Model;

class Item extends Model{
	public function getAll(){
		$items = $this->field('item.id,item.content,item.time,user.username,user.head,group_concat(imgs.href separator "|") imgs')->join('user',"user.id=item.user_id",'left')->join('imgs','item.id=imgs.item_id','left')->group('item.id')->order('item.id desc')->select();
		for($i=0;$i<count($items);$i++){
			$items[$i]['imgs'] = explode('|',$items[$i]['imgs']);
			$items[$i]['time'] = date('Y-m-d H:i:s',$items[$i]['time']);
		}
		return $items;
	}
	public function removeItem($id){
		$res = $this->where('id',$id)->delete();
		return $res;
	}
}