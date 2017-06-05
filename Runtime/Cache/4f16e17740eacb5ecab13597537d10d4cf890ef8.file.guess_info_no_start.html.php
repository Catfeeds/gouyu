<?php /* Smarty version Smarty-3.1.6, created on 2016-10-08 09:39:30
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontGuess/guess_info_no_start.html" */ ?>
<?php /*%%SmartyHeaderCode:33461609557c003fda87f70-55401104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f16e17740eacb5ecab13597537d10d4cf890ef8' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontGuess/guess_info_no_start.html',
      1 => 1475890759,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1473755677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33461609557c003fda87f70-55401104',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c003fdc513d',
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
<?php if ($_valid && !is_callable('content_57c003fdc513d')) {function content_57c003fdc513d($_smarty_tpl) {?><!doctype html>
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

		<style type="text/css">
		body{
			background-color:#202020;
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
	
		<div class="guess_info_head clearfix">
			<h1 class="fl">该比赛无赛中竞猜，将会在比赛前一小时关闭！</h1>
			<i class="fr icon2 tsclose"></i>
		</div>
		<div class="guess_doing_cont ">
			<img src="/Public/Images/front/front_img/1.jpg" class="bg_img"/>
			<!-- bg_img 背景图 -->
			<h1 class="guess_doing_tit">
                <?php echo $_smarty_tpl->tpl_vars['guess_info']->value['alert_message'];?>

			</h1>
			<!-- 补充文字 删除不改变布局-->
			<div class="team_box clearfix">
				<div class="fl team_img_box">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['host_team_info']->value['team_logo'];?>
" class="team_img"/>
                    <h1 class="team_name"><?php echo $_smarty_tpl->tpl_vars['host_team_info']->value['team_name'];?>
</h1>
                    <?php if ($_smarty_tpl->tpl_vars['guess_info']->value['is_over']&&$_smarty_tpl->tpl_vars['guess_info']->value['host_score']>$_smarty_tpl->tpl_vars['guess_info']->value['guest_score']){?><span class="victory"></span><?php }?>
				</div>
				<div class="fr team_img_box">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['guest_team_info']->value['team_logo'];?>
" class="team_img"/>
                    <h1 class="team_name"><?php echo $_smarty_tpl->tpl_vars['guest_team_info']->value['team_name'];?>
</h1>
                    <?php if ($_smarty_tpl->tpl_vars['guess_info']->value['is_over']&&$_smarty_tpl->tpl_vars['guess_info']->value['host_score']<$_smarty_tpl->tpl_vars['guess_info']->value['guest_score']){?><span class="victory"></span><?php }?>
					<!--  span victory 是胜利方出现的标志 -->
				</div>
				<div class="clearfix">
					<div class="score_box clearfix">
                        <p class="fl score_p"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['guess_info']->value['host_score'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
						<i class="icon2 VS fl"></i>
                        <p class="fl score_p"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['guess_info']->value['guest_score'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
					</div>
					<div class="ronda_box">
						<div class="ronda_bg clearfix"><div class="ronda_bg_left fl"></div><div class="ronda_bg_right fr"></div></div>
                        <h1 class="ronda_num">BO <?php if ($_smarty_tpl->tpl_vars['guess_info']->value['bo']){?><?php echo $_smarty_tpl->tpl_vars['guess_info']->value['bo'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['guess_field_num']->value;?>
<?php }?></h1>
					</div>
                    <?php if ($_smarty_tpl->tpl_vars['guess_field_num']->value){?>
                    <?php }?>
				</div>
			</div>
		</div>
		<div class="guess_stop_main">
			<p>本场比赛暂未开放竞猜</p>
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
			$(".guess_info_head .tsclose").on("click",function(){
				$(this).parent().hide(100);
			})
		</script>

</body>
</html>
 
<?php }} ?>