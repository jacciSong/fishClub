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
			
			-webkit-scrollbar {
				display: none;
			}
			
			#headCon {
				display: flex;
				background-color: rgb(42, 74, 124);
				width: 100%;
				height: 240px;
				padding: 0 240px;
			}
			
			#toolbarCon {
				background-color: #000000;
				width: 100%;
				height: 30px;
			}
			
			#commodityCon {
				background-color: rgb(255, 255, 255);
				width: 100%;
				padding-bottom: 80px;
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
				justify-content: space-between;
				height: 40px;
				width: 300px;
				/*margin-top: 20px;*/
				background-color: rgb(37, 65, 109);
				padding: 0 10px;
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
				margin-top: 20px;
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
				height: 40px;
				width: 100px;
				/*margin-top: 20px;*/
				background-color: rgb(37, 65, 109);
				padding: 0 4px;
				color: #FFFFFF;
				position: relative;
			}
			
			.mgL-10 {
				margin-left: 10px;
			}
			
			#Tinput::-webkit-input-placeholder {
				/* WebKit browsers */
				color: #FFFFFF;
				font-size: 16px;
			}
			
			#Tinput::-moz-placeholder {
				color: #FFFFFF;
				font-size: 16px;
			}
			
			#Tinput:-ms-input-placeholder {
				color: #FFFFFF;
				font-size: 16px;
			}
			
			.pd-30 {
				padding: 30px 0;
			}
			
			.redFont {
				color: rgb(192, 40, 28);
				font-size: 22px;
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
			
			#number {
				position: absolute;
				width: 20px;
				height: 20px;
				border-radius: 20px;
				border: none;
				text-align: center;
				background-color: rgb(252, 234, 79);
				top: 110px;
				right: 232px;
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
				padding: 40px 10px;
				justify-content: space-between;
			}
			.detailCon{
				display: flex;
				flex-direction: column;
				width: 100%;
				padding: 20px 10px;
				border-top: 1px solid #cdcdcd;
			}
			
			.bd {
				width: 100%;
				border-bottom: 1px solid #cdcdcd;
			}
			
			.numS {
				width: 22px;
				height: 22px;
				border-radius: 28px;
				border: 1px solid #cdcdcd;
				text-align: center;
			}
			
			.numCon {
				display: flex;
				flex-direction: row;
				justify-content: space-between;
				width: 80px;
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
				padding: 30px 0;
			}
			
			.btncol {
				background-color: rgb(42, 74, 124);
				width: 120px;
			}
			.shoppingCarB {
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: center;
				/*margin-left: 15px;*/
				height: 40px;
				width: 160px;
				/*margin-top: 20px;*/
				background-color: rgb(37, 65, 109);
				padding: 0 4px;
				color: #FFFFFF;
				position: relative;
			}
			.rightCon{
				display: flex;
				flex-direction: column;
				width: 60%;
			}
			.pd-20{
				padding: 10px 0;
			}
			.mgT-10{
				margin-top: 10px;
			}

		</style>
	</head>

	<body class="gray-bg" id="parent">
		<div id="wrapper wrapper-content animated fadeInRight pageCon" style="overflow-y: scroll;">
			<div id="headCon">
				<div class="avgCon">
					<img src="/fishClub/Public/img/home/bg-fish.jpg" width="400px" height="150px" />
				</div>
				<div class="avgCon">
					<div class="rightCo">
						<div id="fontCon">
							<span class="">Since 2020</span>
							<a class="weifont mgL-10" href="../Login/login.html" target="_Self">Sign in </a>
							<span>or</span>
							<a class="weifont" href="../Login/register.html" target="_Self">Create an Account</a>
						</div>
						<div class="xiaCon">
							<div id="searchCon">
								<input placeholder="Search all products..." class="inputStyle" id="Tinput" />
								<img src="/fishClub/Public/img/home/search.png" height="20px" width="20px" />
							</div>
							<div style="width: 15px;"></div>
							<div id="carCon" onclick="toOrder()">
								<div class="shoppingCar">
									<img src="/fishClub/Public/img/home/car.png" height="20px" width="20px" />
									<span class="mgL-10">Cart</span>
								</div>
								<input id="number" value="1" readonly="readonly"></input>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div id="toolbarCon"></div>
			<div id="commodityCon">
				<div class="shopingCon">
					<div class="pd-30  bd"> </div>
					<div class="wareCon">
						<img src="/fishClub/Public/img/home/fish1.jpg" height="220px" width="220px" />
						<div class="rightCon">
							<span style="width: 400px;" class="redFont">Fluval Flex Aquarium Kit - 15 Gallons</span>
							<span class="redFont pd-20">129.99</span>
							<span class="mgT-20"> Quantity </span>
							<div class="numCon mgT-10">
								<img src="/fishClub/Public/img/home/sub.png" height="20px" width="20px" />
								<input value="1" class="numS" readonly="readonly" />
								<img src="/fishClub/Public/img/home/add.png" height="20px" width="20px" />
							</div>
							<div >
								<div class="shoppingCarB mgT-20">
									<img src="/fishClub/Public/img/home/car.png" height="20px" width="20px" />
									<span class="mgL-10">Add to Cart</span>
								</div>
								<input id="number" value="1" readonly="readonly"></input>
							</div>
						</div>
					</div>
					<div class="detailCon">
						<span class="redFont">Detail</span>
						<span style="margin-top: 10px;">Flex not only offers contemporary styling with its distinctive curved front, but is also equipped with powerful multi-stage filtration and brilliant LED lighting that allows the user to customize several settings via remote control.</span>
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
		<script type="text/javascript">
			function showmis() {
				$('#misCon').show();
				$('#loginCon').hide();
			}

			function showlogin() {
				$('#misCon').hide();
				$('#loginCon').show();
			}

			function toOrder() {
				window.location.href = "../OrderDetail/orderDetail.html";
			}
		</script>
	</body>

</html>