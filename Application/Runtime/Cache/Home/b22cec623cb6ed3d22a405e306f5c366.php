<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
		<meta charset="Utf-8">
		<title>桃花签</title>
		<link rel="stylesheet" type="text/css" href="/xjl/Public/Home/css/public.css">
		<link rel="stylesheet" type="text/css" href="/xjl/Public/Home/css/xq.css"/>
		<style type="text/css">
			body{
				background: #fff;
			}
			.footerdown{
				height: 10%;
				text-align: center;
				font-size: 22px;
				color: #BF2365;
			}
			.input{
				margin: 5px;
				background: #fff;
				height: 90%;
				box-sizing: border-box;
			}
			.textarea{
				color: #BF2365;
				padding: 10px;
				border: 1px solid #BF2365;
				height: 100%;
				text-align: center;
				box-sizing: border-box;
				/*background: url(img/bg1.png) 10px 10px no-repeat;*/
				/*background-size: 100% 100%;*/
			}
			.textarea .img{
				position: relative;
				width: 100%;
				height: 100%;
			}
			.img img.bg{
				float: left;
				width: 100%;
				height: 100%;
			}
			.img .context{
				box-sizing: border-box;
				width: 80%;
				height: 80%;
				position: absolute;
				left: 10%;
				top: 10%;
				padding: 10px;
				background: rgba(255,255,255,0.6);
			}
			.border{
				color: #BF2365;
				border: 1px solid #BF2365;
				height: 100%;
				text-align: center;
				position: relative;
			}
			.img .xiong4{
				position: absolute;
				bottom: 0px;
				right: 5px;
				width: 120px;
				height: 240px;
			}
			.img .code{
				position: absolute;
				bottom: 40px;
				right: 25px;
				width: 80px;
				height: 80px;
			}
			.desc{
				position: absolute;
				left: 5px;
				bottom: 5px;
				color: #fff;
			}
			.border div{
				position: absolute;
			}
			.name{
				top: 10px;
				left: 33px;
				width: 28px;
				font-size: 28px;
			}
			.qname{
				top: 25px;
				left: 50%;
				margin-left: -20px;
				width: 36px;
				font-size: 36px;
			}
			.desctext{
				position: absolute;
				top: 175px;
				height: 50%;
				width: 100%;
			}
			.desctext div{
				width: 50%;
				height: 90%;
				padding: 20px 0px;
			}
			.desctext .dleft{
				left: 0px;
				color: #000000;
			}
			.dleft p{
				width: 14px;
				float: right;
				line-height: 16px;
				margin: 0px 5px;
				font-size: 14px;
			}
			.desctext .dright{
				right: 0px;
				font-size: 30px;
				border-left: 1px solid #BF2365;
			}
			.dright p{
				width: 30px;
				line-height: 35px;
				margin-left: 10px;
			}
			.dah{
				position: absolute;
				top: -20px;
				right: -20px;
				width: 100px;
				height: 40px;
			}
			.xih{
				position: absolute;
				bottom: 0px;
				right: 0px;
				width: 20px;
				height: 20px;
			}
		</style>
	</head>
	<body>
		<div class="content">
			<div class="input">
				<div class="textarea">
					<div class="img">
						<img src="/xjl/Public/Home/img/bg1.jpg" class="bg"/>
						<div class="context">
							<div class="border">
								<div class="qname">
									<?php echo ($qname); ?>
									<img src="/xjl/Public/Home/img/xih.png" class="xih">
								</div>
								<div class="name"><?php echo ($name); ?>的</div>
								<div class="desctext">
									<div class="dleft">
										<?php if(is_array($textarr)): $i = 0; $__LIST__ = $textarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p style="overflow:hidden"><?php echo ($vo); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
									<div class="dright"><p><?php echo ($keywords); ?></p></div>
								</div>
								<img src="/xjl/Public/Home/img/dah.png" class="dah"/>
							</div>
						</div>
						<img src="/xjl/Public/Home/img/xiong4.png" class="xiong4"/>
						<img src="/xjl/Public/Home/img/code1.png" class="code"/>
						<p class="desc">长按识别二维码&nbsp;抽取幸福桃花签</p>
					</div>
				</div>
			</div>
			<div class="footerdown">
				长按识别二维码&nbsp;抽取幸福桃花签
			</div>
		</div>
	</body>
	<script type="text/javascript" src="/xjl/Public/Home/js/zepto.js"></script>
	<script type="text/javascript">;
		$(function () {
			//初始化背景图片大小，自适应屏幕
			var h=document.documentElement?document.documentElement.clientHeight:document.body.clientHeight;
			var w=document.documentElement?document.documentElement.clientWidth:document.body.clientWidth;
			$(".content").css({"width":w,"height":h});
			$('.footerdown').css({"line-height":$(".footerdown").height()+"px"});
		});
	</script>
</html>