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
		<h2><font id="_df7_title" style="">订餐</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
	<div>
		<div class="sch-inner fl-clr">
			<input type="text" class="pro-inp inpt" placeholder="搜索商品名称" id="key" name="key">
			<button class="sch-btn" onclick="searchDo()"></button>
		</div>
	</div>
	<div class="black-layer-2">
		<dl class="hot-list" id="hotwordlist"><dt>热门搜索</dt><dd>沙拉</dd><dd>可乐</dd><dd>营养</dd></dl>
	</div>
	<script src="/salad/Public/Home/js/config.js"></script>
	<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
	<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
	<script src="/salad/Public/Home/js/search.js"></script>
	<script language="javascript">
	function searchDo () {
		var key = $.trim($("#key").val());
		if (key == "") {
			alert("搜索内容不能为空！");
		}else{
			window.location.href="<?php echo U('Goods/findgood');?>/key/"+key;
		}
	}
	</script>
</body>
</html>