var OM = OM ||
{};

OM.LIMIT = 6;
OM.START = 0;
OM.RCount = OM.LIMIT;

OM.GetMyOrderList = function(){
    $("#myOrdersList").attr('scrollPagination', 'disabled');
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_list_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "userid": H5Storage.GLV('login_true_userid'),
            "limit": OM.LIMIT,
            "start": OM.START,
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
                    OM.RenderOrderList(result);
            }
        });
    }();
};

OM.GetOrdersListBySearch = function(){
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_search';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "userid": H5Storage.GLV('login_true_userid'),
            "keyword": $('#key').val(),
            "limit": 100,
            "start": 0,
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
                    H5Storage.SLV('order_search_result', JSON.stringify(result));
                    H5Storage.SLV('order_search_key', $('#key').val());
                    H5Method.JUMPUrl('/df22-0.html?search=1');
                }
            }
        });
    }();
};

OM.RenderMyOrderListBySearch = function(){
    var i = function(){
        $.trim(H5Storage.GLV('order_search_key')) != '' && $.trim(H5Storage.GLV('order_search_key')) != 'null' && $.trim(H5Storage.GLV('order_search_key')) != 'undefined' ? $('#key').val(H5Storage.GLV('order_search_key')) : null;
        OM.RenderOrderList(H5Storage.GLV('order_search_result'),1);
    }();
};

OM.GetMyOrderInfo = function(){
    var i = function(){
		
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_info_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "orderid": H5Method.GUV('pointid'),
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
    var gps = function(status){
        if (status == 0) {
            return H5Storage.GLV('df_no_pay');
        }
        else 
            if (status == 1) {
                return H5Storage.GLV('df_ok_pay');
            }
    };
    var gpt = function(type){
        if (type == 1) {
            return H5Storage.GLV('df_weixin_pay');
        }
        if (type == 2) {
            return H5Storage.GLV('df_ailpay_pay');
        }
        if (type == 3) {
            return H5Storage.GLV('df_get_pay');
        }
        if (type == 4) {
            return H5Storage.GLV('df_shop_pay');
        }
        if (type == 5) {
            return H5Storage.GLV('df_card_pay');
        }
    };
    var r = function(data){
        var json = eval(data) || [], tjson = json[0].D, h = [], bh = [], Total = 0, pc = 0;
        $('#name').html(tjson[0].name);
        $('#phone').html(tjson[0].phone);
        $('#address').html(tjson[0].address);
        $('#companytitle').html(tjson[0].companytitle);
        $('#companymobile').html(tjson[0].companymobile);
        $('#companyaddress').html(tjson[0].companyaddress);
        $('#delivery_time').html(tjson[0].delivery_time);
        $('#code_num').html(tjson[0].code_num);
        $('#create_date').html(tjson[0].create_date);
        $('#pay_type_title').html(gpt(tjson[0].pay_type));
        $('#pay_status').html(gps(tjson[0].pay_status));
        
        $('#orders_price').html('￥' + parseFloat(tjson[0].orders_price).toFixed(2));
        $('#real_price').html('￥' + parseFloat(tjson[0].real_price).toFixed(2));
        $('#f_price').html('￥' + parseFloat(tjson[0].f_price).toFixed(2));
        $('#accountprice').html(parseFloat(tjson[0].real_price).toFixed(2));
        $('#remark').html(tjson[0].remark);
        $('#order_id').val(tjson[0].orders_id);
        $('#order_code').val(tjson[0].code_num);
        $('#fcode').val(tjson[0].fcode);
        $('#pay_type').val(tjson[0].pay_type);
        $('#sendmole').val(tjson[0].sendmole);
        $('#StatusDesc').html(OM.GetOrderStatusHtml(tjson[0].orders_status, tjson[0].sendmole, tjson[0].flow_status));
        tjson[0].orders_status == 2 && tjson[0].flow_status == 2 && tjson[0].sendmole != 2 ? $('#ReceivingButton').show() : null;
        tjson[0].orders_status == 1 ? $('#PayButton,#CancelButton').show() : null;
        tjson[0].sendmole == 2 ? ($('#sendmoleTitle').html(H5Storage.GLV('df10_go_shop'))) : ($('#sendmoleTitle').html(H5Storage.GLV('df10_sent_home')));
        tjson[0].sendmole == 2 ? ($('#SendShowLine').hide(), $('#StoreShowLine,#FCodeShowLine').show()) : ($('#SendShowLine').show(), $('#StoreShowLine,#FCodeShowLine').hide());
        if (tjson[0].orders_status >= 3 && ($.trim(tjson[0].completedate) != '')) {
            if (DateTimeFormat.FullEnDate($.trim(tjson[0].completedate)) != '1900-01-01') {
                $('#completedate1').html(DateTimeFormat.FullEnDateTime(tjson[0].completedate));
                $('#completedate2').html(DateTimeFormat.FullEnDateTime(tjson[0].completedate));
                tjson[0].sendmole == 2 ? $('#completedate_2').show() : $('#completedate_1').show();
            }
        }
        tjson[0].pay_status == 1 && tjson[0].sendmole == 2 ? $('#FCodeShowLine').show() : $('#FCodeShowLine').hide();
        $('#fcode_txt').html(tjson[0].fcode);
        $('#fcode').val(tjson[0].fcode);
        if (tjson[0].sendmole == 2) {
            $(document).ready(function(){
            
                var sw = $('#FCodeSmallImg').width(), sh = $('#FCodeSmallImg').height(), fcode = tjson[0].fcode || tjson[0].code_num;
                $("#FCodeSmallArea").html('');
                $("#FCodeSmallArea").qrcode({
                    text: fcode,
                    width: sw,
                    height: sh,
                    id: "qrcodeSmallCanvas"
                });
            });
        }
        $('#InvoiceInfoLine').hide();
        if (tjson[0].invoice_type) {
            tjson[0].invoice_type == 1 ? invoiceinfo = '个人' : tjson[0].invoice_type == 2 ? invoiceinfo = '公司(' + tjson[0].invoice_title + ')' : $('#InvoiceInfoLine').hide();
            tjson[0].invoice_type == 1 || tjson[0].invoice_type == 2 ? $('#InvoiceInfo').html(invoiceinfo) : null;
        }
        var iscomment = 1;
        $.each(eval(tjson[0].pjson), function(pi, pobj){
            pc = parseInt(pc) + parseInt(pobj.amount)
            pobj.comment == 0 ? iscomment = 0 : null;
            h.push('<dt>');
            h.push('<table width="100%" cellpadding="0" cellspacing="0" border="0" class="ord-list">');
            h.push('<tr>');
            h.push('<td class="td-1"><img src="' + pobj.img + '"></td>');
            h.push('<td class="td-2">');
            h.push('<h2>' + pobj.ptitle + '</h2>');
            h.push('<ul>');
            var sjson = eval(pobj.json) || [], slen = sjson.length || 0;
            if (slen > 0) {
                $.each(sjson, function(si, sobj){
                    h.push('<li class="fl-clr">');
                    h.push('<i>' + sobj.title + '：</i>');
                    h.push('<span>' + sobj.content + '</span>');
                    h.push('</li>');
                });
            }
            else 
                if (pobj.type == 5) {
                    h.push('<li class="fl-clr">');
                    h.push('<span>' + pobj.nomal_des + '</span>');
                    h.push('</li>');
                }
            h.push('</ul>');
            h.push('<td class="td-3">');
            _lang=='CN'?h.push('<p><em>￥' + parseFloat(pobj.price).toFixed(2) + '</em>/' + H5Storage.GLV('df5_unit') + '</p>'):h.push('<p><em>￥' + parseFloat(pobj.price).toFixed(2) + '</em></p>');
            h.push('<i>x' + pobj.amount + '</i>');
            h.push('</td>');
            h.push('</tr>');
            h.push('</table>');
            h.push('</dt>');
        });
        $('#product').append(h.join('')).trigger("create");
        
        iscomment == 0 ? tjson[0].orders_status == 4 || tjson[0].orders_status == 3 ? $('#CommentButton').show() : null : null;
        
        $.each(eval(tjson[0].bonus), function(index, obj){
            bh.push('<tr>');
            bh.push('<td class="td-l">' + obj.title + ':</td>');
            bh.push('<td class="td-r">-￥' + parseFloat(Math.abs(obj.amount)).toFixed(2) + '</td>');
            bh.push('</tr>');
        });
        bh.push('<tr>');
        bh.push('<td class="td-l">'+H5Storage.GLV('df10_cut_pay')+'</td>');
        bh.push('<td class="td-r">-￥' + parseFloat(Math.abs(tjson[0].cut_price)).toFixed(2) + '</td>');
        bh.push('</tr>');
        $("#bonus").append(bh.join('')).trigger("create");
		WW.HWD();
    };
    i();
};

OM.ShowFCodeErCode = function(){
    var i = function(){
        $('#FCodeErLine').show();
        $(document).ready(function(){
            var w = $('#ew').val() || $('#FCodeBigImg').width(), h = $('#eh').val() || $('#FCodeBigImg').height(), fcode = $('#fcode').val() || $('#order_code').val();
            $("#FCodeBigArea").html('');
            $("#FCodeBigArea").qrcode({
                text: fcode,
                width: w,
                height: h,
                id: "qrcodeCanvas"
            });
            $('#ew').val(w);
            $('#eh').val(h);
        });
    }();
};

OM.GetOrderFlowList = function(id){
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_flow_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "orderid": id,
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
        var json = eval(data) || [], tjson = json[0].D || [], djson = tjson[0].detail || [], len = djson.length || 0, h = [], p_date = [];
        $('#FlowInfoTitle').html(tjson[0].flow_title + ':' + tjson[0].flow_num);
        djson = djson.sortObjectWith('time', 'asc', function(time){
            return time;
        });
        $.each(djson, function(index, obj){
            if ($.inArray(DateTimeFormat.FullEnDate(obj.time), p_date) < 0) {
                if (index != 0) {
                    h.push('<span class="total-p"></span>');
                    h.push('</dl>');
                }
                h.push('<dl id="' + DateTimeFormat.FullEnDate(obj.time) + '">');
                h.push('<dt>' + DateTimeFormat.FullEnDate(obj.time) + ' ' + DateTimeFormat.GetWeekCnTitle(obj.time) + '</dt>');
                p_date.push(DateTimeFormat.FullEnDate(obj.time));
            }
            h.push('<dd>' + DateTimeFormat.FullEnTime(obj.time) + obj.context + '</dd>');
            if (index == len) {
                h.push('<span class="total-p"></span>');
                h.push('</dl>');
            }
        });
        
        $('#myFlowDetail').html(h.join(''));
    };
    i();
};

OM.GetOrderStatusHtml = function(status, sendmode,flow_status){
    //1等待付款 2等待发货 3 已完成 4 已完成（15天以上） 5 已关闭
    if (status == '1') {
        return H5Storage.GLV('df_wite_pay');
    }
    if (status == '2') {
        if (sendmode == '2') {
			flow_status==1?desc=H5Storage.GLV('df22_producing'):flow_status==2?desc=H5Storage.GLV('df22_order_ready'):desc=H5Storage.GLV('df_wite_self');
            return desc;
        }
        else {
			flow_status==1?desc=H5Storage.GLV('df22_producing'):flow_status==2?desc=H5Storage.GLV('df22_out_delivery'):desc=H5Storage.GLV('df_wite_get');
            return desc;
			//return H5Storage.GLV('df_wite_get');
        }
    }
    if (status == '3') {
        return H5Storage.GLV('df_isok');
    }
    if (status == '4') {
        return H5Storage.GLV('df_isok');
    }
    if (status == '5') {
        return H5Storage.GLV('df_iscolse');
    }
};

OM.RenderOrderList = function(data, t){
    var r = function(){
        var json = eval(data) || [], ojson = eval(json[0].D) || [], len = ojson.length || 0, h = [], Total = 0;
        if ((len <= 0 && H5Storage.GLV('order_new_page') == 1) || (len <= 0 && t == 1)) {
            $('#myNoDataShowArea').show();
            $('#myOrdersList,#loading,#nomoreresults').hide();
            t == 1 ? $('#myNoDataContent').html(H5Storage.GLV('non_order')) : null;
        }
        else {
            $.each(ojson, function(index, obj){
                Total++;
                h.push('<div class="tecent-order-mod">');
                h.push('<div class="det-dius-bd">');
                h.push('<ul class="fl-clr">');
                var pagename = 'df23.html';
                t == 1 ? h.push('<li class="tec-tit" onclick="H5Method.JUMPUrl(\'/' + pagename + '?search=1&pointid=' + obj.orders_id + '\')">') : h.push('<li class="tec-tit" onclick="H5Method.JUMPUrl(\'/' + pagename + '?pointid=' + obj.orders_id + '\')">');
                h.push('<p>'+H5Storage.GLV('order_code')+'<i>' + obj.code_num + '</i></p>');
                h.push('<p>'+H5Storage.GLV('order_state')+'<span class="mark-bl" id="OrderStatusHtmlLine_' + obj.orders_id + '">' + OM.GetOrderStatusHtml(obj.orders_status, obj.sendmole, obj.flow_status) + '</span></p>');
                h.push('</li>');
                h.push('<li class="tec-order">');
                h.push('<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tb-list">');
                var pc = 0, iscomment = 1;
                $.each(eval(obj.pjson), function(pi, pobj){
                    pc = parseInt(pc) + parseInt(pobj.amount)
                    pobj.comment == 0 ? iscomment = 0 : null;
                    h.push('<tr>');
                    h.push('<td class="td-1"><span>' + pobj.title + '</span><i>X' + pobj.amount + '</i></td>');
                    h.push('<td class="td-2 mark-bl">￥' + parseFloat(pobj.price).toFixed(2) + '</td>');
                    h.push('</tr>');
                });
                h.push('</table>');
                h.push('<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tb-list tb-list-2">');
                h.push('<tbody><tr>');
                h.push('<td class="td-1 mark-bl">'+H5Storage.GLV('amount1').replace('%d',pc)+'</td>');
                h.push('<td class="td-2">'+H5Storage.GLV('paid')+'<em class="mark-bl">￥' + parseFloat(obj.orders_price).toFixed(2) + '</em></td>');
                h.push('</tr>');
                h.push('</tbody></table>');
                h.push('</li>');
                h.push('<li class="tec-btn fl-clr" id="OrderButtonLine_' + obj.orders_id + '">');
                //obj.orders_status == 2 ? t == 1 ? h.push('<div class="order-btn-l bt-btn" onclick="H5Method.JUMPUrl(\'\/df26.html?search=1&come=list&pointid=' + obj.orders_id + '\');">查看物流</div>') : h.push('<div class="order-btn-l bt-btn" onclick="H5Method.JUMPUrl(\'\/df26.html?come=list&pointid=' + obj.orders_id + '\');">查看物流</div>') : null;
                obj.orders_status == 2 &&obj.flow_status == 2 && obj.sendmole != 2 ? h.push('<div class="order-btn-l fl-right" id="ReceivingButton_' + obj.orders_id + '" onclick="OM.ConfirmReceiving(\'' + obj.orders_id + '\',\'' + obj.code_num + '\');">'+H5Storage.GLV('df_ensure_get')+'</div>') : null;
                
                obj.orders_status == 4||obj.orders_status == 3? h.push('<div class="order-btn-l fl-right" id="RepeatOrderButton_' + obj.orders_id + '" onclick="OM.RepeatOrder(\'' + obj.orders_id + '\');">'+H5Storage.GLV('repeat_order_button')+'</div>') : null;
				
                obj.orders_status == 1 ? h.push('<div class="order-btn-l" id="PayButton_' + obj.orders_id + '" onclick="OM.ConfirmPay(\'' + obj.orders_id + '\',\'' + obj.code_num + '\',\'' + obj.pay_type + '\');">'+H5Storage.GLV('df_ensure_pay')+'</div>') : null;
                obj.orders_status == 1 ? h.push('<div class="order-btn-r" id="CancelButton_' + obj.orders_id + '" onclick="OM.ConfirmCancel(\'' + obj.orders_id + '\',\'' + obj.code_num + '\');">'+H5Storage.GLV('df_iscancle')+'</div>') : null;
                
                // obj.orders_status == 4 || obj.orders_status == 7 ? t == 1 ? h.push('<div class="order-btn-l bt-btn" onclick="H5Method.JUMPUrl(\'\/df25.html?f=list&search=1&pointid=' + obj.orders_id + '\');">申请退货</div>') : h.push('<div class="order-btn-l bt-btn" onclick="H5Method.JUMPUrl(\'\/df25.html?f=list&pointid=' + obj.orders_id + '\');">申请退货</div>') : null;
                iscomment == 0 ? obj.orders_status == 3 || obj.orders_status == 4 ? t == 1 ? h.push('<div class="order-btn-l btn-l2 fl-right" onclick="H5Method.JUMPUrl(\'\/df9-0.html?f=list&search=1&pointid=' + obj.orders_id + '\');">'+H5Storage.GLV('df_comment')+'</div>') : h.push('<div class="order-btn-l btn-l2 fl-right" onclick="H5Method.JUMPUrl(\'\/df9-0.html?f=list&pointid=' + obj.orders_id + '\');">'+H5Storage.GLV('df_comment')+'</div>') : null : null;
                
                h.push('</li>');
                h.push('</ul>');
                h.push('</div>');
                h.push('</div>');
            });
            if (OM.START == 0) {
                $("#myOrdersList").html('');
                $("#myOrdersList").html(h.join(''));
            }
            else {
                $("#myOrdersList").append(h.join('')).trigger("create");
            }
            H5Storage.SLV('order_new_page', 2);
            OM.RCount = Total;
            $('#myNoDataShowArea').hide();
            $('#myOrdersList').show();
            t != 1 && Total > 0 ? $('#myOrdersList').attr('scrollPagination', 'enabled') : null;
        }
    }();
};

OM.RepeatOrder=function(id){
	var i = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_inventory_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "orderid": id,
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
        else {
            alert(json[0].M);
        }
    };
    i();	
};

OM.ConfirmReceiving = function(id, num){
    var i = function(){
        if (confirm(H5Storage.GLV('receive_shipment').replace('%s',num), "", "OM.ConfirmReceivingDoY('" + id + "')")) {
        }
    }();
};

OM.ConfirmReceivingDoY = function(id){
    var i = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_confirm';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "orderid": id,
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
        var json = eval(data) || [], h = [];
        if (json[0].C == 0) {
            $('#ReceivingButton,#ReceivingButton_' + id).hide();
            $('#CommentButton').show();
			h.push('<div class="order-btn-l fl-right" id="RepeatOrderButton_' + id + '" onclick="OM.RepeatOrder(\'' + id + '\');">'+H5Storage.GLV('repeat_order_button')+'</div>');
            H5Method.GUV('search') == 1 ? h.push('<div class="order-btn-l btn-l2 fl-right" onclick="H5Method.JUMPUrl(\'\/df9-0.html?f=list&search=1&pointid=' + id + '\');">'+H5Storage.GLV('df_comment')+'</div>') : h.push('<div class="order-btn-l btn-l2 fl-right" onclick="H5Method.JUMPUrl(\'\/df9-0.html?f=list&pointid=' + id + '\');">'+H5Storage.GLV('df_comment')+'</div>');
			
            $('#OrderButtonLine_' + id).html(h.join(''));
            $('#StatusDesc,#OrderStatusHtmlLine_' + id).html(OM.GetOrderStatusHtml(4));
            $('#completedate1').html(new Date().format("yyyy-MM-dd hh:mm:ss"));
            $('#completedate2').html(new Date().format("yyyy-MM-dd hh:mm:ss"));
            $('#sendmole').val() == 2 ? $('#completedate_2').show() : $('#completedate_1').show();
        }
        else {
            alert(json[0].M);
        }
    };
    i();
};

OM.ConfirmCancel = function(id, num){
    var i = function(){
        if (confirm(H5Storage.GLV('order_cancel').replace(/\\n/gm, "<br>").replace('%s',num), "", "OM.ConfirmCancelDoY('" + id + "')")) {
        }
    }();
};

OM.ConfirmCancelDoY = function(id){
    var i = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_cancel';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "orderid": id,
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
            $('#CancelButton,#PayButton,#CancelButton_' + id + ',#PayButton_' + id).hide();
            $('#StatusDesc,#OrderStatusHtmlLine_' + id).html(OM.GetOrderStatusHtml(5));
        }
        else {
            alert(json[0].M);
        }
    };
    i();
};

OM.ConfirmPay = function(id, num, paytype){
    H5Storage.SLV('new_order_id', id);
    H5Storage.SLV('new_order_code', num);
    H5Storage.SLV('order_pay_type', paytype);
    var i = function(){
        if (H5Storage.GLV('order_pay_type') == 1) {
            CART.WeiXinPayNewOrdersDo();
        }
        else 
            if (H5Storage.GLV('order_pay_type') == 2) {
                CART.AliPayPayNewOrdersDo();
            }
    };
    i();
};


OM.ConfirmOrderReturnDo = function(){
    var c = function(){
        if ($.trim($('#refuned_type').val()) == '') {
            alert("请选择退货理由。", "$('#ReturnReasonSelectLayer').show();");
            return false;
        }
        if ($.trim($('#refuned_productid').val()) == '') {
            alert("请选择退货商品。");
            return false;
        }
        if ($.trim($('#refuned_content').val()) == '') {
            alert("请输入退货说明。", "$('#refuned_content').focus();");
            return false;
        }
        s();
    };
    var s = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_return';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "refuned_images1": $('#refuned_images1').val(),
            "refuned_images2": $('#refuned_images2').val(),
            "refuned_images3": $('#refuned_images3').val(),
            "orders_id": $('#orders_id').val(),
            "refuned_type": $('#refuned_type').val(),
            "refuned_productid": $('#refuned_productid').val(),
            "refuned_content": $('#refuned_content').val(),
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
            contentType: 'multipart/form-data',
            beforeSend: function(x){
                if (x && x.overrideMimeType) {
                    x.overrideMimeType("multipart/form-data");
                }
            },
            mimeType: 'multipart/form-data',
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
            alert('您的退/换货申请已成功提交，请等待客服审核。', " H5Method.JUMPUrl('/df22.html');");
        }
        else {
            alert(json[0].M);
        }
    };
    c();
};

OM.GetOrderReturnReasonList = function(){
    var i = function(){
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_return_reason_get';
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
        var json = eval(data) || [], tjson = json[0].D || [], len = tjson.length || 0, h = [];
        $.each(tjson, function(index, obj){
            h.push('<li onClick="OM.SetOrderReturnReasonDo(\'' + obj.id + '\',\'' + obj.title + '\')">');
            h.push(obj.title);
            h.push('</li>');
        });
        $('#ReturnReasonListLayer').html(h.join(''));
    };
    i();
};

OM.SetOrderReturnReasonDo = function(id, title){
    var i = function(){
        $('#ReturnSelect').html(title);
        $('#refuned_type').val(id);
        $('#ReturnReasonSelectLayer').hide();
    }();
};



OM.GetOrdersProdudtListForApplyReturns = function(id){
    var i = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_info_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "orderid": H5Method.GUV('pointid'),
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [], pjson = eval(tjson[0].pjson) || [], plen = pjson.length, h = [];
        if (plen > 0) {
            $('#orders_id').val(H5Method.GUV('pointid'));
            $.each(pjson, function(index, obj){
                h.push('<tr onclick="OM.SetOrdersProdudtListForApplyReturns(\'' + obj.pid + '\');" id="ProductLine_' + obj.pid + '">');
                h.push('<input type="hidden" class="cssLine" guid="' + obj.pid + '" goodscount="' + obj.amount + '" name="myProdudtStatus_' + obj.pid + '" id="myProdudtStatus_' + obj.pid + '" value="0">');
                h.push('<td class="td-1">' + obj.title + '</td>');
                h.push('<td class="td-2">X' + obj.amount + '</td>');
                h.push('<td class="td-3">￥' + parseFloat(obj.price).toFixed(2) + '</td>');
                h.push('</tr>');
            });
            $('#myProdutList').html(h.join(''));
            WW.HWD();
        }
        else {
            WW.HWD();
            alert("请求错误，请刷新后重试。", "$('#BackIcon').click();");
        }
    };
    i();
};

OM.SetOrdersProdudtListForApplyReturns = function(id){
    var i = function(){
        $('#myProdudtStatus_' + id).val() == 0 ? $('#myProdudtStatus_' + id).val(1) : $('#myProdudtStatus_' + id).val(0);
        $('#myProdudtStatus_' + id).val() == 1 ? $('#ProductLine_' + id).addClass('on') : $('#ProductLine_' + id).removeClass('on');
        OM.PushProdudtArray();
    }();
};

OM.PushProdudtArray = function(){
    var i = function(){
        var pid = [], pcount = [];
        $('.cssLine').each(function(index, obj){
            if ($(this).val() == 1) {
                pid.push($(this).attr('guid'));
                pcount.push($(this).attr('goodscount'));
            }
        });
        $('#refuned_productid').val(pid.join(','));
        $('#refuned_product_count').val(pcount.join(','));
    }();
};

OM.DelUpile = function(t){
    var i = function(){
        $('#refuned_images' + t).val('');
        $("#list" + t + "").html('<img src="/images/g25-file.png" onClick="OM.UpfileShow(\'' + t + '\');">');
        $("#DelFile" + t).hide();
    }();
};

OM.UpfileShow = function(t){
    var i = function(){
        $('#refuned_images' + t).click();
    }();
};

OM.GetOrdersProdudtListComment = function(id){
    var i = function(){
        WW.SWD(H5Storage.GLV('loading'));
        var token = H5Storage.GLV('token_value'), _timestamp = new Date().format("yyyy-MM-dd hh:mm:ss"), _action = 'order_info_get';
        var signstr = _action + token + _timestamp + _appid + _appkey;
        var UData = {
            "orderid": H5Method.GUV('pointid'),
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
        var json = eval(data) || [], tjson = eval(json[0].D) || [], pjson = eval(tjson[0].pjson) || [], plen = pjson.length, h = [], nc = 0;
        if (plen > 0) {
            $.each(pjson, function(index, obj){
                if (obj.comment == 0) {
                    nc++;
                    h.push('<dl class="fl-clr">');
                    h.push('<dt>');
                    h.push('<img src="' + obj.img + '">');
                    h.push('</dt>');
                    h.push('<dd><h3>' + obj.ptitle + '</h3><p><i>￥' + parseFloat(obj.price).toFixed(2) + '</i>/' + H5Storage.GLV('df5_unit') + '</p></dd>');
                    h.push('<dd class="pj-btn" onclick="H5Method.JUMPUrl(\'/df9-4.html?orderid=' + H5Method.GUV('pointid') + '&pointid=' + obj.pid + '\');">'+H5Storage.GLV('df_comment')+'</dd>');
                    h.push('</dl>');
                }
            });
            if (nc == 0) {
                $('#BackIcon').click();
            }
            $('#myProdutList').html(h.join(''));
            WW.HWD();
        }
        else {
            WW.HWD();
            alert("请求错误，请刷新后重试。", "$('#BackIcon').click();");
        }
    };
    i();
};

OM.GetProductCommentTip = function(){
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
    };
    i();
};
