<?php /* Smarty version Smarty-3.1.6, created on 2017-04-07 21:25:01
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/treasure_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:40045638757c290debe3ad3-75267286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '169386fcbeaefb05767e25f661111cfd24512fdc' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/treasure_detail.html',
      1 => 1489146590,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40045638757c290debe3ad3-75267286',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c290decbebc',
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
<?php if ($_valid && !is_callable('content_57c290decbebc')) {function content_57c290decbebc($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
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
	
  	<!--福利专区夺宝详情提示  周流水要求可以在添加时有个输入框设置-->
    <?php if ($_smarty_tpl->tpl_vars['treasure_info']->value['is_fuli']){?>
    <p class="account-require">参与此项本周流水须达到<span><?php echo $_smarty_tpl->tpl_vars['treasure_info']->value['limit_fuli_money'];?>
</span>鱼翅</p>
    <?php }?>
	<!--大图-->
    <img src="<?php echo $_smarty_tpl->tpl_vars['treasure_info']->value['img_path'];?>
" class="indiana_img" />
    
    <!--福利专区夺宝详情弹窗提示                                若用户没有达到周流水要求，则该弹框显示-->
    <div class="welfare-popup-wrap">
    	<div class="welfare-popup-bg"></div>
    	<div class="welfare-popup-cont">
    		<h3>提示</h3>
    		<p>您未满足本次参与条件，福利不停，您可以下次参与</p>
    		<span class="welfare-popup-know">我知道了</span>
    		<div class="welfare-popup-fork"></div>
    	</div>
    </div>
	<!--夺宝进度-->
		<div class="indiana_main">
            <h1><?php echo $_smarty_tpl->tpl_vars['treasure_info']->value['prize_name'];?>
</h1>
			<div class="indiana_props clearfix">
                <p class="fl">期数：第<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['periods'])===null||$tmp==='' ? 1 : $tmp);?>
</span>期</p>
                <p class="fr">夺宝进度：<span class="home_span_txt"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['prop_deg'])===null||$tmp==='' ? 0 : $tmp);?>
%</span></p>
			</div>
			<div class="indiana_color" data-perc="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['prop_deg'])===null||$tmp==='' ? 0 : $tmp);?>
">
				<div class="indiana_color_cont"></div>
			</div>
			<div class="indiana_number clearfix">
                <p class="fl">已参与：<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['people_num'])===null||$tmp==='' ? 0 : $tmp);?>
</span>人次</p>
                <p class="fr">限购<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['each_person_times'])===null||$tmp==='' ? 1 : $tmp);?>
</span>人次/天</p>
			</div>
			<div class="indiana_remaining clearfix">
				<p class="fl indiana_remaining_right">剩余</p>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['left_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <span class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</span>
                <?php } ?>
				<p class="fl indiana_remaining_left">人次</p>
			</div>
			<div class="indiana_time">
                <?php if ($_smarty_tpl->tpl_vars['my_treasure_list']->value){?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['my_treasure_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <p>我已参与：<i>1</i>人次&nbsp;夺宝号码：<span><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</span>&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</p>
                <?php } ?>
                <?php }else{ ?>
				<p>您还没有参与此次夺宝哦！</p>
                <?php }?>
			</div>
		</div>
	<!--选项菜单-->
		<div class="indiana_menu">
			<ul>
				<li class="clearfix">
					<h1 class="fl">夺宝规则</h1>
					<span class="icon down3x fr"></span>
					<p>
                    <?php echo $_smarty_tpl->tpl_vars['rule_contents']->value;?>

                    </p>
				</li>
				<li class="clearfix">
					<h1 class="fl">开奖规则</h1>
					<span class="icon down3x fr"></span>
					<p>
                    <?php echo $_smarty_tpl->tpl_vars['open_contents']->value;?>

                    </p>
				</li>
			</ul>
		</div>
	<!--开奖记录-->
        <?php if (!$_smarty_tpl->tpl_vars['treasure_user_list']->value){?>
		<div class="lottery_box">
            <div class="lottery_title clearfix" style="margin-bottom: 0;border-bottom: none;" onclick="redirect('<?php echo $_smarty_tpl->tpl_vars['award_record_by_prize_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['treasure_info']->value['prize_id'];?>
')">
				<p class="fl">往期开奖记录</p>
				<span class="fr icon right3x"></span>
			</div>
			<div class="lottery_line"></div>
        <?php }else{ ?>
        <div class="lottery_box">
			<a href="<?php echo $_smarty_tpl->tpl_vars['award_record_by_prize_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['treasure_info']->value['prize_id'];?>
" class="lottery_title clearfix">
				<p class="fl">往期开奖记录</p>
				<span class="fr icon right3x"></span>
			</a>
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
</span>人次&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</li>
				</ul>
			</div>
            <?php } ?>
        <?php }?>
			<div class="lottery_btn">
            <?php if ($_smarty_tpl->tpl_vars['treasure_info']->value['people_num']<$_smarty_tpl->tpl_vars['treasure_info']->value['total_person_times']){?>
				<input type="button" value="参与本次夺宝" class="js_lottery_btn" />
            <?php }else{ ?>
				<input type="button" value="夺宝已结束" />
            <?php }?>
			</div>
		</div>
		
	<!--参与人次弹框-->
		<div class="gouyu_layer js_add_times" style="display: none;">
			<div class="number_layer">
				<span class="icon CancelCopy3x"></span>
				<h1>参与人次</h1>
				<div class="number_box1 clearfix">
					<span class="fl number_box_left">－</span>
					<input type="number" class="fl js_number_box" value="10" />
					<span class="fl number_box_right">＋</span>
				</div>
				<div class="number_specific clearfix">
					<input type="button" value="20" class="fl number_specific_20" />
					<input type="button" value="50" class="fl number_specific_50" />
					<input type="button" value="100" class="fl number_specific_100" />
				</div>
				<div class="number_warn">
					<span>*</span>
                    <p>限购<?php echo (($tmp = @$_smarty_tpl->tpl_vars['treasure_info']->value['each_person_times'])===null||$tmp==='' ? 1 : $tmp);?>
人次/天</p>
				</div>
				<div class="number_balance">
					<p>每人次需要100鱼翅，共计<i id="sum_money">1000</i>鱼翅</p>
                    <span>当前鱼翅余额:<?php echo $_smarty_tpl->tpl_vars['left_money']->value;?>
</span>
				</div>
				<div class="lottery_btn">
					<input type="button" value="确认夺宝" class="js_number_btn" />
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
							<input type="button" value="确定" class="js_game_btn" />
						</div>
					</div>
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
	
		<script type="text/javascript" src="__JS__/front/front_js/jquery.lazyload.js"></script>
		<script type="text/javascript" src="__JS__/front/front_js/lazyload_tx.js"></script>
		<script>
var LIMIT_MONEY = 100;
var left_money = parseFloat("<?php echo $_smarty_tpl->tpl_vars['left_money']->value;?>
");
var each_person_times = parseInt('<?php echo $_smarty_tpl->tpl_vars['treasure_info']->value['each_person_times'];?>
');
var treasure_id = parseInt("<?php echo $_smarty_tpl->tpl_vars['treasure_info']->value['treasure_id'];?>
");
var can_fuli = parseInt("<?php echo $_smarty_tpl->tpl_vars['can_fuli']->value;?>
");
var user_game_id = 0;
var save_game = 0;
var opt= 0;

			$(function()
			{
				$(".home_main>li:even").css("float","left");
				$(".home_main>li:odd").css("float","right");

				$(".js_number_box").keyup(function(){
                    var num = $(this).val();
                    if (num <= 0) {
                        //alert_message('次数不得小于0');
                        $(this).val();
                        $("#sum_money").html(0);
                    } else {
                        $("#sum_money").html(num * 100);
                    }
                });

				$(".indiana_color").each(function(){
					var t = $(this),
					dataperc = t.attr("data-perc");
					t.find(".indiana_color_cont").animate({width:dataperc+"%"});
				});
			/*夺宝规则*/
				$(".indiana_menu li").on("click",function()
				{
					$(this).find("p").toggle();
					$(this).find("span").toggleClass("up3x");
				});
			/*参与夺宝*/
				$(".js_lottery_btn").on("click",function()
				{
                    console.log(can_fuli);
                    if (!can_fuli) {
						$(".welfare-popup-wrap").css("display","block");
                        return;
                    } 
					$(".js_add_times").show();
					$("html,body").addClass("body_scroll");
				});
				/*关闭*/
				$(".number_layer>span").on("click",function()
				{
					$(".js_add_times").hide();
					$("html,body").removeClass("body_scroll");
				});
                //提交数据
				$(".js_number_btn").on("click",function()
				{ 
                    var add_times = $(".js_number_box").val();
                    if (add_times <= 0) {
                        alert_message('人次不能为空');
                        return;
                    }
                    //验证钱是否足够
                    var add_money = add_times * LIMIT_MONEY;
                    if (add_money > left_money) {
                        alert_message('余额不足');
                        return;
                    }
                    //次数限制
                    if (add_times > each_person_times) {
                        alert_message('超过了每人次数限制');
                        return;
                    }

					$(".gouyu_layer").hide();
                    $(".js_choose_account").show();
                });

			/*点击增加*/
				$(".number_box_right").on("click",function()
				{
					var num = $(".js_number_box").val();
					num ++;
					$(".js_number_box").val(num);
					
					var sum = num*LIMIT_MONEY;
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
						
						var sum = num*LIMIT_MONEY;
						$(".number_balance>p>i").html(sum);
					}
				});
			/*具体数字*/
				$(".number_specific>input").on("click",function()
				{
					var specific = $(this).val();
					$(".js_number_box").val(specific);
					
					
					var sum = specific*LIMIT_MONEY;
					$(".number_balance>p>i").html(sum);
				});

                /*选择游戏账号弹层*/
				$(".id_account>li").on("click",function()
				{
                    user_game_id = $(this).children("#user_game_id").val();
					$(this).addClass("id_account_li").siblings().removeClass("id_account_li");
					$(".game_box").hide();
					$(".add_account").show();
				});
				$(".game_account>span").on("click",function()
				{
					$(".js_choose_account").hide();
					$("body").removeClass("body_scroll");
					$(".game_box").hide();
					$(".add_account").show();
				});
			/*添加游戏账号弹层*/
				$(".add_account").on("click",function()
				{
                    user_game_id = 0;
					$(".game_box").show();
					$("body").removeClass("body_scroll");
					$(this).hide();
					$(".game_box>i").removeClass("icon").addClass("wei");
					$(".id_account>li").removeClass("id_account_li");
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
							 	content: '请输入游戏ID',
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
                        var datas = {'treasure_id':treasure_id,
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
                        var datas = {'treasure_id':treasure_id,
                                     'type':1,
                                     'user_game_id':user_game_id}
                    }

                    var add_times = $(".js_number_box").val();
                    if (add_times <= 0) {
                        alert_message('人次不能为空');
                        return;
                    }
                    //验证钱是否足够
                    var add_money = add_times * LIMIT_MONEY;
                    if (add_money > left_money) {
                        alert_message('余额不足');
                        return;
                    }
                    //次数限制
                    if (add_times > each_person_times) {
                        alert_message('超过了每人次数限制');
                        return;
                    }

                    datas['add_times'] = add_times;

                    if (opt == 1) return;
                    opt = 1;
                    //提交数据
                     $.ajax({
                          type: "POST", //用POST方式传输
                          url: "/FrontTreasure/submit_treasure",
                          data:datas, 
                          error: function (XMLHttpRequest, textStatus, errorThrown) { },
                          success: function (msg){
                              console.log(msg);
                              if(msg == 'failure') 
                              {
                                  opt = 0;
                                  alert_message('网络故障', 1);
                                  return false;
                              }
                              else if (msg == 'url_error')
                              {
                                  opt = 0;
                                  alert_message('您填写的steam URL格式不正确');
                                  return false;
                              }
                              else if (msg == 'success') 
                              {
                               // $("html,body").removeClass("body_scroll");
                                //$(".js_choose_account").hide();
                                  alert_message('夺宝成功', 1);
                              } else {
                              opt = 0;
                                alert_message(msg, 1);
                              }
                          }
                      });
				});

			});
			//夺宝福利详情弹窗
            if (can_fuli) {
			$(".welfare-popup-wrap").css({
				"height":$(window).height(),
                "display":"none"
			});
            } else {
			$(".welfare-popup-wrap").css({
				"height":$(window).height(),
			});
            }
			var welPopKnow = document.getElementsByClassName("welfare-popup-know")[0];
			var welPopFork = document.getElementsByClassName("welfare-popup-fork")[0];
			var welPopBg = document.getElementsByClassName("welfare-popup-bg")[0];
			function welfarePopShow(obj){
				obj.addEventListener("touchstart",function(e){
					$(".welfare-popup-cont").css("display","none");
					$(".welfare-popup-bg").css("display","none");
					setTimeout(function(){
						$(".welfare-popup-wrap").css("display","none");
                        window.location.href="/FrontTreasure/treasure_index.html";
					},300);
				});
			}
			welfarePopShow(welPopKnow);
			welfarePopShow(welPopFork);
			welfarePopShow(welPopBg);

		</script>

</body>
</html>
 
<?php }} ?>