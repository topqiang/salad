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
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/bmap_autocomplete.css">
<style type="text/css">
	body{
		background: #e6e7e1;
	}
</style>
	<header>
		<a href="javascript:history.go(-1)" class="arrow-l"></a>
		<h2><font id="_df39_1_2_title" style="">地址列表选择</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em><?php echo ($count); ?></em></span></a></font>
	</header>
	<div id="l-map"></div>
	<div id="r-result" class="det-dz"><input type="text" id="suggestId" size="20"  class="dz-inp inpt" placeholder="请输入详细地址" /></div>
	<div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
	<script src="/salad/Public/Home/js/config.js"></script>
	<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
	<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
	<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
	<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
	<script src="/salad/Public/Home/js/personal.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=gZedg9GnM3hGi68Z3YubDIyx57oU4GTf"></script>
	<script type="text/javascript">
	// 百度地图API功能
	function G(id) {
		return document.getElementById(id);
	}

	var map = new BMap.Map("l-map");
	map.centerAndZoom("<?php echo ($city); ?>",12);                   // 初始化地图,设置城市和地图级别。

	var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
		{"input" : "suggestId"
		,"location" : map
	});

	ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
	var str = "";
		var _value = e.fromitem.value;
		var value = "";
		if (e.fromitem.index > -1) {
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
		
		value = "";
		if (e.toitem.index > -1) {
			_value = e.toitem.value;
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
		G("searchResultPanel").innerHTML = str;
	});

	var myValue;
	ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
	var _value = e.item.value;
		myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
		// setPlace();
		if (sessionStorage) {
			sessionStorage.setItem( "city" , _value.district );
		};
		<?php if(empty($_REQUEST['edi'])): ?>window.location.href = "<?php echo U('Address/location');?>/line/"+myValue;
		<?php else: ?>window.location.href = "<?php echo U('Address/ediadd');?>/line/"+myValue;<?php endif; ?>
	});

	function setPlace(){
		map.clearOverlays();    //清除地图上所有覆盖物
		function myFun(){
			var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
			map.centerAndZoom(pp, 18);
			map.addOverlay(new BMap.Marker(pp));    //添加标注
		}
		var local = new BMap.LocalSearch(map, { //智能搜索
		  onSearchComplete: myFun
		});
		local.search(myValue);
	}
</script>
</body>
</html>