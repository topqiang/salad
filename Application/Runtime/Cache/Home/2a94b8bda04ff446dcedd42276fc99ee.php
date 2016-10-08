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
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/xq_slide.css"/>
<style type="text/css">
	body{
		background: #005740;
    	padding-bottom: 52px;
	}
</style>
	<div class="index-top">
		<div class="banner" style="height: 245px;">
			<div class="xq_slide_out">
				<ul class="xq_slide_in">
					<?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?><li>
						<a href="javascript:;"><img src="/salad/<?php echo ($obj["pic"]); ?>"></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
        <div class="index-hd">
			<i onclick="$(&#39;#HomeLeftNav&#39;).slideDown(&#39;fast&#39;);"></i>
			<div id="CartLine">
				<a href="<?php echo U('Goods/gley');?>">
					<span class="cart-ico">
						<em><?php echo ($count); ?></em>
					</span>
				</a>
			</div>
		</div>
	</div>
	<div class="index-logo">
		<img src="/salad/Public/Home/images/d4-logon.png" width="100%">
	</div>
	<a href="<?php echo U('Index/diy');?>">
		<div class="adv">
			<img src="/salad/Public/Home/images/d4-tit-icon.png" width="32"><font id="_sala_diy">沙拉DIY</font>
		</div>
	</a>
	<div class="nav">
    	<table>
			<tbody>
				<tr>
					<td class="homeNav nav-1">
						<a href="<?php echo U('Goods/goodlist',array('cname'=>'帮选沙拉'));?>" data="<?php echo U('Index/saselect');?>">
							<div>
								<img src="/salad/Public/Home/images/nav-back.png" width="100%">
								<p><font id="_help_select" style="">帮选沙拉</font></p>
							</div>
						</a>
					</td>
					<td class="homeNav nav-2">
						<a href="" data="<?php echo U('Goods/goodlist',array('cname'=>'三明治'));?>">
							<div>
								<img src="/salad/Public/Home/images/nav-back.png" width="100%">
								<p id="HomeSubject_2">敬请期待</p>
							</div>
						</a>
					</td>
					<td class="homeNav nav-3">
						<a href="<?php echo U('Goods/goodlist',array('cname'=>'鲜榨果汁'));?>" data="">
							<div>
								<img src="/salad/Public/Home/images/nav-back.png" width="100%">
								<p id="HomeSubject_3">鲜榨果汁</p>
							</div>
						</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
    <div class="bottom-menu" style="display:none"> 
		<ul class="bt-menu-inner fl-clr">
			<li>
				<a href="<?php echo U('Address/index',array('type'=>'1'));?>"><span>到店自提</span></a>
			</li>
			<li>
				<a href="<?php echo U('Address/index',array('type'=>'2'));?>"><span>送货上门</span></a>
			</li>
			
		</ul>
	</div>
    <div class="select-menu" style="display:none" id="HomeLeftNav">
	<span onclick="$(&#39;#HomeLeftNav&#39;).slideUp(&#39;fast&#39;);"></span>
	<ul>
		<li>
			<a href="<?php echo U('Index/index');?>" class="menu-ico ico-1"><font id="_df4_home" style="">首页</font></a>
		</li>
		<li>
			<a href="<?php echo U('Goods/goodlist',array('cname'=>'帮选沙拉'));?>" class="menu-ico ico-2"><font id="_df4_plan" style="">订餐</font></a>
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
<!-- <script src="js/wewing.token.js"></script> -->
<!-- <script src="js/wewing.init.js"></script> -->
<script type="text/javascript" src="/salad/Public/Home/js/jquery.picSlide.storeHome.js"></script>
<script type="text/javascript" src="/salad/Public/Home/js/jquery.touchwipe.js"></script>
<script src="/salad/Public/Home/js/xq_slide.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/home.js"></script>
<script language="javascript">
$(".xq_slide_out").xq_slide({
	type:"h",//轮播方式  h水平轮播；v垂直轮播；o透明切换
	vatical:false,//图片描述性文本 true 显示  false不显示
	choseBtn:false,//是否显示上下切换按钮
	speed:2000,//动画间隔的时间，以毫秒为单位。
	mousestop:true,//当鼠标移上去是否停止循环,针对PC端
	showbar:true,//是否显示轮播导航bar
	openmb:true//是否开启移动端支持
});
</script>

</body></html>