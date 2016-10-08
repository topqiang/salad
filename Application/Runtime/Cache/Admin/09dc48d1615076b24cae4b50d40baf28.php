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
			<h3>修改运费</h3>
			<div class="clear"></div>
		</div>
		<div class="content-box-content">
			<div class="tab-content default-tab">
				<form action="<?php echo U('Luggage/updluggage');?>" method="post" onsubmit="return putabout()" enctype="multipart/form-data">
					<fieldset>
					<input class="text-input small-input" type="hidden" id="id" name="id" value="<?php echo ($about["id"]); ?>"/>
						<p>
							<label>运费</label>
							<input class="text-input small-input" type="text" id="price" name="price" value="<?php echo ($luggage["price"]); ?>" />
						</p>
						<p>
							<label>满额（免运费）</label>
							<input class="text-input small-input" type="text" id="man" name="man" value="<?php echo ($luggage["man"]); ?>" />
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
	// var start = {
	//   elem: '#startime',
	//   format: 'YYYY/MM/DD',
	//   min: laydate.now(), //设定最小日期为当前日期
	//   max: '2099-06-16', //最大日期
	//   istime: true,
	//   istoday: false,
	//   choose: function(datas){
	//      end.min = datas; //开始日选好后，重置结束日的最小日期
	//      end.start = datas //将结束日的初始值设定为开始日
	//   }
	// };
	// var end = {
	//   elem: '#endtime',
	//   format: 'YYYY/MM/DD',
	//   min: laydate.now(),
	//   max: '2099-06-16',
	//   istime: true,
	//   istoday: false,
	//   choose: function(datas){
	//     start.max = datas; //结束日选好后，重置开始日的最大日期
	//   }
	// };
	// laydate(start);
	// laydate(end);


	$(function(){
	});

	function putabout(){
		var msg = $("#content").val();
		if (msg.length > 150) {
			$("#errormsg").text("请不要输入超出150个字符");
			return false;
		}
		return true;
	}
</script>
</body>
</html>