<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"D:\phpStudy\WWW\WeChatFriendsCircle\FriendsCircle\public/../application/mobile\view\message\index.html";i:1525143745;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- 引入font-awesome.min.css -->
	<link rel="stylesheet" type="text/css" href="/static/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- 引入bootstrap.min.css -->
	<link rel="stylesheet" type="text/css" href="/static/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/static/mobile/css/message.css">
	<!-- 引入IconFont 图标生成的symbol代码 -->
	<script src="/static/mobile/Iconfont/iconfont.js"></script>
	<title>消息</title>
</head>
<body>
	<div class="header">
		<a href="<?php echo url('mobile/album/index'); ?>">
			<svg class="icon last" aria-hidden="true">
			  	<use xlink:href="#icon-xitongfanhui"></use>
			</svg>
		</a>
		<div class="header_line"></div>
		<div class="title">消息</div>
		<span>清空</span>
		<div sytle="clear:both;"></div>
	</div>
	<?php foreach($data as $info): if($info['username'] != $username): ?>
			<div class="container">
				<img src="/static/mobile/images/head/<?php echo $info['head']; ?>">
				<ul class="list-style">
					<li class="name"><?php echo $info['username']; ?></li>
					<li class="comment">
						<?php if(isset($info['content'])): ?>
							<?php echo $info['content']; else: ?>
							<i class="fa fa-heart-o heart"></i>
						<?php endif; ?>
					</li>
					<li class="time"><?php echo $info['time']['month']; ?>月<?php echo $info['time']['day']; ?>日 <?php echo $info['time']['hour']; ?>:<?php echo $info['time']['minute']; ?></li>
				</ul>
				<img src="/static/upload/<?php echo $info['href']; ?>" class="share">
			</div>
		<?php endif; endforeach; ?>
	<div class="watch">
		<img src="" class="img">
	</div>
	<!-- 引入jquery.min.js -->
	<script type="text/javascript" src="/static/bootstrap/js/jquery.min.js"></script>
	<!-- 引入bootstrap.min.js -->
	<script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		//全屏显示
		$(".share").click(function(){
			$(".watch").children().attr("src",$(this).attr("src"))
			$(".watch").show()
			$(".watch>img").hide()
			$(".watch>img").fadeIn()
		})
		$(".watch").click(function(){
			$(this).hide()
		})
	</script>
</body>
</html>