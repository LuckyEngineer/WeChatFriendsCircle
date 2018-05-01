<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 打印数组
 * @author lucky
 * @DateTime 2018-04-30T16:36:11+0800
 * @param    [type]                   $arr [description]
 * @return   [type]                        [description]
 */
function mp($arr){
	echo '<pre>';
	print_r($arr);
	exit();
}
//将格式化的时间转换成数组形式
function get_time_array($time){
	$time = date('Y-m-d H:i:s');
	$array =  explode(' ',$time);
	$dateArray = explode('-', $array[0]);
	$timeArray = explode(':', $array[1]);
	$t = [];
	//年
	$t['year'] = $dateArray[0];
	//月
	$t['month'] = ($dateArray[1][0]=='0')?$dateArray[1][1]:$dateArray[1];
	//日
	$t['day'] = ($dateArray[2][0]=='0')?$dateArray[2][1]:$dateArray[2];
	//时
	$t['hour'] = $timeArray[0];
	//分
	$t['minute'] = $timeArray[1];
	//秒
	$t['second'] = $timeArray[2];
	return $t;
}
//计算与当前的时间差
function calculate($time){
	//设置时区
	date_default_timezone_set("Asia/Shanghai");			
	$now = time();
	$date=floor(($now-$time)/86400);
	$hour=floor(($now-$time)%86400/3600);
	$minute=floor(($now-$time)%86400%3600/60);
	$second=floor(($now-$time)%86400%3600%60);
	if($date>0){
		if($date==1){
			$str = '昨天';
		}else{
			$str = $date.'天前';
		}
	}else if($hour>0){
		$str = $hour.'小时前';
	}else if($minute>0){
		$str = $minute.'分钟前';
	}else{
		$str = '刚刚';
	}
	return $str;
}