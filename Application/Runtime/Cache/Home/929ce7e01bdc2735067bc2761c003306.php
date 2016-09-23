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
	<style type="text/css">
		body{
			background: #e6e7e1;
		}
	</style>
	<header>
		<a href="javascript:history.go(-1);" class="arrow-l" id="BackIcon"></a>
	  	<h2><font id="_df39_title" style="">收货地址</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
    <div>
		<div class="addr-locat-3 fl-clr" style="display:none">
			<span>定位城市：<i>北京</i></span>
			<em><font id="_select_city" style="">选择城市</font></em>
		</div>

		<?php if($_REQUEST['type'] != 2): ?><div class="addr-location-2" id="myPickupPointTitle">
			<font id="_tip_click" style="">到店自提，请选择提货点</font>
		</div>
		<div class="addr-list-wrap" id="myPickupPointList">
			<?php if(is_array($shop)): $i = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?><div <?php if($address['addid'] == $useradd): ?>class="addr-list after on"<?php else: ?>class="addr-list after"<?php endif; ?> addid="<?php echo ($address["addid"]); ?>">
					<dl>
						<dt>
							<span><?php echo ($address["name"]); ?></span>
							<i> <?php echo ($address["tel"]); ?></i>
						</dt>
						<dd><?php echo ($address["address"]); ?></dd>
						<dd>
							<em class="zt-city"><?php echo ($address["city"]); ?></em>
						</dd>
					</dl>
					<em class="after-link on">看地图</em>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div><?php endif; ?>
		<?php if($_REQUEST['type'] != 1): ?><div class="addr-location" id="myAddressTitle"><font id="_tip_click2" style="">送货上门，请选择您的收货地址</font></div>
		<?php if(!empty($cityarr)): ?><div class="addr-list-wrap" id="myAddressList">
				<?php if(is_array($cityarr)): $i = 0; $__LIST__ = $cityarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?><div  <?php if($address['id'] == $useradd): ?>class="addr-list after on"<?php else: ?>class="addr-list after"<?php endif; ?>  addid="<?php echo ($address["id"]); ?>">
						<dl>
							<dt>
								<span><?php echo ($address["name"]); ?></span>
								<i> <?php echo ($address["tel"]); ?></i>
							</dt>
							<dd><?php echo ($address["detailadd"]); ?></dd>
							<dd>
								<a href="<?php echo U('Address/ediadd');?>/id/<?php echo ($address["id"]); ?>"><em class="zt-city"><?php echo ($address["city"]); ?></em></a>
							</dd>
						</dl>
						<em class="after-link on">看地图</em>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		<?php else: ?>
        <div class="addr-list addr-had had-2" id="myNoDataShowArea">
            <dl>
                <dt>
                    <p><font id="_tip_no_address" style="">您尚未添加送货上门的收货地址，</font></p>
                    <p><font id="_tip_no_address2" style="">您可以现在去添加。</font></p>
                </dt>
            </dl>
        </div><?php endif; ?>
	</div>
	<div class="bt-btn" id="BottomNewLine">
		<a href="<?php echo U('Address/location');?>"><font id="_df3_title" style="">新建收货地址</font></a>
	</div><?php endif; ?>
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script language="javascript">
// GetUserLoginInfo();
</script>
<script src="/salad/Public/Home/js/personal.js"></script>
<script language="javascript">
$(function(){
	$(".addr-list").on('tap',checkAddress);
});
function checkAddress(){
	var self = $(this);
	var myAddressList = self.parent().attr("id");
	var id = self.attr("addid");
	var delivertype = 0;
	if ( myAddressList == "myAddressList" ) {
		delivertype = 1;
	};
	$.ajax({
		url : "<?php echo U('User/updaddress');?>",
		type : "post",
		data : { "id" : id , "delivertype" : delivertype},
		dataType : "json",
		success : function(res){
			if (res == "success") {
				$(".addr-list.on").removeClass("on");
				self.addClass("on");
			}else{
				var json = JSON.parse(res);
				if (json.oid) {
					window.location.href = "<?php echo U('Order/orderinfo');?>/id/"+json.oid;
				};
				alert("已为当前，请重选！");
			}
		}
	});
}
</script>

</body></html>