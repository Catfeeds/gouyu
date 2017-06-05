<?php /* Smarty version Smarty-3.1.6, created on 2016-10-10 16:25:10
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/award_record_by_prize.html" */ ?>
<?php /*%%SmartyHeaderCode:204282063757c3b192681c34-96547892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de4a4396b740f262e4827597d03832acbb3e5a36' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/award_record_by_prize.html',
      1 => 1476087746,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204282063757c3b192681c34-96547892',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c3b19270971',
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
<?php if ($_valid && !is_callable('content_57c3b19270971')) {function content_57c3b19270971($_smarty_tpl) {?><!doctype html>
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
	<!--主要内容-->
		<div id="load_wrapper">
			<div id="scroller">
				<div class="lottery_main" id="new_list">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['draw_prize_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <div class="lottery_box_cont clearfix <?php if ($_smarty_tpl->tpl_vars['user_id']->value==$_smarty_tpl->tpl_vars['item']->value['user_id']){?><?php if ($_smarty_tpl->tpl_vars['item']->value['is_deliver']){?>lottery_get<?php }else{ ?>lottery_win<?php }?><?php }?>" onclick="redirect('<?php echo $_smarty_tpl->tpl_vars['draw_prize_detail_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['draw_prize_id'];?>
')">
                    	<!-- lottery_get是已领取 lottery_win是中奖 -->
						<div class="lottery_left_box fl">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['headimgurl'];?>
" />
                            <p><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
						</div>
						<div class="lottery_cont_box lottery_cont_box1 fl">
							<div class="lottery_round_outer">
								<div class="lottery_round_inside"></div>
							</div>
						</div>
						<div class="lottery_right_box lottery_right_box1 fr">
							<div class="lottery_right_top">
                                第<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['periods'])===null||$tmp==='' ? 1 : $tmp);?>
期(开奖时间<?php echo $_smarty_tpl->tpl_vars['item']->value['ajax_addtime'];?>
)
							</div>
							<div class="lottery_right_bottom clearfix">
								<ul class="fl">
                                    <li>夺宝号码:<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['lottery'])===null||$tmp==='' ? 0 : $tmp);?>
</p></li>
                                    <li>本期参与:<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['people_use_times'])===null||$tmp==='' ? 1 : $tmp);?>
</p>人次</li>
                                    <li>夺宝成功率:<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['award_rate'])===null||$tmp==='' ? 10 : $tmp);?>
%</p></li>
                                    <li>参与总人次:<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['total_person_times'])===null||$tmp==='' ? 100 : $tmp);?>
</p>人次</li>
								</ul>
								<i class="icon right3x fr"></i>
							</div>
						</div>
					</div>
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
	
		<script type="text/javascript" src="__JS__/front/front_js/iscroll.js"></script>
		<script>
var total = parseInt('<?php echo $_smarty_tpl->tpl_vars['total_num']->value;?>
');
var firstRow = parseInt('<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
');
var page_num = parseInt('<?php echo $_smarty_tpl->tpl_vars['page_num']->value;?>
');
var prize_id = parseInt('<?php echo $_smarty_tpl->tpl_vars['prize_id']->value;?>
');
var user_id  = parseInt('<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
');
			$(function()
			{
				$(document).on("click",".lottery_box_cont",function()
				{
					$(this).addClass("lottery_box_active").siblings().removeClass("lottery_box_active");
				});
			});
		</script>
		<script type="text/javascript" src="__JS__/front/front_js/prize_record.js" ></script>

</body>
</html>
 
<?php }} ?>