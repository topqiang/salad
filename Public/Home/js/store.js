var S = S ||
{};

S.GetStoreList = function(){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'pickup_point_get';
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
					H5Storage.SLV('store_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('store_list', JSON.stringify(result));
					r(result);
				}
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        $.each(tjson, function(index,obj){
            h.push('<dl>');
            h.push('<dt>');
            h.push(obj.title);
            h.push('</dt>');
            h.push('<dd class="addr">'+obj.companyaddress+'</dd>');
            h.push('<dd class="phone">'+H5Storage.GLV('df_shop_phone')+obj.companymoblie+'</dd>');
            h.push('<dd class="timer">'+H5Storage.GLV('business_hours')+'：'+obj.companyopentime+'</dd>');
            h.push('</dl>');
        });
        $('#StoreList').html(h.join(''))
    };
    g();
};


S.GetStoreFocusImgList=function(){
	var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'store_focus_img_get';
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
					H5Storage.SLV('store_focus_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('store_focus_list', JSON.stringify(result));
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
