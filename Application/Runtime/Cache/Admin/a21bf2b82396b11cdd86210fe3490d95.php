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
            <h3>文章编辑</h3>
            <ul class="content-box-tabs">
            </ul>
            <div class="clear"></div>
        </div>
        <!--表格内容-->
        <div class="content-box-content">
            <!--表单 start-->
            <div class="tab-content default-tab" id="tab1">
                <form action="<?php echo U('Article/editArticle');?>" method="post" class="form">
                    <input type="hidden" name="art_id" value="<?php echo ($art_info['art_id']); ?>">
                    <fieldset>
                        <p>
                            <span class="label">标题：</span>
                            <input class="text-input medium-input datepicker" type="text" name="art_title" value="<?php echo ($art_info['art_title']); ?>"/>
                        </p>
                        <p>
                            <span class="label">内容：</span>
                            <textarea id="text-content" name="art_content" style="width:300px;height:300px;visibility:hidden;"><?php echo ($art_info['art_content']); ?></textarea>
                        </p>
                        <p>
                            <input class="button add-btn" type="submit" value="保　存" />
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