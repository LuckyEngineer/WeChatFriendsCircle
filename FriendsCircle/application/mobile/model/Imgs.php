<?php
namespace app\mobile\model;
use think\Model;

class Imgs extends Model{
	// 删除item相关图片
	public function remove($item_id){
		return $this->where('item_id',$item_id)->delete();
	}
}