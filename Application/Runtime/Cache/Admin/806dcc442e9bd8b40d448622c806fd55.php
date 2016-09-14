<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理系统</title>
    <link rel="stylesheet" href="/salad/Public/Admin/css/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/salad/Public/Admin/css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/salad/Public/Admin/css/invalid.css" type="text/css" media="screen" />
    <!--<link rel="stylesheet" href="/salad/Public/Admin/css/expand.css" type="text/css" media="screen" />-->
    <script type="text/javascript" src="/salad/Public/Admin/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/facebox.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/jquery.wysiwyg.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/trivial.jquery.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/simpla.jquery.configuration.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/ajax_operate.js"></script>
</head>
<body>
<!--主页面-->
<div id="main-content">
    <div class="content-box">
        <!--头部切换-->
        <div class="content-box-header">
            <h3>会员列表</h3>
            <ul class="content-box-tabs">
                <li><a href="<?php echo U('Member/memberList');?>" <?php if(($tab_type) == "1"): ?>class="default-tab"<?php endif; ?>>列表</a></li>
                <li><a href="<?php echo U('Member/memberList',array('type'=>'1'));?>" <?php if(($tab_type) == "2"): ?>class="default-tab"<?php endif; ?>>智能排序</a></li>
            </ul>
            <div class="clear"></div>
        </div>

        <div class="content-search" style="height: 40px;margin: 10px 0 0 10px;">
            <form action="<?php echo U('Member/memberList');?>" method="post">
                用户手机号：<input type="text" name="m_tel" class="text-input">
                <input type="submit" class="button search-btn" value="查询">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Member/delLevelScore');?>" onclick="return confirm('只有顶级管理员具备此项操作权限，确定清空吗？')">清空等级积分</a>
            </form>
        </div>

        <!--表格内容-->
        <div class="content-box-content">
            <!--内容表格 start-->
            <div class="tab-content default-tab" id="tab1">
                <table border="1">
                    <!--标题 start-->
                    <thead>
                    <tr>
                        <th width="">时间</th>
                        <th width="">姓名</th>
                        <th width="">电话</th>
                        <th width="">地址</th>
                        <th width="">职业</th>
                        <th width="">积分</th>
                        <th width="">等级积分</th>
                        <th width="">会员卡号</th>
                        <th width="10%">操作</th>
                    </tr>
                    </thead>
                    <!--标题 end-->
                    <!--内容 start-->
                    <tbody>
                    <?php if(is_array($member_list)): $i = 0; $__LIST__ = $member_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$member): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo (date('Y-m-d',$member['ctime'])); ?></td>
                            <td>
                                <?php echo ($member['m_name']); ?>
                            </td>
                            <td>
                                <?php echo ($member['m_tel']); ?>
                            </td>
                            <td>
                                <?php echo ($member['m_address']); ?>
                            </td>
                            <td>
                                <?php echo ($member['m_work']); ?>
                            </td>
                            <td>
                                <?php echo ($member['m_score']); ?>
                            </td>
                            <td>
                                <?php echo ($member['m_level_score']); ?>
                            </td>
                            <td>
                                <?php echo ($member['m_card_num']); ?>
                            </td>
                            <td>
                                <!--<a href="<?php echo U('WeiXinArticle/editTextBack',array('wxa_id'=>$text_back['wxa_id']));?>" title="编辑">
                                    <img src="/salad/Public/Admin/images/icons/pencil.png" width="16" height="18" alt="编辑" />
                                </a>-->
                                <a href="###" class="del" title="删除">
                                    <img src="/salad/Public/Admin/images/icons/cross.png" alt="删除" />
                                </a><input type="hidden" value="<?php echo U('Member/delMember',array('m_id'=>$member['m_id']));?>">
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                    <!--内容 end-->
                    <!--表尾 start-->
                    <tfoot>
                    <tr>
                        <td colspan="20">
                            <div class="bulk-actions align-left">
                            </div>
                            <div class="pagination">
                                <?php echo ($page); ?>
                            </div>
                            <div class="clear"></div>
                        </td>
                    </tr>
                    </tfoot>
                    <!--表尾 end-->
                </table>
            </div>
            <!--内容表格 end-->
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        //删除类型
        $('.del').click(function(){
            if(confirm('确定要删除吗')){
                window.location.href = $(this).next('input').val();
            }
        });
    });
</script>
</html>