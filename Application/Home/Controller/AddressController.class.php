<?php
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class AddressController extends BaseController{
	
	public function _initialize(){
		parent::_initialize();
	}

	public function inputarea(){
		$city = empty($_GET['city']) ? "北京":$_GET['city'];
		$line = empty($_GET['line']) ? "":$_GET['line'];
		$this -> assign("city",$city);
		$this -> assign("line",$line);
		$this -> display();
	}

	public function location(){
		$line = empty($_GET['line']) ? "":$_GET['line'];
		$this -> assign("line",$line);
		$this -> display();
	}

	public function index(){
		$type = $_GET['type'];
		$address = D("Address");
		$user = session("userid");
		if (empty($type) || ($type != "1")) {
			//送货上门
			$where['fromuser'] = array( 'eq' , $user);
			$cityarr = $address -> field("id,name,tel,city,detailadd") -> where($where) -> select();
			$this -> assign( 'cityarr' , $cityarr );
		}
		if (empty($type) || ($type != "2")) {

			$shop = D("Shopadd")->select();
			$this -> assign("shop" ,$shop);
		}
		$useradd = D("User") -> field('address') -> where(array('id' => $user)) -> select();
		$this -> assign( "useradd" , $useradd[0]['address'] );
		$this -> display();
	}
	
	public function addAddress(){
		if(empty($_POST['name'])){
			$this -> ajaxReturn("error");
			exit();
		}
		$userid = session("userid");
		$data = array(
				"name" => $_POST['name'],
				"sex" => $_POST['sex'],
				"tel" => $_POST['tel'],
				"provice" => $_POST['provice'],
				"city" => $_POST['city'],
				"detailadd" => $_POST['detailadd'],
				"numhouse" => $_POST['numhouse'],
				"label" => $_POST['label'],
				"fromuser" => $userid
			);
		$res = D("Address")->add($data);
		if (!empty($res)) {
			$touseradd = array('id'=>$userid);
			$user = D("User");
			$address = $user -> field('address') ->where( $touseradd ) -> select();
			if (empty($address[0]['address'])) {
				$touseradd['address'] = $res;
				$user -> save( $touseradd );
			}
			$this -> ajaxReturn($res);
		}else{
			$this -> ajaxReturn("error");
		}
	}

}
