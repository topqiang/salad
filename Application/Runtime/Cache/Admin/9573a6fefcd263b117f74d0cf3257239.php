<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登陆</title>
<link rel="stylesheet" href="/salad/Public/Admin/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/salad/Public/Admin/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/salad/Public/Admin/css/invalid.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/salad/Public/Admin/css/expand.css" type="text/css" media="screen" />
<script type="text/javascript" src="/salad/Public/Admin/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/salad/Public/Admin/js/ajax_submit.js"></script>
</head>
<body id="login">
    <div id="login-wrapper" class="png_bg">
        <div id="login-top">
            <a href="#"><img id="logo" src="/salad/Public/Admin/images/logo1.png" alt="logo"/></a>
        </div>
        <div id="login-content">
            <!--错误提示-->
            <div class="notification information png_bg" style="display: none;">
                <div> </div>
            </div>
            <form action="<?php echo U('Admin/Manager/login');?>" class="form" method="post">
                <p>
                    <label>用户名：</label>
                    <input class="text-input" type="text" name="account"/>
                </p>
                <div class="clear"></div>
                <p>
                    <label>密　码：</label>
                    <input class="text-input" type="password" name="password"/>
                </p>
                <div class="clear"></div>
                <p>
                    <label id="code_label">验证码：</label>
                    <input class="text-input code" type="text" name="verify"/>
                    <img src="<?php echo U('Manager/verify');?>" onclick="change_verify();" width="130" height="50" id="verify_img"/>
                </p>
                <div class="clear"></div>
                <p>
                    <input class="button submit_btn" type="submit" value="登　　　　　陆" style="font-size: 14px;margin-right: 90px;"/>
                </p>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript">
	//验证码
	function change_verify(){
		var char="<?php echo U('Manager/verify');?>";
		document.getElementById('verify_img').src=char+'/'+new Date().getTime();
	}
	/* $(document).ready(function(){
	 //ajax登陆
	 $('.submit_btn').click(function(){
	 ajaxLogin('<?php echo U("Manager/doLogin");?>');
	 });
	 });*/
</script>
</html>