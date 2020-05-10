<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function contactUs(){
    	   $management_base_info = M('management_base_info') -> where(array('status' => 'normal')) -> find();
       $this -> assign('data',$management_base_info);
	   $this -> display();
    }
}