<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"D:\phpStudy\WWW\WeChatFriendsCircle\FriendsCircle\public/../application/mobile\view\user\main.html";i:1525143769;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>main</title>
	<link rel="stylesheet" type="text/css" href="/static/mobile/css/main.css">
</head>
<body>
	<span class="language">语言</span>
	<button class="btn login">登录</button>
	<button class="btn register">注册</button>
	<script type="text/javascript" src="/static/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript">
		$('.login').click(function(){
			window.location.href = "<?php echo url('mobile/user/login'); ?>"
		})
		$('.register').click(function(){
			window.location.href = "<?php echo url('mobile/user/register'); ?>"
		})
	</script>
</body>
</html>