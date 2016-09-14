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
		<h2><font id="_df8_title" style="">帮我选沙拉</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
	<div class="con-wrap-bt">
		<div class="menu-wrap">
			<div class="top-tit fl-clr">
				<ul class="tit-1 fl-clr">
					<li type="big" class="on"><font id="_df5_big" style="">我要大份</font></li>
					<li type="samll"><font id="_df5_small" style="">我要小份</font></li>
					<li type="free"><font id="_df5_free" style="">自由卷</font></li>
				</ul>
			</div>
			<div class="main-menu" id="MainClassList">
				<?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?><a href="javascript:;" id="<?php echo ($obj["id"]); ?>" <?php if($key == 0): ?>class="mainherf menu-1 on"<?php else: ?>class="mainherf menu-1"<?php endif; ?>>
						<img src="/salad/Public/Home/images/nav-back.png">
						<span><?php echo ($obj["name"]); ?></span>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
        <div class="no-content" id="myNoDataShowArea" style="display:none">
            <p>
             <font id="_tip_no_goods" style="">此分类下没有相关商品，请查看其他分类。</font>
            </p>
        </div>
		<div id="myDataShowArea">
			<div class="choose-con">
				<ul class="<?php echo ($catelist[0]['id']); ?>">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tbody>
								<tr>
									<td class="td-1">
										<img src="/salad/<?php echo ($vo["fpic"]); ?>">
									</td>
									<td class="td-2"><?php echo ($vo["fname"]); ?></td>
									<td hid="<?php echo ($vo["hid"]); ?>" fid="<?php echo ($vo["fid"]); ?>" <?php if($vo["well"] == 1): ?>class="td-4 on" <?php else: ?>class="td-4"<?php endif; ?> >
										<i></i>
									</td>
									<td hid="<?php echo ($vo["hid"]); ?>" fid="<?php echo ($vo["fid"]); ?>" <?php if($vo["bad"] == 1): ?>class="td-5 on" <?php else: ?>class="td-5"<?php endif; ?> >
										<i></i>
									</td>
								</tr>
							</tbody>
						</table>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="choose-menu">
	    <div class="fl-clr">
			<div class="menu-l fl-clr">
				<dl>
					<dt><i id="LikeCount"><?php echo ($well); ?></i></dt>
					<dd><font id="_like" style="">喜欢</font></dd>
				</dl>
				<dl>
					<dt><i id="UnLikeCount"><?php echo ($bad); ?></i></dt>
					<dd><font id="_avoid" style="">忌口</font></dd>
				</dl>
				<dl>
					<dt><i>0</i></dt>
					<dd><font id="_df8_2_sauces" style="">酱料</font></dd>
				</dl>
			</div>
			<div class="menu-r-2 fl-clr">
				<span class="cut-ico on" id="IsShredLine"><font id="_chop" style="">切碎</font></span>
				<span class="cart-btn-2">
					<a href="<?php echo U('Goods/rangood');?>"><em><font id="_ok" style="">选好了</font></em></a>
				</span>
			</div>
		</div>
	</div>
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/system.salad.js"></script>
<script language="javascript">
$(function(){
	var totalnum = 8;//存储最多可选数
	var well = <?php echo ($well); ?>;//
	var bad = <?php echo ($bad); ?>;

	//大份小份切换
	$("ul.tit-1.fl-clr li").on('tap',function(){
		var self = $(this);
		self.addClass("on").siblings().removeClass("on");
		sessionStorage.setItem( "goodtype" , self.attr("type"));
	});

	//是否切碎切换
	$(".cut-ico").on('tap',function(){
		var self = $(this);
		if (self.hasClass("on")) {
			self.removeClass("on");
			sessionStorage.setItem("cut","true");
		}else{
			self.addClass("on");
			sessionStorage.setItem("cut","true");
		}
	});


	function updem(){
		var self = $(this);
		var type = self.hasClass("td-4") ? "well" : "bad";
		var hid = $.trim(self.attr("hid"));
		var fid = $.trim(self.attr("fid"));
		var change = 0;
		if (self.hasClass("on")) {
			if (type == "well") {
				well--;
			}else if (type == "bad") {
				bad--;
			};
			self.removeClass("on");
		}else{
			var siblings = self.siblings().hasClass("on");
			if (type == "well") {
				if (well >= 8) {
					alert("喜欢最多选择8份");
					return;
				};
				if (siblings) {
					bad--;
				};
				well++;
			}else if (type == "bad") {
				if (bad >= 8) {
					alert("忌口最多选择8份");
					return;
				};
				if (siblings) {
					well--;
				};
				bad++;
			};
			self.addClass("on").siblings().removeClass("on");
			change = 1;
		}
		$.ajax({
			url:"<?php echo U('Goods/updHub');?>",
			type:"post",
			data:{"clum" : type, "zhi" : change ,"hid":hid ,"fid":fid},
			dataType:"json",
			success:function (data) {
				console.log(data);
				if (data == "success") {

				}else{
					self.attr("hid","data").siblings().attr("hid",data);
				}
				$("#LikeCount").html(well);
				$("#UnLikeCount").html(bad);
			}
		});
	}

	//初始化绑定喜欢不喜欢事件
	$("td.td-4,td.td-5").on('tap', updem );


	$(".main-menu a").on("tap",function(){
		var self = $(this);
		var id = self.attr("id");
		self.addClass("on").siblings().removeClass("on");
		if ($(".choose-con ul."+id).size() == 1) {
			var self = $("ul."+id);
			self.show().siblings().hide();
		}else{
			$.ajax({
				url:"<?php echo U('Index/saselect');?>",
				type:"post",
				data:{"fid":id},
				dataType:"json",
				success:function(data){
					var datajson = eval(data);
					var newdom = $("<ul/>",{class:id}).appendTo(".choose-con");
					for(var index in datajson){
						var obj = datajson[index];
						newdom.append('<li><table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="td-1"><img src="/salad/'+obj.fpic+'"></td><td class="td-2">'+obj.fname+'</td><td hid="'+(obj.hid ? obj.hid : "")+'" fid="'+obj.fid+'" class="td-4 '+(obj.well ? "on" : "")+'"><i></i></td><td hid="'+(obj.hid ? obj.hid : "")+'" fid="'+obj.fid+'" class="td-5 '
							+(obj.bad ? "on" : "")+'"><i></i></td></tr></tbody></table></li>');
					}
					newdom.find("td.td-4,td.td-5").on('tap',updem);
					newdom.siblings().hide();
				}
			});
		}
	});
});

</script>

</body>
</html>