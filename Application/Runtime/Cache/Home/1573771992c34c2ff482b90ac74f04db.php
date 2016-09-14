<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0061)http://daisyfresh.21move.net/df4.html?rand=0.8027869819197804 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>Daisy Fresh</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/reset.css">
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/fakeLoader.css">
<link rel="stylesheet" type="text/css" href="/salad/Public/Home/css/df2015.css"></head>
<body>
	<div class="fakeloader" style="position: fixed; width: 100%; height: 100%; top: 0px; left: 0px; z-index: 999; display: none; background-color: rgb(68, 68, 68);"><div class="fl spinner2" style="position: fixed; left: 50%; top: 50%;"><div class="spinner-container container1"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container2"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container3"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div></div></div>
	<header>
		<a href="" class="arrow-l"></a>
	  <h2><font id="_df8_title" style="">帮我选沙拉</font></h2>
		<font id="CartLine"><a href="<?php echo U('Goods/gley');?>"><span class="cart-ico"><em>1</em></span></a></font>
	</header>
    <div id="RenewLine">
        <div class="con-wrap">
            <div class="back-g">
                <div class="load-mod">
                    <div>
                        <img src="/salad/Public/Home/images/loading-1.gif">
                    </div>
                    <p><font id="_wait" style="">亲，沙拉正在调配中，<br>请耐心等待一会哦</font></p>
                </div>	
            </div>
        </div>
    </div>
    <div id="CommentShowLine" style="display:none">
        <div class="con-wrap-bt">
            <div class="top-tit fl-clr">
                <ul class="tit-2 fl-clr">
                    <li class="on reload"><p><font id="_df8_2_again">重选一批</font></p></li>
                    <li class="reset"><font id="_df8_2_recovery" style="">恢复默认数量</font></li>
                </ul>
            </div>
            <div>
                <div class="choose-con">
                    <h2 id="base"><font id="_df8_2_basis" style="">基菜</font></h2>
                    <ul id="BaseList">
                   </ul>
                </div>
                <div class="choose-con">
                    <h2 id="main"><font id="_df8_2_master" style="">主菜</font></h2>
                    <ul id="MainList">
                   </ul>
                </div>
                <div class="choose-con-2">
                    <h2 id="sauce"><font id="_df8_2_sauces" style="">酱料</font></h2>
                    <ul id="SauceList">
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?><li id="<?php echo ($obj["fid"]); ?>" name="<?php echo ($obj["fname"]); ?>" <?php if($key == 0): ?>class="on"<?php endif; ?>>
                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td class="td-1">
                                                <img src="/salad/<?php echo ($obj["fpic"]); ?>">
                                            </td>
                                            <td class="td-2"><?php echo ($obj["fname"]); ?></td>
                                            <td class="td-3"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="choose-menu">
            <div class="fl-clr">
                <div class="menu-l fl-clr">
                    <dl onclick="$(&#39;html,body&#39;).animate({scrollTop:$(&#39;#base&#39;).offset().top},1000)">
                        <dt><i id="BaseTotalCountLine"></i></dt>
                        <dd><font id="_df8_2_basis">基菜</font></dd>
                    </dl>
                    <dl onclick="$(&#39;html,body&#39;).animate({scrollTop:$(&#39;#main&#39;).offset().top},1000)">
                        <dt><i id="MainTotalCountLine"></i></dt>
                        <dd><font id="_df8_2_master">主菜</font></dd>
                    </dl>
                    <dl onclick="$(&#39;html,body&#39;).animate({scrollTop:$(&#39;#sauce&#39;).offset().top},1000)">
                        <dt><i id="SauceTotalCountLine">1</i></dt>
                        <dd><font id="_df8_2_sauces">酱料</font></dd>
                    </dl>
                </div>
                <div class="menu-r-2 fl-clr">
                    <span class="cut-ico" id="IsShredLine"><font id="_df8_2_sauces">切碎</font></span>
                    <span class="cart-btn-2" onclick="savejc()">
                        <em><font id="_ok">选好了</font></em>
                    </span>
                </div>
            </div>
        </div>
    </div>
<script src="/salad/Public/Home/js/config.js"></script>
<script src="/salad/Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/zepto.js" type="text/javascript"></script>
<script src="/salad/Public/Home/js/touch.js" type="text/javascript"></script>
<!-- <script src="/salad/Public/Home/js/wewing.token.js"></script>
<script src="/salad/Public/Home/js/wewing.init.js"></script> -->
<script src="/salad/Public/Home/js/system.salad.js"></script>
<script language="javascript">
var goodtype = sessionStorage.getItem("goodtype");

function savejc(){
    var goods ={"name" : goodtype , "foods" : []};
    var type = goods.name ? goods.name : "big";
    var foods = goods.foods;
    $(".inpt-shu").each(function(){
        var obj = {};
        var self = $(this);
        if ( self.val() > 0) {
            obj.foodsid = self.attr("id");
            obj.foodsname = self.attr("name");
            obj.num =  self.val();
            foods.push(obj);
        };
    });
    goods.foods = foods ;
    if (sessionStorage) {
        // sessionStorage.setItem("goods",null);
    };
    $.ajax({
        url  : "<?php echo U('Goods/goodsAdd');?>",
        type : "post",
        data : goods,
        dataType : "json",
        success : function(data){
            if (data == "error") {
                alert("购买失败！请重新购买！");
                window.location.href = '<?php echo U("Index/saselect");?>';
            }else{
                window.location.href = '<?php echo U("Goods/gley");?>';
            }
        }
    });
}
$(function(){
    //初始化数据
    var jc = 4;
    var zc = 12;
    switch (goodtype) {
        case 'small':
            zc = 9;
            break;
        case 'free':
            zc = 4;
            jc = 1;
            break;
    }


    if (sessionStorage.getItem("cut") == "true") {
        $("#IsShredLine").addClass("on");
    };

    //是否切碎切换
    $(".cut-ico").on('tap',function(){
        var self = $(this);
        if (self.hasClass("on")) {
            self.removeClass("on");
            sessionStorage.setItem("cut","false");
        }else{
            self.addClass("on");
            sessionStorage.setItem("cut","true");
        }
    });

    $("#SauceList li,.reset,.reload").on('tap',function(){
        var self = $(this);
        self.addClass("on").siblings().removeClass("on");
    });

    $(".reset").on("tap",function(){
        if(confirm("确定重置数据")){
            $("input.inpt-shu").val(1);
        }
    });

    $(".reload").on("tap",function(){
       
        $("#RenewLine").show();
        $("#CommentShowLine").hide();
        $("#BaseList").html("");
        $("#MainList").html("");
        resetcp();
    });

    function updem(){
        var self = $(this);
        var input =  self.siblings("input");
        var baseormain = self.parents("ul").attr("id");
        var totalnum = ((baseormain=="BaseList") ? jc : zc);
        var BaseTotalCountLine = $("#"+((baseormain=="BaseList") ? "BaseTotalCountLine" : "MainTotalCountLine"));
        var total = BaseTotalCountLine.html();
        var num = input.val();
        if ( self.hasClass("car-add-l") ) {
            total--;
            if (num > 0) {
                input.val(--num);
                BaseTotalCountLine.html(total);
            };
        };
        if ( self.hasClass("car-add-r") ) {
            if (total < totalnum ) {
                input.val(++num);
                BaseTotalCountLine.html(++total);
            }
        };
    }


    function resetcp () {
        //获取基菜和主菜
        $.ajax({
            url:"<?php echo U('Index/diycp');?>",
            type:"post",
            data:{"goodtype" : (goodtype ? goodtype : "big" )},
            dataType:"json",
            success:function(data){
                var datajson = JSON.parse(data);
                var jclist = datajson.jclist;
                var zclist = datajson.zclist;

                var BaseList = $("#BaseList");
                for(var index in jclist){
                    var obj = jclist[index];
                    BaseList.append('<li><table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="td-1"><img src="/salad/'+obj.fpic+'"></td><td class="td-2">'+obj.fname+'</td><td class="td-3 fl-clr"><em class="car-add-l"></em><input type="text" id="'+obj.fid+'" name="'+obj.fname+'" value="1" readonly="" class="inpt-shu"><em class="car-add-r"></em></td></tr></tbody></table></li>');
                }

                $("#BaseTotalCountLine").html(jclist.length);
                BaseList.find("td.td-3.fl-clr em").on('tap',updem);

                var MainList = $("#MainList");
                for(var index in zclist){
                    var obj = zclist[index];
                    MainList.append('<li><table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="td-1"><img src="/salad/'+obj.fpic+'"></td><td class="td-2">'+obj.fname+'</td><td class="td-3 fl-clr"><em class="car-add-l"></em><input type="text" id="'+obj.fid+'" name="'+obj.fname+'" value="1" readonly="" class="inpt-shu"><em class="car-add-r"></em></td></tr></tbody></table></li>');
                }

                MainList.find("td.td-3.fl-clr em").on('tap',updem);


                $("#MainTotalCountLine").html(zclist.length);
                $("#RenewLine").hide();
                $("#CommentShowLine").show();
            }
        })
    }
    resetcp();
});
</script>

</body></html>