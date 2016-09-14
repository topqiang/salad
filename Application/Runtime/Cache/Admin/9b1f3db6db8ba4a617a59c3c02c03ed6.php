<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理系统</title>
    <link rel="stylesheet" href="/xjl/Public/Admin/css/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/xjl/Public/Admin/css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/xjl/Public/Admin/css/invalid.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/xjl/Public/Admin/css/expand.css" type="text/css" media="screen" />
    <script type="text/javascript" src="/xjl/Public/Admin/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/xjl/Public/Admin/js/facebox.js"></script>
    <script type="text/javascript" src="/xjl/Public/Admin/js/jquery.wysiwyg.js"></script>
    <script type="text/javascript" src="/xjl/Public/Admin/js/trivial.jquery.js"></script>
    <script type="text/javascript" src="/xjl/Public/Admin/js/simpla.jquery.configuration.js"></script>
    <script type="text/javascript" src="/xjl/Public/Admin/js/ajax_operate.js"></script>
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
            <h3>桃花签</h3>
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
                <table border="1">
                    <!--标题 start-->
                    <thead>
                    <tr>
                        <th width="10%">编号</th>
                        <th width="20%">签名</th>
                        <th width="10%">主题词</th>
                        <th width="40%">内容</th>
                        <th width="10%">权重</th>
                        <th width="10%">操作</th>
                    </tr>
                    </thead>
                    <!--标题 end-->
                    <!--内容 start-->
                    <tbody>
                    <?php if(is_array($descarr)): $i = 0; $__LIST__ = $descarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$desc): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($desc['id']); ?></td>
                            <td>
                                <?php echo ($desc['qname']); ?>
                            </td>
                            <td>
                                <?php echo ($desc['keywords']); ?>
                            </td>
                            <td>
                                <?php echo ($desc['text']); ?>
                            </td>
                            <td>
                                <?php echo ($desc['weight']); ?>
                            </td>
                            <td>
                                <a href="<?php echo U('WeiXinArticle/editDesc',array('id'=>$desc['id']));?>" title="编辑">
                                    <img src="/xjl/Public/Admin/images/icons/pencil.png" width="16" height="18" alt="编辑" />
                                </a>&nbsp;
                                <a href="###" class="del" title="删除">
                                    <img src="/xjl/Public/Admin/images/icons/cross.png" alt="删除" />
                                </a><input type="hidden" value="<?php echo U('WeiXinArticle/delDesc',array('id'=>$desc['id']));?>">
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                    <!--内容 end-->
                    <!--表尾 start-->
                    <tfoot>
                    <tr>
                        <td colspan="1">
                           桃花签配置地址
                        </td>
                        <td colspan="5" style="color:red">http://tg.txunda.com/index.php?s=/Thqian/index</td>
                    </tr>
                    </tfoot>
                    <!--表尾 end-->
                </table>
            </div>
            <!--内容表格 end-->

            <!--表单 start-->
            <div class="tab-content form" id="tab2">
                <form action="<?php echo U('WeiXinArticle/addQianBack');?>" method="post" class="form">
                    <fieldset>
                        <p>
                            <span class="label">签&nbsp;名：</span>
                            <input class="text-input medium-input datepicker" type="text" name="qname" />
                            <span style="color:#EC5B4D">请不要输入超出4个字</span>
                        </p>
                        <p>
                            <span class="label">主题词：</span>
                            <input class="text-input medium-input datepicker" type="text" name="keywords" />
                            <span style="color:#EC5B4D">
                            	请不要输入超出5个字
                            </span>
                        </p>
                        <p>
                            <span class="label">内&nbsp;容：</span>
                            <textarea class="text-input textarea" name="text"></textarea>
                            <span style="color:#EC5B4D">
                            	请不要超出40字，每行字不要超出10字且请用“,”号隔开。
                            </span>
                        </p>
                        <p>
                            <span class="label">权&nbsp;重：</span>
                            <input class="text-input medium-input datepicker" type="text" name="weight" />
                            <span style="color:#EC5B4D">
                            	请输入1——100之内的数值
                            </span>
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