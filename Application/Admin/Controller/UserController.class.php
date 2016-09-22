<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
	public function _initialize(){
		
	}

	public function userlist(){
		$userlist = D('User') -> select();
		$this -> assign('userlist',$userlist);
		$this -> display();
	}
}