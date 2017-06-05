<?php /* Smarty version Smarty-3.1.6, created on 2016-09-18 14:00:50
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/award_page.html" */ ?>
<?php /*%%SmartyHeaderCode:188918589257c28072ecf298-23852887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '450e0060cb59ee2a6b589f05ddd8bea6c01b08f8' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/award_page.html',
      1 => 1472370532,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1473755677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188918589257c28072ecf298-23852887',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c28073174a8',
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
<?php if ($_valid && !is_callable('content_57c28073174a8')) {function content_57c28073174a8($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
?><!doctype html>
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
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/layer.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />

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
		<div class="roll_main">
			<img src="__IMAGES__/front/front_img/1.jpg" class="roll_img" />
			<div class="enroll_box clearfix">
                <h1><?php echo $_smarty_tpl->tpl_vars['roll_info']->value['roll_name'];?>
</h1>
                <p>奖品:<?php echo $_smarty_tpl->tpl_vars['roll_info']->value['prize_name'];?>
</p>
				<i class="icon time_gray3x fl"></i>
                <span class="fl">已开奖&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['roll_info']->value['open_time'],"%Y-%m-%d %H:%M:%S");?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['award_user_info']->value['user_id']==$_smarty_tpl->tpl_vars['roll_user_info']->value['user_id']){?>
                <div class="lottery_box1 me_lottery clearfix">
					<i class="win3x"></i>
                <?php }else{ ?>
				<div class="lottery_box1 clearfix">
                <?php }?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['award_user_info']->value['headimgurl'];?>
" class="fl" />
					<ul class="fl">
						<li class="clearfix">
							<p class="fl">中奖者:</p>
                            <span class="fl"><?php echo $_smarty_tpl->tpl_vars['award_user_info']->value['nickname'];?>
</span>
						</li>
						<li>
                            <p>报名时间:&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['award_user_info']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</p>
						</li>
					</ul>
				</div>
                <?php if ($_smarty_tpl->tpl_vars['roll_user_info']->value&&$_smarty_tpl->tpl_vars['award_user_info']->value['user_id']!=$_smarty_tpl->tpl_vars['roll_user_info']->value['user_id']){?>
				<div class="enroll_min_box clearfix">
					<p class="fl">我已报名</p>
                    <span class="fl"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['roll_user_info']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span>
				</div>
                <?php }?>
			</div>
		<!--roll规则-->
			<div class="adornment_exchange clearfix">
				<h1 class="fl">roll规则</h1>
				<span class="icon down3x fr"></span>
				<p>详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则详细规则</p>
			</div>
		<!--已报名用户-->
			<div class="roll_user_box">
				<div class="roll_user_title clearfix">
                    <p class="fl">已报名用户(<i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['roll_user_num']->value)===null||$tmp==='' ? 0 : $tmp);?>
</i>人)</p>
                    <span class="fl">自<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['roll_info']->value['start_time'],"%Y-%m-%d %H:%M:%S");?>
至<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['roll_info']->value['end_time'],"%Y-%m-%d %H:%M:%S");?>
</span>
				</div>
                <?php if ($_smarty_tpl->tpl_vars['roll_user_list']->value){?>
				<ul>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roll_user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<li class="clearfix">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['headimgurl'];?>
" class="fl" />
                        <p class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
                        <span class="fl"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span>
					</li>
                    <?php } ?>
				</ul>
                <?php }?>
			</div>
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
	
		<script>
			$(function()
			{
			/*兑换规则*/
				$(".adornment_exchange").on("click",function()
				{
					$(this).find("p").toggle();
					$(this).find("span").toggleClass("up3x");
				});
			});
		</script>

</body>
</html>
 
<?php }} ?>