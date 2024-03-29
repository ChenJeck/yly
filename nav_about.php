<?php
require_once 'include.php';
if (isset($_SESSION['userId'])) {
	$id=$_SESSION['userId'];
} elseif (isset($_COOKIE['userId'])) {
	$id=$_COOKIE['userId'];
}
if($id){
	$userInfo=getUserById($id);	
}
$a_id=$_REQUEST['id'];
//设置对应的title
$sql="select * from art_category where id={$a_id}";
$title=fetchOne($sql);
//以下是生活照料、医疗护理、等五个子导航
$sql="select * from article where category_id=6";
$shzl=fetchOne($sql);
$sql="select * from article where category_id=7";
$ylhl=fetchOne($sql);
$sql="select * from article where category_id=8";
$ylhd=fetchOne($sql);
$sql="select * from article where category_id=9";
$jkgl=fetchOne($sql);
$sql="select * from article where category_id=10";
$yyss=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title> <?php echo $title['category']; ?> </title>
<link rel="shortcut icon" href="images/favicon.ico"/><!--加图标-->
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen and (min-width:481px)"/>
<link rel="stylesheet" type="text/css" href="css/main480.css" media="screen and (max-width:480px)"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="plugins/myFocus/myfocus-2.0.4.min.js" type="text/javascript" charset="utf-8"></script><!--引入myFocus库-->
<script type="text/javascript">
myFocus.set({
	id:'boxID',//焦点图盒子ID
	pattern:'mF_kdui',//风格应用的名称
	time:3,//切换时间间隔(秒)
	trigger:'click',//触发切换模式:'click'(点击)/'mouseover'(悬停)
	width:1000,//设置图片区域宽度(像素)
	height:340,//设置图片区域高度(像素)
	txtHeight:'default',//文字层高度设置(像素),'default'为默认高度，0为隐藏

});
$(document).ready(function(){
		//在移动端添加菜单Menu
		$(".logo").prepend('<button id="menutoggle">Menu</button>');
		//上方图片点击回主页
		$(".logo_left img").click(function(){
			location.href="index.php";
		})
		//显示侧面菜单
		$("#menutoggle").click(function(){
			var nav_mid=$("#nav_mid");
			if(nav_mid.css("opacity")==1){
				nav_mid.addClass("fadeInLeft");
				nav_mid.removeClass("fadeOutLeft");
				$(".masklayer").css("display","none");
				$("body").css("overflow","auto");
			}else{
				nav_mid.addClass("fadeOutLeft");
				nav_mid.removeClass("fadeInLeft");
				$(".masklayer").css("display","block");//弹出遮罩层
				$("body").css("overflow","hidden");//禁止遮罩层下面滚动
				$(".masklayer").click(function(){
					nav_mid.addClass("fadeInLeft");
					nav_mid.removeClass("fadeOutLeft");
					$(".masklayer").css("display","none");
					$("body").css("overflow","auto");
				});
			}
		});
		//个人中心
		$(".user_mobile").click(function(){
			var top_menu=$("#top");
			if(top_menu.css("opacity")==1){
				top_menu.addClass("fadeInRight");
				top_menu.removeClass("fadeOutRight");
				$(".masklayer").css("display","none");
				$("body").css("overflow","auto");
			}else{
				top_menu.addClass("fadeOutRight");
				top_menu.removeClass("fadeInRight");
				$(".masklayer").css("display","block");//弹出遮罩层
				$("body").css("overflow","hidden");//禁止遮罩层下面滚动
				$(".masklayer").click(function(){
					top_menu.addClass("fadeInRight");
					top_menu.removeClass("fadeOutRight");
					$(".masklayer").css("display","none");
					$("body").css("overflow","auto");
				});
			}
		});
	});
</script>
</head>
<body>
	<div class="top" id="top">
		<div class="top_content">
			<div class="top_content_l">
				<a href="admin/index.php" target="_blank" class="backstage">进入后台管理系统</a>
			</div>
			<?php if($userInfo['id']):?>
			<ul class="top_content_user">
				<li>
					<span>欢迎您</span>
				</li>	
				<li class="top_content_nav">
					<div id="pic_tx">
						<img alt="我的头像" width="20" height="20" src="upload/<?php echo $userInfo['u_photo']?$userInfo['u_photo']:'/sys/login_no.png'; ?>" />
					</div>
					<a class="user" href="javascript:;"><?php echo $userInfo['u_name']?$userInfo['u_name']:$userInfo['u_username'];?><i class="user_ico"></i></a>
						<div class="userCard">
							<a href="personal_info.php">个人中心</a>
							<a href="doUserAction.php?act=userOut">退出</a>
						</div>
				</li>
			</ul>
			<?php else:?>
			<ul class="top_content_r">
				<li><a href="login.html">请登录</a></li>
				<li><a class="top_zc" href="reg.html">注册</a></li>
			</ul>
			<?php endif;?>
		</div>
	</div>	
	<!--页面顶部top结束-->
	<div class="wrap_logo">
	<div class="logo">
			<div class="logo_left"><a href="#"><img src="images/logo.gif"/></a> </div>
			<div class="logo_right"><img src="images/tel.jpg" width="28" height="28" />24小时服务热线：<span class="tel">19905077865</span></div>
			<div class="user_mobile"><img src="images/user_green.png"/></div>
	</div>
	</div>
	<!--logo结束-->
	<div class="nav">
		<div class="nav_mid" id="nav_mid">
				<ul>
					<li><a href="index.php">首页</a></li>
					<li><a href="nav_about.php?id=3">关于养老院</a></li>
					<li><a href="nav_about.php?id=4">服务特色</a></li>
					<li><a href="nav_about.php?id=2">保健常识</a></li>
					<li><a href="nav_about.php?id=12">环境设施</a></li>
					<li><a href="nav_about.php?id=13">收费标准</a></li>
					<li><a href="nav_about.php?id=5">人才招聘</a></li>
					<li><a href="personal_info.php">个人中心</a></li>
				</ul>
		</div>
		<!--nav_mid结束-->
	</div>
	  <!--nav结束-->
	 <div class="wrap">
	<div class="ad">
		<div id="boxID"> <!--焦点图盒子-->
			<div class="loading"></div><!--载入画面-->
			<div class="pic">
				<ul>
					<li><a href="#"><img src="images/pic4.jpg" alt="美丽风貌" text="美丽的山庄景色，适合养生"/></a></li>
					<li><a href="#"><img src="images/pic3.jpg" alt="养生食物" text="空心泡，草莓，车厘子"/></a></li>
					<li><a href="#"><img src="images/pic2.jpg" alt="来一杯" text="不如坐下喝一杯"/></a></li>
					<li><a href="#"><img src="images/pic1.png" alt="空闲生活" text="去海边看看"/></a></li>
				</ul>
			</div>
		</div>
	</div>  
	<!--ad结束-->
	<div class="hengxian"><img src="images/diying.jpg" width="100%" height="20px"></div><!--中间小横线-->
	<div class="pages">
		<ul>
			<li class="pages01">
				<a href="article.php?id=<?php echo $shzl['id']; ?>" title="生活照料"><img src="images/page01.jpg" alt="生活照料"></a>
			</li>
			<li class="pages02">
				<a href="article.php?id=<?php echo $ylhl['id']; ?>" title="医疗护理"><img src="images/page02.jpg" alt="医疗护理"></a>
			</li>
			<li class="pages03">
				<a href="article.php?id=<?php echo $ylhd['id']; ?>" title="娱乐活动"><img src="images/page03.jpg" alt="娱乐活动"></a>
			</li>
			<li class="pages04">
				<a href="article.php?id=<?php echo $jkgl['id']; ?>" title="健康管理"><img src="images/page04.jpg" alt="健康管理"></a>
			</li>
			<li class="pages05">
				<a href="article.php?id=<?php echo $yyss['id']; ?>" title="营养膳食"><img src="images/page05.jpg" alt="营养膳食"></a>
			</li>
		</ul>
	</div>
	<!--pages结束-->
	<div class="content">
		<div class="content_l">
			<div class="content_l_list">
				<ul>
					<li><a id="about" href="javascript:;">养老院介绍<span>About Us</span></a></li>
					<li><a id="services" href="javascript:;">服务特色<span>Services</span></a></li>
					<li><a id="knowledge" href="javascript:;">保健常识<span>Knowledge</span></a></li>
					<li><a id="professional" href="javascript:;">专业护理<span>Professional Care</span></a></li>
					<li><a id="environment" href="javascript:;">环境设施<span>Environment</span></a></li>
					<li><a id="charges" href="javascript:;">收费标准<span>Charges</span></a></li>
					<li><a id="contact" href="javascript:;">联系我们<span>Contact Us</span></a></li>
				</ul>
			</div>
		</div>
		<div class="content_right" name="content_right">
			<div class="load_img">
				<img src="images/loading2.gif"/>
			</div>
		</div><!--content_right结束-->
		<iframe class="content_right2" src="c_environment.php" frameborder="0" width="" height=""></iframe>
	</div><!--content结束-->
	</div><!--wrap结束-->
	<a id="to_top" href="javascript:;" title="回到顶部"></a>
	<div class="footer">
		<div class="footer_text">
			<a class="github fl" href="https://github.com/ChenJeck?tab=repositories" target="_blank" title="我的个人GitHUb">我的GitHub</a>
			<span class="copyright fl">缴费网站 <i>czk</i></span>
		</div>
	</div>
	<div class="masklayer">  </div><!--遮罩层-->
</body>
<script type="text/javascript" src="js/content.js"></script>
<script type="text/javascript">
	<?php if($a_id==3): ?>//关于养老院
	$(".content_right").load("c_about.php?id=3");
	<?php elseif($a_id==4): ?>//服务特色
	$(".content_right").load("c_about.php?id=4");
	<?php elseif($a_id==13): ?>//收费标准
	$(".content_right").load("c_charges.php");
	<?php elseif($a_id==5): ?>//人才招聘
	$(".content_right").load("c_about.php?id=5");
	<?php elseif($a_id==2): ?>//保健常识
	$(".content_right").load("c_knowledge.php?id=2");
	<?php elseif($a_id==12): ?>//环境设施
	$(".content_right").css("display","none");
	$(".content_right2").css("display","block");
	<?php endif; ?>
	
</script>
</html>
