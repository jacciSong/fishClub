<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="renderer" content="webkit">
		<title>FishClub</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link href="/fishClub/Public/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
		<link href="/fishClub/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
		<link href="/fishClub/Public/css/animate.css" rel="stylesheet">
		<link href="/fishClub/Public/css/style.css?v=4.1.0" rel="stylesheet">
		<link rel="stylesheet" href="/fishClub/Public/vendor/layui/css/layui.css">
		<style>
			.gray-bg{
				background-color: white;
			}
			.redFont {
				color: rgb(192, 40, 28);
				font-size: 16px;
				font-weight: bold;
			}
			
			#pageCon1 {
				font-size: 16px;
				padding: 0 20px;
				margin-top: 50px;
			}
			.con{
				display: flex;
				flex-direction: column;
				/*align-items: center;*/
				height: 50px;
				justify-content: space-between;
			}
		</style>
	</head>

	<body class="gray-bg" id="parent">
		<div id="wrapper wrapper-content animated fadeInRight" style="overflow-y: scroll;">
			<div id="pageCon1">
				<div class="con">
					<div>
						<span> Welcome to our shop. if you have any questions, You can email</span>
						<span class="redFont" style="margin-left: 2px; margin-left: 2px;"><?php echo ($data["email"]); ?></span>
						<span>, and</span>
					</div>
					<span>we will respond as soon as possible. Thank you!</span>
				</div>
			</div>
		</div>
		<!-- 全局js -->
		<script src="/fishClub/Public/js/jquery.min.js?v=2.1.4"></script>
		<script src="/fishClub/Public/js/bootstrap.min.js?v=3.3.6"></script>
		<script src="/fishClub/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
		<script src="/fishClub/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="/fishClub/Public/js/plugins/layer/layer.min.js"></script>
		<!-- 自定义js -->
		<script type="text/javascript" src="/fishClub/Public/js/hAdmin.js?v=4.1.0"></script>
		<!--<script type="text/javascript" src="/fishClub/Public/js/index.js"></script>-->
		<script type="text/javascript" src="/fishClub/Public/vendor/layui/layui.js"></script>
		<script type="text/javascript">
			layui.use(['form', 'layedit', 'laydate'], function() {
				var form = layui.form,
					layer = layui.layer,
					layedit = layui.layedit,
					laydate = layui.laydate;
				form.on('submit(Continue)', function(data) {});
			});
		</script>
	</body>

</html>