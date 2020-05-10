<?php
namespace Admin\Controller;
use Think\Controller;
class OrderInformationController extends MainController {
	//申请管理
	public function contactIndex() {
		$this -> display();
	}

	//申请管理获取数据
	public function orderInfoDatatable() {
		$arr = $_GET;
		$keyes = $arr['key'];
		$page = (isset($arr['page'])) ? intval($arr['page']) : 1;
		$rows = (isset($arr['limit'])) ? intval($arr['limit']) : 10;
		$offset = ($page - 1) * $rows;
		if (!empty($keyes['search'])) {
			$where['b.email'] = array('like', '%' . $keyes['search'] . '%');
		}
		if (!empty($keyes['status'])) {
			$where['a.status'] = $keyes['status'];
		} else {
			$where['a.status'] = 'obligation';
		}
		$where['b.status'] = 'normal';
		$order_base_info = M('order_base_info as a') -> join('user_address_detail as b on a.address_id = b.address_id') -> field('b.user_id, b.first_name, b.last_name, b.company, b.adress,b.apartment,b.city,b.country,b.state,b.zip_code,b.email,b.phone,a.order_id,a.order_number,a.time,a.real_pay,a.address_id,a.status') -> where($where) -> limit($offset, $rows) -> order('a.time desc') -> select();
		$variable = M('order_base_info as a') -> join('user_address_detail as b on a.address_id = b.address_id') -> where($where) -> select();

		foreach ($order_base_info as $key => $value) {
			$order_base_info[$key]['Address'] = $value['adress'] . ', ' . $value['apartment'] . ', ' . $value['city'] . ', ' . $value['state'] . ', ' . $value['zip_code'] . ', ' . $value['country'];
			$order_base_info[$key]['name'] = $value['last_name'] . ' ' . $value['first_name'];
		}
		$result['code'] = 0;
		$result['msg'] = "";
		$result['count'] = count($variable);
		$result['data'] = $order_base_info ? $order_base_info : array();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function detail() {
		$arr = $_GET;
		$order_info = M('order_base_info as a') 
		            ->join('user_address_detail as b on a.address_id = b.address_id')
		            ->where(array('a.order_id' => $arr['order_id']))->find();
	    $wareInfo = M('order_ware_detail as a')
		          ->join('ware_base_info as b on a.id = b.ware_id')
				  ->where(array('a.order_id' => $arr['order_id']))
				  ->field('a.price,a.count,b.name,b.picture')
				  ->select();
	  $order_info['ware_info'] = $wareInfo;
	  $order_info['address_str'] = $order_info['adress'] . ', ' . $order_info['apartment'] . ', ' . $order_info['city'] . ', ' . $order_info['state'] . ', ' . $order_info['zip_code'] . ', ' . $order_info['country'];
	  $order_info['name'] = $order_info['last_name'].' '.$order_info['first_name'];
	  $order_info['flag'] = $arr['flag'];
	  $this -> assign('data',$order_info);
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
    public function todelivery(){
      	$arr = $_POST;
	    $oder_id = $arr['order_id'];
		$order_base_info = M('order_base_info') -> where(array('order_id' => $oder_id)) -> save(array('status' => 'completed'));
		if($order_base_info !== FALSE){
			$result['state'] = true;
		    $result['info'] = "Delivery successfully";
		}else{
			$result['state'] = false;
		    $result['info'] = "Delivery failed";
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

}
?>