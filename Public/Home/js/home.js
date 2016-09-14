var H = H ||
{};
H.LIMIT = 6;
H.START = 0;
H.RCount = H.LIMIT;

H.TitleJump = function(){
    var i = function(){
        H5Storage.SLV('home_set_address', 1);
        $.trim(H5Storage.GLV('login_true_userid')) != '' && $.trim(H5Storage.GLV('login_true_userid')) != 'null' && $.trim(H5Storage.GLV('login_true_userid')) != 'undefined' ? H5Method.JUMPUrl('/df39.html') : (H5Storage.SLV('login_back_uri', '/df39.html'), H5Method.JUMPUrl('/df1.html'));
    }();
};


H.AddressJump = function(){
    var i = function(){
        H5Storage.SLV('home_set_address', 1);
        H5Storage.SLV('home_set_address_jump', 1);
        $.trim(H5Storage.GLV('login_true_userid')) != '' && $.trim(H5Storage.GLV('login_true_userid')) != 'null' && $.trim(H5Storage.GLV('login_true_userid')) != 'undefined' ? H5Method.JUMPUrl('/df39.html') : (H5Storage.SLV('login_back_uri', '/df39.html'), H5Method.JUMPUrl('/df1.html'));
    }();
};

H.ShopJump = function(){
    var i = function(){
        H5Storage.SLV('home_set_address', 1);
        H5Storage.SLV('home_set_address_jump', 2);
        $.trim(H5Storage.GLV('login_true_userid')) != '' && $.trim(H5Storage.GLV('login_true_userid')) != 'null' && $.trim(H5Storage.GLV('login_true_userid')) != 'undefined' ? H5Method.JUMPUrl('/df39.html') : (H5Storage.SLV('login_back_uri', '/df39.html'), H5Method.JUMPUrl('/df1.html'));
    }();
};

H.TitleJumpNoDId = function(){
    var i = function(){
        H5Storage.SLV('home_set_address', 1);
		 $.trim(H5Storage.GLV('login_true_userid')) == '88888888888888888888888888888888'?(H5Storage.SLV('login_back_uri', '/df4.html'), H5Method.JUMPUrl('/df1.html')):null;
        $.trim(H5Storage.GLV('login_true_userid')) != '' && $.trim(H5Storage.GLV('login_true_userid')) != 'null' && $.trim(H5Storage.GLV('login_true_userid')) != 'undefined' ? H5Method.JUMPUrl('/df39.html') : (H5Storage.SLV('login_back_uri', '/df4.html'), H5Method.JUMPUrl('/df1.html'));
    }();
};

H.GetDefaultAddress = function(){
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
                else {
					cdid(result);
					/*if(json[0].D.length>0){
						H5Storage.SLV('location_address_addressid', json[0].D[0].id);
						cdid(result);
					}
					else{
						H5Storage.SLV('login_back_uri', window.location.href.replace('http://' + window.location.host, ''));
						H5Method.JUMPUrl('/df1.html');	
					}*/
				}
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
					console.log(tjson[0].loginstatus)
					if(tjson[0].loginstatus.toLowerCase() != 'true'){
						H5Storage.SLV('login_back_uri', window.location.href.replace('http://' + window.location.host, ''));
						H5Method.JUMPUrl('/df1.html');	
					}
					if(tjson[0].districtid.length<32){
						H.TitleJumpNoDId();	
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
            gba(1);
			H.ShowHomeActivityTip();
			//H.ShowHomeAddressTip();
        }
        else {
			GetUserLoginInfoForDF2('home');
        }
    };
    var gba = function(ct){
		try{
			$.each(eval(H5Storage.GLV('default_orders_address')), function(index, obj){
				$.trim(obj.doorcode)!=''&&$.trim(obj.doorcode)!='null'&&$.trim(obj.doorcode)!='undefined'?doorcode=obj.doorcode:doorcode='';
				obj.ttype==0?$('#LoactionTitle').html('<span>'+H5Storage.GLV('df4_home_sent_tip')+'</span>'+obj.address+doorcode):obj.ttype==1?$('#LoactionTitle').html('<span>'+H5Storage.GLV('df4_please_go')+'</span>'+obj.companytitle+H5Storage.GLV('df4_self_get')):null;
			});
		}
		catch(e){
			$.each(eval('['+H5Storage.GLV('default_orders_address')+']'), function(index, obj){
				obj.ttype==0?$('#LoactionTitle').html('<span>'+H5Storage.GLV('df4_home_sent_tip')+'</span>'+obj.address+doorcode):obj.ttype==1?$('#LoactionTitle').html('<span>'+H5Storage.GLV('df4_please_go')+'</span>'+obj.companytitle+H5Storage.GLV('df4_self_get')):null;
			});
		}
    };
    g();
};


H.ShowHomeActivityTip=function(){
	var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'user_activity_info';
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
                else {
					r(result);
				}
            }
        });
    };
    var r = function(data){
		var json = eval(data) || [], tjson = json[0].D || [],h=[];
		
		H5Storage.SLV('activity_set_address', 0);
		if(tjson[0].activity==1){
			h.push('<div class="new-buy" id="ActivityLayer">');
			h.push('<i onClick="H5Storage.SLV(\'activity_set_address\', 0);$(\'#ActivityLayer\').remove();"></i>');
			h.push('<img src="/images/buy-img.jpg" onClick="H.ActivityToInventory();">');
			h.push('</div>');
			$('body').append(h.join(''));
		}		
	};
	g();
};

H.ActivityToInventory=function(){
	var i=function(){
        H5Storage.SLV('home_set_address', 1);
		H5Storage.SLV('activity_set_address', 1);
        H5Storage.SLV('home_set_address_jump', 2);
        H5Method.JUMPUrl('/df39.html');	
	}();	
};

H.ActivityToInventory_del=function(){
	var g = function(){
		WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'activity_inventory_get';
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
            "sign_method": _sign_method,
            "addressid": H5Storage.GLV('location_address_addressid')
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
					r(result);
				}
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = eval(json[0].D) || [];
        if (json[0].C == 0) {
            H5Storage.SLV('orders_checklist_id', tjson[0].checklist_id);
			H5Method.JUMPUrl('/df10-2.html');
        }
        else {
			WW.HWD();
            alert(json[0].M);
        }
    };
	g();	
};

H.ShowHomeAddressTip=function(){
	var i=function(){
		var h=[];
		h.push('<div class="black-layer" id="HomeTipBlackLayer" onclick="$(\'#HomeTipBlackLayer,#HomeTipBodyLayer\').hide();"></div>');
		h.push('<div class="index-dialog" id="HomeTipBodyLayer">');
		h.push('<div class="index-dialog" onclick="$(\'#HomeTipBlackLayer,#HomeTipBodyLayer\').hide();">');
		h.push('<img src="/images/index-img.png" width="100%">');
		h.push('</div>');
		//$.trim(H5Storage.GLV('home_tip_done_show'))!=1?($('body').append(h.join('')),H5Storage.SLV('home_tip_done_show',1)):null;
		
	}();	
};

H.SetHomeTipDoneShow=function(){
	var i=function(){
		$('#HomeTipDoneShowSpan').addClass('on');
		H5Storage.SLV('home_tip_done_show',1);
	}();	
};

H.GetHomeFocusImgList=function(){
	var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'index_focus_img_get';
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
					H5Storage.SLV('home_focus_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('home_focus_list', JSON.stringify(result));
					r(result);
				}
            }
        });
    };
    var r = function(data){
		var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [], h1 = [];
		$.each(tjson,function(index,obj){
			h.push('<li>');
			h1.push('<li></li>');
			$.trim(obj.linkurl)!=''?h.push('<a href="'+obj.linkurl+'">'):h.push('<a href="javascript:;">');
			h.push('<img src="'+obj.images+'">');
			h.push('</a>');
			h.push('</li>');
		});
		$('#HomeFocusImgList').html(h.join(''));
		$('#HomeFocusImgIndex').html(h1.join(''));
		$(".banner").picSlide();
		$(".banner").touchwipe();

    };
	g();
};

H.GetProductClassList = function(){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'good_class_top_get';
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
                else{
					H5Storage.SLV('product_class_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('product_class_list', JSON.stringify(result));
					r(result);
				}
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0,h=[];
		
        len>=1?tjson[0].classid != '' ? ($('#HomeSubject_2').html(tjson[0].classtitle),  $('.nav-2').bind('click', function(){
           H5Method.JUMPUrl('/df7.html?pointid='+tjson[0].classid)
        })) : ($('.nav-2').hide()) : ($('.nav-2').hide());
        len>=2?tjson[1].classid != '' ? ($('#HomeSubject_3').html(tjson[1].classtitle), $('.nav-3').bind('click', function(){
             H5Method.JUMPUrl('/df7.html?pointid='+tjson[1].classid)
        })) : ($('.nav-3').hide()) : ($('.nav-3').hide());
    };
    g();
};

H.GetSubjectList = function(){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'subject_list_get';
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
					H5Storage.SLV('home_subject_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('home_subject_list', JSON.stringify(result));
					r(result);
				}
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0;
        len>=1?tjson[0].id != '' ? ($('#HomeSubject_1').html(tjson[0].title), $('#HomeSubject_1').attr('mainclassid', tjson[0].id), $('.nav-1').bind('click', function(){
            H.GetMainClassListBySubject(tjson[0].id);
            H.GetProductListBySubject(tjson[0].id);
        })) : ($('.nav-1').hide()) : ($('.nav-1').hide());
        len>=2?tjson[1].id != '' ? ($('#HomeSubject_2').html(tjson[1].title), $('#HomeSubject_2').attr('mainclassid', tjson[1].id), $('.nav-2').bind('click', function(){
            H.GetMainClassListBySubject(tjson[1].id);
            H.GetProductListBySubject(tjson[1].id);
        })) : ($('.nav-2').hide()) : ($('.nav-2').hide());
        len>=3?tjson[2].id != '' ? ($('#HomeSubject_3').html(tjson[2].title), $('#HomeSubject_3').attr('mainclassid', tjson[2].id), $('.nav-3').bind('click', function(){
            H.GetMainClassListBySubject(tjson[2].id);
            H.GetProductListBySubject(tjson[2].id);
        })) : ($('.nav-3').hide()) : ($('.nav-3').hide());
        len>=4?tjson[3].id != '' ? ($('#HomeSubject_4').html(tjson[3].title), $('#HomeSubject_4').attr('mainclassid', tjson[3].id), $('.nav-4').bind('click', function(){
            H.GetMainClassListBySubject(tjson[3].id);
            H.GetProductListBySubject(tjson[3].id);
        })) : ($('.nav-4').hide()): ($('.nav-4').hide());
    };
    g();
};

H.GetMainClassListBySubject = function(id){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'class_get_by_mainid';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var mainclassid = id || $('#HomeSubject_1').attr('mainclassid');
        var UData = {
            "mainclassid": mainclassid,
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
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        $.each(tjson, function(index, obj){
            h.push('<a href="javascript:;" onclick="H.GetProductListClass(\'' + obj.classid + '\');">' + obj.classtitle + '</a>');
        });
        $('#MainClassList').html(h.join(''));
    };
    g();
};

H.GetProductListBySubject = function(id){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'product_list_get_by_subject';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var mainclassid = id || $('#HomeSubject_1').attr('mainclassid');
        var UData = {
            "mainclassid": mainclassid,
            "limit": H.LIMIT,
            "start": H.START,
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
					H.RenderHomeBodyInfo(result);
            }
        });
    };
    g();
};

H.GetProductListClass = function(id){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'product_list_get_by_class';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var classid = id || '';
        var UData = {
            "classid": classid,
            "limit": H.LIMIT,
            "start": H.START,
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
					H.RenderHomeBodyInfo(result);
            }
        });
    };
    g();
};

H.RenderHomeBodyInfo = function(data){
    var r = function(){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        $.each(tjson, function(index, obj){
            if (obj.type.toLowerCase() == 'subject') {
                h.push('<div class="daily-list">');
                h.push('<div class="daily-outer">');
                h.push('<div class="daily-inner">');
                h.push('<div class="main_image">');
                h.push('<ul>');
                $.each(eval(obj.images), function(key, val){
                    h.push('<li>');
                    h.push('<a href="#">');
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
				if($.trim(obj.tagimg)!=''){
					h.push('<div class="daily-w">');
					h.push('<img src="' + obj.tagimg + '">');
					h.push('</div>');
				}
                h.push('</div>');
                h.push('<dl>');
                h.push('<dt>' + obj.title +' '+ obj.ptitle + '</dt>');
                h.push('<dd>' + obj.content + '</dd>');
                h.push('</dl>');
                h.push('</div>');
            }
            if (obj.type.toLowerCase() == 'product') {
                var pid = obj.pid;
                h.push('<div class="spec-list">');
                h.push('<div class="daily-outer">');
                h.push('<div class="daily-inner">');
                h.push('<div class="main_image">');
                h.push('<ul>');
                $.each(eval(obj.images), function(key, val){
                    h.push('<li>');
                    h.push('<a href="/df9-3.html?f=home&pointid=' + pid + '">');
					//h.push('<a href="#">');
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
				if($.trim(obj.tagimg)!=''){
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
                h.push('<li id="ProdudtLike1_' + obj.pid + '" class="att-1" onclick="SetProductG(\'' + obj.pid + '\');">' + obj.gcount + '</li>');
				h.push('<li id="ProdudtLike0_' + obj.pid + '"  class="att-2" onclick="SetProductNG(\'' + obj.pid + '\');">' + obj.ngcount + '</li>');
                h.push('<li class="att-3" onclick="H5Method.JUMPUrl(\'\/df9-3.html?f=home&pointid=' + pid + '\')">' + obj.comment + '</li>');
				//h.push('<li class="att-3">' + obj.comment + '</li>');
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
                h.push('</div>');
            }
        });
        $('#HomeBody').html(h.join(''));
		GetProductLikeClass();
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
    }();
};