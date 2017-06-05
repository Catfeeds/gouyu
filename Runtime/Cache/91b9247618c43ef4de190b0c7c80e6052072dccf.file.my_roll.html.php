<?php /* Smarty version Smarty-3.1.6, created on 2016-10-09 17:32:05
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/my_roll.html" */ ?>
<?php /*%%SmartyHeaderCode:181322231957c556c5c4f6a5-84792324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91b9247618c43ef4de190b0c7c80e6052072dccf' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/my_roll.html',
      1 => 1473822422,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181322231957c556c5c4f6a5-84792324',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c556c5cff5c',
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
<?php if ($_valid && !is_callable('content_57c556c5cff5c')) {function content_57c556c5cff5c($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
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
<?php if (@ACTION_NAME!='draw_prize_record'&&@ACTION_NAME!='award_record_by_prize'&&@ACTION_NAME!='my_roll'&&@ACTION_NAME!='my_qr_code'&&@ACTION_NAME!='my_recharge_back'){?>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/global.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/gy_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<?php }?>

<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/mall_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
<style>
	body{
		padding-top: 0;
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
	<div id="load_wrapper">
		<div id="scroller">
			<div class="my_roll" id="new_list">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roll_user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['roll_detail_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['roll_id'];?>
" class="my_roll_box clearfix" >
                    <img data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_path'];?>
" class="fl lazy" />
					<div class="my_roll_cont fl clearfix">
                        <div class="my_roll_top">
                        	<h1><?php echo $_smarty_tpl->tpl_vars['item']->value['roll_name'];?>
</h1>
	                        <p>奖品:<?php echo $_smarty_tpl->tpl_vars['item']->value['prize_name'];?>
</p>
	                        <span>报名时间:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span>
                        </div>
                        <?php if (!$_smarty_tpl->tpl_vars['item']->value['is_open']){?>
							<div class="my_roll_bottom">
								<i class="icon time3x fl"></i>
								<h3 class="fl">即将揭晓</h3>
		                        <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['left_time'];?>
</h2>
							</div>
                        <?php }else{ ?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['award_user_id']==$_smarty_tpl->tpl_vars['item']->value['user_id']){?>
                            <div class="my_roll_bottom">
                            	<i class="icon time3x fl"></i>
	                            <h3 class="fl">已开奖</h3>
	                            <h3 class="my_h3_color">已获奖</h3>
	                            <h4>开奖时间:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['open_time'],"%Y-%m-%d %H:%M:%S");?>
</h4>
                            </div>
                            <?php }else{ ?>
                            <div class="my_roll_bottom">
                            	<i class="icon time_gray3x fl"></i>
	                            <h3 class="fl my_h3_grey">已开奖</h3>
	                            <h2 class="my_h2_grey">获得者:<?php echo $_smarty_tpl->tpl_vars['item']->value['award_user_name'];?>
</h2>
	                            <h4>开奖时间:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['open_time'],"%Y-%m-%d %H:%M:%S");?>
</h4>
                            </div>
                            <?php }?>
                        <?php }?>
					</div>
				</a>
                <?php } ?>
			</div>
			<div id="pullUp">
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
	
    <script type="text/javascript" src="__JS__/front/front_js/iscroll.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="__JS__/front/front_js/my_roll.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="__JS__/front/front_js/jquery.lazyload.js"></script>
    <script type="text/javascript" src="__JS__/front/front_js/lazyload_img.js"></script>
<script>
var total = parseInt('<?php echo $_smarty_tpl->tpl_vars['total_num']->value;?>
');
var firstRow = parseInt('<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
');
var page_num = parseInt('<?php echo $_smarty_tpl->tpl_vars['page_num']->value;?>
');
</script>

</body>
</html>
 
<?php }} ?>