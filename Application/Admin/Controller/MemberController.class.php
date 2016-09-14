<?php
namespace Admin\Controller;
use Think\Controller;

class MemberController extends AdminBasicController{

    public $member = '';
    public function _initialize(){
        $this->member = D('Member');
    }

    /**
     * 会员列表
     */
    public function memberList(){

        if(isset($_POST['m_tel'])){
            $where['m_tel'] = $_POST['m_tel'];
        }else{
            $where = array();
        }
        if($_GET['type']==1){
            $this->assign('tab_type',2);
            $result = $this->member->searchMember($where,'m_level_score desc','');
            $this->assign('member_list',$result);
        }else{
            $this->assign('tab_type',1);
            $result = $this->member->searchMember($where,'m_score desc',15);
            $this->assign('member_list',$result['list']);
            $this->assign('page',$result['page_info']);
        }




        $this->display('memberList');
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

    /**
     * 删除
     */
    public function delMember(){
        $where['m_id'] = $_GET['m_id'];
        $result = $this->member->deleteMember($where);
        if($result){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 堂食增加积分
     */
    public function addScore(){
        if(empty($_POST)){
            $this->display("addScore");
        }else{
            if($_POST['m_score']<=0){
                $this->error("积分输入有误");
            }
            $is_tel = preg_match('/^1[0-9]{10}$/',$_POST['m_tel']);
            if($is_tel!=1){
                $this->error("您输入的不是手机号");
            }
            $user_info = $this->member->findMember(array('m_tel'=>$_POST['m_tel']));
            if(empty($user_info)){
                //创建用户并加上积分
                if(empty($_POST['m_work']) || empty($_POST['m_tel']) || empty($_POST['m_name']) || empty($_POST['m_address']) || empty($_POST['m_score'])){
                    $this->error("表单没有填写完整");
                }
                if($data=$this->member->create()){
                    $data['m_level_score'] = $_POST['m_score'];
                    $data['ctime'] = time();
                    $data['m_card_num'] = rand(10000000,99999999);

                    if($this->member->add($data)){
                        $this->success("添加成功");
                    }else{
                        $this->error("添加失败");
                    }
                }else{
                    $this->error("数据对象创建失败");
                }
            }else{
                //加兑换积分
                $add_res = $this->member->where(array('m_tel'=>$_POST['m_tel']))->setInc('m_score',$_POST['m_score']);
                //加等级积分
                $level_res = $this->member->where(array('m_tel'=>$_POST['m_tel']))->setInc('m_level_score',$_POST['m_score']);
                if($add_res && $level_res){
                    $this->success("添加成功");
                }else{
                    $this->error("添加失败");
                }

            }
            
        }

    }

    /**
     * 清空等级积分
     */
    public function delLevelScore(){
        if($_SESSION['g_id']!=99){
            $this->error("只有顶级管理员具有此项操作权限");
        }
        $data['m_level_score'] = 0;
        $Member = D("Member");
        $res = $Member->where(array('status'=>'0'))->save($data);
        if($res){
            $this->success("操作成功");
        }else{
            $this->error("操作失败");
        }
    }
}