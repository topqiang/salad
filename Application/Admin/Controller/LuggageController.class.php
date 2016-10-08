<?php
namespace Admin\Controller;
use Think\Controller;
class LuggageController extends Controller{
	public function _initialize(){
		$this -> luggage = M('Luggage');
	}
	public function index(){
		$where['status'] = array('neq',9);
		$res = $this -> luggage -> where($where) -> select();
		$this -> assign('luggage',$res[0]);
		$this -> display();
	}
	public function updluggage(){
		$price = $_POST['price'];
		$man = $_POST['man'];
		$price = empty($price) ? 0 : $price;
		$man = empty($man) ? 0 : $man;
		$data = array(
			'id' => 1,
			'price' => $price,
			'man' => $man
			);
		$res = $this -> luggage -> save($data);
		if (isset($res)) {
			$this -> assign('luggage',$data);
			$this -> display('index');
		}else{
			$this -> redirect('Luggage/index');
		}
	}
}