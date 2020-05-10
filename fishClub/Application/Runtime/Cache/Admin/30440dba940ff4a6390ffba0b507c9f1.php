<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Order detail</title>
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
			.container {
				display: flex;
				justify-content: center;
				flex-direction: column;
				width: 100%;
			}
			
			.addressCon {
				background-color: white;
				height: 70px;
				width: 100%;
				display: flex;
				flex-direction: row;
				align-items: center;
				border-radius: 8px;
				padding: 10px 0px;
			}
			
			.wareCon {
				margin-top: 20px;
				background-color: white;
				padding: 10px 0;
				border-radius: 8px;
				display: flex;
				flex-direction: column;
				justify-content: center;
				width: 100%;
			}
			
			.orderCon {
				margin-top: 20px;
				background-color: white;
				height: 80px;
				border-radius: 8px;
				padding: 10px 0;
			}
			
			.container1 {
				background-color: rgb(242, 242, 242);
			}
			
			.rightCon {
				margin-left: 20px;
				height: 38px;
				display: flex;
				flex-direction: column;
				justify-content: space-between;
			}
			
			.topCon {
				margin-left: 10px;
				display: flex;
				flex-direction: row;
				width: 100%;
				height: 65px;
				align-items: center;
			}
			
			.rtCon {
				margin-left: 10px;
				display: flex;
				flex-direction: column;
				margin-right: 10px;
			}
			
			.belowCon {
				display: flex;
				flex-direction: column;
				width: 100%;
				border-bottom: 1px solid rgb(242, 242, 242);
			}
			
			.item {
				height: 26px;
				padding: 0 10px;
				display: flex;
				flex-direction: row;
				width: 96%;
				justify-content: space-between;
				align-items: center;
				/*align-content: space-between;*/
			}
			
			.redFont {
				margin-left: 6px;
				color: red;
				font-size: 16px;
			}
			-webkit-scrollbar {
				display: none;
			}
			#parent {
				overflow-x: hidden;
				overflow-y: scroll;
			}
			
			::-webkit-scrollbar {
				display: none;
			}
		</style>
	</head>

	<body class="container1" id="parent">
		<div class="wrapper wrapper-content animated fadeInRight" style="overflow-y: scroll;">
			<div class="container">
				<div class="addressCon">
					<img src="/fishClub/Public/img/Admin/Adress.png" height="50px" width="50px" style="margin-left: 10px;" />
					<div class="rightCon">
						<div>
							<span><?php echo ($data["name"]); ?></span>
							<span style="margin-left:4px;"> <?php echo ($data["phone"]); ?></span>
							<span style="margin-left:4px;"> <?php echo ($data["email"]); ?></span>
						</div>
						<span><?php echo ($data["address_str"]); ?></span>
					</div>
				</div>
				<div class="wareCon">
					<?php if(is_array($data["ware_info"])): $i = 0; $__LIST__ = $data["ware_info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="topCon">
							<img src="/fishClub/Uploads/<?php echo ($vo["picture"]); ?>" width="90px" />
							<div class="rtCon">
								<span><?php echo ($vo["name"]); ?></span>
								<div style="margin-top: 8px;">
									<span>$<?php echo ($vo["price"]); ?></span>
									<span class="redFont">x<?php echo ($vo["count"]); ?></span>
								</div>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>

					<div class="belowCon">
						<div class="item">
							<span>SubTotal</span>
							<span><?php echo ($data["ware_total"]); ?></span>
						</div>
						<div class="item">
							<span>Shipping</span>
							<span>Free</span>
						</div>
						<div class="item">
							<span>Discount</span>
							<span>-<?php echo ($data["discount"]); ?></span>
						</div>
					</div>
					<div class="item" style="margin-top: 6px;">
						<?php if($data["flag"] == 1 ): ?><span>Need pay</span>
							<?php else: ?> <span>Real pay</span><?php endif; ?>
						
						<span>$<?php echo ($data["real_pay"]); ?></span>
					</div>
				</div>
				<div class="orderCon">
					<div class="belowCon" style="border: none;">
						<div class="item">
							<span>Order number</span>
							<span><?php echo ($data["order_number"]); ?></span>
						</div>
						<div class="item">
							<span>Create time </span>
							<span><?php echo ($data["time"]); ?></span>
						</div>
					</div>
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

		<script type="text/javascript">
			window.addEventListener('load', function() {
				reTime();
			})

			function reTime() {
				var ti = $("#time").val();
				var date1 = $("#date").val();
				console.log(ti);
				if(ti == 1)
					document.getElementById("db_time").innerText = "答辩时间：" + date1 + " 上午";
				else
					document.getElementById("db_time").innerText = "答辩时间：" + date1 + " 下午";
			}
		</script>
	</body>

</html>