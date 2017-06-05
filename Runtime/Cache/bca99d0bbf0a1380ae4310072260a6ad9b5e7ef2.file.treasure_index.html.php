<?php /* Smarty version Smarty-3.1.6, created on 2017-04-07 21:18:48
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/treasure_index.html" */ ?>
<?php /*%%SmartyHeaderCode:200528504057c286522057a0-94095233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bca99d0bbf0a1380ae4310072260a6ad9b5e7ef2' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontTreasure/treasure_index.html',
      1 => 1491569343,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200528504057c286522057a0-94095233',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c2865234fab',
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
<?php if ($_valid && !is_callable('content_57c2865234fab')) {function content_57c2865234fab($_smarty_tpl) {?><!doctype html>
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
		.welfare-area {
		    border-top: 1px solid #6f6f6f;
		    border-bottom: 1px solid #6f6f6f;
		}
		.fuli_title{
			display: inline-block;
    		width: 20%;
		}
		.bulletin_box{
			width: 70%;
			height: 1.75rem;
			overflow: hidden;
			white-space: nowrap;
			background-color: transparent;
			float: right;
			margin-right: 3%;
		}
		.bulletin_box>p{
			font-size: 0.7rem;
			color: #fff;
			line-height:1.75rem;
			margin-right: 3%;
			display: inline;
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
	<!--系统公告-->
    <?php if ($_smarty_tpl->tpl_vars['draw_prize_list']->value){?>
		<div class="home_horn clearfix">
			<i class="icon gonggao3x fl"></i>
			<div class="fl home_horn_box">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['draw_prize_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <p>恭喜<a href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</a>以<a href=""><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['people_use_times'])===null||$tmp==='' ? 1 : $tmp);?>
</a>人次夺得<a href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['prize_name'];?>
</a></p>
                <?php } ?>
			</div>
		</div>
    <?php }?>
    <!--夺宝周榜-->
    <ul class="treasure-list">
    	<li class="week-list">夺宝周榜</li>
    	<li class="week-profit">
    		<p>盈利人次</p>
    		<span></span>
    	</li>
    	<li class="week-icon"><i class="jcjiantouup icon2" style="transform:rotate(180deg);"></i></li>
    </ul>
    <div class="list-cont">
    	<ul class="red">
    		<li class="first-li">本周红榜榜首</li>
    		<li class="mid-li"><?php echo $_smarty_tpl->tpl_vars['times']->value['max']['name'];?>
</li>
    		<li class="last-li">
                <span style="color:#3ecd8d;"><?php if ($_smarty_tpl->tpl_vars['times']->value['max'][1]>0){?>正<?php }elseif($_smarty_tpl->tpl_vars['times']->value['max'][1]<0){?>负<?php }else{ ?>平<?php }?></span>
                <span style="color:#d5ac64;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['times']->value['max'][1])===null||$tmp==='' ? 0 : $tmp);?>
</span>
    			<span>人次</span>
    		</li>
    	</ul>
    	<ul>
    		<li class="first-li">本周黑榜榜首</li>
    		<li class="mid-li"><?php echo $_smarty_tpl->tpl_vars['times']->value['min']['name'];?>
</li>
    		<li class="last-li">
    			<span style="color:#c5432d;"><?php if ($_smarty_tpl->tpl_vars['times']->value['min'][1]>0){?>正<?php }elseif($_smarty_tpl->tpl_vars['times']->value['min'][1]<0){?>负<?php }else{ ?>平<?php }?></span>
                <span style="color:#d5ac64;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['times']->value['min'][1])===null||$tmp==='' ? 0 : $tmp);?>
</span>
    			<span>人次</span>
    		</li>
    	</ul>
    </div>
    <!--点击盈利人次的弹框-->
    <div class="info-wrap">
    	<div class="info-bg"></div>
    	<div class="info-cont">
    		<h3>说明</h3>
    		<p>盈利人次=总夺宝中奖人次-总参与人次</p>
            <p style="color:#d6aa69;border-bottom:1px solid white;"><?php echo $_smarty_tpl->tpl_vars['system_config']->value['WEEK_ALERT'];?>
</p>
    		<span class="pro-know">我知道了</span>
    		<div class="fork"></div>
    	</div>
    </div>
    <!--福利专区-->
    <div class="welfare-area">
    	<h2>
    		<span class="fuli_title">福利专区</span>
			<div class="bulletin_box fl" id="scroll_box">
	            <p id="scroll_begin"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>
			    <p id="scroll_end"></p>
			</div>
    	</h2>
    	<ul class="home_main clearfix" style="margin-bottom:0;">
	        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fuli_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<li class="welfare-limit">
	            <a href="<?php echo $_smarty_tpl->tpl_vars['treasure_detail_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['treasure_id'];?>
">
	                <!--<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_path'];?>
" />-->
	                <img data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_path'];?>
" class="lazy" />
					<div class="props_box clearfix">
	                    <h3 class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['prize_name'];?>
</h3>
	                    <p class="fr">夺宝进度<span class="home_span_txt"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['prop_deg'])===null||$tmp==='' ? 0 : $tmp);?>
</span>%</p>
					</div>
					<div class="progress_box" data-perc="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['prop_deg'])===null||$tmp==='' ? 0 : $tmp);?>
">
						<div class="progress_cont"></div>
					</div>
					<div class="number_box clearfix">
	                    <p class="fl">已参与：<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['people_num'])===null||$tmp==='' ? 0 : $tmp);?>
</span>人次</p>
	                    <p class="fr">限购<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['each_person_times'])===null||$tmp==='' ? 10 : $tmp);?>
</span>人次</p>
					</div>
					<div class="remaining_box clearfix">
						<p class="fl margin_right">剩余</p>
	                    <?php  $_smarty_tpl->tpl_vars['left'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['left_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left']->key => $_smarty_tpl->tpl_vars['left']->value){
$_smarty_tpl->tpl_vars['left']->_loop = true;
?>
	                    <span class="fl"><?php echo $_smarty_tpl->tpl_vars['left']->value;?>
</span>
	                    <?php } ?>
						<!--<span class="fl">6</span>
						<span class="fl">9</span>-->
						<p class="fl margin_left">人次</p>
					</div>
				</a>
				<div class="limit-icon"></div>
			</li>
	        <?php } ?>
		</ul>
    </div>
	<!--夺宝大作战-->
	<div class="fight-treasure">
		<h2>夺宝大作战</h2>
		<ul class="home_main clearfix">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treasure_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['treasure_detail_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['treasure_id'];?>
">
                    <!--<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_path'];?>
" />-->
                    <img data-original="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_path'];?>
" class="lazy" />
					<div class="props_box clearfix">
                        <h3 class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['prize_name'];?>
</h3>
                        <p class="fr">夺宝进度<span class="home_span_txt"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['prop_deg'])===null||$tmp==='' ? 0 : $tmp);?>
</span>%</p>
					</div>
					<div class="progress_box" data-perc="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['prop_deg'])===null||$tmp==='' ? 0 : $tmp);?>
">
						<div class="progress_cont"></div>
					</div>
					<div class="number_box clearfix">
                        <p class="fl">已参与：<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['people_num'])===null||$tmp==='' ? 0 : $tmp);?>
</span>人次</p>
                        <p class="fr">限购<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['each_person_times'])===null||$tmp==='' ? 10 : $tmp);?>
</span>人次</p>
					</div>
					<div class="remaining_box clearfix">
						<p class="fl margin_right">剩余</p>
                        <?php  $_smarty_tpl->tpl_vars['left'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['left_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left']->key => $_smarty_tpl->tpl_vars['left']->value){
$_smarty_tpl->tpl_vars['left']->_loop = true;
?>
                        <span class="fl"><?php echo $_smarty_tpl->tpl_vars['left']->value;?>
</span>
                        <?php } ?>
						<!--<span class="fl">6</span>
						<span class="fl">9</span>-->
						<p class="fl margin_left">人次</p>
					</div>
				</a>
			</li>
            <?php } ?>
		</ul>
	</div>
		<div class="home_menu">
            <a href="<?php echo $_smarty_tpl->tpl_vars['draw_prize_record_link']->value;?>
" class="home_menu_box clearfix">
				<i class="icon kaijiangjilu3x fl"></i>
				<p class="fl">开奖记录</p>
				<span class="icon right_gold3x fr"></span>
			</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['treasure_rule_link']->value;?>
" class="home_menu_box clearfix">
				<i class="icon youxiguize3x fl"></i>
				<p class="fl">游戏规则</p>
				<span class="icon right_gold3x fr"></span>
			</a>	
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
		<script type="text/javascript" src="__JS__/front/front_js/lazyload_img.js"></script>
		<script>
			var time;
			

			$(function()
			{
				$(".home_main>li:even").css("float","left");
				$(".home_main>li:odd").css("float","right");

				$(".progress_box").each(function(){
					var t = $(this),
					dataperc = t.attr("data-perc");
					t.find(".progress_cont").animate({width:dataperc+"%"});
				});
			/*滚动*/
				time = window.setTimeout("lun()",1000);
			});
			
			function lun()
			{
				$(".home_horn_box").animate({top:"-1.85rem"},1000,function()
				{
					$(".home_horn_box p:first").appendTo(".home_horn_box");
					$(".home_horn_box").css("top","0");
				});
				time = window.setTimeout("lun()",500);
			}
			/*-----夺宝周榜------*/
			var weekList = document.getElementsByClassName("week-list")[0];
			var weekIcon = document.getElementsByClassName("week-icon")[0];
			function touchListShow(obj){
					obj.addEventListener("touchstart",function(e){
					if($(".list-cont").css("display")=="none"){
						$(".list-cont").show(200);
						$(".week-icon").find("i").css({
							"transform":"rotate(0deg)",
							"transition":"0.8s"
						});
					}else{
						$(".list-cont").hide(200);
						$(".week-icon").find("i").css({
							"transform":"rotate(180deg)",
							"transition":"0.8s"
						});
					}
				});
			}
			touchListShow(weekList);
			touchListShow(weekIcon);
			/*-----盈利人次------*/
			var weekProfit = document.getElementsByClassName('week-profit')[0];
			var infoBg = document.getElementsByClassName('info-bg')[0];
			var infoCont = document.getElementsByClassName('info-cont')[0];
			var oFork = document.getElementsByClassName('fork')[0];
			var proKnow = document.getElementsByClassName('pro-know')[0];
			$(".info-wrap").css({
				"width":$(window).width(),
				"height":$(window).height()
			});
			weekProfit.addEventListener("touchstart",function(e){
				$(".info-wrap").css("display","block");
				$(".info-bg").css("display","block");
				$(".info-cont").css("display","block");
			});
			function infoProShow(obj){
				obj.addEventListener("touchstart",function(e){
					$(".info-cont").css("display","none");
					$(".info-bg").css("display","none");
					setTimeout(function(){
						$(".info-wrap").css("display","none");
					},300);
				});
			}
			infoProShow(infoBg);
			infoProShow(oFork);
			infoProShow(proKnow);
			
			//滚动文字
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
			

		</script>

</body>
</html>
 
<?php }} ?>