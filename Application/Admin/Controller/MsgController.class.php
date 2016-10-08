<?php
namespace Admin\Controller;
use Think\Controller;
class MsgController extends Controller{
	public function _initialize(){
		$this -> msg = M('Msg');
	}
	public function index(){
		$where['status'] = array('neq','9');
		if ($_POST['id']) {
			$where['id'] = array('eq',$_POST['id']);
		}
		$count = $this -> msg -> where($where) -> count();
		$page = new \Think\Page($count,15);
		$res = $this -> msg -> where( $where ) -> limit( $page->firstRow , $page->listRows ) -> select();
		$this -> assign("list",$res);
		$this -> assign("page",$page->show());
		$this -> display();
	}
	public function msgupd(){
		if (isset( $_GET['id'] )) {
			$where['id'] = $_GET['id'];
			$cou = $this -> msg -> where($where) -> select();
			$this -> assign('msg',$cou[0]);
			$this -> display();
		}else if ($_POST['id']) {
			$msg = $_POST['msg'];
			$data = array(
				'id' => $_POST['id'],
				'msg' => $msg,
				'star_time' => "",
				'end_time' => ""
				);
			$res = $this -> msg -> save($data);
			if (isset($res)) {
				$this -> success("修改成功！",U("Msg/index"));
			}else{
				$this -> error("修改失败！",U("Msg/index"));
			}
		}
	}
	public function msgadd(){
		if (!empty($_POST['msg'])) {
			$msg = $_POST['msg'];
			$data = array(
				'msg' => $msg,
				'star_time' => "",
				'end_time' => ""
				);
			$res = $this -> msg -> add($data);
			if (isset($res)) {
				$this -> success("添加成功！",U("Msg/index"));
			}else{
				$this -> error("添加失败！",U("Msg/index"));
			}
		}else{
			$this -> display();
		}
	}
	public function msgdel(){
		if (!empty($_GET['id'])) {
			$data = array(
				'id' => $_GET['id'],
				'status' => '9'
				);
			$res = $this -> msg -> save($data);
			if (isset($res)) {
				$this -> success("删除成功！",U("Msg/index"));
			}else{
				$this -> error("删除失败！",U("Msg/index"));
			}
		}
	}
}