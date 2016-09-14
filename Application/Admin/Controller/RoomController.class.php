<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Class RoomController
 * @package Admin\Controller
 */
class RoomController extends AdminBasicController{
	public $basic;
	public function _initialize(){
		parent::checkAuth('Room');
		$this->basic=D('Basic');
	}

	public function roomList(){
		//搜索
		$where='';
		if(!empty($_POST['rid']))$where['rid']=$_POST['rid'];
		if(!empty($_POST['name']))$where['name']=array('like','%'.$_POST['name'].'%');
		if(!empty($_POST['num']))$where['num']=$_POST['num'];
		//if($_POST['status']!=99 and isset($_POST['status']))$where['status']=$_POST['status'];
		//获得数据列表
		$res=$this->basic->basicList('Room',$where,15);
		$this->assign('list',$res['list']);
		$this->assign('page',$res['page']);
		$this->display('roomList');
	}
	public function roomAdd(){
		if(empty($_POST)){
			$this->display('roomAdd');
		}else{
			$this->checkData();
			$upload_res=$this->upload();
			if($upload_res['flag']=='no')$this->error('没有包间图片');
			
			//存储数据
			$data=array(
				'name'	=>$_POST['name'],
				'num'	=>$_POST['num'],
				'detail'=>$_POST['detail'],
				'pic'	=>$upload_res['result'],
				'ctime'	=>time(),
				'status'=>0,
			);

			$res=$this->basic->basicAdd('Room',$data);
			if($res){
				$this->success('添加成功',U('Room/roomList'));
			}else{
				$this->error('添加失败');
			}
		}
	}
	public function roomEdit(){
		if(empty($_GET['rid']))$this->error('没有包间id');
		if(empty($_POST)){
			$this->assign('rid',$_GET['rid']);
			$info=$this->basic->basicInfo('Room',array('rid'=>$_GET['rid']));
			$this->assign('info',$info);
			$this->display('roomEdit');
		}else{
			$this->checkData();
			$upload_res=$this->upload();
			
			//存储数据
			$data=array(
				'name'	=>$_POST['name'],
				'num'	=>$_POST['num'],
				'detail'=>$_POST['detail'],
			);
			if($upload_res['flag']=='success')$data['pic']=$upload_res['result'];
			$res=$this->basic->basicSave('Room',array('rid'=>$_GET['rid']),$data);
			if($res){
				$this->success('修改成功',U('Room/roomList'));
			}else{
				$this->error('修改失败');
			}
		}
	}
	public function roomDel(){
		if(empty($_GET['rid']))$this->error('没有包间id');
		$res=$this->basic->basicDel('Room',array('rid'=>$_GET['rid']));
		if($res){
			$this->success('删除成功',U('Room/roomList'));
		}else{
			$this->error('删除失败');
		}
	}

	/**---------本类公共方法---------**/

	/**
	 * 检查表单数据
	 */
	public function checkData(){
		if(empty($_POST['name']))$this->error('包间名称不能为空');
		if(empty($_POST['num']))$this->error('容纳人数不能为空');
		if(empty($_POST['detail']))$this->error('包间介绍不能为空');
	}

	/**
	 * 处理图片上传
	 */
	public function upload(){
		if(empty($_FILES['pic']['name'])){
			$is_upload=false;
		}else{
			$is_upload=true;
		}
		/*foreach($_FILES['pic']['name'] as $k=>$v){
			if(!empty($v))$is_upload=true;
		}*/
		if($is_upload){
			$upload_res=uploadThemeImg('room');
			if(empty($upload_res['error'])){
				return array('flag'=>'success','result'=>$upload_res[0]);
			}else{
				$this->error($upload_res['error']);
			}
		}else{
			return array('flag'=>'no');
		}
	}
}
