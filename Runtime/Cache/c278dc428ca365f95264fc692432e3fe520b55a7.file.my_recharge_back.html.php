<?php /* Smarty version Smarty-3.1.6, created on 2016-10-11 10:13:21
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/my_recharge_back.html" */ ?>
<?php /*%%SmartyHeaderCode:7221889257f99d0d9ca6d8-06612160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c278dc428ca365f95264fc692432e3fe520b55a7' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/my_recharge_back.html',
      1 => 1476151984,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7221889257f99d0d9ca6d8-06612160',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57f99d0da030e',
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
<?php if ($_valid && !is_callable('content_57f99d0da030e')) {function content_57f99d0da030e($_smarty_tpl) {?><!doctype html>
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

		<link rel="stylesheet" href="__CSS__/front/front_css/mall_style.css" />
		<link rel="stylesheet" href="__CSS__/front/front_css/loading.css" />
		<style>
			#pullUp{
				padding-bottom: 0;
				width: 100%;
				background-color: #202020;
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
	<!--详细内容-->
		<div id="load_wrapper">
			<div id="scroller">
				<ul class="popu_main" id="new_list">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recharge_back_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<li class="clearfix">
                        <p class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['ajax_addtime'];?>
</p>
                        <span class="fr"><?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</span>
                        <i class="fr"><?php echo $_smarty_tpl->tpl_vars['item']->value['gain_money'];?>
</i>
					</li>
                    <?php } ?>
				</ul>
				<div id="pullUp" style="padding-bottom: 3rem;">
					<span class="pullUpIcon item jiazaizhong3x"></span><span class="pullUpLabel">上拉加载...</span>
				</div>
			</div>
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
	
<script type="text/javascript" src="__JS__/front/front_js/iscroll.js"></script>
<script type="text/javascript" src="__JS__/front/front_js/my_recharge_back.js"></script>
<script>
var total = parseInt('<?php echo $_smarty_tpl->tpl_vars['total_num']->value;?>
');
var page_num = parseInt('<?php echo $_smarty_tpl->tpl_vars['page_num']->value;?>
');
var system_money_name = '<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
';
</script>

</body>
</html>
 
<?php }} ?>