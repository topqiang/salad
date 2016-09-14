<?php
namespace Home\Controller;
use Think\Controller;

/**
 * Class RoomController
 * @package Home\Controller
 */
class RoomController extends Controller{
	public $basic;
	public function _initialize(){
		$this->basic=D('Basic');
	}
	public function roomList(){
		$res=$this->basic->basicList('Room');
		$this->assign('list',$res);
		if(empty($_GET['rid'])){
			$rid=$res[0]['rid'];
		}else{
			$rid=$_GET['rid'];
		}
		$this->assign('rid',$rid);
		$info=$this->basic->basicInfo('Room',array('rid'=>$rid));
		$this->assign('info',$info);
		$this->display('roomList');
	}
	public function orderRoom(){
		if(empty($_GET['rid']))$this->error('没有包间id');
		if(empty($_POST)){
			$info=$this->basic->basicInfo('Room',array('rid'=>$_GET['rid']));
			$this->assign('info',$info);
			$this->display('orderRoom');
		}else{
			//$this->ajaxReturn(serialize($_POST).'--'.serialize($_GET));
			if(empty($_GET['rid']))$this->ajaxReturn(array('flag'=>'error','message'=>'没有包间id'));
			if(empty($_POST['tel']))$this->ajaxReturn(array('flag'=>'error','message'=>'请输入您的联系方式'));
			if(empty($_POST['name']))$this->ajaxReturn(array('flag'=>'error','message'=>'请输入姓名'));
			if(empty($_POST['num']))$this->ajaxReturn(array('flag'=>'error','message'=>'请输入就餐人数'));
			if(empty($_POST['message']))$this->ajaxReturn(array('flag'=>'error','message'=>'请输入就餐时间等备注信息'));
            $info=$this->basic->basicInfo('Room',array('rid'=>$_GET['rid']));
			$data=array(
				'rid'=>$_GET['rid'],
				'num'=>$_POST['num'],
				'name'=>$_POST['name'],
				'tel'=>$_POST['tel'],
				'message'=>$_POST['message'],
				'ctime'=>time(),
				'status'=>0,
			);
			$res=$this->basic->basicAdd('Room_order',$data);

            $dingdan='   <1D2111>湘极了土家菜<1D2100>

订单编号：1314'.$res.'
姓名：'.$_POST['name'].'
电话：'.$_POST['tel'].'
就餐人数：'.$_POST['num'].'
下单时间：'.date("Y-m-d H:i:s",time()).'
--------------------------------
商品               数量  金额<0D0A>'
.$info['name'].'   X1    XX
备注：'.$_POST['message'].'
--------------------------------
                 合计：0元

     谢谢惠顾，欢迎下次光临
<0D0A><0D0A><0D0A><0D0A><0D0A><0D0A>';
            //dump($dingdan);exit;
            $print_res = $this->printBill($dingdan);

			if($res){
				$this->ajaxReturn(array('flag'=>'success','message'=>'预定成功'));
			}else{
				$this->ajaxReturn(array('flag'=>'error','message'=>'预定失败'));
			}
		}
	}

    /**
     * sim卡打印订单
     */
    public function printBill($dingdan){
        $url = 'http://115.28.15.113:60002';//POST指向的API链接 test
        //$url = 'http://124.133.243.117:60002';//POST指向的API链接
        // 提交API的内容
        $data = array(
            'dingdanID'=>'dingdanID='.'000002', //订单号
            'dayinjisn'=>'dayinjisn='.'60100499', //打印机ID号
            'dingdan'=>'dingdan='.$dingdan, //订单内容
            'pages'=>'pages='.'1', //联数
            'replyURL'=>'replyURL='.'123'); //回复确认URL
        //格式转换:   dingdanID=$dingdanID&dayinjisn=$dayinjisn&.....
        $post_data = implode('&',$data);
        //以POST方式发送数据到API
        return $this->postData($url, $post_data);
    }
    /**
     * post提交请求
     * @param $url
     * @param $data
     * @return mixed
     */
    public function postData($url, $data){
        $ch = curl_init();
        $timeout = 300;
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转 （很重要）
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, "http://127.0.0.1/");   //构造来路
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        //ob_start();
        $handles = curl_exec($ch);  //获取返回结果
        //$result = ob_get_contents() ;
        //ob_end_clean();
        //close connection
        curl_close($ch);
        //return $result;
        return $handles;
    }



	public function myRoom(){
		$where['status']=array('lt',10);
		$res=$this->basic->basicList('Room_order',$where);
		foreach($res as $k=>$v){
			$room_info=$this->basic->basicInfo('Room',array('rid'=>$v['rid']));
			$res[$k]['room']=$room_info['name'];
		}
		$this->assign('list',$res);
		//var_dump($res);
		$this->display('myRoom');
	}
}
