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
	<header>
	  <a href="http://daisyfresh.21move.net/df4.html" class="arrow-l"></a>
	  <h2>Daisy Fresh</h2>
	</header>
	<div class="con-wrap-bt">
		<ul class="login">
			<li>
                <input type="tel" style="width:95%" placeholder="请输入手机号码" class="phone-inpt inpt" id="mobile" name="mobile" maxlength="11" data-language="">
			</li>
			<li class="fl-clr">
				<input type="tel" placeholder="请输入手机验证码" class="num-inpt inpt" id="code" name="code">
				<button class="yzm-btn" id="GetCAPTCHAButton"><font id="SCBL">38</font></button>
			</li>
		</ul>
		<button class="login-btn" onclick="login()"><font id="_df1_bt_load" style="">登录</font></button>
	</div>
    <input type="hidden" name="ss" id="ss" value="38">
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jweixin-1.0.0.js"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script> -->
<!-- <script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/passport.js"></script>
<script language="javascript">
$(function(){

});
function login(){
	var tel = $("#mobile").val();
	var code = $("#code").val();
	$.ajax({
		url:"<?php echo U('User/login');?>",
		type:"post",
		data:{"mobile":tel,"code":code},
		dataType:"json",
		success:function (data) {
			console.log(data);
			window.location.href='<?php echo U('Index/index');?>';
		}
	});
}
</script>

</body></html>