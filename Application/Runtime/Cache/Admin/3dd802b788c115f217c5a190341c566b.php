<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统</title>
	<link rel="stylesheet" href="/salad/Public/Admin/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/salad/Public/Admin/css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/salad/Public/Admin/css/invalid.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/salad/Public/Admin/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/salad/Public/Admin/js/laydate/laydate.js"></script>
</head>
<body>
<div id="main-content">
	<div class="content-box">
		<!--头部切换-->
		<div class="content-box-header">
			<h3>添加优惠券</h3>
			<ul class="content-box-tabs">
				<li><a href="<?php echo U('Coupon/index');?>">优惠券列表</a></li>
				<li><a href="<?php echo U('Coupon/couponadd');?>" class="default-tab current">添加优惠卷</a></li>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="content-box-content">
			<div class="tab-content default-tab">
				<form action="<?php echo U('Coupon/couponadd');?>" method="post" onsubmit="return putcoupon()" enctype="multipart/form-data">
					<fieldset>
						<p>
							<label>类别</label>
							<select name="type" id="type">
								<option value="99">不限</option>
								<option value="1">满减</option>
								<option value="2">折扣</option>
								<option value="3">定额</option>
							</select>
						</p>
						<p>
							<label>开始时间</label>
							<input class="text-input small-input" type="text" id="startime" name="startime" />
						</p>
						<p>
							<label>结束时间</label>
							<input class="text-input small-input" type="text" id="endtime" name="endtime" />
						</p>
						<p>
							<label>数量</label>
							<input class="text-input small-input" type="text" id="num" name="num" />
						</p>
						<p class="disn man">
							<label>满额</label>
							<input class="text-input small-input" type="text" id="man" name="man" />
						</p>
						<p class="disn man">
							<label>减</label>
							<input class="text-input small-input man" type="text" id="jian" name="jian" />
						</p>
						<p class="disn zhe">
							<label>折扣</label>
							<input class="text-input small-input zhe" type="text" id="zhe" name="zhe" />
						</p>
						<p class="disn miane">
							<label>面额</label>
							<input class="text-input small-input miane" type="text" id="miane" name="miane" />
						</p>
						<p>
							<input class="button" type="submit" value="保存" />
							<span id="errormsg" style="color:red;float:right"></span>
						</p>
					</fieldset>
					<div class="clear"></div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var start = {
	  elem: '#startime',
	  format: 'YYYY/MM/DD',
	  min: laydate.now(), //设定最小日期为当前日期
	  max: '2099-06-16', //最大日期
	  istime: true,
	  istoday: false,
	  choose: function(datas){
	     end.min = datas; //开始日选好后，重置结束日的最小日期
	     end.start = datas //将结束日的初始值设定为开始日
	  }
	};
	var end = {
	  elem: '#endtime',
	  format: 'YYYY/MM/DD',
	  min: laydate.now(),
	  max: '2099-06-16',
	  istime: true,
	  istoday: false,
	  choose: function(datas){
	    start.max = datas; //结束日选好后，重置开始日的最大日期
	  }
	};
	laydate(start);
	laydate(end);


	$(function(){
		$("#type").on('click',function(){
			var self = $(this);
			var type = self.val();
			$(".man,.zhe,.miane").addClass("disn");
			if (type == 1) {
				$(".man").removeClass("disn");
			}else if(type == 2){
				$(".zhe").removeClass("disn");
			}else if(type == 3){
				$(".miane").removeClass("disn");
			}
		});
	});

	function putcoupon(){
		var type = $("#type").val();
		var startime = $("#startime").val();
		var endtime = $("#endtime").val();
		var num = $("#num").val();
		if (type != 99) {
			if (type == "1") {
				var man =$("#man").val();
				var jian =$("#jian").val();
				if (man == "") {
					$("#errormsg").text("满额必填！");
					return false;
				};
				if (jian == "") {
					$("#errormsg").text("减必填！");
					return false;
				};
			}else if(type == "2"){
				var zhe = $("#zhe").val();
				if (zhe == "") {
					$("#errormsg").text("折扣必填！");
					return false;
				};
			}else if(type == "3"){
				var miane = $("#miane").val();
				if (miane == "") {
					$("#errormsg").text("面额必填！");
					return false;
				};
			}
		}else{
			$("#errormsg").text("优惠卷类型必选！");
			return false;
		}
		if (startime == "") {
			$("#errormsg").text("开始时间必填！");
			return false;
		};
		if (endtime == "") {
			$("#errormsg").text("结束时间必填！");
			return false;
		};
		if (num == "") {
			$("#errormsg").text("发行数量必填！");
			return false;
		};
		return true;
	}
</script>
</body>
</html>