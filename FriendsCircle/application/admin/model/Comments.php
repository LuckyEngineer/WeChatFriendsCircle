<?php
namespace app\admin\model;
use think\Model;

class Comments extends Model{
	public function remove($item_id){
		return $this->where('item_id',$item_id)->delete();
	}
}