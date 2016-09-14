<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理系统</title>
    <link rel="stylesheet" href="/salad/Public/Admin/css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="/salad/Public/Admin/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/menu.simpla.jquery.js"></script>
</head>
<body>
    <!--左部页面-->
    <div id="sidebar">
        <div id="sidebar-wrapper">
            <!--logo-->
            <a href="#">
                <img id="logo" src="/salad/Public/Admin/images/logo.png" width="188" alt="logo"/>
            </a>
            <!--欢迎  退出-->
            <div id="profile-links">
                欢迎, <a href="###"><?php echo ($_SESSION['account']); ?></a>
                |
                <a href="<?php echo U('Manager/logout');?>" target="_top" title="logout">退出系统</a>
            </div>
            <!--退出-->
            <!--菜单 start-->
            <ul id="main-nav">
				<li>
					<a href="#" class="nav-top-item">菜品管理</a>
					<ul>
						<li><a href="<?php echo U('Foods/foodsList');?>" target="main">菜品列表</a></li>
						<li><a href="<?php echo U('Cate/CateList',array('cate'=>'Fcate'));?>" target="main">菜品分类</a></li>
					</ul>
				</li>
                <li>
                    <a href="#" class="nav-top-item">商品管理</a>
                    <ul>
                        <li><a href="<?php echo U('Goods/GoodsList');?>" target="main">商品列表</a></li>
                        <li><a href="<?php echo U('Cate/CateList',array('cate'=>'Gcate'));?>" target="main">商品分类</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-top-item">订单管理</a>
                    <ul>
                        <li><a href="<?php echo U('Order/OrderList',array('type'=>'2'));?>" target="main">订单列表</a></li>
                    </ul>
                </li>
				<li>
					<a href="#" class="nav-top-item">用户管理</a>
					<ul>
                        <?php if($_SESSION['g_id'] != 3): ?><li><a href="<?php echo U('Member/memberList');?>" target="main">用户列表</a></li>
                        <?php else: endif; ?>
                        <li><a href="<?php echo U('Member/addScore');?>" target="main">堂食加积分</a></li>
						<li><a href="<?php echo U('Comment/comList');?>" target="main">评论列表</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item">管&nbsp;理&nbsp;员</a>
					<ul>
						<li><a href="<?php echo U('Admin/adminList');?>" target="main">管理员列表</a></li>
						<li><a href="<?php echo U('Group/groupList');?>" target="main">分组管理</a></li>
						<li><a href="<?php echo U('Manager/editPwd');?>" target="main">修改密码</a></li>
					</ul>
				</li>
                <!-- 
                <?php if($_SESSION['g_id'] != 3): ?><li>
                    <a href="#" class="nav-top-item">微信配置</a>
                    <ul>
                        <li><a href="<?php echo U('WeiXinArticle/api');?>" target="main">API接口</a></li>
                        <li><a href="<?php echo U('WeiXinArticle/createMenu');?>" target="main">创建菜单</a></li>
                        <li><a href="<?php echo U('WeiXinArticle/backType',array('back_type'=>'FollowBack'));?>" target="main">关注时回复</a></li>
                        <li><a href="<?php echo U('WeiXinArticle/backType',array('back_type'=>'TextBack'));?>" target="main">文本回复</a></li>
                        <li><a href="<?php echo U('WeiXinArticle/backType',array('back_type'=>'PicTextBack'));?>" target="main">图文回复</a></li>
                        <li><a href="<?php echo U('WeiXinArticle/backType',array('back_type'=>'noneBack'));?>" target="main">空回答回复</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-top-item">文章管理</a>
                    <ul>
                        <li><a href="<?php echo U('Article/articleList');?>" target="main">文章列表</a></li>
                    </ul>
                </li>
                <?php else: endif; ?> -->
            </ul>
            <!--菜单 end-->
        </div>
    </div>
</body>
</html>