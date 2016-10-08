<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
	public function _initialize(){
		
	}
	public function userlist(){
		$count = D('Useradd') -> where($where)->count();
		$page = new \Think\Page($count,15);
		$userlist = D('Useradd')->limit($page->firstRow,$page->listRows) -> select();
		$this -> assign('userlist',$userlist);
		$this -> assign('page',$page->show());
		$this -> display();
	}
}