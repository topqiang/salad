<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends BaseController{
	public function _initialize(){
		parent::_initialize();
	}
	public function goodsAdd(){
		// $goods = $_POST['goods'];
		// dump($goods);
		// exit();
		$name = $_POST['name'];
		$foods = $_POST['foods'];
		$pic = 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg';
		$price = 48;
		$cate_id = 5;
		// echo($foods[0]['foodsname']);
		// exit();
		switch ($name) {
			case 'big':
				$name = "自选沙拉大份";
				break;
			case 'small':
				$name = "自选沙拉小份";
				$price = 38;
				$cate_id = 6;
				break;
			case 'free':
				$name = "自选卷";
				$pic = "Uploads/goods/201609/efc3527e79264b90aa657037f19780e1.jpg";
				$price = 25;
				$cate_id = 7;
				break;
			default:
				$name = "自选沙拉大份";
				break;
		}
		$constituent = '';
		foreach ($foods as $key => $obj) {
			$constituent .= $obj['foodsname'].'X'.$obj['num'].'份    ';
		}
		$data=array(
				'name'			=>	$name,
				'cate_id'		=>	$cate_id,
				'constituent'	=>	$constituent,
				'pic'			=>	$pic,
				'price'			=>	$price,
				'create_time'	=>	time(),
				'update_time'	=>	time(),
				'remark'		=>	"diy",
				'status'		=>	0,
			);
		$goodid = D('Goods')->add($data);
		$userid = session("userid");
		$data = array('goods' => $goodid, 'fromuser' => $userid);
		$res = D("Gley")->add($data);
		if (isset($res)) {
			$this->ajaxReturn($res);
		}else{
			$this->ajaxReturn("error");
		}
	}


	public function gley(){
		if ($this->count > 0 ) {
			$userid = session('userid');
			$where['glfromuser'] = array('eq',$userid);
			$res = D("Gleygood")->where($where)->select();
			$this->assign('goods',$res);
		}
		$this->display();
	}

	public function updHub(){
		$clum = $_POST['clum'];
		$hid = $_POST['hid'];
		$fid = $_POST['fid'];
		$zhi = $_POST['zhi'];
		$data[$clum] = $zhi;
		if ($clum == "well") {
			$data["bad"] = 0;
		}else{
			$data["well"] = 0;
		}
		if (isset($hid) && !empty($hid)) {
			$data['id'] = $hid;
			$res = D("Hub")->save($data);
			$this->ajaxReturn("success");
		}else{
			$data['uid'] = session("userid");
			$data['fid'] = $fid;
			$res = D("Hub")->add($data);
			$this->ajaxReturn($res);
		}
	}

	public function rangood(){
		$foodcate = D( "Foodcate" );
    	$where['cname'] = array( 'eq' , '酱料' );
    	$list = $foodcate -> field( "fid,fpic,fname" ) -> where( $where ) -> select();
    	$this -> assign( 'list' , $list );
		$this->display();
	}
}