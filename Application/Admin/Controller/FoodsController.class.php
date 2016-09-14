<?php
namespace Admin\Controller;
use Think\Controller;

class FoodsController extends AdminBasicController {
	public function _initialize(){
		$this->foods=D('Foods');
		$this->Foodcate=D('Foodcate');
	}

	public function foodsList(){
		//获得分类列表
		$cate_obj=D('Fcate');
		$cate_list=$cate_obj->select();
		$this->assign('cate_list',$cate_list);
		//搜索
		if(!empty($_POST['fid']))$where['fid']=$_POST['fid'];
		if(!empty($_POST['name']))$where['fname']=array('like','%'.$_POST['name'].'%');
		if($_POST['cate_id']!=99 and !empty($_POST['cate_id'])){
			$where['fcate_id']=$_POST['cate_id'];
			// dump($where);
			// exit();
		}
		$res=$this->Foodcate->where($where)->select();
		$this->assign('list',$res);
		// $this->assign('page',$res['page']);
		$this->display('foodsList');
	}

	public function foodsAdd(){
		if(empty($_POST)){
			//获得分类列表
			$cate_obj=D('Fcate');
			$cate_list=$cate_obj->select();
			$this->assign('cate_list',$cate_list);
			$this->display('foodsAdd');
		}else{
			$upload_res=$this->upload();
			if($upload_res['flag']=='no')$this->error('没有菜品图片');
			//存储数据
			$data=array(
				'name'			=>$_POST['name'],
				'cate_id'		=>$_POST['cate_id'],
				'pic'			=>"Uploads/foods/".$upload_res['result'],
				'price'			=>$_POST['price'],
				'create_time'	=>time(),
				'update_time'	=>time(),
				'status'		=>0,
			);
			$res=$this->foods->add($data);
			if($res){
				$this->success('添加成功',U('Foods/foodsList'));
			}else{
				$this->error('添加失败');
			}
		}
	}

	public function foodsEdit(){
		if(empty($_GET['fid']))$this->error('没有餐品id');
		if(empty($_POST)){
			$this->assign('fid',$_GET['fid']);
			$info=$this->Foodcate->where(array('fid'=>$_GET['fid']))->select();
			$this->assign('info',$info[0]);
			//获得分类列表
			$cate_obj=D('Fcate');
			$cate_list=$cate_obj->select();
			$this->assign('cate_list',$cate_list);
			
			$this->display('foodsEdit');
		}else{
			$upload_res=$this->upload();
			//删除历史缩略图。。。。
			
			//存储数据
			$data=array(
				'id'			=>$_GET['fid'],
				'name'			=>$_POST['name'],
				'cate_id'		=>$_POST['cate_id'],
				'price'			=>$_POST['price'],
				'update_time'	=>time(),
				'status'		=>0,
			);
			if($upload_res['flag']=='success')$data['pic']="Uploads/foods/".$upload_res['result'];
			$res=$this->foods->save($data);
			if($res){
				$this->success('修改成功',U('Foods/foodsList'));
			}else{
				$this->error('修改失败');
			}
		}
	}
	public function foodsDel(){
		if(empty($_GET['fid']))$this->error('没有餐品id');
		$res=$this->foods->delete($_GET['fid']);
		if($res){
			$this->success('删除成功',U('Foods/foodsList'));
		}else{
			$this->error('删除失败');
		}
	}




	/**
	 * 处理商品图片上传
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
            //load("@.function.php");
			$upload_res=$this->uploadThemeImg('foods');
			if(empty($upload_res['error'])){
				return array('flag'=>'success','result'=>$upload_res[0]);
			}else{
                return array('flag'=>'error','result'=>$upload_res['error']);//$this->error($upload_res['error']);
			}
		}else{
			return array('flag'=>'no');
		}
	}

    /**
     * 上传图片公共函数
     */
    function uploadThemeImg($file){

        //load("@.uploadfile");
        //include_once 'uploadfile.php';
        $save_path = "./Uploads/".$file."/".date('Ym')."/";
        //$save_path = "./Uploads/".$file."/201404/";
        $upload_info = $this->getUpLoadFiles('',$save_path,'','','200','200','',$is_thumb=true);
        if(count($upload_info[0])<=1){
            return array('error'=>$upload_info);
        }else{
            foreach($upload_info as $k=>$v){
                $url_arr[]=date('Ym')."/".$v['savename'];
            }
        }
        return $url_arr;
    }



    /*
 * by king 2013年5月10日15:08:49
 * 自定义 简单上传类
 * 参数：$name-定义文件上传命名规则
 *      $url-原图保存地址
 *      $maxsize-文件最大 大小
 *      $type-上传文件类型
 *      $width-缩略图宽
 *      $height-缩略图高
 *      $thumb_pre-缩略图前坠名
 * 成功返回 上传后的信息
 * 失败返回异常名称
 * */
    function getUpLoadFiles($name,$url,$maxsize,$type,$width,$height,$thumb_pre,$is_thumb=false)
    {
        $upload = new \Think\UploadFile();
        $upload->maxSize        = !empty($maxsize)?$maxsize:20480000;
        $upload->allowExts      = is_array($type)?$type:array('jpg','png','jpeg','bmp','gif');
        $upload->savePath       = isset($url)?$url:'./Uploads'.date("Ym").'/';
        $upload->saveRule       = !empty($name)?$name:'uniqid';       //保存文件命名规则 如果不是规则的关键字 默认设为上传的文件名称

        if($is_thumb)
        {
            //生成缩略图
            $upload->thumb          = true;
            $upload->thumbPath      = isset($url)?$url:'./Uploads'.date("Ym").'/';
            $upload->thumbPrefix    = !empty($thumb_pre)?$thumb_pre:'thumb_';
            $upload->thumbMaxWidth  = $width;
            $upload->thumbMaxHeight = $height;
            $upload->uploadReplace = true;
        }
        if($upload->Upload())
        {
            $info = $upload->getUploadFileInfo();
            return $info;
        }
        else
        {
            return $upload->getErrorMsg();
        }
    }
}