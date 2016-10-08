<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统</title>
	<link rel="stylesheet" href="/salad/Public/Admin/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/salad/Public/Admin/css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/salad/Public/Admin/css/invalid.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/salad/Public/Admin/js/jquery-1.9.1.min.js"></script>
</head>
<body>
<div id="main-content">
	<div class="content-box">
		<!--头部切换-->
		<div class="content-box-header">
			<h3>优惠券列表</h3>
			<ul class="content-box-tabs">
				<li><a href="<?php echo U('Coupon/index');?>" class="default-tab current">优惠券列表</a></li>
				<li><a href="<?php echo U('Coupon/couponadd');?>">添加优惠券</a></li>
			</ul>
			<div class="clear"></div>
		</div>

		<div class="content-search" style="height: 40px;margin: 10px 0 0 10px;">
			<form action="<?php echo U('Coupon/index');?>" method="post">
				优惠券ID：<input type="text" name="id" class="text-input" value="<?php echo ($_REQUEST['id']); ?>">
				类别：
				<select name="type">
					<option value="99">不限</option>
					<option value="1"<?php if($_REQUEST['type'] == 1): ?>selected<?php endif; ?>>满减</option>
					<option value="2"<?php if($_REQUEST['type'] == 2): ?>selected<?php endif; ?>>折扣</option>
					<option value="3"<?php if($_REQUEST['type'] == 3): ?>selected<?php endif; ?>>定额</option>
				</select>
				<input type="submit" class="button search-btn" value="查询">
			</form>
		</div>
		
		<!--表格内容-->
		<div class="content-box-content">
			<div class="tab-content default-tab" id="tab1">
				<form action="<?php echo U('AdminBasic/delList',array('tname'=>'Coupon'));?>" method="post">
					<table border="1">
						<!--标题-->
						<thead>
						<tr>
							<th width="5%">
								<input class="check-all" type="checkbox" />
								ID
							</th>
							<th width="10%">类别</th>
							<th width="10%">开始时间</th>
							<td width="10%">结束时间</td>
							<th width="10%">数量</th>
							<th width="10%">满额</th>
							<th width="10%">优惠</th>
							<th width="10%">折扣</th>
							<th width="10%">面额</th>
							<th width="10%">操作</th>
						</tr>
						</thead>
						<!--内容-->
						<tbody>
						<?php if(empty($list)): ?><tr><td colspan="10">没有符合条件的结果</td></tr><?php endif; ?>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td>
									<input type="checkbox" name="id[]" value="<?php echo ($vo['id']); ?>"/>
									<?php echo ($vo["id"]); ?>
								</td>
								<td>
									<?php if($vo["type"] == 1): ?>满减
									<?php elseif($vo["type"] == 2): ?>折扣
									<?php elseif($vo["type"] == 3): ?>定额<?php endif; ?>
								</td>
								<td><?php echo ($vo["startime"]); ?></td>
								<td><?php echo ($vo["endtime"]); ?></td>
								<td><?php echo ($vo["num"]); ?></td>
								<td><?php echo ($vo["man"]); ?></td>
								<td><?php echo ($vo["jian"]); ?></td>
								<td><?php echo ($vo["zhe"]); ?></td>
								<td>
                                    <?php echo ($vo["miane"]); ?>
                                </td>
                                <td>
                                    <a href="<?php echo U('Coupon/couponupd',array('id'=>$vo['id']));?>" title="编辑">
                                        <img src="/salad/Public/Admin/images/icons/pencil.png" alt="Edit" />
                                    </a>
                                    <a href="<?php echo U('Coupon/coupondel',array('id'=>$vo['id']));?>" title="删除">
                                        <img src="/salad/Public/Admin/images/icons/cross.png" alt="Delete" />
                                    </a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<!--表尾-->
						</tbody>
						<tfoot>
						<tr>
							<td colspan="20">
								<div class="bulk-actions align-left">
									<input type="submit" value="批量删除" class="button"/>
								</div>
								<div class="pagination">
									<?php echo ($page); ?>
								</div>
								<div class="clear"></div>
							</td>
						</tr>
						</tfoot>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>