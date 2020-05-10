<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<title>Order Information</title>
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
				height: 30px;
				line-height: 30px;
				margin: 0 !important;
			}
			
			.newsimg {
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

	<body id="parent">
		<div class="wrapper wrapper-content animated fadeInRight" style="overflow-y: scroll;">
			<div class="row">
				<div class="col-sm-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h4>Order Information</h4>
						</div>
						<div class="blank1">
							<div class="blank">
								<input class="layui-input" type="hidden" id="types" />
								<div class="appeal">
									<button id="demohid" class="layui-btn homeimg layui-btn-primary">Waitting for pay</button>
									<button class="layui-btn newsimg layui-btn-primary">Waitting for delivery</button>
									<button class="layui-btn newsimg1 layui-btn-primary">Completed</button>
								</div>
							</div>
							<div class="blank5">
								<div class="layui-inline">
									<input class="layui-input" placeholder="search the email" id="search" autocomplete="off">
								</div>
								<button class="layui-btn" data-type="reload" id="searchBtn">Search</button>
							</div>
						</div>
						<div class="ibox-content">
							<table class="layui-table" lay-data="{url:'/fishClub/index.php/Admin/OrderInformation/orderInfoDatatable',  page:true, id:'idTest'}" lay-filter="demo">
								<thead>
									<tr>
										<th lay-data="{field:'name', align:'center',width:'10%'}">Name</th>
										<th lay-data="{field:'email', align:'center',width:'16%'}">Email</th>
										<th lay-data="{field:'phone', align:'center',width:'12%'}">Phone</th>
										<th lay-data="{field:'Address', align:'center',width:'20%'}">Address</th>
										<th lay-data="{field:'zip_code', align:'center',width:'8%'}">Zip code</th>
										<th lay-data="{field:'real_pay', align:'center',width:'10%'}">Real pay</th>
										<th lay-data="{field:'time', align:'center',width:'10%'}">Order time</th>
										<th lay-data="{align:'center', templet: '#barDemo',width:'14%'}">Operate</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/html" id="barDemo1">
		</script>
		<script type="text/html" id="barDemo">
			{{# if(d.status == 'obligation'){ }}
			<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="detail1">detail</a>
			<a class="layui-btn layui-btn-xs" lay-event="cancle">cancle</a>
			<!--<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="reject">驳回</a>-->
			{{# } else if(d.status == 'payed'){ }}
			<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="detail">detail</a>
			<a class="layui-btn layui-btn-xs" lay-event="delivery">delivery</a>
			{{# } else if(d.status == 'completed'){ }}
			<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="detail">detail</a>
			{{# } }}
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
			$('.homeimg').css('background-color', '#000000');
			$('.homeimg').css('color', '#FFFFFF');
			layui.use('table', function() {
				var table = layui.table;
				//类型功能
				var $ = layui.$,
					active = {
						reload: function() {
							var types = $('#types');
							var search = $('#search');
							console.log(search.val());
							console.log(types.val());
							//执行重载
							table.reload('idTest', {
								page: {
									curr: 1 //重新从第 1 页开始
								},
								where: {
									key: {
										search: search.val(),
										status: types.val()
									}
								}
							});
						}
					};
				$('.blank1 .layui-btn').on('click', function() {
					var type = $(this).data('type');
					active[type] ? active[type].call(this) : '';
				});
				$('.appeal').on('click', 'button', function() { 
					$('.homeimg').css('background-color', '');
					$('.homeimg').css('color', '');
					var search = $('#search');
					if($(this).hasClass('selecteds')) {
						$('button.selecteds').removeClass('selecteds');   
						var table = layui.table;
						table.reload('idTest');
					} else {
						$('button.selecteds').css('color', '');
						$('.selecteds').css('background-color', '');        
						$('button.selecteds').removeClass('selecteds');            
						$(this).addClass('selecteds'); 
						$(this).css('background-color', '#000000');
						$(this).css('color', '#FFFFFF');
						var table = layui.table;
						table.reload('idTest');
					}  
					if($('.homeimg').hasClass('selecteds')) {
						var rowdata = 'obligation'; 
						$("#types").val(rowdata);
						var types = $('#types');
						//执行重载
						table.reload('idTest', {
							page: {
								curr: 1 //重新从第 1 页开始
							},
							where: {
								key: {
									status: types.val(),
									search: search.val()
								}
							}
						});
						table.reload('idTest', {
							page: {
								curr: 1 //重新从第 1 页开始
							},
							where: {
								key: {
									status: types.val(),
									search: search.val()
								}
							}
						});
					} else if($('.newsimg').hasClass('selecteds')) {
						var rowdata = 'payed'; 
						$("#types").val(rowdata);
						var types = $('#types');
						//执行重载
						table.reload('idTest', {
							page: {
								curr: 1 //重新从第 1 页开始
							},
							where: {
								key: {
									status: types.val(),
									search: search.val()
								}
							}
						});
						table.reload('idTest', {
							page: {
								curr: 1 //重新从第 1 页开始
							},
							where: {
								key: {
									status: types.val(),
									search: search.val()
								}
							}
						});
					} else if($('.newsimg1').hasClass('selecteds')) {
						var rowdata = 'completed'; 
						$("#types").val(rowdata);
						var types = $('#types');
						//执行重载
						table.reload('idTest', {
							page: {
								curr: 1 //重新从第 1 页开始
							},
							where: {
								key: {
									status: types.val(),
									search: search.val()
								}
							}
						});
						table.reload('idTest', {
							page: {
								curr: 1 //重新从第 1 页开始
							},
							where: {
								key: {
									status: types.val(),
									search: search.val()
								}
							}
						});
					}
				});
				//监听工具条
				table.on('tool(demo)', function(obj) {
					var data = obj.data;
					if(obj.event === 'detail1') {
						var order_id = data.order_id;
						var flag = 1;
						layer.open({
							type: 2,
							title: 'Order detail',
							maxmin: true,
							shadeClose: true, //点击遮罩关闭层
							area: ['50%', '70%'],
							content: '/fishClub/index.php/Admin/OrderInformation/detail?order_id=' + order_id + '&flag=' + flag,
							end: function() {

							}
						});
					} else if(obj.event === 'detail') {
						var order_id = data.order_id;
						var flag = 0;
						layer.open({
							type: 2,
							title: 'Order detail',
							maxmin: true,
							shadeClose: true, //点击遮罩关闭层
							area: ['50%', '70%'],
							content: '/fishClub/index.php/Admin/OrderInformation/detail?order_id=' + order_id + '&flag=' + flag,
							end: function() {

							}
						});
					} else if(obj.event === 'delivery') {
						layer.confirm('Are you sure to delivery', {
								btn: ['YES'], //可以无限个按钮
								title: 'Information'
							},
							function(index) {
								$.ajax({
									type: 'post',
									url: '/fishClub/index.php/Admin/OrderInformation/todelivery',
									dataType: 'json',
									data: {
										'order_id': data.order_id
									},
									success: function(result) {
										if(result.state == true) {
											window.location.reload();
										} else {
											layer.alert(result.info, {
												icon: 5,
												btn: ['OK'],
												title: 'INFORMATION'
											});

										}
									}
								});
								//							obj.del(); //删除对应行（tr）的DOM结构
								layer.close(index);
							});
					} else if(obj.event === 'cancle') {
						layer.confirm('Are you sure to cancle the order', {
								btn: ['YES'], //可以无限个按钮
								title: 'Information'
							},
							function(index) {
								$.ajax({
									type: 'post',
									url: '/fishClub/index.php/Admin/OrderInformation/toCancleTheOrder',
									dataType: 'json',
									data: {
										'order_id': data.order_id
									},
									success: function(result) {
										if(result.state == true) {
											window.location.reload();
										} else {
											layer.alert(result.info, {
												icon: 5,
												btn: ['OK'],
												title: 'INFORMATION'
											});

										}
									}
								});
								//							obj.del(); //删除对应行（tr）的DOM结构
								layer.close(index);
							});
					}

				});
			});
		</script>

	</body>

</html>