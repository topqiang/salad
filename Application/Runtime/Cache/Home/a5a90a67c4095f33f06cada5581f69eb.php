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
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/fakeLoader.css">
	<header>
		<a href="javascript:history.go(-1);" class="arrow-l" id="BackIcon"></a>
		<h2><font id="_df10_title" style="">订单确认</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
	<div class="con-wrap-bt">
		<div class="order-detail">
        	<div class="order-det-mod" style="display:none">
				<div class="det-dius-hd">
					<span class="d10-ico ico-13"></span><font id="_df10_sent_mothed" style="">送货方式</font>
				</div>
				<div class="det-dius-bd">
					<ul class="send-tit fl-clr">
						<li id="SendMole_2" onclick="CART.ChangeSendMole(2);" class="on"><font id="_df10_go_shop" style="">到店自提</font></li>
						<li id="SendMole_1" onclick="CART.ChangeSendMole(1);"><font id="_df10_sent_home" style="">送货上门</font></li>
					</ul>				
				</div>
			</div>
			<?php if($ordinfo['delivertype'] == 1): ?><div class="order-det-mod" id="SendShowLine">
					<div class="det-dius-hd">
						<a href="<?php echo U('Address/index');?>/oid/<?php echo ($ordinfo["oid"]); ?>">
						<span class="d10-ico ico-11"></span><font id="_df10_your_address" style="">收货地址</font>
						</a>
					</div>
					<ul class="det-dius-bd addr-list">
						<?php if(!empty($ordinfo['addname'])): ?><li id="SetAddressLine">
							<dl>
								<dt>
									<span class="mark-bl"><font id="_df10_sent" style="">【配送】</font></span>
									<font id="linkname"><?php echo ($ordinfo["addname"]); ?></font>
								</dt>
								<dd id="linkphone"><?php echo ($ordinfo["tel"]); ?></dd>
								<dd id="address"><?php echo ($ordinfo["detailadd"]); ?></dd>
							</dl>
						</li><?php endif; ?>
	                    <li id="NewAddressLine">
							<a href="<?php echo U('Address/location');?>"><img src="/salad/Public/Home/images/d10-add.png" width="50"></a>
						</li>
					</ul>
				</div><?php endif; ?>

			<?php if($ordinfo['delivertype'] == 0): ?><div class="order-det-mod" id="StoreShowLine">
					<div class="det-dius-hd">
						<a href="<?php echo U('Address/index');?>/oid/<?php echo ($ordinfo["oid"]); ?>">
						<span class="d10-ico ico-11"></span><font id="_df10_self_shop" style="">自提门店</font>
						</a>
					</div>
					<div class="ord-det-con addr-list">
						<dl>
							<dt><span class="mark-bl"><font id="_df10_self" style="">【自提】</font></span><font id="companytitle"><?php echo ($ordinfo["addname"]); ?></font></dt>
							<dd id="companymobile"><?php echo ($ordinfo["tel"]); ?></dd>
							<dd id="companyaddress"><?php echo ($ordinfo["detailadd"]); ?></dd>
						</dl>
					</div>
				</div><?php endif; ?>

			<?php if(!empty($goods)): ?><div class="order-det-mod">
					<div class="det-dius-hd">
						<span class="d10-ico ico-12"></span><font id="_df10_food_list" style="">餐品列表</font>
					</div>
					<div class="det-dius-bd ">
						<div class="tec-order" id="product">
						<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tb-list">
							<tbody>
							<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><tr>
									<td class="td-1"><span><?php echo ($good["name"]); ?></span><i>X<?php echo ($good["gnum"]); ?></i></td>
									<td class="td-2 mark-bl">￥<?php echo ($good["gprice"]); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						</div>
					</div>
				</div><?php endif; ?>
				<div class="order-det-mod" id="SendTimeLine">
					<div class="det-dius-hd">
						<span class="d10-ico ico-16"></span>
						<font id="_df10_sent_time_one" style="">
							<?php if($ordinfo['delivertype'] == 1): ?>配送时间<?php else: ?>自提时间<?php endif; ?>：
						</font>
					</div>
					<div class="det-dius-bd">
						<ul class="send-tit fl-clr">
							<li forid="AutoSendLine" class="checkon on">
								<font id="_df10_sent_now">
									<?php if($ordinfo['delivertype'] == 1): ?>立即配送<?php else: ?>立即自提<?php endif; ?>
								</font>
							</li>
							<li forid="SetDateLine" class="checkon">
								<font id="_df10_sent_appiont">
									<?php if($ordinfo['delivertype'] == 1): ?>预约配送<?php else: ?>预约自提<?php endif; ?>
								</font>
							</li>
						</ul>
						<div class="date-sele" id="SetDateLine" style="display:none">
							<select id="myFDDate" name="myFDDate">
								<option value="">选择时间</option>
								<option value="2016-09-21">2016-09-21</option>
							</select>
							<select id="myFDTime" name="myFDTime">
								<option value="">选择时间</option>
								<option value="10:00-11:00">10:00-11:00</option>
								<option value="11:00-12:00">11:00-12:00</option>
								<option value="12:00-13:00">12:00-13:00</option>
								<option value="13:00-14:00">13:00-14:00</option>
								<option value="14:00-15:00">14:00-15:00</option>
								<option value="15:00-16:00">15:00-16:00</option>
								<option value="16:00-17:00">16:00-17:00</option>
								<option value="17:00-18:00">17:00-18:00</option>
								<option value="18:00-19:00">18:00-19:00</option>
							</select>
						</div>
						<div class="date-sele" id="AutoSendLine">
							<span>
								<font id="_df10_sent_fast" style="">
									<?php if($ordinfo['delivertype'] == 1): ?>我们将尽快配送<?php else: ?>请尽快到店自提<?php endif; ?>
								</font>
							</span>
						</div>
					</div>
				</div>
			<div class="order-det-mod">
				<div class="det-dius-hd">
					<span class="d10-ico ico-14"></span><font id="_df10_pay_mothed" style="">付款方式</font>
				</div>
				<div class="det-dius-bd">
					<ul class="det-pay" id="payinfo">
						<li <?php if($ordinfo['paytype'] == 1): ?>class="on"<?php endif; ?> yes="1"><em><img src="/salad/Public/Home/images/pay-1.png"></em>(推荐)微信支付</li>
						<li <?php if($ordinfo['paytype'] == 0): ?>class="on"<?php endif; ?> yes="0"><em><img src="/salad/Public/Home/images/payit.png"></em>货到付款</li>
						<li <?php if($ordinfo['paytype'] == 2): ?>class="on"<?php endif; ?> yes="2"><em><img src="/salad/Public/Home/images/balance.png"></em>余额支付</li>
					</ul>
				</div>
			</div>
			<div class="order-det-mod" style="display:none">
				<div class="det-dius-hd">
					<span class="d10-ico ico-15"></span>发票信息
				</div>
				<div class="det-dius-bd">
					<div class="self-comp">
						<p>
							<span id="InvoiceTypeLine_0" class="on" onclick="CART.SetInvoiceType(0);">不需要发票</span>
                            <span id="InvoiceTypeLine_1" onclick="CART.SetInvoiceType(1);">个人</span>
                            <span id="InvoiceTypeLine_2" onclick="CART.SetInvoiceType(2);">公司</span>
						</p>
						<input style="display:none" type="text" id="myInvoiceTitle" name="myInvoiceTitle" placeholder="请输入发票的抬头" onchange="CART.SaveInvoiceInfo();" onblur="CART.SaveInvoiceInfo();" class="inpt"> 
					</div>
				</div>
			</div>
			<div class="order-det-mod">
				<div class="det-dius-bd tb-outer">
					<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tb-que" id="bonus">
						<tbody>
							<tr>
								<td class="tb-l"><font id="_df10_totall_pay" style="">总金额：</font></td>
								<td class="tb-r" id="totalprice">￥<?php echo ($ordinfo["price"]); ?></td>
							</tr>
							<tr>
								<td class="tb-l"><font id="_df10_trans_pay" style="">运 费：</font></td>
								<td class="tb-r" id="freightprice">￥<?php echo ($ordinfo["luggage"]); ?></td>
							</tr>
							<tr>
								<td class="tb-l">总优惠金额：</td>
								<td class="tb-r">-￥<?php echo ($ordinfo["benefit"]); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="order-det-mod">
				<div class="det-dius-bd msg">
					<input type="text" placeholder="请输入您的留言" class="inpt" name="remark" id="remark" rows="5">
				</div>
			</div>
		</div>
	</div>
	<div class="choose-menu">
		<div class="ord-que fl-clr">
			<span><font id="_df10_have_pay" style="">需要支付：</font></span><i>￥<font id="accountprice"><?php echo ($ordinfo["price"]); ?></font></i>
			<div class="pay-btn fl-right"><img src="/salad/Public/Home/images/d10-ico-2.png" width="34"><font id="_df10_enter_pay">确认</font></div>
		</div>
	</div>
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jweixin-1.0.0.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<!-- <script src="/salad/Public/Home/js/cart.js"></script>
<script src="/salad/Public/Home/js/orders.js"></script> -->
<script language="javascript">
$(function(){
	$(".checkon").on('tap',function(){
		var self = $(this);
		var id = self.attr("forid");
		self.addClass("on").siblings().removeClass("on");
		$("#"+id).show().siblings("div").hide();
	});
	$("#payinfo li").on("tap",function(){
		var self = $(this);
		self.addClass("on").siblings().removeClass("on");
	});
	$(".pay-btn").on("tap",function(){
		var delidate = $("#SetDateLine:visible");
		var paytype = $("#payinfo li.on");
		var remark = $("#remark");
		var data = { "id" : "<?php echo ($ordinfo["oid"]); ?>" };
		if ( delidate.length != 0 ) {
			var myFDDate = $("#myFDDate").val();
			var myFDTime = $("#myFDTime").val();
			if (myFDDate && myFDTime) {
				delidate = myFDDate+ "=====" + myFDTime;
				data.delidate = delidate;
			}else{
				alert("请填写完整时间！");
			}
		}else{
			data.delidate = "尽快";
		}
		if ( paytype ) {
			paytype = paytype.attr("yes");
			if ( paytype ) {
				data.paytype = paytype;
				if (paytype == 0) {
					data.type =2;
				}else{
					data.type =1;
				}
			};
		};
		if ( remark ) {
			remark = remark.val();
			data.remark = remark;
		};
		if ( data.id != "" ) {
			$.ajax({
				"url" : "<?php echo U('Order/updorder');?>",
				"type" : "post",
				"data" : {"order" : data},
				"dataType" : "json",
				"success" : function( res ){
					if (res != "error") {
						window.location.href="<?php echo U('Order/orderlist');?>";
					};
				},
				"error"  : function ( res ) {
					console.log(res);
				}
			})
		};
	});
})
</script>

</body></html>