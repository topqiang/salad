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
			$where['glfromuser'] = array('eq',$user);
			$res = 0;
			$price = D('Gleygood') -> where($where) -> field("goodnum,gprice")->select();
			$totalprice = 0;
			foreach ($price as $key => $obj) {
				$res += $obj['goodnum'];
				$totalprice += $obj['goodnum'] * $obj['gprice'];
			}
			$this -> assign('count', $res );
			$this -> assign('totalprice', $totalprice );
		}
	}
}