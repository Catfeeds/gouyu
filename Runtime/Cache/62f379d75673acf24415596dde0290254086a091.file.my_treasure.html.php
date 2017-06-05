<?php /* Smarty version Smarty-3.1.6, created on 2016-10-10 15:55:15
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/my_treasure.html" */ ?>
<?php /*%%SmartyHeaderCode:8084444257c68c33699353-87172534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62f379d75673acf24415596dde0290254086a091' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/my_treasure.html',
      1 => 1476086061,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8084444257c68c33699353-87172534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c68c3371c48',
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
<?php if ($_valid && !is_callable('content_57c68c3371c48')) {function content_57c68c3371c48($_smarty_tpl) {?><!doctype html>
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
		  top:0rem;
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
	
<!-- 		<div class="record_head clearfix">
            <a class="fl " href="<?php echo $_smarty_tpl->tpl_vars['my_guess_link']->value;?>
">比赛竞猜</a>
            <a class="fl " href="<?php echo $_smarty_tpl->tpl_vars['my_guess_champion_link']->value;?>
">冠军猜</a>
            <a class="fl active" href="<?php echo $_smarty_tpl->tpl_vars['my_treasure_link']->value;?>
">夺宝记录</a>
			<!-- 高亮active -->
		</div> -->
		<div class="snatch_list" id="load_wrapper">
			<div id="scroller">
				<ul id="new_list">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treasure_user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<li class="snatch_li">
                        <a class="clearfix" <?php if ($_smarty_tpl->tpl_vars['item']->value['is_open']&&$_smarty_tpl->tpl_vars['item']->value['lottery']){?>href="/FrontTreasure/draw_prize_detail/draw_prize_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['draw_prize_id'];?>
.html"<?php }elseif(!$_smarty_tpl->tpl_vars['item']->value['is_open']){?>href="/FrontTreasure/treasure_detail/treasure_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['treasure_id'];?>
.html"<?php }?>>
							<div class="cont1 clearfix">
                                <img data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_path'];?>
" class="fl lazy"/>
								<div class="txt_box fl">
                                    <h1><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['prize_name'])===null||$tmp==='' ? "--" : $tmp);?>
</h1>
                                    <h2>参与期号：第<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['periods'])===null||$tmp==='' ? 0 : $tmp);?>
期</h2>
                                    <h3>我已参与：<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['times'])===null||$tmp==='' ? 1 : $tmp);?>
</span>人次</h3>
								</div>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['is_open']&&$_smarty_tpl->tpl_vars['item']->value['lottery']){?>
                                <h2 class="hint fr">开奖详情</h2>
                                <?php }?>
							</div>
							<div class="cont2 clearfix">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['is_open']){?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['lottery']){?>
                                <h1 class="fl">获得者：<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['award_user_name'])===null||$tmp==='' ? '--' : $tmp);?>
</h1>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['award_user_id']==$_smarty_tpl->tpl_vars['item']->value['user_id']){?>
								<h2 class="already fr">已中奖</h2>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['is_deliver']){?><h2 class="already fr">已领取</h2><?php }?>
                                <?php }else{ ?>
								<h2 class="already fr">已开奖</h2>
                                <?php }?>
                                    <?php }else{ ?>
								<h2 class="already fr">已退款</h2>
                                    <?php }?>
                                <?php }else{ ?>
								<h1 class="fl">获得者：？</h1>
								<h2 class="not fr">等待开奖</h2>
                                <?php }?>
								<!-- not 未开奖 already 已经开奖 -->
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
		<script type="text/javascript" src="__JS__/front/front_js/my_treasure.js"></script>
		<script type="text/javascript" src="__JS__/front/front_js/jquery.lazyload.js"></script>
    <script type="text/javascript" src="__JS__/front/front_js/lazyload_img.js"></script>
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