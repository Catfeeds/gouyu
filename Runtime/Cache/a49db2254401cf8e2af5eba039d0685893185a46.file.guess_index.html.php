<?php /* Smarty version Smarty-3.1.6, created on 2016-11-10 17:37:31
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontGuess/guess_index.html" */ ?>
<?php /*%%SmartyHeaderCode:208271528457bebf9e6aa5e3-78597352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a49db2254401cf8e2af5eba039d0685893185a46' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontGuess/guess_index.html',
      1 => 1478770649,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208271528457bebf9e6aa5e3-78597352',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57bebf9e7c6c4',
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
<?php if ($_valid && !is_callable('content_57bebf9e7c6c4')) {function content_57bebf9e7c6c4($_smarty_tpl) {?><!doctype html>
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
		background-color: #1A1A1F;
	}

		#load_wrapper {
		  position:absolute; 
		  z-index:1;
		  top:2.35rem;
		  bottom: 0;
		  width:100%;
		  overflow:auto;  

		}
		#scroller{
		/*	background:#E8E8E8;*/
		}
		#pullUp{
			padding-bottom: 3rem;
			background-color: #202020;
			width:100%;
		}
		#load_wrapper{
			top:3.5rem;
		}
		.rank_main{
			display:none;
		}
		#rank_tit_bt i{
			-webkit-transform:rotate(180deg);
		}
		.guess_main .team_img{
			position: absolute;
		    top: 0px;
		    left: 0px;
		    right: 0px;
		    margin: auto;
		    width: 3rem;
		    height: 3rem;
		    border-radius: 50%;
		    border: 1px solid #D6AA69;
		}
		.guess_main .team_name{
			    position: relative;
			    bottom: 0;
			    padding-top: 3.3rem;
			    right: 0;
			    left: 0;
			    margin: auto;
			    font-size: .9rem;
			    color: #D6AA69;
			    line-height: 1.1rem;
			    word-break: break-all;
			    width: 100%;
		}
		.guess_main .team_img_box .victory{
			top: 2rem;
			background-size: 3.8rem 1.05rem;
			width: 3.8rem;
			height: 1.05rem;
		}
		.guess_main .team_img_box{
			width:3.8rem;
		}
		.gg_box{
			width:94%;
			padding:0 3%;
			background-color: #c02d14;
		}
		.bulletin_box{
			width: 87%;
			padding-left: 3%;
			height: 1.75rem;

			overflow: hidden;
			white-space: nowrap;
		}
		.bulletin_box>p{
			font-size: 0.7rem;
			color: #fff;
			line-height:1.75rem;
			margin-right: 3%;
			display: inline;
		}
		.gg_icon{
			background:url(/Public/Images/front/front_img/icon_tz.png)  no-repeat; 
			display:inline-block;
			background-size: 0.5rem 0.7rem;
			width:0.5rem;
			height:0.7rem;
			margin-top: .5rem;
			margin-right: .5rem;
		}
		.icon_hot{
			background:url(/Public/Images/front/front_img/icon_hot.png)  no-repeat; 
			display:inline-block;
			background-size: 1.15rem 1.4rem;
			width:1.15rem;
			height:1.4rem;
			position:absolute;
			top: -0.75rem;
			right:.3rem;
		/*	z-index:9999;*/
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
	
	<div class="gg_box clearfix">
		<i class="gg_icon fl"></i>
		<div class="bulletin_box fl" id="scroll_box">
            <p id="scroll_begin"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>
		    <p id="scroll_end"></p>
		</div>
	</div>
	<div class="rank_head clearfix">
        <p class="fl txt_limit">今日有<?php if ($_smarty_tpl->tpl_vars['guess_user_info']->value['people_num']){?><?php echo $_smarty_tpl->tpl_vars['guess_user_info']->value['people_num'];?>
<?php }else{ ?>0<?php }?>人参与竞猜，共投注<?php echo (($tmp = @$_smarty_tpl->tpl_vars['guess_user_info']->value['total_money'])===null||$tmp==='' ? "0" : $tmp);?>
<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
</p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['guess_rule_link']->value;?>
" class="fl">竞猜规则</a>
	</div>
<div id="load_wrapper">
<div id="scroller">
    <?php if ($_smarty_tpl->tpl_vars['roll_info']->value){?>
	<h1 class="rank_tit">ROLL项目</h1>
	<div class="rank_sp clearfix">
        <img src="<?php echo $_smarty_tpl->tpl_vars['roll_info']->value['img_path'];?>
" class="fl">
		<div class="rank_sp_box fl">
            <h1 class="clearfix"><p class="fl txt_limit" style="width:8.4rem"><?php echo $_smarty_tpl->tpl_vars['roll_info']->value['roll_name'];?>
</p><br><span class="fl"><?php echo $_smarty_tpl->tpl_vars['roll_info']->value['left_time'];?>
</span></h1>
            <h2>奖品：<?php echo $_smarty_tpl->tpl_vars['roll_info']->value['prize_name'];?>
</h2>
			<h3 class="clearfix"><i class="rolltime icon2 fl"></i>即将揭晓</h3>
            <a class="rank_sp_bt" href="<?php echo $_smarty_tpl->tpl_vars['roll_detail_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['roll_info']->value['roll_id'];?>
">立即免费参加</a>
		</div>
	</div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['guess_user_list']->value){?>
	<div class="rank_tit clearfix" id="rank_tit_bt"><h1 class="fl">本周竞猜排行榜</h1><i class="fr jcjiantouup icon2"></i>
	</div>
	<dl class="rank_main" style="background:#e8e8e8;">
		<dt class="clearfix">
			<p class="fl tl">排行</p>
			<p class="fl tc">昵称</p>
			<p class="fl tr">获得鱼翅数</p>
		</dt>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['guess_user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<dd class="clearfix">
        <p class="fl tl"><?php if ($_smarty_tpl->tpl_vars['key']->value+1==1){?><i class="icon2 first"></i><?php }elseif($_smarty_tpl->tpl_vars['key']->value+1==2){?><i class="icon2 two"></i><?php }elseif($_smarty_tpl->tpl_vars['key']->value+1==3){?><i class="icon2 three"></i><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
<?php }?></p>
        <div class="fl tc clearfix"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['headimgurl'];?>
" class="fl"><h1 class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</h1></div>
        <p class="fl tr"><?php echo intval($_smarty_tpl->tpl_vars['item']->value['total_prize']);?>
</p>
		</dd>
        <?php } ?>
	</dl>
    <?php }?>
	<h1 class="rank_tit">赛事竞猜</h1>
	<div id="wrapper_list">
		<div id="scroller_list">
			<ul class="mall_list_tab1 clearfix">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['guess_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <li style="float:left;" class="<?php if ($_smarty_tpl->tpl_vars['item']->value['guess_type_id']==$_smarty_tpl->tpl_vars['guess_type_id']->value){?>active<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value==count($_smarty_tpl->tpl_vars['guess_type_list']->value)-1){?>rb<?php }?>" Onclick="redirect('/FrontGuess/guess_index/guess_type_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['guess_type_id'];?>
.html')"><span><?php echo $_smarty_tpl->tpl_vars['item']->value['guess_type_name'];?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['can_guess']){?>
				<i class="icon_hot"></i>
                <?php }?>
				<!-- hot猜标志 -->
                </li>
                <?php } ?>
			</ul>
		</div>
	</div>
	<ul class="guess_main" id="new_list">	
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<li class="rel <?php if ($_smarty_tpl->tpl_vars['item']->value['over']==3){?>start<?php }elseif($_smarty_tpl->tpl_vars['item']->value['over']==2){?>doing<?php }else{ ?>over<?php }?>">
            <a href="<?php echo $_smarty_tpl->tpl_vars['guess_info_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['guess_id'];?>
">
                <div class="clearfix top_box"><i class="icon2 sstime fl"></i><p class="fl"><?php if ($_smarty_tpl->tpl_vars['item']->value['over']==1){?>已结束<?php }elseif($_smarty_tpl->tpl_vars['item']->value['over']==2){?> 进行中<?php }else{ ?>未开始<?php }?><span><?php echo $_smarty_tpl->tpl_vars['item']->value['ajax_start_time'];?>
</span></p><h2 class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['guess_name'];?>
</h2></div>
                <img src="/Public/Images/front/front_img/cai.png" class="abs cai"/>
				<!-- cai 标志是在未开始或进行中才会出现 -->
				<div class="team_box clearfix">
					<div class="fl team_img_box">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['host_img_path'];?>
" onerror="this.src='/Public/Images/front/front_img/img_lazy.jpg';" class="team_img lazy"/>
						<h1 class="team_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['host_team_name'];?>
</h1>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['is_over']&&$_smarty_tpl->tpl_vars['item']->value['host_score']>$_smarty_tpl->tpl_vars['item']->value['guest_score']){?><span class="victory"></span><?php }?>
					</div>
					<div class="fr team_img_box">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['guest_img_path'];?>
" onerror="this.src='/Public/Images/front/front_img/img_lazy.jpg';" class="team_img lazy"/>
                        <h1 class="team_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['guest_team_name'];?>
</h1>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['is_over']&&$_smarty_tpl->tpl_vars['item']->value['host_score']<$_smarty_tpl->tpl_vars['item']->value['guest_score']){?><span class="victory"></span><?php }?>
						<!-- span victory 是胜利方出现的标志-->
					</div>
					<div class="clearfix">
						<div class="score_box clearfix">
                            <p class="fl score_p"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['host_score'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
							<i class="icon2 VS fl"></i>
                            <p class="fl score_p"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['guest_score'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
						</div>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['guess_field_num']||$_smarty_tpl->tpl_vars['item']->value['bo']){?>
						<div class="ronda_box">
							<div class="ronda_bg"></div>
                            <h1 class="ronda_num">BO <?php if ($_smarty_tpl->tpl_vars['item']->value['bo']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['bo'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['guess_field_num'];?>
<?php }?></h1>
						</div>
                        <?php }?>
					</div>
				</div>
			</a>
		</li>
        <?php } ?>
		<!-- doing是进行中比赛 start是未开始比赛 over是已结束比赛 胜利方未做判断 -->
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
		<script type="text/javascript" src="__JS__/front/iscroll_tab.js"></script>
		<script type="text/javascript" src="__JS__/front/front_js/guess_index.js"></script>
		<script type="text/javascript" src="__JS__/front/fastclick.js"></script>

<!-- 		// <script type="text/javascript" src="__JS__/front/front_js/jquery.lazyload.js"></script>
		// <script type="text/javascript" src="__JS__/front/front_js/lazyload_img.js"></script> -->
	<script>
var total = parseInt('<?php echo $_smarty_tpl->tpl_vars['total_num']->value;?>
');
var firstRow = parseInt('<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
');
var page_num = parseInt('<?php echo $_smarty_tpl->tpl_vars['page_num']->value;?>
');
var system_money_name = '<?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>
';
var guess_type_id = parseInt('<?php echo $_smarty_tpl->tpl_vars['guess_type_id']->value;?>
');


	var wSum=0
	var pSum=0
	var pd=0
	var listWidth=0
	$(".mall_list_tab1").find("li").each(function(i){
		wSum +=$(this).width();
		pd=parseInt($(this).css("padding-right"));

		// console.log(pd)
		// console.log(wSum);
		pSum=(i+1)*(pd*2+1)
		console.log(pSum);
	})
	listWidth=wSum+pSum+10;
	console.log(listWidth)
	$("#scroller_list").width(listWidth);
	

	$(".refresh").on("click",function(){
		location.reload()
	})

	$(".mall_list_tab1").find("li").on("click",function(){
		$(this).addClass("active").siblings().removeClass("active");
	})
var TabScroll = new IScroll('#wrapper_list', { eventPassthrough: true, scrollX: true, scrollY: false, preventDefault: false });
	$(function() {  
	    FastClick.attach(document.body);  
	});  


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
		  	},20); 
		}
		scroll();

	var rank_bt=document.getElementById('rank_tit_bt');
	rank_bt.addEventListener('touchstart',function(e){
		if($(".rank_main").css("display")=="none"){
			$(".rank_main").show(200);
			$("#rank_tit_bt").find("i").css("transform","rotate(0deg)");
		}else{
			$(".rank_main").hide(200);
			$("#rank_tit_bt").find("i").css("transform","rotate(180deg)");
		}
	});
	// $("#rank_tit_bt").on("click",function(){
	// 			if($(".rank_main").css("display")=="none"){
	// 		$(".rank_main").show(200);
	// 		$("#rank_tit_bt").find("i").css("transform","rotate(0deg)");
	// 	}else{
	// 		$(".rank_main").hide(200);
	// 		$("#rank_tit_bt").find("i").css("transform","rotate(180deg)");
	// 	}
	// })



	</script>

</body>
</html>
 
<?php }} ?>