<?php /* Smarty version Smarty-3.1.6, created on 2016-11-09 12:03:10
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontGuess/guess_info.html" */ ?>
<?php /*%%SmartyHeaderCode:123481622457bfa696b9d344-46004466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47f883c8f4d328ee14937f15df018856f58ae743' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontGuess/guess_info.html',
      1 => 1477619959,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123481622457bfa696b9d344-46004466',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57bfa696d359e',
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
<?php if ($_valid && !is_callable('content_57bfa696d359e')) {function content_57bfa696d359e($_smarty_tpl) {?><!doctype html>
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
        .short_money{
        	width:10.5rem;
			height:2.2rem;
			background-color: #fff;
			position:absolute;
			top:20rem;
			left:0;
			right:0;
			margin:auto;
			z-index: 9999;
			opacity: 0.9;
			border-radius: .4rem;
			display:none;
        }
        .short_money i{
			margin-top: .6rem;
			margin-left:.5rem;
			margin-right: .5rem;
		}
		.short_money p{
			font-size: .8rem;
			color:#000;
			height:2.2rem;
			line-height:2.2rem;
		}
		.guess_shade{
			opacity:0.5;
		}
		.take_del{
			height:7.4rem;
		}
		.take_del h1{
			font-size: .6rem;
			color:#909090;
			margin-top: .1rem;
		}
		.cont_share{
			position:absolute;
			width:100%;
			height:auto;
			background-color:rgba(0, 0, 0, 0.15);
			bottom:0;
			z-index: -1;
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
            <h1 class="txt_limit">已有<?php echo (($tmp = @$_smarty_tpl->tpl_vars['guess_user_info']->value['people_num'])===null||$tmp==='' ? 0 : $tmp);?>
人参与竞猜，共投注<?php echo intval((($tmp = @$_smarty_tpl->tpl_vars['guess_user_info']->value['total_money'])===null||$tmp==='' ? 0 : $tmp));?>
<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</h1>
		</div>
		<div class="guess_doing_cont ">
			<img src="/Public/Images/front/front_img/bg (1).jpg" class="bg_img"/>
			<div class="cont_share"></div>
			<!-- bg_img 背景图 -->
            <div class="info_time"><?php if ($_smarty_tpl->tpl_vars['guess_field_over']->value){?>已截止<?php }elseif($_smarty_tpl->tpl_vars['guess_field_info']->value['is_start']==0&&$_smarty_tpl->tpl_vars['left_time']->value){?><?php echo $_smarty_tpl->tpl_vars['left_time']->value;?>
截止<?php }?></div>
			<h1 class="guess_doing_tit">
                <?php echo $_smarty_tpl->tpl_vars['guess_info']->value['alert_message'];?>

			</h1>
			<!-- 补充文字 删除不改变布局-->
			<div class="team_box clearfix">
				<div class="fl team_img_box">
                    <?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==2){?>

                    <img data-original="/Public/Images/front/front_img/icon_dy.png" class="team_img lazy"/>
                    <h1 class="team_name"></h1>
                    <?php }else{ ?>

                    <img data-original="<?php echo $_smarty_tpl->tpl_vars['host_team_info']->value['team_logo'];?>
" class="team_img lazy"/>
                    <h1 class="team_name"><?php echo $_smarty_tpl->tpl_vars['host_team_info']->value['team_name'];?>
</h1>
                    <?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==0&&$_smarty_tpl->tpl_vars['guess_info']->value['is_over']&&$_smarty_tpl->tpl_vars['guess_info']->value['host_score']>$_smarty_tpl->tpl_vars['guess_info']->value['guest_score']){?><span class="victory"></span><?php }?>

                    <?php }?>

				</div>
				<div class="fr team_img_box">
                    <?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==2){?>

                    <img data-original="/Public/Images/front/front_img/icon_xy.png" class="team_img lazy"/>
                    <h1 class="team_name"></h1>

                    <?php }else{ ?>

                    <img data-original="<?php echo $_smarty_tpl->tpl_vars['guest_team_info']->value['team_logo'];?>
" class="team_img lazy"/>
                    <h1 class="team_name"><?php echo $_smarty_tpl->tpl_vars['guest_team_info']->value['team_name'];?>
</h1>
                    <?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==0&&$_smarty_tpl->tpl_vars['guess_info']->value['is_over']&&$_smarty_tpl->tpl_vars['guess_info']->value['host_score']<$_smarty_tpl->tpl_vars['guess_info']->value['guest_score']){?><span class="victory"></span><?php }?>

                    <?php }?>
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
			<div class="num_box">
				<div class="num_box1 clearfix">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['guess_field_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <a href="/FrontGuess/guess_info/guess_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['guess_id'];?>
/guess_field_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['guess_field_id'];?>
"
                     <?php if ($_smarty_tpl->tpl_vars['item']->value['over']=='no_over'){?>
                          <?php if ($_smarty_tpl->tpl_vars['item']->value['guess_field_id']==$_smarty_tpl->tpl_vars['guess_field_id']->value){?>
                             class="fl color_D6AA69"
                          <?php }else{ ?>
                             class="fl color_B8B8B8"
                          <?php }?>
                       <?php }else{ ?>
                             class="fl"
                       <?php }?>
                        ><?php echo $_smarty_tpl->tpl_vars['item']->value['guess_field_name'];?>
</a>
                    <?php } ?>
				</div>
			</div>
		</div>
		<div class="guess_doing_main">
            <?php if ($_smarty_tpl->tpl_vars['guess_champion_info']->value){?>
			<div class="doing_main_box">
				<div class="doing_tit_box clearfix">
                    <h1 class="fl"><?php echo $_smarty_tpl->tpl_vars['guess_champion_info']->value['title'];?>
</h1>
                    <h2 class="fr"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['guess_champion_info']->value['people_num'])===null||$tmp==='' ? 0 : $tmp);?>
人竞猜</h2>
				</div>
                <a class="doing_top_box clearfix" href="<?php echo $_smarty_tpl->tpl_vars['guess_champion_info_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['guess_champion_info']->value['guess_champion_id'];?>
">
					<div class="clearfix fl">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_champion_team_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
						<div class="fl win_team">
                            <img data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['team_logo'];?>
" class="lazy"/>
                            <h1><?php echo $_smarty_tpl->tpl_vars['item']->value['team_name'];?>
</h1>
						</div>
                        <?php } ?>
					</div>
					<i class="icon2 fl gjjiantouright" href="<?php echo $_smarty_tpl->tpl_vars['guess_champion_info_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['guess_champion_info']->value['guess_champion_id'];?>
"></i>
				</a>
			</div>
            <?php }?>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_field_question_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?> 
            <div class="doing_main_box <?php if ($_smarty_tpl->tpl_vars['guess_field_over']->value){?>over<?php }else{ ?>doing<?php }?>">
				<!-- 盒子添加类名doning为可下注的   over为不可下注的 -->
				<div class="doing_tit_box clearfix">
                    <h1 class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['question'];?>
</h1>
                    <?php if (0){?>
                    <h2 class="fr"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['join_people'])===null||$tmp==='' ? 0 : $tmp);?>
人竞猜</h2>
                    <?php }?>
				</div>
				<div class="true_team clearfix">
                    <input type="hidden" id="guess_field_question_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['guess_field_question_id'];?>
"/>
                    <div class="fl ">
                        <a href="javascript:;" id="1" class="dw_a <?php if ($_smarty_tpl->tpl_vars['item']->value['host_bat_money']){?>active<?php }?> <?php if ($_smarty_tpl->tpl_vars['item']->value['result']==1){?>victory<?php }?>"><?php if ($_smarty_tpl->tpl_vars['item']->value['defind_team_name']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['defind_host_name'];?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==2){?>大于<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['host_team_info']->value['team_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==1&&$_smarty_tpl->tpl_vars['item']->value['lose_type']==1){?><span class="rf">-<?php echo $_smarty_tpl->tpl_vars['item']->value['lose_score'];?>
</span><?php }?><?php }?>(<span id="odds"><?php echo $_smarty_tpl->tpl_vars['item']->value['host_odds'];?>
</span>)<i></i></a>
                       <?php if ($_smarty_tpl->tpl_vars['item']->value['host_bat_money']){?> <div class="tz_money">(投注：<?php echo $_smarty_tpl->tpl_vars['item']->value['host_bat_money'];?>
鱼翅)</div><?php }?>
                	</div>
                	<div class="fl">
                        <a href="javascript:;" id="2" class="dw_a <?php if ($_smarty_tpl->tpl_vars['item']->value['guest_bat_money']){?>active<?php }?> <?php if ($_smarty_tpl->tpl_vars['item']->value['result']==2){?>victory<?php }?>"><?php if ($_smarty_tpl->tpl_vars['item']->value['defind_team_name']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['defind_guest_name'];?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==2){?>小于<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['guest_team_info']->value['team_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==1&&$_smarty_tpl->tpl_vars['item']->value['lose_type']==2){?><span class="rf">-<?php echo $_smarty_tpl->tpl_vars['item']->value['lose_score'];?>
</span><?php }?><?php }?>(<span id="odds"><?php echo $_smarty_tpl->tpl_vars['item']->value['guest_odds'];?>
</span>)<i></i></a>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['guest_bat_money']){?><div class="tz_money">(投注：<?php echo $_smarty_tpl->tpl_vars['item']->value['guest_bat_money'];?>
鱼翅)</div><?php }?>
                	</div>
                    <?php if (!$_smarty_tpl->tpl_vars['guess_field_over']->value&&!$_smarty_tpl->tpl_vars['item']->value['is_cancel_bat']){?>
                    <a href="javascript:;" class="qx fr">取消下注</a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['host_bat_money']||$_smarty_tpl->tpl_vars['item']->value['guest_bat_money']){?>
                    <input type="hidden" id="is_bat_money" value="1"/>
                    <?php }?>
				</div>
				
				<!-- active 高亮 -->
				<!-- victory为胜利队伍 -->
			</div>
            <?php } ?> 
		</div>
		<!-- 投注弹窗 -->
		<form id="form1"  method="POST">
			<div class="guess_shade"></div>
			<div class="guess_doing_layer">
				<div class="doing_layer_top clearfix">
					<h1 class="doing_layer_h1 fl">第二局比赛的胜者是？</h1><span class="doing_layer_span fl">Escape(1.83)</span>
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
				<div class="doing_laye2_top clearfix" style="display: table;margin: 0 auto;"><i class="icon2 jcsuccess fl"></i><p class="fl">竞猜成功</p></div>
				<div class="doing_layer_top clearfix">
					<h1 class="doing_layer_h1 fl">第二局比赛的胜者是？</h1><span class="doing_layer_span fl">Escape(1.83)</span>
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
			<div class="short_money clearfix">
				<i class="icon2 fl szzhuyi"></i>
				<p>当前余额不足</p>
			</div>
			<div class="guess_shade"></div>
			<div class="take_del">
				<i class="icon2 sctishi"></i>
				<p>确定取消此次投注吗?</p>
				<h1>（一个盘口只允许退1次）</h1>
				<div class="take_del_box clearfix">
					<h1 class="fl yes">确定</h1>
					<h1 class="fl no">取消</h1>
				</div>
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
var left_money = parseFloat('<?php echo $_smarty_tpl->tpl_vars['left_money']->value;?>
');
var team_type = 0;
var guess_field_question_id = 0;
var bat_opt = 0;
var guess_field_over = parseInt(<?php echo $_smarty_tpl->tpl_vars['guess_field_over']->value;?>
);

			$(function(){
				var bet_cont_odds
				var reg100=/^[1-9]{1}\d{2,}$/
				var reg=/^(-)?\d+$/
				$(".true_team .dw_a").on("click",function(){
                    //判断是否已开盘或已结束的盘下问题
                    if (guess_field_over) {
                        alert_message('此局投注已结束');
                        return;
                    }

					var bet_cont =$(this).parent().parent().siblings(".doing_tit_box").find("h1").html();
					var bet_cont_span =$(this).text();
					$(".doing_layer_h1").html(bet_cont);
					$(".doing_layer_span").html(bet_cont_span);
					bet_cont_odds =$(this).find("#odds").html();
					$(".guess_shade").show();
					$(".guess_doing_layer").show();
					$("body").css("overflow","hidden");

                    team_type = $(this).attr("id");
                    guess_field_question_id = $(this).parent().siblings('#guess_field_question_id').val();
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
					$(".doing_layer_bet h1").find("span").html(bet_num)//投注金额
					$(".doing_layer_bet h2").find("span").html(bet_num2)//可赢鱼翅
					$(".doing_layer_bet h5").find("span").html(this_val)//余额
				})
				// 提交验证
				$(".doing_layer_footer .yes").on("click",function(){
					var bet_val=$("#bet").val();
					if(!reg.test(bet_val) || !reg100.test(bet_val)){
						$(".reg_hint").show();
						    setTimeout(function () {
					        $(".reg_hint").hide();
					    }, 2000);
						return;
					}
                    var add_money = $('#bet').val();
                    if (left_money < add_money){
						//$(".short_money").show();
						//    setTimeout(function () {
					    //    $(".short_money").hide();
					    //}, 2000);
                        alert_message("余额不足");
						return;
                    }

                    if (bat_opt == 1)  return;
                    bat_opt = 1;
                     $.ajax({
                          type: "POST", //用POST方式传输
                          url: "/FrontGuess/bat_guess",
                          data: {"team_type":team_type, "guess_field_question_id":guess_field_question_id, "add_money":add_money},
                          error: function (XMLHttpRequest, textStatus, errorThrown) { bat_opt = 0;},
                          success: function (msg){
                              bat_opt = 0;
                              console.log(msg);
                              if(msg == 'success') 
                              {
                                  $(".guess_doing_layer").hide();
                                  $(".guess_doing_layer2").show();
                                  return;
                              }
                              else if (msg == 'over')
                              {
                                  alert_message('此问题已结算，不能投注');
                              }
                              else 
                              {
                                  alert_message('出错了，请稍后再试', 1);
                              }
                          }
                      });
				})
				$(".doing_layer_footer .out").on("click",function(){
                    guess_field_question_id = 0;
                    team_type = 0;
					$(".guess_shade").hide();
					$(".guess_doing_layer").hide();
					$("body").css("overflow","auto");
				})


				// 取消下注
				$(".true_team .qx").on("click",function(){
                    var is_bat_money = $(this).siblings("#is_bat_money").val();
                    if (is_bat_money == 1) {
                        guess_field_question_id = $(this).siblings("#guess_field_question_id").val();

                        $(".guess_shade").show();
                        $(".take_del").show();
                        $(".footer").css("z-index","99")
                    } else {
                        alert_message("请先下注吧");
                    }
				})

				$(".take_del .yes").on("click",function(){
                    //处理取消
                    if (!guess_field_question_id) {
                        alert_message('网络故障，请稍后再试', 1);
                        return;
                    }

                     $.ajax({
                          type: "POST", //用POST方式传输
                          url: "/FrontGuess/ajax_cancel_bat",
                          data: {"guess_field_question_id":guess_field_question_id},
                          error: function (XMLHttpRequest, textStatus, errorThrown) { },
                          success: function (msg){
                              console.log(msg);
                              if(msg == 'success') 
                              {
                                  alert_message('已成功取消下注', 1);
                                  return;
                              }
                              else if (msg == 'no_have')
                              {
                                  alert_message('请先下注吧');
                                  return;
                              }
                              else 
                              {
                                  alert_message('出错了，请稍后再试', 1);
                              }
                          }
                      });
                    
				    $(".take_del").hide();
				    $(".guess_shade").hide();
				    $(".footer").css("z-index","1000")
				})
				$(".take_del .no").on("click",function(){
                    guess_field_question_id = 0;
				    $(".take_del").hide();
				    $(".guess_shade").hide();
				    $(".footer").css("z-index","1000")
				})

				//最后的结果与提交
				$(".doing_layer_bt").on("click",function(){
					//$("#form1").submit()
					//$(".guess_shade").hide();
					//$(".guess_doing_layer2").hide();
					//$("body").css("overflow","auto");
                    window.location.reload();
				})
				var s_h=parseInt($(".num_box").css("height"));
				var s_p=parseInt($(".guess_doing_cont ").css("padding-bottom"));
				var s_H=s_h+s_p
				$(".cont_share").height(s_H);

			})
		</script>


</body>
</html>
 
<?php }} ?>