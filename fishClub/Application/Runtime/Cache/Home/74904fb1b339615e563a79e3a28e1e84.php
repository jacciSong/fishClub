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
				display: flex;
				flex-direction: column;
				align-items: center;
				padding-bottom: 0.3rem;
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
				padding: 0.25rem 0;
			}
			
			.redFont {
				color: rgb(192, 40, 28);
				font-size: 0.22rem;
				font-weight: bold;
			}
			
			.redFont1 {
				color: rgb(192, 40, 28);
				font-size: 0.16rem;
				font-weight: bold;
				padding: 0.15rem 0.1rem;
				background-color: white;
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
				border-radius: 0.08rem;
				color: #FFFFFF;
				width: 1.4rem;
				height: 0.4rem;
				border-radius: 0.1rem;
				/*margin-bottom: 40px;*/
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
				width: 68%;
				flex-direction: column;
				align-items: flex-start;
				justify-content: center;
				background-color: white;
				/*padding-left: 15px;*/
			}
			
			.wareCon {
				display: flex;
				flex-direction: column;
				/*padding-top: 40px;*/
				width: 100%;
				align-items: center;
				justify-content: space-between;
			}
			
			.bd {
				width: 100%;
				border-bottom: 1px solid #cdcdcd;
			}
			
			.numS {
				width: 0.22rem;
				height: 0.22rem;
				border-radius: 0.22rem;
				border: 1px solid #cdcdcd;
				text-align: center;
			}
			
			.numCon {
				display: flex;
				flex-direction: row;
				justify-content: space-between;
				width: 0.7rem;
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
			
			.item {
				width: 18%;
				display: flex;
				flex-direction: column;
				align-items: flex-start;
			}
			
			.mgT-10 {
				margin-top: 0.1rem;
			}
			
			.imgCo {
				width: 100%;
				height: 100%;
			}
			
			.imgContainer {
				height: 1.1rem;
			}
			
			.wid-160 {
				width: 100%;
				height: 0.8rem;
				padding: 0.1rem 0;
			}
			
			.allOrderCon {
				width: 100%;
				display: flex;
				flex-direction: row;
				justify-content: space-between;
				/*background-color: rgb(242, 242, 242);*/
			}
			
			.orderCon {
				width: 49.5%;
				display: flex;
				flex-direction: column;
				justify-content: flex-start;
			}
			
			.mgT-20 {
				margin-top: 0.2rem;
			}
			
			#btnDis {
				width: 0.9rem;
				text-align: center;
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
			
			.item {
				display: flex;
				flex-direction: row;
				width: 100%;
				padding: 0.1rem 0;
				justify-content: space-between;
				align-items: center;
			}
			
			.Con {
				width: 100%;
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: space-between;
			}
			
			.mgT {
				margin-top: 0.06rem;
			}
			
			.avgConR {
				background-color: white;
				padding: 0 0.1rem;
			}
			
			.btnCon {
				display: flex;
				flex-direction: row;
				justify-content: flex-end;
				width: 100%;
				background: white;
				height: 0.6rem;
				align-items: center;
				padding: 0 0.1rem;
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
			
			.pb {
				padding-bottom: 0.2rem;
			}
			.tip{
				/*margin-top: 6px;*/
				padding: 0.1rem 0.1rem;
				/*background-color: white;*/
			}
			.pdr{
				padding-right: 0.15rem;
			}
			.pdl{
				padding-left: 0.15rem;
			}
			.fg{
				background-color: rgb(242,242,242);
				width: 0.6%;
			}
			.hhfg{
				background-color: rgb(242,242,242);
				height: 0.05rem;
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
		<div id="wrapper wrapper-content animated fadeInRight pageCon" style="overflow-y: scroll;">
			<div id="headCon">
				<input id="user_name" value="<?php echo ($ln); ?>" hidden="hidden"/>
				<input id="user_flag" value="<?php echo ($flag); ?>" hidden="hidden"/>
				<input id="user_num" value="<?php echo ($cart); ?>" hidden="hidden"/>
			</div>
			<div id="toolbarCon"></div>
			<div id="commodityCon">
				<div class="shopingCon">
					<div class="dh pdl">
						<a class="dhF1" href="../Main/index.html" target="_Self">store</a>
						<span class="jt"> > </span>
						<a class="dhF" href="myOrder.html" target="_Self">my order</a>
					</div>
					<div class="pd-30 redFont bd pdl"> MY ORDER</div>
					<div class="allOrderCon">
						<div class="orderCon">
							<div class="redFont1"> ORDER HISTORY</div>
							<?php if($ifshow["DC"] == 1 ): ?><div class="tip">You haven't placed any orders yet.</div>
								<?php else: ?>
								<?php if(is_array($wareDC)): $i = 0; $__LIST__ = $wareDC;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="avgConR pb">
										<div class="hhfg"></div>
										<div class="wareCon">
											<?php if(is_array($vo["ware_info"])): $i = 0; $__LIST__ = $vo["ware_info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><div class="item">
													<img src="/fishClub/Uploads/<?php echo ($vo1["picture"]); ?>"/>
													<span class="wid240"><?php echo ($vo1["name"]); ?></span>
													<div>
														<span>$<?php echo ($vo1["price"]); ?></span>
														<span class="redFont1">x<?php echo ($vo1["count"]); ?></span>
													</div>
												</div><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
										<div class="oneCon">
											<div class="Con">
												<span> Subtotal</span>
												<span id="subtotal"><?php echo ($vo["ware_total"]); ?> </span>
											</div>
											<div class="Con mgT-20">
												<span> Shipping</span>
												<span> Free </span>
											</div>
											<div class="Con mgT-20">
												<span> Discount</span>
												<span> -<?php echo ($vo["discount"]); ?> </span>
											</div>
										</div>
										<div class="Con mgT">
											<span> Real pay</span>
											<div>
												<span> $</span>
												<span class="btFont" id="ztotal"><?php echo ($vo["real_pay"]); ?></span>
											</div>
										</div>
									</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</div>
						<div class="fg"></div>
						<div class="orderCon">
							<div class="redFont1"> WAITING FOR PAYMENT</div>
							<?php if($ifshow["DI"] == 1 ): ?><div class="tip">You haven't placed any orders yet.</div>
								<?php else: ?>
								<?php if(is_array($wareDI)): $i = 0; $__LIST__ = $wareDI;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="avgConR">
										<div class="hhfg"></div>
										<div class="wareCon">
											<?php if(is_array($vo["ware_info"])): $i = 0; $__LIST__ = $vo["ware_info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><div class="item">
													<img src="/fishClub/Uploads/<?php echo ($vo1["picture"]); ?>"/>
													<span class="wid240"><?php echo ($vo1["name"]); ?></span>
													<div>
														<span>$<?php echo ($vo1["price"]); ?></span>
														<span class="redFont1">x<?php echo ($vo1["count"]); ?></span>
													</div>
												</div><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
										<div class="oneCon">
											<div class="Con">
												<span> Subtotal</span>
												<span id="subtotal"><?php echo ($vo["ware_total"]); ?> </span>
											</div>
											<div class="Con mgT-20">
												<span> Shipping</span>
												<span> Free </span>
											</div>
											<div class="Con mgT-20">
												<span> Discount</span>
												<span> -<?php echo ($vo["discount"]); ?> </span>
											</div>
										</div>
										<div class="Con mgT">
											<span> Need pay</span>
											<div>
												<span> $</span>
												<span class="btFont" id="ztotal"><?php echo ($vo["real_pay"]); ?></span>
											</div>
										</div>
									</div>
									<div class="btnCon">
										<button class="btncol" onclick="toCancle(<?php echo ($vo["order_id"]); ?>)">Cancle the order</button>
										<button class="btncol" onclick="toPayForOrder(<?php echo ($vo["order_id"]); ?>)">Pay for the order</button>
									</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>

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
			var headCon;
			init();
			function init(){
				document.documentElement.style.fontSize = "100px";
				window.addEventListener('resize', Utils.reszieFontHandler);
				headCon = document.getElementById("headCon");
				var flag = document.getElementById("user_flag");
				flag = flag.value == 1 ? true : false;
				var name = document.getElementById("user_name").value;
                var num = document.getElementById("user_num").value;
                var headContent = new Head(flag,name,headCon,num);
			}
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

			function toDetail(ware_id) {
				window.location.href = "./wareDetail.html?ware_id=" + ware_id;
			}

			
			function toPayForOrder(order_id) {
				window.location.href = "../OrderDetail/payForOrder.html?order_id=" + order_id;
			}

			function toCancle(order_id) {
				var postData = {};
				postData['order_id'] = order_id;
				$.ajax({
					data: postData,
					type: "POST",
					dataType: "JSON",
					url: '/fishClub/index.php/Home/Main/toCancleTheOrder',
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
			}
		</script>
	</body>

</html>