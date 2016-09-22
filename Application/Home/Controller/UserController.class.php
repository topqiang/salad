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
			$data = array('tel' => $phone,'create_time' => time());
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


	public function self(){
		A('Base');
		$userid = session("userid");
		$where['id'] = $userid;
		$user = $this->user->where( $where )->select();
		$this -> assign('user' ,$user[0]);
		$this -> display();
	}

	public function setself(){
		A('Base');
		$userid = session("userid");
		$where['id'] = $userid;
		$user = $this->user->where( $where )->select();
		$this -> assign('user' ,$user[0]);
		$this -> display();
	}

	public function updaddress(){
		$addid = $_POST['id'];
		$userid = session("userid");
		$delivertype = $_POST['delivertype'];
		$data = array('id' => $userid ,'address' => $addid , 'delivertype' => $delivertype);
		$res = $this -> user -> save ( $data );
		if (!empty($res)) {
			$this -> ajaxReturn("设置成功！");
		}else{
			$this -> ajaxReturn("error");
		}
	}

	public function loginout(){
		session(null);
		redirect(U('User/index'));
	}
}