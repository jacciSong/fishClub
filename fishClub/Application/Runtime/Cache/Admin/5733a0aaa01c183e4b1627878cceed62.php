<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Edit Discount</title>
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
			#btn-div {
				float: right;
				margin-top: 20px;
			}
			
			.save-info {
				width: 200px;
			}
			
			.itemheight {
				margin-bottom: 20px;
			}
			
			#detail {
				height: 160px;
			}
		</style>
	</head>

	<body>
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
				<div class="col-sm-12">

					<form class="layui-form" action="" id="staffForm">
						<div class="layui-form-item itemheight">
							<label class="layui-form-label">Code</label>
							<div class="layui-input-block">
								<input type="text" id="code" name="code" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($data['code']); ?>" readonly="readonly">
							</div>
						</div>
						<div class="layui-form-item itemheight">
							<label class="layui-form-label">Discount</label>
							<div class="layui-input-block">
								<input type="text" id="ratio" name="ratio" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($data['ratio']); ?>">
							</div>
						</div>
						<div id="btn-div">
							<button class="layui-btn save-info" lay-submit="" lay-filter="register">Save</button>
						</div>
					</form>

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
					var formData = $('#staffForm').serializeArray();
					var postData = {};
					$(formData).each(function() {
						postData[this.name] = this.value;
					}); // * 发起请求
					if(!isRatio(postData["ratio"])) {
						layer.alert("The discount must be a decimal between 0-1", {
							icon: 5,
							btn: ['OK'],
							title: 'INFORMATION'
						});
					} else {
						$.ajax({
							data: postData,
							type: "POST",
							dataType: "JSON",
							url: '/fishClub/index.php/Admin/DiscountManage/editDiscountInfo',
							success: function(data) {
								if(data.state == true) {
									toastr.success(data.info);
									var index = parent.layer.getFrameIndex(window.name);
									parent.layer.close(index);
								} else {
									toastr.warning(data.info);
								}
							}
						}); // end ajax
					}
					return false;
				});
			});

			function isRatio(value) {
				var reg = /^(0.\d+|0|1)$/;
				console.log(reg.test(value));
				return reg.test(value);
			}
		</script>

	</body>

</html>