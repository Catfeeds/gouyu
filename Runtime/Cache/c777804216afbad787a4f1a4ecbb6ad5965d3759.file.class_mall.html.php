<?php /* Smarty version Smarty-3.1.6, created on 2016-10-10 11:28:11
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontMall/class_mall.html" */ ?>
<?php /*%%SmartyHeaderCode:54853203057c3f855b728a6-30701792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c777804216afbad787a4f1a4ecbb6ad5965d3759' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontMall/class_mall.html',
      1 => 1474510132,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54853203057c3f855b728a6-30701792',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c3f855d136b',
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
<?php if ($_valid && !is_callable('content_57c3f855d136b')) {function content_57c3f855d136b($_smarty_tpl) {?><!doctype html>
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
	
	<!--顶部细线-->
		<div class="lottery_line_grey"></div>
		<div class="lottery_line_black"></div>
	<!--土豪专区-->
		<div class="mall_list_tuhao clearfix">
			<i class="icon tuhao_white3x fl"></i>
            <span class="fl"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['class_name']->value)===null||$tmp==='' ? '土豪专区' : $tmp);?>
</span>
            <a href="<?php echo $_smarty_tpl->tpl_vars['exchange_rule_link']->value;?>
">兑换规则</a>
		</div>
	<!--分类名称-->
		<div id="wrapper_list">
			<div id="scroller_list">
				<ul class="clearfix mall_list_tab">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sort_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <li class="fl <?php if ($_smarty_tpl->tpl_vars['item']->value['sort_id']==$_smarty_tpl->tpl_vars['sort_id']->value){?>sort_tab_active<?php }?>">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['class_mall_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['class_id']->value;?>
/sort_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['sort_name'];?>
</a>
					</li>
                    <?php } ?>
				</ul>
			</div>
		</div>
	<!--商品排序导航-->
		<div class="mall_sort_tab clearfix">
            <div class="mall_sort_box clearfix fl <?php if ($_smarty_tpl->tpl_vars['type']->value==1||!$_smarty_tpl->tpl_vars['type']->value){?>sort_tab_active <?php if ($_smarty_tpl->tpl_vars['up']->value){?>sort_tab_active1<?php }?><?php }?>" id="1">
				<p class="fl">默认</p>
				<div class="sort_icon_box">
                    <i class="icon xiangshang3x <?php if (!$_smarty_tpl->tpl_vars['up']->value){?>xiangshang<?php }?>"></i>
					<span class="icon xiala3x xiangxia3x"></span>
				</div>
			</div>
			<div class="mall_sort_box clearfix fl <?php if ($_smarty_tpl->tpl_vars['type']->value==2){?>sort_tab_active <?php if ($_smarty_tpl->tpl_vars['up']->value){?>sort_tab_active1<?php }?><?php }?>" id="2">
				<p class="fl">最新</p>
				<div class="sort_icon_box">
					<i class="icon xiangshang3x <?php if (!$_smarty_tpl->tpl_vars['up']->value){?>xiangshang<?php }?>"></i>
					<span class="icon xiala3x xiangxia3x"></span>
				</div>
			</div>
			<div class="mall_sort_box clearfix fl <?php if ($_smarty_tpl->tpl_vars['type']->value==3){?>sort_tab_active <?php if ($_smarty_tpl->tpl_vars['up']->value){?>sort_tab_active1<?php }?><?php }?>" id="3">
				<p class="fl">销量</p>
				<div class="sort_icon_box">
					<i class="icon xiangshang3x <?php if (!$_smarty_tpl->tpl_vars['up']->value){?>xiangshang<?php }?>"></i>
					<span class="icon xiala3x xiangxia3x"></span>
				</div>
			</div>
			<div class="mall_sort_box clearfix fl <?php if ($_smarty_tpl->tpl_vars['type']->value==4){?>sort_tab_active <?php if ($_smarty_tpl->tpl_vars['up']->value){?>sort_tab_active1<?php }?><?php }?>" id="4">
				<p class="fl">价格</p>
				<div class="sort_icon_box">
					<i class="icon xiangshang3x <?php if (!$_smarty_tpl->tpl_vars['up']->value){?>xiangshang<?php }?>"></i>
					<span class="icon xiala3x xiangxia3x"></span>
				</div>
			</div>
		</div>
	<!--内容-->
		<ul class="mall_main clearfix"style="padding-bottom: 3rem;">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<li class="clearfix">
                <a href="<?php echo $_smarty_tpl->tpl_vars['item_detail_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['base_pic'];?>
" />
                    <h1><?php echo $_smarty_tpl->tpl_vars['item']->value['item_name'];?>
</h1>
                    <p class="fl"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['mall_price'])===null||$tmp==='' ? 10000 : $tmp);?>
<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</p>
					<span class="fr">
                        已兑换<i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['sales_num'])===null||$tmp==='' ? 0 : $tmp);?>
</i>件
					</span>
				</a>
			</li>
            <?php } ?>
		</ul>
		

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
	
		<script type="text/javascript" src="__JS__/front/front_js/iscroll_tab.js" ></script>
		<script>
			var myScroll;
            var redirect_url = '<?php echo $_smarty_tpl->tpl_vars['redirect_url']->value;?>
';
			

			$(function()
			{
			/*对齐方式*/
				$(".mall_main>li:even").css("float","left");
				$(".mall_main>li:odd").css("float","right");
			/*滑动导航*/
				myScroll = new IScroll('#wrapper_list', { eventPassthrough: true, scrollX: true, scrollY: false, preventDefault: false });
				
				$(".mall_list_tab>li").on("click",function()
				{
					$(this).addClass("sort_tab_active").siblings().removeClass("sort_tab_active");
				});
			/*点击排序导航*/
				$(".mall_sort_box").on("click",function()
				{
                    var type = $(this).attr("id");

					//$(this).addClass("sort_tab_active").siblings().removeClass("sort_tab_active");
                    if (!$(this).hasClass("sort_tab_active1")) {
                        window.location.href=redirect_url+'/type/'+type+'/up/1.html';
                    } else {
                        window.location.href=redirect_url+'/type/'+type+'/up/0.html';
                    }
					//$(this).toggleClass("sort_tab_active1");
					//$(this).find("i").toggleClass("xiangshang");
				});
			});

		</script>

</body>
</html>
 
<?php }} ?>