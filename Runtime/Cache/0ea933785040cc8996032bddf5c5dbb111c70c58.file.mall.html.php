<?php /* Smarty version Smarty-3.1.6, created on 2016-10-09 17:31:00
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontMall/mall.html" */ ?>
<?php /*%%SmartyHeaderCode:133307865857c3eac284b3e5-07531909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ea933785040cc8996032bddf5c5dbb111c70c58' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontMall/mall.html',
      1 => 1474879351,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133307865857c3eac284b3e5-07531909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c3eac28dc60',
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
<?php if ($_valid && !is_callable('content_57c3eac28dc60')) {function content_57c3eac28dc60($_smarty_tpl) {?><!doctype html>
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
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/swiper.3.1.2.min.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
	<!--商城公告-->
		<div class="bulletin_box" id="scroll_box">
            <p id="scroll_begin"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>
            <p id="scroll_end"></p>
		</div>
	<!--轮播图-->
		<div class="swiper-container home_banner">
    		<div class="swiper-wrapper">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cust_flash_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <div class="swiper-slide"><a href="http://<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" class="swiper-lazy" /></a></div>
                <?php } ?>
    		</div>
    		<div class="swiper-pagination"></div>
		</div>
	<!--土豪专区-->
		<div class="mall_tab clearfix">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['class_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['class_mall_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['class_id'];?>
">
				<span class="icon tuhao_big3x"></span>
                <p><?php echo $_smarty_tpl->tpl_vars['item']->value['class_name'];?>
</p>
			</a>
            <?php } ?>
		</div>
	<!--更多-->
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['class_item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['class_mall_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['class_id'];?>
" class="mall_more clearfix">
			<i class="icon tuhao_gold3x fl"></i>
            <p class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['class_name'];?>
</p>
			<i class="right_gold3x fr"></i>
			<span class="fr">更多</span>
		</a>
	<!--内容-->
		<ul class="mall_main clearfix">
            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
			<li class="clearfix">
                <a href="<?php echo $_smarty_tpl->tpl_vars['item_detail_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['list']->value['item_id'];?>
">
                    <img data-original="<?php echo $_smarty_tpl->tpl_vars['list']->value['base_pic'];?>
" class="lazy" />
                    <h1><?php echo $_smarty_tpl->tpl_vars['list']->value['item_name'];?>
</h1>
                    <p class="fl"><?php echo intval((($tmp = @$_smarty_tpl->tpl_vars['list']->value['mall_price'])===null||$tmp==='' ? 10000 : $tmp));?>
<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</p>
					<span class="fr">
                        已兑换<i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['list']->value['exchange_num'])===null||$tmp==='' ? 0 : $tmp);?>
</i>件
					</span>
				</a>
			</li>
            <?php } ?>
		</ul>
        <?php } ?>
	<!--兑换规则-->
    	<a href="<?php echo $_smarty_tpl->tpl_vars['exchange_rule_link']->value;?>
" class="exchange_box clearfix">
			<span class="icon duihuanguize3x fl"></span>
			<h1 class="fl">兑换规则</h1>
			<i class="fr icon right_gold3x"></i>
		</a>
		<div style="width: 100%;height: 3rem;"></div>
		

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
	
		<script type="text/javascript" src="__JS__/front/front_js/swiper.3.1.2.jquery.min.js" ></script>
		<script type="text/javascript" src="__JS__/front/front_js/jquery.lazyload.js"></script>
		<script type="text/javascript" src="__JS__/front/front_js/lazyload_img.js"></script>
		<script>
			var mySwiper = new Swiper('.swiper-container',{
					pagination : '.swiper-pagination',
					lazyLoading : true,
				})
			$(function()
			{
			/*轮播图*/
				var clientWidth = $(window).width();
				var imgh=clientWidth*(53/100);
				$(".swiper-slide img").height(imgh);
			/*对齐方式*/
				$(".mall_main>li:even").css("float","left");
				$(".mall_main>li:odd").css("float","right");
			});
		/*商城公告滚动*/
			function scroll()
			{
			  	var begin = null;
			  	
			 	var scroll_begin = document.getElementById("scroll_begin"); 
			 	var scroll_end = document.getElementById("scroll_end"); 
			 	var scroll_div = document.getElementById("scroll_box");
			 	
			 	if(scroll_begin.offsetWidth>scroll_div.offsetWidth)
			 	{
			 		scroll_end.innerHTML=scroll_begin.innerHTML;
			 	}
			 	
			 	begin = setInterval(function()
			 	{
			  		if(scroll_end.offsetWidth-scroll_div.scrollLeft<=0) 
			  		{
			  			scroll_div.scrollLeft-=scroll_begin.offsetWidth; 
			  		}
			  		else
			  		{
			  			scroll_div.scrollLeft++; 
			  		}
			  	},15); 
			}
			scroll();
		</script>

</body>
</html>
 
<?php }} ?>