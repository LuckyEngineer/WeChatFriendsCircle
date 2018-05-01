<?php
namespace app\mobile\controller;
use think\Controller;

/**
* 详细资料
*/
class Detail extends Base{
	public function _initialize(){
        $this->judgeLogin();
        header('content-type:text/html;charset=utf-8');
    }
    // 显示详细资料
	public function index($name){
		$cond['username'] = $name;
		$data = model('user')->getUser($cond);
		$img = model('item')->getImgs($name);
		$href = [];
		$number = 0;
		for($i=0;$i<count($img);$i++){
			if($number==3){
				break;
			}
			if(strpos($img[$i]['img'], '|')){
				$imgArray = explode('|', $img[$i]['img']);
				foreach ($imgArray as $key => $value) {
					$href[] = $value;
					$number++;
					if($number==3){
						break;
					}
				}
			}else{
				$href[] = $img[$i]['img'];
				$number++;
			}
		}
		$this->assign('href',$href);
		$this->assign('data',$data);
		return $this->fetch();
	}
    
}