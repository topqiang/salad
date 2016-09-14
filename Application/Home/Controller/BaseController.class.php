<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function _initialize(){
		$user = session("userid");
		if (!isset($user)) {
			$this -> display("User/login");
			exit();
		}else{
			$where['fromuser']=array('eq',$user);
			$res = D('Gley')->where($where)->select();
			$this->count = count($res);
			$this->assign('count', $this->count );
		}
	}
}