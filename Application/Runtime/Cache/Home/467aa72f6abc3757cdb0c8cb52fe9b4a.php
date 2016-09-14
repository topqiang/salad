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
		<a href="" class="arrow-l"></a>
	  <h2><font id="_df17_car" style="">购物车</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em class="goodtotal"><?php echo ($count); ?></em></span></a></font>
	</header>
	<div class="cart-wrap">
		<?php if($count == 0): ?><div class="no-content" id="myNoDataShowArea">
            <p>
            <font id="_df17_empty_car" style="">购物车还空着呢，快去挑选美味沙拉吧。</font>
            </p>
            <div class="no-btn">
                <font id="_df17_go" style="">去逛逛</font>
            </div>
        </div>
        <?php else: ?>
		<div class="choose-con cart-con" id="myDataShowArea">
			<ul id="CartProductList">
				<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><li>
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tbody>
								<tr class="cart-line">
									<td class="td-1 on">
										<span><img src="/salad/<?php echo ($good["gpic"]); ?>"></span>
										<i></i>
										<input type="hidden" id="<?php echo ($good["gid"]); ?>" value="1">
									</td>
									<td class="td-2">
										<span class="ct-name"><?php echo ($good["gname"]); ?></span>
										<span class="ct-per">
											￥<i class="goodprice"><?php echo ($good["gprice"]); ?></i>/份 X<small>1</small>
										</span>
									</td>
									<td class="td-3 fl-clr">
										<em class="car-add-l"></em>
										<input type="text" value="<?php echo ($good["goodnum"]); ?>" readonly="" class="inpt-shu">
										<em class="car-add-r"></em>
									</td>
								</tr>
							</tbody>
						</table>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div><?php endif; ?>
		<div class="other-con" id="OtherProductLine" style="display:none">
			<h2>其他伙伴还选购了以下商品，勾选即可加入购物车</h2>
			<div class="other-list" id="OtherProductList">
				
			</div>
		</div>
		
	</div>
    <div class="cart-bt">
		<div>
			<span class="amount on" id="AmountLine"><font id="_df17_counts" style="">数量：</font><font class="goodtotal"><?php echo ($count); ?></font></span>
			<em><font id="_df17_totall_price" style="">总价</font><i>￥<font id="totalprice"></font></i></em><input type="hidden" name="AmountStatus" id="AmountStatus" value="1">
		</div>
		<?php if($count != 0): ?><ul class="fl-clr" id="Bottom_Button_1">
			<li class="fl-left">
				<a href="<?php echo U('Index/diy');?>"><span><font id="_df17_self_pick" style="">自选沙拉</font></span></a>
			</li>
			<li class="fl-right">
				<span><font id="_df17_go_buy" style="">去下单</font></span>
			</li>
		</ul>
		<div class="cart-btn-other" id="Bottom_Button_2"><font id="_df17_add_sank" style="">添加其他小吃</font></div><?php endif; ?>
	</div>
    
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jweixin-1.0.0.js"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/cart.js"></script>
<script language="javascript">
var totalprice = 0;
$(function(){
	$("#AmountLine").on('tap',function() {
		var self = $(this);
		if (self.hasClass("on")) {
			self.removeClass("on");
			$(".td-1").trigger("tap");
		}else{
			self.addClass("on");
			$(".td-1").trigger("tap");
		}
	});

	$(".goodprice").each(function(){
		var price = $(this).html();
		var num = $(this).parent().parent().next().find(".inpt-shu").val();
		totalprice += parseInt(price) * parseInt(num);
	});
	$("#totalprice").html(totalprice);


	$(".td-1").on('tap',function(){
		var self = $(this);
		var num = parseInt(self.siblings().find(".inpt-shu").val());
		var goodtotal = $(".goodtotal");
		var total = parseInt(goodtotal.html());
		if (self.hasClass("on")) {
			totalprice= totalprice - parseInt(self.siblings().find(".goodprice").html())*num;
			self.removeClass("on");
			total-=num;
		}else{
			totalprice= totalprice + parseInt(self.siblings().find(".goodprice").html())*num;
			self.addClass("on");
			total+=num;
		}
		goodtotal.html(total);
		$("#totalprice").html(totalprice);
	});
	$("td.td-3.fl-clr em").on('tap',function(){
		var self = $(this);
		var input =  self.siblings("input");
		var goodtotal = $(".goodtotal");
		var total = goodtotal.html();
		var num = input.val();
		if ( self.hasClass("car-add-l") ) {
			if (num > 0) {
				input.val(--num);
				self.parent().prev().find("small").html(num);
				if (self.parent().siblings(".td-1").hasClass("on")) {
					totalprice= totalprice - parseInt(self.parent().prev().find(".goodprice").html());
					$("#totalprice").html(totalprice);
					goodtotal.html(--total);
				}
			};
		};
		if ( self.hasClass("car-add-r") ) {
			input.val(++num);
			self.parent().prev().find("small").html(num);
			if (self.parent().siblings(".td-1").hasClass("on")) {
				totalprice= totalprice + parseInt(self.parent().prev().find(".goodprice").html());
				$("#totalprice").html(totalprice);
				goodtotal.html(++total);
			};
		};
	});
});
</script>

</body></html>