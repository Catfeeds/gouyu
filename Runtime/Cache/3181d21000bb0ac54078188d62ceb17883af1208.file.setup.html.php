<?php /* Smarty version Smarty-3.1.6, created on 2016-10-12 17:12:29
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/setup.html" */ ?>
<?php /*%%SmartyHeaderCode:158347593357be6db9d353f6-99333572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3181d21000bb0ac54078188d62ceb17883af1208' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/setup.html',
      1 => 1473663873,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158347593357be6db9d353f6-99333572',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57be6db9d9d79',
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
<?php if ($_valid && !is_callable('content_57be6db9d9d79')) {function content_57be6db9d9d79($_smarty_tpl) {?><!doctype html>
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
    background:#202020;
}
.guess_info_head{
    position:fixed;
    top:0;
    width:94%;
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
	
        <?php if (!$_smarty_tpl->tpl_vars['user_info']->value['mobile']||!$_smarty_tpl->tpl_vars['user_info']->value['email']){?>
        <div class="guess_info_head clearfix" >
			<h1 class="fl" <?php if (!$_smarty_tpl->tpl_vars['user_info']->value['mobile']){?>onclick="redirect('/FrontUser/bind_mobile')"<?php }else{ ?>onclick="redirect('/FrontUser/bind_email')"<?php }?>>点击绑定手机号和邮箱，提升安全等级，防止帐号被盗</h1>
			<i class="fr icon2 tsclose"></i>
		</div>
        <?php }?>
		<ul class="set_cont">
			<li class="clearfix img_box">
				<p class="fl">头像</p>
                <img data-original="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="fr lazy"/>
			</li>
			<li class="clearfix">
				<p class="fl">昵称</p>
                <h1 class="fr"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_info']->value['nickname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user_info']->value['username'] : $tmp);?>
</h1>
			</li>
		</ul>
		<div class="set_cont2">
            <a href="<?php echo $_smarty_tpl->tpl_vars['bind_mobile_link']->value;?>
" class="clearfix">
				<p class="fl">手机号</p>
				<i class="icon2 fr gjjiantouright"></i>
                <h2 class="fr"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_info']->value['mobile'])===null||$tmp==='' ? "未绑定" : $tmp);?>
</h2>
			</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['bind_email_link']->value;?>
" class="clearfix">
				<p class="fl">邮箱</p>
				<i class="icon2 fr gjjiantouright"></i>
                <h2 class="fr"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_info']->value['email'])===null||$tmp==='' ? "未绑定" : $tmp);?>
</h2>
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
			setTimeout(function () {
			    $(".guess_info_head").hide(100);
			}, 3000);
		</script>

</body>
</html>
 
<?php }} ?>