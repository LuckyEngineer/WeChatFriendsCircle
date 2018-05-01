<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"D:\phpStudy\WWW\WeChatFriendsCircle\FriendsCircle\public/../application/mobile\view\pyq\index.html";i:1525144039;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- 网页制作者信息 -->
	<meta name="author" content="1101546926@qq.com">
	<!-- 网站简介 -->
	<meta name="description" content="Imitate WeChat friend circle.">
	<!-- 搜索关键字 -->
	<meta name="keywords" content="wechat,friends,circle">
	<!-- 自动适应屏幕宽度 -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- 引入font-awesome.min.css -->
	<link rel="stylesheet" type="text/css" href="/static/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- 引入bootstrap.min.css -->
	<link rel="stylesheet" type="text/css" href="/static/bootstrap/css/bootstrap.min.css">
	<!-- 引入自定义css -->
	<link rel="stylesheet" type="text/css" href="/static/mobile/css/index.css">
	<!-- 引入IconFont 图标生成的symbol代码 -->
	<script src="/static/mobile/Iconfont/iconfont.js"></script>
	<title>朋友圈</title>
</head>
<body>
	<div class="header">
		<svg class="icon last" aria-hidden="true">
		  	<use xlink:href="#icon-xitongfanhui"></use>
		</svg>
		<div class="header_line"></div>
		<div class="title">朋友圈</div>
		<svg class="icon camera" aria-hidden="true">
		  	<use xlink:href="#icon-xiangji" data-toggle="modal" data-target="#myModal"></use>
		</svg>
		<div sytle="clear:both;"></div>
	</div>
	<div class="model">
		<img src="/static/mobile/images/cover.jpg" data-toggle="modal" data-target="#myModal_1">
		<span class="user_name"><?php echo $username; ?></span>
		<a href="<?php echo url('mobile/album/index'); ?>">
			<div class="picture">
				<img src="/static/mobile/images/head/<?php echo $head; ?>" class="user_head">
			</div>
		</a>
	</div>
	<div class="container">
		<ul class="content_list">
			<?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): foreach($data as $info): ?> 
				    <li>
							<p class="id" style="display: none;"><?php echo $info['id']; ?></p>
							<div class="friend_picture">
								<img src="/static/mobile/images/head/<?php echo $info['head']; ?>">
							</div>
							<div class="content">
								<div class="mine">
									<p class="friend_name"><?php echo $info['username']; ?></p>
									<p class="say"><?php echo $info['content']; ?></p>
									<div class="photo_box">
										<?php if(count($info['imgs']) == 1): ?> 
											<img src="/static/upload/<?php echo $info['imgs'][0]; ?>" class="img_size_3">
										<?php elseif(count($info['imgs']) > 1): $__FOR_START_15709__=0;$__FOR_END_15709__=count($info['imgs']);for($i=$__FOR_START_15709__;$i < $__FOR_END_15709__;$i+=1){ ?>
												<img src="/static/upload/<?php echo $info['imgs'][$i]; ?>" class="img_size_1">
											<?php } endif; ?>
										<div sytle="clear:both;"></div>
									</div>
									<div sytle="clear:both;"></div>
									<div class="detials">
										<span class="time">
											<?php echo $info['time_difference']; ?>
										</span>
										<span class="delete">
											<?php if($info['username'] == $username): ?>
												删除
											<?php endif; ?>
										</span>
										<div class="menu">
											<div class="like">
												<svg class="icon" aria-hidden="true">
												  	<use xlink:href="#icon-heartline"></use>
												</svg>
												<?php if(!(empty($info['likes']) || (($info['likes'] instanceof \think\Collection || $info['likes'] instanceof \think\Paginator ) && $info['likes']->isEmpty()))): foreach($info['likes'] as $value): if($value['username'] == $username): $flag = '1'; endif; endforeach; endif; if(isset($flag)): ?>
													<span>取消</span>
												<?php else: ?>
													<span>赞</span>
												<?php endif; ?>
											</div>
											<div class="write">
												<svg class="icon" aria-hidden="true">
												  	<use xlink:href="#icon-comment"></use>
												</svg>
												<span>评论</span>
											</div>
										</div>
										<svg class="icon comment" aria-hidden="true">
										  	<use xlink:href="#icon-pinglun"></use>
										</svg>
									</div>
									<?php if(!empty($info['likes']) OR !empty($info['comments'])): ?> 
										<div class="triangle"></div>
									<?php endif; ?>	
									<div class="clear:both;"></div>
								</div>
								<div class="dialog">
									<div class="dialog_box">
										<p class="like_person">
											<?php if(!(empty($info['likes']) || (($info['likes'] instanceof \think\Collection || $info['likes'] instanceof \think\Paginator ) && $info['likes']->isEmpty()))): ?>
												<i class="fa fa-heart-o heart"></i>
												<?php foreach($info['likes'] as $value): ?> 
												    <span class="me" style="color:rgb(87,107,149);">&nbsp;<?php echo $value['username']; ?></span>
												<?php endforeach; endif; ?>
										</p>
										<?php if(isset($info['comments'])): foreach($info['comments'] as $value): ?>
												<p style="width:100%;"><span style="color:rgb(87,107,149);margin-left:7px;"><?php echo $value['username']; ?>:</span><?php echo $value['content']; ?></p>
											<?php endforeach; endif; ?>
									</div>
								</div>
							</div>
							<div class="clear:both;"></div>
						</li>
				<?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="watch">
		<img src="" class="img">
	</div>
	<div class="pinglun">
		<input type="text" class="talk" id="talk">
		<svg class="icon emoji" aria-hidden="true">
		  	<use xlink:href="#icon-xiaolian"></use>
		</svg>
		<button class="send">发送</button>
	</div>

	<!-- Modal camera-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top:250px;z-index:9998;">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content"  style="overflow: hidden;">
	        <div class="modal-header">
	            <h4 class="modal-title select">从相册中选择</h4>
	        </div>
	        <a href="<?php echo url('mobile/user/logout'); ?>">
		        <div class="modal-header">
		            <h4 class="modal-title" id="myModalLabel">退出登录</h4>
		        </div>
	        </a>
	    </div>
	  </div>
	</div>
	<!-- Model cover -->
	<div class="modal fade" id="myModal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="padding-top:250px;z-index:9999;">
	  <div class="modal-dialog" role="document" style="margin-left:30px;margin-right:30px;">
	    <div class="modal-content"  style="overflow:hidden;border-radius:3px;">
	      <div class="modal-header" style="padding-left: 20px;">
	        <h4 style="float:left;" class="modal-title" id="myModalLabel1">更换相册封面</h4>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- 引入jquery.min.js -->
	<script type="text/javascript" src="/static/bootstrap/js/jquery.min.js"></script>
	<!-- 引入bootstrap.min.js -->
	<script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var commentTarget;
		// 点赞、评论弹出框
		$(".comment").click(function(){
			var obj = $(this).parent().find(".menu")
			if(obj.is(":hidden")){
				obj.css("width","0")
				obj.show()
				obj.animate({
					"width":"160px"
				},200)
			}else{
				obj.hide()
			}
		})
		//点赞或取消赞
		$(".like").click(function(){
			var obj = $(this).parents('li')
			obj.find(".menu").hide()
			var id = obj.find(".id").html()
			var me = obj.find(".me");
			var username = $(".user_name").html()
			if($(this).find("span").html() == "赞"){
				//Ajax提交数据
				$.post("<?php echo url('mobile/pyq/like'); ?>",{flag:1,item_id:id})
				if(!(me.length>0)){
					obj.find(".like_person").prepend('<i class="fa fa-heart-o heart"></i>')
				}
				obj.find(".like_person").append('<span class="me" style="color:rgb(87,107,149);">&nbsp;'+username+'</span>')
				//显示triangle
				if(!(obj.find(".triangle").length)){
					obj.find(".mine").append('<div class="triangle"></div>')
				}
				$(this).find("span").html("取消")
			}else{
				$.post("<?php echo url('mobile/pyq/like'); ?>",{flag:0,item_id:id})
				if(me.length==1){
					obj.find(".heart").remove()
					//删除triangle
					if(obj.find(".triangle").length>0){
						obj.find(".triangle").remove()
					}
				}
				me.each(function(){
					var str = '&nbsp;'+username;
					if($(this).html()==str){
						$(this).remove()
					}
				})
				$(this).find("span").html("赞")
			}	
		})
		//评论
		$(".write").click(function(){
			commentTarget = $(this).parents("li")
			$(this).parents("li").find(".menu").hide()
			$(".pinglun").show()
			document.getElementById("talk").focus()
		})
		//发送评论
		$(".send").click(function(){
			var id = commentTarget.find(".id").html()
			var username = $(".user_name").html()
			$(".pinglun").hide()
			//显示triangle
			if(!(commentTarget.find(".triangle").length)){
				commentTarget.find(".mine").append('<div class="triangle"></div>')
			}
			if($(".talk").val()!=''){
				var say = $(".talk").val()
				var str = '<p style="width:100%;">'+'<span style="color:rgb(87,107,149);margin-left:7px;">'+username+':</span>' + $(".talk").val() +'</p>'
				//Ajax提交数据
				$.post("<?php echo url('mobile/pyq/comment'); ?>",{item_id:id,comment:say},function(data){
					console.log(data);
				})
				commentTarget.find(".dialog_box").append(str)
				$(".talk").val("")
			}
		})
		//全屏显示
		$(".photo_box img").click(function(){
			$(".watch").children().attr("src",$(this).attr("src"))
			$(".watch").show()
			$(".watch>img").hide()
			$(".watch>img").fadeIn()
		})
		$(".watch").click(function(){
			$(this).hide()
		})
		//在相册中个选择图片
		$('.select').click(function(){
			window.location.href = "<?php echo url('mobile/publish/index'); ?>";
		})
		//点击头像
		$('.friend_picture').click(function(){
			var name = $(this).parents("li").find(".friend_name").html()
			window.location.href = "<?php echo url('mobile/detail/index'); ?>?name="+name;
		})
		//删除朋友圈
		$(".delete").click(function(){
			var item_id = $(this).parents("li").find(".id").html()
			$.post("<?php echo url('mobile/pyq/remove'); ?>",{item_id:item_id},function(data){
				console.log(data);
			})
			$(this).parents("li").remove()
		})
		//点击其他地方，隐藏menu,pinglun
		$("body").click(function(e){
			var flag1 = $(e.target).is(".comment,.comment *")
			var flag2 = $(e.target).is(".menu,.menu *")
			var flag3 = $(e.target).is(".write,.write *")
			var flag4 = $(e.target).is(".pinglun,.pinglun *")
			if(!flag1 && !flag2 && !flag3 && !flag4){
				$(".menu").hide()
				$(".pinglun").hide()
			}
		})
		//回车发送消息
		$(".talk").keypress(function(e){
			if(e.keyCode==13){
				$(".send").click()
			}
		})
	</script>
</body>
</html>