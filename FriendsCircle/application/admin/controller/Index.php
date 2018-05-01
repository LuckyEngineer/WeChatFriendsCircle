<?php
	namespace app\admin\controller;
	use think\Controller;

	class Index extends Base{
		public function _initialize(){
	        $this->judgeLogin();
	    }
		public function index(){
			return $this->fetch();
		}
		public function index_v1(){
			return $this->fetch();
		}
	}
