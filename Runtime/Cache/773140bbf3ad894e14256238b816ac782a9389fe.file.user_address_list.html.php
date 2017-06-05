<?php /* Smarty version Smarty-3.1.6, created on 2016-10-09 17:32:21
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontAddress/user_address_list.html" */ ?>
<?php /*%%SmartyHeaderCode:69672637457bea9df849bd5-32919058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '773140bbf3ad894e14256238b816ac782a9389fe' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontAddress/user_address_list.html',
      1 => 1473816598,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69672637457bea9df849bd5-32919058',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57bea9df8cb87',
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
<?php if ($_valid && !is_callable('content_57bea9df8cb87')) {function content_57bea9df8cb87($_smarty_tpl) {?><!doctype html>
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
			background:#202020;
		}
		.guess_shade{
			opacity:0.5;
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
			
		<ul class="take_list">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<li class="take_list_li <?php if ($_smarty_tpl->tpl_vars['item']->value['user_address_id']==$_smarty_tpl->tpl_vars['user_default_addr']->value['user_address_id']){?>take_active<?php }?>">
				<div class="top_box clearfix">
                    <h1 class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['realname'];?>
</h1>
					<a class="fr icon2 dzjiantouup" href="javascript:;"></a>
                    <h2 class="fr"><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</h2>
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_address_id'];?>
" id="user_address_id"/>
					<ul>
						<li class="clearfix mr"><i class="icon2 fl szmr"></i><p>设置默认</p></li>
						<li class="clearfix del"><i class="icon2 fl lbdelete"></i><p>删除</p></li>
					</ul>
				</div>
                <h3><span>［默认］</span><?php echo $_smarty_tpl->tpl_vars['item']->value['area_string'];?>
</h3>
			</li>
            <?php } ?>
		</ul>
		<!-- span 请勿删除 take_active为默认地址高亮 -->
        <a class="global_bt" id="take_bt" href="<?php echo $_smarty_tpl->tpl_vars['add_user_address_link']->value;?>
">添加新地址</a>
        <div class="bottom_3rem"></div>
		<!-- 弹窗 -->
		<div class="guess_shade"></div>
		<div class="take_del">
			<i class="icon2 sctishi"></i>
			<p>确定删除此列地址?</p>
			<div class="take_del_box clearfix">
				<h1 class="fl yes">确定</h1>
				<h1 class="fl no">取消</h1>
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
			
		<script>
			$(".dzjiantouup").on("click",function(){
				$(".guess_shade").show();
				$(this).parent().parent().find("ul").show();
			})
			// 默认地址
			$(".top_box .mr").on("click",function(){
                var user_address_id = $(this).parent().siblings("#user_address_id").val();
                if (!user_address_id) return;
                ajax_submit('/FrontAddress/set_default_address', 'user_address_id='+user_address_id);
				$(this).parent().parent().parent().addClass("take_active").siblings().removeClass("take_active");
				$(".guess_shade").hide();
				$(".top_box").find("ul").hide();
			})
			// 删除
            var this_del;
            var user_address_id;
			$(".top_box .del").on("click",function(){
				$(".take_del").show();
				$(".top_box").find("ul").hide();
				this_del =$(this).parent().parent().parent();
                user_address_id = $(this).parent().siblings("#user_address_id").val();
			})
            $(".take_del .yes").on("click",function(){
                if (!user_address_id) return;
                ajax_submit('/FrontAddress/delete_address', 'user_address_id='+user_address_id);
                this_del.remove();
                $(".take_del").hide();
                $(".guess_shade").hide();
            })
            $(".take_del .no").on("click",function(){
                $(".take_del").hide();
                $(".guess_shade").hide();
            })
			$(".guess_shade").on("click",function(){
				$(this).hide();
				$(".top_box").find("ul").hide();
			})
		</script>

</body>
</html>
 
<?php }} ?>