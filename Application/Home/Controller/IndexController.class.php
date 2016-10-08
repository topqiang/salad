<?php
namespace Home\Controller;
use Think\Controller;

/**
 * Class IndexController
 * @package Home\Controller
 */
class IndexController extends BaseController {
    public function _initialize(){
    	parent::_initialize();
    	//完善购物车数量查询
    	$num=D('Gley')->count('id');
    	$this->assign('glexnum',$num);
    }

    /**
     * 系统首页
     */
    public function index(){
        $pic = D("Shoppic")->select();
        $this -> assign("pic",$pic);
	    $this -> display();
    }

    public function diy(){
    	$foodcate = D("Foodcate");
    	$where['cname'] = array('eq' , '基菜' );
    	$list = $foodcate -> field("fid,fpic,fname") -> where($where) -> select();
    	$this->assign( 'list' , $list );
    	$this->display("Index/diyjc");
    }

    public function diyzc(){
    	$type = $_GET['type'];
    	switch ( $type ) {
    		case 'big':
    			$this->assign( 'totalnum' , 12 );
    			break;
    		case 'small':
    			$this->assign( 'totalnum' , 9 );
    			break;
    		case 'free':
    			$this->assign( 'totalnum' , 4 );
    			break;
    	}
    	$foodcate = D("Foodcate");
    	$fcate = D("Fcate");
    	$catew['name'] = array('not in' , '基菜,酱料');
        $catew['status'] = array('neq' , '9');
    	$catelist = $fcate -> field("id,name") -> where($catew) -> select();
    	$this->assign( 'catelist' , $catelist );
    	$where['fcate_id'] = isset($_POST['fid']) ? $_POST['fid'] : $catelist[0]['id'];
    	$list = $foodcate -> field("fid,fpic,fname,fcate_id") -> where($where) -> select();
    	if (isset($_POST['fid'])) {
    		$this -> ajaxReturn(json_encode($list));
    		exit();
    	}
    	$this->assign( 'list' , $list );
    	$this->display("Index/diyzc");
    }

    public function diyjl(){
    	$foodcate = D( "Foodcate" );
    	$where['cname'] = array( 'eq' , '酱料' );
    	$list = $foodcate -> field( "fid,fpic,fname" ) -> where( $where ) -> select();
    	$this -> assign( 'list' , $list );
    	$this -> display( "Index/diyjl" );
    }

    public function diycp(){
    	$goodtype = isset($_POST['goodtype']) ? $_POST['goodtype'] : "big";
    	$jc = 4;
    	$zc = 12;
    	switch ($goodtype) {
    		case 'small':
    			$zc = 9;
    			break;
    		case 'free':
    			$zc = 4;
    			$jc = 1;
    			break;
    	}

    	$foodcate = D("Foodcate");
    	$where['cname'] = array('eq' , '基菜' );
    	$jclist = $foodcate -> field("fid,fpic,fname") ->order('rand()') ->limit($jc)->where($where) -> select();
    	$hubfooduser = D("Hubfooduser");
    	$userid = session("userid");
    	$argarr['uid'] = array('eq' , $userid);
    	$argarr['well'] = array('eq' , "1");
    	$zclist = $hubfooduser -> field("fid,fpic,fname,fcate_id") -> order('rand()') ->limit($zc) -> where($argarr) -> select();
    	$oldnum = 0;
        if (isset($zclist)) {
           $oldnum = count($zclist);
        }else{
            $zclist = array();
        }
    	if ($oldnum < $zc) {
    		$newnum = $zc - $oldnum;
    		$resid =$hubfooduser -> field("fid") -> where(array('uid' => array('eq', $userid))) -> select();
            if (isset($resid)) {
                foreach ($resid as $key => $value) {
                    $guoluid[$key] = $value['fid'];
                }
            }
    		$zclist2 = $foodcate -> field("fid,fpic,fname") ->order('rand()') ->limit($newnum) -> where(array('fid' => array('not in',$guoluid),'cname' => array('not in' , '基菜,酱料'))) -> select();
    		if (isset($zclist2)) {
                $zclist = array_merge( $zclist , $zclist2 );
            }
    	}
    	$list['jclist'] = $jclist;
    	$list['zclist'] = $zclist;
    	$result = json_encode($list);
    	$this->ajaxReturn($result);
    }


    public function saselect(){
    	$foodcate = D("Foodcate");
    	$fcate = D("Fcate");
    	$Hub = D("Hub");
    	$catew['name'] = array('not in' , '基菜,酱料');
        $catew['status'] = array('neq' , '9');
    	$catelist = $fcate -> field("id,name") -> where($catew) -> select();
    	$this->assign( 'catelist' , $catelist );
    	$where1['fcate_id'] = isset($_POST['fid']) ? $_POST['fid'] : $catelist[0]['id'];
    	$list = $foodcate -> field("fid,fpic,fname,fcate_id") -> where($where1) -> select();

    	$hubdata['uid'] = array('eq',session('userid'));
    	$hubdata['well'] = array('eq','1');
    	$well = count($Hub->where($hubdata)->select());
    	$hubdata['well'] = array('eq','0');
    	$hubdata['bad'] = array('eq','1');
    	$bad = count($Hub->where($hubdata)->select());
    	$this -> assign('well',$well);
    	$this -> assign('bad',$bad);

    	foreach ($list as $key => $food) {
    		$where['uid'] = array('eq' , session('userid'));
    		$where['fid'] = array('eq' , $food['fid']);
    		$hub = $Hub->where($where)->select();
    		if (isset($hub[0]['well']) && $hub[0]['well'] == "1") {
    			$food['well'] = $hub[0]['well'];
    			$food['hid'] = $hub[0]['id']; 
    		}else if (isset($hub[0]['bad']) && $hub[0]['bad'] == "1") {
    			$food['bad'] = $hub[0]['bad'];
    			$food['hid'] = $hub[0]['id']; 
    		}
    		$list[$key] = $food;
    	}

    	if (isset($_POST['fid'])) {
    		$this -> ajaxReturn(json_encode($list));
    		exit();
    	}
    	$this->assign( 'list' , $list );
    	// dump($list);
    	// exit();
    	$this -> display();
    }
}
