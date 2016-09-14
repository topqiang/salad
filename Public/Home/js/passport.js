var CRM_PA = CRM_PA ||
{};

CRM_PA.ResetGetSecurityCodeButton=function(){
	if($('#ss').val() == 0){
		$('#GetCAPTCHAButton').bind("click",function(){
			CRM_PA.GetSecurityCode();
		});
		$('#SCBL').html(H5Storage.GLV('df1_bt_sent'));
	}
	else{
		$('#GetCAPTCHAButton').unbind("click");
		$('#ss').val($('#ss').val()-1);
		$('#SCBL').html(IsGather.is_SingleDigit($('#ss').val()));
		H5Storage.SLV('SCBLLastSS',$('#ss').val());
		setTimeout(function(){CRM_PA.ResetGetSecurityCodeButton();},1000);	
	}
};

CRM_PA.GetSecurityCode = function(){
    var i = function(){
        if ($.trim($('#mobile').val()) == '') {
            alert(H5Storage.GLV('df1_ed_phone_hint'),"$('#mobile').focus();");
            return false;
        }
        if (!WW.CheckMobile($.trim($('#mobile').val()))) {
            alert(H5Storage.GLV('df1_phone_error')," $('#mobile').focus();");
            return false;
        }
        g();
    };
    var g = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'security_code_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "mobile": $('#mobile').val(),
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
            async: false,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost+"?action="+_action+"&jscallback=?", 
            data: UData,
            error: function(result, status){
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
		 	$('#ss').val(60);	
			$('#code').val('')
       	 	CRM_PA.ResetGetSecurityCodeButton();
        }
        else {
            alert(json[0].M);
        }
    };
    i();
};


CRM_PA.VerifyLogin = function(){
    var i = function(){
        if ($.trim($('#mobile').val()) == '') {
            alert(H5Storage.GLV('df1_ed_phone_hint'),"$('#mobile').focus();");   
            return false;
        }
        if (!WW.CheckMobile($.trim($('#mobile').val()))) {
            alert(H5Storage.GLV('df1_phone_error')," $('#mobile').focus();");
            return false;
        }
        if ($.trim($('#code').val()) == '') {
            alert(H5Storage.GLV('df1_ed_password_hint'),"$('#code').focus();");
            return false;
        }
        g();
    };
    var g = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'verify_login';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "did": H5Storage.GLV('device_id_value'),
            "mobile": $('#mobile').val(),
            "code": $('#code').val(),
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
            async: false,
            dataType: "jsonp",
            jsonp: "jsoncallback",
            url: _severHost+"?action="+_action+"&jscallback=?", 
            data: UData,
            error: function(result, status){
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
		H5Storage.SLV('last_login_mobile',$('#mobile').val());
        var json = eval(data) || [];
        if (json[0].C == 0) {
			H5Storage.SLV('login_true_mobile',$('#mobile').val());
			GetUserInfo('CRM_PA.LoginBack();');        	
        }
        else {
			H5Storage.CLV('login_true_mobile');
            alert(json[0].M);
        }
    };
	
    i();
};

CRM_PA.LoginBack = function(){
    var ua = navigator.userAgent.toLowerCase();
    var h5j = function(){
        if (H5Storage.GLV('set_tuan_address') == 1) {
            H5Storage.GLV('set_tuan_address') == 1 ? H5Method.JUMPUrl(H5Storage.GLV('login_back_uri')) : H5Method.JUMPUrl('/sc2-1.html');
        }
        else {
            $.trim(H5Storage.GLV('login_back_uri')) != '' && $.trim(H5Storage.GLV('login_back_uri')) != 'null' && $.trim(H5Storage.GLV('login_back_uri')) != 'undefined' ? H5Method.JUMPUrl($.trim(H5Storage.GLV('login_back_uri'))) : H5Method.JUMPUrl('/df35.html');
        }
    }();
    var wxj = function(){
        H5Method.JUMPUrl('/getwxopenid.html');
    };
    ua.match(/MicroMessenger/i) == "micromessenger" && ua.match(/mobile/i) == "mobile" ? wxj() : h5j();
};