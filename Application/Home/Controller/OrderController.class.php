<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Class OrderController
 * @package Home\Controller
 */
class OrderController extends BaseController{
	public function _initialize(){
		parent::_initialize();
	}
	public function addorder(){
		$goods = $_POST['goods'];
		$fromuser = session("userid");
		$delivertype = isset($delivertype) ? $delivertype : 1;
		$name = $fromuser.date("YmdHis").rand(10000,99999);
		$Order = D("Order");
		$address = D("User") -> field('address,delivertype') -> where( array('id'=>$fromuser) ) -> select();
		$delivertype = $address[0]['delivertype'];
		$flag =false;
		$price = 0;
		foreach ($goods as $key => $good) {
			$price += ($good['gprice'] * $good['gnum']);
		}
		if (!empty($goods)) {
			//查询当前物流方式以及地址
			$Order->startTrans();
			$order = array(
				"name" => $name,
				"fromuser" => $fromuser,
				"create_time" =>time(),
				"update_time" =>time(),
				"price" => $price,
				"type" => 0,
				"delivertype" => $delivertype,
				"address" => $address[0]['address']
				);
			if ($delivertype == 0) {
				$getcode = rand(10000,99999);
				$order['getcode'] = $getcode;
			}
			$res = $Order -> add($order);
			if (!empty($res)) {
				$orobj = D("Orgo");
				$Gley = D("Gley");
				$price = 0;
				foreach ($goods as $key => $good) {
					$orgo[$key] = array(
						"gid" => $good['gid'],
						"gprice" => $good['gprice'],
						"gnum" => $good['gnum'],
						"oid" => $res
						);
					$Gley -> delete($good['glid']);
				}
				$result = $orobj -> addAll($orgo);
				if (!empty($result)) {
					$flag = true;
					$ajax = array('status'=>'success','id'=>$res);
					if ( $flag ) {
						$Order -> commit();
					}else{
						$Order -> rollback();
					}
					$this -> ajaxReturn(json_encode($ajax));
				}else{
					$this -> ajaxReturn("添加".$good['gid']."商品失败！");
				}
			}else{
				$this -> ajaxReturn("订单生成失败！");
			}
		}else{
			$this -> ajaxReturn("商品数量为空！");
		}
	}
	/**
	*
	*
	*/
	public function updorder(){
		$order = $_POST['order'];
		if ( isset($order) ) {
			$ord = D("Order");
			$res = $ord -> save( $order );
			if ( isset( $res ) ) {
				$this -> ajaxReturn( $res );
			}else{
				$this -> ajaxReturn( "error" );
			}
		}
	}


	public function orderinfo(){
		$id = $_GET['id'];
		$where['oid'] = array('eq',$id);
		$ordadd = D("Ordadd");
		$orgood = D("Orgood");
		$ordinfo = $ordadd -> where($where) -> select();
		$goods = $orgood -> where($where) -> select();
		$this -> assign("goods" , $goods);
		$this -> assign("ordinfo",$ordinfo[0]);
		if ($ordinfo[0]['type'] == 0) {
			$this -> display();
		}else{
			$this -> display("orderinfo2");
		}
		
	}


	public function orderlist(){
		$where[ 'fromuser' ] = session("userid");
		$ordadd = D("Ordadd");
		$orgood = D("Orgood");
		$ordinfo = $ordadd -> field("oid,addname,ordname,type,price,delivertype") -> where($where) -> select();
		foreach ($ordinfo as $key => $order) {
			$good[ 'oid' ] = $order[ 'oid' ];
			$goods = $orgood -> field('gid,name,gnum,gprice') -> where( $good ) -> select();
			 $ordinfo[ $key ][ 'gsnum' ] = $orgood -> where( $good ) -> sum('gnum');
			// $ordinfo[ $key ][ 'gsnum' ] = count($goods); 
			$ordinfo[ $key ][ 'goods' ] = $goods;
		}
		$this -> assign("ordinfo", $ordinfo);
		$this -> display();
	}

	public function fobygood(){
		$key = $_POST['key'];
		$user = session("userid");
		$ordadd = D("Ordadd");
		$orgood = D("Orgood");
		$oid = $orgood -> distinct("oid") -> field("oid") -> where(array("name" => array("like","%$key%"), "uid" => $user )) -> select();
		foreach ($oid as $key => $order) {
			$newoid[$key] = $order['oid'];
		}
		$where['oid'] = array( 'in' , $newoid);
		$ordinfo = $ordadd -> field("oid,addname,ordname,type,price,delivertype") -> where($where) -> select();
		foreach ($ordinfo as $key => $order) {
			$good[ 'oid' ] = $order[ 'oid' ];
			$goods = $orgood -> field('gid,name,gnum,gprice') -> where( $good ) -> select();
			 $ordinfo[ $key ][ 'gsnum' ] = $orgood -> where( $good ) -> sum('gnum');
			// $ordinfo[ $key ][ 'gsnum' ] = count($goods); 
			$ordinfo[ $key ][ 'goods' ] = $goods;
		}
		$this -> assign("ordinfo", $ordinfo);
		$this -> display("orderlist");
	}
}
