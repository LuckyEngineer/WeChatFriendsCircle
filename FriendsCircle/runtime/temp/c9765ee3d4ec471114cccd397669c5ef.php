<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"D:\phpStudy\WWW\WeChatFriendsCircle\FriendsCircle\public/../application/mobile\view\album\index.html";i:1525143733;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- 引入font-awesome.min.css -->
	<link rel="stylesheet" type="text/css" href="/static/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- 引入bootstrap.min.css -->
	<link rel="stylesheet" type="text/css" href="/static/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/static/mobile/css/album.css">
	<!-- 引入IconFont 图标生成的symbol代码 -->
	<script src="/static/mobile/Iconfont/iconfont.js"></script>
	<title>我的相册</title>
</head>
<body>
	<div class="header">
		<a href="<?php echo url('mobile/pyq/index'); ?>">
			<svg class="icon last" aria-hidden="true">
			  	<use xlink:href="#icon-xitongfanhui"></use>
			</svg>
		</a>
		<div class="header_line"></div>
		<div class="title">我的相册</div>
		<a href="<?php echo url('mobile/message/index'); ?>">
			<svg class="icon comment" aria-hidden="true">
			  	<use xlink:href="#icon-pinglun"></use>
			</svg>
		</a>
		<div sytle="clear:both;"></div>
	</div>
	<div class="model">
		<img src="/static/mobile/images/cover.jpg" data-toggle="modal" data-target="#myModal">
		<span class="user_name"><?php echo $username; ?></span>
		<div class="picture">
			<img src="/static/mobile/images/head/<?php echo $head; ?>" class="user_head">
		</div>
	</div>
	<p class="p">如果你是行动的矮子，就算你是思想的巨人，也无济于补。</p>
	<ul class="content">
		<li>
			<div class="time">
				<span class="date">今天</span>
				<span class="month"></span>
			</div>
			<p class="position"></p>
			<div class="picture_box now">
				<svg class="icon" aria-hidden="true">
				  	<use xlink:href="#icon-xiangji"></use>
				</svg>
			</div>
			<p class="description">
				
			</p>
			<div class="clear:both;"></div>
		</li>	
		<?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): foreach($data as $info): ?>
				<li>
					<div class="time">
						<span class="date"><?php echo $info['time']['day']; ?></span>
						<span class="month"><?php echo $info['time']['month']; ?>月</span>
					</div>
					<!-- <p class="position">梅州</p> -->
					<?php if(count($info['img']) == 1): ?> 
						<div class="picture_box box2">
							<img src="/static/upload/<?php echo $info['img'][0]; ?>">
						</div>
					<?php elseif((count($info['img']) == 2) OR (count($info['img']) == 3)): ?>
						<div class="picture_box box3">
							<img src="/static/upload/<?php echo $info['img'][0]; ?>">
							<img src="/static/upload/<?php echo $info['img'][1]; ?>">
						</div>
					<?php elseif(count($info['img']) > 3): ?>
						<div class="picture_box box1">
							<img src="/static/upload/<?php echo $info['img'][0]; ?>">
							<img src="/static/upload/<?php echo $info['img'][1]; ?>">
							<img src="/static/upload/<?php echo $info['img'][2]; ?>">
							<img src="/static/upload/<?php echo $info['img'][3]; ?>">
						</div>
					<?php endif; ?>
					<p class="description">
						<?php echo $info['content']; ?>
					</p>
					<div class="clear:both;"></div>
				</li>
			<?php endforeach; endif; ?>
	</ul>
	<!-- Model cover -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top:250px;z-index:9999;">
	  <div class="modal-dialog" role="document" style="margin-left:30px;margin-right:30px;">
	    <div class="modal-content"  style="overflow:hidden;border-radius:3px;">
	      <div class="modal-header" style="padding-left: 20px;">
	        <h4 style="float:left;" class="modal-title" id="myModalLabel">更换相册封面</h4>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- 引入jquery.min.js -->
	<script type="text/javascript" src="/static/bootstrap/js/jquery.min.js"></script>
	<!-- 引入bootstrap.min.js -->
	<script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>