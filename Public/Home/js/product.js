var P = P ||
{};

P.LIMIT = 10;
P.START = 0;
P.RCount = P.LIMIT;
var BaseBMax = 4, BaseSMax = 4, BaseLMax = 1, MainBMax = 12, MainSMax = 9, MainLMax = 4;



P.TitleJumpNoDId = function(){
    var i = function(){
        H5Storage.SLV('home_set_address', 1);
        $.trim(H5Storage.GLV('login_true_userid')) != '' && $.trim(H5Storage.GLV('login_true_userid')) != 'null' && $.trim(H5Storage.GLV('login_true_userid')) != 'undefined' ? H5Method.JUMPUrl('/df39.html') : (H5Storage.SLV('login_back_uri', '/df7.html'), H5Method.JUMPUrl('/df1.html'));
    }();
};

P.GetDefaultAddress = function(){
	var wxopenid = $.trim(H5Storage.GLV('login_user_openid')) || '', ua = navigator.userAgent.toLowerCase();
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'default_address_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "type": "1",
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                 var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
					cdid(result);
            }
        });
    };
	var cdid = function(data){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'user_login_info_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [], tjson = eval(json[0].D) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else {
					if(tjson[0].loginstatus.toLowerCase() != 'true'){
						H5Storage.SLV('login_back_uri', window.location.href.replace('http://' + window.location.host, ''));
						H5Method.JUMPUrl('/df1.html');	
					}
					if(tjson[0].districtid.length<32){
						P.TitleJumpNoDId();	
					}
					else{
                    	s(data);
					}
				}
            }
        });
    };
    var s = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        if (len > 0) {
            H5Storage.SLV('set_orders_address', 1);
            H5Storage.SLV('set_location_address', 1);
            H5Storage.SLV('default_orders_address', JSON.stringify(json[0].D));
        }
        else {
			GetUserLoginInfoForDF2('home');
        }
    };
    g();
};

P.GetProductInfoByOrderIdAndPid = function(){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'productinfo_get_by_orderidandpid';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "orderid": H5Method.GUV('orderid'),
            "pid": H5Method.GUV('pointid'),
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    r(result);
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, ijson = tjson[0].images || [], h = [];
        $('#title').html(tjson[0].title);
        $('#price').html(parseFloat(tjson[0].price).toFixed(2));
        $('#unit').html(H5Storage.GLV('df5_unit'));
        $('#images').attr('src', tjson[0].img);
    };
    g();
};

P.GetProductInfo = function(t){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'product_info_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "pointid": H5Method.GUV('pointid'),
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else {
                    H5Storage.SLV('product_info_get_time_' + H5Method.GUV('pointid'), new Date().format("yyyy-MM-dd hh:mm:ss"));
                    H5Storage.SLV('product_info_' + H5Method.GUV('pointid'), JSON.stringify(result));
                    t == 1 ? r1(result) : r(result);
                }
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        $.each(tjson, function(index, obj){
            var pid = obj.pid;
            h.push('<div class="spec-list spec-detail">');
            h.push('<div class="daily-outer">');
            h.push('<div class="daily-inner">');
            h.push('<div class="main_image">');
            h.push('<ul>');
            $.each(eval(obj.images), function(key, val){
                h.push('<li>');
                h.push('<a href="javascript:;">');
                h.push('<img src="' + val + '">');
                h.push('</a>');
                h.push('<div class="back-on">');
                h.push('<img src="/images/swiper-icon.png" width="20px">');
                h.push('</div>');
                h.push('</li>');
            });
            h.push('</ul>');
            h.push('</div>');
            h.push('</div>');
            if ($.trim(obj.tagimg) != '') {
                h.push('<div class="province color-1">');
                h.push('<img src="' + obj.tagimg + '">');
                h.push('</div>');
            }
            h.push('</div>');
            h.push('<div class="spec-name fl-clr">');
            h.push('<span>' + obj.title + '</span>');
            h.push('<i><small>￥</small><em>' + parseInt(obj.price) + '</em>/' + H5Storage.GLV('df5_unit') + '</i>');
            h.push('</div>');
            h.push('<div class="spec-inner fl-clr">');
            h.push('<ul class="spec-att fl-clr">');
            h.push('<li id="ProdudtLike1_' + obj.pid + '" class="att-1" onclick="SetProductG(\'' + obj.pid + '\');" >' + obj.gcount + '</li>');
            h.push('<li id="ProdudtLike0_' + obj.pid + '"  class="att-2" onclick="SetProductNG(\'' + obj.pid + '\');">' + obj.ngcount + '</li>');
            h.push('<li class="att-3" onclick="H5Method.JUMPUrl(\'\/df9-3.html?f=info&pointid=' + pid + '\')">' + obj.comment + '</li>');
            h.push('</ul>');
            if (obj.stockcount <= 0) {
                h.push('<div class="have-mark" onclick="DeliveryReminders(\'' + obj.pid + '\');">');
                h.push('<span>'+H5Storage.GLV('remind')+'</span>');
                h.push('</div>');
            }
            else {
                h.push('<div id="ProductCartOptionLine_' + obj.pid + '">');
                if (obj.cartcount > 0) {
                    h.push('<div class="spec-num">');
                    h.push('<div class="num-inner fl-clr">');
                    h.push('<i class="num-l" onclick="CartAmountUpdate(\'' + obj.pid + '\',\'l\',\'1\',\'0\');"></i>');
                    h.push('<input type="text" id="cart_amount_' + obj.pid + '" name="cart_amount_' + obj.pid + '" value="' + obj.cartcount + '" class="in-num" readonly>');
                    h.push('<i class="num-r" onclick="CartAmountUpdate(\'' + obj.pid + '\',\'r\',\'1\',\'0\');"></i>');
                    h.push('</div>');
                    h.push('</div>');
                }
                else {
                    h.push('<div class="have-now" onclick="JoinCartDo(\'' + obj.pid + '\',\'1\',\'1\',\'0\');">');
                    h.push('<span>'+H5Storage.GLV('panic_buying')+'</span>');
                    h.push('</div>');
                }
                h.push('</div>');
            }
            h.push('</div>');
            h.push('<div class="spec-detail-pic"><p class="spec-detail-wd">' + obj.content + '</p></div>');
            h.push('</div>');
        });
        $('#ProductInfo').html(h.join(''));
        GetProductLikeClassById(H5Method.GUV('pointid'));
        $dragBln = false;
        $('.main_image').touchSlider({
            flexible: true,
            speed: 200
        });
        $(".main_image").bind("touchstart", function(){
            $dragBln = false;
        });
        
        $(".main_image").bind("touchend", function(){
            $dragBln = true;
        });
        
        $(".main_image").bind("mousedown", function(){
            $dragBln = false;
        });
        
        $(".main_image").bind("dragstart", function(){
            $dragBln = true;
        });
        
        $(".main_image a").click(function(){
            if ($dragBln) {
                return false;
            }
        });
    };
    var r1 = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, ijson = tjson[0].images || [], h = [];
        $('#title').html(tjson[0].title);
        $('#price').html(parseFloat(tjson[0].price).toFixed(2));
        $('#unit').html(H5Storage.GLV('df5_unit'));
        $('#images').attr('src', ijson[0]);
        P.GetProductCommentList();
    };
    g();
};

P.GetProductCommentList = function(){
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'product_comment_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "pid": H5Method.GUV('pointid'),
            "limit": P.LIMIT,
            "start": P.START,
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    P.RenderProductCommentList(result);
            }
        });
    }();
};

P.GetProductCommentTip = function(){
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'prodcut_comment_tip_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    r(result);
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, ijson = tjson[0].images || [], h = [];
        $('#TipContent').html(tjson[0].content);
        try {
            $('#content').attr('placeholder', tjson[0].content);
        } 
        catch (e) {
        }
    };
    i();
};



P.RenderProductCommentList = function(data){
    var r = function(){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, cjson = eval(tjson[0].comment) || [], clen = cjson.length || 0, h = [], Total = 0;
        $('#totalsart').addClass('star-' + parseInt(tjson[0].star));
        if ((clen <= 0 && H5Storage.GLV('comment_new_page') == 1)) {
            $('#myNoDataShowArea').show();
            $('#myCommentList,#loading,#nomoreresults').hide();
        }
        else {
            $.each(eval(tjson[0].comment), function(index, obj){
                Total++;
                h.push('<dl>');
               !WW.CheckMobile($.trim(obj.mobile)) ? h.push('<dt><i>' +obj.mobile + '</i>'): h.push('<dt><i>' + obj.mobile.substring(0, 3) + 'xxxx' + obj.mobile.substring(7, 11) + '</i>');
                h.push('<em class="star-icon stars-' + parseInt(obj.score) + '"></em></dt>');
                h.push('<dd><p style="width:100%;word-break:break-all;">' + obj.content + '</p></dd>');
                h.push('<dd class="timer">' + obj.create_date + '</dd>');
                h.push('</dl>');
                var ijson = eval(obj.img) || [], ilen = ijson.length || 0;
                if (ilen > 0) {
                    h.push('<ul class="fl-clr">');
                    $.each(ijson, function(key, val){
                        h.push('<li><img src="' + val + '"></li>');
                    });
                    h.push('</ul>');
                }
                h.push('</div>');
            });
            
            if (P.START == 0) {
                $("#myCommentList").html('');
                $("#myCommentList").html(h.join(''));
            }
            else {
                $("#myCommentList").append(h.join('')).trigger("create");
            }
            H5Storage.SLV('comment_new_page', 2);
            P.RCount = Total;
            $('#myNoDataShowArea').hide();
            $('#myCommentList').show();
            Total > 0 ? $('#myCommentList').attr('scrollPagination', 'enabled') : null;
        }
    }();
};

P.SetProductCommentTypeScore = function(t, s){
    var i = function(){
        $('#myScoreSpan' + t + ' em').removeClass('on');
        for (var f = 0; f < s; f++) {
            $('#myScoreSpan' + t + ' em').eq(f).attr('class', 'on');
        }
        $('#score' + t).val(s);
    }();
};

P.DelUpile = function(t){
    var i = function(){
        $('#images' + t).val('');
        $("#list" + t + "").html('<img src="/images/g25-file.png" onClick="OM.UpfileShow(\'' + t + '\');">');
        $("#DelFile" + t).hide();
    }();
};

P.UpfileShow = function(t){
    var i = function(){
        $('#images' + t).click();
    }();
};

P.ProductCommentDo = function(){
    var c = function(){
        if ($.trim($('#content').val()) == '') {
            alert(H5Storage.GLV('df9_4_none_content'), "$('#content').focus();");
            return false;
        }
        if ($.trim($('#content').val()).length < 6) {
            alert(H5Storage.GLV('df9_4_length'), "$('#content').focus();");
            return false;
        }
        s();
    };
    var s = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'product_comment_add';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "images1": $('#images1').val(),
            "images2": $('#images2').val(),
            "images3": $('#images3').val(),
            "orderid": $('#orderid').val(),
            "pid": $('#pid').val(),
            "content": $('#content').val(),
            "score1": $('#score1').val(),
            "score2": $('#score2').val(),
            "score3": $('#score3').val(),
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        /*$.jsonp({
         type: "POST",
         url: _severHost + "?action=" + _action + "&jscallback=?",
         dataType: 'json',
         crossDomain: true,
         data: UData,
         success: function (jsonResult) {
         alert(jsonResult);
         },
         error: function (jqXHR, textStatus) {
         //handle error
         }
         });
         */
        $.jsonp({
            type: 'post',
            async: !1,
            crossDomain: true,
            fileElementId: ['images1', 'images2', 'images3'],
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    f(result);
            }
        });
    };
    var f = function(data){
        WW.HWD();
        var json = eval(data) || [];
        if (json[0].C == 0) {
            H5Method.JUMPUrl(H5Storage.GLV('comment_from_page'));
        }
        else {
            alert(json[0].M);
        }
    };
    c();
};

P.SwithProductClass = function(classid){
    var i = function(){
        $('.mainherf').removeClass('on');
        $('#MainHref_' + classid).addClass('on');
        $('#classid').val(classid);
        P.START = 0;
        P.GetProductListByClassId(classid);
    }();
};


P.GetProductClassList = function(){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'good_class_list_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else {
                    H5Storage.SLV('product_class_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
                    H5Storage.SLV('product_class_list', JSON.stringify(result));
                    r(result);
                }
            }
        });
    };
    var r = function(data){
    
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        $.each(tjson, function(index, obj){
            index == 0 ? firstclassid = obj.classid : null;
            (obj.classtitle.length >= 4) ? menuclass = 'menu-2' : menuclass = 'menu-1';
            h.push('<a href="javascript:;"  onclick="P.SwithProductClass(\'' + obj.classid + '\')" class="mainherf ' + menuclass + '" id="MainHref_' + obj.classid + '">');
            h.push('<img src="/images/nav-back.png">');
            h.push('<span>' + obj.classtitle + '</span>');
            h.push('</a>');
        });
        $('#ClassListLine').html(h.join(''));
        var classid = H5Method.GUV('pointid') || firstclassid;
        P.SwithProductClass(classid);
    };
    g();
};

P.JumpPackageGo = function(classid, pid){
    var i = function(){
        H5Method.JUMPUrl('/df7-3.html?f=productlist&classid=' + classid + '&cartcount=' + $('#cart_amount_' + pid).val() + '&pointid=' + pid);
    }();
};

P.GetProductListByClassId = function(classid){

    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'good_list_get_by_class';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "classid": classid,
            "limit": 100,
            "start": P.START,
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    r(result);
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = eval(json[0].D) || [], len = tjson.length || 0, h = [], Total = 0;
        if (len <= 0) {
            $('#myNoDataShowArea').show();
            $('#ProductList').hide();
        }
        else {
            $.each(tjson, function(index, obj){
                Total++;
                var cartcount = obj.cartcount || 0;
                h.push('<div class="pro-detail">');
                h.push('<dl class="pro-des">');
                h.push('<dt>');
                h.push('<img src="' + obj.img + '" >');
                h.push('</dt>');
                obj.type == 4 ? h.push('<dd onclick="P.JumpPackageGo(\'' + classid + '\',\'' + obj.pid + '\');">') : h.push('<dd onclick="H5Method.JUMPUrl(\'\/df9-3.html?f=productlist&classid=' + classid + '&pointid=' + obj.pid + '\')">');
                //obj.type==4?h.push('<dd onclick="H5Method.JUMPUrl(\'\/df7-3.html?f=productlist&pointid=' + obj.pid + '\');">'):h.push('<dd>');
                h.push('<h3>' + obj.title + '</h3>');
                obj.type == 4 ? h.push('<ul onclick="P.JumpPackageGo(\'' + classid + '\',\'' + obj.pid + '\');">') : h.push('<ul onclick="H5Method.JUMPUrl(\'\/df9-3.html?f=productlist&classid=' + classid + '&pointid=' + obj.pid + '\')">');
                //obj.type==4?h.push('<ul onclick="H5Method.JUMPUrl(\'\/df7-3.html?f=productlist&pointid=' + obj.pid + '\');">'):h.push('<ul>');
                if (obj.type == 4) {
                    var sjson = eval(obj.json) || [];
                    $.each(sjson, function(si, sobj){
                        h.push('<li class="fl-clr">');
                        h.push('<span>' + sobj.title + '：</span>');
                        h.push('<em>' + sobj.content + '</em>');
                        h.push('</li>');
                    });
                }
                else 
                    if (obj.type == 1) {
                        h.push('<li class="fl-clr">');
                        h.push('<em>' + obj.nomal_des + '</em>');
                        h.push('</li>');
                    }
                obj.type == 4 ? carttype = 1 : obj.type == 1 ? carttype = 1 : carttype = 1;
                h.push('</ul>');
                h.push('</dd>');
                h.push('<dd class="fl-clr">');
               _lang=='CN'? h.push('<span class="td-2"><i>￥' + parseFloat(obj.price).toFixed(2) + '</i>/' + H5Storage.GLV('df5_unit') + '</span>'): h.push('<span class="td-2"><i>￥' + parseFloat(obj.price).toFixed(2) + '</i></span>');
                h.push('<div class="td-3 fl-clr">');
                h.push('<em class="car-add-l" onclick="CartAmountUpdate(\'' + obj.pid + '\',\'l\',\'' + carttype + '\',\'0\');"></em>');
                
                h.push('<input type="text" id="cart_amount_' + obj.pid + '" name="cart_amount_' + obj.pid + '" value="' + cartcount + '" readonly="" class="inpt-shu">');
                h.push('<em class="car-add-r" onclick="CartAmountUpdate(\'' + obj.pid + '\',\'r\',\'' + carttype + '\',\'0\');"></em>');
                h.push('</div>');
                h.push('</dd>');
                h.push('</dl>');
                h.push('<div class="pro-com">');
                h.push('<table>');
                h.push('<tr>');
                h.push('<td align="left" onclick="SetProductG(\'' + obj.pid + '\');"><span class="td-l" id="ProdudtLike1_' + obj.pid + '">' + obj.gcount + '</span></td>');
                h.push('<td align="center" onclick="SetProductNG(\'' + obj.pid + '\');"><span class="td-m" id="ProdudtLike0_' + obj.pid + '">' + obj.ngcount + '</span></td>');
                h.push('<td align="right" onclick="H5Method.JUMPUrl(\'\/df9-3.html?f=productlist&classid=' + classid + '&pointid=' + obj.pid + '\')"><span class="td-r">' + obj.comment + '</span></td>');
                //h.push('<td align="right"><span class="td-r">' + obj.comment + '</span></td>');h.push('</tr>');
                h.push('</table>');
                h.push('</div>');
                h.push('</div>');
            });
            $('#myNoDataShowArea').hide();
            $('#ProductList').show();
            if (P.START == 0) {
                $("#ProductList").html('');
                $('#ProductList').html(h.join(''));
            }
            else {
                $("#ProductList").append(h.join('')).trigger("create");
            }
            H5Storage.SLV('product_new_page', 2);
            P.RCount = Total;
        }
        //GetProductLikeClass();
    };
    g();
};


P.SetBaseVegetableAmount = function(pid, t){
    var i = function(){
        t == 'r' ? _total = parseInt(P.GetBaseVegetableTotalCount()) + 1 : t == 'l' ? _total = parseInt(P.GetBaseVegetableTotalCount()) - 1 : H5Storage.GLV('product_salad_base_kind') == 1 ? _total = BaseBMax + 1 : H5Storage.GLV('product_salad_base_kind') == 2 ? _total = BaseSMax + 1 : H5Storage.GLV('product_salad_base_kind') == 3 ? _total = BaseLMax + 1 : null;
        H5Storage.GLV('product_salad_base_kind') == 1 && parseInt(_total) > parseInt(BaseBMax) ? (isMax = 1, txt = H5Storage.GLV('tip_basic').replace('%d',parseInt(BaseBMax))) : H5Storage.GLV('product_salad_base_kind') == 2 && parseInt(_total) > parseInt(BaseSMax) ? (isMax = 1, txt = H5Storage.GLV('tip_basic').replace('%d',parseInt(BaseSMax))) : H5Storage.GLV('product_salad_base_kind') == 3 && parseInt(_total) > parseInt(BaseLMax) ? (isMax = 1, txt = H5Storage.GLV('tip_basic').replace('%d',parseInt(BaseLMax))) : isMax = 0;
        if (isMax == 0) {
            t == 'r' ? $('#base_amount_' + pid).val(parseInt($('#base_amount_' + pid).val(), 10) + 1) : t == 'l' ? $('#base_amount_' + pid).val(parseInt($('#base_amount_' + pid).val(), 10) - 1) : null;
			parseInt($('#base_amount_' + pid).val(), 10)>3 ? ($('#base_amount_' + pid).val(3)) : null;
            parseInt($('#base_amount_' + pid).val(), 10) <= 0 ? ($('#base_amount_' + pid).val(0)) : null;
            s();
        }
        else 
            if (isMax == 1) {
                alert(txt);
            }
    };
    var s = function(){
        H5Storage.SLV('product_to_custom', 1);
        $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('product_base_vegetable_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, njson = [], status = 1;
        $.each(json, function(index, obj){
            if (obj.pid == pid) {
                status = 0;
                njson.push('{"pid":"' + obj.pid + '","createdate":"' + WW.GetNowDateTime() + '","amount":"' + $('#base_amount_' + pid).val() + '"}');
            }
            else {
                njson.push('{"pid":"' + obj.pid + '","createdate":"' + obj.createdate + '","amount":"' + obj.amount + '"}');
            }
        });
        if (status == 1) {
            njson.push('{"pid":"' + pid + '","createdate":"' + WW.GetNowDateTime() + '","amount":"' + $('#base_amount_' + pid).val() + '"}');
        }
        H5Storage.SLV('product_base_vegetable_local_data', njson);
        P.RenderBaseVegetableTotalCount();
    };
    i();
};

P.SetMainVegetableAmount = function(pid, t){
    var i = function(){
        t == 'r' ? _total = parseInt(P.GetMainVegetableTotalCount()) + 1 : t == 'l' ? _total = parseInt(P.GetMainVegetableTotalCount()) - 1 : H5Storage.GLV('product_salad_main_kind') == 1 ? _total = MainBMax + 1 : H5Storage.GLV('product_salad_main_kind') == 2 ? _total = MainSMax + 1 : H5Storage.GLV('product_salad_main_kind') == 3 ? _total = MainLMax + 1 : null;
        H5Storage.GLV('product_salad_main_kind') == 1 && parseInt(_total) > parseInt(MainBMax) ? (isMax = 1, txt =H5Storage.GLV('tip_large').replace('%d',MainBMax)) : H5Storage.GLV('product_salad_main_kind') == 2 && parseInt(_total) > parseInt(MainSMax) ? (isMax = 1, txt = H5Storage.GLV('tip_small').replace('%d',MainSMax)) : H5Storage.GLV('product_salad_main_kind') == 3 && parseInt(_total) > parseInt(MainLMax) ? (isMax = 1, txt =  H5Storage.GLV('tip_optional').replace('%d',MainLMax)) : isMax = 0;
        if (isMax == 0) {
            t == 'r' ? $('#main_amount_' + pid).val(parseInt($('#main_amount_' + pid).val(), 10) + 1) : t == 'l' ? $('#main_amount_' + pid).val(parseInt($('#main_amount_' + pid).val(), 10) - 1) : null;
			parseInt($('#main_amount_' + pid).val(), 10)>3 ? ($('#main_amount_' + pid).val(3)) : null;
            parseInt($('#main_amount_' + pid).val(), 10) <= 0 ? ($('#main_amount_' + pid).val(0)) : null;
            s();
        }
        else 
            if (isMax == 1) {
                alert(txt);
            }
    };
    var s = function(){
        H5Storage.SLV('product_to_custom', 1);
        $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('product_main_vegetable_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, njson = [], status = 1;
        $.each(json, function(index, obj){
            if (obj.pid == pid) {
                status = 0;
                njson.push('{"pid":"' + obj.pid + '","createdate":"' + WW.GetNowDateTime() + '","amount":"' + $('#main_amount_' + pid).val() + '"}');
            }
            else {
                njson.push('{"pid":"' + obj.pid + '","createdate":"' + obj.createdate + '","amount":"' + obj.amount + '"}');
            }
        });
        if (status == 1) {
            njson.push('{"pid":"' + pid + '","createdate":"' + WW.GetNowDateTime() + '","amount":"' + $('#main_amount_' + pid).val() + '"}');
        }
        H5Storage.SLV('product_main_vegetable_local_data', njson);
        P.RenderMainVegetableTotalCount();
    };
    i();
};

P.SetSauceDo = function(pid){
    var i = function(){
        H5Storage.SLV('product_to_custom', 1);
        $.trim(H5Storage.GLV('product_sauce_local_data')) != '' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('product_sauce_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, njson = [], status = 1;
        njson.push('{"pid":"' + pid + '","createdate":"' + WW.GetNowDateTime() + '","amount":"1"}');
        H5Storage.SLV('product_sauce_local_data', njson);
        P.RenderSauceAmount();
    }();
};


P.RenderSauceAmount = function(){
    var i = function(){
        $.trim(H5Storage.GLV('product_sauce_local_data')) != '' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('product_sauce_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, njson = [];
        $('#SauceList li').removeClass('on');
        $.each(json, function(index, obj){
            $('#SauceLine_' + obj.pid).addClass('on');
        });
        P.RenderSauceTotalCount();
    }();
};


P.ProductToCustomConfirm = function(){
    if (H5Storage.GLV('product_to_custom') == 1) {
        if (confirm(H5Storage.GLV('tip_recovery'), "", "ClearResetProductSaladStorage();P.ProductToCustom();", H5Storage.GLV('no_recovery'), H5Storage.GLV('recovery'))) {
        }
    }
    else {
        ClearResetProductSaladStorage();
        P.ProductToCustom();
    }
};

P.ProductToCustom = function(){
    var gb = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'base_vegetable_list_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    rb(result);
            }
        });
    };
    var rb = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], bh = [], mh = [], sh = [], bjson = [], mjson = [], sjson = [];
        $.each(tjson, function(index, obj){
            var amount = 0;
            bh.push('<li id="BaseVegetableLine_' + obj.pid + '">');
            bh.push('<table width="100%" cellpadding="0" cellspacing="0" border="0">');
            bh.push('<tr>');
            bh.push('<td class="td-1"><img src="' + obj.img + '"></td>');
            bh.push('<td class="td-2">' + obj.title + '</td>');
            bh.push('<td class="td-3 fl-clr">');
            bh.push('<em class="car-add-l" onclick="P.SetBaseVegetableAmount(\'' + obj.pid + '\',\'l\');"></em>');
            bh.push('<input type="text" id="base_amount_' + obj.pid + '" name="base_amount_' + obj.pid + '" value="' + amount + '" readonly class="inpt-shu">');
            bh.push('<em class="car-add-r" onclick="P.SetBaseVegetableAmount(\'' + obj.pid + '\',\'r\');"></em>');
            bh.push('</td>');
            bh.push('</tr>');
            bh.push('</table>');
            bh.push('</li>');
        });
        $('#BaseList').html(bh.join(''));
        gm();
    };
    var gm = function(classid){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'main_vegetable_list_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    rm(result);
            }
        });
    };
    var rm = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], bh = [], mh = [], sh = [], bjson = [], mjson = [], sjson = [];
        $.each(tjson, function(index, obj){
            var amount = 0;
            mh.push('<li id="MainVegetableLine_' + obj.pid + '">');
            mh.push('<table width="100%" cellpadding="0" cellspacing="0" border="0">');
            mh.push('<tr>');
            mh.push('<td class="td-1"><img src="' + obj.img + '"></td>');
            mh.push('<td class="td-2">' + obj.title + '</td>');
            mh.push('<td class="td-3 fl-clr">');
            mh.push('<em class="car-add-l" onclick="P.SetMainVegetableAmount(\'' + obj.pid + '\',\'l\');"></em>');
            mh.push('<input type="text" id="main_amount_' + obj.pid + '" name="main_amount_' + obj.pid + '" value="' + amount + '" readonly class="inpt-shu">');
            mh.push('<em class="car-add-r" onclick="P.SetMainVegetableAmount(\'' + obj.pid + '\',\'r\');"></em>');
            mh.push('</td>');
            mh.push('</tr>');
            mh.push('</table>');
            mh.push('</li>');
        });
        $('#MainList').html(mh.join(''));
        gs();
    };
    var gs = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'sauce_list_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    rs(result);
            }
        });
    };
    var rs = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], bh = [], mh = [], sh = [], bjson = [], mjson = [], sjson = [];
        $.each(tjson, function(index, obj){
            var amount = 0;
            sh.push('<li id="SauceLine_' + obj.pid + '" onclick="P.SetSauceDo(\'' + obj.pid + '\');">');
            sh.push('<table width="100%" cellpadding="0" cellspacing="0" border="0">');
            sh.push('<tr>');
            sh.push('<td class="td-1"><img src="' + obj.img + '"></td>');
            sh.push('<td class="td-2">' + obj.title + '</td>');
            sh.push('<td class="td-3"></td>');
            sh.push('</tr>');
            sh.push('</table>');
            sh.push('</li>');
        });
        $('#SauceList').html(sh.join(''));
        g();
    };
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'sala_detail_get_by_productid';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "pid": H5Method.GUV('pointid'),
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    r(result);
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], bh = [], mh = [], sh = [], bjson = [], mjson = [], sjson = [];
        $.each(tjson, function(index, obj){
            if (obj.type == 1) {
                var amount = obj.count || 0;
                $('#base_amount_' + obj.pid).val(amount);
                bjson.push('{"pid":"' + obj.pid + '","createdate":"' + WW.GetNowDateTime() + '","amount":"' + obj.count + '"}');
            }
            else 
                if (obj.type == 2) {
                    var amount = obj.count || 0;
                    $('#main_amount_' + obj.pid).val(amount);
                    mjson.push('{"pid":"' + obj.pid + '","createdate":"' + WW.GetNowDateTime() + '","amount":"' + obj.count + '"}');
                }
                else 
                    if (obj.type == 3) {
                    
                        obj.count > 0 ? sjson.push('{"pid":"' + obj.pid + '","createdate":"' + WW.GetNowDateTime() + '","amount":"1"}') : null;
                    }
        });
        H5Storage.SLV('product_sauce_local_data', sjson);
        H5Storage.SLV('product_main_vegetable_local_data', mjson);
        H5Storage.SLV('product_base_vegetable_local_data', bjson);
        H5Storage.SLV('product_salad_base_kind', 1);
        H5Storage.SLV('product_salad_base_isshred', 1);
        H5Storage.SLV('product_salad_main_kind', 1);
        H5Storage.SLV('product_salad_main_isshred', 1);
        H5Storage.SLV('product_salad_sauce_kind', 1);
        P.RenderBaseVegetableTotalCount();
        P.RenderMainVegetableTotalCount();
        P.RenderSauceAmount();
        WW.HWD();
    };
    gb();
};

P.GetBaseVegetableTotalCount = function(){
    $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('product_base_vegetable_local_data') + ']' : data = '';
    var json = eval(data) || [], len = json.length || 0, total = 0;
    $.each(json, function(index, obj){
        total = parseInt(total) + parseInt(obj.amount);
    });
    return total;
};

P.RenderBaseVegetableTotalCount = function(){
    var r = function(){
        $('#BaseTotalCountLine').html(P.GetBaseVegetableTotalCount());
    }();
};

P.GetMainVegetableTotalCount = function(){
    $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('product_main_vegetable_local_data') + ']' : data = '';
    var json = eval(data) || [], len = json.length || 0, total = 0;
    $.each(json, function(index, obj){
        total = parseInt(total) + parseInt(obj.amount);
    });
    return total;
};

P.RenderMainVegetableTotalCount = function(){
    var r = function(){
        $('#MainTotalCountLine').html(P.GetMainVegetableTotalCount());
    }();
};

P.RenderSauceTotalCount = function(){
    var r = function(){
        $.trim(H5Storage.GLV('product_sauce_local_data')) != '' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('product_sauce_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, total = 0;
        $.each(json, function(index, obj){
            total = parseInt(total) + parseInt(obj.amount);
        });
        $('#SauceTotalCountLine').html(total);
    }();
};

P.SubmitSaladCustomAccept = function(){
    var pid = [], ptype = [], pcount = [], pkind = [], shred = [];
    var i = function(){
        $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != 'undefined' ? bdata = '[' + H5Storage.GLV('product_base_vegetable_local_data') + ']' : bdata = '';
        $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != 'undefined' ? mdata = '[' + H5Storage.GLV('product_main_vegetable_local_data') + ']' : mdata = '';
        $.trim(H5Storage.GLV('product_sauce_local_data')) != '' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'undefined' ? sdata = '[' + H5Storage.GLV('product_sauce_local_data') + ']' : sdata = '';
        var bjson = eval(bdata) || [], mjson = eval(mdata) || [], sjson = eval(sdata) || [], blen = bjson.length || 0, mlen = mjson.length || 0, slen = sjson.length || 0;
        $.each(bjson, function(index, obj){
            if (obj.amount > 0) {
                pid.push(obj.pid);
                pcount.push(obj.amount);
                ptype.push(1);
            }
        });
        //pkind.push(H5Storage.GLV('product_salad_base_kind'));
        //shred.push(H5Storage.GLV('product_salad_base_isshred'));
        $.each(mjson, function(index, obj){
            if (obj.amount > 0) {
                pid.push(obj.pid);
                pcount.push(obj.amount);
                ptype.push(2);
            }
        });
        pkind.push(H5Storage.GLV('product_salad_main_kind'));
        shred.push(H5Storage.GLV('product_salad_main_isshred') || 0);
        $.each(sjson, function(index, obj){
            if (obj.amount > 0) {
                pid.push(obj.pid);
                pcount.push(obj.amount);
                ptype.push(3);
            }
        });
        //pkind.push(H5Storage.GLV('product_salad_sauce_kind'));
        
        var _basetotal = parseInt(P.GetBaseVegetableTotalCount());
        var _maintotal = parseInt(P.GetMainVegetableTotalCount());
        H5Storage.GLV('product_salad_base_kind') == 1 ? (mainmaxtotal = MainBMax, basemaxtotal = BaseBMax) : H5Storage.GLV('product_salad_base_kind') == 2 ? (mainmaxtotal = MainSMax, basemaxtotal = BaseSMax) : H5Storage.GLV('product_salad_base_kind') == 3 ? (mainmaxtotal = MainLMax, basemaxtotal = BaseLMax) : (mainmaxtotal = MainBMax, basemaxtotal = BaseBMax);
        if (_basetotal > 0 && _maintotal > 0 && slen > 0) {
            var _btotal = basemaxtotal - _basetotal, _mtotal = mainmaxtotal - _maintotal;
            if (_btotal <= 0 && _mtotal <= 0) {
                P.SubmitSaladCustomAcceptDo();
            }
            else 
                if (_btotal > 0 && _mtotal > 0) {
					//您还可以再选%1$s份基菜,是否要继续去选菜df8_2_tip
					//您还可以再选%1$s份基菜,%2$s份主菜,是否要继续去选菜df8_2_tip3
					//您还可以再选%1$s份主菜,是否要继续去选菜df8_2_tip4
					//"您还可以再选" + _btotal + "份基础菜，" + _mtotal + "份主菜，是否要继续去选菜？"
                    confirm(H5Storage.GLV('df8_2_tip3').replace('%1$d',_btotal).replace('%2$d',_mtotal), "$('html,body').animate({scrollTop:$('#base').offset().top},1000)", "P.SubmitSaladCustomAcceptDo();", H5Storage.GLV('df8_2_continue'), H5Storage.GLV('df8_2_no_choose'))
                }
                else 
                    if (_btotal > 0) {
                        confirm(H5Storage.GLV('df8_2_tip').replace('%d',_btotal), "$('html,body').animate({scrollTop:$('#base').offset().top},1000)", "P.SubmitSaladCustomAcceptDo();", H5Storage.GLV('df8_2_continue'), H5Storage.GLV('df8_2_no_choose'))
                    }
                    else 
                        if (_mtotal > 0) {
                            confirm(H5Storage.GLV('df8_2_tip4').replace('%d',_mtotal), "$('html,body').animate({scrollTop:$('#main').offset().top},1000)", "P.SubmitSaladCustomAcceptDo();", H5Storage.GLV('df8_2_continue'), H5Storage.GLV('df8_2_no_choose'))
                        }
        }
        else 
            if (_basetotal <= 0) {
                alert(H5Storage.GLV('no_basic'), "$('html,body').animate({scrollTop:$('#base').offset().top},1000)", H5Storage.GLV('df_enter'));
            }
            else 
                if (_maintotal <= 0) {
                    alert(H5Storage.GLV('no_main'), "$('html,body').animate({scrollTop:$('#main').offset().top},1000)", H5Storage.GLV('df_enter'));
                }
                else 
                    if (slen <= 0) {
                        alert(H5Storage.GLV('no_sauce'), "$('html,body').animate({scrollTop:$('#sauce').offset().top},1000)", H5Storage.GLV('df_enter'));
                    }
    };
    var j = function(){
        var amount = parseInt($('#cart_count').val()) + 1
        JoinCartDo(H5Method.GUV('pointid'), amount, '1', '73');
    };
    H5Storage.GLV('product_to_custom') == 1 ? i() : j();
};

P.SubmitSaladCustomAcceptDo = function(){
    var pid = [], ptype = [], pcount = [], pkind = [], shred = [];
    
    var s = function(){
        WW.SWD(H5Storage.GLV('loading'));
        $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('product_base_vegetable_local_data')) != 'undefined' ? bdata = '[' + H5Storage.GLV('product_base_vegetable_local_data') + ']' : bdata = '';
        $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('product_main_vegetable_local_data')) != 'undefined' ? mdata = '[' + H5Storage.GLV('product_main_vegetable_local_data') + ']' : mdata = '';
        $.trim(H5Storage.GLV('product_sauce_local_data')) != '' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('product_sauce_local_data')) != 'undefined' ? sdata = '[' + H5Storage.GLV('product_sauce_local_data') + ']' : sdata = '';
        var bjson = eval(bdata) || [], mjson = eval(mdata) || [], sjson = eval(sdata) || [], blen = bjson.length || 0, mlen = mjson.length || 0, slen = sjson.length || 0;
        $.each(bjson, function(index, obj){
            if (obj.amount > 0) {
                pid.push(obj.pid);
                pcount.push(obj.amount);
                ptype.push(1);
            }
        });
        //pkind.push(H5Storage.GLV('product_salad_base_kind'));
        //shred.push(H5Storage.GLV('product_salad_base_isshred'));
        $.each(mjson, function(index, obj){
            if (obj.amount > 0) {
                pid.push(obj.pid);
                pcount.push(obj.amount);
                ptype.push(2);
            }
        });
        pkind.push(H5Storage.GLV('product_salad_main_kind'));
        shred.push(H5Storage.GLV('product_salad_main_isshred') || 0);
        $.each(sjson, function(index, obj){
            if (obj.amount > 0) {
                pid.push(obj.pid);
                pcount.push(obj.amount);
                ptype.push(3);
            }
        });
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'salad_custom_accept';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "pid": pid.join(','),
            "ptype": ptype.join(','),
            "pcount": pcount.join(','),
            "pkind": pkind.join(','),
            "shred": shred.join(','),
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "timestamp": _timestamp,
            "format": _format,
            "appid": _appid,
            "terminal": _terminal,
            "v": _version,
            "sign": $.md5(signstr),
            "appkey": _appkey,
            "lang": _lang,
            "sign_method": _sign_method
        };
        
        $.jsonp({
            type: 'post',
            async: !1,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost + "?action=" + _action + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    f(result);
            }
        });
    };
    var f = function(data){
        WW.HWD();
        var json = eval(data) || [];
        if (json[0].C == 0) {
            ClearProductSaladStorage();
            history.pushState('', '', '/df4.html');
            H5Method.JUMPUrl('/df17.html');
        }
        else {
            alert(json[0].M);
        }
    };
    s();
};
