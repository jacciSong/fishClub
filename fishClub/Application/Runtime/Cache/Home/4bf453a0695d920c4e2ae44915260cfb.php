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
				box-shadow: 0 0 0.15rem #03a9f4;
			}
			
			.shipCon input {
				width: 100%;
				height: 0.5rem;
				padding: 0 0.1rem;
				border-radius: 0;
				border: 1px solid #cdcdcd;
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
				margin-top: 0.2rem;
				background-color: rgb(42, 74, 124);
				border-radius: 0.06rem;
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
				width: 1.2rem;
			}
			
			.avgCon {
				width: 56%;
				display: flex;
				flex-direction: column;
				justify-content: flex-start;
				background-color: white;
				padding-top: 0.4rem;
				padding-left: 1.7rem;
				padding-right: 0.6rem;
				padding-bottom: 2rem;
			}
			
			.avgConR {
				display: flex;
				flex-direction: column;
				justify-content: flex-start;
				background-color: rgb(250, 250, 250);
				padding-top: 0.4rem;
				padding-left: 0.4rem;
				padding-right: 1.7rem;
				width: 44%;
			}
			
			.pbtCon {
				display: flex;
				flex-direction: column;
				height: 1.2rem;
				align-items: flex-start;
				justify-content: space-between;
				width: 100%;
				padding: 0.15rem 0.2rem;
				border: 1px solid #CDCDCD;
				border-bottom-left-radius: 0.08rem;
				border-bottom-right-radius: 0.08rem;
			}
			
			.shipCon {
				width: 100%;
				display: flex;
				flex-direction: column;
				height: 2.2rem;
				/*align-items: center;*/
				justify-content: space-between;
				align-content: space-between;
				border: 1px solid #CDCDCD;
				border-bottom-left-radius: 0.08rem;
				border-bottom-right-radius: 0.08rem;
				padding: 0.15rem 0.2rem;
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
				padding-bottom: 0.1rem;
			}
			
			.item {
				display: flex;
				flex-direction: row;
				width: 100%;
				padding: 0.1rem 0;
				justify-content: space-between;
				align-items: center;
			}
			
			.redFont {
				color: rgb(192, 40, 28);
				font-size: 0.16rem;
				font-weight: bold;
			}
			
			.oneCon {
				display: flex;
				width: 100%;
				/*height: 100px;*/
				flex-direction: column;
				padding: 0.2rem 0;
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
				box-shadow: 0 0 0.15rem #03a9f4;
			}
			
			.Con input {
				height: 0.5rem;
				width: 73%;
				padding: 0 0.1rem;
				border-radius: 0.1rem;
				border: 1px solid #cdcdcd;
			}
			
			.Con button {
				height: 0.48rem;
				width: 24%;
				border-radius: 0.1rem;
			}
			
			.mgT-20 {
				margin-top: 0.2rem;
			}
			
			#btnDis {
				width: 0.9rem;
				text-align: center;
			}
			
			.valid {
				background-color: green;
				color: white;
			}
			
			.btFont {
				background-color: rgb(42, 74, 124);
				;
				height: 0.4rem;
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				border-top-right-radius: 0.08rem;
				border-top-left-radius: 0.08rem;
				color: white;
				font-size: 0.16rem;
			}
			
			.bCon {
				display: flex;
				flex-direction: column;
				align-items: flex-end;
			}
			
			.btFont1 {
				font-size: 0.16rem;
				color: #000000;
			}
			
			.dhF {
				font-size: 0.14rem;
			}
			
			.dhF1 {
				font-size: 0.14rem;
				color: rgb(122, 181, 213);
			}
			
			.dh {
				margin-bottom: 0.1rem;
			}
			
			.jt {
				margin-left: 0.04rem;
				margin-right: 0.04rem;
			}
			
			.pb {
				padding-bottom: 0.2rem;
			}
			.gray-bg{
				background-color: white;
			}
			img{
				width: 0.6rem;
				height: 0.6rem;
			}
			.wid240{
				width: 2.4rem;
			}
		</style>
	</head>

	<body class="gray-bg" id="parent">
		<div id="wrapper wrapper-content animated fadeInRight" style="overflow-y: scroll;">
			<div id="pageCon1">
				<div class="avgCon">
					<div class="dh">
						<a class="dhF1" href="../Main/index.html" target="_Self">store</a>
						<span class="jt"> > </span>
						<a class="dhF1" href="../Main/myOrder.html" target="_Self">my order</a>
						<span class="jt"> > </span>
						<a class="dhF" onclick="toPayForOrder(<?php echo ($order_id); ?>)" target="_Self">pay for the order</a>
					</div>
					<div class="personCon">
						<div class="btFont">
							<span>Contact information</span>
						</div>
						<div class="pbtCon">
							<span>Contact: <?php echo ($contactInfo); ?></span>
							<span>Ship to:  <?php echo ($shipTo); ?></span>
							<span>Phone: <?php echo ($adressInfo["phone"]); ?></span>
						</div>
					</div>
					<div class="btFont" style="margin-top: 50px;">Payment</div>
					<form id="address" class="bCon">
						<div class="shipCon">
							<input placeholder="Card number" name="card_number" />
							<input placeholder="Name on card" name="name_card" />
							<input value="<?php echo ($order_id); ?>" name="order_id" hidden="hidden">
							<div class="flCon">
								<input placeholder="Expiration date(MM/YY)" name="date" />
								<input placeholder="Security code" name="code" />
							</div>
						</div>
						<button class="layui-btn btncol" lay-filter="Continue" lay-submit="">Pay now</button>
					</form>
				</div>
				<div class="avgConR">
					<div class="wareCon">
						<?php if(is_array($shipInfo["data"])): $i = 0; $__LIST__ = $shipInfo["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item">
								<img src="/fishClub/Uploads/<?php echo ($vo["picture"]); ?>"  />
								<span class="wid240"><?php echo ($vo["name"]); ?></span>
								<div>
									<span>$<?php echo ($vo["price"]); ?></span>
									<span class="redFont">x<?php echo ($vo["count"]); ?></span>
								</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="oneCon">
						<div class="Con">
							<span> Subtotal</span>
							<span id="subtotal"><?php echo ($shipInfo['order']["ware_total"]); ?> </span>
							<input value="<?php echo ($shipInfo["ware_total"]); ?>" id="ysubT" hidden="hidden" />
						</div>
						<div class="Con mgT-20">
							<span> Shipping</span>
							<span> Free </span>
						</div>
						<div class="Con mgT-20">
							<span> Discount</span>
							<span> -<?php echo ($shipInfo['order']["discount"]); ?> </span>
						</div>
					</div>
					<div class="Con mgT-20">
						<span> Total</span>
						<div>
							<span class="btFont1" id="ztotal">$<?php echo ($shipInfo['order']["real_pay"]); ?></span>
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
		<script src="/fishClub/Public/vendor/Head.js"></script>
		<script src="/fishClub/Public/vendor/Utils.js"></script>
		<script type="text/javascript">
			init();
			function init(){
				document.documentElement.style.fontSize = "100px";
				window.addEventListener('resize', Utils.reszieFontHandler);
			}
			layui.use(['form', 'layedit', 'laydate'], function() {
				var form = layui.form,
					layer = layui.layer,
					layedit = layui.layedit,
					laydate = layui.laydate;
				form.on('submit(Continue)', function(data) {
					var formData = $('#address').serializeArray();
					var postData = {};
					var flag = true;
					var name = '';
					$(formData).each(function() {
						postData[this.name] = this.value;
					}); // * 发起请求
					$.ajax({
						data: postData,
						type: "POST",
						dataType: "JSON",
						url: '/fishClub/index.php/Home/OrderDetail/payNow',
						success: function(data) {
							if(data.state == true) {
								window.location.href = "../Main/myOrder.html";
							} else {
								layer.alert(data.info, {
									icon: 5,
									btn: ['OK'],
									title: 'INFORMATION'
								});
							}
						}
					});
					return false;
				});
			});
			$(document).on('input propertychange', '.discount', function() {
				var discountCode = $(this).val();
				var ysubT = $('#ysubT').val();
				$.ajax({
					data: {
						code: discountCode
					},
					type: "POST",
					dataType: "JSON",
					url: '/fishClub/index.php/Home/OrderDetail/verifyCode',
					success: function(data) {
						if(data.state == true) {
							var ratio = data.ratio;
							var xtotal = Number(ysubT) * Number(ratio);
							var dis = Number(ysubT) * (1 - Number(ratio));
							$('#btnDis').val('Valid');
							$('#btnDis').addClass('valid');
							$('#ztotal').text(xtotal.toFixed(2));
							$('#showDis').show();
							$('#disMoney').text(dis.toFixed(2));
						} else {
							$('#btnDis').val('Invalid');
							$('#btnDis').removeClass('valid');
							$('#ztotal').text(ysubT);
							$('#showDis').hide();
						}
					}
				});

			})

			function toPayForOrder(order_id) {
				window.location.href = "../OrderDetail/payForOrder.html?order_id=" + order_id;
			}
		</script>
	</body>

</html>