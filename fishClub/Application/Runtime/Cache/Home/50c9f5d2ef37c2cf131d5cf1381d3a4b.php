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
			html {
				font-size: 100px;
			}
			
			.mgL-185 {
				margin-left: 1.85rem;
			}
			
			#pageCon {
				display: flex;
				flex-direction: row;
				justify-content: center;
				align-items: center;
				width: 100%;
			}
			/*#headCon {
				display: flex;
				background-color: rgb(42, 74, 124);
				width: 100%;
				height: 240px;
				padding: 0 240px;
			}*/
			
			#toolbarCon {
				background-color: #000000;
				width: 100%;
				height: 0.3rem;
			}
			
			.commodityCon {
				background-color: rgb(255, 255, 255);
				width: 100%;
				height: 5rem;
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			
			#loginCon {
				width: 40%;
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			
			#misCon {
				width: 40%;
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			
			.avgCon {
				display: flex;
				flex-direction: column;
				/*align-items: center;*/
				justify-content: center;
				/*background-color: #000000;*/
				width: 50%;
			}
			
			.rightCo {
				display: flex;
				flex-direction: column;
				/*justify-content: center;*/
				align-items: flex-end;
				width: 100%;
			}
			
			#searchCon {
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: center;
				height: 0.4rem;
				width: 1.2rem;
				/*margin-top: 20px;*/
				background-color: rgb(37, 65, 109);
				padding: 0 0.1rem;
				color: white;
				cursor: default;
			}
			
			#fontCon {
				color: #FFFFFF;
				font-size: 0.12rem;
			}
			
			.inputStyle {
				border: none;
				outline: none;
				background-color: rgb(37, 65, 109);
				width: 2.5rem;
				color: #FFFFFF;
			}
			
			.xiaCon {
				display: flex;
				flex-direction: row;
				margin-top: 0.2rem;
			}
			
			.weifont {
				color: #FFFFFF;
				font-weight: bolder;
			}
			
			.shoppingCar {
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: center;
				height: 0.4rem;
				width: 1rem;
				/*margin-top: 20px;*/
				background-color: rgb(37, 65, 109);
				padding: 0 0.04rem;
				color: #FFFFFF;
				position: relative;
				cursor: default;
			}
			
			.mgL-10 {
				margin-left: 0.1rem;
			}
			
			#Tinput::-webkit-input-placeholder {
				/* WebKit browsers */
				color: #FFFFFF;
				font-size: 0.16rem;
			}
			
			#Tinput::-moz-placeholder {
				color: #FFFFFF;
				font-size: 0.16rem;
			}
			
			#Tinput:-ms-input-placeholder {
				color: #FFFFFF;
				font-size: 0.16rem;
			}
			
			.pd-30 {
				padding: 0.3rem 0;
			}
			
			.redFont {
				color: rgb(192, 40, 28);
				font-size: 0.28rem;
				font-weight: bold;
			}
			
			.mgT-20 {
				margin-top: 0.2rem;
			}
			
			#loginCon input:focus {
				border-style: solid;
				border-color: rgb(119, 161, 243);
				box-shadow: 0 0 15px #03a9f4;
			}
			
			.logInput {
				width: 3rem;
				height: 0.4rem;
				padding: 0 0.1rem;
			}
			
			.blueFont {
				color: rgb(61, 87, 138);
			}
			
			.btncol {
				background-color: rgb(42, 74, 124);
			}
			
			#number {
				position: absolute;
				width: 0.2rem;
				height: 0.2rem;
				border-radius: 0.2rem;
				border: none;
				text-align: center;
				background-color: rgb(252, 234, 79);
				top: 1.1rem;
				right: 2.32rem;
				color: rgb(42, 74, 124);
			}
			
			.dhF {
				font-size: 0.14rem;
				height: 0.4rem;
			}
			
			.dhF1 {
				font-size: 0.14rem;
				color: rgb(122, 181, 213);
			}
			
			.dh {
				padding-top: 0.1rem;
				padding-left: 0.15rem;
			}
			
			.jt {
				margin-left: 0.04rem;
				margin-right: 0.04rem;
			}
			
			.pb {
				padding-bottom: 0.2rem;
			}
			
			.tip {
				/*margin-top: 6px;*/
				padding: 0.1rem 0.1rem;
				/*background-color: white;*/
			}
			
			#commodityCon1 {
				background-color: white;
			}
			
			.gray-bg {
				background-color: white;
			}
		</style>
	</head>

	<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
		<div id="wrapper pageCon">
			<div id="headCon"></div>
			<div id="toolbarCon"></div>

			<div id="commodityCon1">
				<div class="dh">
					<a class="dhF1" href="../Main/index.html" target="_Self">store</a>
					<span class="jt"> > </span>
					<a class="dhF" href="../Login/login.html" target="_Self">login</a>
				</div>
				<form class="layui-form commodityCon" action="" id="loginForm">
					<div id="loginCon">
						<span class="pd-30 redFont"> LOGIN </span>
						<input placeholder="Email" class="logInput" id="email" name="Email" />
						<input placeholder="Password" class="mgT-20 logInput" type="password" id="password" name="Password" />
						<a class="mgT-20 blueFont" onclick="toContact()"> Forgot your password?</a>
						<button class="mgT-20 layui-btn btncol" lay-filter="SignIN" lay-submit="">Sign In</button>
						<a class="mgT-20 blueFont" href="../Main/index.html" target="_Self"> or Return to Store</a>
					</div>
				</form>
				<form class="layui-form commodityCon" action="" id="misForm" style="display: none;">
					<div id="misCon">
						<span class="pd-30 redFont"> RESET YOUR PASSWORD </span>
						<span class=""> We will send you an email to reset your password. </span>
						<input placeholder="Email" class="mgT-20 logInput" id="email" />
						<button class="mgT-20 layui-btn btncol">Submit</button>
						<a class="mgT-20 blueFont" onclick="showlogin()"> or Cancle</a>
					</div>
				</form>

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
		<script src="/fishClub/Public/vendor/Head.js"></script>
		<script src="/fishClub/Public/vendor/Utils.js"></script>
		<script type="text/javascript">
			var headCon;
			init();

			function init() {
				document.documentElement.style.fontSize = "100px";
				window.addEventListener('resize', Utils.reszieFontHandler);
				headCon = document.getElementById("headCon");
				var headContent = new Head(false, "", headCon, 0);
			}

			function showmis() {
				$('#misForm').show();
				$('#loginForm').hide();

			}

			function showlogin() {
				$('#misForm').hide();
				$('#loginForm').show();
			}

			layui.use(['form', 'layedit', 'laydate'], function() {
				var form = layui.form,
					layer = layui.layer,
					layedit = layui.layedit,
					laydate = layui.laydate;
				//自定义验证规则
				form.verify({
					title: function(value) {
						if(value == '' || value == null) {
							return 'Please enter information';
						}
					},
				});
				form.on('submit(SignIN)', function(data) {
					var formData = $('#loginForm').serializeArray();
					var postData = {};
					var flag = true;
					var name = '';
					$(formData).each(function() {
						postData[this.name] = this.value;
						if(postData[this.name] == '' || postData[this.name] == null) {
							flag = false;
							name = this.name;
							return false;
						}
					}); // * 发起请求
					if(!flag) {
						layer.alert(name + " can not be empty", {
							icon: 5,
							btn: ['OK'],
							title: 'INFORMATION'
						});

					} else {
						$.ajax({
							data: postData,
							type: "POST",
							dataType: "JSON",
							url: '/fishClub/index.php/Home/Login/loginCheck',
							success: function(data) {
								if(data.state == true) {
									window.location.href = "../Main/index.html";
								} else {
									layer.alert(data.info, {
										icon: 5,
										btn: ['OK'],
										title: 'INFORMATION'
									});
								}
							}
						}); // end ajax
					}
					return false;
				});
			});

			function toContact() {
				layer.open({
					type: 2,
					title: 'Contact us',
					maxmin: true,
					shadeClose: true, //点击遮罩关闭层
					area: ['50%', '28%'],
					content: '../Main/contactUs',
					end: function() {}
				});
			}
		</script>
	</body>

</html>