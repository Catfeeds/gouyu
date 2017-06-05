<?php /* Smarty version Smarty-3.1.6, created on 2017-04-07 21:30:53
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/draw_prize_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:176526073357c3d25bf3e878-31335981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcea0e014f0e5ee039743ab8268d92943c52061b' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/draw_prize_detail.html',
      1 => 1488856858,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176526073357c3d25bf3e878-31335981',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c3d25c1c835',
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
<?php if ($_valid && !is_callable('content_57c3d25c1c835')) {function content_57c3d25c1c835($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
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
	
		<div class="lottery_cont_main">
			<div class="lottery_cont_line"></div>
		<!--计算公式-->
			<div class="count_box">
				<p>计算公式:</p>
				<span>夺宝号码=(数值A÷数值B)&nbsp;取余数+1</span>
			</div>
		<!--数值-->
			<div class="numerical_box">
				<div class="numerical_a clearfix">
					<h1>数值A</h1>
                    <p>=随机选取最近30期中国福利彩票“老时时彩”的开奖结<br>&nbsp;&nbsp;果之一</p>
					<span class="fl">
						=
                        <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['draw_lottery'])===null||$tmp==='' ? 838383 : $tmp);?>
</i>
                        (<?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['lottery_periods'])===null||$tmp==='' ? "未知" : $tmp);?>
)
					</span>
					<a href="http://caipiao.163.com/award/cqssc/" class="fr">老时时彩开奖查询</a>
				</div>
				<div class="numerical_b">
					<h1>数值B</h1>
					<p>=商品夺宝所需总人数</p>
					<span>
						=
                        <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['total_person_times'])===null||$tmp==='' ? 100 : $tmp);?>
</i>
					</span>
				</div>
				<div style="width: 100%;height: 4rem;"></div>
			</div>
		<!--计算结果-->
			<div class="results_box clearfix">
				<h1 class="fl">计算结果</h1>
				<p class="fl">=(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['draw_lottery'])===null||$tmp==='' ? 838383 : $tmp);?>
÷<?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['total_person_times'])===null||$tmp==='' ? 100 : $tmp);?>
)取余数+1</p>
                <span>夺宝号码<i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['lottery'])===null||$tmp==='' ? 84 : $tmp);?>
</i></span>
			</div>
			<!-- <div style="width:100%;height:3rem;"></div> -->
			<div class="recoed_div" style="background-color:#e8e8e8;padding-top:10px;">
			<div class="lottery_title_this clearfix">
				<h4 class="fl">本期夺宝参与记录</h4>
                <p class="fr">自<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['treasure_info']->value['start_time'],"%Y-%m-%d %H:%M:%S");?>
开始</p>
			</div>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treasure_user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<div class="lottery_user clearfix">
                <img data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['headimgurl'];?>
" class="fl lazy" />
				<ul class="fl">
					<li class="lottery_user_name">
                        <p><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
					</li>
                    <li class="lottery_user_time">参与了<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['add_num'])===null||$tmp==='' ? 1 : $tmp);?>
</span>人次&nbsp;</li>
				</ul>
			</div>
            <?php } ?>
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
	
<script type="text/javascript" src="__JS__/front/front_js/jquery.lazyload.js"></script>
<script type="text/javascript" src="__JS__/front/front_js/lazyload_tx.js"></script>

</body>
</html>
 
<?php }} ?>