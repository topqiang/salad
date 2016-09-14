<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Class RoomOrderController
 * @package Admin\Controller
 */
class RoomOrderController extends AdminBasicController{
	public $basic;
	public function _initialize(){
		parent::checkAuth('RoomOrder');
		$this->basic=D('Basic');
	}

	public function orderList(){
		//搜索
		$where='';
		if(!empty($_POST['id']))$where['id']=$_POST['id'];
		if(!empty($_POST['rid']))$where['rid']=$_POST['rid'];
		if(!empty($_POST['tel']))$where['tel']=$_POST['tel'];
		if(!empty($_POST['name']))$where['name']=array('like','%'.$_POST['name'].'%');
		if(!empty($_POST['room'])){
			$room_list=$this->basic->basicList('Room',array('name'=>array('LIKE','%'.$_POST['room'].'%')));
			foreach($room_list as $k=>$v){
				if($k==0){
					$id_char=$v['rid'];
				}else{
					$id_char=$id_char.','.$v['rid'];
				}
			}
			$where['rid']=array('in',$id_char);
		}
		
		//获得数据列表
		$res=$this->basic->basicList('Room_order',$where,15);
		//中间数据处理
		$obj=D('Room');
		foreach($res['list'] as $k=>$v){
			$res['list'][$k]['room']=$obj->where(array('rid'=>$v['rid']))->getField('name');
		}
		$this->assign('list',$res['list']);
		$this->assign('page',$res['page']);
		$this->display('orderList');
	}
	
	public function oldList(){
		//搜索
		$where['status']=9;
		if(!empty($_POST['id']))$where['id']=$_POST['id'];
		if(!empty($_POST['rid']))$where['rid']=$_POST['rid'];
		if(!empty($_POST['tel']))$where['tel']=$_POST['tel'];
		if(!empty($_POST['name']))$where['name']=array('like','%'.$_POST['name'].'%');
		if(!empty($_POST['room'])){
			$room_list=$this->basic->basicList('Room',array('name'=>array('LIKE','%'.$_POST['room'].'%')));
			foreach($room_list as $k=>$v){
				if($k==0){
					$id_char=$v['rid'];
				}else{
					$id_char=$id_char.','.$v['rid'];
				}
			}
			$where['rid']=array('in',$id_char);
		}

		//获得数据列表
		$res=$this->basic->basicList('Room_order',$where,15);
		//中间数据处理
		$obj=D('Room');
		foreach($res['list'] as $k=>$v){
			$res['list'][$k]['room']=$obj->where(array('rid'=>$v['rid']))->getField('name');
		}
		$this->assign('list',$res['list']);
		$this->assign('page',$res['page']);
		$this->display('oldList');
	}

	public function orderSet(){
		if(empty($_GET['id']))$this->error('没有预定号');
		$res=$this->basic->basicDel('RoomOrder',array('id'=>$_GET['id']));
		if($res){
			$this->success('处理成功',U('RoomOrder/orderList'));
		}else{
			$this->error('处理失败');
		}
	}

	/**---------本类公共方法---------**/
}
