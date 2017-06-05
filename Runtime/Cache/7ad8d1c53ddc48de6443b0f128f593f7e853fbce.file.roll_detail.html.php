<?php /* Smarty version Smarty-3.1.6, created on 2016-10-13 10:06:19
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/roll_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:175920297957c246a5748a85-80939209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ad8d1c53ddc48de6443b0f128f593f7e853fbce' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/roll_detail.html',
      1 => 1476324368,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175920297957c246a5748a85-80939209',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c246a5800fa',
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
<?php if ($_valid && !is_callable('content_57c246a5800fa')) {function content_57c246a5800fa($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
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
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/layer.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
	<!--内容-->
		<div class="roll_main">
            <img src="<?php echo $_smarty_tpl->tpl_vars['roll_info']->value['img_path'];?>
" class="roll_img" />
			<div class="enroll_box clearfix">
                <h1><?php echo $_smarty_tpl->tpl_vars['roll_info']->value['roll_name'];?>
</h1>
                <p>奖品:<?php echo $_smarty_tpl->tpl_vars['roll_info']->value['prize_name'];?>
</p>
				<i class="icon time3x fl"></i>
				<span class="fl will_txt">即将揭晓:</span>
                <h2 class="fl countdown_txt"><?php echo $_smarty_tpl->tpl_vars['roll_info']->value['left_time'];?>
</h2>
                <?php if (!$_smarty_tpl->tpl_vars['roll_user_info']->value){?>
				<div class="enroll_min_box clearfix">
					<h3>您还没有参与此次Roll哦！</h3>
				</div>
                <?php }else{ ?>
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
                <p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>
			</div>
		<!--已报名用户-->
			<div class="roll_user_box">
				<div class="roll_user_title clearfix">
                    <p class="fl">已报名用户(<i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['roll_user_num']->value)===null||$tmp==='' ? 0 : $tmp);?>
</i>人)</p>
                    <span class="fr user_title_span">自<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['roll_info']->value['start_time'],"%Y-%m-%d %H:%M:%S");?>
开始</span>
				</div>
                <?php if ($_smarty_tpl->tpl_vars['roll_user_list']->value){?>
				<ul>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roll_user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<li class="clearfix">
                        <img data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['headimgurl'];?>
" class="fl lazy" />
                        <p class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
                        <span class="fl"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span>
					</li>
                    <?php } ?>
				</ul>
                <?php }?>
			<!--已报名按钮-->
                <?php if (!$_smarty_tpl->tpl_vars['roll_user_info']->value){?>
				<div class="roll_user_btn for_btn">
					<input type="button" value="立即报名" class="js_for_btn" />
				</div>
                <?php }else{ ?>
				<div class="roll_user_btn">
					<input type="button" value="已报名" />
				</div>
                <?php }?>
			</div>
		</div>
	<!--报名成功弹层-->
		<div class="gouyu_layer js_enroll_success" style="background-color: rgba(0,0,0,0.9);display: none;">
			<div style="width: 100%;height: 100%;display: table;">
				<div style="width: 100%;display: table-cell;vertical-align:middle;">
					<div class="clearfix enroll_success">
						<span class="icon Cancel_big3x"></span>
						<i class="icon chengong3x fl"></i>
						<p class="fl">报名成功</p>
						<div class="duihuan_box">
		                    <p>您报名的<span><?php echo $_smarty_tpl->tpl_vars['roll_info']->value['roll_name'];?>
</span>报名成功。将于<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['roll_info']->value['end_time'],"%Y-%m-%d %H:%M:%S");?>
</span>开奖，请时刻关注</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--选择游戏账号弹层-->
		<div class="gouyu_layer js_choose_account" style="display: none;">
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
							<input type="text" placeholder="输入数字ID+游戏名" id="game_id" />
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
							<input type="button" value="确定" class="js_game_btn" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="gouyu_layer js_close_alert" style="background-color: rgba(0,0,0,0.9);display: none;">
			<div class="no_exchange">
				<span class="icon Cancel_big3x close_alert_btn"></span>
				<i class="icon fail3x"></i>
                <p>为了防止作弊，您需要往您的账户里充值任意数量的鱼翅才可参与ROLL。</br>充值教程请点击竞猜首页右上角的“竞猜规则”</p>
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
		<script>
var roll_id = parseInt('<?php echo $_smarty_tpl->tpl_vars['roll_info']->value['roll_id'];?>
');
var user_game_id = 0;
var save_game = 0;
var left_money = parseFloat('<?php echo $_smarty_tpl->tpl_vars['left_money']->value;?>
');
var roll_opt = 0;
			$(function()
			{
                $(".close_alert_btn").on("click", function(){
                    $(".js_close_alert").hide();
                });

			/*兑换规则*/
				$(".adornment_exchange").on("click",function()
				{
					$(this).find("p").toggle();
					$(this).find("span").toggleClass("up3x");
				});
			/*报名成功弹层*/
				/*$(".js_game_btn").on("click",function()
				{
					$(".js_enroll_success").show();
					$(".js_choose_account").hide();
					$("html,body").addClass("body_scroll");
				});*/
			/*关闭*/
				$(".enroll_success>span").on("click",function()
				{
					$(".js_enroll_success").hide();
					$("html,body").removeClass("body_scroll");
				});
			/*选择游戏账号*/
				$(".js_for_btn").on("click",function()
				{
                    //have left_money
                    if (left_money <= 0) {
                        $(".js_close_alert").show();
                        return;
                    }
					$(".js_choose_account").show();
					$("html,body").addClass("body_scroll");
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
					$("html,body").removeClass("body_scroll");
					$(".game_box").hide();
					$(".add_account").show();
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
                
				$(".js_game_btn").on("click",function()
				{
                    if (left_money <= 0) {
                        $(".js_close_alert").show();
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
							 	content: '输入数字ID+游戏名+URL',
							 	title: false,
							   	btn: ['确定'],
							});
							return;
						}
						var game_url = $("#game_url").val();
						if(game_url ==""){
						layer.open({
							 	content: '请输入Steam URL',
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
                        var datas = {'roll_id':roll_id,
                                     'type':2, 
                                     'game_id':sele, 
                                     'game_account':game_account, 
                                     'save_game':save_game, 
                                     'steam_url':game_url};
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
                        var datas = {'roll_id':roll_id,
                                     'type':1,
                                     'user_game_id':user_game_id}
                    }

                    if (roll_opt != 0) return;
                    roll_opt = 1;
                    //提交数据
                     $.ajax({
                          type: "POST", //用POST方式传输
                          url: "/FrontTreasure/submit_roll",
                          data: datas,
                          error: function (XMLHttpRequest, textStatus, errorThrown) { roll_opt = 0;},
                          success: function (msg){
                              console.log(msg);
                              if(msg == 'failure') 
                              {
                                  roll_opt = 0;
                                  alert_message('网络故障', 1);
                                  return false;
                              }
                              else if (msg == 'url_error')
                              {
                                  roll_opt = 0;
                                  alert_message('您填写的steam URL格式不正确');
                                  return false;
                              }
                              else 
                              {
                                  $(".js_enroll_success").show();
                                  $(".js_choose_account").hide();
                                  $("html,body").addClass("body_scroll");

                                  setTimeout("window.location.reload()", 2000);
                              }
                          }
                      });
				});
                
			});

		</script>

</body>
</html>
 
<?php }} ?>