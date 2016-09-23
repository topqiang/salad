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
	  <a href="javascript:history.go(-1)" class="arrow-l"></a>
	  <h2>Daisy Fresh</h2>
	</header>
	<div class="con-wrap-bt">
		<ul class="login">
			<li>
                <input type="tel" style="width:95%" placeholder="请输入手机号码" class="phone-inpt inpt" id="mobile" onblur="checkhas()" name="mobile" maxlength="11" data-language="">
			</li>
			<li class="fl-clr">
				<input type="password" placeholder="请输入密码" class="pwd-inpt inpt" id="pwd" name="pwd">
			</li>
			<li class="fl-clr">
				<input type="password" placeholder="请确认密码" class="pwd-inpt inpt" id="repwd" name="repwd">
			</li>
		</ul>
		<button class="login-btn" onclick="register()"><font id="_df1_bt_load" style="">注册</font></button>
		<span style="color:red;float:right;" id="msg"></span>
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
function register(){
	var tel = $("#mobile").val();
	var pwd = $("#pwd").val();
	var repwd = $("#repwd").val();
	var test = /^1[3|4|5|7|8][0-9]{9}$/;
	if ( $.trim(tel) == "") {
		$("#msg").text("注册手机号不能为空！");
	}else if (!test.test(tel)) {
		$("#msg").text("手机号输入不合法！");
	}else if (pwd != repwd) {
		$("#msg").text("两次密码不一样！");
	}else{
		$.ajax({
			url:"<?php echo U('User/register');?>",
			type:"post",
			data:{"tel":tel,"pwd":pwd,"repwd":repwd},
			dataType:"json",
			success:function (data) {
				console.log(data);
				if (data == "success") {
					window.location.href='<?php echo U('Index/index');?>';
				};
			}
		});
	}
	$("input").on('tap',function(){
		$("#msg").text("");
		$("input").off('tap');
	});
}
function checkhas () {
	var tel = $("#mobile").val();
	var test = /^1[3|4|5|7|8][0-9]{9}$/;
	if ( $.trim(tel) == "") {
		$("#msg").text("注册手机号不能为空！");
	}else if (!test.test(tel)) {
		$("#msg").text("手机号输入不合法！");
	}else{
		$.ajax({
			url : "<?php echo U('User/checkhas');?>",
			type : "post",
			data : {"tel" : tel},
			dataType : "json",
			success : function(data){
				if (data == "success") {
					$("#msg").text("手机号已注册！");
				}else{
					console.log(data);
				}
			}
		});
	}
	$("#mobile").on('tap',function(){
		$("#msg").text("");
	});
}
</script>

</body></html>