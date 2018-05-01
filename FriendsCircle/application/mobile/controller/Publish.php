<?php
namespace app\mobile\controller;
use think\Controller;

/**
* 发布朋友圈
*/
class Publish extends Base{
	public function _initialize(){
        $this->judgeLogin();
        header('content-type:text/html;charset=utf-8');
    }
    // 显示发布页
	public function index(){
		return $this->fetch();
	}
	// 发布朋友圈
	public function upload($idea){
		$item = model('item');
		$item->data([
			"user_id" => session('id'),
			"content" => $idea,
			"time" => time()
		]);
		$item->save();
		$id = model('item')->getLastInsID();
	    // 获取表单上传文件
	    $files = request()->file('image');
	    foreach($files as $file){
	        // 移动到框架应用根目录/public/uploads/ 目录下
	        $info = $file->move(ROOT_PATH.'public'.DS.'static'.DS.'upload');
	        if($info){
	            $head = $info->getSaveName(); 
				$href[] = $head; 
	        }else{
	            // 上传失败获取错误信息
	            $this->error('图片上传失败');
	        }    
	    }
	    $imgs = model('imgs');
	    foreach($href as $key=>$value){
			$data = [
				"item_id" => $id,
				"href" => $value
			];
			$imgs->insert($data);
	    }
	    $this->redirect('mobile/pyq/index');
	}
}