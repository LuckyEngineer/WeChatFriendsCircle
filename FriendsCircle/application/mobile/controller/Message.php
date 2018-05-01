<?php
namespace app\mobile\controller;
use think\Controller;

/**
* 消息列表
*/
class Message extends Base{
	public function _initialize(){
        $this->judgeLogin();
        header('content-type:text/html;charset=utf-8');
    }
    // 消息列表
	public function index(){
		$data = model('comments')->getUserComment(session('id'));
		$data2 = model('likes')->getUserlike(session('id'));
		for($i=0;$i<count($data2);$i++){
			$data[] = $data2[$i];
		}
		if(!empty($data)){
			foreach($data as $key=>$val){
				$dos[$key] = $val['time'];
			}
			array_multisort($dos,SORT_DESC,$data);
			// 将时间转换成数组格式
			for($i=0;$i<count($data);$i++){
				$data[$i]['time'] = get_time_array($data[$i]['time']);
			}
		}
		$this->assign('username',session('username'));
		$this->assign('data',$data);
		return $this->fetch();
	}
}