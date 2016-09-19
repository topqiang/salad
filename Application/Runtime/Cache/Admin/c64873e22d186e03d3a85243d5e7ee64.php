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
			<h3>订单列表</h3>
			<ul class="content-box-tabs">
                <li><a href="<?php echo U('Order/orderList',array('type'=>'2'));?>" <?php if(($tab_type) == "4"): ?>class="default-tab"<?php endif; ?>>今日未完成订单</a></li>
                <li><a href="<?php echo U('Order/orderList');?>" <?php if(($tab_type) == "1"): ?>class="default-tab"<?php endif; ?>>未完成订单</a></li>
                <li><a href="<?php echo U('Order/oldList',array('type'=>'1'));?>" <?php if(($tab_type) == "3"): ?>class="default-tab"<?php endif; ?>>今日已完成</a></li>
                <li><a href="<?php echo U('Order/oldList');?>" <?php if(($tab_type) == "2"): ?>class="default-tab"<?php endif; ?>>已完成订单</a></li>

			</ul>
			<div class="clear"></div>
		</div>

		<div class="content-search" style="height: 40px;margin: 10px 0 0 10px;">
			<form action="<?php echo U('Order/oldList');?>" method="post">
				订单号：<input type="text" name="id" class="text-input">
				订单人姓名：<input type="text" name="name" class="text-input">
				订单人电话：<input type="text" name="tel" class="text-input">
				<input type="submit" class="button search-btn" value="查询">
			</form>
		</div>

		<!--表格内容-->
		<div class="content-box-content">
			<div class="tab-content default-tab" id="tab1">
				<form action="<?php echo U('AdminBasic/delList',array('tname'=>''));?>" method="post">
					<table border="1">
						<!--标题-->
						<thead>
						<tr>
                            <th width="5%">订单号</th>
                            <th width="6%">付款方式</th>
                            <th width="5%">姓名</th>
                            <th width="8%">电话</th>
                            <th width="20%">地址</th>
                            <th width="8%">职业</th>
                            <th width="15%">订单信息</th>
                            <th width="5%">总计</th>
                            <th width="10%">备注</th>
                            <th width="10%">订餐时间</th>
                            <th width="6%">操作</th>
						</tr>
						</thead>
						<!--内容-->
						<tbody>
						<?php if(empty($list)): ?><tr><td colspan="11">没有符合条件的结果</td></tr><?php endif; ?>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["id"]); ?></td>
								<td>
									<?php if($vo['type'] == 1): ?><span style="color:red;">积分兑换</span>
										<?php else: ?>
										货到付款<?php endif; ?>
								</td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["tel"]); ?></td>
								<td><?php echo ($vo["address"]); ?></td>
                                <td><?php echo ($vo["m_work"]); ?></td>
								<td>
									<?php if(is_array($vo['list'])): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($vo['type'] == 1): echo ($vo1["name"]); ?>&nbsp;&nbsp;<?php echo ($vo1["score"]); ?>积分/<?php echo ($vo1["unit"]); ?>&nbsp;&nbsp;(<?php echo ($vo1["num"]); echo ($vo1["unit"]); ?>)<br/>
											<?php else: ?>
											<?php echo ($vo1["name"]); ?>&nbsp;&nbsp;<?php echo ($vo1["price"]); ?>元/<?php echo ($vo1["unit"]); ?>&nbsp;&nbsp;(<?php echo ($vo1["num"]); echo ($vo1["unit"]); ?>)<br/><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</td>
								<td>
                                    <?php if($vo['type'] == 1): echo ($vo["total"]); ?>积分
                                        <?php else: ?>
                                        <?php echo ($vo["total"]); ?>元<?php endif; ?>

                                </td>
								<td><?php echo ($vo["message"]); ?></td>
								<td><?php echo (date("Y-m-d H:i",$vo["ctime"])); ?></td>
                                <td>
                                    <a href="<?php echo U('Order/OrderSetFail',array('id'=>$vo['id']));?>" title="送餐" class="button">退餐</a>
                                </td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<!--表尾-->
						</tbody>
						<tfoot>
						<tr>
							<td colspan="20">
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