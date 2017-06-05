<?php /* Smarty version Smarty-3.1.6, created on 2016-09-18 15:05:19
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/exchange_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:13134552657c64bfe1fc877-70281371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29526664a26e1f879939a2658ec3ef06c46ca6ea' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/exchange_detail.html',
      1 => 1473251508,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1473755677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13134552657c64bfe1fc877-70281371',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c64bfe276f4',
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
<?php if ($_valid && !is_callable('content_57c64bfe276f4')) {function content_57c64bfe276f4($_smarty_tpl) {?><!doctype html>
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
<?php if (@ACTION_NAME!='draw_prize_record'&&@ACTION_NAME!='award_record_by_prize'&&@ACTION_NAME!='my_roll'){?>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/global.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/gy_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<?php }?>

<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/mall_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
	<style>
		body{
			padding-top: 0px;
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
	
	<!--顶部细线-->
		<div class="lottery_line_grey"></div>
		<div class="lottery_line_black"></div>
	<!--内容-->
		<div class="entity_main">
			<div class="entity_top clearfix">
                <img src="<?php echo $_smarty_tpl->tpl_vars['item_info']->value['small_pic'];?>
" class="fl" />
				<ul class="fl">
					<li class="clearfix">
						<p class="fl">兑换商品:</p>
                        <span class="fl"><?php echo $_smarty_tpl->tpl_vars['item_info']->value['item_name'];?>
</span>
					</li>
					<li class="clearfix">
						<p class="fl">消费鱼翅:</p>
                        <span class="fl"><?php echo $_smarty_tpl->tpl_vars['item_info']->value['real_price'];?>
</span>
                        <i class="fl"><?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</i>
					</li>
				</ul>
			</div>
			<ul>
				<li class="clearfix">
					<p class="fl">用户名:</p>
                    <span class="fl"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_info']->value['nickname'])===null||$tmp==='' ? '--' : $tmp);?>
</span>
				</li>
                <?php if ($_smarty_tpl->tpl_vars['item_info']->value['is_real']){?>
				<li class="clearfix">
					<p class="fl">收货人:</p>
                    <span class="fl"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order_address_info']->value['realname'])===null||$tmp==='' ? '--' : $tmp);?>
</span>
				</li>
				<li class="clearfix">
					<p class="fl">手机号码:</p>
                    <span class="fl"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order_address_info']->value['mobile'])===null||$tmp==='' ? '--' : $tmp);?>
</span>
				</li>
				<li class="clearfix">
					<p class="fl">收货地址:</p>
                    <span class="fl"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order_address_info']->value['area_string'])===null||$tmp==='' ? '--' : $tmp);?>
</span>
				</li>
                <?php }else{ ?>
				<li class="clearfix">
					<p class="fl">游戏名称:</p>
                    <span class="fl"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order_address_info']->value['game_name'])===null||$tmp==='' ? '--' : $tmp);?>
</span>
				</li>
				<li class="clearfix">
					<p class="fl">游戏ID:</p>
                    <span class="fl"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order_address_info']->value['game_account'])===null||$tmp==='' ? '--' : $tmp);?>
</span>
				</li>
                <?php }?>
				<li class="clearfix">
					<p class="fl">申请状态:</p>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==1){?>
					<i class="fl">待领取</i>
                    <?php }else{ ?>
					<i class="fl">已领取</i>
                    <?php }?>
				</li>
			</ul>
		</div>
		<div class="entity_weixin">
			<p>请在微信公众号中回复“<span>领取</span>”客服会尽快为您派送商品</p>
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
</body>
</html>
 
<?php }} ?>