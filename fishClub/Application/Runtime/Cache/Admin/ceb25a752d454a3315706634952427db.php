<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="renderer" content="webkit">

		<title>Fish Club Management System</title>

		<link rel="shortcut icon" href="favicon.ico">
		<link href="/fishClub/Public/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
		<link href="/fishClub/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
		<link href="/fishClub/Public/css/animate.css" rel="stylesheet">
		<link href="/fishClub/Public/css/style.css?v=4.1.0" rel="stylesheet">
		<link rel="stylesheet" href="/fishClub/Public/vendor/layui/css/layui.css">
		<style>
			.mgT-5 {
				margin-top: 5px;
			}
		</style>
	</head>

	<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
		<div id="wrapper">
			<!--左侧导航开始-->
			<nav class="navbar-default navbar-static-side" role="navigation">
				<div class="nav-close"><i class="fa fa-times-circle"></i>
				</div>
				<div class="sidebar-collapse">
					<ul class="nav" id="side-menu">
						<li class="nav-header">
							<div class="dropdown profile-element">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <strong class="font-bold">Fish Club</strong>
                                    </span>
									</span>
								</a>
							</div>
							<div class="logo-element">FCMS
							</div>
						</li>
						<ul class="nav">
							<li>
								<a class="J_menuItem" href="../Account/account.html"><i class="fa fa-users"></i>User account</a>
							</li>
						</ul>
						<ul class="nav">
							<li>
								<a class="J_menuItem" href="../WareManage/index.html"><i class="fa fa-users"></i>Commodity</a>
							</li>
						</ul>
						<ul class="nav">
							<li>
								<a class="J_menuItem" href="../OrderInformation/orderInformationIndex.html"><i class="fa fa-users"></i>Order Information</a>
							</li>
						</ul>
						<ul class="nav">
							<li>
								<a class="J_menuItem" href="../ContactInformation/contact.html"><i class="fa fa-users"></i>Contact information </a>
							</li>
						</ul>
						<ul class="nav">
							<li>
								<a class="J_menuItem" href="../DiscountManage/index.html"><i class="fa fa-caret-square-o-up"></i>Discount</a>
							</li>
						</ul>
						<!--<li class="active">
								<a href="#">
									<i class="fa fa-users"></i>
									<span class="nav-label">员工管理</span>
									<span class="fa arrow"></span>
								</a>
								<ul class="nav nav-second-level">
										<li>
											<a class="J_menuItem" href="./index.html">账号管理</a>
										</li>
										<li>
											<a class="J_menuItem" href="./index.html">账号管理1</a>
										</li>
								</ul>
							</li>-->

					</ul>
				</div>
			</nav>
			<!--左侧导航结束-->
			<!--右侧部分开始-->
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="row border-bottom">
					<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
						<!--<div class="navbar-header">
							<a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
						</div>-->
						<ul class="nav navbar-top-links navbar-right">
							<li id="s_showdrop" class="dropdown">
								<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
									<i class="fa fa-user"></i><span class="label label-warning"></span>
									<!--<div class="mgT-5"><?php echo ($identity); ?></div>-->
								</a>
								<ul class="dropdown-menu dropdown-messages">
									<li>
										<div class="text-center link-block">
											<a id="s_changepwd" class="J_menuItem_" href="##">
												<!--/fishClub/index.php/Admin/AccountManage/personal_pwd-->
												<i class="fa fa-pencil-square-o"></i> <strong>Change password</strong>
											</a>
										</div>
									</li>
									<li class="divider"></li>
									<li>
										<div class="text-center link-block">
											<a class="J_menuItem" href="<?php echo U('Login/logout');?>">
												<i class="fa fa-power-off"></i> <strong>Log out</strong>
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
				<div class="row J_mainContent" id="content-main">
					<iframe id="J_iframe" width="100%" height="100%" src="/fishClub/index.php/Admin/Main/welcome" frameborder="0" data-id="index_v1.html" seamless></iframe>
				</div>
			</div>
			<!--右侧部分结束-->
		</div>

		<!-- 全局js -->
		<script src="/fishClub/Public/js/jquery.min.js?v=2.1.4"></script>
		<script src="/fishClub/Public/js/bootstrap.min.js?v=3.3.6"></script>
		<script src="/fishClub/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
		<script src="/fishClub/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="/fishClub/Public/js/plugins/layer/layer.min.js"></script>

		<!-- 自定义js -->
		<script type="text/javascript" src="/fishClub/Public/js/hAdmin.js?v=4.1.0"></script>
		<script type="text/javascript" src="/fishClub/Public/js/index.js"></script>
		<script type="text/javascript" src="/fishClub/Public/vendor/layui/layui.js"></script>
		<script type="text/javascript">
			var gLayer = undefined;
			layui.use('layer', function() {
				gLayer = layui.layer;
			});
			$("#s_changepwd").on('click', function(e) {
				gLayer.prompt({
					title: 'Please enter a new password',
					formType: 1,
					btn: ['Yes', 'Cancle']
				}, function(pass, index) {
					gLayer.close(index);
					gLayer.prompt({
						title: 'Please enter again to confirm',
						formType: 1
					}, function(text, index) {
						gLayer.close(index);
						if(pass == text) {
							callAPI("<?php echo U('Login/changePassword');?>", function(res) {
								if(res.state) {
									gLayer.msg(res.info);
								} else {
									gLayer.msg(res.info, {
										icon: 5
									});
								}
							}, {
								password: pass
							})
						} else {
							$("#s_changepwd").click();
							gLayer.msg('Inconsistent passwords');
						}
					});
				});
				e.stopPropagation()
			})
		</script>
		<script>
			function callAPI(url, success, data, type, fail) {
				url = url || "";
				success = success || function() {};
				data = data || {};
				type = type || "POST";
				fail = fail || function() {};
				$.ajax({
					type: type,
					url: url,
					async: true,
					data: data,
					dataType: 'json',
					beforeSend: function() {
						layer.load(2);
					},
					success: function(data) {
						success(data);
						layer.closeAll('loading');
					},
					error: function(err) {
						fail(err);
						layer.closeAll('loading');
					}
				})
			}
		</script>
	</body>

</html>