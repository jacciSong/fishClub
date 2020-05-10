<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	/**
	 * 登录页
	 */
	public function login() {
		$user_id = I('id');
		$user = M('management_base_info') -> where(array('id' => $user_id)) -> find();
		$this -> assign('user', $user);
		$this -> display();
	}

	/**
	 * 检测登录
	 */
	public function loginCheck() {
		//		$arr = I();
		$account = I('account');
		$pwd = I('pwd');
		$management_base_info = M('management_base_info');
		//判断账号是否存在
		$where['account'] = $account;
		$where['status'] = array('neq', 'delete');
		$isExist = $management_base_info -> where($where) -> find();
		if ($isExist) {
			if (md5($pwd) == $isExist['password']) {
				//保存平台端登录人的id
				session(C('ADMIN_SESSION'), $isExist['id']);
				$result['state'] = true;
			} else {
				$result['state'] = false;
				$result['info'] = 'Password Incorrect';
			}
		} else {
			$result['state'] = false;
			$result['info'] = 'Account Incorrect';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function changePassword() {
		$res['state'] = FALSE;
		$res['info'] = '初始化';
		if (!preg_match("/^(\w){4,16}$/", $_POST['password'])) {
			$res['info'] = 'Only 4-16 letters, numbers, underscores can be entered';
		} else {
			$password = md5($_POST['password']);
			$management_base_info = M('management_base_info');
			$management_base_info = $management_base_info -> where(array('id' => session(C('ADMIN_SESSION')))) -> save(array('password' => $password));
			if ($management_base_info !== FALSE && $management_base_info !== 0) {
				$res['state'] = TRUE;
				$res['info'] = 'Successfully modified';
			} else if ($management_base_info === 0) {
				$res['state'] = FALSE;
				$res['info'] = 'New password is the same as old password';
			} else {
				$res['state'] = FALSE;
				$res['info'] = 'Edit failed, please try again';
			}
		}
		echo json_encode($res, JSON_UNESCAPED_UNICODE);
	}

	/**
	 * 退出登录
	 */
	public function logout() {
		$user = session(C('ADMIN_SESSION'));
		if (isset($user)) {//检测变量是否已设置并且非 NULL
			session(C('ADMIN_SESSION'),null);
			redirect(U("login/login"));
			$this -> success('Logout Successful');
		} else {
			redirect(U("login/login"));
			$this -> error('Logout Successful');
		}
	}

}
?>