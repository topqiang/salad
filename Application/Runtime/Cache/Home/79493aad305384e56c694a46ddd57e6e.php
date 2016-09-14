<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
		<meta charset="Utf-8">
		<title>桃花签</title>
		<link rel="stylesheet" type="text/css" href="/xjl/Public/Home/css/public.css">
	</head>
	<body>
		<div class="content">
			<div class="top">
				<img src="/xjl/Public/Home/img/logo.png" id="logo"/>
			</div>
			<div class="main">
				<div class="input">
					<div class="inputdiv" contenteditable="true">请输入您的姓名</div>
					<img src="/xjl/Public/Home/img/redh.png" class="redh"/>
				</div>
				<div class="btn">
					<div class="btndiv"><!--我要摇签--></div>
					<img class="muyh" src="/xjl/Public/Home/img/muyh.png"/>
				</div>
			</div>
			<div class="footerdown">
				<img src="/xjl/Public/Home/img/hoyh.png" class="hoyh"/>
				<img src="/xjl/Public/Home/img/nj.png" class="nj"/>
				<img src="/xjl/Public/Home/img/xiong.png" class="xiong"/>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="/xjl/Public/Home/js/zepto.js"></script>
	<script type="text/javascript" src="/xjl/Public/Home/js/touch.js"></script>
	<script type="text/javascript">;
//		$(function () {
			//初始化背景图片大小，自适应屏幕
			var h=document.documentElement?document.documentElement.clientHeight:document.body.clientHeight;
			var w=document.documentElement?document.documentElement.clientWidth:document.body.clientWidth;
			$(".content").css({"width":w,"height":h});
			$(".btndiv").on('tap',function(){
				//获取页面触摸事件
				if($.trim($(".inputdiv").text())=="" || $.trim($(".inputdiv").text())=="请输入您的姓名"){
					alert("请输入您的姓名！");
					return;
				}
				location.href="<?php echo U('Thqian/check');?>/name/"+$.trim($(".inputdiv").text());
			});
			$(".inputdiv").on('tap',function(){
				$(this).text('').focus();
			});
//		});
	</script>
</html>