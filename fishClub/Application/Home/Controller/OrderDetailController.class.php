<?php
namespace Home\Controller;
use Think\Controller;
class OrderDetailController extends Controller {
	/**
	 * 订单详情
	 */
	public function orderDetail() {
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
		$cartInfo = M('cart_detail_info') -> where(array('cart_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> select();
		$cart = array_sum(array_column($cartInfo, 'count'));
		$this -> assign('cart', $cart);

		$shipInfo['data'] = M('cart_detail_info as a') -> join('ware_base_info as b on a.ware_id = b.ware_id') -> where(array('a.status' => 'normal', 'b.status' => 'normal', 'cart_id' => session(C('HOME_SESSION')))) -> select();
		$shipInfo['total'] = 0;
		foreach ($shipInfo['data'] as $key => $value) {
			$shipInfo['total'] += $value['price'] * $value['count'];
		}
		$flag = 1;
		if ($shipInfo['data'] != null)
			$flag = 2;
		$total_money = number_format($shipInfo['total'], 2, ".", "");
		$shipInfo['total'] = $total_money;
		$this -> assign('shipInfo', $shipInfo);
		$this -> assign('flag1', $flag);
		$this -> display();
	}

	public function logout() {
		$user = session(C('HOME_SESSION'));
		if (isset($user)) {
			session(null);
			$result['state'] = true;
			$result['info'] = 'Log out successfully';
		} else {
			$result['state'] = false;
			$result['info'] = 'Log out failed';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function delWare() {
		$arr = $_POST;
		$user = session(C('HOME_SESSION'));
		$saveInfo = M('cart_detail_info') -> where(array('cart_id' => $user, 'ware_id' => $arr['ware_id'])) -> delete();
		if ($saveInfo == FALSE) {
			$result['state'] = false;
			$result['info'] = 'Remove from cart failed';
		} else {
			$result['state'] = true;
			$result['info'] = 'Successfully deleted from cart';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	function changeWareCount() {
		$arr = $_POST;
		$user = session(C('HOME_SESSION'));
		$arr['money'] = (float)$arr['money'];
		$arr['price'] = (float)$arr['price'];
		$saveInfo = M('cart_detail_info') -> where(array('cart_id' => $user, 'ware_id' => $arr['ware_id'])) -> save(array('count' => $arr['count']));
		if ($saveInfo == FALSE) {
			$result['state'] = false;
			$result['info'] = 'Change false';
		} else {
			$cartInfo = M('cart_detail_info') -> where(array('cart_id' => session(C('HOME_SESSION')))) -> select();
			$cart = array_sum(array_column($cartInfo, 'count'));
			$result['state'] = true;
			$result['cart'] = $cart;
			$result['info'] = 'Change successfully';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);

	}

	public function adress() {
		$adressInfo = M('user_address_detail') -> where(array('user_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> find();
		$shipInfo['data'] = M('cart_detail_info as a') -> join('ware_base_info as b on a.ware_id = b.ware_id') -> where(array('a.status' => 'normal', 'b.status' => 'normal', 'cart_id' => session(C('HOME_SESSION')))) -> select();
		$wareInfo = M('cart_detail_info as a') -> join('ware_base_info as b on a.ware_id = b.ware_id') -> where(array('a.status' => 'normal', 'b.status' => 'normal', 'cart_id' => session(C('HOME_SESSION')))) -> field('a.ware_id,a.count,b.price') -> select();
		$shipInfo['total'] = 0;
		foreach ($shipInfo['data'] as $key => $value) {
			$shipInfo['total'] += $value['price'] * $value['count'];
		}
		$total_money = number_format($shipInfo['total'], 2, ".", "");
		$shipInfo['total'] = $total_money;
		$datae = json_encode($wareInfo);
		$this -> assign('data1', $datae);
		$this -> assign('shipInfo', $shipInfo);
		$this -> assign('adressInfo', $adressInfo);
		$this -> display();
	}

	public function verifyCode() {
		$arr = $_POST;
		$isExist = M('discount_base_info') -> where(array('code' => $arr['code'], 'status' => 'normal')) -> find();
		if ($isExist) {
			$result['state'] = true;
			$result['ratio'] = $isExist['ratio'];
			$result['info'] = 'Discount code is valid';
		} else {
			$result['state'] = false;
			$result['info'] = 'Discount code is invalid';
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function createOrder() {
		$arr = $_POST;
		$wareInfo = $arr['wareInfo'];
		$data['first_name'] = $arr['fN'];
		$data['last_name'] = $arr['lN'];
		$data['company'] = $arr['Company'];
		$data['adress'] = $arr['Address'];
		$data['apartment'] = $arr['Apartment'];
		$data['city'] = $arr['City'];
		$data['country'] = $arr['Country'];
		$data['state'] = $arr['State'];
		$data['zip_code'] = $arr['zip_code'];
		$data['phone'] = $arr['Phone'];
		$data['user_id'] = session(C('HOME_SESSION'));
		$data['email'] = M('user_base_info') -> where(array('user_id' => session(C('HOME_SESSION')))) -> getField('email');
		//		$isExitAdress = M('user_address_detail') -> where(array('user_id' => session(C('HOME_SESSION')), 'status' => 'normal')) -> find();
		$adress = M('user_address_detail');
		$adress -> startTrans();
		$flag = true;
		$addAdress = $adress -> add($data);
		if ($addAdress === FALSE)
			$flag = false;
		$order_number = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
		$time = date('Y-m-d H:i:s', time());
		//创建订单
		$order_id = M('order_base_info') -> add(array('user_id' => $data['user_id'], 'order_number' => $order_number, 'time' => $time, 'ware_total' => $arr['ware_total'], 'shipping' => $arr['shipping'], 'discount_code' => $arr['discount_code'], 'discount' => $arr['discount'], 'total' => $arr['total'], 'real_pay' => $arr['real_pay'], 'address_id' => $addAdress, 'status' => 'obligation'));
		if ($order_id === FALSE)
			$flag = false;
		//使折扣码失效
		if ($arr['discount_code'] != null) {
			$isExist = M('discount_base_info') -> where(array('code' => $arr['discount_code'], 'status' => 'normal')) -> find();
			if ($isExist) {
				$code = M('discount_base_info') -> where(array('code' => $arr['discount_code'], 'status' => 'normal')) -> save(array('status' => 'delete'));
				if ($code === FALSE)
					$flag = false;
			}
		}
		$haveWare = true;
		//向订单详情中增加商品信息，并更改商品库存
		foreach ($wareInfo as $key => $value) {
			$order_ware_detail = M('order_ware_detail') -> add(array('order_id' => $order_id, 'id' => $value['ware_id'], 'price' => $value['price'], 'count' => $value['count']));
			if ($order_ware_detail == FALSE)
				$flag = false;
			$count_max = M('ware_base_info') -> where(array('ware_id' => $value['ware_id'], 'status' => 'normal')) -> getField('count_max');
			$count = $count_max - $value['count'];
			if ($count > 0) {
				$changeCount = M('ware_base_info') -> where(array('ware_id' => $value['ware_id'])) -> save(array('count_max' => $count));
				if ($changeCount === FALSE)
					$flag = false;
			} else if ($count == 0) {
				$changeWareInfo = M('ware_base_info') -> where(array('ware_id' => $value['ware_id'])) -> save(array('count_max' => $count, 'status' => 'null'));
				if ($changeWareInfo === FALSE)
					$flag = false;
			} else {
				$haveWare = false;
			}
		}
		//有货的情况下
		if ($haveWare) {
			//将购物车中本次订单中的商品失效
			$ware_ids = array_column($wareInfo, 'ware_id');
			$map['ware_id'] = array('in', $ware_ids);
			$map['cart_id'] = $data['user_id'];
			$cart_detail_info = M('cart_detail_info') -> where($map) -> delete();
			if ($cart_detail_info === FALSE)
				$flag = false;
			if (flag) {
				$adress -> commit();
				$result['state'] = true;
				$result['order_id'] = $order_id;
				$result["msg"] = "Order created successfully";
			} else {
				$adress -> rollback();
				$result['state'] = false;
				$result["msg"] = "Order creation failed";
			}
		} else {
			$adress -> rollback();
			$result['state'] = false;
			$result["msg"] = "Insufficient items to create order";
		}
		echo json_encode($result);
	}

	public function payForOrder() {
		$arr = $_GET;
		$order_id = $arr['order_id'];
		$shipInfo['data'] = M('order_base_info as a') -> join('order_ware_detail as b on a.order_id = b.order_id') -> join('ware_base_info as c on b.id = c.ware_id') -> where(array('a.order_id' => $order_id, 'a.status' => 'obligation', 'b.status' => 'normal')) -> field('b.price,b.count,c.ware_id,c.name,c.picture') -> select();
		$shipInfo['order'] = M('order_base_info') -> where(array('order_id' => $order_id, 'status' => 'obligation')) -> find();
		$adressInfo = M('user_address_detail') -> where(array('address_id' => $shipInfo['order']['address_id'])) -> find();
		$this -> assign('shipInfo', $shipInfo);
		$shipTo = $adressInfo['adress'] . ', ' . $adressInfo['apartment'] . ', ' . $adressInfo['city'] . ', ' . $adressInfo['state'] . ', ' . $adressInfo['zip_code'] . ', ' . $adressInfo['country'];
		$contactInfo = $adressInfo['last_name'] . ' ' . $adressInfo['first_name'] . ' ( ' . $adressInfo['email'] . ' )';
		$this -> assign('shipTo', $shipTo);
		$this -> assign('adressInfo', $adressInfo);
		$this -> assign('contactInfo', $contactInfo);
		$this -> assign('order_id', $order_id);
		$this -> display();
	}

	public function payNow() {
		$arr = $_POST;
		$order_base_info = M('order_base_info') -> where(array('order_id' => $arr['order_id'], 'status' => 'obligation')) -> save(array('status' => 'payed'));
		if ($order_base_info === FALSE) {
			$result['state'] = false;
			$result['info'] = 'payment failed';
		} else {
			$result['state'] = true;
			$result['info'] = 'Payment successful';
		}
		echo json_encode($result);
	}
	public function contactUs(){
    	   $management_base_info = M('management_base_info') -> where(array('status' => 'normal')) -> find();
       $this -> assign('data',$management_base_info);
	   $this -> display();
    }

}
?>