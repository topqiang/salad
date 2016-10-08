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
	<div class="top-bar-wrap">
		<i onclick="$(&#39;#HomeLeftNav&#39;).slideDown(&#39;fast&#39;);"></i>
		<h2><font id="_df5_title" style="">选基菜</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em class="goodtotal"><?php echo ($count); ?></em></span></a></font>
	</div>
	<div class="con-wrap-bt2">
		<div class="top-tit fl-clr">
			<ul class="tit-1 fl-clr">
				<!-- <li type="big"><font id="_df5_big" style="">我要大份</font></li> -->
				<li type="small" class="on" style="width:100%"><font id="_df5_small" style="">我要沙拉</font></li>
				<!-- <li type="free"><font id="_df5_free" style="">自由卷</font></li> -->
			</ul>
		</div>
        <!-- <p style="font-size: 14px; color: rgb(187, 187, 187); line-height: 22px; text-align: center; padding: 6px 12px 0px;" id="RlueLine_1"><font id="_df5_tipbig" style="">规则：大碗沙拉基础菜可选4份，单个菜品可重复选择</font></p> -->
        <p style="font-size:14px; color:#bbb; line-height: 22px; text-align:center; padding:6px 12px 0;" id="RlueLine_2"><font id="_df5_tipsmall" style="">规则：自选沙拉基础菜可选4份，单个菜品可重复选择</font></p>
        <!-- <p style="font-size:14px; color:#bbb; line-height: 22px; text-align:center; padding:6px 12px 0; display:none;" id="RlueLine_3"><font id="_df5_tip" style="">规则：自选卷沙拉基础菜可选1份</font></p> -->
		<div class="choose-con">
			<ul id="BaseList">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?><li id="<?php echo ($obj["fid"]); ?>" name="<?php echo ($obj["fname"]); ?>">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tbody>
								<tr>
									<td class="td-1">
										<img src="/salad/<?php echo ($obj["fpic"]); ?>">
									</td>
									<td class="td-2"><?php echo ($obj["fname"]); ?></td>
									<td class="td-3 fl-clr">
										<em class="car-add-l"></em>
										<input type="text" id="<?php echo ($obj["fid"]); ?>" name="<?php echo ($obj["fname"]); ?>" value="0" readonly="" class="inpt-shu">
										<em class="car-add-r"></em>
									</td>
								</tr>
							</tbody>
						</table>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		
	</div>
	<div class="cart-menu">
		<div>
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody>
					<tr>
						<td class="td-2"><font id="_df5_hace" style="">已有</font><i id="BaseTotalCountLine">0</i><font id="_df5_unit" style="">份</font></td>
						<td class="td-3" onclick="savejc()"><em><font id="_df5_contiue_secelt">继续选菜</font></em></td>
					</tr>
				</tbody>
			</table>
            <input type="hidden" name="BaseIsShred" id="BaseIsShred" value="1">
		</div>
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
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="./js/wewing.token.js"></script>
<script src="./js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/salad.js"></script>
<script language="javascript">
function savejc(){
	var type = $("li.on").attr("type");
	var foods = [];
	$(".inpt-shu").each(function(){
		var obj = {};
		var self = $(this);
		if ( self.val() > 0) {
			obj.foodsid = self.attr("id");
			obj.foodsname = self.attr("name");
			obj.num =  self.val();
			foods.push(obj);
		};
	});
	if (foods.length <= 0) {
		alert("基菜不能为空！");
		return;
	};
	var goods = {"name" : type , "foods" : foods};
	if (sessionStorage) {
		sessionStorage.setItem("goods",JSON.stringify(goods));
	};
	$(".inpt-shu").val("0");
	window.location.href = '<?php echo U("Index/diyzc");?>'+'/type/'+type;
}


$(function(){
	var totalnum = 4;//存储最多可选数
	$("ul.tit-1.fl-clr li").on('tap',function(){
		var self = $(this);
		if ( self.attr("type") == "free") {
			totalnum = 1;
		}else{
			totalnum = 4;
		}
		$(".inpt-shu").val(0);
		$("#BaseTotalCountLine").html(0);
		self.addClass("on").siblings().removeClass("on");
		$(".top-tit.fl-clr").siblings("p").eq(self.index()).show().siblings("p").hide();
	});
	$("td.td-3.fl-clr em").on('tap',function(){
		var self = $(this);
		var input =  self.siblings("input");
		var BaseTotalCountLine = $("#BaseTotalCountLine");
		var total = BaseTotalCountLine.html();
		var num = input.val();
		if ( self.hasClass("car-add-l") ) {
			total--;
			if (num > 0) {
				input.val(--num);
				BaseTotalCountLine.html(total);
			}else{
				alert("饶了我吧，亲");
			}
		};
		if ( self.hasClass("car-add-r") ) {
			if (total < totalnum) {
				input.val(++num);
				BaseTotalCountLine.html(++total);
			}else{
				alert("主菜不能超过"+totalnum+"个");
			}
		};
	});
});
</script>

</body></html>