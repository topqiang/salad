<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0061)http://daisyfresh.21move.net/df4.html?rand=0.8027869819197804 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>Daisy Fresh</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/reset.css">
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/fakeLoader.css">
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/df2015.css"></head>
<body>
	<div class="fakeloader" style="position: fixed; width: 100%; height: 100%; top: 0px; left: 0px; z-index: 999; display: none; background-color: rgb(68, 68, 68);"><div class="fl spinner2" style="position: fixed; left: 50%; top: 50%;"><div class="spinner-container container1"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container2"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container3"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div></div></div>
<style type="text/css">
	body{
		background: #e6e7e1;
	}
</style>
	<header>
		<a href="javascript:history.go(-1);" class="arrow-l"></a>
		<h2><font id="_df29_2_title" style="">余额明细</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
	<div class="con-wrap">
        <div class="sh-det-outer" id="myCardDetail" scrollpagination="enabled" style="display: none;">
            
        </div>
        
        <div class="no-content" id="myNoDataShowArea" style="">
            <p>
            <font id="_df_data_empty" style="">暂无数据</font>
            </p>

            <a href="<?php echo U('User/recharge');?>">
	            <div class="no-btn">
	                <font id="_df29_go_charge" style="">去充值</font>
	            </div>
            </a>
        </div>
        <div class="U-login-warp" id="loading" style="display: none;">
            <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                <tbody><tr>
                	<td align="center"><span class="U-gary-color" style="font-size:1rem"><font id="_tip_add_loading" style="">正在载入…</font></span></td>
                </tr>
            </tbody></table>
        </div>
        <div class="U-login-warp" id="nomoreresults" style="display:none">
            <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                <tbody><tr>
                	<td align="center"><span class="U-gary-color" style="font-size:1rem"><font id="_df_added_all" style="">已加载全部</font></span></td>
                </tr>
            </tbody></table>
        </div>
	</div>
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jweixin-1.0.0.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/personal.js"></script>
<script language="javascript">
$(function(){
	
});

</script>

</body></html>