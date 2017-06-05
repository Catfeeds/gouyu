<?php /* Smarty version Smarty-3.1.6, created on 2016-10-28 14:44:50
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontMall/item_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:42349129957c4e88a3b4621-48958722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63a3b9ce008517754fe065668dbdffb029169849' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontMall/item_detail.html',
      1 => 1477636704,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42349129957c4e88a3b4621-48958722',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c4e88a580af',
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
<?php if ($_valid && !is_callable('content_57c4e88a580af')) {function content_57c4e88a580af($_smarty_tpl) {?><!doctype html>
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
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/layer.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
<!--<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/layer1.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" /> -->
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
	<!--轮播图-->
		<div class="swiper-container home_banner">
    		<div class="swiper-wrapper">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_photo_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <div class="swiper-slide">
                	<a href="javascript:;">
                		<img data-src="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" class="swiper-lazy" />
                		<div class="swiper-lazy-preloader"></div>
                	</a>
                </div>
                <?php } ?>
    		</div>
    		<div class="swiper-pagination"></div>
		</div>
	<!--介绍-->
		<div class="adornment_box">
			<div class="adornment_top_box clearfix">
                <h1><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item_info']->value['item_name'])===null||$tmp==='' ? '--' : $tmp);?>
</h1>
                <p class="fl"><?php echo intval((($tmp = @$_smarty_tpl->tpl_vars['item_info']->value['mall_price'])===null||$tmp==='' ? 10000 : $tmp));?>
<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</p>
                <span class="fr">已兑换<i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item_info']->value['sales_num'])===null||$tmp==='' ? 0 : $tmp);?>
</i>件</span>
			</div>
			<div class="adornment_bottom_box">
                <h1>使用英雄:<?php echo $_smarty_tpl->tpl_vars['item_info']->value['use_hero'];?>
</h1>
                <p><?php echo $_smarty_tpl->tpl_vars['item_info']->value['item_desc'];?>
</p>
			</div>
		</div>
	<!--兑换规则-->
		<div class="adornment_exchange clearfix">
			<h1 class="fl">兑换规则</h1>
			<span class="icon down3x fr"></span>
            <p><?php echo $_smarty_tpl->tpl_vars['contents']->value;?>
</p>
		</div>
	<!--底部按钮-->
		<div class="adornment_btn">
			<input type="button" value="立即兑换" class="js_adornment_btn" />
		</div>
	<!--兑换成功弹层-->
		<div class="gouyu_layer js_exchange_success" style="background-color: rgba(0,0,0,0.9);display: none;">
			<div style="width: 100%;height: 100%;display: table;">
				<div style="width: 100%;display: table-cell;vertical-align:middle;">
					<div class="clearfix exchange_success">
						<span class="icon Cancel_big3x"></span>
						<i class="icon chengong3x fl"></i>
						<p class="fl">兑换成功</p>
						<div class="duihuan_box">
		                    <p>您兑换的<span><?php echo $_smarty_tpl->tpl_vars['item_info']->value['item_name'];?>
</span>兑换成功</p>
						</div>
						<input type="button" value="继续兑换" class="js_go_on"/>
						<a href="">查看兑换详情</a>
					</div>
				</div>
			</div>
		</div>
	<!--兑换失败弹层-->
		<div class="gouyu_layer js_exchange_failed" style="background-color: rgba(0,0,0,0.9);display: none;">
			<div style="width: 100%;height: 100%;display: table;">
				<div style="width: 100%;display: table-cell;vertical-align:middle;">
					<div class="clearfix exchange_success">
						<span class="icon Cancel_big3x"></span>
						<i class="icon fail3x fl"></i>
						<p class="fl">兑换失败</p>
						<div class="duihuan_box">
							<p>您的鱼翅余额不足，您想以<span>5</span>元购买<span>500</span>鱼翅兑换吗？</p>
						</div>
						<input type="button" value="确认购买" onclick="redirect('/FrontUser/recharge/')" />
					</div>
				</div>
			</div>
		</div>
    <!--不能兑换提示-->
		<div class="gouyu_layer js_close_alert" style="background-color: rgba(0,0,0,0.9);display: none;">
			<div style="width: 100%;height: 100%;display: table;">
				<div style="width: 100%;display: table-cell;vertical-align:middle;">
					<div class="no_exchange">
						<span class="icon Cancel_big3x"></span>
						<i class="icon fail3x"></i>
		                <p><?php echo $_smarty_tpl->tpl_vars['system_config']->value['CLOSE_EXCHANGE_ALERT'];?>
</p>
					</div>
				</div>
			</div>
		</div>
	<!--选择收货地址-->
		<div class="gouyu_layer js_address_layer" style="display: none;">
			<div style="width: 100%;height: 100%;display: table;">
				<div style="width: 100%;display: table-cell;vertical-align:middle;">
					<div class="address_box">
						<span class="icon CancelCopy3x"></span>
						<h1>请选择收货地址</h1>
		                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
						<div class="address_box_cont clearfix">
		                    <h2 class="fl">收货人:<?php echo $_smarty_tpl->tpl_vars['item']->value['realname'];?>
</h2>
		                    <span class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</span>
							<i class="icon moren3x choose3x fr"></i>
		                    <p><?php echo $_smarty_tpl->tpl_vars['item']->value['area_string'];?>
</p>
		                    <input type="hidden" id="user_address_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_address_id'];?>
"/>
						</div>
		                <?php } ?>
						<div class="fill_address clearfix">
							<input type="text" placeholder="填写收货人姓名" class="fill_address_name" id="realname"/>
							<input type="tel" placeholder="填写手机号码" class="fill_address_tel" id="mobile"/>
							<select class="fl" name="sele" id="province_id">
								<option value="">省</option>
		                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['province_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['province_name'];?>
</option>
		                        <?php } ?>
							</select>
							<select class="fl" name="sele1" id="city_id">
								<option value="">市</option>
							</select>
							<select class="fl" name="sele2" id="area_id">
								<option value="">区</option>
							</select>
							<textarea placeholder="填写详细地址" id="address"></textarea>
							<i class="icon choose_s3x fl"></i>
							<span class="fl">保存到游戏信息</span>
							<input type="radio" id="rad" style="display: none;" />
						</div>
						<div class="add_address clearfix">
							<p class="fl">添加其他地址</p>
							<i class="icon add3x fr"></i>
						</div>
						<input type="button" value="确定" class="js_dizhi_btn" />
					</div>
				</div>
			</div>
		</div>
	<!--选择游戏账号弹层-->
		<div class="gouyu_layer js_choose_account" style="display:none">
			<div style="width: 100%;height: 100%;display: table;">
				<div style="width: 100%;display: table-cell;vertical-align:middle;">
					<div class="game_account">
						<span class="icon CancelCopy3x"></span>
						<h1>请选择游戏账号</h1>
						
						<ul class="id_account">
		                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_game_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
							<li class="clearfix">
								<div class="fl id_account_cont">
		                            <p><?php echo $_smarty_tpl->tpl_vars['item']->value['game_name'];?>
</p>
		                            <span><?php echo $_smarty_tpl->tpl_vars['item']->value['game_account'];?>
</span>
								</div>
		                        <input type="hidden" id="user_game_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_game_id'];?>
"/>
								<i class="icon moren3x fr choose3x"></i>
							</li>
		                    <?php } ?>
						</ul>
						<div class="game_box clearfix" style="display: none;">
							<select name="sele3">
								<option value="">选择游戏名称</option>
		                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['game_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['game_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['game_name'];?>
</option>
		                        <?php } ?>
							</select>
							<input type="text" placeholder="输入数字ID+游戏昵称" id="game_id" />
							<input type="text" placeholder="输入Steam URL(必填)" id="game_url" />
							<h5 class="url_hint">注意：请正确填写Steam URL，自动发货即将上线<br>(可百度"Steam URL")查找教程</h5>
							<i class="icon choose_s3x fl"></i>
							<p class="fl">保存到游戏信息</p>
							<input type="radio" id="rad1" style="display: none;"/>
						</div>
						<div class="add_account clearfix">
							<p class="fl">添加其他账号</p>
							<span class="icon add3x fr"></span>
						</div>
						<div class="game_btn">
							<input type="button" value="确定" class="js_yanzheng_btn" />
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--购买数量-->
		<div class="gouyu_layer js_number_layer" style="display: none;">
			<div class="number_layer clearfix">
				<i class="icon CancelCopy3x fr number_layer_i"></i>
				<div class="number_box2 clearfix">
					<h1 class="fl">购买数量</h1>
					<div class="number_box_cont fr clearfix">
						<span class="fl number_box_left">-</span>
						<input type="number" placeholder="0" class="fl js_number_box" id="item_num" value="1"/>
						<span class="fl number_box_right">+</span>
					</div>
				</div>
				<div class="lottery_btn">
					<input type="button" value="下一步" class="js_goumai" />
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
	
		<script type="text/javascript" src="__JS__/front/front_js/swiper.3.1.2.jquery.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" ></script>
        <!--<script type="text/javascript" src="__JS__/front/front_js/layer.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" ></script>-->
        <!--<script type="text/javascript" src="__JS__/front/front_js/jquery.lazyload.js"></script>
		<script type="text/javascript" src="__JS__/front/front_js/lazyload_img.js"></script>-->
		<script>
			var mySwiper = new Swiper('.swiper-container',{
					pagination : '.swiper-pagination',
					lazyLoading : true,
				})
var is_real = parseInt('<?php echo $_smarty_tpl->tpl_vars['item_info']->value['is_real'];?>
');
var item_id = parseInt('<?php echo $_smarty_tpl->tpl_vars['item_info']->value['item_id'];?>
');
var mall_price = parseInt('<?php echo $_smarty_tpl->tpl_vars['item_info']->value['mall_price'];?>
');
var left_money = parseInt('<?php echo $_smarty_tpl->tpl_vars['left_money']->value;?>
');
var user_game_id = 0;
var save_game = 0;
var user_address_id = 0;
var save_address = 0;
var is_open = parseInt('<?php echo $_smarty_tpl->tpl_vars['is_open']->value;?>
');
var close_message = '<?php echo $_smarty_tpl->tpl_vars['system_config']->value['CLOSE_EXCHANGE_ALERT'];?>
';
var item_num = 1;
			$(function()
			{
			/*轮播图*/
				var clientWidth = $(window).width();
				var imgh=clientWidth*(67/100);
				$(".swiper-slide img").height(imgh);
			/*兑换规则*/
				$(".adornment_exchange").on("click",function()
				{
					$(this).find("p").toggle();
					$(this).find("span").toggleClass("up3x");
				});
			/*兑换成功弹层*/
				$(".js_adornment_btn").on("click",function()
				{
                   //如果已关闭则不能兑换
                   if (!is_open) {
                        $(".js_close_alert").show();
                        return;
                    }
                   //余额是否足够
                   if (left_money < mall_price) {
                       $(".js_exchange_failed").show();
                       return;
                   }

					$(".js_number_layer").show();
					$("body").addClass("body_scroll");

                    //if (is_real) {
                    //     $(".js_address_layer").show();
                    //} else {
                    //     $(".js_choose_account").show();
                    //}
                    
					//$(".js_exchange_success").show();
					// $("body,html").addClass("body_scroll");
				});
			/*关闭*/
				$(".exchange_success>span").on("click",function()
				{
					$(".js_exchange_success").hide();
					$(".js_exchange_failed").hide();
					// $("html,body").removeClass("body_scroll");
				});
				$(".no_exchange>span").on("click",function()
				{
					$(".js_close_alert").hide();
					// $("html,body").removeClass("body_scroll");
				});
			/*兑换失败弹层*/
				//$(".js_adornment_btn").on("click",function()
				//{
				//	$(".js_exchange_failed").show();
				//	$("body,html").addClass("body_scroll");
				//});
			/*选择收货地址*/
				$(".js_success_btn").on("click",function()
				{
					$(".js_address_layer").show();
					$(".js_exchange_failed").hide();
					// $("html,body").addClass("body_scroll");
				});
				$(".address_box_cont").on("click",function()
				{
                    user_address_id = $(this).children("#user_address_id").val();
					$(".fill_address").hide();
					$(".add_address").show();
					$(this).addClass("id_account_li").siblings().removeClass("id_account_li");
				});
			/*关闭*/
				$(".address_box>span").on("click",function()
				{
					$(".js_address_layer").hide();
					$(".fill_address").hide();
					$(".add_address").show();
					// $("html,body").removeClass("body_scroll");
				});
			/*添加收货地址*/
				$(".add_address").on("click",function()
				{
                    user_address_id = 0;
					$(".fill_address").show();
					$(".add_address").hide();
					$(".address_box_cont").removeClass("id_account_li");
					$(".fill_address>i").removeClass("icon").addClass("wei");
				});
			/*选择游戏弹层*/
				$(".add_account").on("click",function()
				{
                    user_game_id = 0;
					$(".game_box").show();
					$(this).hide();
					$(".game_box>i").removeClass("icon").addClass("wei");
					$(".id_account>li").removeClass("id_account_li");
				});
				
				$(".id_account>li").on("click",function()
				{
                    user_game_id = $(this).children("#user_game_id").val();
					$(this).addClass("id_account_li").siblings().removeClass("id_account_li");
					$(".game_box").hide();
					$(".add_account").show();
				});
			/*关闭*/
				$(".game_account>span").on("click",function()
				{
					$(".js_choose_account").hide();
					// $("html,body").removeClass("body_scroll");
					$(".game_box").hide();
					$(".add_account").show();
				});
			/*保存到游戏信息*/
				$(".fill_address>i,.fill_address>span").on("click",function()
				{
					$(".fill_address>i").toggleClass("wei").toggleClass("icon");
					if($(".fill_address>i").hasClass("wei"))
					{
                        save_address = 0;
						$("#rad").attr("checked",false);
					}
					else
					{
                        save_address = 1;
						$("#rad").attr("checked",true);
					}
				});
				
				$(".game_box>i,.game_box>p").on("click",function()
				{
					$(".game_box>i").toggleClass("wei").toggleClass("icon");
					if($(".game_box>i").hasClass("wei"))
					{
                        save_game = 0;
						$("#rad1").attr("checked",false);
					}
					else
					{
                        save_game = 1;
						$("#rad1").attr("checked",true);
					}
				});
				
			/*显示购买数量*/
				//$(".js_adornment_btn").on("click",function()
				//{
				//	$(".js_number_layer").show();
				//	$("body").addClass("body_scroll");
				//});
			/*关闭购买数量*/
				$(".number_layer_i").on("click",function()
				{
					$(".js_number_layer").hide();
				});
				$(".js_goumai").on("click",function()
				{
                    item_num = $('#item_num').val();
                    if (item_num <= 0) {
                       alert_message('商品数量不得小于1');           
                       return;
                     } else {
                        $(".js_number_layer").hide();

                        if (is_real) {
                             $(".js_address_layer").show();
                        } else {
                             $(".js_choose_account").show();
                        }
                     }
				});
			/*点击增加*/
				$(".number_box_right").on("click",function()
				{
					var num = $(".js_number_box").val();
					num ++;
					$(".js_number_box").val(num);
					
					var sum = num*100;
					$(".number_balance>p>i").html(sum);
				});
			/*点击减少*/
				$(".number_box_left").on("click",function()
				{
					var num = $(".js_number_box").val();
					if($(".js_number_box").val()>1)
					{
						num --;
						$(".js_number_box").val(num);
						
						var sum = num*100;
						$(".number_balance>p>i").html(sum);
					}
				});
				
			/*表单验证*/
				$(".js_dizhi_btn").on("click",function()
				{	
                    //验证余额是否足够
                    if (left_money < mall_price * item_num) {
						//layer.open({
						//	 	content: '余额不足',
						//	 	title: false,
						//	   	btn: ['确定'],
						//	});
                        $(".js_address_layer").hide();
                       $(".js_exchange_failed").show();
                       return;
						}
					if($(".fill_address").is(":visible"))
					{
                        var realname = $(".fill_address_name").val();
						if(realname.length<1){
							layer.open({
							 	content: '请输入收货人姓名',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
                        var mobile = $(".fill_address_tel").val();
						if(mobile.length<1){
							layer.open({
							 	content: '请输入手机号',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
						if(mobile.length!=11){
							layer.open({
							 	content: '请输入正确的手机号',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
						
						var sele = $('select[name="sele"]').val();
						var sele1 = $('select[name="sele1"]').val();
						var sele2 = $('select[name="sele2"]').val();
						if(sele == ""){
							layer.open({
							 	content: '请选择省',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
						if(sele1 == ""){
							layer.open({
							 	content: '请选择市',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
						if(sele2 == ""){
							layer.open({
							 	content: '请选择区',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
                        var address = $("textarea").val();
						if(address==""){
							layer.open({
							 	content: '请输入详细地址',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
                        var datas = "item_id="+item_id+"&item_num="+item_num+"&type=2&realname="+realname+"&mobile="+mobile+"&province_id="+sele+"&city_id="+sele1+"&area_id="+sele2+"&address="+address+"&save_address="+save_address;
					} else {
                        console.log(user_address_id);
                        if (!user_address_id) {
						layer.open({
							 	content: '请选择地址',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
                        } 
                        var datas = "item_id="+item_id+"&item_num="+item_num+"&type=1&user_address_id="+user_address_id;
                    }
                    submit_exchange_item(datas, 2);

				});

				$(".js_yanzheng_btn").on("click",function()
				{
                    //验证余额是否足够
                    if (left_money < mall_price * item_num) {
                       $(".js_choose_account").hide();
                       $(".js_exchange_failed").show();
                       return;
                    }
                                 
					if($(".game_box").is(":visible"))
					{
						var sele = $('select[name="sele3"]').val();
						if(sele == ""){
						layer.open({
							 	content: '请选择游戏',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
                        var game_account = $("#game_id").val();
						if(game_account ==""){
						layer.open({
							 	content: '输入数字ID+游戏昵称',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
						var game_url = $("#game_url").val();
						if(game_url ==""){
						layer.open({
							 	content: '输入Steam URL',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
						var url="https://steamcommunity.com/tradeoffer";
                        if(!$("#game_url").val().indexOf(url)=="0"){
							layer.open({
							content: '您填写的steam URL格式不正确',
							btn: ['确定'],
							});
						$("#game_url").focus();
						return;
						}
                        //var datas = "item_id="+item_id+"&item_num="+item_num+"&type=2&game_id="+sele+"&game_account="+game_account+"&save_game="+save_game+"&steam_url="+game_url;
                         var datas = {
                            'item_id':item_id,
                            'item_num':item_num,
                            'type':2,
                            'game_id':sele,
                            'game_account':game_account,
                            'save_game':save_game,
                            'steam_url':game_url
                         };

                    } else {
                        console.log(user_game_id);
                        if (!user_game_id) {
						layer.open({
							 	content: '请选择游戏账号',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
                        } 
                        var datas = "item_id="+item_id+"&item_num="+item_num+"&type=1&user_game_id="+user_game_id;
                    }

                    submit_exchange_item(datas, 1);
				});


                     $(".js_go_on").on('click', function(){
                        window.location.reload();
                     });
			});



                                 //异步提交方法
                                //提交数据
                                 function submit_exchange_item(datas, state)
                                 {
                                 $.ajax({
                                      type: "POST", //用POST方式传输
                                      url: "/FrontMall/exchange_item",
                                      data: datas,
                                      dataType: 'json',
                                      error: function (XMLHttpRequest, textStatus, errorThrown) { },
                                      success: function (d){
                                          console.log(d);
                                          if (d.code == '500')
                                          {
                                              $(".js_exchange_success").find('a').attr('href', '/FrontUser/exchange_detail/order_id/'+d.order_id);
                                              $(".js_exchange_success").show();
                                                if (state == 1) {
                                                  $(".js_choose_account").hide();
                                                 } else {
                                                  $(".js_address_layer").hide();
                                                 }
                                              // $("html,body").addClass("body_scroll");
                                          }
                                          else if (d.code == '401')
                                          {
                                              $(".js_exchange_failed").show();
                                                if (state == 1) {
                                                  $(".js_choose_account").hide();
                                                 } else {
                                                  $(".js_address_layer").hide();
                                                 }
                                              // $("html,body").addClass("body_scroll");
                                          }
                                          else 
                                          {
                                              //$(".js_choose_account").hide();
                                              alert_message(d.msg);
                                          }
                                      }
                                  });
                                 }
		</script>

</body>
</html>
 
<?php }} ?>