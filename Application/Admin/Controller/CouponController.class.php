<?php
namespace Admin\Controller;
use Think\Controller;
class CouponController extends Controller{
	public function _initialize(){
		$this -> coupon = M('Coupon');
	}
	public function index(){
		$where['status'] = array('neq','9');
		if ($_POST['id']) {
			$where['id'] = array('eq',$_POST['id']);
		}
		if ($_POST['type'] && $_POST['type'] != "99") {
			$where['type'] = array('eq',$_POST['type']);
		}
		$count = $this -> coupon -> where($where) -> count();
		$page = new \Think\Page($count,15);
		$res = $this -> coupon -> where( $where ) -> limit( $page->firstRow , $page->listRows ) -> select();
		$this -> assign("list",$res);
		$this -> assign("page",$page->show());
		$this -> display();
	}
	public function couponupd(){
		if (isset( $_GET['id'] )) {
			$where['id'] = $_GET['id'];
			$cou = $this -> coupon -> where($where) -> select();
			$this -> assign('coupon',$cou[0]);
			$this -> display();
		}else if ($_POST['id']) {
			$type = $_POST['type'];
			$data = array(
				'id' => $_POST['id'],
				'type' => $type,
				'startime' => $_POST['startime'],
				'endtime' => $_POST['endtime'],
				'num' => $_POST['num']
				);
			if ( $type ==1 ) {
				$data['man'] = $_POST['man'];
				$data['jian'] = $_POST['jian'];
				$data['miane'] = "";
				$data['zhe'] = "";
			}else if ( $type ==2 ) {
				$data['zhe'] = $_POST['zhe'];
				$data['man'] = "";
				$data['jian'] = "";
				$data['miane'] = "";
			}elseif ( $type ==3 ) {
				$data['miane'] = $_POST['miane'];
				$data['man'] = "";
				$data['jian'] = "";
				$data['zhe'] = "";
			}
			$res = $this -> coupon -> save($data);
			if (isset($res)) {
				$this -> success("修改成功！",U("Coupon/index"));
			}else{
				$this -> error("修改失败！",U("Coupon/index"));
			}
		}
	}
	public function couponadd(){
		if (!empty($_POST['type'])) {
			$type = $_POST['type'];
			$data = array(
				'type' => $type,
				'startime' => $_POST['startime'],
				'endtime' => $_POST['endtime'],
				'num' => $_POST['num']
				);
			if ( $type ==1 ) {
				$data['man'] = $_POST['man'];
				$data['jian'] = $_POST['jian'];
			}else if ( $type ==2 ) {
				$data['zhe'] = $_POST['zhe'];
			}elseif ( $type ==3 ) {
				$data['miane'] = $_POST['miane'];
			}
			$res = $this -> coupon -> add($data);
			if (isset($res)) {
				$this -> success("添加成功！",U("Coupon/index"));
			}else{
				$this -> error("添加失败！",U("Coupon/index"));
			}
		}else{
			$this -> display();
		}
	}
	public function coupondel(){
		if (!empty($_GET['id'])) {
			$data = array(
				'id' => $_GET['id'],
				'status' => '9'
				);
			$res = $this -> coupon -> save($data);
			if (isset($res)) {
				$this -> success("删除成功！",U("Coupon/index"));
			}else{
				$this -> error("删除失败！",U("Coupon/index"));
			}
		}
	}

	public function toUser(){
		$couid = $_POST['couid'];
		$uid = $_POST['uid'];
		if (isset($couid) && isset($uid)) {
			$where['couid'] = $couid;
			$where['uid'] = $uid;
			$usercou = M('Usercou');
			$num = $usercou -> where($where) -> limit(1) -> select();
			if (empty($num)) {
				$couobj = M('Coupon');
				$coupon = $couobj -> field('num') -> where( array( 'id' => array( 'eq' , $couid ) ) ) -> select();
				if ($coupon[0]['num'] > 0) {
					$res = $usercou -> add( $where );
					if (!empty($res)) {
						$res = $couobj -> save(array('id' =>$couid ,'num'=>$coupon[0]['num']-1));
						$this -> ajaxReturn(json_encode(array('status'=>1,'code'=>'发放完成！')));
					}else{
						$this -> ajaxReturn(json_encode(array('status'=>2,'code'=>'发放失败！')));
					}
				}else{
					$this -> ajaxReturn(json_encode(array('status'=>1,'code'=>'数量不足！')));
				}
			}else{
				$this -> ajaxReturn(json_encode(array('status'=>'error','code'=>'已发放！')));
			}
		}
	}
}