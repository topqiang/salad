<?php
namespace Admin\Controller;
use Think\Controller;
class RateController extends Controller{
	public function _initialize(){
		$this -> rate = M('Urate');
	}
	public function ratelist(){
		$name = $_POST['uname'];
		$gname = $_POST['gname'];
		if (!empty($name)) {
			$where['name'] = array("like","%$name%");
		}
		if (!empty($gname)) {
			$where['gname'] = array("like","%$gname%");
		}
		$count = $this -> rate -> where($where)->count();
		$page = new \Think\Page($count,15);
		$ratelist = $this -> rate -> where($where)-> limit($page->firstRow,$page->listRows) -> select();
		$this -> assign('page',$page->show());
		$this -> assign('ratelist',$ratelist);
		$this -> display("Goods/rate");
	}

	public function updrate(){
		$id = $_GET['id'];
		$status = $_GET['status'];
		$data = array(
			'id' => $id,
			'status' => $status
			);
		M('Rate') -> save($data);
		$this -> redirect("Rate/ratelist");
	}
}