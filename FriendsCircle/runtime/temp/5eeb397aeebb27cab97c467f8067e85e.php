<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"D:\phpStudy\WWW\WeChatFriendsCircle\FriendsCircle\public/../application/mobile\view\user\login.html";i:1525143762;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/static/mobile/css/login.css">
	<!-- 引入IconFont 图标生成的symbol代码 -->
	<script src="/static/mobile/Iconfont/iconfont.js"></script>
	<title>微信登录</title>
</head>
<body>
	<div class="header">
		<svg class="icon last" aria-hidden="true">
		  	<use xlink:href="#icon-xitongfanhui"></use>
		</svg>
		<div class="header_line"></div>
		<div class="title">登录微信</div>
		<div sytle="clear:both;"></div>
	</div>
	<div class="head_box">
		<img src="">
		<div class="camera">
			<svg class="icon" aria-hidden="true">
			  	<use xlink:href="#icon-xiangji"></use>
			</svg>
			<div class="triangle_1"></div>
			<div class="triangle_2"></div>
		</div>
	</div>
	<form action="<?php echo url('mobile/user/login_deal'); ?>" method="post">
		<input type="text" name="username" class="inp" placeholder="QQ号/微信号/Email">
		<input type="password" name="password" class="inp" placeholder="密码">
		<button class="login">登录</button>
	</form>
	<a href="<?php echo url('mobile/user/register'); ?>" class="question">登录遇到问题？</a>
	<!-- 引入jquery.min.js -->
	<script type="text/javascript" src="/static/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript">
		$('input[name=username]').blur(function(){
			var name = $(this).val()
			$.get("<?php echo url('mobile/user/get_head'); ?>",{username:name},function(data){
				if(data){
					$(".head_box>img").attr('src','/static/mobile/images/head/'+data)
					$(".camera").hide()
					$(".head_box>img").show()
				}else{
					$(".head_box>img").hide()
					$(".camera").show()
					$(".head_box>img").attr('src','')
				}
			})
		})
		$('.last').click(function(){
			window.location.href = "<?php echo url('mobile/user/main'); ?>"
		})
	</script>
</body>
</html>