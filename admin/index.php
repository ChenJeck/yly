<?php
require_once '../include.php';
checkAdminLogined();
if (isset($_SESSION['adminId'])) {
	$id=$_SESSION['adminId'];
} elseif (isset($_COOKIE['adminId'])) {
	$id=$_COOKIE['adminId'];
}
$sql="select * from employee where id='{$id}'";/*提取头像*/
$row=fetchOne($sql);
//print_r($row);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>养老院后台首页</title>
	<link rel="shortcut icon" href="images/favicon.ico"/><!--加图标-->
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/backstage.css">
</head>
<body>
	<div class="head">
		<a href="../index.php" target="_blank" title="官方首页">
			<div class="logo fl"></div>
		</a>
		<h3 class="head_text fr">温医养老院后台管理系统</h3>
	</div>
	<div class="top_user clearfix">
		<div class="link fl">
			<p id="clock"></p>
		</div>
		<div class="link fr">
			<p>欢迎您&nbsp;</p>
			<a href="#">
				<div id="pic_tx" >		
		        	<img alt="我的头像" width="20" height="20" src="../admin/uploads/<?php echo $row['photo']; ?>"/>&nbsp;
		        </div>	
				<b><?php echo $row['name'];?> </b>
			</a>&nbsp;&nbsp;&nbsp;
			<a href="main.php" target="mainFrame" class="icon icon_i">
				首页
			</a><span></span>
			<a href="javascript:;" class="icon icon_j" id="goforward">
				前进
			</a><span></span>
			<a href="javascript:;" class="icon icon_t" id="goback">
				后退
			</a><span></span>
			<a href="javascript:;" class="icon icon_n" id="f5">
				刷新
			</a><span></span>
			<a href="doAdminAction.php?act=logout" class="icon icon_e">
				退出
			</a>
		</div>
	</div>
	<div class="content clearfix">
		<div class="main">
			<div class="cont">
				<!--嵌套网页开始-->
				<iframe src="main.php" frameborder="0" name="mainFrame" width="100%" height="792px"></iframe>
				<!--嵌套网页结束-->
			</div>
			<!--右侧内容结束-->
		</div>
		<!--main结束-->
		<div class="menu">
			<div class="cont">
				<div class="title">
					管理员
				</div>
				<ul class="side_menu">
					<li class="menu_item">
						<h3><span>+</span>新闻管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="addArticle.php" target="mainFrame">
									发布文章
								</a>
							</li>
							<li>
								<a href="listArticle.php" target="mainFrame">
									文章列表
								</a>
							</li>

						</ul>
					</li>
					<li class="menu_item" style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
						<h3><span>+</span>部门管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="listDepartment.php" target="mainFrame">
									部门列表
								</a>
							</li>
							<li>
								<a href="addDepartment.php" target="mainFrame">
									添加部门
								</a>
							</li>
							<li>
								<a href="detialDep.php" target="mainFrame">
									部门详情
								</a>
							</li>
						</ul>
					</li>
					<li class="menu_item">
						<h3><span>+</span>人事管理</h3>
						<ul class="menu_item_child none">
							<li style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
								<a href="listEmployee.php" target="mainFrame" >
									员工列表
								</a>
							</li>
							<li>
								<a href="detialEmployee.php" target="mainFrame">
									员工信息
								</a>
							</li>
							<li style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
								<a href="addEmployee.php" target="mainFrame">
									添加员工
								</a>
							</li>
							<li>
								<a href="addLeave.php" target="mainFrame">
									我要请假
								</a>
							</li>
							<li class="mene_item1" style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
								<a href="listLeave.php" target="mainFrame">
									<span>+</span>请假管理
								</a>
								<ul class="menu_item_grandchild none">
									<li><a href="listLeave.php?status=0" target="mainFrame">未审核</a></li>
									<li><a href="listLeave.php?status=1" target="mainFrame">已审核</a></li>
								</ul>
							</li>
							<li>
								<a href="myLeave.php" target="mainFrame">
									我的请假记录
								</a>
							</li>
						</ul>
					</li>
					<li class="menu_item">
						<h3><span>+</span>老人管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="listUsers.php" target="mainFrame">
									老人列表
								</a>
							</li>	
							<li>
								<a href="addUsers.php" target="mainFrame">
									添加新用户
								</a>
							</li>					
						</ul>
					</li>
					<li class="menu_item" style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
						<h3><span>+</span>费用管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="listPayment.php" target="mainFrame">
									入住老人缴费信息
								</a>
							</li>
							<li>
								<a href="listCost.php" target="mainFrame">
									养老院护理明细
								</a>
							</li>
						</ul>
					</li>
					<li class="menu_item">
						<h3><span>+</span>接待管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="main.php" target="mainFrame">
									来客登记
								</a>
							</li>
							<li>
								<a href="main.php" target="mainFrame">
									接待登记信息
								</a>
							</li>
						</ul>
					</li>
					<li class="menu_item">
						<h3><span>+</span>床位管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="addBed.php" target="mainFrame">
									添加床位
								</a>
							</li>
							<li>
								<a href="listBed.php" target="mainFrame">
									床位具体情况
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!--cont结束-->
		</div>
		<!--menu结束-->
	</div>
	<!--content结束-->
	<div class="footer">
		<div class="footer_text">
			<a class="github fl" href="https://github.com/ChenJeck?tab=repositories" target="_blank" title="我的个人GitHUb">我的GitHub</a>
			<span class="copyright fl">缴费网站 <i>czk</i></span>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>

</html>