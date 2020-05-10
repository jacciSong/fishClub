<?php
namespace Admin\Controller;
use Think\Controller;
class MainController extends IndexController {
	
	public function index() {
		$this -> display();
	}
	
	public function welcome()
	{
		$this -> display();
	}
	

}
?>