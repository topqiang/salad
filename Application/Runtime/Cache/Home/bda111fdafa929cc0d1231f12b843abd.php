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
		<a href="http://daisyfresh.21move.net/df5-1.html" class="arrow-l"></a>
		<h2><font id="_df5_2_title" style="">选酱料</font></h2>
		<font id="CartLine"><span class="cart-ico"><em><?php echo ($count); ?></em></span></font>
	</header>
	<div class="con-wrap-bt">
		<div class="choose-con-2">
			<ul id="SauceList">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?><li id="<?php echo ($obj["fid"]); ?>" name="<?php echo ($obj["fname"]); ?>">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr>
								<td class="td-1">
									<img src="/salad/<?php echo ($obj["fpic"]); ?>">
								</td>
								<td class="td-2"><?php echo ($obj["fname"]); ?></td>
								<td class="td-3"></td>
							</tr>
						</tbody>
					</table>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
	<div class="choose-menu">
	    <div class="fl-clr">
			<div class="choose-l">
				<div class="td-1"><span id="IsShredLine" class="on"><font id="_df5_2_need_cut" style="">需要切碎</font></span></div>
			</div>
			<div class="menu-r">
				<div class="cart-btn" onclick="savejc()">
					<img src="/salad/Public/Home/images/d5-btn-ico.png" width="30"><font id="_df5_2_secelt_ok" style="">选好了</font>
				</div>
			</div>
		</div>
	</div>
<input type="hidden" name="BaseIsShred" id="BaseIsShred" value="1">
<input type="hidden" name="MainIsShred" id="MainIsShred" value="1">
<input type="hidden" name="IsShred" id="IsShred" value="1">
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="./js/wewing.token.js"></script>
<script src="./js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/salad.js"></script>
<script language="javascript">
function savejc(){
	var goods =JSON.parse(sessionStorage.getItem("goods"));
	var type = goods.name ? goods.name : "big";
	var foods = goods.foods ? goods.foods : [];
	var obj = {};
	obj.foodsid = $("li.on").attr("id");
	obj.foodsname = $("li.on").attr("name");
	obj.num = 1;
	foods.push(obj);
	goods.foods = foods ;
	if (sessionStorage) {
		// sessionStorage.setItem("goods",null);
	};
	$.ajax({
		url  : "<?php echo U('Goods/goodsAdd');?>",
		type : "post",
		data : goods,
		dataType : "json",
		success : function(data){
			if (data == "error") {
				alert("购买失败！请重新购买！");
				window.location.href = '<?php echo U("Index/diyjc");?>';
			}else{
				window.location.href = '<?php echo U("Goods/gley");?>';
			}
		}
	});
}


$(function(){
	$("#SauceList li").on('tap',function(){
		var self = $(this);
		self.addClass("on").siblings().removeClass("on");
	});
	$("#IsShredLine").on('tap',function(){
		var self = $(this);
		if (self.hasClass("on")) {
			self.removeClass("on");
		}else{
			self.addClass("on");
		}
	});
});
</script>
 
</body></html>