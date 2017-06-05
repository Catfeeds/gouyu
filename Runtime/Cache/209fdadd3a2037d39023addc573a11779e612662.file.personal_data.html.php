<?php /* Smarty version Smarty-3.1.6, created on 2016-10-28 14:42:09
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/personal_data.html" */ ?>
<?php /*%%SmartyHeaderCode:208995705857be499b492ca2-25965366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '209fdadd3a2037d39023addc573a11779e612662' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/personal_data.html',
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
  'nocache_hash' => '208995705857be499b492ca2-25965366',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57be499b59036',
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
<?php if ($_valid && !is_callable('content_57be499b59036')) {function content_57be499b59036($_smarty_tpl) {?><!doctype html>
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
.guess_info_head{
    position: fixed;
    width:94%;
}
body{
    background:#202020;
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
	
	<div class="use_cent_head">
        <?php if (!$_smarty_tpl->tpl_vars['user_info']->value['mobile']||!$_smarty_tpl->tpl_vars['user_info']->value['email']){?>
		<div class="guess_info_head clearfix" >
			<h1 class="fl" <?php if (!$_smarty_tpl->tpl_vars['user_info']->value['mobile']){?>onclick="redirect('/FrontUser/bind_mobile')"<?php }else{ ?>onclick="redirect('/FrontUser/bind_email')"<?php }?>> 点击绑定手机号和邮箱，提升安全等级，防止帐号被盗</h1>
			<i class="fr icon2 tsclose"></i>
		</div>
        <?php }?>
		<div class="use_head_box">
            <img data-original="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="use_tx lazy"/>
            <h1><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_info']->value['nickname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user_info']->value['username'] : $tmp);?>
</h1>
            <h2>ID号:<?php echo $_smarty_tpl->tpl_vars['user_info']->value['id'];?>
</h2>
            <h3>鱼翅余额：<span><?php echo $_smarty_tpl->tpl_vars['user_info']->value['left_money'];?>
</span></h3>
			<input class="use_pay" type="button" value="鱼翅充值"  id="check_close"/>
		</div>
	</div>
	<div class="use_cont">
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['account_list_link']->value;?>
">
			<i class="icon2 fl money"></i>
			<h1 class="fl">鱼翅明细</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix mb_10" href="<?php if ($_smarty_tpl->tpl_vars['is_open_back']->value){?><?php echo $_smarty_tpl->tpl_vars['my_qr_code_link']->value;?>
<?php }else{ ?>javascript:alert_message('<?php echo $_smarty_tpl->tpl_vars['close_recharge_back_alert']->value;?>
');<?php }?>">
			<i class="fl icon_ercode"></i>
			<h1 class="fl">我的推广二维码</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['my_exchange_link']->value;?>
">
			<i class="icon2 fl orderform"></i>
			<h1 class="fl">鱼翅兑换记录</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['my_guess_link']->value;?>
">
			<i class="icon2 fl his"></i>
			<h1 class="fl">竞猜历史记录</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <?php if (!$_smarty_tpl->tpl_vars['close_treasure_info']->value){?>
		 <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['my_treasure_link']->value;?>
">
			<i class="fl icon_dbjl"></i>
			<h1 class="fl">夺宝记录</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <?php }?>
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['my_roll_link']->value;?>
">
			<i class="icon2 fl rollhis"></i>
			<h1 class="fl">roll记录</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['my_recharge_back_link']->value;?>
">
			<i class="fl icon_tghl"></i>
			<h1 class="fl">推广收益</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
		<a class="cont_box clearfix" href="javascript:alert_message('正在开发中');">
			<i class="fl icon_bag"></i>
			<h1 class="fl">物品背包</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['user_game_list_link']->value;?>
">
			<i class="icon2 fl game"></i>
			<h1 class="fl">游戏信息管理</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix mb_10" href="<?php echo $_smarty_tpl->tpl_vars['user_address_list_link']->value;?>
">
			<i class="icon2 fl address"></i>
			<h1 class="fl">收货地址</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['help_center_link']->value;?>
">
			<i class="icon2 fl help"></i>
			<h1 class="fl">帮助中心</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['about_us_link']->value;?>
">
			<i class="icon2 fl me"></i>
			<h1 class="fl">关于我们</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
        <a class="cont_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['setup_link']->value;?>
">
			<i class="icon2 fl set"></i>
			<h1 class="fl">设置</h1>
			<i class="fr grjiantouleft icon2"></i>
		</a>
	</div>
    
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
	
    <script type="text/javascript" src="__JS__/front/front_js/jquery.lazyload.js"></script>
	<script type="text/javascript" src="__JS__/front/front_js/lazyload_tx.js"></script>
    <script>
$(".guess_info_head .tsclose").on("click",function(){
    $(this).parent().hide(100);
})

var mobile = '<?php echo $_smarty_tpl->tpl_vars['user_info']->value['mobile'];?>
';
var email = '<?php echo $_smarty_tpl->tpl_vars['user_info']->value['email'];?>
';
if (!mobile || !email) {
    if (!mobile) {
        var url = '/FrontUser/bind_mobile';
    } else {
        var url = '/FrontUser/bind_email';
    }
    layer.open({
        content:'请绑定手机号和邮箱，防止账号被盗!',
        btn:['去绑定', '我知道了'],
        yes:function(index){
            window.location.href=url;
        },
        no:function(index){
            return;
        }
    });
}

var is_open = parseInt('<?php echo $_smarty_tpl->tpl_vars['is_open']->value;?>
');
var close_message = '<?php echo $_smarty_tpl->tpl_vars['system_config']->value['CLOSE_RECHARGE_ALERT'];?>
';
$("#check_close").on('click', function(){
    if (is_open) {
        redirect('/FrontUser/recharge/');  
    } else {
        alert_message(close_message);
        return;
    }
})
		$(".guess_info_head .tsclose").on("click",function(){
		$(this).parent().hide(100);
		})
		setTimeout(function () {
		$(".guess_info_head").hide(100);
		}, 3000);
		</script>
    
</body>
</html>
 
<?php }} ?>