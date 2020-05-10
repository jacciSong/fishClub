<?php
namespace Admin\Controller;
use Think\Controller;
class ContactInformationController extends Controller {
	public function account() {
		$this -> display();
	}

	public function contactDatatable() {
		$arr = $_GET;
		$page = (isset($arr['page'])) ? intval($arr['page']) : 1;
		$rows = (isset($arr['limit'])) ? intval($arr['limit']) : 10;
		$offset = ($page - 1) * $rows;
		$where['status'] = 'normal';
		$management_base_info = M('management_base_info') -> where($where) -> limit($offset, $rows) -> select();
		$variable = M('management_base_info') -> where($where) -> select();
		$result['code'] = 0;
		$result['msg'] = "";
		$result['count'] = count($variable);
		$result['data'] = $management_base_info ? $management_base_info : array();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function editContact() {
		$arr = $_GET;
		$where['status'] = 'normal';
		$where['id'] = $arr['id'];
		$management_base_info = M('management_base_info') -> where($where) -> find();
		$this ->assign('data',$management_base_info);
		$this -> display();
	}
	
	public function editContactInfo(){
		$arr = $_POST;
		$management_base_info = M('management_base_info') -> where(array('id' => $arr['id'],'status' => 'normal')) -> save(array('email' => $arr['email'],'phone' => $arr['phone']));
		if ($management_base_info !== FALSE) {
			$res['state'] = TRUE;
			$res['info'] = 'Save successful';
		} else {
			$res['state'] = FALSE;
			$res['info'] = 'Save failed';
		}
		echo json_encode($res, JSON_UNESCAPED_UNICODE);
	}

}
?>