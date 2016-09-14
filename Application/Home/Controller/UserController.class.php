<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	public function _initialize(){
		$this->user=D('User');
	}
	public function index(){
		$this->display("login");
	}
	public function login(){
		$phone = $_POST['mobile'];
		$code = $_POST['code'];
		$where['tel'] = array('eq', $phone);
		$res = D('User')->where($where)->select();
		if (isset($res)) {
			session("userid",$res[0]['id']);
			$msg = '登陆成功';
		}else{
			$data = array('tel' => $phone,);
			$res = D('User')->add($data);
			if (isset($res)) {
				session("userid",$res);
				$msg = '保存登陆成功！';
			}else{
				$msg = '登陆失败';	
			}
		}
		$this->ajaxReturn($msg.session('userid'));
	}
	public function loginout(){
		session(null);
	}
}