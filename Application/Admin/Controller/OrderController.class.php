<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Class OrderController
 * @package Admin\Controller
 */
class OrderController extends AdminBasicController{
	public $basic;
	public function _initialize(){
		parent::checkAuth('Order');
		$this->basic=D('Basic');
	}

    /**
     * 订单列表
     */
    public function orderList(){
		//搜索
		$where='';
		if(!empty($_POST['id']))$where['id']=$_POST['id'];
		if(!empty($_POST['tel']))$where['tel']=$_POST['tel'];
		if(!empty($_POST['name']))$where['name']=array('like','%'.$_POST['name'].'%');
        $this->assign('tab_type',1);
        if($_GET['type']==2){
            $time_start = strtotime(date("Y-m-d"));//今天的日期
            $time_end = strtotime(date("Y-m-d",strtotime("+1 day")));//得到明天的日期
            $where['ctime'] =array(array('egt',$time_start),array('lt',$time_end),'and');
            $this->assign('tab_type',4);
        }
		//获得数据列表
		$res=$this->basic->basicList('Order',$where,15);
		//中间数据处理
		foreach($res['list'] as $k=>$v){
			$list_res=$this->getList($v['list'],$v['type']);
			$res['list'][$k]['list']=$list_res['list'];
			$res['list'][$k]['total']=$list_res['total'];
		}

		$this->assign('list',$res['list']);
		$this->assign('page',$res['page']);
		$this->display('orderList');
	}

    /**
     * 已完成订单
     */
    public function oldList(){
		//搜索
		$where['status']=9;
		if(!empty($_POST['id']))$where['id']=$_POST['id'];
        if(!empty($_POST['tel']))$where['tel']=$_POST['tel'];
		if(!empty($_POST['name']))$where['name']=array('like','%'.$_POST['name'].'%');
        $this->assign('tab_type',2);
        if($_GET['type']==1){
            $time_start = strtotime(date("Y-m-d"));//今天的日期
            $time_end = strtotime(date("Y-m-d",strtotime("+1 day")));//得到明天的日期
            $where['ctime'] =array(array('egt',$time_start),array('lt',$time_end),'and');
            $this->assign('tab_type',3);
        }
		//获得数据列表
		$res=$this->basic->basicList('Order',$where,15);
		//中间数据处理
		foreach($res['list'] as $k=>$v){
			$list_res=$this->getList($v['list'],$v['type']);
			$res['list'][$k]['list']=$list_res['list'];
			$res['list'][$k]['total']=$list_res['total'];
		}

		$this->assign('list',$res['list']);
		$this->assign('page',$res['page']);
		$this->display('oldList');
	}

    /**
     * 设置订单
     */
    public function orderSet(){
		if(empty($_GET['id']))$this->error('没有订单号');
		$info=$this->basic->basicInfo('Order',array('id'=>$_GET['id']));
		$res=$this->basic->basicDel('Order',array('id'=>$_GET['id']));
		if($res){
            if($info['type']==2){
                //添加用户积分
                $total=0;
                $food_list=unserialize($info['list']);
                foreach($food_list as $k=>$v){
                    $food_info=$this->basic->basicInfo('Food',array('fid'=>$v['id']));
                    if(!empty($v['num'])){
                        if($info['type']==1){
                            $total = $total + $food_info['score'] * $v['num'];
                        }else{
                            $total = $total + $food_info['price'] * $v['num'];
                        }
                    }
                }
                //加兑换积分
                $res_score = D("Member")->where(array('m_tel'=>$info['tel']))->setInc('m_score',$total);
                //加等级积分
                $level_res = D("Member")->where(array('m_tel'=>$info['tel']))->setInc('m_level_score',$total);

                if($res_score && $level_res){
                    $this->success('设置成功',U('Order/orderList'));
                }else{
                    $this->error('积分添加失败');
                }
            }else{
                $this->success('设置成功',U('Order/orderList'));
            }
		}else{
			$this->error('设置失败');
		}
	}

    /**
     * 设置订餐失败
     */
    public function OrderSetFail(){
        $Order = D("Order");
        //设置订单状态
        $order_res = $Order->where(array('id'=>$_GET['id']))->setField('status',1);
        $order_info = $Order->where(array('id'=>$_GET['id']))->find();
        $total=0;
        $food_list=unserialize($order_info['list']);
        foreach($food_list as $k=>$v){
            $food_info=$this->basic->basicInfo('Food',array('fid'=>$food_list[$k]['id']));
            if(!empty($food_list[$k]['num'])){
                if($order_info['type']==1){
                    $total = $total + $food_info['score'] * $v['num'];
                }else{
                    $total = $total + $food_info['price'] * $v['num'];
                }
            }
        }
        if($order_info['type']==2){
            //如果是货到付款把积分扣掉
            D('Member')->where(array('m_tel'=>$order_info['tel']))->setDec('m_score',$total);
            D('Member')->where(array('m_tel'=>$order_info['tel']))->setDec('m_level_score',$total);
        }elseif($order_info['type']==1){
            //如果是积分兑换那么把用户积分加回去
            D('Member')->where(array('m_tel'=>$order_info['tel']))->setInc('m_score',$total);
        }
        if($order_res){
            $this->success("设置成功",U('Order/orderList'));
        }else{
            $this->error("设置失败");
        }

    }

    /**
     * 删除订单
     */
    public function delOrder(){
	//dump($_SESSION);exit;
        if($_SESSION['g_id']!=99){
            $this->error("您没有删除权限");
        }
        $res = D("Order")->where(array('id'=>$_GET['id']))->delete();
        if($res){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    /**---------本类公共方法---------**/
    /**
     * @param $list_char
     *
     * @param $pay_type
     * @return mixed
     */
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
