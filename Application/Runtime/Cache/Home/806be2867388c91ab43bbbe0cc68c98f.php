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
		<h2><font id="_df22_0_title" style="">最近订单</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"></a><span class="cart-ico"><em><?php echo ($count); ?></em></span></font>
	</div>
	<?php if(!empty($ordinfo)): ?><div class="ord-sch">
		<div class="sch-inner-2 fl-clr">
			<form id="findform" action="<?php echo U('Order/fobygood');?>" method="post">
				<input type="text" class="pro-inp inpt-3" placeholder="您可以根据商品名称进行搜索" id="key" name="key">
				<div class="sch-btn-2" onclick="check()"></div>
			</form>
		</div>
	</div>
	<div class="con-wrap-bt" id="myOrdersList" scrollpagination="enabled">
		<div class="tecent-order-mod">
		<?php if(is_array($ordinfo)): $i = 0; $__LIST__ = $ordinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><div class="det-dius-bd">
				<ul class="fl-clr">
					<li class="tec-tit">
						<a href="<?php echo U('Order/orderinfo');?>/id/<?php echo ($order["oid"]); ?>">
						<p>订单编号：<i><?php echo ($order["ordname"]); ?></i></p>
						<p>订单状态：
							<span class="mark-bl">
								<?php if($order['type'] == 0): ?>待付款
									<?php elseif($order['type'] == 1): ?>待发货
									<?php elseif($order['type'] == 2): ?>待收货
									<?php elseif($order['type'] == 3): ?>已完成
									<?php else: ?>售后中<?php endif; ?>
							</span>
						</p>
						</a>
					</li>
					<li class="tec-order">
						<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tb-list">
							<tbody>
							<?php if(is_array($order['goods'])): $i = 0; $__LIST__ = $order['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><tr>
									<td class="td-1"><span><?php echo ($good["name"]); ?></span><i>X<?php echo ($good["gnum"]); ?></i></td>
									<td class="td-2 mark-bl">￥<?php echo ($good["gprice"]); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tb-list tb-list-2">
							<tbody>
								<tr>
									<td class="td-1 mark-bl">共计<?php echo ($order["gsnum"]); ?>个商品</td>
									<td class="td-2">实付：<em class="mark-bl">￥<?php echo ($order["price"]); ?></em></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li class="tec-btn fl-clr">
							<?php if($order['type'] == 0): ?><div class="order-btn-l updorder" oid="<?php echo ($order["oid"]); ?>" type="1">确认付款
								<?php elseif($order['type'] == 1): ?><div class="order-btn-l">催他
								<?php elseif(($order['type'] == 2) AND ($order['delivertype'] == 0)): ?><div class="order-btn-l">联系客服
								<?php elseif(($order['type'] == 2) AND ($order['delivertype'] == 1)): ?><div class="order-btn-l updorder" oid="<?php echo ($order["oid"]); ?>" type="3">确认收货
								<?php elseif($order['type'] == 3): ?><div class="order-btn-l">评价<?php endif; ?>
						</div>
						<?php if($order['type'] == 0): ?><div class="order-btn-r updorder" oid="<?php echo ($order["oid"]); ?>" type="9">取消订单</div><?php endif; ?>
					</li>
				</ul>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div><?php endif; ?>
	<?php if(empty($ordinfo)): ?><div class="no-content" id="myNoDataShowArea">
            <p id="myNoDataContent">
            <font id="_non_order" style="">您尚未购买任何商品</font>
            </p>
			<a href="<?php echo U('Goods/goodlist');?>">
            <div class="no-btn">
                <font id="_df17_go" style="">去逛逛</font>
            </div>
            </a>
        </div><?php endif; ?>
    <div class="U-login-warp" id="loading" style="display: none;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
            <tbody><tr>
                <td align="center"><span class="U-gary-color" style="font-size:1rem"><font id="_tip_add_loading" style="">正在载入…</font></span></td>
            </tr>
        </tbody></table>
    </div>
    <div class="U-login-warp" id="nomoreresults" style="display:none">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
            <tbody>
	            <tr>
	                <td align="center"><span class="U-gary-color" style="font-size:1rem"><font id="_df22_load_all" style="">已加载全部</font></span></td>
	            </tr>
        	</tbody>
        </table>
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
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jweixin-1.0.0.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/jquery.scrollpagination.js"></script>
<script src="/salad/Public/Home/js/cart.js"></script>
<script src="/salad/Public/Home/js/orders.js"></script>
<script language="javascript">
	$(function(){
		$(".updorder[type]").on("tap",function(){
			var self = $(this);
			var id = self.attr("oid");
			var type = self.attr("type");
			var order = {"id" :id ,"type" :type};
			$.ajax({
				"url" : "<?php echo U('Order/updorder');?>",
				"type" : "post",
				"data" : {"order" :order},
				"dataType" : "json",
				"success" : function(data){
					console.log(data);
					if (data != "error") {
						//reload  当前页面
						location.reload();
					}
				}
			})
		});
});
		function check(){
			var key = $("#key").val();
			if (key && key != "") {
				$("#findform").submit();
			}else{
				alert("查询数据不能为空！");
			}
		}
</script>

</body></html>