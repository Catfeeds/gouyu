//提示方法
function alert_message(message, load, redirect_url) {
    var layers = layer.open({
        content: message,
    });
    if (redirect_url) {
        setTimeout("window.location.href='"+redirect_url+"'", 1000);
    } else {
        if (load) {
            setTimeout("window.location.reload()", 1000);
        } else {
            setTimeout(function(){layer.close(layers);}, 1000);
        }
    }
}

function redirect(url)
{
    window.location.href=url;
}

//异步提交方法
//address 要提交的地址
//datas 数据
//redirect_url 成功后的跳转
//success_alert 成功后的提示信息
function ajax_submit(address, datas, redirect_url, success_alert)
{
	$.ajax({
		url:address,
		type:"POST",
		data:datas,
		timeout:10000,
		success:function(d){
            if (d == 'success') {
                if (success_alert) {
                    alert_message(success_alert);
                }
                if (redirect_url) {
                    setTimeout(function(){redirect(redirect_url)}, 1000);
                }
            } else {
                alert_message(d);
            }
        }
    });
}


$("#province_id").on("change", function(){
    var province_id = $(this).val();
    var $city = $(this).siblings('#city_id');
    var $area = $(this).siblings('#area_id');

    if (!province_id) {
        $city.empty();
        $city.append('<option value="">市</option>');

        $area.empty();
        $area.append('<option value="">区</option>');
        return;
    }

    $.ajax({
        type: "POST", //用POST方式传输
        url: "/FrontAddress/get_city_list",
        data: "province_id=" +province_id,
        dataType:"json",
        error: function (XMLHttpRequest, textStatus, errorThrown) { },
        success: function (d){
            //console.log(d);
            if(d != 'failure') 
            {
                var len = d.length;
                console.log(len);
                var i=0;
                var html = '<option value="">市</option>';
                for(i=0; i< len; i++){
                    html+= '<option value="'+d[i].city_id+'">'+d[i].city_name+'</option>';
                }
                $city.empty();
                $city.append(html);
                $area.empty();
                $area.append('<option value="">区</option>');
            }
            else
            {
                alert_message('网络故障');
                return false;
            }
        }
    });
});

$("#city_id").on("change", function(){
    var city_id = $(this).val();
    var $area = $(this).siblings('#area_id');
    if (!city_id) {
        $area.empty();
        $area.append('<option value="">区</option>');
        return;
    }

    $.ajax({
        type: "POST", //用POST方式传输
        url: "/FrontAddress/get_area_list",
        data: "city_id=" +city_id,
        dataType:"json",
        error: function (XMLHttpRequest, textStatus, errorThrown) { },
        success: function (d){
            //console.log(d);
            if(d != 'failure') 
            {
                var len = d.length;
                console.log(len);
                var i=0;
                var html = '<option value="">区</option>';
                for(i=0; i< len; i++){
                    html+= '<option value="'+d[i].area_id+'">'+d[i].area_name+'</option>';
                }
                $area.empty();
                $area.append(html);
            }
            else
            {
                alert_message('网络故障');
                return false;
            }
        }
    });
});

