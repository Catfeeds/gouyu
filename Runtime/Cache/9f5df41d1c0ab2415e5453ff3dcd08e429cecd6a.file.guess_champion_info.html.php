<?php /* Smarty version Smarty-3.1.6, created on 2016-10-26 15:00:24
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontGuess/guess_champion_info.html" */ ?>
<?php /*%%SmartyHeaderCode:213012108457c005ab6e5145-33234852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f5df41d1c0ab2415e5453ff3dcd08e429cecd6a' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontGuess/guess_champion_info.html',
      1 => 1476252845,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213012108457c005ab6e5145-33234852',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c005ab86611',
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
<?php if ($_valid && !is_callable('content_57c005ab86611')) {function content_57c005ab86611($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
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
			background-color:#202020;
		}
		.guess_info_head{
			background-color:#D6AA69;
		}
		.guess_info_head h1{
			font-size:.8rem;
			width:100%;
			text-align:center;
			line-height:normal;
		}
		.guess_champion_cont{
			background:initial;
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
            <h1 class="txt_limit">已有<?php echo (($tmp = @$_smarty_tpl->tpl_vars['guess_champion_info']->value['people_num'])===null||$tmp==='' ? 0 : $tmp);?>
人参与竞猜，共投注<?php echo intval((($tmp = @$_smarty_tpl->tpl_vars['guess_champion_info']->value['total_money'])===null||$tmp==='' ? 0 : $tmp));?>
鱼翅</h1>
		</div>
		<div class="guess_champion_cont ">
            <div class="info_time"><?php if ($_smarty_tpl->tpl_vars['guess_champion_status']->value){?><?php if ($_smarty_tpl->tpl_vars['guess_champion_info']->value['is_start']==0){?><?php echo $_smarty_tpl->tpl_vars['left_time']->value;?>
截止<?php }?><?php }else{ ?>已截止<?php }?></div>
			<img src="<?php echo $_smarty_tpl->tpl_vars['guess_champion_info']->value['img_path'];?>
" class="bg_img"/>
			<!-- bg_img 背景图 -->
			<p class="guess_champion_p"></p>
		</div>
        <h1 class="guess_champion_tit"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['guess_champion_info']->value['title'])===null||$tmp==='' ? '--' : $tmp);?>
</h1>
		<div class="guess_champion_main clearfix">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_champion_team_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<a class="troop_box fl" href="javascript:;">
                <input type="hidden" id="guess_champion_team_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['guess_champion_team_id'];?>
"/>
                <img data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['team_logo'];?>
" class="lazy"/>
                <h1 class="txt_limit"><?php echo $_smarty_tpl->tpl_vars['item']->value['team_name'];?>
</h1>
                <h2>（<span><?php echo $_smarty_tpl->tpl_vars['item']->value['odds'];?>
</span>）</h2>
			</a>
            <?php } ?>
		</div>
		<div class="guess_champion_hint rel">
			<h1 class="abs">友情提示：</h1>
            <div class="clearfix box1"><span class="fl"><i></i></span><h2 class="fl">时间地点：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['guess_champion_info']->value['start_time'],"%Y.%m.%d");?>
-<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['guess_champion_info']->value['end_time'],"%Y.%m.%d");?>
-<?php echo $_smarty_tpl->tpl_vars['guess_champion_info']->value['address'];?>
</h2></div>
            <div class="clearfix box2"><span class="fl"><i></i></span><p class="fl">参赛队伍：
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['guess_champion_team_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <?php echo $_smarty_tpl->tpl_vars['item']->value['team_name'];?>

                <?php if ($_smarty_tpl->tpl_vars['key']->value+1!=$_smarty_tpl->tpl_vars['guess_champion_team_num']->value){?> 、<?php }?>
                <?php } ?>
                </p></div>
		</div>
		<div class="bottom_3rem"></div>
		<!-- 投注弹窗 -->
		<form id="form1" action="" method="POST">
			<div class="guess_shade"></div>
			<div class="guess_doing_layer">
				<div class="doing_layer_top clearfix">
					<h1 class="doing_layer_h1 fl">冠军获得者是？</h1><span class="doing_layer_span fl">Escape(1.83)</span>
				</div>
				<div class="doing_layer_cont clearfix">
					<label class="fl" for="bet">投注鱼翅</label>
					<input class="bet" id="bet" type="number" placeholder="最低投注100鱼翅"/>
				</div>
				<div class="doing_layer_bet">
					<h1>(投注金额：<span>0</span>元)</h1>
					<h2>可赢鱼翅：<span></span></h2>
                    <h3>当前余额：<span><?php echo $_smarty_tpl->tpl_vars['left_money']->value;?>
</span></h3>
				</div>
				<div class="doing_layer_footer clearfix">
					<a href="javascript:;" class="out">取消</a>
					<a href="javascript:;" class="yes">确认投注</a>
				</div>
			</div>
			<div class="guess_doing_layer2">
				<div class="doing_laye2_top clearfix"><i class="icon2 jcsuccess fl"></i><p class="fl">竞猜成功</p></div>
				<br/>
				<div class="doing_layer_top clearfix">
					<h1 class="doing_layer_h1 fl">冠军获得者是？</h1><span class="doing_layer_span fl">Escape(1.83)</span>
					<div class="doing_layer_bet">
						<h5>投注鱼翅：<span></span></h5>
						<h2>可赢鱼翅：<span></span></h2>
					</div>
				</div>
				<input type="button" value="继续其他投注" class="doing_layer_bt"/>
			</div>
			<div class="reg_hint clearfix">
				<i class="icon2 fl szzhuyi"></i>
				<p>请填写大于100的整数</p>
			</div>
		</form>

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
var left_money = parseInt('<?php echo $_smarty_tpl->tpl_vars['left_money']->value;?>
');
var guess_champion_id = parseInt("<?php echo $_smarty_tpl->tpl_vars['guess_champion_info']->value['guess_champion_id'];?>
");
var guess_champion_team_id = 0;
var guess_champion_status = parseInt(<?php echo $_smarty_tpl->tpl_vars['guess_champion_status']->value;?>
);
var max_bat = '<?php echo $_smarty_tpl->tpl_vars['system_config']->value['MAX_CHAMPION_BAT'];?>
';

			$(function(){
				var bet_cont_odds
				var reg100=/^[1-9]{1}\d{2,}$/
				var reg=/^(-)?\d+$/
				$(".troop_box").on("click",function(){
                    //是否可以投
                    if (!guess_champion_status) {
                        alert_message('此冠军猜不能投注');
                        return;
                    }
					$(".guess_shade").show();
					$(".guess_doing_layer").show();
					$("body").css("overflow","hidden");
					var bet_cont_span =$(this).find("h1").text();
					var bet_cont_span2 =$(this).find("h2").text();
					$(".doing_layer_span").html(bet_cont_span+bet_cont_span2);
					bet_cont_odds =$(this).find("h2").find("span").html();

                    guess_champion_team_id = $(this).children("#guess_champion_team_id").val();
				})
				// 弹窗赋值
				$("#bet").keyup(function(){
					var this_val=$(this).val()
					// 输入验证
					if(reg.test(this_val)){
						
					}else{
						$(".reg_hint").show();
						    setTimeout(function () {
					        $(".reg_hint").hide();
					    }, 2000);
					}
					var bet_num =Number(this_val/100)
					var bet_num2 =Math.round(Number(bet_cont_odds)*Number(this_val))
					$(".doing_layer_bet h1").find("span").html(bet_num)
					$(".doing_layer_bet h2").find("span").html(bet_num2)
					$(".doing_layer_bet h5").find("span").html(this_val)
				})
				// 提交验证
				$(".doing_layer_footer .yes").on("click",function(){
					var bet_val=$("#bet").val();
					if(reg.test(bet_val) && reg100.test(bet_val)){
					}else{
						$(".reg_hint").show();
						    setTimeout(function () {
					        $(".reg_hint").hide();
					    }, 2000);
						return;
					}
                    if (bet_val > left_money) {
                        alert_message('余额不足, 请先去充值吧');
                        return;
                    }
                     $.ajax({
                          type: "POST", //用POST方式传输
                          url: "/FrontGuess/bat_guess_champion",
                          data: {"guess_champion_team_id":guess_champion_team_id, "guess_champion_id":guess_champion_id, "add_money":bet_val},
                          error: function (XMLHttpRequest, textStatus, errorThrown) { },
                          success: function (msg){
                              console.log(msg);
                              if(msg == 'success') 
                              {
                                  $(".guess_doing_layer").hide();
                                  $(".guess_doing_layer2").show();
                                  return;
                              }
                              else if (msg == 'max') 
                              {
                                  alert_message('已到达投注上限（单个队伍投注上限'+max_bat+'鱼翅）');
                              }
                              else 
                              {
                                  alert_message('出错了，请稍后再试');
                              }
                          }
                      });
				})
				$(".doing_layer_footer .out").on("click",function(){
					$(".guess_shade").hide();
					$(".guess_doing_layer").hide();
					$("body").css("overflow","auto");
                    guess_champion_team_id = 0;
				})
				//最后的结果与提交
				$(".doing_layer_bt").on("click",function(){
					$(".guess_shade").hide();
					$(".guess_doing_layer2").hide();
					$("body").css("overflow","auto");
                    location.reload();
				})
			})

		</script>

</body>
</html>
 
<?php }} ?>