<?php /* Smarty version Smarty-3.1.6, created on 2016-10-28 14:44:53
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/recharge.html" */ ?>
<?php /*%%SmartyHeaderCode:177170809157d0ce4a7429b3-49410242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '851a8f74deadbf10ca4e2ce759f33513afd6c98b' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/recharge.html',
      1 => 1477636588,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177170809157d0ce4a7429b3-49410242',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57d0ce4a79642',
  'variables' => 
  array (
    'version' => 0,
    'user_id' => 0,
    'wx_share_link' => 0,
    'share_info' => 0,
    'head_title' => 0,
    'signPackage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d0ce4a79642')) {function content_57d0ce4a79642($_smarty_tpl) {?><!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no" />
<meta name="format-detection" content="email=no" />
<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/base.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/mall_icon.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
<?php if (@ACTION_NAME!='draw_prize_record'&&@ACTION_NAME!='award_record_by_prize'&&@ACTION_NAME!='my_roll'&&@ACTION_NAME!='my_qr_code'&&@ACTION_NAME!='my_recharge_back'){?>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/global.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/gy_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<?php }?>

		<style type="text/css">
		body{
			background:#E8E8E8;
		}
		.reg_hint{
			top:12rem;
		}
		</style>

<!-- 失败默认图片 -->
<script>
  function no_pic(obj) {
    obj.setAttribute("src", "/Public/Images/front/nopicture.png");
}
</script>
</head>
<body>
	
		<form action="" method="POST" id="form1">
            <h1 class="pay_head">鱼翅余额：<?php echo intval($_smarty_tpl->tpl_vars['user_info']->value['left_money']);?>
</h1>
		<div class="pay_cont clearfix">
			<div class="pay_cont_box mr_26 fl active" href="javascript:;"><span>10</span>元</div>
			<div class="pay_cont_box mr_26 fl" href="javascript:;" ><span>20</span>元</div>
			<div class="pay_cont_box fl" href="javascript:;"><span>50</span>元</div>
			<div class="pay_cont_box mr_26 fl" href="javascript:;"><span>100</span>元</div>
			<div class="pay_cont_box mr_26 fl" href="javascript:;"><span>200</span>元</div>
			<input class="fl" type="number" placeholder="其他金额" id="pay_own" />
		</div>
		<div class="pay_cont2">
			<h1 class="clearfix">鱼翅数：<span class="fr">1000</span></h1>
			<br>
			<div class="pay_bg"></div>
			<!-- 背景线 -->
		</div>
		<input class="pay_btn" value="立即充值" type="button"/>
		<div class="pay_footer">	
		</div>
		<div class="reg_hint clearfix">
			<i class="icon2 fl szzhuyi"></i>
			<p>请填写大于<?php echo intval($_smarty_tpl->tpl_vars['system_config']->value['LIMIT_RECHARGE_MONEY']);?>
的整数</p>
		</div>
		<!-- 底部背景图 -->
        <input type="hidden" name="recharge_money" value="" id="recharge_money"/>
        <input type="hidden" name="total_money" value="" id="total_money"/>
        <input type="hidden" name="recharge_type" value="" id="recharge_type"/>
        <input type="hidden" name="act" value="pay"/>
        <div class="pay_main_box">
	       	<div class="guess_shade" style="display:block"></div>
	       	<div class="pay_layer">
	       		<div class="pay_layer_head">选择支付方式</div>
                <?php if ($_smarty_tpl->tpl_vars['test_user_id']->value==39628||$_smarty_tpl->tpl_vars['test_user_id']->value==43123){?>
	      		<a class="pay_wx clearfix wxpay"  href="javascript:;">
	      			<i class="icon_wx fl"></i>
	      			<div class="zf_box fl">
	      				<h1>微信支付</h1>
                        <h2>1元=<?php echo $_smarty_tpl->tpl_vars['system_config']->value['RMB_EXCHANGE_PROP_WXPAY'];?>
鱼翅</h2>
	      			</div>
	      		</a>
                <?php }?>
	      		<a class="pay_zfb clearfix active alipay"  href="javascript:;">
	      			<i class="icon_zfb fl"></i>
	      			<div class="zf_box fl">
	      				<h1>支付宝支付</h1>
                        <h2>1元=<?php echo $_smarty_tpl->tpl_vars['system_config']->value['RMB_EXCHANGE_PROP_ALIPAY'];?>
鱼翅（额外赠送<?php echo $_smarty_tpl->tpl_vars['system_config']->value['RMB_EXCHANGE_PROP_ALIPAY']-$_smarty_tpl->tpl_vars['system_config']->value['RMB_EXCHANGE_PROP_WXPAY'];?>
%）</h2>
	      			</div>
	      		</a>		
	       	</div>
	       	<div class="icon_guanbi"></div>
       	</div>
		</form>

	 <div class="refresh">
    	<img src="/Public/Images/front/front_img/icon_shuaxin.png" />
    </div>
	<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<script>
		//var user_id = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		////分享信息
		//var link = '<?php echo $_smarty_tpl->tpl_vars['wx_share_link']->value;?>
';
		//var img = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['pic'];?>
';
		//var title = '<?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
';
		//var desc = '<?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
';
		//var appId = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
';
		//var timestamp = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
';
		//var nonceStr = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
';
		//var signature = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
';
	</script>
	<!--JS-->
    <script type="text/javascript" src="__JS__/front/front_js/jquery-3.0.0.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <?php if (@ACTION_NAME!='my_roll'&&@ACTION_NAME!='my_exchange'){?>
    <script type="text/javascript" src="__JS__/front/front_js/layer.m.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <?php }?>
    <script type="text/javascript">
    

    	$(".refresh").on("click",function(){
			location.reload()
		})
    
    </script>
    <script type="text/javascript" src="__JS__/front/front_js/common.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <!--<script src="__PUBLIC__/Js/front/jquery-1.8.2.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/html5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/wxapi.js"></script>-->
	<!--end js-->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
		<script>
var RMB_EXCHANGE_PROP = <?php echo $_smarty_tpl->tpl_vars['RMB_EXCHANGE_PROP']->value;?>
;
var RMB_EXCHANGE_PROP_WXPAY = <?php echo $_smarty_tpl->tpl_vars['system_config']->value['RMB_EXCHANGE_PROP_WXPAY'];?>
;
var RMB_EXCHANGE_PROP_ALIPAY = <?php echo $_smarty_tpl->tpl_vars['system_config']->value['RMB_EXCHANGE_PROP_ALIPAY'];?>
;
var limit_recharge_money = parseFloat(<?php echo $_smarty_tpl->tpl_vars['system_config']->value['LIMIT_RECHARGE_MONEY'];?>
);
var parameters = '';


			$(function(){
				$(".icon_guanbi").on("click",function(){
					$(".pay_main_box").hide();
				})
				$(".pay_layer a").on("click",function(){
					$(this).addClass("active").siblings().removeClass("active")
				})
			})


			$(function()
			{
				$(".footer_box").on("click",function()
				{
					$(this).addClass("footer_active").siblings().removeClass("footer_active");
				});
			});
			$(function(){
                var money = 10;
				var pay_val = money * RMB_EXCHANGE_PROP;
				var reg=/^(-)?\d+$/
				$(".pay_cont_box").on("click",function(){
					$(this).addClass("active").siblings().removeClass("active");
                    money = Number($(".pay_cont .active").find("span").html());
					pay_val = money*RMB_EXCHANGE_PROP;
					$(".pay_cont2 h1").find("span").html(pay_val);
				})
				$("#pay_own").focus(function(){
                    money = 0;
					$(".pay_cont2 h1").find("span").html(0);
					$(".pay_cont_box").removeClass("active");
				})
				// 验证输入值是否是整数
				$("#pay_own").keyup(function(){
					var this_val =$("#pay_own").val();
                    money = Number($(this).val());
					pay_val = money*RMB_EXCHANGE_PROP;
					$(".pay_cont2 h1").find("span").html(pay_val);
                    if(reg.test(this_val) && money>=limit_recharge_money){
						
					}else{
						$(".reg_hint").show();
						    setTimeout(function () {
					        $(".reg_hint").hide();
					    }, 2000);
					}
				})
				$(".pay_btn").on("click",function(){
					$(".pay_main_box").show();//跳出弹框  
                });

				//支付宝
				$(".alipay").on("click",function(){
                    submit_check_data(); //验证数据
                    $("#form1").submit()
				})

                //微信提交
                $(".wxpay").on('click', function(){
                    submit_check_data();
                    var wx_data = $("#form1").serialize();
                    console.log(wx_data);
                    $.ajax({
                        url:"/FrontUser/ajax_wx_pay_data",
                        type:"POST",
                        dataType:"json",
                        data:wx_data,
                        timeout:10000,
                        success:function(d){
                            if(d) {				
                                if (d.code == 600) {
                                    parameters = d.data;
                                    callpay();
                                } else {
                                    alert_message(d,1);
                                }
                            } else {
                                alert_message('出错了，请刷新重试', 1);
                            }
                        }
                    });
                });

                //调用微信JS api 支付
                function jsApiCall()
                {
		    parameters = JSON.parse(parameters);
                    WeixinJSBridge.invoke(
                            'getBrandWCPayRequest',
                            parameters,
                            function(res)
                            {
                                if(res.err_msg == "get_brand_wcpay_request:ok" )
                                {
                                    //支付成功
                                    location.href = '/FrontUser/account_list';
                                }
                                else
                                {
					alert_message('支付失败', 1);
                                    //WeixinJSBridge.log(res.err_msg);
                                    //alert(res.err_code);
                                    //alert(res.err_desc);
                                    //alert(res.err_msg);
                                }
                            }
                            );
                }

                function callpay()
                {
                    if (typeof WeixinJSBridge == "undefined"){
                        if( document.addEventListener ){
                            document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                        }else if (document.attachEvent){
                            document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                            document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                        }
                    }else{
                        jsApiCall();
                    }
                }

                function submit_check_data()
                {
                    var bet_val= money;
                    var pay_val = bet_val * RMB_EXCHANGE_PROP_ALIPAY; //重新计算总鱼翅数
                    $("#recharge_money").val(money);
                    $("#total_money").val(pay_val);

                    // 判断是否自己输入
                    if($(".pay_cont_box").is(".active")){
                        $("#recharge_type").val(1);
                    }else{
                        if(reg.test(bet_val) && bet_val>=limit_recharge_money){
                            $("#recharge_type").val(2);
                        }else{
                            $(".reg_hint").show();
                            setTimeout(function () {
                                $(".reg_hint").hide();
                            }, 2000);
                            return false;
                        }
                    }	
                }
            })
        </script>
        
</body>
</html>
 
<?php }} ?>