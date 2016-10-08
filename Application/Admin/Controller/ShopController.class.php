<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 门店管理
*/
class ShopController extends AdminBasicController{
	public function _initialize(){
		
	}

	public function manapic(){
		$list = D("Shoppic") -> select();
		$this -> assign("list",$list);
		$this -> display();
	}

	public function shoplist(){
		$shopadd = D("Shopadd");
		$count = $shopadd ->count();
        $page = new \Think\Page($count,15);
		$list = $shopadd->limit($page->firstRow,$page->listRows)->select();
		$this->assign('page',$page->show());
		$this->assign("list",$list);
		$this->display();
	}

	public function shopdel(){
		$id = $_GET['id'];
		$res = D('Shop')->save(array('id'=>$id,'status'=>'9'));
		if ($res) {
			$this->success("删除成功！",U("Shop/shoplist"));
		}else{
			$this->error("删除失败！");
		}
	}

	public function shopedit(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$where['id'] = array('eq' , $id); 
			$list = D("shopadd")->where( $where )->select();
			$this->assign("info",$list[0]);
			$this-> display();
		}else{
			$addre = array(
				'id' => $_POST['addid'],
				'name' => $_POST['name'],
				'tel' => $_POST['tel'],
				'detailadd' => $_POST['address'],
				'numhouse' => $_POST['numhouse'],
				'city' => $_POST['city']
				);
			$res = $result = D("Address")->save($addre);
			if (isset($res)) {
				$data = array(
					'id' => $_POST['id'],
					'name' => $_POST['name'],
					'tel' => $_POST['tel'],
					'working' => $_POST['working']
					);
				$result = D("Shop")->save($data);
				if (!empty($result)) {
					$this->success("门店修改成功！",U("Shop/shoplist"));
				}else{
					$this->error("门店修改失败！");
				}
			}
		}
	}

	public function addshop(){
		if (empty($_POST['name'])) {
			$this-> display();
		}else{
			$addre = array(
				'name' => $_POST['name'],
				'tel' => $_POST['tel'],
				'detailadd' => $_POST['address'],
				'numhouse' => $_POST['numhouse'],
				'city' => $_POST['city']
				);
			$res = D("Address")->add($addre);
			if (isset($res)) {
				$data = array(
					'name' => $_POST['name'],
					'address' => $res,
					'tel' => $_POST['tel'],
					'working' => $_POST['working']
					);
				$result = D("Shop")->add($data);
				if (!empty($result)) {
					$this->success("门店添加成功！",U("Shop/shoplist"));
				}else{
					$this->error("门店添加失败！");
				}
			}
		}
	}

	public function uploadshop(){
		$pic = $_POST['pic'];
		$picname = $_POST['picname'];
		$id = $_POST['id'];
		$base64 = substr(strstr($pic, ","), 1);
		$data = base64_decode($base64);
		$picsrc = "Uploads/shop/".date('Ym')."/".$picname;
		$res = file_put_contents( $picsrc , $data);
		if(isset($res)){
			$da['pic'] = $picsrc;
			if(!empty($id)){
				$da['id'] = $id;
				D("Shoppic")->save($da);
				$this->ajaxReturn($id);	
			}else{
				$id = D("Shoppic")->add($da);
				$this->ajaxReturn($id);	
			}
		}else{
			$this->ajaxReturn("error");	
		}
	}
	public function picdel(){
		$id = $_GET['id'];
		if (isset($id)) {
			$res = D("Shoppic")->delete($id);
			if (isset($res)) {
				$this -> success("删除成功！",U('Shop/manapic'));
			}else{
				$this->error("删除失败！",U('Shop/manapic'));
			}
		}else{
			$this->error("删除失败！",U('Shop/manapic'));
		}
	}
}