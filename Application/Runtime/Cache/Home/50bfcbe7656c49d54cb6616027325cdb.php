<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
		<meta charset="Utf-8">
		<title>桃花签</title>
		<link rel="stylesheet" type="text/css" href="/xjl/Public/Home/css/public.css">
		<link rel="stylesheet" type="text/css" href="/xjl/Public/Home/css/xq.css"/>
		<style type="text/css">
			.top{
				height: 30%;	
			}
			#logo{
				height: 65%;
				margin-top: 10%;
			}
			.xiong3{
				position: absolute;
				left: 5%;
				width: 30%;
			}
			.main{
				bottom: 44%;
			}
			.footerdown{
				height: 40%;
			}
			.xiong2{
				position: absolute;
				bottom: 0px;
				right: 30px;
				width: 30%;
			}
			.qiat{
				position: absolute;
				bottom: 20%;
				left: 50%;
				width: 40%;
				margin-left: -20%;
			}
			.qiatdiv{
				position: absolute;
				top: -65px;
				left: 50%;
				width: 40%;
				margin-left: -20%;
				display: flex;
				justify-content: space-around;
				flex-wrap: wrap;
				color: #fff;
			}
			.qiatdiv span{
				position: absolute;
				border-radius: 5px;
				border:1px solid #fff ;
				-webkit-animation:piao 1s ease-out infinite alternate;
			}
			.qiatdiv span:nth-child(1){
				left: -10px;
				top: -15px;
				-webkit-animation-delay: 0.2s;
			}
			.qiatdiv span:nth-child(2){
				top: -30px;
				right: -12px;
				-webkit-animation-delay: 0.4s;
			}
			.qiatdiv span:nth-child(3){
				top:-45px;
				left: 55px;
				margin-top: 20px;
			}
			.qiatdiv span:nth-child(4){
				right: -12px;
				-webkit-animation-delay: 0.6s;
			}
			.qiatdiv span:nth-child(5){
				left: 55px;
				margin-top: 20px;
				-webkit-animation-delay: 0.8s;
			}
			.qiatdiv span:nth-child(6){
				top: 21px;
				left: -10px;
			}
			.piyh{
				position: absolute;
				top: -25%;
				left: 0px;
				width: 30%;
			}
			.zhyh{
				position: absolute;
				width: 20%;
				top: -28%;
				right: 0px;
			}
			.input{
				position: absolute;
				left: 30%;
				background: #fff;
				width: 60%;
				padding: 5px;
				height: 26%;
				top: 20%;
			}
			.textarea{
				color: #BF2365;
				border: 1px solid #BF2365;
				height: 100%;
				text-align: center;
			}
			.textarea p{
				font-family: 'pfont';
				height: 50%;
			}
			@-webkit-keyframes piao{
				0%{transform:translateY(30px)}
				100%{transform:translateY(50px)}
			}
		</style>
	</head>
	<body>
		<div class="content">
			<div class="top">
				<img src="/xjl/Public/Home/img/logo2.png" id="logo"/>
			</div>
			<div class="main">
				<div class="input">
					<div class="textarea">
						<p><span><?php echo ($name); ?></span>&nbsp;<span>为爱之路</span></p>
						<p><span>默念心愿摇出你的幸福桃花签</span></p>
					</div>
				</div>
				<img src="/xjl/Public/Home/img/xiong3.png" class="xiong3"/>
			</div>
			<div class="footerdown">
				<img src="/xjl/Public/Home/img/piyh.png" class="piyh"/>
				<img src="/xjl/Public/Home/img/zhyh.png" class="zhyh"/>
				<img src="/xjl/Public/Home/img/qiat.png" class="qiat animated"/>
				<img src="/xjl/Public/Home/img/xiong2.png" class="xiong2"/>
				<!--<div class="qiatdiv">
					<?php if(is_array($qnamearr)): $i = 0; $__LIST__ = $qnamearr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$qname): $mod = ($i % 2 );++$i;?><span><?php echo ($qname["qname"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>-->
			</div>
		</div>
	</body>
	<script type="text/javascript" src="/xjl/Public/Home/js/zepto.js"></script>
	<script type="text/javascript" src="/xjl/Public/Home/js/touch.js"></script>
	<script type="text/javascript">;
		$(function () {
			//初始化背景图片大小，自适应屏幕
			var h=document.documentElement?document.documentElement.clientHeight:document.body.clientHeight;
			var w=document.documentElement?document.documentElement.clientWidth:document.body.clientWidth;
			$(".content").css({"width":w,"height":h});
			$(".textarea p").css({"line-height":$(".textarea p").height()+"px"});
			$(".qiat").eq(0)[0].addEventListener("animationend",function(){
				$(".qiat").removeClass("leftdown");
				location.href="Thqian/thq/name/<?php echo ($name); ?>";
			});
			$(".qiat").eq(0)[0].addEventListener("webkitAnimationStart",function(){
				$(".qiat").removeClass("leftdown");
				location.href="Thqian/thq/name/<?php echo ($name); ?>";
			});
		});
		var shake = (function(){
        var speed = 15; //摇一摇速度的临界值
        var x = y = z = lastX = lastY = lastZ = 0;
        var isShaking = false; //是否在动画中
        return function init(callback){
                if(window.DeviceMotionEvent){
                        window.addEventListener('devicemotion', function(){deviceMotionHandler(callback);}, false)
                }else{
                        alert("not support mobile motion event");
                }
        }
        function deviceMotionHandler(callback){
                /*获取x,y,z方向的即时速度*/
                var acceleration = event.accelerationIncludingGravity;
                x = acceleration.x;y = acceleration.y;z = acceleration.z;
                if(Math.abs(x-lastX) > speed || Math.abs(y-lastY) > speed || Math.abs(z-lastZ) > speed){
                    if(!isShaking){
                        //手机震动一秒
                        if (navigator.vibrate) {
                            navigator.vibrate(1000);
                        }else if (navigator.webkitVibrate) {
                            navigator.webkitVibrate(1000);
                     }
                isShaking = true;
                setTimeout(function(){
                        callback();
                        isShaking = false;
                },500);
                        }
                }
                lastX = x;lastY = y;lastZ = z;
        }
		}());
		new shake(function(){
			$(".qiat").addClass("leftdown");
		});
	</script>
</html>