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
	  <h2><font id="_keep_payment" style="">储值账户</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
	<div class="con-wrap">
		<a href="<?php echo U('User/balance');?>">
			<div class="acc-tit">
				<font id="_df29_can_pay" style="">可用余额</font>：<i>￥<font id="balancePrice">0.00</font></i>
			</div>
		</a>
		<div class="cou-outer">
			<ul class="cou-tit fl-clr" style="display:none">
				<li class="on"><span><font id="_df29_charge_online" style="">在线充值</font></span></li>
				<li><span><font id="_df29_vcard_charge" style="">消费卡充值</font></span></li>
			</ul>
			<div class="pay-online">
				<div class="pay-online-inner">
					<ul class="fl-clr" id="PriceList">
						<li id="100" title="" onclick="CRM_PI.SetPriceDo(&#39;100&#39;);" class="on">100元</li>
						<li id="200" title="" onclick="CRM_PI.SetPriceDo(&#39;200&#39;);">200元</li>
						<li id="300" title="" onclick="CRM_PI.SetPriceDo(&#39;300&#39;);">300元</li>
						<li id="500" title="" onclick="CRM_PI.SetPriceDo(&#39;500&#39;);">500元</li>
					</ul>
					<input type="tel" placeholder="100元" value="100" id="price" name="price" class="inp-mny">
					<p class="mark-bl" id="RuleTitle"></p>
				</div>
			</div>
		</div>
	</div>
	<div class="bt-btn"><font id="_df29_go_charge" style="">去充值</font></div>
    <div class="black-layer" id="PayTypeLine" style="display:none">
		<div class="pay-mth">
			<p id="PayPriceShow"></p>
			<ul>
				<li>
					<font id="_df_weixin_pay" style="">微信支付</font>
				</li>
			</ul>
		</div>
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

</body></html>