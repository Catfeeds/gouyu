<?php /* Smarty version Smarty-3.1.6, created on 2016-10-18 14:16:24
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/pay_page.html" */ ?>
<?php /*%%SmartyHeaderCode:140284433657d10403860501-84839996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d1514e0a4f7eb1f5ea8295dcdc15e3e7fd1fe8a' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/pay_page.html',
      1 => 1476769445,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140284433657d10403860501-84839996',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57d1040390fc8',
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
<?php if ($_valid && !is_callable('content_57d1040390fc8')) {function content_57d1040390fc8($_smarty_tpl) {?><!doctype html>
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
			background:#E8E8E8;
		}
		.guess_shade{
			background-color: rgba(0, 0, 0, 0.5);
		}
		.keep_win{
			background-color:rgba(0, 0, 0,0.8);
			top:-10rem;
		}
		#copy_btn{
			display:block;
			border-top-right-radius: .3rem;
			border-bottom-right-radius: .3rem;
			display:inline-block;
			background-color: #D6AA69;
			color:#FFF;
			width: 40%;
			height:2.2rem;
			line-height: 2.2rem;
			text-align: center;
			font-size: .8rem;
			border: none;
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
	
<!-- 		<h1 class="zfb_head">
			说明：<br>
请确认并复制ID号码，在支付宝转账备注里务必填写此ID号，否则很可能充值不成功而浪费您宝贵的时间（因未备注ID号而导致未充值成功的处理时间是3天内）
		</h1> -->
<!-- 		<div class="zfb_box clearfix">
            <h1 id="use_id" class="use_id fl" ><span><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</span></h1>
			<button class="fl" for="use_id" id="copy_btn">手动复制</button>
		</div> -->
		<!-- <input  value="支付宝支付"/> -->
<!-- 		<a class="zfb_bt"  href="javascript:;">支付宝支付</a> -->
		<!-- 转账成功 失败弹窗 -->
		<div class="guess_shade"></div>
		<!-- 支付返回按钮 -->
<!-- 		<div class="pay_state">
            <a class="pay_win" href="/FrontUser/recharge_success">
				转账成功
			</a>
            <a class="pay_lose" href="/FrontUser/recharge">
				转账失败
			</a>
		</div> -->
		<!-- 复制成功 -->
<!-- 		<div class="keep_win clearfix">
			<i class="fl icon2 szmr"></i>
			<p class="fl">复制成功</p>
		</div> -->
		<!-- 跳转提示 -->
		<div class="skip_hint" style="display:block">
			<div class="skip_hint_box1 clearfix">
				<p class="fl">点击该页右上角的“更多”按钮，选择
在浏览器中打开完成支付</p>
				<img src="__IMAGES__/front/front_img/top .png" class="fr"/>
			</div>
			<div class="skip_hint_box2 clearfix">
				<div class="fl img_box">
					<img src="__IMAGES__/front/front_img/more.png" class="skip_hint_img ">
					<p>“更多”按钮</p>
				</div>
				<i class="icon2 llqjiantouleft"></i>
				<div class="fr img_box">
					<img src="__IMAGES__/front/front_img/safari.png" class="skip_hint_img ">
					<p>在游览器中<br>打开</p>
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
	
<script src="__JS__/clipboard.min.js"></script>
		<script>
var text = '<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
';
var alipay = '<?php echo $_smarty_tpl->tpl_vars['system_config']->value['ALIPAY'];?>
';
			$(function()
			{
                copy_text("copy_btn");

				$(".footer_box").on("click",function()
				{
					$(this).addClass("footer_active").siblings().removeClass("footer_active");
				});
			});
			var ua = navigator.userAgent;
			// if(ua.indexOf('MicroMessenger') > -1){
            $(".zfb_bt").click(function(event) {
                if (isWeiXin()) {
                        event.preventDefault();
                        $('.skip_hint').show();
                } else {
                    window.location.href=alipay;
                }
            });
            // $(".skip_hint").on("click",function(){
            // 	$(this).hide();
            // })
	        // }
			// $(".zfb_bt").on("click",function(){
			// 	$(".guess_shade").show();

			// 	// $(".pay_win").show();  //转账成功
			// 	$(".pay_lose").show();//转账失败
			// 	setTimeout(function () {
			// 		$(".guess_shade").hide();
			// 		$(".pay_win").hide();
			// 		$(".pay_lose").hide();
			// 	}, 2000);
			// })

			
			// $(".skip_hint").on("click",function() {
			// 	$('.skip_hint').hide();
			// 	// $(".guess_shade").show();
			// 	// $(".pay_state").show();
			// })

            function copy_text(id)
            {
                var clipboard = new Clipboard('#' + id, {
                    text: function() {
                        return text;
                    }
                });

                clipboard.on('success', function(e) {
                    //console.log(e);
                    //alert('复制成功');
                    $(".keep_win").show();
                    setTimeout(function () {
                        $(".keep_win").hide();
                    }, 2000);
                });

                clipboard.on('error', function(e) {
                    //console.log(e);
                    alert('复制失败，请手动复制');
                });
            }


            function isWeiXin(){
                var ua = window.navigator.userAgent.toLowerCase();
                if(ua.match(/MicroMessenger/i) == 'micromessenger'){
                    return true;
                }else{
                    return false;
                }
            }
		</script>

</body>
</html>
 
<?php }} ?>