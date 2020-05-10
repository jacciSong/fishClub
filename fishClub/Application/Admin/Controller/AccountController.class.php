<?php
namespace Admin\Controller;
use Think\Controller;
class AccountController extends Controller {
	public function account() {
		$this -> display();
	}

	public function userTable() {
		$arr = $_GET;
		$page = (isset($arr['page'])) ? intval($arr['page']) : 1;
		$rows = (isset($arr['limit'])) ? intval($arr['limit']) : 10;
		$offset = ($page - 1) * $rows;
		$where['status'] = 'normal';
		$user_base_info = M('user_base_info') -> where($where) -> limit($offset, $rows) -> select();
		$variable = M('user_base_info') -> where($where) -> select();
		foreach ($user_base_info as $key => $value) {
			$user_base_info[$key]['name'] = $value['last_name'] . ' ' . $value['first_name'];
		}
		$result['code'] = 0;
		$result['msg'] = "";
		$result['count'] = count($variable);
		$result['data'] = $user_base_info ? $user_base_info : array();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}
	
	public function editPassword(){
		$arr = $_GET;
		$user_id = $arr['user_id'];
		$this ->assign('data',$user_id);
		$this -> display();
	}

	public function resetUserManage() {
		$arr = $_POST;
		$user_base_info = M('user_base_info') -> where(array('user_id' => $arr['user_id'], 'status' => 'normal')) -> save(array('password' => md5($arr['password'])));
		if ($user_base_info !== FALSE) {
			$res['state'] = TRUE;
			$res['info'] = 'Password reset successful';
		} else {
			$res['state'] = FALSE;
			$res['info'] = 'Password reset failed';
		}
		echo json_encode($res, JSON_UNESCAPED_UNICODE);
	}
	
	

}
?>