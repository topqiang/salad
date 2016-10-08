<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0061)http://daisyfresh.21move.net/df4.html?rand=0.8027869819197804 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>Happy Daze</title>
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
	<div class="top-bar-wrap">
		<i onclick="$(&#39;#HomeLeftNav&#39;).slideDown(&#39;fast&#39;);"></i>
		<h2><font id="_df_35_title" style="">我的账户</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</div>
	<div class="myacc-tit">
		<dl>
			<dt><div class="hd-inner"><img src="<?php echo ($user["pic"]); ?>" id="UserIcon"></div></dt>
			<dd>
				<p id="UserName"><?php echo ($user["tel"]); ?></p>
				<h2 style="display:none">会员等级：初级</h2>
			</dd>
		</dl>
	</div>
	<div class="con-wrap">
		<ul class="account-list">
	        <li>
	        <a href="<?php echo U('Order/orderlist');?>">
	           <table width="100%" cellpadding="0" cellspacing="0" border="0">
	                <tbody>
	                <tr>
	                  <td align="left"><span class="U-black-color icons-1"><font id="_df22_0_title" style="">最近订单</font></span></td>
	                  	<td><span class="r-arrow"></span></td>
	                 </tr>
	       			</tbody>
	       		</table>
	       	</a>
	        </li>  
	    </ul>
		<ul class="account-list">
	        <li>
	           <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
	                    <tr onclick="location.href='<?php echo U('Address/index');?>'">
	                      <td align="left">
	                      	<span class="U-black-color icons-2"><font id="_df35_manager_address" style="">管理收货地址</font></span>
	                      </td>
	                      <td><span class="r-arrow"></span></td>
	                    </tr>
           			</tbody>
	           </table>
	        </li>  
	        <li>
	           <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
	                    <tr onclick="location.href='<?php echo U('User/recharge');?>'">
	                      <td align="left"><span class="U-black-color icons-3"><font id="_df29_title" style="">储值账户</font></span><span class="mark-bl" id="cardamount">￥0.00</span></td>
	                    </tr>
	           		</tbody>
	           </table>
	        </li>
	     
	        <li style="display:none">
	           <table width="100%" cellpadding="0" cellspacing="0" border="0">
	                <tbody><tr>
	                    <td align="left"><span class="U-black-color icons-4"><font id="_df47_title" style="">我的卡包</font></span><span class="mark-bl" id="kbamount">(0张未使用)</span></td>
	                      <td><span class="r-arrow">&nbsp;</span> </td></tr>
	        		</tbody>
	           </table>
	        </li>
		</ul>
		<ul class="account-list">
	        <li>
	        	<a href="<?php echo U('User/setself');?>">
		           <table width="100%" cellpadding="0" cellspacing="0" border="0">
		                <tbody>
		                	<tr>
			                    <td align="left"><span class="U-black-color icons-5"><font id="_df36_title" style="">设置</font></span></td>
			                    <td><span class="r-arrow"></span></td>
		                    </tr>
		           		</tbody>
		           </table>
	           	</a>
	        </li>  
	        <li style="display:none">
	           	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	                <tbody>
		                <tr>
		                   	<td align="left"><span class="U-black-color icons-6">常见问题</span></td>
		                    <td><span class="r-arrow"></span></td>
		                </tr>
	           		</tbody>
	            </table>
	        </li>
		</ul>
	</div>
	<a href="tel:010-64796887" class="tel">010-64796887</a>
    
	<div class="select-menu" style="display:none" id="HomeLeftNav">
	<span onclick="$(&#39;#HomeLeftNav&#39;).slideUp(&#39;fast&#39;);"></span>
	<ul>
		<li>
			<a href="<?php echo U('Index/index');?>" class="menu-ico ico-1"><font id="_df4_home" style="">首页</font></a>
		</li>
		<li>
			<a href="<?php echo U('Index/saselect');?>" class="menu-ico ico-2"><font id="_df4_plan" style="">订餐</font></a>
		</li>
		<li>
			<a href="<?php echo U('Index/diy');?>" class="menu-ico ico-3"><font id="_df4_self_pick" style="">自选</font></a>
		</li>
		<li>
			<a href="<?php echo U('Order/orderlist');?>" class="menu-ico ico-4"><font id="_df4_order" style="">订单</font></a>
		</li>
		<!-- <li>
			<a href="<?php echo U('Room/bulidshop');?>" class="menu-ico ico-5"><font id="_df4_shop" style="">门店</font></a>
		</li> -->
		<li>
			<a href="<?php echo U('User/self');?>" class="menu-ico ico-6"><font id="_df4_mine" style="">我的</font></a>
		</li>
	</ul>
</div>
	<script src="/salad/Public/Home/js/config.js"></script>
	<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
	<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
	<script src="/salad/Public/Home/js/personal.js"></script>
	<script language="javascript">
		$(function(){
			
		});
	</script>

</body>
</html>