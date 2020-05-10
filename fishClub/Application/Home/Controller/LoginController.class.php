<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	/**
	 * 登录页
	 */
	public function login() {
		$this -> display();
	}
	public function Tlogin() {
		$this -> display();
	}

	public function register() {
		$this -> display();
	}

	//注册新账号
	public function addAccountInfo() {
		$arr = $_POST;
		$data['first_name'] = $arr['FirstName'];
		$data['last_name'] = $arr['LastName'];
		$data['email'] = $arr['Email'];
		$data['password'] = md5($arr['Password']);
		if (!($this -> verifyEmail($data['email']))) {
			$result['state'] = false;
			$result['info'] = 'Email is malformed';
		} else {
			$isExist = M('user_base_info') -> where(array('email' => $data['email'], 'status' => 'normal')) -> find();
			if ($isExist) {
				$result['state'] = false;
				$result['info'] = 'The email has been registered';
			} else {
				$issue = M('user_base_info') -> add($data);
				if (!$issue) {
					$result['state'] = false;
					$result['info'] = 'registration failed';
				} else {
					$result['state'] = true;
					$result['info'] = 'Registered successfully';
					session(C('HOME_SESSION'),$issue);
				}
			}
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);

	}

	/**
	 * 检测登录
	 */
	public function loginCheck() {
		$arr = $_POST;
		$account = $arr['Email'];
		$pwd = $arr['Password'];
		$user_base_info = M('user_base_info');
		//判断账号是否存在
		$where['email'] = $account;
		$where['status'] = array('neq', 'delete');
		$isExist = $user_base_info -> where($where) -> find();
		if ($isExist) {
			if (md5($pwd) == $isExist['password']) {
				//保存平台端登录人的id
				session(C('HOME_SESSION'), $isExist['user_id']);
				$result['state'] = true;
			} else {
				$result['state'] = false;
				$result['info'] = 'Wrong password';
			}
		} else {
			$result['state'] = false;
			$result['info'] = 'Account is not registered';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function ghangePassword() {
		$res['state'] = FALSE;
		$res['info'] = '初始化';
		if (!preg_match("/^(\w){4,16}$/", $_POST['password'])) {
			$res['info'] = '只能输入4-16个字母、数字、下划线 ';
		} else {
			$password = md5($_POST['password']);
			$employee_info = M('employee_info');
			$employeeInfo = $employee_info -> where(array('id' => session(C('HOME_SESSION')))) -> save(array('password' => $password));
			if ($employeeInfo !== FALSE && $employeeInfo !== 0) {
				$res['state'] = TRUE;
				$res['info'] = '修改成功';
			} else if ($employeeInfo === 0) {
				$res['state'] = FALSE;
				$res['info'] = '新密码和旧密码相同';
			} else {
				$res['state'] = FALSE;
				$res['info'] = '修改失败，请重试';
			}
		}
		echo json_encode($res, JSON_UNESCAPED_UNICODE);
	}

	/**
	 * 退出登录
	 */
	public function logout() {
		$user = session(C('HOME_SESSION'));
		if (isset($user)) {
			session(null);
			redirect(U("login/login"));
			$this -> success('退出成功！');
		} else {
			redirect(U("login/login"));
			$this -> error('退出成功！');
		}
	}

	function verifyEmail($str) {
		$pattern = '/^[a-z0-9]+([._-][a-z0-9]+)*@([0-9a-z]+\.[a-z]{2,14}(\.[a-z]{2})?)$/i';
		if (preg_match($pattern, $str)) {
			return true;
		} else {
			return false;
		}
	}
	public function contactUs(){
    	   $management_base_info = M('management_base_info') -> where(array('status' => 'normal')) -> find();
       $this -> assign('data',$management_base_info);
	   $this -> display();
    }

}
?>