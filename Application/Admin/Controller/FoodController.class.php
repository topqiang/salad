<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Class FoodController
 * @package Admin\Controller
 */
class FoodController extends AdminBasicController{
	public $basic;
	public function _initialize(){
		parent::checkAuth('Food');
		$this->basic=D('Basic');
	}

	public function foodList(){
		//获得分类列表
		$cate_obj=D('Cate');
		$cate_list=$cate_obj->select();
		$this->assign('cate_list',$cate_list);
		//搜索
		$where='';
		if(!empty($_POST['fid']))$where['fid']=$_POST['fid'];
		if(!empty($_POST['name']))$where['name']=array('like','%'.$_POST['name'].'%');
		if($_POST['cate_id']!=99 and !empty($_POST['cate_id']))$where['cate_id']=$_POST['cate_id'];
		//获得数据列表
		$res=$this->basic->basicList('Food',$where,15);
		//中间数据处理
		foreach($res['list'] as $k=>$v){
			$res['list'][$k]['cate_name']=$this->getCateName($v['cate_id']);
		}
		$this->assign('list',$res['list']);
		$this->assign('page',$res['page']);
		$this->display('foodList');
	}
	public function foodAdd(){
		if(empty($_POST)){
			//获得分类列表
			$cate_obj=D('Cate');
			$cate_list=$cate_obj->select();
			$this->assign('cate_list',$cate_list);
			//获得计量单位
			$unit_list=C('UNIT_TYPE');
			$this->assign('unit_list',$unit_list);
			$this->display('foodAdd');
		}else{

			$this->checkData();
			$upload_res=$this->upload();
			if($upload_res['flag']=='no')$this->error('没有餐品图片');
			if($_POST['is_hot']=='on'){
				$is_hot=1;
			}else{
				$is_hot=0;
			}
			//存储数据
			$data=array(
				'name'		=>$_POST['name'],
				'cate_id'	=>$_POST['cate_id'],
				'pic'		=>$upload_res['result'],
				'old_price'	=>$_POST['old_price'],
				'price'		=>$_POST['price'],
				'score'		=>$_POST['score'],
				'unit'		=>$_POST['unit'],
				'is_hot'	=>$is_hot,
				'ctime'		=>time(),
				'status'	=>0,
			);
			
			$res=$this->basic->basicAdd('Food',$data);
			if($res){
				$this->success('添加成功',U('Food/foodList'));
			}else{
				$this->error('添加失败');
			}
		}
	}
	public function foodEdit(){
		if(empty($_GET['fid']))$this->error('没有餐品id');
		if(empty($_POST)){
			$this->assign('fid',$_GET['fid']);
			$info=$this->basic->basicInfo('food',array('fid'=>$_GET['fid']));
			$this->assign('info',$info);

			//获得分类列表
			$cate_obj=D('Cate');
			$cate_list=$cate_obj->select();
			$this->assign('cate_list',$cate_list);
			//获得计量单位
			$unit_list=C('UNIT_TYPE');
			$this->assign('unit_list',$unit_list);
			
			$this->display('foodEdit');
		}else{
			$this->checkData();
			$upload_res=$this->upload();
			if($_POST['is_hot']=='on'){
				$is_hot=1;
			}else{
				$is_hot=0;
			}
			//存储数据
			$data=array(
				'name'		=>$_POST['name'],
				'cate_id'	=>$_POST['cate_id'],
				'old_price'	=>$_POST['old_price'],
				'price'		=>$_POST['price'],
				'score'		=>$_POST['score'],
				'unit'		=>$_POST['unit'],
				'is_hot'	=>$is_hot,
			);
			if($upload_res['flag']=='success')$data['pic']=$upload_res['result'];
			$res=$this->basic->basicSave('Food',array('fid'=>$_GET['fid']),$data);
			if($res){
				$this->success('修改成功',U('Food/foodList'));
			}else{
				$this->error('修改失败');
			}
		}
	}
	public function foodDel(){
		if(empty($_GET['fid']))$this->error('没有餐品id');
		$res=$this->basic->basicDel('food',array('fid'=>$_GET['fid']));
		if($res){
			$this->success('删除成功',U('Food/foodList'));
		}else{
			$this->error('删除失败');
		}
	}

    /**
     * 食物下架
     */
    public function foodDown(){
        $res = D("Food")->where(array('fid'=>$_GET['fid']))->setField('status',1);
        if($res){
            $this->success("商品下架成功");
        }else{
            $this->error("商品下架失败");
        }
    }

    /**
     * 食物上架
     */
    public function foodUp(){
        $res = D("Food")->where(array('fid'=>$_GET['fid']))->setField('status',0);
        if($res){
            $this->success("商品上架成功");
        }else{
            $this->error("商品上架失败");
        }
    }

    /**---------本类公共方法---------**/

	/**
	 * 检查表单数据
	 */
	public function checkData(){
		if(empty($_POST['name']))$this->error('餐品名称不能为空');
		if(empty($_POST['price']))$this->error('现价不能为空');
		if(empty($_POST['score']))$this->error('所需积分不能为空');
	}

	/**
	 * @param $cate_id
	 *
	 * @return string
	 */
	public function getCateName($cate_id){
		$obj=D('Cate');
		$info=$obj->where(array('cate_id'=>$cate_id))->find();
		if($info){
			return $info['name'];
		}else{
			return '没有相关分类';
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
			$upload_res=$this->uploadThemeImg('food');
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
