<?php
namespace Admin\Controller;
use Think\Controller;
class DiscountManageController extends Controller {
	//折扣管理
	public function index() {
		$this -> display();
	}

	//折扣管理获取数据
	public function DiscountDatatable() {
		$arr = $_GET;
		$page = (isset($arr['page'])) ? intval($arr['page']) : 1;
		$rows = (isset($arr['limit'])) ? intval($arr['limit']) : 10;
		$offset = ($page - 1) * $rows;
		$where['status'] = 'normal';
		$discount_base_info = M('discount_base_info') -> where($where) -> limit($offset, $rows) -> select();
		$variable = M('discount_base_info') -> where($where) -> select();
		$result['code'] = 0;
		$result['msg'] = "";
		$result['count'] = count($variable);
		$result['data'] = $discount_base_info ? $discount_base_info : array();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	//新增商品页面
	function addDiscount() {
		$str = $this->getRandNumber();
		$this->assign('code',$str);
		$this -> display();
	}
	 //随机生成一串不重复的编号
	function getRandNumber() {
		return date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
	}

	//新增折扣
	function addDiscountInfo() {
		$arr = $_POST;
		$code = $arr['code'];
		$ratio = $arr['ratio'];
		$data['code'] = $code;
		$data['ratio'] = $ratio;
		$issue = M('discount_base_info') -> add($data);
		if (!$issue) {
			$result['state'] = false;
			$result['info'] = 'Add failed';
		} else {
			$result['state'] = true;
			$result['info'] = 'Add successfully';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	//删除折扣
	function delDiscount() {
		$arr = $_POST;
		$code = $arr['code'];
		$where['code'] = $code;
		$data['status'] = 'delete';
		$caseInfo = M('discount_base_info') -> where($where) -> save($data);
		if ($caseInfo === FALSE) {
			$result['state'] = false;
			$result['info'] = 'Failed to delete';
		} else {
			$result['state'] = true;
			$result['info'] = 'Successfully deleted';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	//编辑折扣页面展示
	function editDiscount() {
		$arr = $_GET;
		$code = $arr['code'];
		$where['code'] = $code;
		$discount_base_info = M('discount_base_info') -> where($where) -> find();
		$this -> assign('data', $discount_base_info);
		$this -> display();
	}

	//编辑折扣
	function editDiscountInfo() {
		$arr = $_POST;
		$code = $arr['code'];
		$where['code'] = $code;
		$data['ratio'] = $arr['ratio'];
		$saveInfo = M('discount_base_info') -> where($where) -> save($data);
		if ($saveInfo === FALSE) {
			$result['state'] = false;
			$result['info'] = 'Save failed';
		} else {
			$result['state'] = true;
			$result['info'] = 'Save successfully';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

}
?>