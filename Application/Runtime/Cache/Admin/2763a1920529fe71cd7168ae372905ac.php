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
			<h3>堂食添加积分</h3>
			<ul class="content-box-tabs">
				<li><a href="<?php echo U('Member/addScore');?>" class="default-tab">添加积分</a></li>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="content-box-content">
			<div class="tab-content default-tab">
				<form action="<?php echo U('Member/addScore');?>" method="post">
					<fieldset>
						<p>
							<label>用户手机</label>
							<input class="text-input small-input" type="text"  name="m_tel" id="m_tel"/>
						</p>
						<p>
							<label>姓名</label>
                            <input class="text-input small-input" type="text"  name="m_name" id="m_name"/>
						</p>
                        <p>
                            <label>地址</label>
                            <input class="text-input small-input" type="text"  name="m_address" id="m_address"/>
                        </p>
                        <p>
                            <label>职业</label>
                            <input class="text-input small-input" type="text"  name="m_work" id="m_work"/>
                        </p>
                        <p>
                            <label>当前积分</label>
                            <span id="m_score_old"></span>
                        </p>
						<p>
							<label>消费金额</label>
                            <input class="text-input small-input" type="text"  name="m_score" id="m_score"/>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#m_tel").blur(function(){
            var tel=this.value;
            $.ajax({
                url:'<?php echo U("Home/Order/getInfo");?>',
                type:'get',
                data:{m_tel:tel},
                success:function(data){
                    $('#m_name').val(data['m_name']);
                    $('#m_address').val(data['m_address']);
                    $('#m_score_old').text(data['m_score']);
                    $('#m_work').val(data['m_work']);
                }
            });
        });

    });
</script>
</html>