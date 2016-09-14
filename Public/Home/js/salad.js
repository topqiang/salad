var SA = SA ||
{};
var BaseBMax=4,BaseSMax=4,BaseLMax=1,MainBMax=12,MainSMax=9,MainLMax=4;

SA.RenderBaseKind=function(t){
	var i=function(){
		$.trim(H5Storage.GLV('salad_base_kind')) != '' && $.trim(H5Storage.GLV('salad_base_kind')) != 'null' && $.trim(H5Storage.GLV('salad_base_kind')) != 'undefined'?t=H5Storage.GLV('salad_base_kind'):t=1;
		SA.SetBaseKind(t);
	}();
};

SA.TitleJumpNoDId = function(){
    var i = function(){
        H5Storage.SLV('home_set_address', 1);
        $.trim(H5Storage.GLV('login_true_userid')) != '' && $.trim(H5Storage.GLV('login_true_userid')) != 'null' && $.trim(H5Storage.GLV('login_true_userid')) != 'undefined' ? H5Method.JUMPUrl('/df39.html') : (H5Storage.SLV('login_back_uri', '/df5.html'), H5Method.JUMPUrl('/df1.html'));
    }();
};

SA.GetDefaultAddress = function(){
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
						SA.TitleJumpNoDId();	
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

SA.SetBaseKind=function(t,c){
	var i=function(){
		$('#Salad_1,#Salad_2,#Salad_3').removeClass('on');
		$('#Salad_'+t).addClass('on');		
		$('#RlueLine_1,#RlueLine_2,#RlueLine_3').hide();
		$('#RlueLine_'+t).show();
		H5Storage.SLV('salad_base_kind',t);
		H5Storage.SLV('salad_main_kind',t);
		H5Storage.SLV('salad_sauce_kind',t);
		c==1?(H5Storage.CLV('base_vegetable_local_data'),H5Storage.CLV('main_vegetable_local_data')):null;
		SA.RenderBaseVegetableAmount();
	}();
};

SA.SetBaseIsShred=function(){
	var i=function(){
		H5Storage.GLV('salad_base_isshred')==1?$('#BaseIsShred').val(1):null;
		$('#BaseIsShred').val()!=1?$('#BaseIsShred').val(1):$('#BaseIsShred').val(0);
		H5Storage.SLV('salad_base_isshred',$('#BaseIsShred').val());
		H5Storage.SLV('salad_main_isshred',$('#BaseIsShred').val());
		SA.RenderBaseIsShred();
	}();
};

SA.RenderBaseIsShred=function(t){
	var i=function(){
		$.trim(H5Storage.GLV('salad_base_isshred')) == '' || $.trim(H5Storage.GLV('salad_base_isshred')) == 'null' || $.trim(H5Storage.GLV('salad_base_isshred')) == 'undefined'?(H5Storage.SLV('salad_base_isshred',1),H5Storage.SLV('salad_main_isshred',1)):null;
		H5Storage.GLV('salad_base_isshred')==1?$('#IsShredLine').addClass('on'):$('#IsShredLine').removeClass('on');
	}();
};

SA.RenderMainKind=function(t){
	var i=function(){
	$.trim(H5Storage.GLV('salad_main_kind')) != '' && $.trim(H5Storage.GLV('salad_main_kind')) != 'null' && $.trim(H5Storage.GLV('salad_main_kind')) != 'undefined'?t=H5Storage.GLV('salad_main_kind'):t=1;
		SA.SetMainKind(t);
	}();
};

SA.SetMainKind=function(t,c){
	var i=function(){
		$('#Salad_1,#Salad_2,#Salad_3').removeClass('on');
		$('#Salad_'+t).addClass('on');
		$('#RlueLine_1,#RlueLine_2,#RlueLine_3').hide();
		$('#RlueLine_'+t).show();
		H5Storage.SLV('salad_base_kind',t);
		H5Storage.SLV('salad_main_kind',t);
		H5Storage.SLV('salad_sauce_kind',t);
		c==1?(H5Storage.CLV('base_vegetable_local_data'),H5Storage.CLV('main_vegetable_local_data')):null;
		SA.RenderMainVegetableAmount();
	}();
};

SA.SetIsMainShred=function(){
	var i=function(){
		H5Storage.GLV('salad_main_isshred')==1?$('#MainIsShred').val(1):null;
		$('#MainIsShred').val()!=1?$('#MainIsShred').val(1):$('#MainIsShred').val(0);
		H5Storage.SLV('salad_main_isshred',$('#MainIsShred').val());
		H5Storage.SLV('salad_base_isshred',$('#BaseIsShred').val());
		SA.RenderMainIsShred();
	}();
};

SA.RenderMainIsShred=function(t){
	var i=function(){
		$.trim(H5Storage.GLV('salad_main_isshred')) == '' || $.trim(H5Storage.GLV('salad_main_isshred')) == 'null' || $.trim(H5Storage.GLV('salad_main_isshred')) == 'undefined'?(H5Storage.SLV('salad_base_isshred',1),H5Storage.SLV('salad_main_isshred',1)):null;
		H5Storage.GLV('salad_main_isshred')==1?$('#IsShredLine').addClass('on'):$('#IsShredLine').removeClass('on');
	}();
};

SA.RenderSauceKind=function(t){
	var i=function(){
	$.trim(H5Storage.GLV('salad_sauce_kind')) != '' && $.trim(H5Storage.GLV('salad_sauce_kind')) != 'null' && $.trim(H5Storage.GLV('salad_sauce_kind')) != 'undefined'?t=H5Storage.GLV('salad_sauce_kind'):t=1;
		SA.SetSauceKind(t);
	}();
};

SA.SetSauceKind=function(t,c){
	var i=function(){
		$('#Salad_1,#Salad_2,#Salad_3').removeClass('on');
		$('#Salad_'+t).addClass('on');
		H5Storage.SLV('salad_base_kind',t);
		H5Storage.SLV('salad_main_kind',t);
		H5Storage.SLV('salad_sauce_kind',t);
		c==1?H5Storage.CLV('sauce_local_data'):null;
		SA.RenderMainVegetableAmount();
	}();
};

SA.Next1=function(t){
	var i=function(){
		var _total=parseInt(SA.GetBaseVegetableTotalCount());
		if(_total<=0){
			alert(H5Storage.GLV('df7_3_base_vege_count_not_zero'));	
		}
		else{
			H5Storage.GLV('salad_base_kind')==1&&parseInt(_total)>parseInt(BaseBMax)?(isMax=1,txt=H5Storage.GLV('tip_basic').replace('%d',parseInt(BaseBMax))):H5Storage.GLV('salad_base_kind')==2&&parseInt(_total)>parseInt(BaseSMax)?(isMax=1,txt=H5Storage.GLV('tip_basic').replace('%d',parseInt(BaseSMax))):H5Storage.GLV('salad_base_kind')==3&&parseInt(_total)>parseInt(BaseLMax)?(isMax=1,txt=H5Storage.GLV('tip_basic').replace('%d',parseInt(BaseLMax))):isMax=0;			
			if(isMax==0){
				H5Method.JUMPUrl('/df5-1.html');
				
				//
				/*if(H5Storage.GLV('salad_base_isshred')!=1){
					 if (confirm("您确定基础菜不需要切碎吗？", "H5Storage.SLV('salad_base_isshred',0);H5Storage.SLV('salad_main_isshred',0);H5Method.JUMPUrl('/df5-1.html');", "H5Storage.SLV('salad_base_isshred',1);H5Storage.SLV('salad_main_isshred',1);H5Method.JUMPUrl('/df5-1.html');", "不需要", "需要切碎")) {}	
				}
				else{
					H5Method.JUMPUrl('/df5-1.html');	
				}*/
			}
			else if(isMax==1){
				alert(txt);		
			}			
		}
	}();
};


SA.Next2=function(t){
	var i=function(){
		var _total=parseInt(SA.GetMainVegetableTotalCount());
		var _basetotal=parseInt(SA.GetBaseVegetableTotalCount());
		var _maintotal=parseInt(SA.GetMainVegetableTotalCount());
		if(_total<=0){
			alert(H5Storage.GLV('df7_3_main_vege_count_not_zero'));	
		}
		else{
			H5Storage.GLV('salad_main_kind')==1&&parseInt(_total)>parseInt(MainBMax)?(isMax=1,txt=H5Storage.GLV('tip_large').replace('%d',MainBMax)):H5Storage.GLV('salad_main_kind')==2&&parseInt(_total)>parseInt(MainSMax)?(isMax=1,txt=H5Storage.GLV('tip_small').replace('%d',MainSMax)):H5Storage.GLV('salad_main_kind')==3&&parseInt(_total)>parseInt(MainLMax)?(isMax=1,txt= H5Storage.GLV('tip_optional').replace('%d',MainLMax)):isMax=0;
			if(isMax==0){
				H5Storage.GLV('salad_main_kind')==1?(mainmaxtotal=MainBMax,basemaxtotal=BaseBMax):H5Storage.GLV('salad_main_kind')==2?(mainmaxtotal=MainSMax,basemaxtotal=BaseSMax):
H5Storage.GLV('salad_main_kind')==3?(mainmaxtotal=MainLMax,basemaxtotal=BaseLMax):(mainmaxtotal=MainBMax,basemaxtotal=BaseBMax);
				var _btotal=basemaxtotal-_basetotal,_mtotal=mainmaxtotal-_maintotal;
				if(_btotal<=0&&_mtotal<=0){
					H5Method.JUMPUrl('/df5-2.html');
				}
				else if(_btotal>0&&_mtotal>0){
					confirm(H5Storage.GLV('df8_2_tip3').replace('%1$d',_btotal).replace('%2$d',_mtotal), "H5Method.JUMPUrl('/df5.html');", "H5Method.JUMPUrl('/df5-2.html');", H5Storage.GLV('df8_2_continue'), H5Storage.GLV('df8_2_no_choose'))	
				}
				else if(_btotal>0){
					confirm(H5Storage.GLV('df8_2_tip').replace('%d',_btotal), "H5Method.JUMPUrl('/df5.html');", "H5Method.JUMPUrl('/df5-2.html');", H5Storage.GLV('df8_2_continue'), H5Storage.GLV('df8_2_no_choose'))	
				}
				else if(_mtotal>0){
					confirm(H5Storage.GLV('df8_2_tip4').replace('%d',_mtotal), "H5Method.JUMPUrl('/df5-1.html');", "H5Method.JUMPUrl('/df5-2.html');", H5Storage.GLV('df8_2_continue'), H5Storage.GLV('df8_2_no_choose'))
				}
			}
			else if(isMax==1){
				alert(txt);		
			}
		}
	}();
};

SA.SetBaseVegetableAmount=function(pid,t){
	var i = function(){
		t == 'r'?_total=parseInt(SA.GetBaseVegetableTotalCount())+1:t == 'l'?_total=parseInt(SA.GetBaseVegetableTotalCount())-1:H5Storage.GLV('salad_base_kind')==1?_total=BaseBMax+1:H5Storage.GLV('salad_base_kind')==2?_total=BaseSMax+1:H5Storage.GLV('salad_base_kind')==3?_total=BaseLMax+1:null;		
		H5Storage.GLV('salad_base_kind')==1&&parseInt(_total)>parseInt(BaseBMax)?(isMax=1,txt=H5Storage.GLV('tip_basic').replace('%d',BaseBMax)):H5Storage.GLV('salad_base_kind')==2&&parseInt(_total)>parseInt(BaseSMax)?(isMax=1,txt=H5Storage.GLV('tip_basic').replace('%d',BaseSMax)):H5Storage.GLV('salad_base_kind')==3&&parseInt(_total)>parseInt(BaseLMax)?(isMax=1,txt=H5Storage.GLV('tip_basic').replace('%d',BaseLMax)):isMax=0;
		if(isMax==0){
			t == 'r' ? $('#base_amount_' + pid).val(parseInt($('#base_amount_' + pid).val(), 10) + 1) : t == 'l' ? $('#base_amount_' + pid).val(parseInt($('#base_amount_' + pid).val(), 10) - 1) : null;
			parseInt($('#base_amount_' + pid).val(), 10)>3 ? ($('#base_amount_' + pid).val(3)) : null;
			parseInt($('#base_amount_' + pid).val(), 10) <= 0 ? ($('#base_amount_' + pid).val(0)) : null;
			s();
		}
		else if(isMax==1){
			alert(txt);	
		}
    };
	 var s = function(){
		$.trim(H5Storage.GLV('base_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('base_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('base_vegetable_local_data')) != 'undefined' ? data='['+H5Storage.GLV('base_vegetable_local_data')+']':data='';
		var json=eval(data)||[],len=json.length||0,njson=[],status=1;
		$.each(json, function(index, obj){
			if(obj.pid==pid){
				status=0;
				njson.push('{"pid":"'+obj.pid+'","createdate":"'+WW.GetNowDateTime()+'","amount":"'+$('#base_amount_' + pid).val()+'"}');
			}	
			else{
				njson.push('{"pid":"'+obj.pid+'","createdate":"'+obj.createdate+'","amount":"'+obj.amount+'"}');
			}
		});
		if(status==1){
			njson.push('{"pid":"'+pid+'","createdate":"'+WW.GetNowDateTime()+'","amount":"'+$('#base_amount_' + pid).val()+'"}');
		}
		H5Storage.SLV('base_vegetable_local_data',njson);
		SA.RenderBaseVegetableTotalCount();
    };
	i();
};

SA.GetBaseVegetableTotalCount=function(){
	$.trim(H5Storage.GLV('base_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('base_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('base_vegetable_local_data')) != 'undefined' ? data='['+H5Storage.GLV('base_vegetable_local_data')+']':data='';
	var json=eval(data)||[],len=json.length||0,total=0;
	$.each(json, function(index, obj){
		total=parseInt(total)+parseInt(obj.amount);
	});
	return total;
};

SA.RenderBaseVegetableTotalCount=function(){
	 var r = function(){
		$('#BaseTotalCountLine').html(SA.GetBaseVegetableTotalCount());
    }();
};


SA.RenderBaseVegetableAmount=function(){
	var i=function(){
		$.trim(H5Storage.GLV('base_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('base_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('base_vegetable_local_data')) != 'undefined' ? data='['+H5Storage.GLV('base_vegetable_local_data')+']':data='';
		var json=eval(data)||[],len=json.length||0,njson=[];
		$('.inpt-shu').val(0);
		$.each(json, function(index, obj){
			$('#base_amount_'+obj.pid).val(obj.amount);
		});
		SA.RenderBaseVegetableTotalCount();
	}();
};

SA.GetBaseVegetableList=function(){
	var g = function(){
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
                else {
					H5Storage.SLV('base_vegetable_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('base_vegetable_list', JSON.stringify(result));
					r(result);
				}
            }
        });
    };
	var r=function(data){
		var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
		$.each(tjson,function(index,obj){
			h.push('<li id="BaseVegetableLine_'+obj.pid+'">');
			h.push('<table width="100%" cellpadding="0" cellspacing="0" border="0">');
			h.push('<tr>');
			h.push('<td class="td-1"><img src="'+obj.img+'"></td>');
			h.push('<td class="td-2">'+obj.title+'</td>');
			h.push('<td class="td-3 fl-clr">');
			h.push('<em class="car-add-l" onclick="SA.SetBaseVegetableAmount(\''+obj.pid+'\',\'l\');"></em>');
			h.push('<input type="text" id="base_amount_' + obj.pid + '" name="base_amount_' + obj.pid + '" value="0" readonly class="inpt-shu">');
			h.push('<em class="car-add-r" onclick="SA.SetBaseVegetableAmount(\''+obj.pid+'\',\'r\');"></em>');
			h.push('</td>');
			h.push('</tr>');
			h.push('</table>');
			h.push('</li>');
		});
		$('#BaseList').html(h.join(''));
		SA.RenderBaseVegetableAmount();
	};
	g(); 
};

SA.SwithMainClass=function(classid){
	var i=function(){
		$('.mainherf').removeClass('on');
		$('#MainHref_'+classid).addClass('on');
		SA.GetMainVegetableList(classid);
	}();	
};

SA.GetMainVegetableClassList=function(){
	var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'main_vegetable_class_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "classid": '',
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
					H5Storage.SLV('main_vegetable_class_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('main_vegetable_class_list', JSON.stringify(result));
					r(result);
				}
            }
        });
    };
	var r=function(data){
		var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
		$.each(tjson,function(index,obj){
			index==0?firstclassid=obj.classid:null;
			(obj.classtitle.length>4&&obj.classtitle.length<6)?menuclass='menu-1':obj.classtitle.length>=6?menuclass='menu-3':menuclass='menu-2';
			h.push('<a href="javascript:;" onclick="SA.SwithMainClass(\''+obj.classid+'\')" id="MainHref_'+obj.classid+'" class="mainherf '+menuclass+'">');
			h.push('<img src="/images/nav-back.png">');
			h.push('<span>'+obj.classtitle+'</span>');
			h.push('</a>');
		});
		$('#MainClassList').html(h.join(''));
		SA.SwithMainClass(firstclassid);
	};
	g(); 
};

SA.SetMainVegetableAmount=function(pid,t){
	var i = function(){
		t == 'r'?_total=parseInt(SA.GetMainVegetableTotalCount())+1:t == 'l'?_total=parseInt(SA.GetMainVegetableTotalCount())-1:H5Storage.GLV('salad_main_kind')==1?_total=MainBMax+1:H5Storage.GLV('salad_main_kind')==2?_total=MainSMax+1:H5Storage.GLV('salad_main_kind')==3?_total=MainLMax+1:null;
		H5Storage.GLV('salad_main_kind')==1&&parseInt(_total)>parseInt(MainBMax)?(isMax=1,txt=H5Storage.GLV('tip_large').replace('%d',MainBMax)):H5Storage.GLV('salad_main_kind')==2&&parseInt(_total)>parseInt(MainSMax)?(isMax=1,txt=H5Storage.GLV('tip_small').replace('%d',MainSMax)):H5Storage.GLV('salad_main_kind')==3&&parseInt(_total)>parseInt(MainLMax)?(isMax=1,txt= H5Storage.GLV('tip_optional').replace('%d',MainLMax)):isMax=0;
		if(isMax==0){
			t == 'r' ? $('#main_amount_' + pid).val(parseInt($('#main_amount_' + pid).val(), 10) + 1) : t == 'l' ? $('#main_amount_' + pid).val(parseInt($('#main_amount_' + pid).val(), 10) - 1) : null;
			parseInt($('#main_amount_' + pid).val(), 10)>3 ? ($('#main_amount_' + pid).val(3)) : null;
			parseInt($('#main_amount_' + pid).val(), 10) <= 0 ? ($('#main_amount_' + pid).val(0)) : null;
			s();
		}
		else if(isMax==1){
			alert(txt);	
		}
    };
	 var s = function(){
		$.trim(H5Storage.GLV('main_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('main_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('main_vegetable_local_data')) != 'undefined' ? data='['+H5Storage.GLV('main_vegetable_local_data')+']':data='';
		var json=eval(data)||[],len=json.length||0,njson=[],status=1;
		$.each(json, function(index, obj){
			if(obj.pid==pid){
				status=0;
				njson.push('{"pid":"'+obj.pid+'","createdate":"'+WW.GetNowDateTime()+'","amount":"'+$('#main_amount_' + pid).val()+'"}');
			}	
			else{
				njson.push('{"pid":"'+obj.pid+'","createdate":"'+obj.createdate+'","amount":"'+obj.amount+'"}');
			}
		});
		if(status==1){
			njson.push('{"pid":"'+pid+'","createdate":"'+WW.GetNowDateTime()+'","amount":"'+$('#main_amount_' + pid).val()+'"}');
		}
		H5Storage.SLV('main_vegetable_local_data',njson);
		SA.RenderMainVegetableTotalCount();
    };
	i();
};

SA.GetMainVegetableTotalCount=function(){
	 $.trim(H5Storage.GLV('main_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('main_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('main_vegetable_local_data')) != 'undefined' ? data='['+H5Storage.GLV('main_vegetable_local_data')+']':data='';
	var json=eval(data)||[],len=json.length||0,total=0;
	$.each(json, function(index, obj){
		total=parseInt(total)+parseInt(obj.amount);
	});
	return total;
};

SA.RenderMainVegetableTotalCount=function(){
	 var r = function(){
		$('#MainTotalCountLine').html(SA.GetMainVegetableTotalCount());
    }();
};

SA.RenderMainVegetableAmount=function(){
	var i=function(){
		$.trim(H5Storage.GLV('main_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('main_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('main_vegetable_local_data')) != 'undefined' ? data='['+H5Storage.GLV('main_vegetable_local_data')+']':data='';
		var json=eval(data)||[],len=json.length||0,njson=[];	
		$('.inpt-shu').val(0);
		$.each(json, function(index, obj){
			$('#main_amount_'+obj.pid).val(obj.amount);
		});
		SA.RenderMainVegetableTotalCount();
	}();
};

SA.GetMainVegetableList=function(classid){
	var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'main_vegetable_list_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "classid": classid,
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
					H5Storage.SLV('mian_vegetable_get_time_'+classid, new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('mian_vegetable_list_'+classid, JSON.stringify(result));
					r(result);
				}
            }
        });
    };
	var r=function(data){
		var json = eval(data) || [], tjson = eval(json[0].D) || [], len = tjson.length || 0, h = [];
		if(len<=0){
			$('#myNoDataShowArea').show();
            $('#myDataShowArea').hide();
		}
		else{
			$.each(tjson,function(index,obj){
				h.push('<li id="MainVegetableLine_'+obj.pid+'">');
				h.push('<table width="100%" cellpadding="0" cellspacing="0" border="0">');
				h.push('<tr>');
				h.push('<td class="td-1"><img src="'+obj.img+'"></td>');
				h.push('<td class="td-2">'+obj.title+'</td>');
				h.push('<td class="td-3 fl-clr">');
				h.push('<em class="car-add-l" onclick="SA.SetMainVegetableAmount(\''+obj.pid+'\',\'l\');"></em>');
				h.push('<input type="text" id="main_amount_' + obj.pid + '" name="main_amount_' + obj.pid + '" value="0" readonly class="inpt-shu">');
				h.push('<em class="car-add-r" onclick="SA.SetMainVegetableAmount(\''+obj.pid+'\',\'r\');"></em>');
				h.push('</td>');
				h.push('</tr>');
				h.push('</table>');
				h.push('</li>');
			});
			$('#myNoDataShowArea').hide();
            $('#myDataShowArea').show();
			$('#MainList').html(h.join(''));
			SA.RenderMainVegetableAmount();
		}
	};
	g(); 
};

SA.SetSauceDo=function(pid){
	var i=function(){
		$.trim(H5Storage.GLV('sauce_local_data')) != '' && $.trim(H5Storage.GLV('sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('sauce_local_data')) != 'undefined' ? data='['+H5Storage.GLV('sauce_local_data')+']':data='';
		var json=eval(data)||[],len=json.length||0,njson=[],status=1;		
		njson.push('{"pid":"'+pid+'","createdate":"'+WW.GetNowDateTime()+'","amount":"1"}');
		H5Storage.SLV('sauce_local_data',njson);
		SA.RenderSauceAmount();
	}();	
};

SA.RenderSauceTotalCount=function(){
	 var r = function(){
		$.trim(H5Storage.GLV('sauce_local_data')) != '' && $.trim(H5Storage.GLV('sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('sauce_local_data')) != 'undefined' ? data='['+H5Storage.GLV('sauce_local_data')+']':data='';
		var json=eval(data)||[],len=json.length||0,total=0;
		$.each(json, function(index, obj){
			total=parseInt(total)+parseInt(obj.amount);
		});
		$('#SauceTotalCountLine').html(total);
    }();
};

SA.RenderSauceAmount=function(){
	var i=function(){
		$.trim(H5Storage.GLV('sauce_local_data')) != '' && $.trim(H5Storage.GLV('sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('sauce_local_data')) != 'undefined' ? data='['+H5Storage.GLV('sauce_local_data')+']':data='';
		var json=eval(data)||[],len=json.length||0,njson=[];
		$('#SauceList li').removeClass('on');
		$.each(json, function(index, obj){
			$('#SauceLine_'+obj.pid).addClass('on');
		});
		SA.RenderSauceTotalCount();
	}();
};

SA.GetSauceList=function(classid){
	var g = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'sauce_list_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "classid": classid,
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
					H5Storage.SLV('sauce_get_time', new Date().format("yyyy-MM-dd hh:mm:ss"));
					H5Storage.SLV('sauce_list', JSON.stringify(result));
					r(result);
				}
            }
        });
    };
	var r=function(data){
		var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
		$.each(tjson,function(index,obj){
			h.push('<li id="SauceLine_'+obj.pid+'" onclick="SA.SetSauceDo(\''+obj.pid+'\');">');
			h.push('<table width="100%" cellpadding="0" cellspacing="0" border="0">');
			h.push('<tr>');
			h.push('<td class="td-1"><img src="'+obj.img+'"></td>');
			h.push('<td class="td-2">'+obj.title+'</td>');
			h.push('<td class="td-3"></td>');
			h.push('</tr>');
			h.push('</table>');
			h.push('</li>');
		});
		$('#SauceList').html(h.join(''));
		SA.RenderSauceAmount()
	};
	g();
};

SA.SubmitSaladCustomAccept=function(){
	var pid=[],ptype=[],pcount=[],pkind=[],shred=[];
	var i=function(){
		$.trim(H5Storage.GLV('base_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('base_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('base_vegetable_local_data')) != 'undefined' ? bdata='['+H5Storage.GLV('base_vegetable_local_data')+']':bdata='';
		$.trim(H5Storage.GLV('main_vegetable_local_data')) != '' && $.trim(H5Storage.GLV('main_vegetable_local_data')) != 'null' && $.trim(H5Storage.GLV('main_vegetable_local_data')) != 'undefined' ? mdata='['+H5Storage.GLV('main_vegetable_local_data')+']':mdata='';
		$.trim(H5Storage.GLV('sauce_local_data')) != '' && $.trim(H5Storage.GLV('sauce_local_data')) != 'null' && $.trim(H5Storage.GLV('sauce_local_data')) != 'undefined' ? sdata='['+H5Storage.GLV('sauce_local_data')+']':sdata='';
		var bjson=eval(bdata)||[],mjson=eval(mdata)||[],sjson=eval(sdata)||[],blen=bjson.length||0,mlen=mjson.length||0,slen=sjson.length||0;
		$.each(bjson,function(index,obj){
			if(obj.amount>0){				  
				pid.push(obj.pid);
				pcount.push(obj.amount);
				ptype.push(1);
			}			
		});
		//pkind.push(H5Storage.GLV('salad_base_kind'));
		//shred.push(H5Storage.GLV('salad_base_isshred'));
		$.each(mjson,function(index,obj){
			if(obj.amount>0){				  
				pid.push(obj.pid);
				pcount.push(obj.amount);
				ptype.push(2);
			}
		});
		pkind.push(H5Storage.GLV('salad_main_kind'));
		shred.push(H5Storage.GLV('salad_main_isshred')||0);
		$.each(sjson,function(index,obj){
			if(obj.amount>0){				  
				pid.push(obj.pid);
				pcount.push(obj.amount);
				ptype.push(3);
			}
		});
		//pkind.push(H5Storage.GLV('salad_sauce_kind'));
		if(blen>0&&mlen>0&&slen>0){
			s();	
		}
		else if(blen<=0){
			alert(H5Storage.GLV('no_basic'),"H5Method.JUMPUrl('/df5.html')",H5Storage.GLV('df_enter'));	
		}
		else if(mlen<=0){
			alert(H5Storage.GLV('no_main'),"H5Method.JUMPUrl('/df5-1.html')",H5Storage.GLV('df_enter'));	
		}
		else if(slen<=0){
			alert(H5Storage.GLV('no_sauce'),"",H5Storage.GLV('df_enter'));	
		}
	};
	var s = function(){
		WW.SWD(H5Storage.GLV('loading'));
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
	var f=function(data){
		WW.HWD();
        var json = eval(data) || [];
        if (json[0].C == 0) {
			ClearSelfSaladStorage();
			history.pushState('', '', '/df4.html');
            H5Method.JUMPUrl('/df17.html');
        }
        else {
            alert(json[0].M);
        }
	};
	i();
};

SA.SetIsShred=function(){
	var i=function(){
			SA.SetBaseIsShred();
			SA.SetIsMainShred();
			SA.RenderIsShred();
	}();
};

SA.RenderIsShred=function(t){
	var i=function(){
		$.trim(H5Storage.GLV('salad_base_isshred')) == '' || $.trim(H5Storage.GLV('salad_base_isshred')) == 'null' || $.trim(H5Storage.GLV('salad_base_isshred')) == 'undefined'?(H5Storage.SLV('salad_base_isshred',1),H5Storage.SLV('salad_main_isshred',1)):null;
		H5Storage.GLV('salad_base_isshred')==1?$('#IsShredLine').addClass('on'):$('#IsShredLine').removeClass('on');
	}();
};