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
	<header>
		<a href="javascript:history.go(-1);" class="arrow-l" id="BackIcon"></a>
		<h2><font id="_df3_title" style="">新建收货地址</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
	<div class="con-wrap-bt">
		<div class="addr-outer">
			<ul>
				<li class="fl-clr">
					<input type="text" placeholder="请填写姓名" name="linkname" id="linkname" class="addr-inp name-inpt inpt">
					<dl class="sex fl-clr">
						<dt><span class="sexval on"><font id="_man" style="">男</font></span></dt>
						<dd><span class="sexval"><font id="_woman" style="">女</font></span></dd>
					</dl>
				</li>
				<li>
					<input type="text" placeholder="请填写手机号" name="mobile" id="mobile" class="addr-inp inpt" maxlength="11">
				</li>
				<li>
					<div class="addr-select" id="citySelect" onclick="$('#CitySelectLayer').show();">天津</div>
				</li>
				<li>
					<div class="addr-select" id="selectAddressLine" onclick="Jump();"><?php if(empty($line)): ?>请选择详细地址<?php else: echo ($line); endif; ?></div>
				</li>
				<li>
					<input type="text" placeholder="楼号、单元号和门牌号" id="doorcode" name="doorcode" class="addr-inp inpt">
				</li>
				<li>
					<div class="addr-select" id="tagSelect" onclick="$('#TagSelectLayer').show();">其他</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="bottom-btn">
		<div class="btn-inner addlocation">
			<span><font id="_next" style="">确定</font></span>
		</div>
	</div>
    <div class="black-layer" style="display:none" id="CitySelectLayer">
		<div class="city-select">
			<p><font id="_please_had_choose_city" style="">请先选择城市</font></p>
			<ul class="label-list" id="CityListLayer">
				<li><span>天津</span></li>
			</ul>
		</div>
	</div>
    <div class="black-layer" style="display:none" id="TagSelectLayer">
		<div class="city-select">
			<p><font id="_please_choose_tag" style="display:none">选择标签</font></p>
			<ul class="label-list" id="TagListLayer">
				<li>
					<span>家</span>
				</li>
				<li>
					<span>公司</span>
				</li>
				<li>
					<span>学校</span>
				</li>
				<li>
					<span>其他</span>
				</li>
			</ul>
		</div>
	</div>
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/personal.js"></script>
<script language="javascript">
	$(".sexval").on('tap',function(){
		$(".sexval").removeClass("on");
		$(this).addClass("on");
	});
	$("#TagListLayer li").on('tap',function(){
		var self = $(this);
		$("#tagSelect").text(self.text());
		$(".black-layer").fadeOut();
	});
	$("#CityListLayer li").on('tap',function(){
		var self = $(this);
		$("#citySelect").text(self.text());
		$(".black-layer").fadeOut();
	});
	function Jump(){
		var citySelect = $("#citySelect").text();
		var line = $("#selectAddressLine").text();
		if (citySelect || citySelect != "") {
			var data = returndata();
			if(sessionStorage){
				sessionStorage.setItem("data",JSON.stringify(data));
			}
			window.location.href = "<?php echo U('Address/inputarea');?>/city/"+citySelect+"/line/"+((line == "请选择详细地址") ? "" : line);
		}else{
			alert("请先选择城市");
		}
	}
	$(".addlocation").on("tap",function(){
		var data = returndata();
		$.ajax({
			url : "<?php echo U('Address/addAddress');?>",
			type : "post",
			data : data,
			dataType : "json",
			success : function( data ){
				if (data != "error") {
					sessionStorage.setItem("data",null);
					window.location.href = "<?php echo U('Address/index');?>";
				};
			}
		});
	});
	function setdata(){
		if(sessionStorage){
			var json = JSON.parse(sessionStorage.getItem("data"));
			if(json){
				$("#linkname").val(json.name);
				$("#mobile").val(json.tel);
				$("#citySelect").text(json.provice);
				$("#doorcode").val(json.numhouse);
				$("#tagSelect").text(json.label);
			}
		}
	}
	function returndata(){
		var city = "天津";
		if (sessionStorage) {
			city = sessionStorage.getItem("city");
		};
		var name = $("#linkname").val();
		var sex = $(".sexval.on").text();
		var tel = $("#mobile").val();
		var provice = $("#citySelect").text();
		var detailadd = $("#selectAddressLine").text();
		var numhouse = $("#doorcode").val();
		var label = $("#tagSelect").text();
		return {
			"name" : $.trim(name),
			"sex" : $.trim(sex),
			"tel" : $.trim(tel),
			"provice" : $.trim(provice),
			"city" : $.trim(city),
			"detailadd" : $.trim(detailadd),
			"numhouse" : $.trim(numhouse),
			"label" : $.trim(label)
		};
	}
	$(function(){
		setdata();
	})
</script>
</body>
</html>