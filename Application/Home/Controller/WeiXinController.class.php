<?php
namespace Home\Controller;
use Think\Controller;
/**
 *
 */
 class WeiXinController extends Controller
 {
    
    function _initialize(){
        
    }
    /**
    *@author topqiang
    *@description 微信默认访问路径，以及请求分发
    *@date 2016-08-11
    */
    public function index(){
        $nonce=$_GET['nonce'];
        $token='test';
        $timestamp=$_GET['timestamp'];
        $singnature=$_GET['signature'];
        $echostr=$_GET['echostr'];
        $arr=array($token,$nonce,$timestamp);
        $str=sha1(implode(sort($arr)));
        if (!empty($echostr)) {
            echo($echostr);
        }else{
            $Article = A('Api/WeiXin');
            $Article->responseMsg();
        }
    }
 } 