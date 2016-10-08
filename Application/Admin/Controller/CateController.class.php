<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Class FoodController
 * @package Admin\Controller
 */
class CateController extends AdminBasicController{
	public $cate;
	public function _initialize(){
		parent::checkAuth('Cate');
		if ( isset($_GET['cate']) ) {
			$this->cate=D($_GET['cate']);
		}else{
			$this->cate=D('Fcate');
		}
	}
	public function cateList(){
		$where='status <> 9';
		$count=$this->cate->where($where)->count();
		$page=new \Think\Page($count,15);
		$list['list']=$this->cate->limit($page->firstRow,$page->listRows) -> where($where)->select();
		$list['page']=$page->show();
		$this->assign('list',$list['list']);
		$this->assign('page',$list['page']);
		$this->display($_GET['cate'].'/cateList');
	}
	public function CateAdd(){
		if(empty($_POST)){
			$this->display($_GET['cate'].'/cateAdd');
		}else{
			$this->checkData();
			$data=array(
				'name'	=>$_POST['name'],
				'remark'=>$_POST['remark'],
			);
			$res=$this->cate->add($data);
			if($res){
				$this->success('添加分类成功',U('Cate/cateList',array('cate' => $_GET['cate'])));
			}else{
				$this->error('添加分类失败');
			}
		}
	}
	public function cateEdit(){
		if(empty($_GET['id']))$this->error('没有分类id');
		if(empty($_POST)){
			$this->assign('id',$_GET['id']);
			$info=$this->cate->where(array('id'=>$_GET['id']))->find();
			$this->assign('info',$info);
			$this->display($_GET['cate'].'/cateEdit');
		}else{
			$this->checkData();
			$data=array(
				'name'	=>$_POST['name'],
				'remark'=>$_POST['remark'],
			);
			$res=$this->cate->where(array('id'=>$_GET['id']))->save($data);
			if($res){
				$this->success('修改成功',U('Cate/cateList',array('cate' => $_GET['cate'])));
			}else{
				$this->error('修改失败');
			}
		}
	}
	public function cateDel(){
		if(empty($_GET['id']))$this->error('没有分类id');
		$res=$this->cate->save(array('id'=>$_GET['id'],'status' => '9'));

		//分类所属菜品以及商品更改状态操作（视图已做处理）

		if($res){
			$this->success('删除成功',U('Cate/cateList',array('cate' => $_GET['cate'])));
		}else{
			$this->error('删除失败');
		}
	}

	/**---------本类公共方法---------**/

	/**
	 * 检查表单数据
	 */
	public function checkData(){
		if(empty($_POST['name']))$this->error('分类名称不能为空');
	}
}
