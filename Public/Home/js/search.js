var S = S ||
{};

S.GetHotWordList = function(){
    var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'hot_word_get';
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
					H5Storage.SLV('hot_word_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('hot_word_list', JSON.stringify(result));
					r(result);
				}
            }
        });
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        h.push('<dt>'+H5Storage.GLV('df7_2_hot_search')+'</dt>');
        $.each(tjson, function(key, val){
            h.push('<dd onclick="S.SetWordDo(\'' + val + '\');">' + val + '</dd>');
        });
        $('#hotwordlist').html(h.join(''))
    };
    g();
};

S.SetWordDo = function(k){
    var i = function(){
        $('#key').val(k);
        S.SearchDo();
    }();
};

S.SearchDo = function(k){
    var i = function(){
        if ($.trim($('#key').val()) == '') {
            alert(H5Storage.GLV('search_keyword'), "$('#key').focsu();");
            return false;
        }
        else {
            s();
        }
    };
    var s = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'good_list_by_search';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "districtid": H5Storage.GLV('device_id_value'),
            "keyword": $.trim($('#key').val()),
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
					j(result);
            }
        });
    };
    var j = function(data){
        WW.HWD();
        var json = eval(data) || [];
        if (json[0].C == 0) {
            H5Storage.SLV('product_search_key', $.trim($('#key').val()));
            H5Storage.SLV('product_search_list', JSON.stringify(data));
            H5Method.JUMPUrl('/df7-2-3.html')
        }
        else {
            H5Storage.CLV('product_search_list');
            alert(json[0].M);
        }
    };
    i();
};

S.JumpPackageGo=function(pid){
	var i=function(){
		H5Method.JUMPUrl('/df7-3.html?f=search&cartcount='+$('#cart_amount_'+pid).val()+'&pointid=' + pid);	
	}();	
};

S.RenderSearchResult = function(){
    var r = function(){
        var json = eval(H5Storage.GLV('product_search_list')) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        $('#key').val(H5Storage.GLV('product_search_key'));
        //$('#SearchKey').html(H5Storage.GLV('product_search_key'));
       // $('#SearchCount').html(len);
		$('.d7-tit').html(H5Storage.GLV('search_goods').replace('%1$d',len).replace('%2$s',H5Storage.GLV('product_search_key')));
        $.each(tjson, function(index, obj){
            var pid = obj.pid;
            
            var cartcount = obj.cartcount || 0;
            h.push('<div class="pro-detail">');
            h.push('<dl class="pro-des">');
            h.push('<dt>');
            h.push('<img src="' + obj.img + '" >');
            h.push('</dt>');
            obj.type == 4 ? h.push('<dd onclick="S.JumpPackageGo(\''+obj.pid+'\');">') : h.push('<dd onclick="H5Method.JUMPUrl(\'\/df9-3.html?f=search&pointid=' + obj.pid + '\')">');
            //obj.type==4?h.push('<dd onclick="H5Method.JUMPUrl(\'\/df7-3.html?f=search&pointid=' + obj.pid + '\');">'):h.push('<dd>');
            h.push('<h3>' + obj.title + '</h3>');
            obj.type == 4 ? h.push('<ul onclick="S.JumpPackageGo(\''+obj.pid+'\');">') : h.push('<ul onclick="H5Method.JUMPUrl(\'\/df9-3.html?f=search&pointid=' + obj.pid + '\')">');
            //obj.type==4?h.push('<ul onclick="H5Method.JUMPUrl(\'\/df7-3.html?f=search&pointid=' + obj.pid + '\');">'):h.push('<ul>');
            if (obj.type == 4) {
                $.each(eval(obj.json), function(si, sobj){
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
            obj.type == 4 ? carttype = 1 : obj.type == 1 ? carttype = 1 : carttype = 1
            h.push('</ul>');
            h.push('</dd>');
            h.push('<dd class="fl-clr">');
            h.push('<span class="td-2"><i>￥' + parseFloat(obj.price).toFixed(2) + '</i>/' + H5Storage.GLV('df5_unit') + '</span>');
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
            h.push('<td align="right" onclick="H5Method.JUMPUrl(\'\/df9-3.html?f=search&pointid=' + obj.pid + '\')"><span class="td-r">' + obj.comment + '</span></td>');
            //h.push('<td align="right"><span class="td-r">' + obj.comment + '</span></td>');
            h.push('</tr>');
            h.push('</table>');
            h.push('</div>');
            h.push('</div>');
        });
        $('#ProductList').html(h.join(''));
        GetProductLikeClass();
    }();
};
