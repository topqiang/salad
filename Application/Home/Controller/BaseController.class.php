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
			$res = D('Gleygood')->where($where)->sum("goodnum");
			$price = D('Gleygood')->where($where)->field("goodnum,gprice")->select();
			$totalprice = 0;
			foreach ($price as $key => $obj) {
				$totalprice += $obj['goodnum'] * $obj['gprice'];
			}
			$this->assign('count', $res );
			$this->assign('totalprice', $totalprice );
		}
	}
}