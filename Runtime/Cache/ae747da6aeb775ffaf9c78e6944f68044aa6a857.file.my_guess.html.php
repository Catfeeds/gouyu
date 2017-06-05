<?php /* Smarty version Smarty-3.1.6, created on 2016-10-12 10:20:40
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/my_guess.html" */ ?>
<?php /*%%SmartyHeaderCode:160826092257c66de15aa706-36223374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae747da6aeb775ffaf9c78e6944f68044aa6a857' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/my_guess.html',
      1 => 1476238836,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160826092257c66de15aa706-36223374',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c66de160668',
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
<?php if ($_valid && !is_callable('content_57c66de160668')) {function content_57c66de160668($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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

		<style type="text/css">
		body{
			background:#202020;
		}
		#load_wrapper {
		  position:absolute; 
		  z-index:1;
		  top:5.35rem;
		  bottom: 0;
		  width:100%;
		  overflow:auto;  

		}
		#scroller{
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
	
		<div class="record_head clearfix">
            <a class="active br" href="<?php echo $_smarty_tpl->tpl_vars['my_guess_link']->value;?>
">比赛竞猜</a>
            <a class="" href="<?php echo $_smarty_tpl->tpl_vars['my_guess_champion_link']->value;?>
">冠军猜</a>
		</div>
		<div class="record_top">
			<div class="week_box">
                <div class="box_list">本周竞猜次数:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['wek_total_num']->value)===null||$tmp==='' ? 0 : $tmp);?>
</div>
                <div class="box_list">竞猜胜率:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['wek_prize_rate']->value)===null||$tmp==='' ? 0 : $tmp);?>
％</div>
                <div class="box_list">竞猜盈利:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['gain_money_wek']->value)===null||$tmp==='' ? 0 : $tmp);?>
</div>
			</div>
			<div class="month_box">
                <div class="box_list">本月竞猜次数:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mon_total_num']->value)===null||$tmp==='' ? 0 : $tmp);?>
</div>
                <div class="box_list">竞猜胜率:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mon_prize_rate']->value)===null||$tmp==='' ? 0 : $tmp);?>
％</div>
                <div class="box_list">竞猜盈利:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['gain_money_mon']->value)===null||$tmp==='' ? 0 : $tmp);?>
</div>
			</div>
		</div>
		<div class="record_list" id="load_wrapper">
			<div id="scroller">
				<ul id="new_list">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<li class="record_li">
                        <a class="clearfix" href="/FrontGuess/guess_info/guess_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['guess_id'];?>
">
							<div class="top clearfix">
                                <h1 class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['ajax_addtime'];?>
</h1>
                                <h2 class="fr"><span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['host_team_name'])===null||$tmp==='' ? '--' : $tmp);?>
</span>&nbsp;VS&nbsp;<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['guest_team_name'])===null||$tmp==='' ? '--' : $tmp);?>
</span></h2>
							</div>
							<div class="cont">
                                <h1><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['guess_question'],23,"...",true);?>
</h1>
                                <h2>竞猜：
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['team_type']==1){?>
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['defind_team_name']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['defind_host_name'];?>

                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['field_type']==1){?><?php echo $_smarty_tpl->tpl_vars['item']->value['host_team_name'];?>

                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['lose_type']==1){?> -<?php echo $_smarty_tpl->tpl_vars['item']->value['lose_score'];?>
 <?php }?>
                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['field_type']==2){?> 大于
                                        <?php }else{ ?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['host_team_name'])===null||$tmp==='' ? '--' : $tmp);?>

                                        <?php }?>
                                        (<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['host_odds'])===null||$tmp==='' ? 1.00 : $tmp);?>
)
                                    <?php }else{ ?>
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['defind_team_name']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['defind_guest_name'];?>

                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['field_type']==1){?><?php echo $_smarty_tpl->tpl_vars['item']->value['guest_team_name'];?>

                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['lose_type']==2){?> -<?php echo $_smarty_tpl->tpl_vars['item']->value['lose_score'];?>
 <?php }?>
                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['field_type']==2){?> 小于
                                        <?php }else{ ?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['guest_team_name'])===null||$tmp==='' ? '--' : $tmp);?>

                                        <?php }?>
                                        (<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['guest_odds'])===null||$tmp==='' ? 1.00 : $tmp);?>
)
                                    <?php }?></h2>
                                <h2>结果：
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['result']==1){?>
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['defind_team_name']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['defind_host_name'];?>

                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['field_type']==1){?><?php echo $_smarty_tpl->tpl_vars['item']->value['host_team_name'];?>

                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['lose_type']==1){?> -<?php echo $_smarty_tpl->tpl_vars['item']->value['lose_score'];?>
 <?php }?>
                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['field_type']==2){?> 大于
                                        <?php }else{ ?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['host_team_name'])===null||$tmp==='' ? '--' : $tmp);?>

                                        <?php }?>
                                        (<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['host_odds'])===null||$tmp==='' ? 1.00 : $tmp);?>
)
                                    <?php }elseif($_smarty_tpl->tpl_vars['item']->value['result']==2){?>
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['defind_team_name']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['defind_guest_name'];?>

                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['field_type']==1){?><?php echo $_smarty_tpl->tpl_vars['item']->value['guest_team_name'];?>

                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['lose_type']==2){?> -<?php echo $_smarty_tpl->tpl_vars['item']->value['lose_score'];?>
 <?php }?>
                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['field_type']==2){?> 小于
                                        <?php }else{ ?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['guest_team_name'])===null||$tmp==='' ? '--' : $tmp);?>

                                        <?php }?>
                                        (<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['guest_odds'])===null||$tmp==='' ? 1.00 : $tmp);?>
)
                                    <?php }elseif($_smarty_tpl->tpl_vars['item']->value['result']==-1){?>
                                        已退款
                                    <?php }else{ ?>
                                        暂无
                                    <?php }?></h2>
                                <h3>投注：<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['add_money'])===null||$tmp==='' ? "100" : $tmp);?>
<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['team_type']==$_smarty_tpl->tpl_vars['item']->value['result']){?><span>赢取：<?php echo $_smarty_tpl->tpl_vars['item']->value['prize_money'];?>
<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</span><?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['result']==-1){?><span>退回：<?php echo $_smarty_tpl->tpl_vars['item']->value['prize_money'];?>
<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</span><?php }?></h3>
								<!-- 如果没有赢取鱼翅。去除span -->
							</div>
						</a>
					</li>
                    <?php } ?>
				</ul>
				<div id="pullUp">
					<span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载...</span>
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
		<script type="text/javascript" src="__JS__/front/front_js/my_guess.js"></script>
		<script>
var total = parseInt('<?php echo $_smarty_tpl->tpl_vars['total_num']->value;?>
');
var firstRow = parseInt('<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
');
var page_num = parseInt('<?php echo $_smarty_tpl->tpl_vars['page_num']->value;?>
');
var system_money_name = '<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
';
			$(function()
			{
				$(".footer_box").on("click",function()
				{
					$(this).addClass("footer_active").siblings().removeClass("footer_active");
				});
			});
		</script>

</body>
</html>
 
<?php }} ?>