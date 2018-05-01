<?php
namespace app\mobile\controller;
use think\Controller;

/**
* 发布朋友圈
*/
class Album extends Base{
	public function _initialize(){
        $this->judgeLogin();
        header('content-type:text/html;charset=utf-8');
    }
    // 相册
	public function index(){
		$data = model('item')->getAlbum();
		for($i=0;$i<count($data);$i++){
			$data[$i]['img'] = explode('|', $data[$i]['img']);
			$data[$i]['time'] = get_time_array($data[$i]['time']);
		}
		$this->assign('username',session('username'));
		$this->assign('head',session('head'));
		$this->assign('data',$data);
		return $this->fetch();
	}
}