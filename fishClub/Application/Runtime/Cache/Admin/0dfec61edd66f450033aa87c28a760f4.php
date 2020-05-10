<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>FCMS</title>
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
		<link rel="stylesheet" type="text/css" href="/fishClub/Public/css/home/login.css" />
		<link rel="shortcut icon" href="/fishClub/Public/img/logo.png">
		<style type="text/css">
			a:hover {
				color: #FFFFFF;
			}
		</style>
	</head>

	<body>

		<div class="top-div">
			<div class="text">
				Fish Club Management System
			</div>
		</div>
		<div class="content">
			<div class="login-div">
				<div class="user-login-text">
					Fish Club 
				</div>
				<div class="input-div">
					<input type="text" name="account" class="input account" placeholder="Account" value="<?php echo ($user["account"]); ?>" />
					<input type="password" name="pwd" class="input pwd" placeholder="Password" />
					<a class="login-btn" onclick="checkLogin()">
						LOGIN
					</a>
				</div>
			</div>
		</div>

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


		<script type="text/javascript" src="/fishClub/Public/js/common.js"></script>
		<script>
			if(window != top)
				top.location.href = location.href;
			$(document).ready(function() {
				setRootFontSize();
				$("body").keydown(function() {
					if(event.keyCode == "13") { //keyCode=13是回车键
						checkLogin();
					}
				});
			})

			function checkLogin() {
				var account = $('.account').val();
				if(account == '' || account == null) {
					toastr.warning('Please enter your account !');
					return;
				}
				var pwd = $('.pwd').val();
				if(pwd == '' || pwd == null) {
					toastr.warning('Please enter your password !');
					return;
				}
				$.ajax({
					type: "post",
					url: "/fishClub/index.php/Admin/Login/loginCheck",
					async: true,
					data: {
						account: account,
						pwd: pwd
					},
					dataType: 'json',
					success: function(data) {
						if(data.state) {
							window.location.href = "/fishClub/index.php/Admin/Main/index.html";
						} else {
							toastr.warning(data.info);
						}
					}
				});
			}
		</script>
	</body>

</html>