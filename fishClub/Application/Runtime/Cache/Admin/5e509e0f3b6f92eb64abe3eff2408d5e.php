<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Upload Picture</title>
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
		<link rel="stylesheet" href="/fishClub/Public/vendor/kindeditor/themes/default/default.css" />
		<link rel="stylesheet" href="/fishClub/Public/vendor/kindeditor/plugins/code/prettify.css" />
		<title></title>
		<style>
			.mgT-20{
				margin-top: 20px;
			}
			.btnScale{
				margin-top: 20px;
				width: 300px;
				margin-left: calc(50% - 150px);
			}
		</style>
	</head>

	<body>
		<form class="layui-form" action="" name="example" method="post" id="pictureForm">
			<div class="layui-form-item itemheight mgT-20">
				<label class="layui-form-label">Picture：</label>
				<div class="layui-input-block">
					<input type="file" name="file" id="fileimg">
					<p class="hint">(Only upload files of type jpg, png, jpeg)</p>
				</div>
			</div>
			<input hidden="hidden" name="ware_id" value="<?php echo ($data["ware_id"]); ?>"/>
			<div id="btn-div">
				<button class="layui-btn save-info btnScale" lay-submit="" lay-filter="save">Save</button>
			</div>
		</form>
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

		<script charset="utf-8" src="/fishClub/Public/vendor/kindeditor/kindeditor.js"></script>
		<script charset="utf-8" src="/fishClub/Public/vendor/kindeditor/lang/zh_CN.js"></script>
		<script charset="utf-8" src="/fishClub/Public/vendor/kindeditor/plugins/code/prettify.js"></script>
		<script type="text/javascript" src="/fishClub/Public/js/base.js"></script>
		<script type="text/javascript" src="/fishClub/Public/js/jquery.form.min.js"></script>
		<script type="text/javascript">
			layui.use(['form', 'layedit', 'laydate', 'upload'], function() {
				var form = layui.form,
					$ = layui.jquery,
					layer = layui.layer,
					layedit = layui.layedit,
					laydate = layui.laydate,
					upload = layui.upload;
				laydate.render({
					elem: '#investment_time',
					format: 'yyyy/MM/dd'
				});
				//自定义验证规则
				form.verify({
					title: function(value) {
						if(value == '' || value == null) {
							return '请输入信息';
						}
					},
				});
				form.on('submit(save)', function(data) {
					var formData = $('#pictureForm').serializeArray();
					var postData = {};
					$(formData).each(function() {
						postData[this.name] = this.value;
					});
					var ware_id = postData['ware_id'];
					jquerySubmit2(
						"/fishClub/index.php/Admin/WareManage/addPicture?ware_id=" + ware_id,
						'pictureForm',
						function(data) {
							if(data.state) {
								toastr.success(data.info);
								var index = parent.layer.getFrameIndex(window.name);
								parent.layer.close(index);
							} else {
								toastr.warning(data.info);
							}
						},
						function(error) {
							console.log(error);
						}
					);
					return false;
				});
			});
		</script>

	</body>

</html>