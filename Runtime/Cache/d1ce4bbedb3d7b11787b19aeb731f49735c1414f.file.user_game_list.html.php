<?php /* Smarty version Smarty-3.1.6, created on 2016-10-10 16:52:30
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/user_game_list.html" */ ?>
<?php /*%%SmartyHeaderCode:81891177357be54b9d1c581-55547139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1ce4bbedb3d7b11787b19aeb731f49735c1414f' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/user_game_list.html',
      1 => 1476089548,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81891177357be54b9d1c581-55547139',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57be54b9da82a',
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
<?php if ($_valid && !is_callable('content_57be54b9da82a')) {function content_57be54b9da82a($_smarty_tpl) {?><!doctype html>
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
		#load_wrapper {
		  position:absolute; 
		  z-index:1;
		  top:2.8rem;
		  bottom: 0;
		  width:100%;
		  overflow:auto;  

		}
		#scroller{
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
	
    <a class="add_game_top clearfix" href="<?php echo $_smarty_tpl->tpl_vars['add_user_game_link']->value;?>
">
			<h1 class="fl">添加游戏</h1>
			<i class="fr icon2 gjjiantouright"></i>
		</a>
		<ul id="new_list" class="game_list">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_game_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<li class="game_li">
				<!-- <a href="javascript:;" > -->
					<div class="game_box clearfix">
                        <h1 class="fl"><?php echo $_smarty_tpl->tpl_vars['item']->value['game_name'];?>
</h1>
                        <input type="hidden" id="user_game_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_game_id'];?>
"/>
                        <i class="fr icon2 lbdelete"></i>
					</div>
                    <h2 class="game_h2">ID：<?php echo $_smarty_tpl->tpl_vars['item']->value['game_account'];?>
</h2>
                    <h2 class="game_h2">Steam URL：<?php echo $_smarty_tpl->tpl_vars['item']->value['steam_url'];?>
</h2>
				<!-- </a> -->
			</li>
            <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
            	<p style="color: #FFF;text-align: center;">您还没有添加游戏呢</p>
            <?php } ?>
		</ul>
		<!-- 删除确认 -->
		<div class="guess_shade"></div>
		<div class="take_del">
			<i class="icon2 sctishi"></i>
			<p>确定删除这个游戏账号吗?</p>
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
var user_game_id,
    this_del;

$(".game_li .lbdelete").on("click",function(){
    $(".take_del").show();
    $(".guess_shade").show();
    user_game_id = $(this).siblings('#user_game_id').val();
    if (!user_game_id) return;
    this_del =$(this).parent().parent(".game_li")
})
$(".take_del .yes").on("click",function(){
    $(".take_del").hide();
    $(".guess_shade").hide();
    ajax_submit('/FrontUser/delete_user_game', 'user_game_id='+user_game_id, '', '删除成功');
    this_del.remove();
})
$(".take_del .no").on("click",function(){
    $(".take_del").hide();
    $(".guess_shade").hide();
})
		</script>

</body>
</html>
 
<?php }} ?>