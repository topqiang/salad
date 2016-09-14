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
			<h3>商品列表</h3>
			<ul class="content-box-tabs">
				<li><a href="<?php echo U('Goods/goodsList');?>" class="default-tab">商品列表</a></li>
				<li><a href="<?php echo U('Goods/goodsAdd');?>">添加商品</a></li>
			</ul>
			<div class="clear"></div>
		</div>

		<div class="content-search" style="height: 40px;margin: 10px 0 0 10px;">
			<form action="<?php echo U('Goods/goodsList');?>" method="post">
				商品ID：<input type="text" name="fid" class="text-input">
				商品名称：<input type="text" name="name" class="text-input">
				商品分类：
				<select name="cate_id">
					<option value="99">不限</option>
					<?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				<input type="submit" class="button search-btn" value="查询">
			</form>
		</div>
		
		<!--表格内容-->
		<div class="content-box-content">
			<div class="tab-content default-tab" id="tab1">
				<form action="<?php echo U('AdminBasic/delList',array('type'=>'real','tname'=>'Goods'));?>" method="post">
					<table border="1">
						<!--标题-->
						<thead>
						<tr>
							<th width="5%">
								<input class="check-all" type="checkbox" />
								ID
							</th>
							<th width="10%">商品名称</th>
							<th width="10%">分类</th>
							<td width="10%">主要成分</td>
							<th width="10%">缩略图</th>
							<th width="10%">生成时间</th>
							<th width="10%">修改时间</th>
							<th width="10%">现价</th>
							<th width="10%">备注</th>
                            <th width="5%">状态</th>
							<th width="10%">操作</th>
						</tr>
						</thead>
						<!--内容-->
						<tbody>
						<?php if(empty($list)): ?><tr><td colspan="10">没有符合条件的结果</td></tr><?php endif; ?>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td>
									<input type="checkbox" name="id[]" value="<?php echo ($vo['gid']); ?>"/>
									<?php echo ($vo["gid"]); ?>
								</td>
								<td>
									<?php echo ($vo["gname"]); ?>
								</td>
								<td><?php echo ($vo["cname"]); ?></td>
								<td><?php echo ($vo["gconstituent"]); ?></td>
								<td><img src="/salad/<?php echo ($vo["gpic"]); ?>" height="30" /></td>
								<td><?php echo (date("y-m-d H:m:i",$vo["gcreate_time"])); ?></td>
								<td><?php echo (date("y-m-d H:m:i",$vo["gupdate_time"])); ?></td>
								<td><?php echo ($vo["gprice"]); ?></td>
								<td><?php echo ($vo["gremark"]); ?></td>
								<td>
                                    <?php if($vo['fstatus'] == 0): ?><a href="<?php echo U('Food/foodDown',array('gid'=>$vo['gid']));?>" title="下架">
                                        <img src="/salad/Public/Admin/images/icons/tick_circle.png" alt="Delete" />
                                    </a>
                                    <?php elseif($vo['gstatus'] == 1): ?>
                                    <a href="<?php echo U('Food/foodUp',array('gid'=>$vo['gid']));?>" title="上架">
                                        <img src="/salad/Public/Admin/images/icons/cross_circle.png" alt="Delete" />
                                    </a><?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo U('Goods/goodsEdit',array('id'=>$vo['gid']));?>" title="编辑">
                                        <img src="/salad/Public/Admin/images/icons/pencil.png" alt="Edit" />
                                    </a>
                                    <a href="<?php echo U('Goods/goodsDel',array('id'=>$vo['gid']));?>" title="删除">
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