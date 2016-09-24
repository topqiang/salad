<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Class OrderController
 * @package Admin\Controller
 */
class OrderController extends AdminBasicController{
    public $ordadd;
    public $orgood;
	public function _initialize(){
        $this -> ordadd = D("Ordadd");
        $this -> orgood = D("Orgood");
	}

    public function updorder(){
        $order = $_POST['order'];
        $ord = D("Order");
        if (isset($order['getcode'])) {
            $getcode = $order['getcode'];
            $code = $ord -> field('getcode') -> where(array('id' => $order['id'])) -> select();
            if ($getcode != $code[0]['getcode']) {
                $this -> ajaxReturn( "提货码不正确！" );
                exit();
            }
        }
        $res = $ord -> save( $order );
        if ( isset( $res ) ) {
            $this -> ajaxReturn( $res );
        }else{
            $this -> ajaxReturn( "error" );
        }
    }

    public function orderlist(){
        $type = $_GET['type'];
        $ordname = $_POST['ordname'];
        $addname = $_POST['addname'];
        $tel = $_POST['tel'];
        $where = array();
        if (empty($type)) {
            $where["type"] = array( 'neq' , 9 );
        }else{
            $where["type"] = array( 'eq' , $type);
        }
        if (isset($ordname)) {
            $where["ordname"] = array( 'like' , "%$ordname%");
        }
        if (isset($addname)) {
            $where["addname"] = array( 'like' , "%$addname%");
        }
        if (isset($tel)) {
            $where["tel"] = array( 'like' , "%$tel%");
        }
        $res = $this -> ordadd -> where($where) -> select();
        $this -> assign("orders" , $res);
        $this -> display();
    }

    public function getinfo(){
        $oid = $_POST['oid'];
        if ( isset($oid) ) {
            $where['oid'] = $oid;
            $res = $this -> orgood -> field('name,gprice,gnum,constituent') -> where($where) -> select();
            if ( isset($res) ) {
                $this -> ajaxReturn(json_encode($res));
            }else{
                $this -> ajaxReturn('error');
            }
        }
    }
}
