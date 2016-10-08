<?php
namespace Admin\Controller;
use Think\Controller;
class AboutController extends Controller{
	public function _initialize(){
		$this -> about = M('About');
	}
	public function aboutupd(){
		if (isset( $_GET['id'] )) {
			$where['id'] = $_GET['id'];
			$cou = $this -> about -> where($where) -> select();
			$this -> assign('about',$cou[0]);
			$this -> display();
		}else if ($_POST['id']) {
			$content = $_POST['content'];
			$data = array(
				'id' => $_POST['id'],
				'content' => $content,
				);
			$res = $this -> about -> save($data);
			if (isset($res)) {
				$this -> success("修改成功！",U('About/aboutupd',array('id'=>1)));
			}else{
				$this -> error("修改失败！",U('About/aboutupd',array('id'=>1)));
			}
		}
	}
}