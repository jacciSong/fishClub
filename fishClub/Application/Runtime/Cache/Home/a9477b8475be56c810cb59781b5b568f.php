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
				border-radius: 0.1rem;
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
				background-color: rgb(42, 74, 124);
				border-radius: 0.08rem;
				color: #FFFFFF;
				width: 1.6rem;
				height: 0.4rem;
				border-radius: 0.1rem;
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
			
			.avgCon {
				width: 56%;
				display: flex;
				flex-direction: column;
				justify-content: flex-start;
				background-color: white;
				padding-top: 0.4rem;
				padding-left: 1.7rem;
				padding-right: 0.6rem;
				padding-bottom: 0.44rem;
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
			
			.btFont {
				color: black;
				font-size: 0.18rem;
			}
			
			.pbtCon {
				margin: 0.1rem 0;
				display: flex;
				flex-direction: row;
				height: 0.6rem;
				align-items: center;
				width: 100%;
			}
			
			.rCon {
				display: flex;
				flex-direction: column;
				margin-left: 0.08rem;
			}
			
			.shipCon {
				margin-top: 0.4rem;
				display: flex;
				flex-direction: column;
				height: 5.6rem;
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
					<div class="personCon">
						<span class="btFont">Contact information</span>
						<div class="pbtCon">
							<img src="/fishClub/Public/img/home/person.png" / height="50px" width="50px">
							<div class="rCon">
								<span>Song rui (2640470874@qq.com)</span>
								<a style="margin-top: 4px;" class="blueFont"  onclick="logOut()">Log out</a>
							</div>
						</div>
					</div>
					<form class="shipCon" id="address">
						<input value='<?php echo ($data1); ?>' id="json" hidden="hidden" />
						<span class="btFont">Contact information</span>
						<div class="flCon">
							<input placeholder="First name" name="fN" value="<?php echo ($adressInfo["first_name"]); ?>" />
							<input placeholder="Last name" name="lN" value="<?php echo ($adressInfo["last_name"]); ?>" />
						</div>
						<input placeholder="Company (optional)" name="Company" value="<?php echo ($adressInfo["company"]); ?>" />
						<input placeholder="Adress" name="Address" value="<?php echo ($adressInfo["adress"]); ?>" />
						<input placeholder="Apartment,suite,etc. (optional)" name="Apartment" value="<?php echo ($adressInfo["apartment"]); ?>" />
						<input placeholder="City" name="City" value="<?php echo ($adressInfo["city"]); ?>" />
						<div class="llCon">
							<input value="United States" readonly="readonly" name="Country" value="<?php echo ($adressInfo["country"]); ?>" />
							<input placeholder="State" name="State" value="<?php echo ($adressInfo["state"]); ?>" />
							<input placeholder="ZIP code" value="<?php echo ($adressInfo["zip_code"]); ?>" name="zip_code" />
						</div>
						<input placeholder="Phone" name="Phone" value="<?php echo ($adressInfo["phone"]); ?>" />
						<div class="nextCon">
							<a class="blueFont" href="./orderDetail.html" target="_Self">Return to cart</a>
							<button class="btncol" lay-filter="Continue" lay-submit="">Continue to shipping</button>
						</div>
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
							<input placeholder="Discount" id="discount" class="discount" />
							<input id="btnDis" value="Invalid" readonly="readonly" />
						</div>
					</div>
					<div class="oneCon">
						<div class="Con">
							<span> Subtotal</span>
							<span id="subtotal"><?php echo ($shipInfo["total"]); ?> </span>
							<input value="<?php echo ($shipInfo["total"]); ?>" id="ysubT" hidden="hidden" />
						</div>
						<div class="Con mgT-20">
							<span> Shipping</span>
							<span> Free </span>
						</div>
						<div class="Con mgT-20" style="display: none;" id="showDis">
							<span> Discount</span>
							<div>
								<span class="redFont">-</span>
								<span id="disMoney">0</span>
							</div>
						</div>
					</div>
					<div class="Con mgT-20">
						<span> Total</span>
						<div>
							<span> USD</span>
							<span class="btFont" id="ztotal"><?php echo ($shipInfo["total"]); ?></span>
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
					var jsonData = JSON.parse($("#json").val());
					$(formData).each(function() {
						postData[this.name] = this.value;
						if(postData[this.name] == '' || postData[this.name] == null) {
							if(this.name != 'Company' && this.name != 'Apartment') {
								flag = false;
								if(this.name == 'fN')
									name = 'First name';
								else if(this.name == 'lN')
									name = 'Last name';
								else if(this.name == 'zip_code')
									name = 'ZIP code'
								else
									name = this.name;
								return false;
							}
						}
					}); // * 发起请求
					postData['discount_code'] = $('#discount').val();
					postData['discount'] = $('#disMoney').text();
					postData['ware_total'] = $('#ysubT').val();
					postData['total'] = $('#ysubT').val();  //理应是运费和商品费用的总额
					postData['wareInfo'] = jsonData;
					postData['real_pay'] = $('#ztotal').text();
					postData['shipping'] = 0;
					if(!flag) {
						layer.alert(name + " can not be empty", {
							icon: 5,
							btn: ['OK'],
							title: 'INFORMATION'
						});

					}else if(!(/^1[3456789]\d{9}$/.test(postData['Phone']))){
						 layer.alert("Incorrect mobile phone format", {
							icon: 5,
							btn: ['OK'],
							title: 'INFORMATION'
						});
					}else {
						$.ajax({
							data: postData,
							type: "POST",
							dataType: "JSON",
							url: '/fishClub/index.php/Home/OrderDetail/createOrder',
							success: function(data) {
								if(data.state == true) {
									var order_id = data.order_id;
										window.location.href = "../OrderDetail/payForOrder.html?order_id=" + order_id;
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
			function logOut() {
				$.ajax({
					data: '',
					type: "POST",
					dataType: "JSON",
					url: '/fishClub/index.php/Home/OrderDetail/logout',
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
				});
			}
		</script>
	</body>

</html>