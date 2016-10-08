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
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/fakeLoader.css">
	<header>
	<a href="javascript:history.go(-1);" class="arrow-l" id="BackIcon"></a>
    <h2><font id="_df23_title" style="">订单详情</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
	<div class="order-outer">
		<div class="ord-det-bd">
			<div class="ord-det-hd fl-clr">
				<font id="_order_state" style="">订单状态：</font>
				<i class="mark-bl" id="StatusDesc">
					<?php if($ordinfo['type'] == 0): ?>待付款
						<?php elseif($ordinfo['type'] == 1): ?>待发货
						<?php elseif($ordinfo['type'] == 2): ?>待收货
						<?php elseif($ordinfo['type'] == 3): ?>已完成
						<?php else: ?>已评价<?php endif; ?>
				</i>
				<em id="PayButton" style="">
					<font id="_df_pay" style="">
						<?php if($ordinfo['type'] == 0): ?><a href="<?php echo U('Order/gopay');?>/oid/<?php echo ($ordinfo["oid"]); ?>">付款</a>
							<?php elseif(($ordinfo['type'] == 2) AND ($ordinfo['delivertype'] == 0)): ?>联系客服
							<?php elseif(($ordinfo['type'] == 2) AND ($ordinfo['delivertype'] == 1)): ?><div class="order-btn-l updorder" oid="<?php echo ($order["oid"]); ?>" type="3">收货</div>
							<?php elseif($ordinfo['type'] == 3): ?><a href="<?php echo U('Order/rate');?>/oid/<?php echo ($ordinfo["oid"]); ?>">评价</a><?php endif; ?>
					</font>
				</em>
			</div>
			<?php if($delivertype == 1): ?><div class="ord-det-con" id="SendShowLine">
				<ul>
					<li>
						<font id="_consignee" style="">收货人：</font><font id="name"><?php echo ($ordinfo["addname"]); ?></font>
					</li>
					<li>
						<font id="_telephone" style="">手机号</font><font id="phone"><?php echo ($ordinfo["tel"]); ?></font>
					</li>
					<li>
						<font id="_df10_your_address" style="">收货地址</font>：<font id="address"><?php echo ($ordinfo["detailadd"]); ?></font>
					</li>
				</ul>
			</div>
			<?php else: ?>
            <div class="ord-det-con" id="StoreShowLine" style="">
				<dl>
                	<dt id="companytitle"><?php echo ($ordinfo["addname"]); ?></dt>
					<dd>
						<font id="_df_shop_phone" style="">电话：</font>
						<font id="companymobile"><?php echo ($ordinfo["tel"]); ?></font>
					</dd>
					<dd>
						<font id="_df_shop_address" style="">地址：</font>
						<font id="companyaddress"><?php echo ($ordinfo["detailadd"]); ?></font>
					</dd>
				</dl>
			</div><?php endif; ?>
		</div>
		<?php if($ordinfo["getcode"] != 0): ?><div class="ord-det-bd" id="FCodeShowLine">
			<div class="ord-det-hd fl-clr"><font id="_pick_up_code" style="">提货码：</font></div>
			<div class="ord-det-con">
				<div class="th-code fl-clr">
					<span class="mark-bl" id="fcode_txt"><?php echo ($ordinfo["getcode"]); ?></span>
				</div>
			</div>
		</div><?php endif; ?>
		<div class="ord-det-bd">
			<div class="ord-det-hd fl-clr"><font id="_order_info" style="">订单信息</font>
				<span id="CancelButton" style=""><font id="df_iscancle" style="display:none">取消订单</font></span>
			</div>
			<div class="ord-det-con">
				<ul>
					<li><font id="_order_code" style="">订单编号：</font><font id="code_num"><?php echo ($ordinfo["ordname"]); ?></font></li>
					<li><font id="_completion_time" style="">成交时间：</font><font id="create_date"><?php echo (date("y-m-d H:m:i",$ordinfo["create_time"])); ?></font></li>
                    <li id="completedate_1" style="display:none">
                    	<font id="_finish" style="">配送完成时间</font>：
                    	<span id="completedate1"></span>
                    </li>
                    <li id="completedate_2" style="display:none">
                    	<font id="_pickup_finish" style="">自提完成时间</font>：
                    	<span id="completedate2"></span>
                    </li>
					<li>
						<font id="_df10_pay_mothed" style="">付款方式</font>：
						<font id="pay_type_title">
							<?php if($ordinfo['paytype'] == 1): ?>微信支付
							<?php else: ?>货到付款<?php endif; ?>
						</font>
					</li>
					<li>
						<font id="_pay_state" style="">付款状态：</font>
						<font id="pay_status">
							<?php if(($ordinfo['type'] == 0) OR (($ordinfo['paytype'] == 0) AND ($ordinfo['type'] < 3)) ): ?>未付款
							<?php else: ?>已付款<?php endif; ?>
						</font>
					</li>
					<li>
						<font id="_df10_sent_mothed" style="">送货方式</font>：
						<font id="sendmoleTitle">
							<?php if($ordinfo['delivertype'] == 0): ?>到店自提
							<?php else: ?>送货上门<?php endif; ?>
						</font>
					</li>
				</ul>
			</div>
		</div>
		<div class="ord-det-bd">
			<div class="ord-det-hd fl-clr"><font id="_commodity_info" style="">商品信息</font></div>
			<div class="ord-det-con-2">
				<dl id="product">
				<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><dt>
						<table width="100%" cellpadding="0" cellspacing="0" border="0" class="ord-list">
							<tbody>
								
								<tr>
									<td class="td-1"><img src="/salad/<?php echo ($good["pic"]); ?>"></td>
									<td class="td-2">
										<h2><?php echo ($good["name"]); ?></h2>
										<ul>
											<?php echo ($good["constituent"]); ?>
											<!-- <li class="fl-clr"><i>基：</i><span>紫叶生菜 x 1 球形生菜 x 1 </span></li>
											<li class="fl-clr"><i>配：</i><span>西芹 x 1 芦笋 x 1 </span></li>
											<li class="fl-clr"><i>酱：</i><span>低脂蜂蜜芥茉酱 x 1 </span></li> -->
										</ul>
									</td>
									<td class="td-3"><p><em>￥<?php echo ($good["gprice"]); ?></em>/份</p><i>x<?php echo ($good["gnum"]); ?></i></td>
								</tr>
								
							</tbody>
						</table>
					</dt><?php endforeach; endif; else: echo "" ;endif; ?>
				</dl>
				<div>
					<table width="100%" cellpadding="0" cellspacing="0" border="0" class="ord-mny" id="bonus">
						<tbody><tr>
							<td class="td-l"><font id="_total_amount" style="">商品总金额</font>：</td>
							<td class="td-r" id="orders_price">￥<?php echo ($ordinfo["price"]); ?></td>
						</tr>
						<tr>
							<td class="td-l"><font id="_df10_trans_pay" style="">运 费：</font></td>
							<td class="td-r" id="f_price">￥<?php echo ($ordinfo["luggage"]); ?></td>
						</tr>
					<tr><td class="td-l">总优惠金额：</td><td class="td-r">-￥<?php echo ($ordinfo["benefit"]); ?></td></tr></tbody></table>
					<table width="100%" cellpadding="0" cellspacing="0" border="0" class="ord-mny-2">
						<tbody><tr>
							<td class="td-l"><font id="_paid" style="">实付：</font></td>
							<td class="td-r" id="real_price">￥<?php echo ($ordinfo["paymoney"]); ?></td>
						</tr>
					</tbody></table>
				</div>
				
			</div>
		</div>
		<div class="ord-det-bd" id="InvoiceInfoLine" style="display:none">
			<div class="ord-det-hd fl-clr">发票信息</div>
			<div class="ord-det-con">
				<ul>
					<li id="InvoiceInfo"></li>
				</ul>
			</div>
		</div>
		<div class="ord-det-bd">
			<div class="ord-det-hd fl-clr"><font id="_leave_a_message" style="">留言信息</font></div>
			<div class="ord-det-con">
				<ul>
					<li id="remark"><?php echo ($ordinfo["remark"]); ?></li>
				</ul>
			</div>
		</div>
	</div>
     <div class="black-layer" id="FCodeErLine" style="display: none;">
		<div class="offst-list offst-list-2">
			<h3><font id="_code_tip" style="">到门店自提请出示此提货二维码</font></h3>
			<div class="thm">
				<div class="thm-inner" id="FCodeBigArea">
					<img src="/salad/Public/Home/images/d23-ewm.png" id="FCodeBigImg">
				</div>
				
			</div>
			<em class="d-close-btn" onclick="$(&#39;#FCodeErLine&#39;).hide();"></em>
		</div>
	</div>
    <input type="hidden" name="order_id" id="order_id" value="1ebaa37856574a1791aafdbd613857b0">
    <input type="hidden" name="order_code" id="order_code" value="160910995700001">
    <input type="hidden" name="fcode" id="fcode" value="">
    <input type="hidden" name="sendmole" id="sendmole" value="2">
    <input type="hidden" name="pay_type" id="pay_type" value="1">
	<input type="hidden" id="ew" name="ew" value="100">
	<input type="hidden" id="eh" name="eh" value="0">
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jweixin-1.0.0.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/cart.js"></script>
<script src="/salad/Public/Home/js/orders.js"></script>

<script language="javascript">
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
</script>
	
</body>
</html>