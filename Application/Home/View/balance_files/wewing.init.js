
var H5Storage = new H5Storage();
var H5Method = new H5Method();
var IsGather = new IsGather();
var WW = new WW();
var DateTimeFormat = new DateTimeFormat();
var UserDevicesInfo = new UserDevicesInfo();

if(_lang.toLowerCase()=='cn'){
$("<link>").attr({ rel: "stylesheet", type: "text/css", href: "/css/df2015.css"}).appendTo("head");
}
else{
$("<link>").attr({ rel: "stylesheet", type: "text/css", href: "/css/df2015-en.css"}).appendTo("head");		
}
	
var AjaxFailJump = function(error){
	var i=function(){
		//H5S.SLV('token_backurl', location.href.split('#')[0]);
		//alert("接口服务器没有响应或网络连接异常，请刷新重试");
		//confirm("接口服务器没有响应或网络连接异常，请刷新重试", "", " H5M.JUrl('/renewToken.html');", "", "", "1");
		
		var $UData={
			"token":H5Storage.GLV('token_value'),
			"message": error,
			"url": location.href.split('#')[0],
			"line": '0',
			"type": 'ajax'
		};
		$.jsonp({
			type: 'get',
			async: !1,
			dataType: "jsonp",
			jsonp: "jsoncallback",
			url: "https://h5error.21move.net/in.aspx",
			data: $UData,
			success: function(){
				
			}
		});
	}();
};
var GetUserToken = function(){
    var g = function(){
        localStorage.setItem('device_id_value', $.md5(WW.Guid()));
        var _tokenaction = 'token_authorize', _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss");
        var signstr = _tokenaction + _timestamp + _appid + _appkey;
        var UData = {
            "did": localStorage.getItem('device_id_value'),
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
            url: _severHost + "?action=" + _tokenaction + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [], tjson = eval(json[0].D) || [];
                if (json[0].C == 0) {
                    localStorage.setItem('token_expire_time', tjson[0].expire);
                    localStorage.setItem('token_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
                    localStorage.setItem('token_value', tjson[0].token);
                }
            }
        });
        
    };
    var j = function(){
        localStorage.setItem('token_backurl', window.location);
        document.location = '/getToken.html';
    };
    $.trim(localStorage.getItem('token_get_time')) != '' && $.trim(localStorage.getItem('token_get_time')) != 'null' && $.trim(localStorage.getItem('token_get_time')) != 'undefined' ? WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), localStorage.getItem('token_get_time'), 'day') >= 1 ? j() : null : j();
};



var ResetToken = function(){
    var g = function(){
        localStorage.setItem('device_id_value', $.md5(navigator.userAgent.toLowerCase()));
        var _tokenaction = 'token_authorize', _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss");
        var signstr = _tokenaction + _timestamp + _appid + _appkey;
        var UData = {
            "did": localStorage.getItem('device_id_value'),
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
            url: _severHost + "?action=" + _tokenaction + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [], tjson = eval(json[0].D) || [];
                if (json[0].C == 0) {
                    localStorage.setItem('token_expire_time', tjson[0].expire);
                    localStorage.setItem('token_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
                    localStorage.setItem('token_value', tjson[0].token);
                }
            }
        });
        
    }();
};

var GetUserTokenForLoginOut = function(){
    var g = function(){
        localStorage.setItem('device_id_value', $.md5(navigator.userAgent.toLowerCase()));
        var _tokenaction = 'token_authorize', _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss");
        var signstr = _tokenaction + _timestamp + _appid + _appkey;
        var UData = {
            "did": localStorage.getItem('device_id_value'),
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
            url: _severHost + "?action=" + _tokenaction + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [], tjson = eval(json[0].D) || [];
                if (json[0].C == 0) {
                    localStorage.setItem('token_expire_time', tjson[0].expire);
                    localStorage.setItem('token_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
                    localStorage.setItem('token_value', tjson[0].token);
                    H5Method.JUMPUrl('/df4.html');
                }
                
            }
        });
        
    }();
};

var GetUserTokenInit = function(){
    var g = function(){
        localStorage.setItem('device_id_value', $.md5(navigator.userAgent.toLowerCase()));
        var _tokenaction = 'token_authorize', _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss");
        var signstr = _tokenaction + _timestamp + _appid + _appkey;
        var UData = {
            "did": localStorage.getItem('device_id_value'),
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
            url: _severHost + "?action=" + _tokenaction + "&jscallback=?",
            data: UData, error: function(result, status){
				AjaxFailJump();
            },
            success: function(result){
                var json = eval(result) || [], tjson = eval(json[0].D) || [];
                if (json[0].C == 0) {
                    localStorage.setItem('token_expire_time', tjson[0].expire);
                    localStorage.setItem('token_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
                    localStorage.setItem('token_value', tjson[0].token);
                    var backuri = localStorage.getItem('token_backurl') || '/df4.html';
                    document.location = backuri;
                }
            }
        });
        
    };
    g();
};


var GetUserOpenId = function(){
    var wxopenid = $.trim(H5Storage.GLV('login_user_openid')) || '', ua = navigator.userAgent.toLowerCase();
    var c = function(){
        if (ua.match(/MicroMessenger/i) == "micromessenger" && ua.match(/mobile/i) == "mobile") {
            if ($.trim(wxopenid) == '' || $.trim(wxopenid) == 'null' || $.trim(wxopenid) == 'undefined') {
                if (H5Method.GUV('code') == '') {
                    var fromurl = location.href.split('#')[0];
                    document.location = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' + _wxappid + '&redirect_uri=' + encodeURIComponent(fromurl) + '&response_type=code&scope=snsapi_base&state=123#wechat_redirect';
                }
                else {
                    g(H5Method.GUV('code'));
                }
            }
        }
    };
    var g = function(code){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'openid_get_bycode';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "code": code,
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
                    s(result);
            }
        });
    };
    var s = function(data){
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        if (json[0].C == 0) {
            H5Storage.SLV('openid_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
            H5Storage.SLV('login_user_openid', tjson[0].openid);
            al(tjson[0].openid);
        }
        else {
            confirm(json[0].M, "", "", "", "", "1");
        }
    };
    var al = function(openid){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'login_auto_by_openid';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "openid": openid,
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
                cal(result);
            }
        });
    };
    var cal = function(data){
        H5Storage.SSV('login_out_status', 1);
        if (tjson[0].loginstatus.toLowerCase() == 'true') {
            H5Storage.SLV('login_true_userid', tjson[0].useid);
            H5Storage.SLV('user_login_info', JSON.stringify(json[0].D));
        }
    };
    $.trim(wxopenid) == '' || $.trim(wxopenid) == 'null' || $.trim(wxopenid) == 'undefined' ? (H5Storage.CLV('login_user_openid'), H5Storage.CLV('openid_get_time'), c()) : null;
};

var AutoLoginByOpenId = function(){
    var wxopenid = $.trim(H5Storage.GLV('login_user_openid')) || '', is_loginout = $.trim(H5Storage.GSV('login_out_status')) || 0, loginuserid = $.trim(H5Storage.GLV('login_true_userid')) || '', ua = navigator.userAgent.toLowerCase(), auto_login_status = $.trim(H5Storage.GSV('auto_login_status')) || 0;
    var i = function(){
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
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    cl(result);
            }
        });
    };
    var cl = function(data){
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        if (tjson[0].loginstatus.toLowerCase() == 'true') {
            H5Storage.SSV('login_out_status', 1);
            H5Storage.SLV('login_true_userid', tjson[0].useid);
            H5Storage.SLV('user_login_info', JSON.stringify(json[0].D));
        }
        else {
            al();
        }
    };
    var al = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'login_auto_by_openid';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "openid": wxopenid,
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
                cal(result);
            }
        });
    };
    var cal = function(data){
        H5Storage.SSV('login_out_status', 1);
        if (tjson[0].loginstatus.toLowerCase() == 'true') {
            H5Storage.SLV('login_true_userid', tjson[0].useid);
            H5Storage.SLV('user_login_info', JSON.stringify(json[0].D));
        }
    };
    ua.match(/MicroMessenger/i) == "micromessenger" && ua.match(/mobile/i) == "mobile" ? $.trim(wxopenid) != '' && $.trim(wxopenid) != 'null' && $.trim(wxopenid) != 'undefined' ? (is_loginout == 0 ? i() : null) : null : null;
}();

var GetDeviceInfo = function(){
    var g = function(){
        H5Storage.SLV('device_id_value', $.md5(UserDevicesInfo.getInfo()));
    };
    $.trim(H5Storage.GLV('device_id_value')) != '' && $.trim(H5Storage.GLV('device_id_value')) != 'null' && $.trim(H5Storage.GLV('device_id_value')) != 'undefined' ? null : g();
};
var descContent = "自由搭配的沙拉美食，美味围绕舌尖，望京SOHO约起~！";
var shareTitle = 'Daisy Fresh抢鲜体验';
var shareTimelineTitle = '自由搭配的沙拉美食，美味围绕舌尖，望京SOHO约起~！';
var imgUrl = _severAddress + '/images/shareImg.png';
var shareLineLink = _severAddress + '/df4.html?n=' + Math.random();


var GetWXShareToken = function(){
    var g = function(){
        var ua = navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == "micromessenger" && ua.match(/mobile/i) == "mobile") {
            var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'weixin_share_token_get', url = location.href.split('#')[0];
            var signstr = _action + token + _timestamp + _appid + _appkey;
            var UData = {
                "url": url,
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
                data: UData,
                error: function(result, status){
                },
                success: function(result){
                    var json = eval(result) || [];
                    if (json[0].C == 916) {
                        WW.HWD();
                        localStorage.setItem('token_backurl', window.location);
                        document.location = '/renewToken.html';
                    }
                    else 
                        s(result);
                }
            });
        }
    };
    var s = function(data){
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        //alert('WXToken:'+json[0].C)
        wx.config({
            debug: !1,
            appId: _wxappid,
            timestamp: tjson[0].timestamp,
            nonceStr: tjson[0].nonceStr,
            signature: tjson[0].signature,
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'getLocation', 'chooseImage', 'previewImage', 'uploadImage', 'downloadImage', 'scanQRCode']
        });
        wx.ready(function(){
            wx.onMenuShareAppMessage({
                title: shareTitle,
                desc: descContent,
                link: shareLineLink,
                imgUrl: imgUrl,
                trigger: function(res){
                },
                success: function(res){
                },
                cancel: function(res){
                },
                fail: function(res){
                }
            });
            wx.onMenuShareTimeline({
                title: shareTimelineTitle,
                link: shareLineLink,
                imgUrl: imgUrl,
                trigger: function(res){
                },
                success: function(res){
                },
                cancel: function(res){
                },
                fail: function(res){
                }
            });
            wx.onMenuShareQQ({
                title: shareTitle,
                desc: descContent,
                link: shareLineLink,
                imgUrl: imgUrl,
                trigger: function(res){
                },
                success: function(res){
                },
                cancel: function(res){
                },
                fail: function(res){
                }
            });
            wx.onMenuShareWeibo({
                title: shareTitle,
                desc: descContent,
                link: shareLineLink,
                imgUrl: imgUrl,
                trigger: function(res){
                },
                success: function(res){
                },
                cancel: function(res){
                },
                fail: function(res){
                }
            });
        });
    };
    g();
}();

var GetUserLoginInfo = function(f){
    var g = function(){
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
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    s(result);
            }
        });
    };
    var s = function(data){
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        if (tjson[0].loginstatus.toLowerCase() == 'true') {
            H5Storage.SLV('login_true_userid', tjson[0].useid);
            H5Storage.SLV('user_login_info', JSON.stringify(json[0].D));
        }
        else {
            H5Storage.CLV('login_true_userid');
            H5Storage.CLV('user_login_info');
            H5Storage.SLV('login_back_uri', window.location.href.replace('http://' + window.location.host, ''));
            H5Method.JUMPUrl('/df1.html');
        }
        
    };
    g();
};

var GetUserInfo = function(f){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'user_info_get';
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
                    s(result);
            }
        });
    };
    var s = function(data){
        var json = eval(data) || [];
        if (json[0].C == 0) {
            var tjson = eval(json[0].D) || [];
            H5Storage.SLV('login_true_userid', tjson[0].id);
            H5Storage.SLV('user_info', JSON.stringify(json[0].D));
        }
        else {
            H5Storage.CLV('login_true_userid');
            H5Storage.CLV('user_info');
        }
        eval(f);
    };
    g();
};

var CreateHrefRand = function(){
    var rand = Math.random();
    $("a").each(function(){
        href = $(this).attr("href");
        if (href.length == 0 || href.indexOf("javascript") > -1 || href.indexOf("tel:") > -1) 
            return;
        else 
            if (href.indexOf("?") > -1) {
                $(this).attr("href", href + "&rand=" + rand);
            }
            else {
                $(this).attr("href", href + "?rand=" + rand);
            }
    });
};
var LoginOut = function(){
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'verify_loginout';
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
                    f(result);
            }
        });
    };
    var f = function(data){
        var json = eval(data) || [];
        if (json[0].C == 0) {
            H5Storage.CLV('token_expire_time');
            H5Storage.CLV('token_get_time');
            H5Storage.CLV('token_value');
            H5Storage.CLV('login_true_userid');
            H5Storage.CLV('login_true_mobile');
            H5Storage.CLV('user_login_info');
            H5Storage.CLV('location_get_time');
            H5Storage.CLV('my_location_address');
            H5Storage.CLV('set_location_address');
            H5Storage.CLV('pickup_point_city_status');
            GetUserTokenForLoginOut();
            //GetUserLoginInfo();
        
        }
        else {
            alert(json[0].M);
        }
    };
    i();
};

var SaveProductLikeTypeDo = function(pid, type, e){
    var s = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'product_like_add';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "userid": H5Storage.GLV('login_true_userid'),
            "pid": pid,
            "type": type,
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        $('#ProdudtLike1_' + pid + ',#ProdudtLike0_' + pid).removeClass('on');
        if (tjson[0].status == 1) {
            AddOneAnimate(e);
            type == 1 ? ($('#ProdudtLike1_' + pid).html(parseInt(tjson[0].count)), $('#ProdudtLike1_' + pid).addClass('on')) : ($('#ProdudtLike0_' + pid).html(parseInt(tjson[0].count)), $('#ProdudtLike0_' + pid).addClass('on'));
        }
        if (tjson[0].status == 0) {
            CutOneAnimate(e);
            type == 1 ? ($('#ProdudtLike1_' + pid).html(parseInt(tjson[0].count))) : ($('#ProdudtLike0_' + pid).html(parseInt(tjson[0].count)));
        }
    };
    s();
};

var SetProductG = function(pid){
    var i = function(){
        $.trim(H5Storage.GLV('df_product_local_data')) != '' && $.trim(H5Storage.GLV('df_product_local_data')) != 'null' && $.trim(H5Storage.GLV('df_product_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('df_product_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, njson = [], status = 1, us = 0;
        $.each(json, function(index, obj){
            if (obj.pid == pid) {
                if (obj.type == 1) {
                    //alert(WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), obj.createdate, 'day'))
                    WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), obj.createdate, 'day') < 1 ? (status = 0, njson.push('{"pid":"' + obj.pid + '","createdate":"' + obj.createdate + '","type":"' + obj.type + '"}')) : njson.push('{"pid":"' + obj.pid + '","createdate":"' + obj.createdate + '","type":"' + obj.type + '"}')
                }
                if (obj.type == 0) {
                    //alert(WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), obj.createdate, 'day'))
                    WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), obj.createdate, 'day') < 1 ? us = 1 : null;
                }
            }
            else {
                njson.push('{"pid":"' + obj.pid + '","createdate":"' + obj.createdate + '","type":"' + obj.type + '"}');
            }
        });
        if (status == 1) {
            njson.push('{"pid":"' + pid + '","createdate":"' + WW.GetNowDateTime() + '","type":"1"}');
            
            $('#ProdudtLike1_' + pid).html(parseInt($('#ProdudtLike1_' + pid).html()) + 1);
            if (us == 1) {
                $('#ProdudtLike0_' + pid).html(parseInt($('#ProdudtLike0_' + pid).html()) - 1);
            }
            AddOneAnimate(event);
        }
        $('#ProdudtLike1_' + pid + ',#ProdudtLike0_' + pid).removeClass('on');
        $('#ProdudtLike1_' + pid).addClass('on');
        SaveProductLikeTypeDo(pid, 1);
        H5Storage.SLV('df_product_local_data', njson);
    };
    SaveProductLikeTypeDo(pid, 1, event);
};

var AddOneAnimate = function(e){
    var n = 1;
    var $i = $("<b>").text("+" + n);
    var x = e.pageX, y = e.pageY;
    $i.css({
        top: y - 20,
        left: x,
        position: "absolute",
        color: "#E94F06"
    });
    $("body").append($i);
    $i.animate({
        top: y - 180,
        opacity: 0,
        "font-size": "1.4em"
    }, 1500, function(){
        $i.remove();
    });
    e.stopPropagation();
};

var CutOneAnimate = function(e){
    var n = 1;
    var $i = $("<b>").text("-" + n);
    var x = e.pageX, y = e.pageY;
    $i.css({
        top: y - 20,
        left: x,
        position: "absolute",
        color: "#E94F06"
    });
    $("body").append($i);
    $i.animate({
        top: y - 180,
        opacity: 0,
        "font-size": "1.4em"
    }, 1500, function(){
        $i.remove();
    });
    e.stopPropagation();
};

var SetProductNG = function(pid){
    var i = function(){
        $.trim(H5Storage.GLV('df_product_local_data')) != '' && $.trim(H5Storage.GLV('df_product_local_data')) != 'null' && $.trim(H5Storage.GLV('df_product_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('df_product_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, njson = [], status = 1, us = 0;
        $.each(json, function(index, obj){
            if (obj.pid == pid) {
                if (obj.type == 0) {
                    WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), obj.createdate, 'day') < 1 ? (status = 0, njson.push('{"pid":"' + obj.pid + '","createdate":"' + obj.createdate + '","type":"' + obj.type + '"}')) : njson.push('{"pid":"' + obj.pid + '","createdate":"' + obj.createdate + '","type":"' + obj.type + '"}')
                }
                if (obj.type == 1) {
                    WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), obj.createdate, 'day') < 1 ? us = 1 : null;
                }
            }
            else {
                njson.push('{"pid":"' + obj.pid + '","createdate":"' + obj.createdate + '","type":"' + obj.type + '"}');
            }
        });
        if (status == 1) {
            njson.push('{"pid":"' + pid + '","createdate":"' + WW.GetNowDateTime() + '","type":"0"}');
            
            $('#ProdudtLike0_' + pid).html(parseInt($('#ProdudtLike0_' + pid).html()) + 1);
            if (us == 1) {
                $('#ProdudtLike1_' + pid).html(parseInt($('#ProdudtLike1_' + pid).html()) - 1);
            }
            AddOneAnimate(event);
        }
        SaveProductLikeTypeDo(pid, 2);
        $('#ProdudtLike1_' + pid + ',#ProdudtLike0_' + pid).removeClass('on');
        $('#ProdudtLike0_' + pid).addClass('on');
        $('#ProdudtLike0_' + pid).unbind("click");
        H5Storage.SLV('df_product_local_data', njson);
    };
    SaveProductLikeTypeDo(pid, 2, event);
};

var GetProductLikeClass = function(){
    var i = function(){
        $.trim(H5Storage.GLV('df_product_local_data')) != '' && $.trim(H5Storage.GLV('df_product_local_data')) != 'null' && $.trim(H5Storage.GLV('df_product_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('df_product_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, classname = 'off';
        if (len > 0) {
            $.each(json, function(index, obj){
                if (WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), obj.createdate, 'day') < 1) {
                    obj.type == 0 ? $('#ProdudtLike0_' + obj.pid).addClass('on') : obj.type == 1 ? $('#ProdudtLike1_' + obj.pid).addClass('on') : null;
                }
            });
        }
        //alert(data)
    }();
};

var GetProductLikeClassById = function(pid){
    var i = function(){
        H5Storage.CLV('df_product_local_data');
        $.trim(H5Storage.GLV('df_product_local_data')) != '' && $.trim(H5Storage.GLV('df_product_local_data')) != 'null' && $.trim(H5Storage.GLV('df_product_local_data')) != 'undefined' ? data = '[' + H5Storage.GLV('df_product_local_data') + ']' : data = '';
        var json = eval(data) || [], len = json.length || 0, classname = 'off';
        if (len > 0) {
            $.each(json, function(index, obj){
                if (obj.pid == pid) {
                    if (WW.DateDiff(new Date().format("yyyy-MM-dd hh:mm:ss"), obj.createdate, 'day') < 1) {
                        obj.type == 0 ? $('#ProdudtLike0_' + obj.pid).addClass('on') : obj.type == 1 ? $('#ProdudtLike1_' + obj.pid).addClass('on') : null;
                    }
                }
            });
        }
        
    }();
};

var DeliveryReminders = function(pid){
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_product_count_edit';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "pid": pid,
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
        
        }
        else {
            alert(json[0].M);
        }
    };
    i();
};

var ShowOrHideCartInfo = function(){
    var i = function(){
        $("#CartBody").is(":hidden") ? ($('#CartBody').show(), $('#CartCountLine_1').hide(), $('#CartTotalLine_1').unbind('click')) : ($('#CartBody').hide(), $('#CartCountLine_1').show(), $('#CartTotalLine_1').unbind('click'));
    }();
};

var CartAmountUpdate = function(pid, t, type, c){
    var i = function(){
        t == 'r' ? $('#cart_amount_' + pid).val(parseInt($('#cart_amount_' + pid).val(), 10) + 1) : t == 'l' ? $('#cart_amount_' + pid).val(parseInt($('#cart_amount_' + pid).val(), 10) - 1) : null;
        parseInt($('#cart_amount_' + pid).val(), 10) <= 0 ? ($('#cart_amount_' + pid).val(0), $('#CartProdutLine_' + pid).hide()) : null;
        s();
    };
    var s = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_product_count_edit';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "pid": pid,
            "type": type,
            "amount": $('#cart_amount_' + pid).val(),
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
        //alert(json[0].C);
        if (json[0].C == '100600015') {
            $('#cart_amount_' + pid).val(0);
            alert(json[0].M);
        }
        else 
            if (json[0].C == 0) {
                if (c == '73') {
                    H5Method.JUMPUrl('/df17.html')
                }
                else 
                    if (c == 0) {
                        RenderRightHeadCartLine();
                        RenderBottomCartLine(data, 0);
                        if (window.location.pathname.toLowerCase().indexOf('/df17.html') >= 0) {
                            CART.GetCartList();
                        }
                    /* if ($('#cart_amount_' + pid).val() <= 0) {
                 var h = [];
                 h.push('<div class="have-now" onclick="JoinCartDo(\'' + pid + '\',\'1\',\'1\',\'0\');">');
                 h.push('<span>立即抢购</span>');
                 h.push('</div>');
                 $('#ProductCartOptionLine_' + pid).html(h.join(''));
                 }*/
                    }
                    else {
                        RenderRightHeadCartLine();
                        RenderBottomCartLine(data, 1);
                        if (window.location.pathname.toLowerCase().indexOf('/df17.html') >= 0) {
                            CART.GetCartList(1);
                        }
                    }
            }
            else {
                alert(json[0].M);
            }
    };
    i();
};

var JoinCartDo = function(pid, pamount, type, c){
    var i = function(){
        var amount = parseInt($('#cart_amount_' + pid).val()) + parseInt(pamount) || pamount;
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_product_count_edit';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "pid": pid,
            "type": type,
            "amount": amount,
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
            if (c == '73') {
                H5Method.JUMPUrl('/df17.html')
            }
            else 
                if (c == 0) {
                    RenderRightHeadCartLine();
                    RenderBottomCartLine(data, 0);
                    if (window.location.pathname.toLowerCase().indexOf('/df17.html') >= 0) {
                        CART.GetCartList(1);
                    }
                /* if ($('#cart_amount_' + pid).val() <= 0) {
                 var h = [];
                 h.push('<div class="have-now" onclick="JoinCartDo(\'' + pid + '\',\'1\',\'1\',\'0\');">');
                 h.push('<span>立即抢购</span>');
                 h.push('</div>');
                 $('#ProductCartOptionLine_' + pid).html(h.join(''));
                 }*/
                }
                else {
                    RenderRightHeadCartLine();
                    RenderBottomCartLine(data, 1);
                    if (window.location.pathname.toLowerCase().indexOf('/df17.html') >= 0) {
                        CART.GetCartList(1);
                    }
                }
        }
        else {
            alert(json[0].M);
        }
    };
    i();
};

var RenderHomeCartLine = function(){
	var cdid = function(){
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
					if(tjson[0].districtid.length>=32){
						i();
					}
				}
            }
        });
    };
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_info_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
            "userid": H5Storage.GLV('login_true_userid'),
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [], h = [];
        h.push('<div class="index-hd">');
        h.push('<i onclick="$(\'#HomeLeftNav\').slideDown(\'slow\');"></i>');
        tjson.length > 0 ? h.push('<span onclick="H5Method.JUMPUrl(\'\/df17.html\');"><em>' + tjson[0].cart_count + '</em></span>') : h.push('<span onclick="H5Method.JUMPUrl(\'\/df17.html\');"><em>0</em></span>');
        h.push('</div>');
        $('#CartLine').html(h.join(''));
        H5Storage.SLV('order_from_page', window.location.href.replace('http://' + window.location.host, ''));
    };
    cdid();
};

var RenderRightHeadCartLine = function(){
	var cdid = function(){
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
					if(tjson[0].districtid.length>=32){
						i();
					}
				}
            }
        });
    };
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_info_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
			"userid": H5Storage.GLV('login_true_userid'),
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [], h = [];
        tjson.length > 0 ? h.push('<span class="cart-ico" onclick="H5Method.JUMPUrl(\'\/df17.html\');"><em>' + tjson[0].cart_count + '</em></span>') : h.push('<span class="cart-ico" onclick="H5Method.JUMPUrl(\'\/df17.html\');"><em>0</em></span>');
        $('#CartLine').html(h.join(''));
    };
    cdid();
};

var RenderBottomCartLine = function(){
	var cdid = function(){
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
					if(tjson[0].districtid.length>=32){
						i();
					}
				}
            }
        });
    };
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_info_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "token": token,
			"userid": H5Storage.GLV('login_true_userid'),
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [], h = [];
        h.push('<div class="choose-menu-2" onclick="H5Method.JUMPUrl(\'/df17.html\')">');
        h.push('<table width="100%">');
        h.push('<tr>');
        h.push('<td class="td-1"><span>' + H5Storage.GLV('amount1').replace('%d', '<i>' + tjson[0].cart_count + '</i>') + '</span> </td>');
        h.push('<td class="td-2"><span>' + H5Storage.GLV('price') + '<i>￥' + parseFloat(tjson[0].cart_price).toFixed(2) + '</i></span></td>');
        h.push('<td class="td-3"><div class="cart-btn-4"><img src="/images/d7-icon-3.png" width="22">' + H5Storage.GLV('ok') + '</div></td>');
        h.push('</tr>');
        h.push('</table>');
        h.push('</div>');
        $('#CartBottomLine').html(h.join(''));
        H5Storage.SLV('order_from_page', window.location.href.replace('http://' + window.location.host, ''));
    };
    cdid();
};

var RenderCartLine = function(data, t){
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_product_get';
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [], pjson = eval(tjson[0].product) || [], h = [];
        h.push('<div class="cart-wrap">');
        h.push('<div class="bottom-btn shop-cart fl-clr" style="bottom:0;position:fixed;">');
        t == 1 || H5Storage.GLV('orders_confrim_status') == 1 ? h.push('<div class="cart-ico" id="CartCountLine_1" onclick="ShowOrHideCartInfo();" style="display:none;">') : h.push('<div class="cart-ico" id="CartCountLine_1" onclick="ShowOrHideCartInfo();">');
        h.push('<i>' + tjson[0].totalcount + '</i>');
        h.push('</div>');
        h.push('<div class="cart-wd" id="CartTotalLine_1" onclick="ShowOrHideCartInfo();">');
        h.push('<h2>￥' + parseFloat(tjson[0].totalprice).toFixed(2) + H5Storage.GLV('df_pay_unit') + '</h2>');
        h.push('<p>' + tjson[0].message + '</p>');
        h.push('</div>');
        h.push('<a href="javascript:;" onclick="CartToOrders();" class="bt-btn">' + H5Storage.GLV('ok') + '</a>');
        h.push('</div>');
        t == 1 || H5Storage.GLV('orders_confrim_status') == 1 ? h.push('<div class="cart-layer" id="CartBody">') : h.push('<div class="cart-layer" id="CartBody" style="display:none;">');
        h.push('<div class="cart-list">');
        h.push('<div class="cart-ico cart-l" onclick="ShowOrHideCartInfo();">');
        h.push('<i>' + tjson[0].totalcount + '</i>');
        h.push('</div>');
        $.each(pjson, function(index, obj){
            if (obj.type == 1) {
                h.push('<table width="100%" cellspacing="0" cellpadding="0" border="0" class="sp-tb" id="CartProdutLine_' + obj.pid + '">');
                h.push('<tr>');
                h.push('<td class="td-1">');
                h.push('<p>' + obj.title + '</p>');
                h.push('</td>');
                h.push('<td class="td-2">');
                h.push('￥' + parseFloat(obj.price).toFixed(2));
                h.push('</td>');
                h.push('<td class="td-3 fl-clr">');
                h.push('<em class="car-add-l" onclick="CartAmountUpdate(\'' + obj.pid + '\',\'l\',\'' + obj.type + '\');"></em>');
                h.push('<input type="text" id="cart_amount_' + obj.pid + '" name="cart_amount_' + obj.pid + '" value="' + obj.amount + '" readonly class="inpt">');
                h.push('<em class="car-add-r" onclick="CartAmountUpdate(\'' + obj.pid + '\',\'r\',\'' + obj.type + '\');"></em>');
                h.push('</td>');
                h.push('</tr>');
                h.push('</table>');
            }
            else {
                h.push('<table width="100%" cellspacing="0" cellpadding="0" border="0" class="expt-buy">');
                h.push('<tr class="on" onclick="JoinCartDo(\'' + obj.pid + '\',\'' + obj.amount + '\',\'' + obj.type + '\');">');
                h.push('<td class="td-1"><p>加购：' + obj.title + '</p></td>');
                h.push('<td class="td-2">￥' + parseFloat(obj.price).toFixed(2) + '</td>');
                h.push('<td class="td-3">X' + obj.amount + '</td>');
                h.push('</tr>');
                h.push('</table>');
            }
        });
        h.push('</div>');
        h.push('</div>');
        h.push('</div>');
        $('#CartLine').html(h.join(''));
        H5Storage.SLV('order_from_page', window.location.href.replace('http://' + window.location.host, ''));
    };
    t == 1 || t == 0 ? r(data) : i();
};

var CartToOrders = function(){
    var pid = [], amount = [], type = [];
    var i = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_product_get';
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [], pjson = eval(tjson[0].product) || [], h = [], _count = 0;
        if (tjson[0].totalcount > 0) {
            $.each(pjson, function(index, obj){
                if (obj.amount > 0 && obj.checked == 1) {
                    _count++;
                    pid.push(obj.pid);
                    amount.push(obj.amount);
                    type.push(obj.type);
                }
            });
            if (_count > 0) {
                gl();
            }
            else {
                alert(H5Storage.GLV('df17_empty_pick'));
            }
        }
        else {
            WW.HWD();
            if (confirm(H5Storage.GLV('df17_empty_car'), "", "H5Method.JUMPUrl('/df4.html');", H5Storage.GLV('df_canncel'), H5Storage.GLV('df17_go'))) {
            }
        }
    };
    var gl = function(){
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
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    cl(result);
            }
        });
    };
    var cl = function(data){
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        if (tjson[0].loginstatus.toLowerCase() == 'true') {
            H5Storage.SLV('login_true_userid', tjson[0].useid);
            H5Storage.SLV('user_login_info', JSON.stringify(json[0].D));
            gdf();
        }
        else {
            H5Storage.SLV('orders_set_address', 1);
            H5Storage.SLV('order_from_page', '/df17.html?submitdo=1');
            H5Storage.SLV('login_back_uri', '/df17.html?submitdo=1')
            H5Method.JUMPUrl('/df1.html');
        }
    };
    var gdf = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'address_list_get';
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
                    sdf(result);
            }
        });
    };
    var sdf = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        if (len > 0) {
            H5Storage.SLV('set_orders_address', 1);
            H5Storage.SLV('default_orders_address', JSON.stringify(json[0].D));
        }
        c();
    };
    var c = function(){
        if ($.trim(H5Storage.GLV('default_orders_address')) == '' || $.trim(H5Storage.GLV('default_orders_address')) == 'null' || $.trim(H5Storage.GLV('default_orders_address')) == 'undefined') {
            WW.HWD();
            H5Storage.SLV('cart_set_address', 1);
            H5Storage.SLV('order_from_page', '/df17.html?submitdo=1');
            $.trim(H5Storage.GLV('login_true_userid')) != '' && $.trim(H5Storage.GLV('login_true_userid')) != 'null' && $.trim(H5Storage.GLV('login_true_userid')) != 'undefined' ? H5Method.JUMPUrl('/df39.html') : (H5Storage.SLV('login_back_uri', '/df39.html'), H5Method.JUMPUrl('/df1.html'));
        }
        else {
            c2o();
        }
    };
    var c2o = function(){
    
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'cart_inventory_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "pid": pid.join(','),
            "amount": amount.join(','),
            "type": type.join(','),
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        if (json[0].C == 0) {
            H5Storage.SLV('orders_checklist_id', tjson[0].checklist_id);
            H5Method.JUMPUrl('/df10-2.html');
        }
        else 
            if (json[0].C == '100600009') {
                alert(json[0].M, "H5Storage.SLV('login_back_uri', '/df17.html?submitdo=1');H5Storage.SLV('order_from_page', '/df17.html?submitdo=1');H5Method.JUMPUrl('/df1.html')");
            }
            else {
                alert(json[0].M);
            }
    };
    i();
};

var ClearSelfSaladStorage = function(){
    var i = function(){
        H5Storage.CLV('base_vegetable_local_data');
        H5Storage.CLV('main_vegetable_local_data');
        H5Storage.CLV('sauce_local_data');
        H5Storage.CLV('salad_base_kind');
        H5Storage.CLV('salad_base_isshred');
        H5Storage.CLV('salad_main_kind');
        H5Storage.CLV('salad_main_isshred');
        H5Storage.CLV('salad_sauce_kind');
    }();
};

var ClearProductSaladStorage = function(){
    var i = function(){
        H5Storage.CLV('product_base_vegetable_local_data');
        H5Storage.CLV('product_main_vegetable_local_data');
        H5Storage.CLV('product_sauce_local_data');
        H5Storage.CLV('product_salad_base_kind');
        H5Storage.CLV('product_salad_base_isshred');
        H5Storage.CLV('product_salad_main_kind');
        H5Storage.CLV('product_salad_main_isshred');
        H5Storage.CLV('product_salad_sauce_kind');
        H5Storage.CLV('product_to_custom');
    }();
};

var ClearResetProductSaladStorage = function(){
    var i = function(){
        H5Storage.CLV('product_base_vegetable_local_data');
        H5Storage.CLV('product_main_vegetable_local_data');
        H5Storage.CLV('product_sauce_local_data');
        H5Storage.CLV('product_to_custom');
    }();
};
var ClearCartProductSaladStorage = function(){
    var i = function(){
        H5Storage.CLV('cart_base_vegetable_local_data');
        H5Storage.CLV('cart_main_vegetable_local_data');
        H5Storage.CLV('cart_sauce_local_data');
        H5Storage.CLV('cart_salad_base_kind');
        H5Storage.CLV('cart_salad_base_isshred');
        H5Storage.CLV('cart_salad_main_kind');
        H5Storage.CLV('cart_salad_main_isshred');
        H5Storage.CLV('cart_salad_sauce_kind');
        H5Storage.CLV('cart_to_custom');
    }();
};

var ClearSystemSaladStorage = function(){
    var i = function(){
        H5Storage.CLV('system_main_vegetable_like_local_data');
        H5Storage.CLV('system_base_vegetable_local_data');
        H5Storage.CLV('system_main_vegetable_local_data');
        H5Storage.CLV('system_sauce_local_data');
        
        H5Storage.CLV('system_salad_base_kind');
        H5Storage.CLV('system_salad_base_isshred');
        H5Storage.CLV('system_salad_main_kind');
        H5Storage.CLV('system_salad_main_isshred');
        H5Storage.CLV('system_salad_sauce_kind');
        H5Storage.CLV('system_to_custom');
        H5Storage.CLV('system_salad_main_isshred');
        H5Storage.CLV('system_salad_base_isshred');
    }();
};


var ClearResetSystemSaladStorage = function(){
    var i = function(){
    
        H5Storage.CLV('system_base_vegetable_local_data');
        H5Storage.CLV('system_main_vegetable_local_data');
        H5Storage.CLV('system_sauce_local_data');
        H5Storage.CLV('system_to_custom');
    }();
};



var GetUserLoginInfoForDF2 = function(come){
    var g = function(){
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
                var json = eval(result) || [];
                if (json[0].C == 916) {
                    WW.HWD();
                    localStorage.setItem('token_backurl', window.location);
                    document.location = '/renewToken.html';
                }
                else 
                    s(result);
            }
        });
    };
    var s = function(data){
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        if (tjson[0].loginstatus.toLowerCase() == 'true') {
            if (come == 'home') {
                H5Storage.SLV('set_location_address', 0);
                H5Storage.SLV('set_orders_address', 0);
                H5Storage.CLV('default_orders_address');
                document.location = '/df2.html';
            }
            else {
                H5Storage.SLV('login_true_userid', tjson[0].useid);
                H5Storage.SLV('user_login_info', JSON.stringify(json[0].D));
                CRM_PI.GetMyAddressListForDF2();
				// document.location = '/df39.html';
            }
        }
        else {
            H5Storage.CLV('login_true_userid');
            H5Storage.CLV('user_login_info');
            H5Storage.SLV('login_back_uri', window.location.href.replace('http://' + window.location.host, ''));
            var M = H5Storage.GLV('no_login') + H5Storage.GLV('no_login2')
            //alert(M, "H5Method.JUMPUrl('/df1.html');");
			H5Method.JUMPUrl('/df1.html');
        }
        
    };
    g();
};
function GetRequest(){
    var url = location.search; //获取url中"?"符后的字串
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
        var str = url.substr(1);
        strs = str.split("&");
        for (var i = 0; i < strs.length; i++) {
            theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
        }
    }
    return theRequest;
}

//GetWXShareToken();
GetUserToken();
//GetUserOpenId();
GetDeviceInfo();
//CreateHrefRand();
RenderRightHeadCartLine();
$(document).ready(function(){
	var getConfigXml=function(){
		var strings = [];
        $.ajax({
            type: "get",
            cache: true,
            url: "strings_" + _lang.toLowerCase() + ".xml",
            dataType: "xml",
            success: function(xml){
                $(xml).find("string").each(function(){ 
				    var c_str = '"'; 
					var cregex = "/" + c_str + "/ig";                 
                    strings.push('{"title":"' + $(this).attr("name") + '","val":"' + $(this).text().replace('010–64796887', '<a href=\'tel:010–64796887\'>010–64796887</a>').replace(/\\n/gm, "<br>").replace(eval(cregex), '').replace('●', '').replace('<font color=\'#27A794\'>●</font>', '') + '"}');
                    H5Storage.SLV($(this).attr("name"), $(this).text());
                    
                });
                $(xml).find("string-array").each(function(){
					if ($(this).attr("name") == 'df_tag') {
						var itemsval = [];
						$(this).find("item").each(function(k){
							var name = $(this).attr("name"), text = $(this).text();
							itemsval.push('{"val":"' + text + '"}');
							
						});
						strings.push('{"title":"' + $(this).attr("name") + '","val":[' + itemsval.join(',') + ']}');
					}
				});
                H5Storage.SLV('strings_config', strings.join(','));
				replaceHtml();
            }
        });	
	};
	var replaceHtml=function(){
		$.each(eval('[' + H5Storage.GLV('strings_config') + ']'), function(index, obj){
            var name = obj.title, text = obj.val;
            var DivArray = document.getElementsByTagName("div");
            for (var i = 0; i < DivArray.length; i++) {
                var divstr = DivArray[i].innerHTML;
                var m_str = "{" + name.toString() + "}";
                var regex = "/" + m_str + "/ig";
                var content = $.trim(text);
                divstr = divstr.replace(eval(regex), content);
				if (window.location.pathname.toLowerCase().indexOf('/df39-1.html') >= 0 || window.location.pathname.toLowerCase().indexOf('/df39-2.html') >= 0) {
					if(name=='df_tag'){
						$.each(eval(text),function(ti,tobj){
							//console.log(tobj.val)
							 var it_str = "{tagitem" + (ti + 1) + "}";
							 var it_regex = "/" + it_str + "/ig";
							 divstr = divstr.replace(eval(it_regex), tobj.val);
						});	
					}
				} 
				DivArray[i].innerHTML = divstr;
            }
            var HArray = document.getElementsByTagName("header");
            for (var i = 0; i < HArray.length; i++) {
                var divstr = HArray[i].innerHTML;
                var m_str = "{" + name.toString() + "}";
                var c_str = '"';
                var regex = "/" + m_str + "/ig";
                var cregex = "/" + c_str + "/ig";
                var content = $.trim(text);
                divstr = divstr.replace(eval(regex), content);
                HArray[i].innerHTML = divstr;
            }
			$('#_'+name).show();
        });	
		$('body').show();
		$(".fakeloader").fakeLoader({
			timeToHide:1000,
			bgColor:"#444",
			spinner:"spinner2",
		});
	};
    if ($.trim(H5Storage.GLV('strings_config')) == '' || $.trim(H5Storage.GLV('strings_config')) == 'null' || $.trim(H5Storage.GLV('strings_config')) == 'undefined' || $.trim(H5Storage.GLV('strings_lang')) != _lang.toLowerCase()) {
        H5Storage.SLV('strings_lang', _lang.toLowerCase());
        getConfigXml();
    }
    else {
       replaceHtml(); 
    }
});


window.onerror=function(sMessage,sUrl,sLine){
	var $UData={
		"token":H5Storage.GLV('token_value'),
		"message": sMessage,
		"url": sUrl,
		"line": sLine,
		"type": 'js'
	};
	$.jsonp({
		type: 'get',
		async: !1,
		dataType: "jsonp",
		jsonp: "jsoncallback",
		url: "https://h5error.21move.net/in.aspx",
		data: $UData,
		success: function(){
			
		}
	});	
	//HideFakeLoader();
	return false;
}