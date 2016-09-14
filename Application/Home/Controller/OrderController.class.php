<?php
namespace Home\Controller;
use Think\Controller;

/**
 * Class OrderController
 * @package Home\Controller
 */
class OrderController extends Controller{
	public $basic;
	public function _initialize(){
		$this->basic=D('Basic');
	}

    /**
     * 下订单
     */
    public function order(){
        //空检查
		$num=0;
		foreach($_SESSION['myList'] as $k=>$v){
			$num=$v+$num;
		}
		if(empty($num))$this->ajaxReturn(array('flag'=>'error','message'=>'请点菜'));
		$check_arr=array(
			'm_tel'=>'电话,no,,',
			'm_name'=>'姓名,no,,',
			'm_address'=>'送餐地址,no,,',
            'm_work'=>'职业,no,,',
		);
		$check_res=checkData($check_arr,$_POST);
		if($check_res['flag']=='error')$this->ajaxReturn($check_res);
		
		//存储session
		$_SESSION['m_tel']=$_POST['m_tel'];
		$_SESSION['m_name']=$_POST['m_name'];
		$_SESSION['m_address']=$_POST['m_address'];
        $_SESSION['m_work']=$_POST['m_work'];
		
		//如果用户第一次使用存储用户信息
		$res=$this->basic->basicInfo('Member',array('m_tel'=>$_POST['m_tel']));
		if(!$res){
			$data=array(
				'm_name'=>$_POST['m_name'],
				'm_tel'=>$_POST['m_tel'],
				'm_address'=>$_POST['m_address'],
                'm_work'=>$_POST['m_work'],
				'm_score'=>0,
				'm_card_num'=>rand(10000000,99999999),
				'ctime'=>time(),
				'status'=>0,
			);
			$this->basic->basicAdd('Member',$data);
		}

        //检查付款方式
        $pay_type = $_POST['pay_type'];

		//添加订单
		$data=array(
			'type'=>$pay_type,
			'name'=>$_POST['m_name'],
			'tel'=>$_POST['m_tel'],
			'address'=>$_POST['m_address'],
            'm_work'=>$_POST['m_work'],
			'message'=>$_POST['message'],
			'ctime'=>time(),
			'status'=>0,
		);
		foreach($_SESSION['myList'] as $k=>$v){
			$order_list[]=array(
				'id'=>$k,
				'num'=>$v,
			);
		}

        //整理菜单数据信息
        $car = $order_list;
        $food_bill = '';
        $order_total = 0;
        foreach($car as $k=>$v){
            $food_info_info = $this->basic->basicInfo('food',array('fid'=>$car[$k]['id']));
            $car[$k]['food_name'] = $food_info_info['name'];
            $car[$k]['food_money'] = $food_info_info['price'];
            $car[$k]['food_score'] = $food_info_info['score'];
            $t = '';
            //echo strlen($car[$k]['food_name']).',';
            if(strlen($car[$k]['food_name'])<=21){
                $food_long = strlen($car[$k]['food_name']);
                for($i=1;$i<=2*(10-($food_long/3));$i++){
                    $t.=' ';
                }
            }else{
                $car[$k]['food_name'].='<0D0A>';
                $t = '                    ';
            }
            $food_bill.=$car[$k]['food_name'].$t.'X'.$car[$k]['num'].'   '.'￥'.$car[$k]['food_money']*$car[$k]['num'].'<0D0A>';

            if($pay_type==1){
                $order_total += $car[$k]['food_score']*$car[$k]['num'];
            }else{
                $order_total += $car[$k]['food_money']*$car[$k]['num'];
            }
        }
        $order_total_type = $order_total;//总的订单所需积分或金额
		$data['list']=serialize($order_list);
        if($pay_type==1){
            $pay_type = '积分兑换';
            $order_total.='积分';
        }else{
            $pay_type = '货到付款';
            $order_total.='元';
        }
        //插入订单表
        $score_res = 1;
        if($pay_type=='积分兑换'){
            $memInfo2=$this->basic->basicInfo('Member',array('m_tel'=>$_POST['m_tel']));
            if($memInfo2['m_score'] < $order_total_type){
                $this->ajaxReturn(array('flag'=>'error','message'=>'您的积分不足'));
            }else{
                $order_res = $this->basic->basicAdd('Order',$data);
                $score_res = D('Member')->where(array('m_tel'=>$_POST['m_tel']))->setDec('m_score',$order_total_type);
            }
        }else{
            $order_res = $this->basic->basicAdd('Order',$data);
        }

        $dingdan='   <1D2111>湘极了土家菜<1D2100>

订单编号：14'.$order_res.'
姓名：'.$_POST['m_name'].'
电话：'.$_POST['m_tel'].'
地址：'.$_POST['m_address'].'
下单时间：'.date("Y-m-d H:i:s",time()).'
--------------------------------
商品               数量  金额<0D0A>'.$food_bill.'
备注：'.$_POST['message'].'
--------------------------------
                 合计：'.$order_total.'
                        '.$pay_type.'
     谢谢惠顾，欢迎下次光临
<0D0A><0D0A><0D0A><0D0A><0D0A><0D0A>';
		//$this->ajaxReturn(array('flag'=>'success','message'=>$dingdan));
        //dump($dingdan);exit;
        $print_res = $this->printBill($dingdan);
		
		//添加点餐总计
		foreach($_SESSION['myList'] as $k=>$v){
			$count_info=$this->basic->basicInfo('Food',array('fid'=>$k));
			$count=$count_info['count']+1;
			$this->basic->basicSave('Food',array('fid'=>$k),array('count'=>$count));
		}
		
		if($score_res && $order_res){
            unset($_SESSION['myList']);
            $this->ajaxReturn(array('flag'=>'success','message'=>'下单成功'));

		}else{
			$this->ajaxReturn(array('flag'=>'error','message'=>'订单提交失败'));
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
            'dayinjisn'=>'dayinjisn='.'60107443', //打印机ID号
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



	public function getInfo(){
		$info=$this->basic->basicInfo('Member',array('m_tel'=>$_GET['m_tel']));
		$arr=array(
			'm_name'=>$info['m_name'],
			'm_address'=>$info['m_address'],
            'm_score'=>$info['m_score'],
            'm_work'=>$info['m_work'],
		);
		$this->ajaxReturn($arr);
	}
	public function orderList(){
		if(empty($_SESSION['m_tel']))redirect(U('Index/virtualLogin',array('flag'=>'order')));
		$where['tel']=$_SESSION['m_tel'];
		$where['ctime']=array('gt',time()-48*3600);
		$where['status']=array('lt',10);
		$res=$this->basic->basicList('Order',$where);
		foreach($res as $k=>$v){
			$arr=$this->getList($v['list'],$v['type']);
			$res[$k]['list']=$arr['list'];
			$res[$k]['total']=$arr['total'];
		}
		$this->assign('list',$res);
		//var_dump($res);
		$this->display('orderList');
	}
	public function getList($list_char,$pay_type){
		$list_arr=unserialize($list_char);
		$obj=D('Food');
		$price=0;
		foreach($list_arr as $k=>$v){
			$info=$obj->where(array('fid'=>$v['id']))->find();
			$list_arr[$k]['name']=$info['name'];
			$list_arr[$k]['unit']=$info['unit'];
			$list_arr[$k]['price']=$info['price'];
			$list_arr[$k]['score']=$info['score'];
			if($pay_type==1){
				$price=$price+$info['score']*$v['num'];
			}else{
				$price=$price+$info['price']*$v['num'];
			}
		}
		$ret_arr=array(
			'list'=>$list_arr,
			'total'=>$price,
		);
		return $ret_arr;
	}
}
