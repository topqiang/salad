<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理系统</title>
    <link rel="stylesheet" href="/salad/Public/Admin/css/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/salad/Public/Admin/css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/salad/Public/Admin/css/invalid.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/salad/Public/Admin/css/expand.css" type="text/css" media="screen" />
    <script type="text/javascript" src="/salad/Public/Admin/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/facebox.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/jquery.wysiwyg.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/trivial.jquery.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/simpla.jquery.configuration.js"></script>
    <script type="text/javascript" src="/salad/Public/Common/kindeditor/kindeditor-min.js"></script>
    <script type="text/javascript" src="/salad/Public/Common/kindeditor/lang/zh_CN.js"></script>
    <script type="text/javascript" src="/salad/Public/Common/js/kindeditor.js"></script>
    <script type="text/javascript" src="/salad/Public/Admin/js/ajax_operate.js"></script>
</head>
<body>
<!--主页面-->
<div id="main-content">
    <div class="content-box">
        <!--提示-->
        <div class="notification success png_bg" style="display:none">
            <div></div>
        </div>
        <div class="notification error png_bg n-error" style="display:none">
            <div></div>
        </div>
        <!--头部切换-->
        <div class="content-box-header">
            <h3>文章列表</h3>
            <ul class="content-box-tabs">
                <li><a href="#tab1" class="default-tab">列表</a></li>
                <li><a href="#tab2">新增</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <!--表格内容-->
        <div class="content-box-content">
            <!--内容表格 start-->
            <div class="tab-content default-tab" id="tab1">
                <form action="<?php echo U('WeiXinArticle/doCreateMenu');?>" method="post">
                    <table border="1">
                        <!--标题 start-->
                        <thead>
                        <tr>
                            <th width="">ID</th>
                            <th width="">作者</th>
                            <th width="">标题</th>
                            <th width="">时间</th>
                            <th width="10%">操作</th>
                        </tr>
                        </thead>
                        <!--标题 end-->
                        <!--内容 start-->
                        <tbody>
                        <?php if(is_array($art_list)): $i = 0; $__LIST__ = $art_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($art['art_id']); ?></td>
                                <td>
                                    <?php echo ($art['art_author']); ?>
                                </td>
                                <td>
                                    <?php echo ($art['art_title']); ?>
                                </td>
                                <td>
                                    <?php echo (date('Y-m-d',$art['ctime'])); ?>
                                </td>
                                <td>
                                    <a href="<?php echo U('Article/editArticle',array('art_id'=>$art['art_id']));?>" title="编辑">
                                        <img src="/salad/Public/Admin/images/icons/pencil.png" width="16" height="18" alt="编辑" />
                                    </a>&nbsp;
                                    <a href="###" class="del" title="删除">
                                        <img src="/salad/Public/Admin/images/icons/cross.png" alt="删除" />
                                    </a><input type="hidden" value="<?php echo U('Article/delArticle',array('art_id'=>$art['art_id']));?>">
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
                </form>
            </div>
            <!--内容表格 end-->

            <!--表单 start-->
            <div class="tab-content form" id="tab2">
                <form action="<?php echo U('Article/addArticle');?>" method="post" class="form">
                    <fieldset>
                        <p>
                            <span class="label">标题：</span>
                            <input class="text-input medium-input datepicker" type="text" name="art_title" />
                        </p>
                        <p>
                            <span class="label">内容：</span>
                            <textarea id="text-content" name="art_content" style="width:300px;height:300px;visibility:hidden;"></textarea>
                            <br>
                            <span style="color: red">注意传图不要太大</span>
                        </p>
                        <p>
                            <input class="button add-btn" type="submit" value="添　加" />
                        </p>
                    </fieldset>
                    <div class="clear"></div>
                </form>
            </div>
            <!--表单 end-->
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