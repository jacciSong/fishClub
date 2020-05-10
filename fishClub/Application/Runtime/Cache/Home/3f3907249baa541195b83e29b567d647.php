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
				margin-left: 1.85rem;
			}
			
			#pageCon {
				display: flex;
				flex-direction: row;
				justify-content: center;
				align-items: center;
				width: 100%;
			}
			
			-webkit-scrollbar {
				display: none;
			}
			
			#toolbarCon {
				background-color: #000000;
				width: 100%;
				height: 0.3rem;
			}
			
			#commodityCon {
				background-color: rgb(255, 255, 255);
				width: 100%;
				padding-bottom: 0.4rem;
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
			
			.pd-30 {
				padding: 0.3rem 0;
			}
			
			.redFont {
				color: rgb(192, 40, 28);
				font-size: 0.22rem;
				font-weight: bold;
			}
			
			.mgT-20 {
				margin-top: 0.2rem;
			}
			
			#loginCon input:focus {
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
			
			.shopingCon {
				display: flex;
				width: 66%;
				flex-direction: column;
				align-items: flex-start;
				justify-content: center;
			}
			
			.wareCon {
				display: flex;
				flex-direction: row;
				width: 100%;
				padding: 0.4rem 0.1rem;
				justify-content: space-between;
			}
			
			.detailCon {
				display: flex;
				flex-direction: column;
				width: 100%;
				padding: 0.2rem 0.1rem;
				border-top: 1px solid #cdcdcd;
			}
			
			.bd {
				width: 100%;
				border-bottom: 1px solid #cdcdcd;
			}
			
			.numS {
				width: 0.22rem;
				height: 0.22rem;
				border-radius: 0.28rem;
				border: 1px solid #cdcdcd;
				text-align: center;
			}
			
			.numCon {
				display: flex;
				flex-direction: row;
				justify-content: space-between;
				width: 0.8rem;
			}
			
			.submitCon {
				display: flex;
				flex-direction: column;
				align-items: flex-end;
				width: 100%;
			}
			
			#parent {
				overflow-x: hidden;
				overflow-y: scroll;
			}
			
			::-webkit-scrollbar {
				display: none;
			}
			
			.totalFont {
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: flex-end;
				width: 100%;
				padding: 0.3rem 0;
			}
			
			.btncol {
				background-color: rgb(42, 74, 124);
				width: 1.2rem;
			}
			
			.shoppingCarB {
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: center;
				/*margin-left: 15px;*/
				height: 0.4rem;
				width: 1.6rem;
				/*margin-top: 20px;*/
				background-color: rgb(37, 65, 109);
				padding: 0 0.04rem;
				color: #FFFFFF;
				position: relative;
				cursor: default;
			}
			
			.rightCon {
				display: flex;
				flex-direction: column;
				width: 57%;
			}
			
			.pd-20 {
				padding: 0.1rem 0;
			}
			
			.mgT-10 {
				margin-top: 0.1rem;
			}
			
			.dhF {
				font-size: 0.14rem;
			}
			
			.dhF1 {
				font-size: 0.14rem;
				color: rgb(122, 181, 213);
			}
			
			.dh {
				margin-top: 0.1rem;
			}
			
			.jt {
				margin-left: 0.04rem;
				margin-right: 0.04rem;
			}
			
			.gray-bg {
				background-color: white;
			}
		</style>
	</head>

	<body class="gray-bg" id="parent">
		<div id="wrapper wrapper-content animated fadeInRight pageCon" style="overflow-y: scroll;">
			<div id="headCon">
				<input id="user_name" value="<?php echo ($ln); ?>" hidden="hidden" />
				<input id="user_flag" value="<?php echo ($flag); ?>" hidden="hidden" />
				<input id="user_num" value="<?php echo ($cart); ?>" hidden="hidden" />
				<input id="is_user" value="<?php echo ($user); ?>" hidden="hidden">
			</div>
			<div id="toolbarCon"></div>
			<div id="commodityCon">
				<div class="shopingCon">
					<div class="dh">
						<a class="dhF1" href="../Main/index.html" target="_Self">store</a>
						<span class="jt"> > </span>
						<a class="dhF" onclick="toDetail(<?php echo ($ware_id); ?>)" target="_Self">detail</a>
					</div>
					<div class="pd-30  bd"> </div>
					<div class="wareCon">
						<img src="/fishClub/Uploads/<?php echo ($info["picture"]); ?>" height="180px" />
						<div class="rightCon">
							<span style="width: 400px;" class="redFont"><?php echo ($info["name"]); ?></span>
							<span class="redFont pd-20">$<?php echo ($info["price"]); ?></span>
							<span class="mgT-20"> Quantity </span>
							<div class="numCon mgT-10">
								<img src="/fishClub/Public/img/home/sub.png" height="20px" width="20px" onclick="sub()" />
								<input value="1" class="numS" readonly="readonly" id="num" />
								<img src="/fishClub/Public/img/home/add.png" height="20px" width="20px" onclick="add(<?php echo ($info["count_max"]); ?>,<?php echo ($al_count); ?>)" />
							</div>
							<div>
								<div class="shoppingCarB mgT-20" onclick="addToCart(<?php echo ($info["ware_id"]); ?>)">
									<img src="/fishClub/Public/img/home/car.png" height="20px" width="20px" />
									<span class="mgL-10">Add to Cart</span>
								</div>
							</div>
						</div>
					</div>
					<div class="detailCon">
						<span class="redFont">Detail</span>
						<span style="margin-top: 10px;"><?php echo ($info["detail"]); ?></span>
					</div>

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
		<script src="/fishClub/Public/vendor/Head.js"></script>
		<script src="/fishClub/Public/vendor/Utils.js"></script>
		<script type="text/javascript">
			var headCon;
			init();

			function init() {
				document.documentElement.style.fontSize = "100px";
				window.addEventListener('resize', Utils.reszieFontHandler);
				headCon = document.getElementById("headCon");
				var flag = document.getElementById("user_flag");
				flag = flag.value == 1 ? true : false;
				var name = document.getElementById("user_name").value;
				var num = document.getElementById("user_num").value;
				var headContent = new Head(flag, name, headCon, num);
			}

			function showmis() {
				$('#misCon').show();
				$('#loginCon').hide();
			}

			function showlogin() {
				$('#misCon').hide();
				$('#loginCon').show();
			}

			function add(max, al_count) {
				var num = $('#num').val();
				var count = Number(num) + Number(al_count);
				if(count < max) {
					num++;
					$('#num').val(num);
				} else {
					layui.use(['form', 'layedit', 'laydate'], function() {
						var form = layui.form,
							layer = layui.layer,
							layedit = layui.layedit,
							laydate = layui.laydate;
						layer.alert('The comodity cannot be more', {
							icon: 5,
							btn: ['OK'],
							title: 'INFORMATION'
						});
					});
				}
			}

			function sub() {
				var num = $('#num').val();
				if(num > 1) {
					num--;
					$('#num').val(num);
				} else {
					layui.use(['form', 'layedit', 'laydate'], function() {
						var form = layui.form,
							layer = layui.layer,
							layedit = layui.layedit,
							laydate = layui.laydate;
						layer.alert('The comodity cannot be less', {
							icon: 5,
							btn: ['OK'],
							title: 'INFORMATION'
						});
					});
				}

			}

			function toDetail(ware_id) {
				window.location.href = "./wareDetail.html?ware_id=" + ware_id;
			}

			function addToCart(ware_id) {
				var num = $('#num').val();
				var postData = {};
				postData['ware_id'] = ware_id;
				postData['count'] = num;
				var is_log = document.getElementById("is_user").value;
				if(!is_log) {
					window.location.href = "../Login/login.html"
				} else {
					$.ajax({
						data: postData,
						type: "POST",
						dataType: "JSON",
						url: '/fishClub/index.php/Home/Main/addToCart',
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

			}
		</script>
	</body>

</html>