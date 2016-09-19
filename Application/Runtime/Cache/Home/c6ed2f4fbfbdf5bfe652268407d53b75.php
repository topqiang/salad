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
	<div class="top-bar-wrap">
		<i onclick="$(&#39;#HomeLeftNav&#39;).slideDown(&#39;slow&#39;);"></i>
		<h2><font id="_df7_title" style="">订餐</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</div>
	<div class="con-wrap-bt3">
		<div class="menu-wrap">
			<div class="top-tit pro-tit">
			<a href="<?php echo U('Goods/findgood');?>">
			<div class="sch-inner-3 fl-clr">
				<input type="text" class="pro-inp inpt-4" placeholder="搜索商品名称" id="key" name="key">
				<div class="sch-btn-3"></div>
			</div>
			</a>
			</div>
			<div class="d7-tit">
			<?php if(empty($text)): ?><a href="<?php echo U('Index/diy');?>">
				<img src="/salad/Public/Home/images/d7-icon.png" width="32">
				<font id="_diy_tip" style="">沙拉DIY，我的沙拉我做主</font>
				</a>
			<?php else: echo ($text); endif; ?>
			</div>
		</div>
		<div class="main-menu menu-pro" id="ClassListLine">
		<?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><a id="<?php echo ($cate['id']); ?>" <?php if($curid == $cate['id']): ?>class="mainherf menu-1 on"<?php else: ?>class="mainherf menu-1"<?php endif; ?> id="MainHref_4">
				<img src="/salad/Public/Home/images/nav-back.png">
				<span><?php echo ($cate["name"]); ?></span>
			</a><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<div id="ProductList">
			<div class="goodlist<?php echo ($curid); ?>">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><div class="pro-detail">
					<dl class="pro-des">
						<dt>
							<img src="/salad/<?php echo ($good["gpic"]); ?>" style="height:165px;">
						</dt>
						<dd>
							<h3><?php echo ($good["gname"]); ?></h3>
							<ul>
								<li class="fl-clr"><em><?php echo ($good["gconstituent"]); ?></em></li>
							</ul>
						</dd>
						<dd class="fl-clr">
							<span class="td-2">￥<i class="price"><?php echo ($good["gprice"]); ?></i>/份</span>
							<div class="td-3 fl-clr">
								<em class="car-add-l"></em>
								<input type="text" id="<?php echo ($good["gid"]); ?>" value="0" readonly="" class="inpt-shu">
								<em class="car-add-r"></em>
							</div>
						</dd>
					</dl>
					<div class="pro-com">
						<table>
							<tbody>
								<tr>
									<td align="left" id="<?php echo ($good["gid"]); ?>">
										<span <?php if($good["well"] == 1): ?>class="td-l on"<?php else: ?> class="td-l"<?php endif; ?> hid="<?php echo ($good["hid"]); ?>"><?php echo ($good["wellnum"]); ?></span>
									</td>
									<td align="center" id="<?php echo ($good["gid"]); ?>">
										<span <?php if($good["bad"] == 1): ?>class="td-m on"<?php else: ?>class="td-m"<?php endif; ?> hid="<?php echo ($good["hid"]); ?>"><?php echo ($good["badnum"]); ?></span>
									</td>
									<td align="right" id="<?php echo ($good["gid"]); ?>">
										<span class="td-r">0</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>

        <div class="no-content" id="myNoDataShowArea" style="display:none">
            <p>
            <font id="_tip_no_goods" style="">此分类下没有相关商品，请查看其他分类。</font>
            </p>
        </div>
        <div class="U-login-warp" id="loading" style="display:none; padding-bottom:20px;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                    <tbody><tr>
                        <td align="center"><span class="U-gary-color" style="font-size:1rem"><font id="_tip_add_loading" style="">正在载入…</font></span></td>
                    </tr>
                </tbody></table>
            </div>
            <div class="U-login-warp" id="nomoreresults" style="display:none; padding-bottom:20px;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                    <tbody><tr>
                        <td align="center"><span class="U-gary-color" style="font-size:1rem"><font id="_df_added_all" style="">已加载全部</font></span></td>
                    </tr>
                </tbody></table>
            </div>
	</div>
	<div id="CartBottomLine">
		<div class="choose-menu-2">
			<table width="100%">
				<tbody>
					<tr>
						<td class="td-1">
							<span>共计<i class="totalnum"><?php echo ($count); ?></i>个商品</span>
						</td>
						<td class="td-2">
							<span>总价￥<i class="totalprice"><?php echo ($totalprice); ?></i></span>
						</td>
						<td class="td-3">
							<div class="cart-btn-4" onclick="savejc()">
								<img src="/salad/Public/Home/images/d7-icon-3.png" width="22">选好了
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
    <div class="select-menu" style="display:none" id="HomeLeftNav">
	<span onclick="$(&#39;#HomeLeftNav&#39;).slideUp(&#39;slow&#39;);"></span>
	<ul>
		<li>
			<a href="<?php echo U('Index/index');?>" class="menu-ico ico-1"><font id="_df4_home" style="">首页</font></a>
		</li>
		<li>
			<a href="<?php echo U('Goods/goodlist');?>" class="menu-ico ico-2"><font id="_df4_plan" style="">订餐</font></a>
		</li>
		<li>
			<a href="<?php echo U('Index/diy');?>" class="menu-ico ico-3"><font id="_df4_self_pick" style="">自选</font></a>
		</li>
		<li>
			<a href="<?php echo U('Order/orderlist');?>" class="menu-ico ico-4"><font id="_df4_order" style="">订单</font></a>
		</li>
		<li>
			<a href="<?php echo U('Room/bulidshop');?>" class="menu-ico ico-5"><font id="_df4_shop" style="">门店</font></a>
		</li>
		<li>
			<a href="<?php echo U('User/self');?>" class="menu-ico ico-6"><font id="_df4_mine" style="">我的</font></a>
		</li>
	</ul>
</div>
    <input type="hidden" name="classid" id="classid" value="13">
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/product.js"></script>
<script language="javascript">

function savejc(){
	var goods = [];
	$(".inpt-shu").each(function(){
		var obj = {};
		var self = $(this);
		if ( self.val() > 0) {
			obj.gid = self.attr("id");
			obj.goodnum =  self.val();
			goods.push(obj);
		};
	});
	$.ajax({
		url  : "<?php echo U('Goods/togley');?>",
		type : "post",
		data : {"goods" : goods},
		dataType : "json",
		success : function(data){
			if (data == "error") {
				alert("购买失败！请重新购买！");
				window.location.reload();
			}else{
				window.location.href = '<?php echo U("Goods/gley");?>'+'/res/'+data;
			}
		}
	});
}


function updhub () {
	var self = $(this);
	var type = self.hasClass("td-l") ? "well" : "bad";
	var num = self.html();
	var gid = self.parent().attr("id");
	var hid = self.attr("hid");
	var changenum = 0;
	if (self.hasClass("on")) {
		self.removeClass("on");
		self.html(--num);
	}else{
		var sibling = self.addClass("on").parent().siblings().find("span[hid]");
		if (sibling.hasClass("on")) {
			var thisnum = sibling.html();
			sibling.removeClass("on").html(--thisnum);
		};
		self.html(++num);
		changenum = 1;
	}
	$.ajax({
		url:"<?php echo U('Goods/updHubGood');?>",
		type:"post",
		data:{"clum" : type, "zhi" : changenum ,"hid":hid ,"gid":gid},
		dataType:"json",
		success:function (data) {
			if (data == "success") {

			}else{
				self.attr("hid",data).parent().siblings().find("span[hid]").attr("hid",data);
			}
		}
	});
}


$(function(){
	var total=<?php echo ($count); ?>;
	var totalprice= <?php echo ($totalprice); ?>*100;
	function updem(){
		var self = $(this);
		var input =  self.siblings("input");
		var num = input.val();
		var price = parseFloat(self.parent().prev().find(".price").html());
		if ( self.hasClass("car-add-l") ) {
			if (num > 0) {
				input.val(--num);
				total--;
				totalprice -= (price*100);
				$(".totalnum").html(total);
				$(".totalprice").html(totalprice/100);
			};
		};
		if ( self.hasClass("car-add-r") ) {
			input.val(++num);
			total++;
			totalprice += (price*100);
			$(".totalnum").html(total);
			$(".totalprice").html(totalprice/100);
		};
	}

	//修改购买商品数量
	$("div.td-3.fl-clr em").on('tap',updem);

	$("span[hid]").on('tap',updhub);



	//绑定选择不同分类
	$(".main-menu a").on("tap",function(){
		var self = $(this);
		var id = self.attr("id");
		if ($(".goodlist"+id).size() == 1) {
			var self1 = $(".goodlist"+id);
			self1.show().siblings().hide();
		}else{
			$.ajax({
				url:"<?php echo U('Goods/goodlist');?>",
				type:"post",
				data:{"cid":id},
				dataType:"json",
				success:function(data){
					var datajson = eval(data);
					if (datajson.length == 0) {
						$("#myNoDataShowArea").show();
						$("#ProductList").hide();
					}else{
						$("#myNoDataShowArea").hide();
						$("#ProductList").show();
						var newdom = $("<div/>",{"class" : "goodlist"+id }).appendTo("#ProductList");
						for(var index in datajson){
							var obj = datajson[index];
							newdom.append('<div class="pro-detail"><dl class="pro-des"><dt><img src="/salad/'+obj.gpic+'" style="height:165px;"></dt><dd><h3>'+obj.gname+'</h3><ul><li class="fl-clr"><em>'+obj.gconstituent+'</em></li></ul></dd><dd class="fl-clr"><span class="td-2">￥<i class="price">'+obj.gprice+'</i>/份</span><div class="td-3 fl-clr"><em class="car-add-l"></em><input type="text" id="'+obj.gid+'" value="0" readonly="" class="inpt-shu"><em class="car-add-r"></em></div></dd></dl><div class="pro-com"><table><tbody><tr><td align="left" id="'+obj.gid+'"><span class="td-l '+((obj.well == 1) ? "on" : "")+'" hid='+(obj.hid ? obj.hid : "")+'>'+obj.wellnum+'</span></td><td align="center" id="'+obj.gid+'"><span class="td-m '+((obj.bad == 1) ? "on" : "")+'" hid='+(obj.hid ? obj.hid : "")+'>'+obj.badnum+'</span></td><td align="right" id="'+obj.gid+'"><span class="td-r">0</span></td></tr></tbody></table></div></div>');
						}
						newdom.find("div.td-3.fl-clr em").on('tap',updem);
						newdom.find("span[hid]").on('tap',updhub);
						newdom.siblings().hide();
					}
				}
			});
		}
		self.addClass("on").siblings().removeClass("on");
	});
});
</script>

</body></html>