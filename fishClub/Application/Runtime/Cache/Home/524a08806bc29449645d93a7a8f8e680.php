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
		<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="/fishClub/Public/img/favicon.ico">
<!--loading css-->
<link href="/fishClub/Public/vendor/loading/loading.css" rel="stylesheet" />
<link href="/fishClub/Public/css/font-awesome.min.css" rel="stylesheet">
<link href="/fishClub/Public/css/animate.css" rel="stylesheet">
<link href="/fishClub/Public/css/style.css" rel="stylesheet">
<link href="/fishClub/Public/vendor/toastr/toastr.min.css" rel="stylesheet">
<!--layui-->
<link type="text/css" href="/fishClub/Public/vendor/layui/css/layui.css" rel="stylesheet"/>

<style type="text/css">
	/* dataTables列内容居中 */
	
	.table>tbody>tr>td {
		text-align: center;
	}
	/* dataTables表头居中 */
	
	.table>thead:first-child>tr:first-child>th {
		text-align: center;
	}
	
	.ibox-title {
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 0 15px;
	}
	
	.ibox-title>h4 {
		font-weight: bold;
	}
	
	.layui-form-label {
		box-sizing: content-box;
	}
</style>
		<style>
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
			
			#toolbarCon {
				background-color: #000000;
				width: 100%;
				height: 0.3rem;
			}
			
			#commodityCon {
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
				/*margin-left: 15px;*/
				height: 0.4rem;
				width: 1rem;
				/*margin-top: 20px;*/
				background-color: rgb(37, 65, 109);
				padding: 0 0.04rem;
				color: #FFFFFF;
				position: relative;
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
			
			#registerCon {
				display: flex;
				flex-direction: column;
				align-items: center;
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
			}
			
			.weifont {
				color: #FFFFFF;
				font-weight: bolder;
			}
			
			.mgL-10 {
				margin-left: 0.1rem;
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
			
			#registerCon input:focus {
				border-style: solid;
				border-color: rgb(119, 161, 243);
				box-shadow: 0 0 0.15rem #03a9f4;
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
				color: #FFFFFF;
				width: 1.4rem;
				height: 0.4rem;
				border-radius: 0.1rem;
				border-radius: 0.08rem;
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
				padding-left:0.15rem;
			}
			
			.jt {
				margin-left: 0.04rem;
				margin-right: 0.04rem;
			}
			
			.pb {
				padding-bottom: 0.2rem;
			}
			#registerForm{
				background-color: white;
			}
			.gray-bg{
				background-color: white;
			}
		</style>
	</head>

	<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
		<div id="wrapper pageCon">
			<div id="headCon">
				
			</div>
			<div id="toolbarCon"></div>
			<form class="layui-form" action="" id="registerForm">
				<div class="dh">
					<a class="dhF1" href="../Main/index.html" target="_Self">store</a>
					<span class="jt"> > </span>
					<a class="dhF" href="../Login/register.html" target="_Self">create an account</a>
				</div>
				<div id="commodityCon">
					<div id="registerCon">
						<span class="pd-30 redFont"> CREATE ACCOUNT </span>
						<input placeholder="First Name" class="logInput" id="fN" name="FirstName" />
						<input placeholder="Last Name" class="mgT-20 logInput" id="lN" name="LastName" />
						<input placeholder="Email" class="mgT-20 logInput" id="email" name="Email" />
						<input placeholder="Password" class="mgT-20 logInput" id="password" type="password" name="Password" />
						<button class="mgT-20 btncol" lay-filter="register" lay-submit="">Create</button>
						<a class="mgT-20 blueFont" href="../Main/index.html" target="_Self"> or Return to Store</a>
					</div>
				</div>
			</form>
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
		<!-- 全局js -->
<script src="/fishClub/Public/js/jquery.min.js?v=2.1.4"></script>
<script src="/fishClub/Public/js/bootstrap.min.js?v=3.3.6"></script>
<script type="text/javascript" src="/fishClub/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script type="text/javascript" src="/fishClub/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/fishClub/Public/js/plugins/layer/layer.min.js"></script>

<!-- Data Tables -->
<script type="text/javascript" src="/fishClub/Public/js/plugins/dataTables/jquery.dataTables.js"></script>
<script type="text/javascript" src="/fishClub/Public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/fishClub/Public/js/typeahead.js"></script>
<!--toastr-->
<script type="text/javascript" src="/fishClub/Public/vendor/toastr/toastr.min.js"></script>

<!--loading-->
<script src="/fishClub/Public/vendor/loading/loading.js"></script>

<!--layui-->
<script type="text/javascript" src="/fishClub/Public/vendor/layui/layui.js"></script>
<script type="text/javascript">
	toastr.options = {
		"closeButton": true,
		"positionClass": "toast-top-right",
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

	function sil_loading() {
		$('body').loading({
			loadingWidth: 240,
			title: '请稍等!',
			name: 'test',
			discription: '正在加载...',
			direction: 'column',
			type: 'origin',
			// originBg:'#71EA71',
			originDivWidth: 40,
			originDivHeight: 40,
			originWidth: 6,
			originHeight: 6,
			smallLoading: false,
			loadingMaskBg: 'rgba(0,0,0,0.2)'
		});
	}

	function sil_reloading() {
		removeLoading('test');
	}
</script>

		<script type="text/javascript">
			var headCon;
			init();
			function init(){
				document.documentElement.style.fontSize = "100px";
				window.addEventListener('resize', Utils.reszieFontHandler);
				headCon = document.getElementById("headCon");
                var headContent = new Head(false,"",headCon,0);
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
				form.on('submit(register)', function(data) {
					var formData = $('#registerForm').serializeArray();
					var postData = {};
					var flag = true;
					var name = '';
					$(formData).each(function() {
						postData[this.name] = this.value;
						if(postData[this.name] == '' || postData[this.name] == null) {
							flag = false;
							name = this.name;
							if(name == 'FirstName')
								name = 'First Name';
							else if(name == 'LastName')
								name = 'Last Name';
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
							url: '/fishClub/index.php/Home/Login/addAccountInfo',
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
			function toOrder() {
				window.location.href = "../OrderDetail/orderDetail.html";
			}
			function toContact() {
				layer.open({
					type: 2,
					title: 'Contact us',
					maxmin: true,
					shadeClose: true, //点击遮罩关闭层
					area: ['50%', '28%'],
					content: '/fishClub/index.php/Home/Login/contactUs',
					end: function() {
					}
				});
			}
		</script>
	</body>

</html>