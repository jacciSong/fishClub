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
			.mgL-185 {
				margin-left: 185px;
			}
			
			#pageCon {
				display: flex;
				flex-direction: row;
				justify-content: center;
				align-items: center;
				width: 100%;
			}
			
			#loginCon {
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			
			#fontCon {
				color: #FFFFFF;
				font-size: 12px;
			}
			
			.inputStyle {
				border: none;
				outline: none;
				background-color: rgb(37, 65, 109);
				width: 250px;
				color: #FFFFFF;
			}
			
			.xiaCon {
				display: flex;
				flex-direction: row;
			}
			
			.weifont {
				color: #FFFFFF;
				font-weight: bolder;
			}
			
			.mgL-10 {
				margin-left: 10px;
			}
			
			.pd-30 {
				padding: 30px 0;
			}
			
			.redFont {
				color: rgb(192, 40, 28);
				font-size: 28px;
				font-weight: bold;
			}
			
			.mgT-20 {
				margin-top: 20px;
			}
			
			#loginCon input:focus {
				border-style: solid;
				border-color: rgb(119, 161, 243);
				box-shadow: 0 0 15px #03a9f4;
			}
			
			.logInput {
				width: 300px;
				height: 40px;
				padding: 0 10px;
			}
			
			.blueFont {
				color: rgb(61, 87, 138);
			}
			
			.btncol {
				background-color: rgb(42, 74, 124);
			}
		</style>
	</head>

	<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
		<div id="wrapper pageCon">
			<div id="loginCon">
				<span class="pd-30 redFont"> RESET YOUR PASSWORD </span>
				<span class=""> We will send you an email to reset your password. </span>
				<input placeholder="Email" class="mgT-20 logInput" id="email" />
				<button class="mgT-20 layui-btn btncol">Submit</button>
				<a class="mgT-20 blueFont" href="../Login/login.html" target="_Self"> or Cancle</a>
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
		</script>
	</body>

</html>