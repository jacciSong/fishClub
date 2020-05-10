<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends Controller {
	public function index() {
		$last_name = M('user_base_info') -> where(array('user_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> find();
		$flag = 1;
		if ($last_name == '') {
			$flag = 2;
		}
		$this -> assign('ln', $last_name['last_name']);
		$this -> assign('flag', $flag);
		//商品信息
		$where['status'] = 'normal';
		$ware_info = M('ware_base_info') -> where($where) -> select();
		$data = array();
		$line = array();
		$i = 0;
		foreach ($ware_info as $key => $value) {
			if ($i < 5)
				{
					array_push($line, $value);
					$i++;
					if($i == 5)
					{
						array_push($data, $line);
						$line = array();
					}
					  
				}
			else {
				array_push($line, $value);
				$i = 0;
			}
		}
		if ($line != null)
			array_push($data, $line);
		$this -> assign('data', $data);
		$cartInfo = M('cart_detail_info') -> where(array('cart_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> select();
		$cart = array_sum(array_column($cartInfo, 'count'));
		$this -> assign('cart', $cart);
		$this -> display();
	}

	public function logout() {
		$user = session(C('HOME_SESSION'));
		if (isset($user)) {
			session(C('HOME_SESSION'),null);
			$result['state'] = true;
			$result['info'] = 'Log out successfully';
		} else {
			$result['state'] = false;
			$result['info'] = 'Log out failed';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function wareDetail() {
		$arr = $_GET;
		$last_name = M('user_base_info') -> where(array('user_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> find();
		$flag = 1;
		if ($last_name == '') {
			$flag = 2;
		}
		$this -> assign('ln', $last_name['last_name']);
		$this -> assign('flag', $flag);
		$information = M('ware_base_info') -> where(array('ware_id' => $arr['ware_id'], 'status' => 'normal')) -> find();
		$al_count = M('cart_detail_info') -> where(array('status' => 'normal', 'ware_id' => $arr['ware_id'], 'cart_id' => session(C('HOME_SESSION')))) -> find();
		if ($al_count == null)
			$count = 0;
		else
			$count = $al_count['count'];
		$this -> assign('info', $information);
		$this -> assign('al_count', $count);
		$cartInfo = M('cart_detail_info') -> where(array('cart_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> select();
		$cart = array_sum(array_column($cartInfo, 'count'));
		$this -> assign('cart', $cart);
		$sess_auth = session(C('HOME_SESSION'));
		$this -> assign('user',$sess_auth);
		$this -> assign('ware_id',$arr['ware_id']);
		$this -> display();
	}

	public function addToCart() {
		$arr = $_POST;
		$ware_id = $arr['ware_id'];
		$count = $arr['count'];
		$user_id = session(C('HOME_SESSION'));
		$max_count = M('ware_base_info') -> where(array('ware_id' => $ware_id, 'status' => 'normal'))->find();
		$isExist = M('cart_detail_info') -> where(array('status' => 'normal', 'ware_id' => $ware_id, 'cart_id' => $user_id)) -> find();
		if ($isExist) {
			$total_count = $count + $isExist['count'];
			if ($total_count <= $max_count['count_max']) {
				$saveInfo = M('cart_detail_info') -> where(array('cart_id' => $user_id, 'ware_id' => $ware_id)) -> save(array('count' => $total_count));
				if ($saveInfo == FALSE) {
					$result['state'] = false;
					$result['info'] = 'Add to Cart failed';
				} else {
					$result['state'] = true;
					$result['info'] = 'Add to Cart successful';
				}
			}
			else{
				$result['state'] = false;
				$result['info'] = 'The comodity cannot be more';
			}

		} else {
			$addInfo = M('cart_detail_info') -> add(array('cart_id' => $user_id, 'ware_id' => $ware_id, 'count' => $count));
			if (!$addInfo) {
				$result['state'] = false;
				$result['info'] = 'Add to Cart failed';
			} else {
				$result['state'] = true;
				$result['info'] = 'Add to Cart successful';
			}
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}
    public function myOrder(){
    	$sess_auth = session(C('HOME_SESSION'));
		if (!$sess_auth) {
			$this -> error('Please log in first！', U('Login/login'));
		}
		$last_name = M('user_base_info') -> where(array('user_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> find();
		$flag = 1;
		if ($last_name == '') {
			$flag = 2;
		}
		$this -> assign('ln', $last_name['last_name']);
		$this -> assign('flag', $flag);
		//商品信息
		$where['status'] = 'normal';
		$ware_info = M('ware_base_info') -> where($where) -> select();
		$data = array();
		$line = array();
		$i = 0;
		foreach ($ware_info as $key => $value) {
			if ($i < 5)
				array_push($line, $value);
			else {
				array_push($data, $line);
				$i = 0;
				$line = array();
			}
		}
		if ($line != null)
			array_push($data, $line);
		$this -> assign('data', $data);
		$cartInfo = M('cart_detail_info') -> where(array('cart_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> select();
		$cart = array_sum(array_column($cartInfo, 'count'));
		$this -> assign('cart', $cart);
		$order_ware_info = M('order_base_info as a')
						 ->where(array('a.status' => 'obligation', 'a.user_id' => session(C('HOME_SESSION'))))
						 ->field('a.order_id,a.ware_total,a.discount,a.order_number,a.total,a.real_pay')
						 ->order('a.time desc')
						 ->select();
		$data = array();
		foreach($order_ware_info as $key => $value){
			$arr = array();
			$arr = $value;
			$wareInfo1 = M('order_ware_detail as a')
			           ->join('ware_base_info as b on a.id = b.ware_id')
					   ->where(array('a.status' => 'normal', 'a.order_id' => $value['order_id']))
					   ->field('a.id,a.price,a.count,b.name,b.picture')
					   ->select();
		     $arr['ware_info'] = $wareInfo1;
		  array_push($data,$arr);
		}
		if($data == null)
		  $ifshow['DI'] = 1;
	    $this->assign('wareDI',$data);
		$map['a.user_id'] = session(C('HOME_SESSION'));
	    $map['a.status'] = array('in','payed,completed');
		$order_ware_info1 = M('order_base_info as a')
						 ->where($map)
						 ->field('a.order_id,a.ware_total,a.discount,a.order_number,a.total,a.real_pay')
						 ->order('a.time desc')
						 ->select();
		$data1 = array();
		foreach($order_ware_info1 as $key => $value){
			$arr1 = array();
			$arr1 = $value;
			$wareInfo2 = M('order_ware_detail as a')
			           ->join('ware_base_info as b on a.id = b.ware_id')
					   ->where(array('a.status' => 'normal', 'a.order_id' => $value['order_id']))
					   ->field('a.id,a.price,a.count,b.name,b.picture')
					   ->select();
		     $arr1['ware_info'] = $wareInfo2;
		  array_push($data1,$arr1);
		}
		if($data1 == null)
		 $ifshow['DC'] = 1;
		 $this->assign('wareDC',$data1);
		$this -> assign('ifshow',$ifshow);
		$this -> display();
	
    }
    public function toCancleTheOrder(){
      $arr = $_POST;
	  $oder_id = $arr['order_id'];
	  $order_base_info = M('order_base_info');
	  $order_base_info -> startTrans();
	  $flag = true;
	  $deleOrder = $order_base_info -> where(array('order_id' => $oder_id)) -> save(array('status' => 'delete'));
	  if($deleOrder === FALSE)
	    $flag = false;
	  $wareInfo = M('order_ware_detail') -> where(array('order_id' => $oder_id,'status' => 'normal')) -> select();
	  foreach($wareInfo as $key => $value){
	  	$map = array();
		$count = 0;
		$map['ware_id'] = $value['id'];
		$map['status'] = array('neq','delete');
	  	$isExit = M('ware_base_info') -> where($map) -> find();
		if($isExit){
			$count = $isExit['count_max'] + $value['count'];
			$saveWare = M('ware_base_info') -> where($map) -> save(array('count_max' => $count, 'status' => 'normal'));
			if($saveWare === FALSE)
			  $flag = false;
		}
	  }
	  if($flag){
	  	$order_base_info -> startTrans();
		$result['state'] = true;
		$result['info'] = "Order cancelled successfully";
	  }else{
	  	$order_base_info -> rollback();
		$result['state'] = false;
		$result['info'] = "Order cancellation failed";
	  }
	  echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public function contactUs(){
       $management_base_info = M('management_base_info') -> where(array('status' => 'normal')) -> find();
       $this -> assign('data',$management_base_info);
	   $this -> display();
    }

}
?>