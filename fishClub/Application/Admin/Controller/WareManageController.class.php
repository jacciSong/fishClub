<?php
namespace Admin\Controller;
use Think\Controller;
class WareManageController extends Controller {
	//商品管理
	public function index() {
		$this -> display();
	}

	//商品管理获取数据
	public function WareDatatable() {
		$arr = $_GET;
		$keyes = $arr['key'];
		$keys = $arr['key'];
		$page = (isset($arr['page'])) ? intval($arr['page']) : 1;
		$rows = (isset($arr['limit'])) ? intval($arr['limit']) : 10;
		$offset = ($page - 1) * $rows;
		$where['status'] = 'normal';
		$ware_base_info = M('ware_base_info') -> where($where) -> limit($offset, $rows) -> select();
		$variable = M('ware_base_info') -> where($where) -> select();
		$result['code'] = 0;
		$result['msg'] = "";
		$result['count'] = count($variable);
		$result['data'] = $ware_base_info ? $ware_base_info : array();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	//新增商品页面
	function addWare() {
		$this->display();
	}
	//新增商品
	function addWareInfo()
	{
		$arr=$_POST;
		$name = $arr['name'];
		$price = $arr['price'];
		$detail = $arr['detail'];
		$count_max = $arr['count'];
		$data['name'] = $name;
		$data['price'] = $price;
		$data['detail'] = $detail;
		$data['count_max'] = $count_max;
		$issue = M('ware_base_info') -> add($data);
		if(!$issue)
		{
			$result['state'] = false;
			$result['info'] = 'Add failed';
		}
		else{
			$result['state'] = true;
			$result['info'] = 'Add successfully';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}
	//删除商品
	function delWare() {
		$arr = $_POST;
		$ware_id = $arr['ware_id'];
		$where['ware_id'] = $ware_id;
		$data['status'] = 'delete';
		$caseInfo = M('ware_base_info') -> where($where) -> save($data);
		if ($caseInfo === FALSE) {
			$result['state'] = false;
			$result['info'] = 'Failed to delete';
		} else {
			$result['state'] = true;
			$result['info'] = 'Successfully deleted';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}
	//编辑商品页面展示
	function editWare()
	{
		$arr = $_GET;
		$ware_id = $arr['ware_id'];
		$where['ware_id'] = $ware_id;
		$ware_base_info = M('ware_base_info') -> where($where) ->find();
		$this->assign('data',$ware_base_info);
		$this->display();
	}
	//编辑商品
	function editWareInfo()
	{
		$arr = $_POST;
		$ware_id = $arr['ware_id'];
		$where['ware_id'] = $ware_id;
		
		$count_max = $arr['count'];
		$price = $arr['price'];
		$detail = $arr['detail'];
		$name = $arr['name'];
		
		$data['name'] = $name;
		$data['detail'] = $detail;
		$data['price'] = $price;
		$data['count_max'] = $count_max;
		
		$saveInfo = M('ware_base_info') -> where($where) ->save($data);
		if($saveInfo == FALSE)
		{
			$result['state'] = false;
			$result['info'] = 'Save failed';
		}
		else{
			$result['state'] = true;
			$result['info'] = 'Save successfully';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}
	//上传图片页面
	function picture()
	{
		$arr = $_GET;
		$data['ware_id'] = $arr['ware_id'];
		$this->assign("data",$data);
		$this->display();
	}
	//上传图片
	function addPicture()
	{
		$arr = $_POST;
		$ware_id = $arr['ware_id'];
		$ImgresultInfo = array();
		$Imgresult = $this -> uploadFile(array('jpg', 'png', 'jpeg'), C('UPLOAD_PIC'));
		if ($this -> uploadState) {
			foreach ($Imgresult['data'] as $key => $value) {
				$ImgresultInfo['image'] = $value['savepath'] . $value['savename'];
				$ImgresultInfo['ext'] = $value['ext'];
				$ImgresultInfo['name'] = $value['name'];
				$i++;
			}
		}

		if ($ImgresultInfo['name'] == null || $ImgresultInfo['name'] == '') {
			$ImgresultInfo['name'] = '';
		}
		if ($ImgresultInfo['image'] == null || $ImgresultInfo['image'] == '') {
			$ImgresultInfo['image'] = '';
		}
		if ($ImgresultInfo['ext'] == null || $ImgresultInfo['ext'] == '') {
			$ImgresultInfo['ext'] = '';
		}

		$where['ware_id'] = $ware_id;
		$datas['picture'] = $ImgresultInfo['image'];
		$isTable = M('ware_base_info') -> where($where)->save($datas);

		if ($isTable !== false) {
			$result['state'] = true;
			$result['info'] = 'Upload successfully';
		} else {
			$result['state'] = false;
			$result['info'] = 'Upload failed
';
		}
		echo json_encode($result);
	}
    //上传图片layui
	protected function uploadFile($type, $savePath) {
		$upload = new \Think\Upload();
		// 实例化上传类
		$upload -> maxSize = 20 * 1024 * 1024;
		// 4211576
		// 设置附件上传大小
		$upload -> subName = '';
		$upload -> exts = $type;
		// array ('jpg','gif','png','jpeg','rar','zip','csv');
		// 设置附件上传类型
		$upload -> rootPath = './Uploads/';
		// 设置附件上传根目录
		$upload -> savePath = $savePath;
		// 设置附件上传（子）目录
		// 上传文件
		$info = $upload -> upload();
		// var_dump($info);
		$array = array('message' => '', 'data' => '');
		if (!$info) {// 上传错误提示错误信息
			$array['message'] = $upload -> getError();
			$this -> uploadState = false;
		} else {// 上传成功 获取上传文件信息
			$array['data'] = $info;
			$this -> uploadState = true;
		}
		return $array;
	}
}
?>