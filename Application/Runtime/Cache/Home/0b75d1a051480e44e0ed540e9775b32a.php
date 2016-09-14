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
		<a href="http://daisyfresh.21move.net/df5.html" class="arrow-l"></a>
		<h2><font id="_select_main" style="">选主菜</font></h2>
		<font id="CartLine"><span class="cart-ico"><em><?php echo ($count); ?></em></span></font>
	</header>
	<div class="con-wrap-bt2">
		<div class="menu-wrap">
			<div class="main-menu" id="MainClassList">
				<?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?><a href="javascript:;" id="<?php echo ($obj["id"]); ?>" <?php if($key == 0): ?>class="mainherf menu-1 on"<?php else: ?>class="mainherf menu-1"<?php endif; ?>>
						<img src="/salad/Public/Home/images/nav-back.png">
						<span><?php echo ($obj["name"]); ?></span>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<p style="font-size: 14px; color: rgb(187, 187, 187); line-height: 22px; text-align: center; padding: 6px 12px 0px;"><font id="_df5_1tipbig" style="">
		<?php if($totalnum == 12): ?>规则：大碗沙拉主菜可选12份，单个菜品可重复选择<?php endif; ?>
		<?php if($totalnum == 9): ?>规则：小碗沙拉主菜可选9份，单个菜品可重复选择<?php endif; ?>
		 <?php if($totalnum == 4): ?>规则：自选卷沙拉主菜可选4份，单个菜品可重复选择<?php endif; ?>
		</font></p>
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
								<td class="td-3 fl-clr">
									<em class="car-add-l"></em>
									<input type="text" id="<?php echo ($vo["fid"]); ?>" name="<?php echo ($vo["fname"]); ?>" value="0" readonly="" class="inpt-shu">
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
						<td class="td-2"><font id="_df5_hace" style="">已有</font><i id="MainTotalCountLine">0</i><font id="_df5_unit" style="">份</font></td>
						<td class="td-3" onclick="savejc()"><i><font id="_df5_choose_saue" style="">去选酱料</font></i></td>
					</tr>
				</tbody>
			</table>
            <input type="hidden" name="MainIsShred" id="MainIsShred" value="1">
		</div>
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
	var goods =JSON.parse(sessionStorage.getItem("goods"));
	var type = goods.name ? goods.name : "big";
	var foods = goods.foods ? goods.foods : [];
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
	goods.foods= foods ;
	if (sessionStorage) {
		sessionStorage.setItem("goods",JSON.stringify(goods));
	};
	window.location.href = '<?php echo U("Index/diyjl");?>';
}
$(function(){
	var totalnum = <?php echo ($totalnum); ?>;//存储最多可选数
	function updem(){
		var self = $(this);
		var input =  self.siblings("input");
		var BaseTotalCountLine = $("#MainTotalCountLine");
		var total = BaseTotalCountLine.html();
		var num = input.val();
		if ( self.hasClass("car-add-l") ) {
			total--;
			if (num > 0) {
				input.val(--num);
				BaseTotalCountLine.html(total);
			};
		};
		if ( self.hasClass("car-add-r") ) {
			if (total < totalnum ) {
				input.val(++num);
				BaseTotalCountLine.html(++total);
			}
		};
	}
	$("td.td-3.fl-clr em").on('tap',updem);
	$(".main-menu a").on("tap",function(){
		var self = $(this);
		var id = self.attr("id");
		if ($(".choose-con ul."+id).size() == 1) {
			var self = $("ul."+id);
			self.show().siblings().hide();
		}else{
			$.ajax({
				url:"<?php echo U('Index/diyzc');?>",
				type:"post",
				data:{"fid":id},
				dataType:"json",
				success:function(data){
					var datajson = eval(data);
					var newdom = $("<ul/>",{class:id}).appendTo(".choose-con");
					for(var index in datajson){
						var obj = datajson[index];
						newdom.append('<li><table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="td-1"><img src="/salad/'+obj.fpic+'"></td><td class="td-2">'+obj.fname+'</td><td class="td-3 fl-clr"><em class="car-add-l"></em><input type="text" id="'+obj.fid+'" name="'+obj.fname+'" value="0" readonly="" class="inpt-shu"><em class="car-add-r"></em></td></tr></tbody></table></li>');
					}
					newdom.find("td.td-3.fl-clr em").on('tap',updem);
					newdom.siblings().hide();
				}
			})	
		}
	});
});

</script>

</body></html>