<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统</title>
	<link rel="stylesheet" href="/salad/Public/Admin/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/salad/Public/Admin/css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/salad/Public/Admin/css/invalid.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/salad/Public/Admin/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/salad/Public/Admin/js/simpla.jquery.configuration.js"></script>
	<script type="text/javascript" src="/salad/Public/Admin/js/facebox.js"></script>
	<script type="text/javascript" src="/salad/Public/Admin/js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="/salad/Public/Admin/js/jquery.datePicker.js"></script>
	<script type="text/javascript" src="/salad/Public/Admin/js/jquery.date.js"></script>
</head>
<body>
<div id="main-content">
	<div class="content-box">
		<!--头部切换-->
		<div class="content-box-header">
			<h3>添加门店</h3>
			<ul class="content-box-tabs">
				<li><a href="<?php echo U('Shop/shoplist');?>">门店列表</a></li>
				<li><a href="<?php echo U('Shop/addshop');?>" class="default-tab">添加门店</a></li>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="content-box-content">
			<div class="tab-content default-tab">
				<form action="<?php echo U('Shop/addshop');?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<p>
							<label>门店名称</label>
							<input class="text-input small-input" type="text" id="small-input" name="name" />
						</p>
						<p>
							<label>地址</label>
							<input class="text-input small-input" type="text" id="small-input" name="address" />
						</p>
						<p>
							<label>电话</label>
							<input class="text-input small-input" type="number" id="small-input" name="tel" />
						</p>
						<p>
							<label>营业时间</label>
							<input class="text-input small-input" type="text" id="small-input" name="working" />
						</p>
						<p>
							<input class="button" type="submit" value="保存" />
						</p>
					</fieldset>
					<div class="clear"></div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>