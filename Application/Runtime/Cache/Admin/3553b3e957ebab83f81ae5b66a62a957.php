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
			<h3>编辑门店</h3>
			<div class="clear"></div>
		</div>
		<div class="content-box-content">
			<div class="tab-content default-tab">
				<form action="<?php echo U('Shop/shopedit');?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
					<fieldset>
						<p>
							<label>门店名称(ID:<?php echo ($info["id"]); ?>)</label>
							<input value="<?php echo ($info["name"]); ?>" class="text-input small-input" type="text" id="small-input" name="name" />
						</p>
						<p>
							<label>地址</label>
							<input class="text-input small-input" type="text" id="small-input" name="address" value="<?php echo ($info["address"]); ?>" />
						</p>
						<p>
							<label>电话</label>
							<input class="text-input small-input" type="text" id="small-input" name="tel" value="<?php echo ($info["tel"]); ?>" />
						</p>
						<p>
							<label>营业时间</label>
							<input class="text-input small-input" type="text" id="small-input" name="working" value="<?php echo ($info["working"]); ?>" />
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