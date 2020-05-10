<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<title>Discount Management</title>
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
		<link rel="stylesheet" href="/fishClub/Public/vendor/layui/css/layui.css" media="all">
		<!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
		<style>
			.blank {
				margin-left: 20px;
				height: 55px;
				line-height: 55px;
			}
			
			.layui-table img {
				width: 70px;
				height: 70px;
			}
			
			.layui-table-cell {
				height: auto;
				white-space: normal;
			}
			
			body {
				overflow-y: scroll;
			}
			
			.layui-table-cell {
				height: auto;
				white-space: normal;
			}
			
			.homeimg {
				margin-left: .2rem;
				width: 10rem;
				height: 30px;
				line-height: 30px;
				margin: 0 !important;
			}
			
			.newsimg {
				width: 10rem;
				height: 30px;
				line-height: 30px;
				margin: 0 !important;
			}
			
			.newsimg1 {
				height: 30px;
				line-height: 30px;
				margin: 0 !important;
			}
			
			#export {
				margin: -36px 20px;
				float: right;
			}
			
			.blank {
				margin-left: 20px;
				height: 45px;
				line-height: 45px;
			}
			
			.layui-inline {
				margin: 0 10px 0px 0px;
			}
			
			.blank5 {
				margin: 10px 0px 15px 19px;
				display: flex;
			}
		</style>
	</head>

	<body>
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
				<div class="col-sm-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h4>Discount Management</h4>
							<button class="layui-btn layui-btn-sm" onclick="addNewDiscount();" id="addBtn">Add</button>
						</div>
						<div class="ibox-content">
							<table class="layui-table" lay-data="{url:'/fishClub/index.php/Admin/DiscountManage/DiscountDatatable',  page:true, id:'idTest', limit:10}" lay-filter="demo">
								<thead>
									<tr>
										<th lay-data="{field:'code', align:'center'}">Code</th>
										<th lay-data="{field:'ratio', align:'center'}">Discount</th>
										<th lay-data="{align:'center', templet:'#barDemo'}">Operate</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<script type="text/html" id="barDemo2">
			<a class="layui-btn layui-btn-xs" lay-event="detailCo">详情</a>
		</script>-->
		
		<script type="text/html" id="barDemo">
			<a class="layui-btn layui-btn-xs" lay-event="edit">Edit</a>
			<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">Delete</a>
		</script>
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

		<script src="/fishClub/Public/vendor/layui/layui.js" charset="utf-8"></script>
		<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
		<script type="text/javascript">
			layui.use('table', function() {
				var table = layui.table;
				//类型功能
				var $ = layui.$,
					active = {
						reload: function() {
							var types = $('#types');
							//执行重载
							table.reload('idTest', {
								page: {
									curr: 1 //重新从第 1 页开始
								},
								where: {
									key: {
										lid: types.val()
									}
								}
							});
						}
					};
				//监听工具条
				table.on('tool(demo)', function(obj) {
					var data = obj.data;
					if(obj.event === 'edit') {
						var code = data.code;
//						var lid = data.lid;
						layer.open({
							type: 2,
							title: 'Edit the discount',
							maxmin: true,
							shadeClose: true, //点击遮罩关闭层
							area: ['50%', '35%'],
							content: '/fishClub/index.php/Admin/DiscountManage/editDiscount?code=' + code,
							end: function() {
								var table = layui.table;
								table.reload('idTest');
							}
						});
					} else if(obj.event === 'del') {
						layer.confirm('Are you sure you want to delete this discount?', 
						{
							btn: ['Yes', 'No'],
							title:false
						},
						function(index) {
							layer.close(index);
							var code = data.code;
							$.ajax({
								type: "post",
								url: "/fishClub/index.php/Admin/DiscountManage/delDiscount",
								async: true,
								data: {
									code: code,
								},
								dataType: 'json',
								success: function(p) {
									if(p.state == true) {
										toastr.success(p.info);
										var table = layui.table;
										table.reload('idTest');
									} else {
										toastr.warning(p.info);
									}
								}
							});
							//向服务端发送删除指令
						});
					} 
				});
			});

			function addNewDiscount() {
				layer.open({
					type: 2,
					title: 'Add a new discount',
					maxmin: true,
					shadeClose: true, //点击遮罩关闭层
					area: ['50%', '35%'],
					content: '/fishClub/index.php/Admin/DiscountManage/addDiscount',
					end: function() {
						var table = layui.table;
						table.reload('idTest');
					}
				});
			}
		</script>

	</body>

</html>