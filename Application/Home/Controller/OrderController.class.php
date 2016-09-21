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
		$name = $fromuser.date("YmdHis").rand(10000,99999);
		$Order = D("Order");
		$address = D("User") -> field('address') -> where( array('id'=>$fromuser) ) -> select();
		if (!empty($goods)) {
			//查询当前物流方式以及地址
			$order = array(
				"name" => $name,
				"fromuser" => $fromuser,
				"create_time" =>time(),
				"update_time" =>time(),
				"price" => 0,
				"type" => 0,
				"delivertype" => 1,//session判断物流方式
				"address" => $address[0]['address']
				);
			$res = $Order -> add($order);
			if (!empty($res)) {
				$orobj = D("Orgo");
				$Gley = D("Gley");
				$price = 0;
				foreach ($goods as $key => $good) {
					$orgo = array(
						"gid" => $good['gid'],
						"gprice" => $good['gprice'],
						"gnum" => $good['gnum'],
						"oid" => $res
						);
					$result = $orobj -> add($orgo);
					if (!empty($result)) {
						$price += $good['gprice'];
						$Gley -> delete($good['glid']);
					}else{
						$this -> ajaxReturn("添加".$good['gid']."商品失败！");
						exit();
					}
				}
				$addprice = array('id'=>$res,'price',$price);
				$flag = $Order -> save($addprice);
				if ( isset($flag) ) {
					$ajax = array('status'=>'success','id'=>$res);
					$this -> ajaxReturn(json_encode($ajax));
				}else{
					$this -> ajaxReturn("商品总价统计失败！");
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
		$where[ 'type' ] = array( 'neq' , 9 );
		$ordadd = D("Ordadd");
		$orgood = D("Orgood");
		$ordinfo = $ordadd -> field("oid,addname,type,price,delivertype") -> where($where) -> select();
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
}
