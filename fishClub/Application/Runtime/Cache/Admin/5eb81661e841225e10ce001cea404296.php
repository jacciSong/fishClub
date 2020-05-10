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
			
			#pageCon1 {
				display: flex;
				flex-direction: row;
				justify-content: space-between;
				align-content: space-between;
				width: 100%;
			}
			
			-webkit-scrollbar {
				display: none;
			}
			
			.shipCon input:focus {
				border-style: solid;
				border-color: rgb(119, 161, 243);
				box-shadow: 0 0 15px #03a9f4;
			}
			
			.shipCon input {
				width: 100%;
				height: 50px;
				padding: 0 10px;
				border-radius: 10px;
				border: 1px solid #cdcdcd;
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
			
			.bd {
				width: 100%;
				border-bottom: 1px solid #cdcdcd;
			}
			
			#parent {
				overflow-x: hidden;
				overflow-y: scroll;
			}
			
			::-webkit-scrollbar {
				display: none;
			}
			
			.btncol {
				background-color: rgb(42, 74, 124);
				width: 120px;
			}
			
			.avgCon {
				width: 56%;
				display: flex;
				flex-direction: column;
				justify-content: flex-start;
				background-color: white;
				padding-top: 40px;
				padding-left: 170px;
				padding-right: 60px;
				padding-bottom: 44px;
			}
			
			.avgConR {
				display: flex;
				flex-direction: column;
				justify-content: flex-start;
				background-color: rgb(250, 250, 250);
				padding-top: 40px;
				padding-left: 40px;
				padding-right: 170px;
				width: 44%;
			}
			
			.btFont {
				color: black;
				font-size: 18px;
			}
			
			.pbtCon {
				margin: 10px 0;
				display: flex;
				flex-direction: row;
				height: 60px;
				align-items: center;
				width: 100%;
			}
			
			.rCon {
				display: flex;
				flex-direction: column;
				margin-left: 8px;
			}
			
			.shipCon {
				margin-top: 40px;
				display: flex;
				flex-direction: column;
				height: 560px;
				/*align-items: center;*/
				justify-content: space-between;
				align-content: space-between;
			}
			
			.flCon {
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: space-between;
			}
			
			.flCon input {
				width: 48%;
			}
			
			.llCon {
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: space-between;
			}
			
			.llCon input {
				width: 31%
			}
			
			.nextCon {
				display: flex;
				flex-direction: row;
				width: 100%;
				justify-content: space-between;
			}
			
			.wareCon {
				width: 100%;
				display: flex;
				flex-direction: column;
				border-bottom: 1px solid #CDCDCD;
				/*padding: 10px 0;*/
				padding-bottom: 10px;
			}
			
			.item {
				display: flex;
				flex-direction: row;
				width: 100%;
				padding: 10px 0;
				justify-content: space-between;
				align-items: center;
			}
			
			.redFont {
				color: rgb(192, 40, 28);
				font-size: 16px;
				font-weight: bold;
			}
			
			.oneCon {
				display: flex;
				width: 100%;
				height: 100px;
				flex-direction: column;
				padding: 10px 0;
				border-bottom: 1px solid #cdcdcd;
				justify-content: center;
			}
			
			.Con {
				width: 100%;
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: space-between;
			}
			
			.Con input:focus {
				border-style: solid;
				border-color: rgb(119, 161, 243);
				box-shadow: 0 0 15px #03a9f4;
			}
			
			.Con input {
				height: 50px;
				width: 73%;
				padding: 0 10px;
				border-radius: 10px;
				border: 1px solid #cdcdcd;
			}
			
			.Con button {
				height: 48px;
				width: 24%;
				border-radius: 10px;
			}
			
			.mgT-20 {
				margin-top: 20px;
			}
		</style>
	</head>

	<body class="gray-bg" id="parent">
		<div id="wrapper wrapper-content animated fadeInRight" style="overflow-y: scroll;">
			<div id="pageCon1">
				<div class="avgCon">
					<div class="personCon">
						<span class="btFont">Contact information</span>
						<div class="pbtCon">
							<img src="/fishClub/Public/img/home/person.png" / height="50px" width="50px">
							<div class="rCon">
								<span>Song rui (2640470874@qq.com)</span>
								<a style="margin-top: 4px;" class="blueFont">Log out</a>
							</div>
						</div>
					</div>
					<div class="shipCon">
						<span class="btFont">Contact information</span>
						<div class="flCon">
							<input placeholder="First name" id="fN" />
							<input placeholder="Last name" id="lN" />
						</div>
						<input placeholder="Company (optional)" id="company" />
						<input placeholder="Adress" id="adress" />
						<input placeholder="Apartment,suite,etc. (optional)" id="apartment" />
						<input placeholder="City" id="city" />
						<div class="llCon">
							<input value="United States" readonly="readonly" id="country" />
							<input placeholder="State" id="state" />
							<input placeholder="ZIP code" />
						</div>
						<input placeholder="phone (optional)" />
						<div class="nextCon">
							<a class="blueFont" href="./orderDetail.html" target="_Self">Return to cart</a>
							<button class="layui-btn btncol" style="width: 160px;">Continue to shipping</button>
						</div>
					</div>
				</div>
				<div class="avgConR">
					<div class="wareCon">
						<div class="item">
							<img src="/fishClub/Public/img/home/fish1.jpg" width="60px" height="60px" />
							<span>Fluval Flex Aquarium Kit - 15 Gallons</span>
							<div>
								<span>$129.99</span>
								<span class="redFont">x1</span>
							</div>
						</div>
						<div class="item">
							<img src="/fishClub/Public/img/home/fish1.jpg" width="60px" height="60px" />
							<span>Fluval Flex Aquarium Kit - 15 Gallons</span>
							<div>
								<span>$129.99</span>
								<span class="redFont">x1</span>
							</div>
						</div>
					</div>
					<div class="oneCon">
						<div class="Con">
							<input placeholder="Discount" id="discount" />
							<button class="layui-btn layui-btn-disabled" disabled="disabled"> Apply </button>
						</div>
					</div>
					<div class="oneCon">
						<div class="Con">
							<span> Subtotal</span>
							<span> $329.98 </span>
						</div>
						<div class="Con mgT-20">
							<span> Shipping</span>
							<span> Free </span>
						</div>
					</div>
					<div class="Con mgT-20" >
						<span> Total</span>
						<div>
							<span> USD</span>
							<span class="btFont">$329.98</span>
						</div>
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
		</script>
	</body>

</html>