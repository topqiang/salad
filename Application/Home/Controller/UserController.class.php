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

	public function register(){
		$tel = $_POST['tel'];
		$pwd = $_POST['pwd'];
		$repwd = $_POST['repwd'];
		if (!isset($tel)) {
			$this -> display();
			exit();
		}
		if ($tel != ""  && $pwd == $repwd) {
			$where['tel'] = array('eq',$tel);
			$res = M('User') -> field('tel') -> where( $where ) -> select();
			if (count($res) == 1) {
				$this -> ajaxReturn("用户已存在");
			}else{
				$data = array('tel' => $tel ,'pwd' => md5($pwd),'create_time' => time());
				$result = M('User') -> add($data);
				if (isset($result)) {
					session("userid",$result);
					$this -> ajaxReturn("success");
				}
			}
		}else{
			$this -> ajaxReturn("信息填写有误");
		}
	}

	public function checkhas(){
		$tel = $_POST['tel'];
		$where['tel'] = array('eq',$tel);
		$res = M('User') -> field('tel') -> where( $where ) -> select();
		if (count($res) == 1) {
			$this -> ajaxReturn("success");
		}else{
			$this -> ajaxReturn("next");
		}
	}

	public function recharge(){
		A('Base');
		$this -> display();
	}
	public function about(){
		
		$this -> display();
	}
	public function msg(){
		A('Base');
		$this -> display();
	}
	public function balance(){
		A('Base');
		$this -> display();
	}

	public function login(){
		$phone = $_POST['mobile'];
		$pwd = $_POST['pwd'];
		$where['tel'] = array('eq', $phone);
		$res = D('User')->where($where)->select();
		if (isset($res)) {
			if ($res[0]['pwd'] == md5( $pwd )) {
				session("userid",$res[0]['id']);
				$msg = "success";
			}else{
				$msg = '密码不正确';
			}
		}else{
			$msg = '用户不存在';	
		}
		$this->ajaxReturn($msg);
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
		$oid = session("oid");
		if (isset($oid)) {
			$addid = $_POST['id'];
			$addinfo = D('Address') -> where("id = $addid") -> select();
			$detailadd = $addinfo[0]['detailadd'].$addinfo[0]['numhouse'];
			$delivertype = $_POST['delivertype'];
			$order = array(
				"id" => $oid,
				"address" => $addid,
				"detailadd" => $detailadd,
				"delivertype" => $delivertype
				);
			$res = M('Order') -> save($order);
			if (isset($res)) {
				session("oid",null);
				$this -> ajaxReturn(json_encode(array('oid' => $oid)));
			}else{
				$this -> ajaxReturn("error");
			}
		}else{
			$addid = $_POST['id'];
			$userid = session("userid");
			$delivertype = $_POST['delivertype'];
			$data = array('id' => $userid ,'address' => $addid , 'delivertype' => $delivertype);
			$res = $this -> user -> save ( $data );
			if (!empty($res)) {
				$this -> ajaxReturn("success");
			}else{
				$this -> ajaxReturn("error");
			}
		}
	}

	public function loginout(){
		session(null);
		redirect(U('User/index'));
	}
}